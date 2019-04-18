<?php

return function($req, $res) {

    $res->render('main', 'user-login', [
        'pageTitle' => 'User Login'
        
    ]);
}
?>