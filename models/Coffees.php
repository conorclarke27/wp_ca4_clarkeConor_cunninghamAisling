<?php class Coffees {

private $coffee_id;
private $coffee_name;
private $supplier_id;
private $price;
private $quantity;

public function __construct($args) {
  if (!is_array($args)) {
    throw new Exception('Coffees constructor requires an array');
  }

  $this->setCoffeeId($args['coffee_id'] ?? NULL);
  $this->setCoffeeName($args['coffee_name'] ?? 'Untitled Coffee Name');
  $this->setSupplierId($args['supplier_id'] ?? NULL);
  $this->setPrice($args['price'] ?? NULL);
  $this->setQuantity($args['quantity'] ?? NULL);
  
}

/**
 * #################################################
 * #Getter and Setter Methods
 * #################################################
*/

public function getCoffeeId() {
  return $this->coffee_id;
}

public function setCoffeeId($coffee_id) {
  if($coffee_id === NULL) {
    $this->coffee_id = NULL;
    return;
  }

  if(!Model::isIdValid($coffee_id)) {
    throw new Exception('Coffee ID for Coffee object must be positive numeric');
  }
  $this->coffee_id = $coffee_id;
}

public function getCoffeeName() {
  return $this->coffee_name;
}

public function setCoffeeName($coffee_name) {
  if($coffee_name === NULL) {
    $this->coffee_name = NULL;
    return;
  }

  if(!preg_match('/^[a-z]{3,55}$/i', $coffee_name)) {
    throw new Exception('Coffee name does not match expected pattern');
  }
  $this->coffee_name = $name;
}

public function getSupplierId() {
  return $this->supplier_id;
}

public function setSupplierId($supplier_id) {
  if($supplier_id === NULL) {
    $this->supplier_id = NULL;
    return;
  }

  if(!Model::isIdValid($supplier_id)) {
    throw new Exception('Supplier ID for Coffee object must be positive numeric');
  }
  $this->supplier_id = $supplier_id;
}

public function getPrice() {
  return $this->price;
}

public function setPrice($price) {
  if($price === NULL) {
    $this->price = NULL;
    return;
  }

  $this->price = $price;
}

public function getQuantity() {
  return $this->quantity;
}

public function setQuantity($quantity) {
  if($quantity === NULL) {
    $this->quantity = NULL;
    return;
  }

  $this->quantity = $quantity;
}

/**
 * #################################################
 * #Insert, Update and Delete Methods
 * #################################################
*/

public function insert($pdo) {
  if(!($pdo instanceof PDO)) {
    throw new Exception('Invalid PDO object for Coffee insert');
  }

  if($this->coffee_id === NULL) {
    // Insert
    $stt = $pdo->prepare('INSERT INTO coffees (coffee_name, supplier_id, price, quantity) VALUES (:coffee_name, :supplier_id, :price, :quantity)');
    $stt->execute([
      'coffee_name' => $this->getCoffeeName(),
      'supplier_id' => $this->getSupplierId(),
      'price'       => $this->getPrice(),
      'quantity'    => $this->getQuantity()
    ]);

    $inserted = $stt->rowCount() === 1;

    if($inserted) {
      $this->coffee_id = $pdo->lastInsertId();
    }

    return $inserted;
  } 
}

public function update($pdo) {
  if(!($pdo instanceof PDO)) {
    throw new Exception('Invalid PDO object for Coffee update');
  }

  $stt = $pdo->prepare('UPDATE coffees SET coffee_name=:coffee_name, supplier_id=:supplier_id, price=:price, quantity=:quantity WHERE coffee_id=:coffee_id LIMIT 1');
  $stt->execute([
    'coffee_id'   => $this->getCoffeeId(),
    'coffee_name' => $this->getCoffeeName(),
    'supplier_id' => $this->getSupplierId(),
    'price'       => $this->getPrice(),
    'quantity'    => $this->getQuantity()
  ]);

  return $stt->rowCount() === 1;
}

public function delete($pdo) {

  if(!($pdo instanceof PDO)) {
    throw new Exception('Invalid PDO object for Coffee delete');
  }

  if($this->getCoffeeId() === NULL) {
    throw new Exception('Cannot delete a transient Coffee Object');
  }

  $stt = $pdo->prepare('DELETE FROM coffees WHERE coffee_id=:coffee_id LIMIT 1');
  $stt->execute([
    'coffee_id'   => $this->getCoffeeId()
  ]);

  $deleted = $stt->rowCount() === 1;

  if($deleted) {
    $this->setCoffeeId(NULL);
  }

  return $deleted;
}

/**
 * #################################################
 * #Static Methods
 * #################################################
*/

public static function findAll($db) {

  if(!($db instanceof PDO)) {
    throw new Exception('Invalid PDO object for Coffee findAll');
  }

  $stt = $db->prepare('SELECT coffee_id, coffee_name, supplier_id, price, quantity FROM coffees');
  $stt->execute();

  $coffees = [];

  foreach($stt->fetchAll() as $row) {
    array_push($coffees, new Coffee($row));
  }

  return $coffees;

  // return array_map(function($row){
  //   return new Student($row);
  // }, $query->fetchAll());
}

public static function findOneById($coffee_id, $db) {

  if(!($db instanceof PDO)) {
    throw new Exception('Invalid PDO object for Coffee findOneById');
  }

  if(!Model::isIdValid($coffee_id)) {
    throw new Exception('Coffee ID for findOneById must be positive numeric');
  }

  $stt = $db->prepare('SELECT coffee_id, coffee_name, supplier_id, price, quantity FROM coffees WHERE coffee_id = :coffee_id LIMIT 1');
  $stt->execute([
    'coffee_id' => $coffee_id
  ]);

  $row = $stt->fetch();

  return $row !== FALSE
    ? new Coffee($row)
    : NULL;
}

} ?>