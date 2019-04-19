<?php return function($req, $res) {

  $db = \Rapid\Database::getPDO();
  require('./models/Coffee.php');


  $coffee_id    = $req->query('coffee_id');
  $coffee       = Coffee::findOneById($db, $coffee_id);
  print_r($coffee);

  $res->render('main', 'edit-coffees', [
      // 'successMessage'    => $req->query('success') ? 'Successfully updated Order!!!' : '',
      'pageTitle'         => 'Edit Order',
      'coffee'             => $coffee
  ]);

} ?>
