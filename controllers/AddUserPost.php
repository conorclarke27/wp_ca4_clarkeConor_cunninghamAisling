<?php return function($req,$res){
    $req->sessionStart();
    

    $db = \Rapid\Database::getPDO();
    require('./models/User.php');

    
            $user = new User([
                'type_id' => $req->body('type_id'),
                'username' => $req->body('username'),
                'password' => password_hash($req->body('password'),PASSWORD_BCRYPT,['cost' => 12]),
                'email'=> $req->body('email'),
                'supplier_name'=> $req->body('supplier_name')
            ]);
        
            User::insert($db,$user);
            $req->sessionSet('LOGGED_IN',TRUE);
            $res->redirect('/view-coffees');
        
    
    }?>