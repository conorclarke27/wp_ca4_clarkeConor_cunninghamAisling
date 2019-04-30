<?php return function($req, $res) {
    $req->sessionStart();


    $res->render('main', 'home', [
        'pageTitle' => 'Home',
    ]);
}
?>