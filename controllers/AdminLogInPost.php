<?php return function($req, $res) {
    $req->sessionStart();
    $db = \Rapid\Database::getPDO();
    require('./models/User.php');
    require('./lib/utils/FormUtils.php');

    $error['error'] = "Invalid email or password";

    if($req->body('email') !== NULL || $req->body('password') !== NULL) {
        $email = FormUtils::getPostEmail($req->body('email'));
        $userInput = $req->body('password');
        
        if(!$email['is_valid'] || $email !== NULL) {
            $user = User::findOneByEmail($email['value'],$db);
    
            if($user !== NULL)
            {
                $userType = $user->getUserType();
                $name     = $user->getUsername();
                $id       = $user->getUserId();
                if($userType == '2')
                {
                    $userPassword =  $user->getPassword();
                    $valid       = password_verify($userInput,$userPassword);
                    if($valid)
                    {
                        $req->sessionSet('LOGGED_IN',TRUE);
                        $req->sessionSet('Name',$name);
                        $req->sessionSet('Id', $id);
                        $req->sessionSet('Admin',TRUE);
                        $res->redirect('/admin-menu');
                    }
                }
            }
        }
    }

    $req->sessionSet('LOGGED_IN',FALSE);
    $res->render('main', 'admin-login', [
        'form_error_messages' => $error
    ]);


} ?>