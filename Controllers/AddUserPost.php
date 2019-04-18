<?php return function($req,$res){

    $db = \Rapid\Database::getPDO();
    require('./models/Users.php');

    $user = new User([
        'type_id' => $req->body('type_id'),
        'username' => $req->body('username'),
        'password' => password_hash($req->body('password'),PASSWORD_BCRYPT,['cost' => 12]);
        'email'=> $req->body('email'),
        'supplier_name'=> $req->body('supplier_name')
    ])

    Users::insert($db,$user);

    
    $res->render('main', 'add-user-login', [
        'pageTitle' => 'Add Users',
        'user' => $user
        ]);
}?>