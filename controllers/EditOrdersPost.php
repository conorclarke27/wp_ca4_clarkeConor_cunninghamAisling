<?php return function($req, $res) {
    $req->sessionStart(); 
    $db = \Rapid\Database::getPDO();
    require('./models/Order.php');
    require('./models/Coffee.php');
    require('./lib/utils/FormUtils.php');

    $form_error_messages = [];
  
    $form_was_posted = $req->query('order_id') !== NULL;
  
    $order_id = FormUtils::getPostInt($req->query('order_id'));
    $user_id = FormUtils::getPostInt($req->body('user_id'));
    $coffee_id = FormUtils::getPostInt($req->body('coffee_id'));

    if (!$user_id['is_valid']) {
      $form_error_messages['user_id'] = 'Invalid user ID (e.g. 2)';
    }
  
    if (!$coffee_id['is_valid']) {
        $form_error_messages['coffee_id'] = 'You must pick a Coffee name';
    }

    if(!$form_was_posted || count($form_error_messages) > 0) {
        $order = Order::findOneById($db, $order_id['value']);
        $coffees = Coffee::findAll($db);
        $res->render('main', 'edit-orders', [
            'pageTitle' => 'Edit Orders',
            'form_error_messages'   => $form_error_messages,
            'viewAllCoffees' => $coffees,
            'order' => $order
        ]);
    }

    else {
        $order = new Order([
            'order_id' => $order_id['value'],
            'user_id' => $user_id['value'],
            'coffee_id' => $coffee_id['value']
        ]);
    
        Order::update($db, $order);
        
        $res->redirect("/view-orders");
    }
    
} ?>