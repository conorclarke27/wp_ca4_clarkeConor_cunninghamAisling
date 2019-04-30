<?php return function($req, $res) {
    
    require('./models/User.php');
    $req->sessionStart();

    $db = \Rapid\Database::getPDO();
    $email = $req->body('email');
    $userInput = $req->body('password');
    
    $user = User::findOneByEmail($email,$db);
    


    if(!($user->getUserId() === NULL))
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
    else
    {
        $req->sessionSet('LOGGED_IN',FALSE);
        $res->redirect('/user-login');
    }
    
}



?>