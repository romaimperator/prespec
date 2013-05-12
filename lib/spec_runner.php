<?php
require 'spec_reader.php';
require 'block_replacer.php';
require 'function_namer.php';
require 'keyword_replacer.php';
require 'semi_colon_adder.php';
require 'semi_colon_remover.php';
require 'describe.php';

class SpecRunner {
  function __construct($filename) {
    $this->filename = $filename;
  }

  function run() {
    $spec = BlockReplacer::replace(new SpecReader($this->filename));
    $spec = FunctionNamer::replace($spec);
    $spec = KeywordReplacer::replace($spec);
    $spec = SemiColonAdder::add($spec);
    $spec = new SemiColonRemover($spec);
    $spec = $spec->remove();
    $describe = new Describe($spec);

    echo $spec;
    $describe->run();
  }
}
?>
