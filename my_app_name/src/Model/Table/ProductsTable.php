<?php
  // src/Model/Table/ProductsTable.php

  namespace App\Model\Table;

  use Cake\ORM\Table;

  class ProductsTable extends Table
  {
      public function initialize(array $config)
      {
          $this->addBehavior('Timestamp');
      }
  }
?>