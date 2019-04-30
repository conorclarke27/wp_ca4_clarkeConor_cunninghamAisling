<?php return function($req, $res) {

    $req->sessionStart();
    $db = \Rapid\Database::getPDO();
    require('./models/Coffee.php');
    require('./lib/utils/FormUtils.php');

    $form_error_messages = [];

    $form_was_posted = $req->body('coffee_name') !== NULL;

    $coffee_name    = FormUtils::getPostName($req->body('coffee_name'));
    $supplier_name  = FormUtils::getPostName($req->body('supplier_name'));
    $price          = FormUtils::getPostFloat($req->body('price'));
    $quantity       = FormUtils::getPostInt($req->body('quantity'));

    if (!$coffee_name['is_valid']) {
        $form_error_messages['coffee_name'] = 'Coffee name required';
    }

    if (!$supplier_name['is_valid']) {
        $form_error_messages['supplier_name'] = 'Supplier name required';
    }

    if (!$price['is_valid']) {
        $form_error_messages['price'] = 'Price required';
    }

    if (!$quantity['is_valid']) {
        $form_error_messages['quantity'] = 'Quantity required';
    }

    if(!$form_was_posted || count($form_error_messages) > 0) {
        $res->render('main', 'add-coffees', [
            'pageTitle' => 'Add Coffees',
            'form_error_messages'   => $form_error_messages
        ]);
    }

    else {
        $coffee = new Coffee([
            'coffee_name' => $coffee_name['value'],
            'supplier_name' => $supplier_name['value'],
            'price' => $price['value'],
            'quantity' => $quantity['value']
        ]);

        Coffee::insert($db, $coffee);

        $res->redirect('/add-coffees');
    }

} ?>