<?php return function($req, $res) {

 $req->sessionStart();
  $db = \Rapid\Database::getPDO();
  require('./models/Order.php');
  require('./lib/utils/FormUtils.php');

  $form_error_messages = [];

  $form_was_posted = $req->body('user_id') !== NULL;

  $user_id = FormUtils::getPostInt($req->body('user_id'));
  $coffee_id = FormUtils::getPostInt($req->body('coffee_id'));

  if (!$user_id['is_valid']) {
    $form_error_messages['user_id'] = 'User ID required';
  }

  if (!$coffee_id['is_valid']) {
      $form_error_messages['coffee_id'] = 'Coffee ID required';
  }

  if(!$form_was_posted || count($form_error_messages) > 0) {
      $res->render('main', 'add-orders', [
        'pageTitle' => 'Add Orders',
        'form_error_messages'   => $form_error_messages
      ]);
  }

  else {
    $order = new Order([
      'user_id' => $user_id['value'],
      'coffee_id' => $coffee_id['value']
    ]);
  
    Order::insert($db, $order);
  
    $res->redirect('/view-orders');
  }

} ?>