<?php return function($req, $res) {
  $req->sessionStart(); 
  $db = \Rapid\Database::getPDO();
  require('./models/UserType.php');
  require('./lib/utils/FormUtils.php');

  $form_error_messages = [];
  
  $form_was_posted = $req->query('type_id') !== NULL;
  $type_id = FormUtils::getPostInt($req->query('type_id'));
  $typename = FormUtils::getPostName($req->body('typename'));
  if (!$typename['is_valid']) {
    $form_error_messages['typename'] = 'Invalid Type name (e.g. Sales, Student Developers)';
  }

  if(!$form_was_posted || count($form_error_messages) > 0) {
    $type    = UserType::findOneById($db, $type_id['value']);
    $res->render('main', 'edit-userTypes', [
        'pageTitle' => 'Edit Orders',
        'form_error_messages'   => $form_error_messages,
        'type' => $type
    ]);
  }

  else {
    $type = new UserType([
      'type_id' => $type_id['value'],
      'typename' => $typename['value']
    ]);
  
    UserType::update($db,$type);
  
    $res->redirect('/view-userTypes');
  }

} ?>