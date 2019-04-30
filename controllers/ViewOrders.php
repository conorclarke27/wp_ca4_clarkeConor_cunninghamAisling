<?php return function($req, $res) {

  $req->sessionStart();
  $db = \Rapid\Database::getPDO();
  require('./models/Order.php');



  $user = $_SESSION['Id'];
  //$orders = Order::findAll($db);
  $orders= Order::findAllByUserID($db,$user);

  $res->render('main', 'view-orders', [
      'pageTitle' => 'View Orders',
      'viewAllOrders' => $orders
  ]);

} ?>