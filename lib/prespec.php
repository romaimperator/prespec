<?php
require 'spec_runner.php';

$sr = new SpecRunner($argv[1]);
$sr = $sr->run();
?>
