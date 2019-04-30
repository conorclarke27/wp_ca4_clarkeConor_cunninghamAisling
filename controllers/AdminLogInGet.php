<?php return function($req, $res) {

$req->sessionStart();

$res->render('main', 'admin-login', [
    'pageTitle' => 'Admin Login'
    
]);
}
?>