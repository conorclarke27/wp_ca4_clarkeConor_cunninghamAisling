<?php require_once('models/User.php'); ?>
<?php return function($req, $res){
   $db = \Rapid\Database::getPDO();
  // Get RAW posted JSON body (as a string)
  $JSONBody = file_get_contents('php://input');

  // If there is content, convert string to an
  // associative array
  $JSONBody = $JSONBody !== FALSE
    ? json_decode($JSONBody, TRUE) // The TRUE is to return as an associative array
    : NULL;
  
 // If data was received, add an ID and send back (as JSON)
  if ($JSONBody) 
  {
    $user1 = User::findOneByEmail($JSONBody['email'],$db);
    
    $userPassword =  $user1->getPassword();

    $userInput = $JSONBody['password'];

    $valid       = password_verify($userInput,$userPassword);
    
    if($valid)
    {
      echo json_encode(['message' => 'Success']);
    }
    else 
    {
      //http_response_code(400);
      echo json_encode(['message' => 'Fail']);
    }
  }

  // Otherwise, return an error
  else 
  {
    //http_response_code(400);
    echo json_encode(['message' => 'Fail']);
  }
}



?>