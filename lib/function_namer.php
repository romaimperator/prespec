<?php
class FunctionNamer {
  function replace($spec) {
    $spec = FunctionNamer::name_describe($spec);
    $spec = FunctionNamer::name_all_its($spec);
    return $spec;
  }

  function slug($string) {
    return preg_replace("/(\w) (\w|['\"])/", "$1_$2", $string);
  }

  function name_it($string) {
    return preg_replace(
      "/([ \t]*)(it_)['\"]([^'\"]+)['\"]/",
      "$1function $2$3()",
      $string);
  }

  private function name_describe($spec) {
    return preg_replace(
      "/describe ([A-Za-z]+)\b/",
      "function describe_$1()",
      $spec);
  }

  private function name_all_its($spec) {
    $spec = FunctionNamer::slug_its($spec);
    return $spec;
  }

  private function slug_its($spec) {
    return preg_replace_callback(
      "/[ \t]*(it ['\"][^\n]+['\"])/",
      function ($matches) {
        return FunctionNamer::name_it(FunctionNamer::slug($matches[0]));
      },
      $spec);
  }
}
?>

