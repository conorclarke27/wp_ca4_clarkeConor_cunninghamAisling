<?php return function($req, $res) {

  $res->render('main', 'add-userTypes', [
    'pageTitle' => 'Add User Types'
    // 'successMessage' => $req->query('success') ? 'Successfully added New Coffee' : ''
  ]);

} ?>