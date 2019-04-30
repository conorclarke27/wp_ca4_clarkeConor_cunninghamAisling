<?php return function($req, $res) {
  
  $req->sessionStart();
  $db = \Rapid\Database::getPDO();
  require('./models/UserType.php');
  $userTypes = UserType::findAll($db);
  $res->render('main', 'view-userTypes', [
      'pageTitle' => 'View User Types',
      'viewAllUserTypes' => $userTypes
  ]);

} ?>