<?php class ModelUtils{

public static function isValidId($id) {
  return is_int($id) && ($id >0);
}

public static function isValidNumber($num) 
{
  return is_int($num) && ($num >= 0);
}


//public static function isValidEmail($email)


} ?>

