<?php return function($req, $res) {
$req->sessionStart();
$req->sessionDestroy();
header('Location: login.php');

}
?>