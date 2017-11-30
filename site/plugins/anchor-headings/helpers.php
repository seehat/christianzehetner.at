<?php


/**
 * This function generates an ID from the given text based on the given options
 * and regex replacement-rules.
 */
function buildID($options, $enum, $text) {
  $id = $text;
  if ($options['id_prepend_enum']) $id = $enum . $options['enum_seperator'] . $id;

  foreach($options['id_rules'] as $pattern => $replacement) {
    $id = preg_replace($pattern, $replacement, $id);
  }

  if ($options['id_prefix']) $id = $options['id_prefix'] . $id;

  return $id;
}


/**
* This function enumerates all headings in the parsed document and inserts new
* markup for each heading including an anchor-link to the generated ID.
*/
function insertAnchors($options)
{
  $h_counter = array_fill($options['heading_min'], $options['heading_max'], --$options['enum_start']);
  $h_pattern = "/h[${options['heading_min']}-${options['heading_max']}]/i";
  $toc_items = '';

  foreach (pq(':header') as $h) {
    // Determine tagname and ensure it's within range
    $tagname = pq($h)->get(0)->tagName;
    if (!preg_match($h_pattern, $tagname)) continue;

    $level = intval(ltrim($tagname, 'h'));
    $count = ++$h_counter[$level];

    // Determine current enumerations
    $enum = "";
    for($l = $options['heading_min']; $l < $level; ++$l) {
      $l_count = $h_counter[$l];
      $enum .= "${l_count}${options['enum_seperator']}";
    }
    $enum .= "${count}";

    // Build ID and apply it to the element
    $id = buildID($options, $enum, pq($h)->text());
    pq($h)->attr('id', $id);

    // generate TOC until level 3
    if ($level < 4) {
      $toc_item = str::template("<a href='" . url::current() . "#{id}'><span class='c-toc__enum'>{enum}.</span> {heading}</a>", [
        'heading' => pq($h)->html(),
        'id' => $id,
        'enum' => $enum
      ]);

      // add spaces for toc levels to generate with kirbytext
      for ($i = 1; $i < $level; $i++) {
        $toc_items .= '  ';
      }

      $toc_items .= '- ' . $toc_item . "\r\n";
    }

    // Generate new markup and set it inside the heading-element
    pq($h)->html(str::template($options['markup'], [
      'heading' => pq($h)->html(),
      'id' => $id,
      'enum' => $enum
    ]));

    // Reset higher-level counter
    for($i = $level + 1; $i <= $options['heading_max']; ++$i) {
      $h_counter[$i] = $options['enum_start'];
    }
  }

  $toc = new Brick('div');
  $toc->addClass('c-toc');
  $toc->append(kirbytext($toc_items));

  return $toc;
}
