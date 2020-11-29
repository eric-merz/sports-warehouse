<?php
// this class is part of the business layer it used the DBAccess class
require_once "DBAccess.php";

class Category {
  // private properties
  private $_categoryName;
  private $_categoryId;

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
  // get category name
  public function getCategoryName($categoryId) {
    try {
      // connect to db
      $pdo = $this->_db->connect();

      // set up SQL
      $sql = "SELECT categoryName  FROM category WHERE categoryId = :categoryId";
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(":categoryId", $categoryId);

      // execuet SQL
      $rows = $this->_db->executeSQL($stmt);

      return $rows;
    } catch (PDOException $e) {
      throw $e;
    }
  }

  // get category id
  // public function getCategoryId() {
  //   try {
  //     // connect to db
  //     $pdo = $this->_db->connect();

  //     // set up SQL
  //     $sql = "SELECT categoryId  FROM category";
  //     $stmt = $pdo->prepare($sql);

  //     // execuet SQL
  //     $rows = $this->_db->executeSQL($stmt);

  //     return $rows;
  //   } catch (PDOException $e) {
  //     throw $e;
  //   }
  // }

  // get all categories
  public function getCategories() {
    try {
      // connect to db
      $pdo = $this->_db->connect();

      // set up SQL
      $sql = "SELECT categoryName, categoryId FROM category";
      $stmt = $pdo->prepare($sql);

      // execuet SQL
      $rows = $this->_db->executeSQL($stmt);

      return $rows;
    } catch (PDOException $e) {
      throw $e;
    }
  }

   // add new category
   public function addCategory() {
    // connect to db
    $pdo = $this->_db->connect();

    // set up SQL
    $sql = "INSERT INTO category(categoryName) VALUES(:categorName)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":categorName", $_POST["newCategory"], PDO::PARAM_STR);

    // execuet SQL
    $message = "New category was added.";
  }

  // delete category
  public function deleteCategory() {
    // connect to db
    $pdo = $this->_db->connect();

    // set up SQL
    $sql = "DELETE FROM category WHERE categoryId = :categoryId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":categoryId", $_POST["categoryId"], PDO::PARAM_INT);

    // execuet SQL
    $this->_db->executeNonQuery($stmt, true);
    $message = "Category was deleted.";
  }

  // modify category
  public function modifyCategory() {
    // connect to db
    $pdo = $this->_db->connect();

    // set up SQL
    $sql = "UPDATE category SET categoryName = :categoryName WHERE categoryId = :categoryId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":categoryId", $_POST["categoryId"], PDO::PARAM_INT);
    $stmt->bindValue(":categoryName", $_POST["modifyCategory"], PDO::PARAM_STR);

    // execuet SQL
    $this->_db->executeNonQuery($stmt, true);
    $message = "Category was renamed.";
  }
}
?>