<?php return function($req, $res) {
    $req->sessionStart(); 

  $db = \Rapid\Database::getPDO();
  require('./models/Coffee.php');
  require('./lib/utils/FormUtils.php');

  $form_error_messages = [];

  $form_was_posted = $req->query('coffee_id') !== NULL;

  $coffee_id = FormUtils::getPostInt($req->query('coffee_id'));
  $coffee_name = FormUtils::getPostName($req->body('coffee_name'));
  $supplier_name = FormUtils::getPostName($req->body('supplier_name'));
  $price = FormUtils::getPostFloat($req->body('price'), 0, 2000);
  $quantity = FormUtils::getPostInt($req->body('quantity'));

  if (!$coffee_name['is_valid']) {
      $form_error_messages['coffee_name'] = 'Invalid Coffee name (e.g. Kenco, Kenco Farm)';
  }

  if (!$supplier_name['is_valid']) {
    $form_error_messages['supplier_name'] = 'Invalid supplier name (e.g. Kenco Farm, Kenco)';
  }

  if (!$price['is_valid']) {
      $form_error_messages['price'] = ' Invalid price (e.g. 10.99)';
  }

  if (!$quantity['is_valid']) {
    $form_error_messages['quantity'] = 'Invalid quantity (e.g 10)';
  }

  if(!$form_was_posted || count($form_error_messages) > 0) {
    $coffee = Coffee::findOneById($db, $coffee_id['value']);
    $res->render('main', 'edit-coffees', [
      'pageTitle' => 'Edit Coffees',
      'form_error_messages'   => $form_error_messages,
      'coffee' => $coffee
    ]);
  }
  
  else {
    $coffee = new Coffee([
      'coffee_id' => $coffee_id['value'],
      'coffee_name' => $coffee_name['value'],
      'supplier_name' => $supplier_name['value'],
      'price' => $price['value'],
      'quantity' => $quantity['value']
    ]);

    Coffee::update($db, $coffee);

    $res->redirect("/view-coffees");
  }
  


} ?>