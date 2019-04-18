<?php return function($req, $res) {

  $db = \Rapid\Database::getPDO();
  require('./models/UserType.php');

  $type = new UserType([
    'typename' => $req->body('typename')
  ]);

  UserType::insert($db, $type);

  $res->render('main', 'add-userTypes', [
    'pageTitle' => 'Add User Types',
    'type'   => $type
    // 'successMessage' => $req->query('success') ? 'Successfully added New Coffee' : ''
  ]);

} ?>