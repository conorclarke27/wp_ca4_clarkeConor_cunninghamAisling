<?php return function($req, $res) {

  $req->sessionStart();
  $db = \Rapid\Database::getPDO();
  require('./models/UserType.php');
  require('./lib/utils/FormUtils.php');

  $admin = $req->session("Admin");

  if($admin) {

    $form_error_messages = [];

    $form_was_posted = $req->body('typename') !== NULL;

    $typename = FormUtils::getPostName($req->body('typename'));

    if (!$typename['is_valid']) {
      $form_error_messages['typename'] = 'Invalid Type name';
    }

    if(!$form_was_posted || count($form_error_messages) > 0) {
      $res->render('main', 'add-userTypes', [
        'pageTitle' => 'Add User Types',
        'form_error_messages'   => $form_error_messages
      ]);
    }

    else {
      $type = new UserType([
        'typename' => $req->body('typename')
      ]);
  
      UserType::insert($db, $type);
  
      $res->redirect('/view-userTypes');
    }

  }
  else {
      $res->render('main', '404', []);
  }
}
 ?>