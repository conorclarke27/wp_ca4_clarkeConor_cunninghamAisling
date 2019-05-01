<?php return function($req,$res){
    $req->sessionStart();
    $db = \Rapid\Database::getPDO();
    require('./models/User.php');
    require('./lib/utils/FormUtils.php');

    $form_was_posted = [];

    $form_was_posted = $req->body('username') !== NULL;

    $username = FormUtils::getPostString($req->body('username')); 
    $password = $req->body('password1');
    $confirmPassword = $req->body('password2');

    if($password === $confirmPassword)
    {
        $password1 = FormUtils::getPostPassword($password);
        $passwordhash = password_hash($password1,PASSWORD_BCRYPT,['cost' => 12]);
    }
    $email = FormUtils::getPostEmail($req->body('email'));
    $supplier_name = FormUtils::getPostString($req->body('supplier_name'));
    

    if (!$username['is_valid']) {
        $form_error_messages['username'] = 'Please enter a valid username';
    }
    if (!$email['is_valid']) {
        $form_error_messages['email'] = 'Invalid Email must be in format joe@bloggs.com';
    }
    if (!$password1['is_valid']) {
        $form_error_messages['password'] = 'Invalid Password must include a lower case, an upper case, a number and a special character';
    }
    

    if(!$form_was_posted || count($form_error_messages) > 0) {
        $res->render('main', 'add-user', [
          'pageTitle' => 'Add Users',
          'form_error_messages'   => $form_error_messages
        ]);
    }

    else {
        $user = new User([
            'type_id' => 1,
            'username' => $username,
            'password' => $passwordhash,
            'email'=> $email['value'],
            'supplier_name'=> $supplier_name
        ]);
    
        User::insert($db,$user);
        $req->sessionSet('LOGGED_IN',TRUE);
        $req->sessionSet('Name',$user->getUsername());
    
        $res->redirect('/view-coffees');
    }

    
        
    
    }?>