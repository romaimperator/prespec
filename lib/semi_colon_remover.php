<?php
class SemiColonRemover {
  function __construct($spec) {
    $this->spec = $spec;
  }

  function remove() {
    $this->remove_from_blocks();
    $this->remove_from_blank_lines();
    return $this->spec;
  }

  private function remove_from_blocks() {
    $this->spec = preg_replace("/{;/", "{", $this->spec);
    $this->spec = preg_replace("/};/", "}", $this->spec);
  }

  private function remove_from_blank_lines() {
    $this->spec = preg_replace("/\n;\n/", "\n\n", $this->spec);
  }
}
?>
