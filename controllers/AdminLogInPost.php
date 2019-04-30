<?php return function($req, $res) {
    
    require('./models/User.php');
    $req->sessionStart();

    $db = \Rapid\Database::getPDO();
    $email = $req->body('email');
    $userInput = $req->body('password');
    
    $user = User::findOneByEmail($email,$db);
    
    if(!($user->getUserId() === NULL))
    {
        $userType = $user->getUserType();
        if($userType == '2')
        {
            $userPassword =  $user->getPassword();
            $valid       = password_verify($userInput,$userPassword);
            if($valid)
            {
                $req->sessionSet('LOGGED_IN',$userId);
                $req->sessionSet('Admin',TRUE);
                $res->redirect('/admin-menu');
            }
        }
        
        
    }
    else
    {
        $req->sessionSet('LOGGED_IN',FALSE);
        echo('User null');
    }

    
}



?>