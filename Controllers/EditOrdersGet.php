<?php return function($req, $res) {

  $db = \Rapid\Database::getPDO();
  require('./models/Orders.php');

  
  $order_id    = $req->query('order_id');
  $order       = Orders::findOneById($db, $order_id);
  print_r($order);
  $res->render('main', 'edit-orders', [
      // 'successMessage'    => $req->query('success') ? 'Successfully updated Order!!!' : '',
      'pageTitle'         => 'Edit Order',
      'order'             => $order
  ]);

} ?>
