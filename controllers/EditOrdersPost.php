<?php return function($req, $res) {

    $db = \Rapid\Database::getPDO();
    require('./models/Order.php');

    $order = new Order([
        'order_id' => $req->query('order_id'),
        'user_id' => $req->body('user_id'),
        'coffee_id' => $req->body('coffee_id')
    ]);

    Orders::update($db, $order);

} ?>