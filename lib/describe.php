<?php
/* This class represents the describe block */
class Describe {
  function __construct($spec) {
    $this->spec = $spec;
  }

  function run() {
    $this->load_spec();
    call_user_func('describe_Spec');
  }

  function load_spec() {
    eval($this->spec);
  }
}
?>
