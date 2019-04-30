<?php return function($req, $res) {
    $req->sessionStart(); 

  $db = \Rapid\Database::getPDO();
  require('./models/Coffee.php');


  $coffee_id    = $req->query('coffee_id');
  $coffee       = Coffee::findOneById($db, $coffee_id);

  $res->render('main', 'edit-coffees', [
      'pageTitle'         => 'Edit Order',
      'coffee'             => $coffee
  ]);

} ?>
