<?php return function($req, $res) {

  $db = \Rapid\Database::getPDO();
  require('./models/UserType.php');

  $admin = $req->session("Admin");

  if($admin)
  {
  $type = new UserType([
    'typename' => $req->body('typename')
  ]);

  UserType::insert($db, $type);

  $res->render('main', 'add-userTypes', [
    'pageTitle' => 'Add User Types',
    'type'   => $type
  ]);
}
else
{
    $res->render('main', '404', []);
}
}
 ?>