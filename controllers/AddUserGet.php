<?php

return function($req, $res) {

    $res->render('main', 'add-user', [
        'pageTitle' => 'Add Users'
        
    ]);
}
?>