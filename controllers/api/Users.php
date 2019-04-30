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
    if(!($JSONBody['name']== NULL || $JSONBody['email']== NULL || $JSONBody['password1'] == NULL || $JSONBody['password2'] == NULL ))
    {

    $user = User::findOneByEmail($JSONBody['email'],$db);

    $password = $JSONBody['password1'];

    if($user== NULL)
    {
      if($password == $JSONBody['password2'] )
      {
        $regex = "/(?=^.{8,}$)(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[\W])^.*/";

        if (preg_match($regex, $password))
        {
          echo json_encode(['message' => 'Success']);
        }
        else
        {
          echo json_encode(['message' => 'Fail - Weak Password']);
        }
        
      }
      else 
      {
          echo json_encode(['message' => 'Passwords dont match']);
      }
     
    }
    else 
    {
      echo json_encode(['message' => 'Email already exists']);
    }
   
  }
  else 
  {
    echo json_encode(['message' => 'Required Fields must be entered']);
  }
}
// Otherwise, return an error
  else 
  {
    echo json_encode(['message' => 'No data received']);
  }
}



?>