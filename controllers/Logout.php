<?php return function($req, $res) {
$req->sessionStart();
$req->sessionDestroy();
$res->redirect("./user-login");

}
?>