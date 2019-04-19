<?php return function($req, $res) {

    $db = \Rapid\Database::getPDO();
    require('./models/Coffee.php');

    $coffee = new Coffee([
        'coffee_name' => $req->body('coffee_name'),
        'supplier_name' => $req->body('supplier_name'),
        'price' => $req->body('price'),
        'quantity' => $req->body('quantity')
    ]);

    Coffee::insert($db, $coffee);

    $res->render('main', 'add-coffees', [
        'pageTitle' => 'Add Coffees',
        'coffee'   => $coffee
    ]);

} ?>