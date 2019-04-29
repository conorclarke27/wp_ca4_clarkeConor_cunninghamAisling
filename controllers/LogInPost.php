<?php return function($req, $res) {
    
    require('./models/User.php');
    $req->sessionStart();

    $db = \Rapid\Database::getPDO();
    $email = $req->body('email');
    $userInput = $req->body('password');
    
    $user = User::findOneByEmail($email,$db);
    $userPassword =  $user->getPassword();
    
    $valid       = password_verify($userInput,$userPassword);
    
    if($valid)
    {
        $req->sessionSet('LOGGED_IN',TRUE);
        $res->redirect('/');
    
    }
    else
    {
        $req->sessionSet('LOGGED_IN',FALSE);
        
        $res->redirect('/user-login');
    }
}



?>