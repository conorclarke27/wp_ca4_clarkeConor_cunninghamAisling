<?php require_once('./lib/utils/ModelUtils.php');?>

<?php class User {

  private $user_id;
  private $type_id;
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
    $this->setUserType($args['type_id'] ?? NULL);
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
    return $this->type_id;
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

  public function setUserType($type_id) {
    if($type_id === NULL) {
      $this->type_id = NULL;
      return;
    }
    if(! ModelUtils::isValidId($type_id)) {
      throw new Exception('User Type for a User object must be positive numeric');
    }
    $this->type_id = $type_id;
  }

  public function setUserName($username) {
    if($username=== NULL) {
      $this->username = NULL;
      return;
    }
  
    if(!ModelUtils::isValidName($username)) {
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

    if(!ModelUtils::isValidEmail($email)) {
      throw new Exception('Username does not match expected pattern');
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


  public function insert($pdo,$user) {

    if(!($pdo instanceof PDO)) {
      throw new Exception('Invalid PDO object for User insert');
    }
  
    if($user->user_id === NULL) {
      // Insert
      $stt = $pdo->prepare('INSERT INTO users (type_id,username,password,email,supplier_name) VALUES (:type_id, :username, :password, :email,:supplier_name)');
      $stt->execute([
        'type_id' => $user->getUserType(),
        'username' => $user->getUsername(),
        'password'       => $user->getPassword(),
        'email'    => $user->getEmail(),
        'supplier_name' => $user->getSupplier_Name()
      ]);
  
      $inserted = $stt->rowCount() === 1;
  
      if($inserted) {
        $user->user_id = $pdo->lastInsertId();
      }
  
      return $inserted;
    }
  } 

  public function update($pdo, $user) {
    if(!($pdo instanceof PDO)) {
      throw new Exception('Invalid PDO object for User update');
    }
  
    $stt = $pdo->prepare('UPDATE users SET type_id=:type_id, username=:username, password=:password, email=:email, supplier_name=:supplier_name WHERE user_id=:user_id LIMIT 1');
    $stt->execute([
      'type_id' => $user->getUserType(),
      'username' => $user->getUsername(),
      'password'       => $user->getPassword(),
      'email'    => $user->getEmail(),
      'supplier_name' => $user->getSupplier_Name()
    ]);
  
    return $stt->rowCount() === 1;
  }



  public function delete($pdo, $user) {

    if(!($pdo instanceof PDO)) {
      throw new Exception('Invalid PDO object for User delete');
    }
  
    if($user->getUserId() === NULL) {
      throw new Exception('Cannot delete a transient User Object');
    }
  
    $stt = $pdo->prepare('DELETE FROM users WHERE user_id=:user_id LIMIT 1');
    $stt->execute([
      'user_id'   => $user->getUserId()
    ]);
  
    $deleted = $stt->rowCount() === 1;
  
    if($deleted) {
      $user->setUserId(NULL);
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

    $stt = $db->prepare('SELECT user_id, type_id, username, password, email, supplier_name FROM users');
    $stt->execute();

    $users = [];

    foreach($stt->fetchAll() as $row) {
      array_push($users, new User($row));
    }

    return $users;
  }


  public static function findOneById($user_id, $db) {

    if(!($db instanceof PDO)) {
      throw new Exception('Invalid PDO object for user findOneById');
    }
  
    if(! ModelUtils::isValidId($user_id)) {
      throw new Exception('user ID for findOneById must be positive numeric');
    }
  
    $stt = $db->prepare('SELECT user_id, type_id,username,password, email, supplier_name FROM users WHERE user_id = :user_id LIMIT 1');
    $stt->execute([
      'user_id' => $user_id
    ]);
  
    $row = $stt->fetch();
  
    return $row !== FALSE
      ? new User($row)
      : NULL;
  }
  

  public static function findOneByEmail($email, $db) {

    if(!($db instanceof PDO)) {
      throw new Exception('Invalid PDO object for user findOneByEmail');
    }
  
    // if(!ModelUtils::isValidEmail($email)) 
    // {
    //   throw new Exception('user email for findOneByEmail must be a valid email address');
    // }
  
    $stt = $db->prepare('SELECT * FROM users WHERE email= :email LIMIT 1');
    $stt->execute([
      'email' => $email
    ]);
  
    $row = $stt->fetch();
  
    return $row !== FALSE
      ? new User($row)
      : NULL;
  }
  
} ?>

      
          


    
