<?php

site::$methods['fulladdress'] = function($page) {
  $address = $page->street() . "\n" . 
             $page->plz() . " " . $page->city() . "\n" . 
             "Tel.: " . kirbytag(array('tel' => $page->phone())) . "\n" . 
             "E-Mail.: " . str::email($page->email());

  return new Field($page, 'fulladdress', $address);
};
