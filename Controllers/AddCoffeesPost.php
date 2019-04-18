<?php return function($req, $res) {

    $db = \Rapid\Database::getPDO();
    require('./models/Coffees.php');

    $coffee = new Coffees([
        'coffee_name' => $req->body('coffee_name'),
        'supplier_name' => $req->body('supplier_name'),
        'price' => $req->body('price'),
        'quantity' => $req->body('quantity')
    ]);

    Coffees::insert($db, $coffee);

    $res->render('main', 'add-coffees', [
        'pageTitle' => 'Add Coffees',
        'coffee'   => $coffee
    ]);

} ?>