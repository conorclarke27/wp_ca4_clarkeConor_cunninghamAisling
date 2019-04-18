<?php return function($req, $res) {

  $db = \Rapid\Database::getPDO();
  require('./models/Orders.php');

  $orders = Orders::findAll($db);

  $res->render('main', 'view-orders', [
      'pageTitle' => 'View Orders',
      'viewAllOrders' => $orders
  ]);

} ?>