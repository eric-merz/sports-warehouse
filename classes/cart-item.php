<?php
  class CartItem {
    private $_itemName;
    private $_quantity;
    private $_price;
    private $_itemId;
    
    //constructor
    public function __construct($itemName, $quantity, $price, $itemId) {
      $this->_itemName = $itemName;
      $this->_quantity = (int)$quantity;
      $this->_price = (float)$price;
      $this->_itemId = (int)$itemId;
    }

    //get quantity
    public function getQuantity() {
      return $this->_quantity;
    }
      
    //set quantity
    public function setQuantity($value) {
      if ($value >= 0) {
        $this->_quantity = (int)$value;
      } else {
        throw new Exception("Quantity must be positive");
      }
    }
    
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
      return $this->_itemId;
    } 
    
    //get Item name
    public function getItemName() { 
      return$this->_itemName;
    }
  }
?>