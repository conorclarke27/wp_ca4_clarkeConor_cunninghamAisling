<?php return function($req, $res) {
  $req->sessionStart(); 
  $db = \Rapid\Database::getPDO();
  require('./models/Order.php');
  require('./models/Coffee.php');

  
  $order_id    = $req->query('order_id');
  $order       = Order::findOneById($db, $order_id);
  $coffees = Coffee::findAll($db);
  $res->render('main', 'edit-orders', [
      // 'successMessage'    => $req->query('success') ? 'Successfully updated Order!!!' : '',
      'pageTitle'         => 'Edit Order',
      'order'             => $order,
      'viewAllCoffees' => $coffees
  ]);

} ?>
