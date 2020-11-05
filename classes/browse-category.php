<?php
// this class is part of the business layer it used the DBAccess class
require_once "DBAccess.php";

class BrowseCategory {
  // private properties
  private $_photo;
  private $_itemName;
  private $_price;
  private $_SalePrice;
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
    return $this->_Featured;
  }

  // get all products
  public function getItems() {
    try {
      // connect to db
      $pdo = $this->_db->connect();

      // set up SQL
      $sql = "SELECT photo, itemName, price, salePrice, description, featured FROM item LIMIT 5";
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