<?php return function($req, $res) {
    $req->sessionStart();
    $db = \Rapid\Database::getPDO();  
    require('./models/User.php');
    require('./lib/utils/FormUtils.php');
    
    $error['error'] = "Invalid email or password";

    if($req->body('email') !== NULL || $req->body('password') !== NULL) {
        $email = FormUtils::getPostEmail($req->body('email'));
        $userInput = $req->body('password');
        
        if($email['is_valid'] || $email !== NULL) {
            $user = User::findOneByEmail($email['value'],$db);

            if($user !== NULL)
            {
                $userPassword =  $user->getPassword();
                $name         =  $user->getUsername();
                $id           =  $user->getUserId();
            
                $valid       = password_verify($userInput,$userPassword);

                if($valid)
                {
                    $req->sessionSet('LOGGED_IN',TRUE);
                    $req->sessionSet('Name', $name);
                    $req->sessionSet('Id', $id);
                    $res->redirect('/');
                }
            }
        }
    }

    $req->sessionSet('LOGGED_IN',FALSE);
    $res->render('main', 'user-login', [
            'form_error_messages' => $error
    ]);
    
} ?>