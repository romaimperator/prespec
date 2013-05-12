<?php
class BlockReplacer {
  function replace($spec) {
    $spec = BlockReplacer::replace_dos($spec);
    $spec = BlockReplacer::replace_ends($spec);
    return $spec;
  }

  private

  function replace_dos($spec) {
    return preg_replace("/\bdo\n/", "{\n", $spec);
  }

  function replace_ends($spec) {
    return preg_replace("/\bend\n/", "}\n", $spec);
  }
}
?>
