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
  
 // If data was received send back (as JSON)
  if ($JSONBody) 
  {
    echo json_encode($JSONBody);
  }
// Otherwise, return an error
  else 
  {
    echo json_encode(['message' => 'No data received']);
  }
}



?>