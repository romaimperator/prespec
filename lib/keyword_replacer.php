<?php
class KeywordReplacer {
  function replace($spec) {
    return KeywordReplacer::replace_puts($spec);
  }

  private function replace_puts($spec) {
    return preg_replace(
      "/puts ['\"](.*)['\"]\n/",
      "echo \"$1\\n\"\n",
      $spec);
  }
}
?>
