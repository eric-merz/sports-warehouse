<?php
// this class is part of the business layer it used the DBAccess class
require_once "DBAccess.php";

class Item {
  // private properties
  private $_itemId;
  private $_itemName;
  private $_Featured;
  private $_price;
  private $_salePrice;
  private $_photo;
  private $_description;

  // constructor sets up the database settings and creats a DBAccess onject
  public function __construct() {
    // get datbase settings
    include "settings/db.php";

    try {
      // create database object
      $this->_db = new DBAccess ($dsn, $username, $password);
    } catch (PDOException $e) {
      die ("Unable to connect to database, " . $e->message());
    }
  }

  // set and get methods
  
  //get price
  public function getPrice() {
    return $this->_price;
  } 

  // get sale price
  // public function getSalePrice() {
  //   return $this->_salePrice;
  // } 

  //get Item ID
  public function getItemId() {
    return $this->_productID;
  }
  
  //get Item name
  public function getItemName() { 
    return $this->_itemName;
  }

  // get featured
  public function getFeatured() {
    try {
      // connect to db
      $pdo = $this->_db->connect();

      // set up SQL
      $sql = "SELECT itemId, photo, itemName, price, salePrice, description, featured FROM item WHERE featured = 1";
      $stmt = $pdo->prepare($sql);

      // execuet SQL
      $rows = $this->_db->executeSQL($stmt);

      return $rows;
    } catch (PDOException $e) {
      throw $e;
    }
  }

  // get all products
  public function getItems() {
    try {
      // connect to db
      $pdo = $this->_db->connect();

      // set up SQL
      $sql = "SELECT itemId, photo, itemName, price, salePrice, description, featured FROM item";
      $stmt = $pdo->prepare($sql);

      // execuet SQL
      $rows = $this->_db->executeSQL($stmt);

      return $rows;
    } catch (PDOException $e) {
      throw $e;
    }
  }

  // get single item
  public function getSingleItem($id) {
    try {
      // connect to db
      $pdo = $this->_db->connect();

      // set up SQL
      $sql = "SELECT itemId, photo, itemName, price, salePrice, description FROM item WHERE itemId = :itemId";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(":itemId", $id, PDO::PARAM_INT);

      // execuet SQL
      $rows = $this->_db->executeSQL($stmt);

      return $rows;
    } catch (PDOException $e) {
      throw $e;
    }
  }

  //get a product from the database for the id supplied
  public function getProduct($id) {
    try { 
      //connect to db
      $pdo = $this->_db->connect(); 
      
      //set up SQL and bind parameters
      $sql = "SELECT itemId, photo, itemName, price, salePrice, description FROM item WHERE itemId = :itemId";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':itemId', $id , PDO::PARAM_INT); 
      
      //execute SQL
      $rows = $this->_db ->executeSQL($stmt);
      //get the first row as it is a primary key there will only be one row
      $row = $rows[0]; 
      //populate the private properties with the retreived values
      $this->_itemId = $row["itemId"];
      $this->_itemName = $row["itemName"];
      $this->_price = $row ["price"];
    } catch (PDOException $e) { 
      throw$e;
    }
  } 

  // get searched
  public function getSearched() {
    try {
      // connect to db
      $pdo = $this->_db->connect();
      $search = $_GET["search"];

      // set up SQL
      $sql = "SELECT itemId, photo, itemName, price, salePrice, description FROM item WHERE itemName LIKE :itemName";
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(":itemName", "%$search%");

      // execuet SQL
      $rows = $this->_db->executeSQL($stmt);

      return $rows;
    } catch (PDOException $e) {
      throw $e;
    }
  }

    // get category items
    public function getCatItems() {
      try {
        // connect to db
        $pdo = $this->_db->connect();
  
        // set up SQL
        $sql = "SELECT itemId, categoryId, photo, itemName, price, salePrice, description, featured FROM item WHERE categoryId = " . $_GET["categoryId"];
        $stmt = $pdo->prepare($sql);
  
        // execuet SQL
        $rows = $this->_db->executeSQL($stmt);
  
        return $rows;
      } catch (PDOException $e) {
        throw $e;
      }
    }
}
?>