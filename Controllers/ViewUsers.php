<?php

return function($req, $res) {
    $db = \Rapid\Database::getPDO();
    require('./models/Users.php');
    $users = Users::findAll($db);
    $res->render('main', 'view-Users', [
        'pageTitle' => 'View Users',
        'viewAllUsers' => $users
    ]);
}
?>