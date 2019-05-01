<?php return function($req, $res) {

  $req->sessionStart();
  $db = \Rapid\Database::getPDO();
  require('./models/Order.php');
  $admin = $req->session("Admin");
  $user = $req->session("Id");

  if($admin)
  {
    $orders = Order::findAll($db);
    $res->render('main', 'view-orders', [
      'pageTitle' => 'View Orders',
      'viewAllOrders' => $orders
    ]);
  }
  else if(!($user === NULL))
  {
    $orders= Order::findAllByUserID($db,$user);

  $res->render('main', 'view-orders', [
      'pageTitle' => 'View Orders',
      'viewAllOrders' => $orders
  ]);
  } 
  else
  {
    $res->render('main', '404', []);
  }
  
  

} ?>