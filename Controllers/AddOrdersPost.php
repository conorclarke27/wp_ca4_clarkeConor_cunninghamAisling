<?php return function($req, $res) {

  $db = \Rapid\Database::getPDO();
  require('./models/Orders.php');

  $order = new Orders([
    'user_id' => $req->body('user_id'),
    'coffee_id' => $req->body('coffee_id')
  ]);

  Orders::insert($db, $order);

  $res->render('main', 'add-orders', [
    'pageTitle' => 'Add Orders',
    'order'   => $order
  ]);

} ?>