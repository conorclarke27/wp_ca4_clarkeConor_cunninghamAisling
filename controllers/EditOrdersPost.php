<?php return function($req, $res) {

    $db = \Rapid\Database::getPDO();
    require('./models/Orders.php');

    $order = new Orders([
        'order_id' => $req->query('order_id'),
        'user_id' => $req->body('user_id'),
        'coffee_id' => $req->body('coffee_id')
    ]);

    Orders::update($db, $order);

} ?>