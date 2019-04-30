<?php return function($req, $res) {
  $req->sessionStart();
  $admin = $req->session("Admin");
  
  if($admin)
  {
    $res->render('main', 'add-userTypes', [
    'pageTitle' => 'Add User Types'
    
  ]);
}
  else
  {
    $res->render('main', '404', []);
  }
  
  } ?>