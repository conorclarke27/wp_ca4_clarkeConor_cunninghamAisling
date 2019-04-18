<?php return function($req, $res) {

  $db = \Rapid\Database::getPDO();
  require('./models/Coffees.php');

  $coffee = new Coffees([
      'coffee_id' => $req->query('coffee_id'),
      'coffee_name' => $req->body('coffee_name'),
      'supplier_name' => $req->body('supplier_name'),
      'price' => $req->body('price'),
      'quantity' => $req->body('quantity')
  ]);

  Coffees::update($db, $coffee);

} ?>