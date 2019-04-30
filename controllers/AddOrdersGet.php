<?php return function($req, $res) {

  $req->sessionStart();
  $res->render('main', 'add-orders', [
    'pageTitle' => 'Add Orders'
    // 'successMessage' => $req->query('success') ? 'Successfully added New Coffee' : ''
  ]);

} ?>