<?php return function($req,$res){
    $req->sessionStart();
    $db = \Rapid\Database::getPDO();
    require('./models/User.php');
    require('./lib/utils/FormUtils.php');

    $form_was_posted = [];
    $form_error_messages = [];

    $form_was_posted = $req->body('username') !== NULL;

    
    $username = FormUtils::getPostString($req->body('username')); 
    $email = FormUtils::getPostEmail($req->body('email'));
    $supplier_name = FormUtils::getPostString($req->body('supplier_name'));
    $password = FormUtils::getPostString($req->body('password1'));

    $regex = "/(?=^.{8,}$)(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[\W])^.*/";

    
    
    if(!($req->body('password1') === $req->body('password2')))
    {
        $form_error_messages['password'] = 'Password and confirm passwords must match';
    }
    else
    {
        $regex = "/(?=^.{8,}$)(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[\W])^.*/";
        //input must be like preg_match below
        if(!preg_match($regex, $password['value'])) 
        {
            $form_error_messages['password'] = 'Invalid Password must be at least 8 characters, include a lower case, an upper case, a number and a special character';
        }
        else
        {
            $passwordhash = password_hash($password['value'],PASSWORD_BCRYPT,['cost' => 12]);
        }

        
    }

    if (!$username['is_valid']) {
        $form_error_messages['username'] = 'Please enter a valid username';
    }
    if (!$email['is_valid']) {
        $form_error_messages['email'] = 'Invalid Email must be in format joe@bloggs.com';
    }
    if (!$password['is_valid']) 
    {
        $form_error_messages['password'] = 'Invalid Password must be at least 8 characters, include a lower case, an upper case, a number and a special character';
    }
    if (!$email['is_valid']) {
        $form_error_messages['email'] = 'Invalid Email';
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
            'username' => $username['value'],
            'password' => $passwordhash,
            'email'=> $email['value'],
            'supplier_name'=> $supplier_name['value']
        ]);
    
        User::insert($db,$user);
        $req->sessionSet('LOGGED_IN',TRUE);
        $req->sessionSet('Name',$user->getUsername());
    
        $res->redirect('/view-coffees');
    }

    
        
    
    }?>