<?php return function($req, $res) {

    $req->sessionStart();

    $res->render('main', 'user-login', [
        'pageTitle' => 'User Login'
        
    ]);
}
?>