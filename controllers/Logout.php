<?php return function($req, $res) {
$req->sessionStart();
$req->sessionDestroy();
header('Location: /user-login');

}
?>