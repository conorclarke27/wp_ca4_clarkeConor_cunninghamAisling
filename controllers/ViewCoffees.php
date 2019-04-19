<?php return function($req, $res) {

    $db = \Rapid\Database::getPDO();
    require('./models/Coffee.php');

    $coffees = Coffee::findAll($db);

    $res->render('main', 'view-coffees', [
        'pageTitle' => 'View Coffees',
        'viewAllCoffees' => $coffees
    ]);
    
} ?>