<?php
  // src/Controller/ProductsController.php

  namespace App\Controller;

  class ProductsController extends AppController
  {

      public function index()
      {
          $products = $this->Products->find('all');
          $this->set(compact('products'));
      }
  }
?>