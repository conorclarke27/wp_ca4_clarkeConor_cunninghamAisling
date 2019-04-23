<?php return function($req,$res){

    $db = \Rapid\Database::getPDO();
    require('./models/User.php');

    $pass = $req->body('password');
    $pass2 = $req->body('password2');

    if($req->body('type_id')=='2')
    {
        if(($pass == $pass2) && ($pass== 'admin'))
        {
            $user = new User([
                'type_id' => $req->body('type_id'),
                'username' => $req->body('username'),
                'password' => password_hash($req->body('password'),PASSWORD_BCRYPT,['cost' => 12]),
                'email'=> $req->body('email'),
                'supplier_name'=> $req->body('supplier_name')
            ]);
        
            User::insert($db,$user);
        
            
            $res->render('main', 'add-user', [
                'pageTitle' => 'Add Users',
                'user' => $user
                ]);
        }
        else
        {
            echo "not an  admin password";
        }
    }
    else{
        if($req->body('password') == $req->body('password2'))
    {
        $user = new User([
            'type_id' => $req->body('type_id'),
            'username' => $req->body('username'),
            'password' => password_hash($req->body('password'),PASSWORD_BCRYPT,['cost' => 12]),
            'email'=> $req->body('email'),
            'supplier_name'=> $req->body('supplier_name')
        ]);
    
        User::insert($db,$user);
    
        
        $res->render('main', 'add-user', [
            'pageTitle' => 'Add Users',
            'user' => $user
            ]);

    }
    else
    {
        echo "Passwords do not match";
    }


    }

    
   
}?>