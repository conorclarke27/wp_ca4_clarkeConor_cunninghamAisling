<?php

return function($req, $res) {
$db = \Rapid\Database::getPDO();
require('./models/Coffees.php');

$coffees = Coffees::findAll($db);

$res->render('main', 'view_coffees', [
    'pageTitle' => 'View Coffees',
    'viewAllCoffees' => $coffees
]);
}
?>