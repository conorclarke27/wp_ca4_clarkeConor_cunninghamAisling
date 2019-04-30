<?php return function($req, $res) {

    $req->sessionStart();
    $admin = $req->session("Admin");
    $db = \Rapid\Database::getPDO();
    require('./models/Coffee.php');

    $coffees = Coffee::findAll($db);

    $res->render('main', 'view-coffees', [
        'pageTitle' => 'View Coffees',
        'viewAllCoffees' => $coffees,
        'admin' => $admin
    ]);
    
} ?>