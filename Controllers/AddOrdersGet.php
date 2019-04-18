<?php return function($req, $res) {

  $res->render('main', 'add-orders', [
    'pageTitle' => 'Add Orders'
    // 'successMessage' => $req->query('success') ? 'Successfully added New Coffee' : ''
  ]);

} ?>