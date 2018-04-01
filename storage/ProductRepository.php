<?php

require_once(dirname(__FILE__) . '/../model/Product.php');

class ProductRepository {
  var $dbConnection;

  function __construct(){
  }

  function __destruct() {
    if ($this->dbConnection) {
      //$this->dbConnection->close();
    }
  }

  function getAllMockProducts() {
    $count = 10;
    $items = [];
    while ($count > 0) {
      $items[] = $this->createRandomProduct();
      $count--;
    }
    return $items;
  }

  function getAllProducts() {
    return $this->getAllProductsFromDB();
  }

  function createRandomProduct() {
    $names = ['iPhone', 'Macbook', 'Galaxy Note 5', 'iPhone X'];
    $descs = ['The best product ever', 'Flagship of year', 'Welcome to the world of modern citizen', 'Nothing can beat'];

    $product = new Product();
    $product->id = rand(1000, 10000);
    $product->name = $names[rand(0, count($names) - 1)];
    $product->description = $descs[rand(0, count($descs) - 1)];

    return $product;
  }

  function getAllProductsFromDB() {
    $this->dbConnection = new mysqli('mysql', 'agileadvn', 'agileadvn', 'agileadvn');
    if($this->dbConnection->connect_errno) {
      return null;
    }

    $sql = 'SELECT * FROM products';
    $resultSet = $this->dbConnection->query($sql);

    if ($resultSet->num_rows > 0) {
      $products = array();
      while($row = $resultSet->fetch_assoc()) {
        $products[] = $row;
      }

      return $products;
    }
  }
}

?>
