<?php return function($req, $res) {

  $req->sessionStart();
  $db = \Rapid\Database::getPDO();
  require('./models/Order.php');

  $orders = Order::findAll($db);

  $res->render('main', 'view-orders', [
      'pageTitle' => 'View Orders',
      'viewAllOrders' => $orders
  ]);

} ?>