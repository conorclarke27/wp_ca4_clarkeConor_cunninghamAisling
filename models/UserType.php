<?php class UserType {

  private $type_id;
  private $typename;

  public function __construct($args) {
    $this->setTypeId($args['type_id'] ?? NULL);
    $this->setTypeName($args['typename'] ?? NULL);
  }

  public function getTypeId() {
    return $this->type_id;
  }

  public function setTypeId($type_id) {
    if($type_id === NULL) {
      $this->type_id = NULL;
      return;
    }
  
    $this->type_id = $type_id;
  }

  public function getTypeName() {
    return $this->typename;
  }

  public function setTypeName($typename) {
    if($typename=== NULL) {
      $this->typename = NULL;
      return;
    }
  
    $this->typename = $typename;
  }

  /**
   * ######################################################
   * # Instance Methods e.g save update delete
   * ######################################################
   */

  public function insert($pdo, $type) {

    if(!($pdo instanceof PDO)) {
      throw new Exception('Invalid PDO object for User insert');
    }
  
    if($type->type_id === NULL) {
      $stt = $pdo->prepare('INSERT INTO user_types (typename) VALUES (:typename)');
      $stt->execute([
        'typename' => $type->getTypeName()
      ]);
  
      $inserted = $stt->rowCount() === 1;
  
      if($inserted) {
        $type->type_id = $pdo->lastInsertId();
      }
  
      return $inserted;
    }
  } 

  public function update($pdo, $type) {
    if(!($pdo instanceof PDO)) {
      throw new Exception('Invalid PDO object for User update');
    }
  
    $stt = $pdo->prepare('UPDATE user_types SET typename=:typename WHERE type_id=:type_id LIMIT 1');
    $stt->execute([
      'type_id' => $type->getTypeId(),
      'typename' => $type->getTypeName()
    ]);
  
    return $stt->rowCount() === 1;
  }



  public function delete($pdo, $type) {

    if(!($pdo instanceof PDO)) {
      throw new Exception('Invalid PDO object for User delete');
    }
  
    if($this->getUserId() === NULL) {
      throw new Exception('Cannot delete a transient User Object');
    }
  
    $stt = $pdo->prepare('DELETE FROM user_types WHERE type_id=:type_id LIMIT 1');
    $stt->execute([
      'type_id'   => $type->getTypeId()
    ]);
  
    $deleted = $stt->rowCount() === 1;
  
    if($deleted) {
      $type->setTypeId(NULL);
    }
  
    return $deleted;
  }

} ?>