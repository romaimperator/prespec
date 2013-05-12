<?php
class SpecReader {
  function __construct($filename) {
    $this->filename = $filename;
  }

  function file_contents() {
    return join("", $this->file_as_array());
  }

  function __tostring() {
    return $this->file_contents();
  }

  private

  function file_as_array() {
    return file($this->filename);
  }
}
?>

