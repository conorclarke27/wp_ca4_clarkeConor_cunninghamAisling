<?php class Users {

  private $user_id;
  private $user_type;
  private $username;
  private $password;
  private $email;
  private $supplier_name;


  /**
   * #################################################
   * User Constructor
   * #################################################
  */  
  public function __construct($args) {
    if (!is_array($args)) {
      throw new Exception('Users constructor requires an array');
    }
  
    $this->setUserId($args['user_id'] ?? NULL);
    $this->setUserType($args['user_type'] ?? NULL);
    $this->setUsername($args['username'] ?? 'Untitled User');
    $this->setPassword($args['password'] ?? NULL);
    $this->setEmail($args['email'] ?? NULL);
    $this->setSupplierName($args['supplier_name'] ?? NULL);
    
  }


  /**
   * #################################################
   *  Getter Methods
   * #################################################
  */

  public function getUserId() {
    return $this->user_id;
  }

  public function getUserType() {
    return $this->user_type;
  }

  public function getUsername() {
    return $this->username;
  }

  public function getPassword() {
    return $this->password;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getSupplier_Name() {
    return $this->supplier_name;
  }
  

    /**
 * #################################################
 *  Setter Methods
 * #################################################
*/

  public function setUserId($user_id) {
    if($user_id === NULL) {
      $this->user_id = NULL;
      return;
    }
    if(! ModelUtils::isValidId($user_id)) {
      throw new Exception('User ID for a User object must be positive numeric');
    }
    $this->user_id = $user_id;
  }

  public function setUserType($user_type) {
    if($user_type === NULL) {
      $this->user_type = NULL;
      return;
    }
    if(! ModelUtils::isValidId($user_type)) {
      throw new Exception('User Type for a User object must be positive numeric');
    }
    $this->user_type = $user_type;
  }

  public function setUserName($username) {
    if($username=== NULL) {
      $this->username = NULL;
      return;
    }
  
    if(!preg_match('/^[a-z]{3,55}$/i', $username)) {
      throw new Exception('Username does not match expected pattern');
    }
    $this->username = $username;
  }

  public function setPassword($password) {
    if($password=== NULL) {
      $this->password = NULL;
      return;
    }
  
    $this->password = $password;
  }

  public function setEmail($email) {
    if($email=== NULL) {
      $this->email = NULL;
      return;
    }
  
    $this->email = $email;
  }

  public function setSupplierName($supplier_name) {
    if($supplier_name=== NULL) {
      $this->supplier_name = NULL;
      return;
    }
  
    $this->supplier_name = $supplier_name;
  }


/**
     * ######################################################
     * # Instance Methods e.g save update delete
     * ######################################################
     */


  public function insert($pdo) {

    if(!($pdo instanceof PDO)) {
      throw new Exception('Invalid PDO object for User insert');
    }
  
    if($this->user_id === NULL) {
      // Insert
      $stt = $pdo->prepare('INSERT INTO users (user_type,username,password,email,supplier_name) VALUES (:user_type, :username, :password, :email,:supplier_name)');
      $stt->execute([
        'user_type' => $this->getUserType(),
        'username' => $this->getUsername(),
        'password'       => $this->getPassword(),
        'email'    => $this->getEmail(),
        'supplier_name' => $this->getSupplier_Name()
      ]);
  
      $inserted = $stt->rowCount() === 1;
  
      if($inserted) {
        $this->user_id = $pdo->lastInsertId();
      }
  
      return $inserted;
    }
  } 

  public function update($pdo) {
    if(!($pdo instanceof PDO)) {
      throw new Exception('Invalid PDO object for User update');
    }
  
    $stt = $pdo->prepare('UPDATE users SET user_type=:user_type, username=:username, password=:password, email=:email, supplier_name=:supplier_name WHERE user_id=:user_id LIMIT 1');
    $stt->execute([
      'user_type' => $this->getUserType(),
      'username' => $this->getUsername(),
      'password'       => $this->getPassword(),
      'email'    => $this->getEmail(),
      'supplier_name' => $this->getSupplier_Name()
    ]);
  
    return $stt->rowCount() === 1;
  }



  public function delete($pdo) {

    if(!($pdo instanceof PDO)) {
      throw new Exception('Invalid PDO object for User delete');
    }
  
    if($this->getUserId() === NULL) {
      throw new Exception('Cannot delete a transient User Object');
    }
  
    $stt = $pdo->prepare('DELETE FROM users WHERE user_id=:user_id LIMIT 1');
    $stt->execute([
      'user_id'   => $this->getUserId()
    ]);
  
    $deleted = $stt->rowCount() === 1;
  
    if($deleted) {
      $this->setUserId(NULL);
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
      throw new Exception('Invalid PDO object for User findAll');
    }

    $stt = $db->prepare('SELECT user_id, user_type, username, password, email, supplier_name FROM users');
    $stt->execute();

    $users = [];

    foreach($stt->fetchAll() as $row) {
      array_push($users, new User($row));
    }

    return $users;

    // return array_map(function($row){
    //   return new User($row);
    // }, $query->fetchAll());
  }


  public static function findOneById($user_id, $db) {

    if(!($db instanceof PDO)) {
      throw new Exception('Invalid PDO object for user findOneById');
    }
  
    if(! ModelUtils::isIdValid($user_id)) {
      throw new Exception('user ID for findOneById must be positive numeric');
    }
  
    $stt = $db->prepare('SELECT user_id, user_type,username,password, email, supplier_name FROM users WHERE user_id = :user_id LIMIT 1');
    $stt->execute([
      'user_id' => $user_id
    ]);
  
    $row = $stt->fetch();
  
    return $row !== FALSE
      ? new User($row)
      : NULL;
  }
  
} ?>

      
          


    
