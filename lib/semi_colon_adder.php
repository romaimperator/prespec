<?php
class SemiColonAdder {
  function add($spec) {
    return preg_replace("/\n/", ";\n", $spec);
  }
}
?>
