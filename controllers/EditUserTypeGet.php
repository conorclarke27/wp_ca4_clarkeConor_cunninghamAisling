<?php return function($req, $res) {
  $req->sessionStart(); 
  $db = \Rapid\Database::getPDO();
  require('./models/UserType.php');

  $type_id    = $req->query('type_id');
  $type       = UserType::findOneById($db, $type_id);

  $res->render('main', 'edit-userTypes', [
      // 'successMessage'    => $req->query('success') ? 'Successfully updated Order!!!' : '',
      'pageTitle'         => 'Edit User Type',
      'type'             => $type
  ]);

} ?>