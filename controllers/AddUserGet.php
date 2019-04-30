<?php return function($req, $res) {
$req->sessionStart();
$db = \Rapid\Database::getPDO();
require('./models/UserType.php');
$types = UserType::findAll($db);

    $res->render('main', 'add-user', [
        'pageTitle' => 'Add Users',
        'viewAllTypes' => $types
        
    ]);
}
?>