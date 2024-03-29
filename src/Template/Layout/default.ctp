<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = 'Traepaka';
$currentuser = $this->request->session()->read('Auth.User');
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->Html->meta('keywords','traepaka, onlie, store, compra venta, segunda mano'); ?>
    <?= $this->Html->meta('description','Tienda online de compra-venta de segunda mano'); ?>


    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('style.css') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
  <?php
    if($currentuser) {
      echo $this->element('navbar');
    }
    else{
      echo $this->element('login');
    }
  ?>
  <main>
    <?= $this->element('header'); ?>

    <?= $this->Flash->render() ?>

    <article class="maincontent">
      <?= $this->fetch('content') ?>
    </article>
  </main>

  <?= $this->element('footer') ?>

</body>
</html>
