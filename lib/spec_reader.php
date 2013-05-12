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

include 'block_replacer.php';
include 'function_namer.php';
include 'keyword_replacer.php';
include 'semi_colon_adder.php';
include 'semi_colon_remover.php';
include 'describe.php';
$spec = BlockReplacer::replace(new SpecReader($argv[1]));
$spec = FunctionNamer::replace($spec);
$spec = KeywordReplacer::replace($spec);
$spec = SemiColonAdder::add($spec);
$spec = new SemiColonRemover($spec);
$spec = $spec->remove();
echo $spec;
$describe = new Describe($spec);

$describe->run();
?>

