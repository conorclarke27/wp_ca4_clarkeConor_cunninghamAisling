<?php class Orders {

private $order_id;
private $user_id;
private $coffee_id;

public function __construct($args) {
  if (!is_array($args)) {
    throw new Exception('Coffees constructor requires an array');
  }
  
  $this->setOrderID($args['order_id'] ?? NULL);
  $this->setUserID($args['user_id'] ?? NULL);
  $this->setCoffeeId($args['coffee_id'] ?? NULL); 
}

/**
 * #################################################
 * #Getter and Setter Methods
 * #################################################
*/


public function getOrderID() {
  return $this->order_id;
}

public function setOrderID($order_id) {
  if($order_id === NULL) {
    $this->order_id = NULL;
    return;
  }

  // if(!ModelUtils::isIdValid($order_id)) {
  //   throw new Exception('Coffee ID for Coffee object must be positive numeric');
  // }
  $this->order_id = $order_id;
}

public function getUserID() {
  return $this->user_id;
}

public function setUserID($user_id) {
  if($user_id === NULL) {
    $this->user_id = NULL;
    return;
  }

  // if(!ModelUtils::isIdValid($user_id)) {
  //   throw new Exception('Coffee ID for Coffee object must be positive numeric');
  // }
  $this->user_id = $user_id;
}

public function getCoffeeID() {
  return $this->coffee_id;
}

public function setCoffeeID($coffee_id) {
  if($coffee_id === NULL) {
    $this->coffee_id = NULL;
    return;
  }

  // if(!ModelUtils::isIdValid($coffee_id)) {
  //   throw new Exception('Coffee ID for Coffee object must be positive numeric');
  // }
  $this->coffee_id = $coffee_id;
}

/**
 * #################################################
 * #Insert, Update and Delete Methods
 * #################################################
*/

public function insert($pdo, $order) {
  if(!($pdo instanceof PDO)) {
    throw new Exception('Invalid PDO object for Coffee_Order insert');
  }
  
  if($order->getOrderID() === NULL) {

    $stt = $pdo->prepare('INSERT INTO coffee_orders (user_id, coffee_id) VALUES (:user_id, :coffee_id)');
    $stt->execute([
      'user_id' => $order->getUserID(),
      'coffee_id' => $order->getCoffeeID()
    ]);

    $inserted = $stt->rowCount() === 1;

    if($inserted) {
      $order->order_id = $pdo->lastInsertId();
    }

    return $inserted;
  }
} 

public function update($pdo) {
  if(!($pdo instanceof PDO)) {
    throw new Exception('Invalid PDO object for Coffee_Order update');
  }

  $stt = $pdo->prepare('UPDATE coffee_orders SET user_id=:user_id, coffee_id=:coffee_id WHERE order_id=:order_id LIMIT 1');
  $stt->execute([
    'order_id'    => $this->getOrderID(),
    'user_id'     => $this->getUserID(),
    'coffee_id'   => $this->getCoffeeID()
  ]);

  return $stt->rowCount() === 1;
}

public function delete($pdo) {

  if(!($pdo instanceof PDO)) {
    throw new Exception('Invalid PDO object for Coffee_Orders delete');
  }

  if($this->getOrderID() === NULL) {
    throw new Exception('Cannot delete a transient Coffee_Orders Object');
  }

  $stt = $pdo->prepare('DELETE FROM coffee_orders WHERE order_id=:order_id LIMIT 1');
  $stt->execute([
    'order_id'   => $this->getOrderID()
  ]);

  $deleted = $stt->rowCount() === 1;

  if($deleted) {
    $this->setOrderID(NULL);
  }

  return $deleted;

}

/**
 * #################################################
 * #Static Methods
 * #################################################
*/

public static function findAll($pdo) {

  if(!($pdo instanceof PDO)) {
    throw new Exception('Invalid PDO object for Coffee findAll');
  }

  $stt = $pdo->prepare('SELECT order_id, user_id, coffee_id FROM coffee_orders');
  $stt->execute();

  $coffee_orders = [];

  foreach($stt->fetchAll() as $row) {
    array_push($coffee_orders, new Orders($row));
  }

  return $coffee_orders;

}


} ?>