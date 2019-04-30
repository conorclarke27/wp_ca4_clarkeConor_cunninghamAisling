<?php return function($req,$res){
    $req->sessionStart();
    

    $db = \Rapid\Database::getPDO();
    require('./models/User.php');

    $form_was_posted = [];

    $form_was_posted = $req->body('username') !== NULL;

    $username = $req->body('username'); //ADD FORM VALIDATION HERE!!!!
    $password = password_hash($req->body('password'),PASSWORD_BCRYPT,['cost' => 12]);
    $email = FormUtils::getPostEmail($req->body('email'));
    $supplier_name = $req->body('supplier_name');
    
    //ADD ERROR MESSAGES HERE!!!!

    if (!$email['is_valid']) {
        $form_error_messages['email'] = 'Invalid Email';
    }
    
    // ???? Don't know if this should be here because of admin?????
    // if (!$supplier_name['is_valid']) {
    //     $form_error_messages['supplier_name'] = 'Supplier required';
    // }

    if(!$form_was_posted || count($form_error_messages) > 0) {
        $res->render('main', 'add-users', [
          'pageTitle' => 'Add Users',
          'form_error_messages'   => $form_error_messages
        ]);
    }

    else {
        $user = new User([
            'type_id' => 1,
            'username' => $username,
            'password' => $password,
            'email'=> $email['value'],
            'supplier_name'=> $supplier_name
        ]);
    
        User::insert($db,$user);
        $req->sessionSet('LOGGED_IN',TRUE);
        $req->sessionSet('Name',$user->getUsername());
    
        $res->redirect('/view-coffees');
    }

    
        
    
    }?>