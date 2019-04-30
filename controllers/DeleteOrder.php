<?php return function($req, $res) {
  $req->sessionStart();
  $db = \Rapid\Database::getPDO();
  require('./models/Order.php');

  $order_id    = $req->query('order_id');
  $order       = Order::findOneById($db, $order_id);

  Order::delete($db, $order);

  $res->redirect('/view-orders');

}?>