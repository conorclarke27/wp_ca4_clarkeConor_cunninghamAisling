<?php require_once('./lib/utils/ModelUtils.php');?>

<?php class Order {

private $order_id;
private $user_id;
private $coffee_id;

public function __construct($args) {
  if (!is_array($args)) {
    throw new Exception('Order constructor requires an array');
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

  if(!ModelUtils::isValidId($order_id)) {
    throw new Exception('Order ID for Order object must be positive numeric');
  }
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

  if(!ModelUtils::isValidId($user_id)) {
    throw new Exception('User ID for Order object must be positive numeric');
  }
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

  if(!ModelUtils::isValidId($coffee_id)) {
    throw new Exception('Coffee ID for Order object must be positive numeric');
  }
  $this->coffee_id = $coffee_id;
}

/**
 * #################################################
 * #Insert, Update and Delete Methods
 * #################################################
*/

public function insert($pdo, $order) {
  if(!($pdo instanceof PDO)) {
    throw new Exception('Invalid PDO object for Order insert');
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

public function update($pdo, $order) {
  if(!($pdo instanceof PDO)) {
    throw new Exception('Invalid PDO object for Order update');
  }

  $stt = $pdo->prepare('UPDATE coffee_orders SET user_id=:user_id, coffee_id=:coffee_id WHERE order_id=:order_id LIMIT 1');
  $stt->execute([
    'order_id'    => $order->getOrderID(),
    'user_id'     => $order->getUserID(),
    'coffee_id'   => $order->getCoffeeID()
  ]);

  return $stt->rowCount() === 1;
}

public function delete($pdo, $order) {

  if(!($pdo instanceof PDO)) {
    throw new Exception('Invalid PDO object for Order delete');
  }

  if($order->getOrderID() === NULL) {
    throw new Exception('Cannot delete a transient Order Object');
  }

  $stt = $pdo->prepare('DELETE FROM coffee_orders WHERE order_id=:order_id LIMIT 1');
  $stt->execute([
    'order_id'   => $order->getOrderID()
  ]);

  $deleted = $stt->rowCount() === 1;

  if($deleted) {
    $order->setOrderID(NULL);
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
    throw new Exception('Invalid PDO object for Order findAll');
  }

  $stt = $pdo->prepare('SELECT order_id, user_id, coffee_id FROM coffee_orders');
  $stt->execute();

  $coffee_orders = [];

  foreach($stt->fetchAll() as $row) {
    array_push($coffee_orders, new Order($row));
  }

  return $coffee_orders;

}

public static function findAllByUserID($pdo,$user_id) {

  if(!($pdo instanceof PDO)) {
    throw new Exception('Invalid PDO object for Order findAllByUserID');
  }

  $stt = $pdo->prepare('SELECT * FROM coffee_orders WHERE user_id = :user_id');
  $stt->execute([
    'user_id' => $user_id
  ]);

  $coffee_orders = [];

  foreach($stt->fetchAll() as $row) {
    array_push($coffee_orders, new Order($row));
  }

  return $coffee_orders;


}

public static function findOneById($db, $order_id) {

  if(!($db instanceof PDO)) {
    throw new Exception('Invalid PDO object for Order findOneById');
  }

  if(!ModelUtils::isValidId($order_id)) {
    throw new Exception('Order ID for findOneById must be positive numeric');
  }

  $stt = $db->prepare('SELECT order_id, user_id, coffee_id FROM coffee_orders WHERE order_id = :order_id LIMIT 1');
  $stt->execute([
    'order_id' => $order_id
  ]);

  $row = $stt->fetch();

  return $row !== FALSE
    ? new Order($row)
    : NULL;
}



} ?>