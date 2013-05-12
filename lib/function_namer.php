<?php
class FunctionNamer {
  function replace($spec_string) {
    return preg_replace(
      "/describe ([A-Za-z]+)\b/",
      "function describe_$1()",
      $spec_string);
  }
}
?>
