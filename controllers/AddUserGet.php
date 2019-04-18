<?php

return function($req, $res) {

    $res->render('main', 'add-user-login', [
        'pageTitle' => 'Add Users'
        
    ]);
}
?>