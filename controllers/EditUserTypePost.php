<?php return function($req, $res) {
  $req->sessionStart();

  $db = \Rapid\Database::getPDO();
  require('./models/UserType.php');

  $type = new UserType([
    'type_id' => $req->body('type_id'),
    'typename' => $req->body('typename')
  ]);

  UserType::update($db,$type);

  $res->redirect('/view-userTypes');

} ?>