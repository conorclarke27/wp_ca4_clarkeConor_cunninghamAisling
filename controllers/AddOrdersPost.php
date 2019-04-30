<?php return function($req, $res) {

 $req->sessionStart();
  $db = \Rapid\Database::getPDO();
  require('./models/Order.php');

  $order = new Order([
    'user_id' => $req->body('user_id'),
    'coffee_id' => $req->body('coffee_id')
  ]);

  Order::insert($db, $order);

  $res->render('main', 'add-orders', [
    'pageTitle' => 'Add Orders',
    'order'   => $order
  ]);

} ?>