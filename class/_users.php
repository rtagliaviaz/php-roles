<?php
  class Users {
    //database connection and table name
    private $conn;
    private $table_name = "users";
    //column names
    public $id;
    public $username;
    public $password;
    public $role;


    //constructor with $db as database connection
    public function __construct($db){
      $this->conn = $db;
    }

    // create user
    public function createUser() {
      $query = "INSERT INTO
                " . $this->table_name . "
              SET
                username=:username,
                password=:password,
                role=" . 2;
      $stmt = $this->conn->prepare($query);

      //sanitize
      $this->username=htmlspecialchars(strip_tags($this->username));
      $this->password=htmlspecialchars(strip_tags($this->password));

      //bind values
      $stmt->bindParam(":username", $this->username);
      $stmt->bindParam(":password", $this->password);

      if($stmt->execute()){
        return true;
      }
        return false;
    }
  }
