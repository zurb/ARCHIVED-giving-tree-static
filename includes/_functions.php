<?php

$contents = array();

function content_for($name, $method) {
  global $contents;
  $contents[$name] = $method;
}

function yield($name) {
  global $contents;
  if (array_key_exists($name, $contents)) {
      return $contents[$name]();
  }
}

?>