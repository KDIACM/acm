<?php
class CValidator {
  public static function isNumber($val) {
    return is_numeric(trim($val));
  }
}

?>
