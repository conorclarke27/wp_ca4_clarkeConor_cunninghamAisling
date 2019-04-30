<?php return function($req, $res) {
  $req->sessionStart(); 
    
    
  $db = \Rapid\Database::getPDO();
  require('./models/UserType.php');

  $type_id    = $req->query('type_id');
  $type       = UserType::findOneById($db, $type_id);

  UserType::delete($db, $type);

  $res->redirect('/view-userTypes');
}
?>