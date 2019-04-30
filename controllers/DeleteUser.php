<?php return function($req, $res) {
  $req->sessionStart(); 
    
  $db = \Rapid\Database::getPDO();
  require('./models/User.php');

  $user_id    = $req->query('user_id');
  $user       = User::findOneById($user_id, $db);

  User::delete($db, $user);

  $res->redirect('/view-users');

}?>