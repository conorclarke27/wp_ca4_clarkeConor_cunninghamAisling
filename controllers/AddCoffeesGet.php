<?php return function($req, $res) {
$req->sessionStart();
$admin = $req->session("Admin");

if($admin)
{
  $res->render('main', 'add-coffees', [
    'pageTitle' => 'Add Coffees'
    
  ]);
}
else
{
  $res->render('main', '404', []);
}

} ?>