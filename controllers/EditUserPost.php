<?php return function($req, $res) {
    $req->sessionStart(); 
    $db = \Rapid\Database::getPDO();
    require('./models/User.php');
    require('./lib/utils/FormUtils.php');

    $form_was_posted = [];
    $form_error_messages = [];

    $form_was_posted = $req->body('username') !== NULL;

    $userType = FormUtils::getPostString($req->body('type_id'));
    $username = FormUtils::getPostString($req->body('username')); 
    $email = FormUtils::getPostEmail($req->body('email'));
    $supplier_name = FormUtils::getPostString($req->body('supplier_name'));
    $password = FormUtils::getPostString($req->body('password'));

    $regex = "/(?=^.{8,}$)(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[\W])^.*/";

        if(!preg_match($regex, $password['value'])) 
        {
            $form_error_messages['password'] = 'Invalid Password must be at least 8 characters, include a lower case, an upper case, a number and a special character';
        }
        else
        {
            $passwordhash = password_hash($password['value'],PASSWORD_BCRYPT,['cost' => 12]);
        }

        if (!$userType['is_valid']) {
            $form_error_messages['username'] = 'Please enter a valid user type';
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
            $user    = User::findOneByEmail($email['value'],$db);
            $res->render('main', 'edit-users', [
                'pageTitle' => 'Edit User',
                'form_error_messages'   => $form_error_messages,
                'user' => $user
            ]);
          }
        
        
    

        else {
    $user = new User([
        'user_id' => $req->query('user_id'),
        'type_id' => $req->body('type_id'),
        'username' => $req->body('username'),
        'password' => password_hash($req->body('password'),PASSWORD_BCRYPT,['cost' => 12]),
        'email'=> $req->body('email'),
        'supplier_name'=> $req->body('supplier_name')
    ]);

    User::update($db,$user);

    $res->redirect('/view-users');
        }

} ?>