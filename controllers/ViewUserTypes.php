<?php return function($req, $res) {
  
  $req->sessionStart();
  $admin = $req->session("Admin");
  if($admin) {
  $db = \Rapid\Database::getPDO();
  require('./models/UserType.php');
  $userTypes = UserType::findAll($db);
  $res->render('main', 'view-userTypes', [
    'pageTitle' => 'View User Types',
    'viewAllUserTypes' => $userTypes
    ]);
  }

  else {
    $res->render('main', '404', []);
  }
  
} ?>