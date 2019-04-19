<?php

return function($req, $res) {
    $db = \Rapid\Database::getPDO();
    require('./models/User.php');
    $users = User::findAll($db);
    $res->render('main', 'view-users', [
        'pageTitle' => 'View Users',
        'viewAllUsers' => $users
    ]);
}
?>