<?php
// this class is part of the business layer it used the DBAccess class
require_once "DBAccess.php";

class Item {
  // private properties
  private $_itemId;
  private $_itemName;
  private $_Featured;
  private $_price;
  private $_SalePrice;
  private $_photo;
  private $_Description;

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
    public function getSingleItem($itemId) {
      try {
        // connect to db
        $pdo = $this->_db->connect();
  
        // set up SQL
        $sql = "SELECT itemId, photo, itemName, price, salePrice, description FROM item WHERE itemId = :itemId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":itemId", $itemId);
  
        // execuet SQL
        $rows = $this->_db->executeSQL($stmt);
  
        return $rows;
      } catch (PDOException $e) {
        throw $e;
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