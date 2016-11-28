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
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <nav class="mainnavigation">
    <div class="logo">
      <?php echo $this->Html->link(
            $this->Html->image('icon.svg', array('alt' => 'Logo', 'class' => 'logoimg', 'escape' => false)).'Traepaká',
            array('controller' => 'Products', 'action' => 'index'),
            array('class' => 'indexlink', 'escape' => false)
          );
      ?>
    </div>
    <ul class="list_nav">
      <li>
        <div class="profile">
          <div class="profileimgblock">
            <?= $this->Html->image('profile_img.svg', array('alt' => 'Profile', 'class' => 'profileimg', 'escape' => false)) ?>
          </div>
          <div class="user">
            <?php echo $this->Html->link(
                  'Manuel Pérez'.$this->Html->image('gear_icon.svg', array('alt' => 'Configure', 'class' => 'navimg', 'escape' => false)),
                  array('controller' => 'Products', 'action' => 'index'),
                  array('class' => 'linkprofile', 'escape' => false)
                );
            ?>
          </div>
        </div>
      </li>
      <li>
        <?php echo $this->Html->link(
              'Añadir producto'.$this->Html->image('add_icon.svg', array('alt' => 'Add product', 'class' => 'navimg', 'escape' => false)),
              array('controller' => 'Products', 'action' => 'add'),
              array('class' => 'nav', 'escape' => false)
            );
        ?>
      </li>
      <li>
        <?php echo $this->Html->link(
              'Mis productos'.$this->Html->image('box_icon.svg', array('alt' => 'My products', 'class' => 'navimg', 'escape' => false)),
              array('controller' => 'Products', 'action' => 'index'),
              array('class' => 'nav', 'escape' => false)
            );
        ?>
      </li>
      <li>
        <?php echo $this->Html->link(
              'Chats'.$this->Html->image('chat_icon.svg', array('alt' => 'Chats', 'class' => 'navimg', 'escape' => false)),
              array('controller' => 'Chats', 'action' => 'index'),
              array('class' => 'nav', 'escape' => false)
            );
        ?>
      </li>
    </ul>
  </nav>
  <main>
    <header class="header">
        <form action="search.php" method="post">
            <input type="text" class="searchbar" placeholder="Search">
            <input type="submit" class="searchbutton" value="Search">
        </form>
    </header>

    <?= $this->Flash->render() ?>
    <article class="maincontent">
        <?= $this->fetch('content') ?>
    </article>
  </main>

  <footer class="footer">
      <div class="footerleft">
          <div class="footercolumn">
              <ul class="footercontent">
                  <li class="footertitle">
                      © Traepaká 2016
                  </li>
                  <li>
                      Normas
                  </li>
                  <li>
                      Contacto
                  </li>
                  <li>
                      Información Legal
                  </li>
                  <li>
                      Política de cookies
                  </li>
              </ul>
          </div>
          <div class="footercolumn">
              <ul class="footercontent secciones">
                  <li class="footertitle">
                      Secciones
                  </li>
                  <li>
                      Portada
                  </li>
                  <li>
                      Destacados
                  </li>
                  <li>
                      Nuevos
                  </li>
                  <li>
                      Comentarios
                  </li>
              </ul>
          </div>
          <div class="footercolumn">
              <ul class="footercontent usuario">
                  <li class="footertitle">
                      Manuel
                  </li>
                  <li>
                      Perfil
                  </li>
                  <li>
                      Nuevo producto
                  </li>
                  <li>
                      Mis productos
                  </li>
                  <li>
                      Chats
                  </li>
              </ul>
          </div>
      </div>
      <div class="footerright">
          <div class="footercolumn">
              <ul class="footercontent redes">
                  <li class="footertitle">
                      Redes
                  </li>
                  <li>
                      <?= $this->Html->image('facebook_icon.svg', array('alt' => 'Facebook', 'class' => 'footerimg', 'escape' => false)) ?>
                      Facebook
                  </li>
                  <li>
                      <?= $this->Html->image('twitter_icon.svg', array('alt' => 'Twitter', 'class' => 'footerimg', 'escape' => false)) ?>
                      Twitter
                  </li>
                  <li>
                      <?= $this->Html->image('youtube_icon.svg', array('alt' => 'Profile', 'class' => 'footerimg', 'escape' => false)) ?>
                      Youtube
                  </li>
              </ul>
          </div>
          <div class="footercolumn">
              <ul class="footercontent usuarios">
                  <li class="footertitle">
                      Usuarios
                  </li>
                  <li>
                      <?= $this->Html->image('users_blue_icon.svg', array('alt' => 'Users', 'class' => 'footerimg', 'escape' => false)) ?>
                      359553 miembros
                  </li>
                  <li>
                      <?= $this->Html->image('users_green_icon.svg', array('alt' => 'Connected', 'class' => 'footerimg', 'escape' => false)) ?>
                      15028 online
                  </li>
              </ul>
          </div>
      </div>
  </footer>
</body>
</html>
