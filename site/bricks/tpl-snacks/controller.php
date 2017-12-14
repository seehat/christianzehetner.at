<?php

return function ($site, $pages, $page) {
  $snacks = $page->children()->visible();
  $tags = $snacks->pluck('tags', ',', true);
  $durations = $snacks->pluck('duration', ',', true);

  return [
    'snacks' => $snacks,
    'tags' => $tags,
    'durationmin' => min($durations),
    'durationmax' => max($durations),
  ];
};
