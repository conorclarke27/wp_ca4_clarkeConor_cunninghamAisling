<?php return function($req, $res) {

  $res->render('main', 'add-coffees', [
    'pageTitle' => 'Add Coffees'
    // 'successMessage' => $req->query('success') ? 'Successfully added New Coffee' : ''
  ]);

} ?>