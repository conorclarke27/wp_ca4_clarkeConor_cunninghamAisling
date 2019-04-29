<?php require_once('./lib/utils/ModelUtils.php');?>

<?php class Coffee {

private $coffee_id;
private $coffee_name;
private $supplier_name;
private $price;
private $quantity;

public function __construct($args) {
  if (!is_array($args)) {
    throw new Exception('Coffees constructor requires an array');
  }

  $this->setCoffeeId($args['coffee_id'] ?? NULL);
  $this->setCoffeeName($args['coffee_name'] ?? 'Untitled Coffee Name');
  $this->setSupplierName($args['supplier_name'] ?? NULL);
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

  if(!ModelUtils::isValidId($coffee_id)) {
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

  if(!ModelUtils::isValidName($coffee_name)) {
    throw new Exception('Coffee Name does not match expected pattern, no numerics');
  }
  $this->coffee_name = $coffee_name;
}

public function getSupplierName() {
  return $this->supplier_name;
}

public function setSupplierName($supplier_name) {
  if($supplier_name === NULL) {
    $this->supplier_name = NULL;
    return;
  }

  if(!ModelUtils::isValidName($supplier_name)) {
    throw new Exception('Supplier Name does not match expected pattern, no numerics');
  }
  $this->supplier_name = $supplier_name;
}

public function getPrice() {
  return $this->price;
}

public function setPrice($price) {
  if($price === NULL) {
    $this->price = NULL;
    return;
  }

  if(!ModelUtils::isValidNumber($price)) {
      throw new Exception('Price for Coffee object must be positive and numeric');
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

public function insert($pdo, $coffee) {
  if(!($pdo instanceof PDO)) {
    throw new Exception('Invalid PDO object for Coffee insert');
  }

  if($coffee->getCoffeeId() === NULL) {
    // Insert
    $stt = $pdo->prepare('INSERT INTO coffees (coffee_name, supplier_name, price, quantity) VALUES (:coffee_name, :supplier_name, :price, :quantity)');
    $stt->execute([
      'coffee_name' => $coffee->getCoffeeName(),
      'supplier_name' => $coffee->getSupplierName(),
      'price'       => $coffee->getPrice(),
      'quantity'    => $coffee->getQuantity()
    ]);

    $inserted = $stt->rowCount() === 1;

    if($inserted) {
      $coffee->coffee_id = $pdo->lastInsertId();
    }

    return $inserted;
  } 
}

public function update($pdo, $coffee) {
  if(!($pdo instanceof PDO)) {
    throw new Exception('Invalid PDO object for Coffee update');
  }

  $stt = $pdo->prepare('UPDATE coffees SET coffee_name=:coffee_name, supplier_name=:supplier_name, price=:price, quantity=:quantity WHERE coffee_id=:coffee_id LIMIT 1');
  $stt->execute([
    'coffee_id'   => $coffee->getCoffeeId(),
    'coffee_name' => $coffee->getCoffeeName(),
    'supplier_name' => $coffee->getSupplierName(),
    'price'       => $coffee->getPrice(),
    'quantity'    => $coffee->getQuantity()
  ]);

  return $stt->rowCount() === 1;
}

public function delete($pdo, $coffee) {

  if(!($pdo instanceof PDO)) {
    throw new Exception('Invalid PDO object for Coffee delete');
  }

  if($coffee->getCoffeeId() === NULL) {
    throw new Exception('Cannot delete a transient Coffee Object');
  }

  $stt = $pdo->prepare('DELETE FROM coffees WHERE coffee_id=:coffee_id LIMIT 1');
  $stt->execute([
    'coffee_id'   => $coffee->getCoffeeId()
  ]);

  $deleted = $stt->rowCount() === 1;

  if($deleted) {
    $coffee->setCoffeeId(NULL);
  }

  return $deleted;
}

/**
 * #################################################
 * #Static Methods
 * #################################################
*/

public static function findAll($db) {

  if(!($db instanceof PDO)) 
  {
    throw new Exception('Invalid PDO object for Coffee findAll');
  }

  $stt = $db->prepare('SELECT coffee_id, coffee_name, supplier_name, price, quantity FROM coffees');
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

public static function findOneById($db, $coffee_id) {

  if(!($db instanceof PDO)) {
    throw new Exception('Invalid PDO object for Coffee findOneById');
  }

  if(!ModelUtils::isValidId($coffee_id)) {
    throw new Exception('Coffee ID for findOneById must be positive numeric');
  }

  $stt = $db->prepare('SELECT coffee_id, coffee_name, supplier_name, price, quantity FROM coffees WHERE coffee_id = :coffee_id LIMIT 1');
  $stt->execute([
    'coffee_id' => $coffee_id
  ]);

  $row = $stt->fetch();

  return $row !== FALSE
    ? new Coffee($row)
    : NULL;
}

} ?>