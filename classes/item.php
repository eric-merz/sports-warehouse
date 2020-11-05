<?php
// this class is part of the business layer it used the DBAccess class
require_once "DBAccess.php";

class Item {
  // private properties
  private $_photo;
  private $_itemName;
  private $_price;
  private $_SalePrice;
  private $_Description;
  private $_Featured;

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
  // get item photo
  public function getItemPhoto() {
    return $this->_photo;
  }

  // get the item name
  public function getItemName() {
    return $this->_itemName;
  }

  // get the price
  public function getPrice() {
    return $this->_price;
  }

  // get the sale price
  public function getSalePrice() {
    return $this->_Saleprice;
  }

  // get description
  public function getDescription() {
    return $this->_Description;
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
    public function getSingleItem() {
      try {
        // connect to db
        $pdo = $this->_db->connect();
  
        // set up SQL
        $sql = "SELECT itemId, photo, itemName, price, salePrice, description FROM item WHERE itemId = " . $_GET["itemId"];
        $stmt = $pdo->prepare($sql);
  
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