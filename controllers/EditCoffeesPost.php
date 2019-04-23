<?php return function($req, $res) {

  $db = \Rapid\Database::getPDO();
  require('./models/Coffee.php');

  $coffee = new Coffee([
      'coffee_id' => $req->query('coffee_id'),
      'coffee_name' => $req->body('coffee_name'),
      'supplier_name' => $req->body('supplier_name'),
      'price' => $req->body('price'),
      'quantity' => $req->body('quantity')
  ]);

  Coffee::update($db, $coffee);

  $res->redirect("/view-coffees");


} ?>