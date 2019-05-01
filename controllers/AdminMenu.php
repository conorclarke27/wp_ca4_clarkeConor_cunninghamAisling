<?php return function($req, $res) {
    $req->sessionStart();
    $admin = $req->session("Admin");

    if($admin)
    {
        $res->render('main', 'admin-menu', [
            'pageTitle' => 'Admin Menu'
        ]);
    }
    else
    {
        $res->render('main', '404', []);
    }
}
 ?>