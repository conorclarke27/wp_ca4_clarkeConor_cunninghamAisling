<?php class ModelUtils{

  public static function isValidId($id) {
    return (int)$id && ($id >0);
  }

  public static function isValidNumber($num) {
    return is_numeric($num) && ($num >= 0);
  }

  public static function isValidName($name) {
    if(!preg_match("@^[A-Za-z.-]+(\s*[A-Za-z.-]+)*$@", $name)) {
      return false;
    }
    return true;
  }


  public static function isValidEmail($email) {
    //return is_email($email); says that is_email is not a recognized function
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return false;
    }
    return true;
  }

} ?>

