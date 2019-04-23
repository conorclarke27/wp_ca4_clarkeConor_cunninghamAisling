<?php return function($req, $res) {

  $db = \Rapid\Database::getPDO();
  require('./models/Coffee.php');


  $coffee_id    = $req->query('coffee_id');
  $coffee       = Coffee::findOneById($db, $coffee_id);

  $res->render('main', 'edit-coffees', [
      'pageTitle'         => 'Edit Order',
      'coffee'             => $coffee
  ]);

} ?>
