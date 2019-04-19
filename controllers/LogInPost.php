<?php

return function($req, $res) {

    $db = \Rapid\Database::getPDO();

    require('./models/Coffees.php');
    $coffees = Coffee::findAll($db);

    
    require('./models/Users.php');
    
    $userInput = $req->body('password');
    
    $user = User::findOneByEmail($req->body('email'),$db);
    $userPassword =  $user->getPassword();
    
    $valid       = password_verify($userInput,$userPassword);
    
    if($valid)
    {
        $res->render('main', 'view-coffees', [
            'pageTitle' => 'View Coffees',
            'viewAllCoffees' => $coffees
        ]);
    
    }
    else
    {
        echo 'Passwords do not match';
    }
}



?>