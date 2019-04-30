<?php return function($req, $res) {
    $req->sessionStart();
    $admin = $req->session("Admin");

if($admin)
{
    $db = \Rapid\Database::getPDO();
    require('./models/User.php');
    $users = User::findAll($db);
    $res->render('main', 'view-users', [
        'pageTitle' => 'View Users',
        'viewAllUsers' => $users
    ]);
}
else
{
    $res->render('main', '404', []);
}
}
?>