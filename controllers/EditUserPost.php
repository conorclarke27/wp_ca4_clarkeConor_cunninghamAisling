<?php return function($req, $res) {
    $req->sessionStart(); 
    $db = \Rapid\Database::getPDO();
    require('./models/User.php');


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

} ?>