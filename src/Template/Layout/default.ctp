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
                  $currentuser['name'],
                  array('controller' => 'Users', 'action' => 'view', $currentuser['id']),
                  array('class' => 'linkprofile', 'escape' => false)
                );
            ?>

            <?php echo $this->Html->link(
                  $this->Html->image('logout.svg', array('alt' => __('Configure'), 'class' => 'logout', 'escape' => false)),
                  array('controller' => 'Users', 'action' => 'logout'),
                  array('class' => 'linkprofile', 'escape' => false)
                );
            ?>

            <?php echo $this->Html->link(
                  $this->Html->image('gear_icon.svg', array('alt' => __('Configure'), 'class' => 'navimg', 'escape' => false)),
                  array('controller' => 'Users', 'action' => 'edit', $currentuser['id']),
                  array('class' => 'linkprofile', 'escape' => false)
                );
            ?>
          </div>
        </div>
      </li>
      <li>
        <?php echo $this->Html->link(
              __('Añadir producto').$this->Html->image('add_icon.svg', array('alt' => __('Add product'), 'class' => 'navimg', 'escape' => false)),
              array('controller' => 'Products', 'action' => 'add'),
              array('class' => 'nav', 'escape' => false)
            );
        ?>
      </li>
      <li>
        <?php echo $this->Html->link(
              __('Mis productos').$this->Html->image('box_icon.svg', array('alt' => __('My products'), 'class' => 'navimg', 'escape' => false)),
              array('controller' => 'Products', 'action' => 'own', $currentuser['id']),
              array('class' => 'nav', 'escape' => false)
            );
        ?>
      </li>
      <li>
        <?php echo $this->Html->link(
              __('Chats').$this->Html->image('chat_icon.svg', array('alt' => __('Chats'), 'class' => 'navimg', 'escape' => false)),
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
                      <?= __('© Traepaká 2016') ?>
                  </li>
                  <li>
                      <?= __('Normas') ?>
                  </li>
                  <li>
                      <?= __('Contacto') ?>
                  </li>
                  <li>
                      <?= __('Información Legal') ?>
                  </li>
                  <li>
                      <?= __('Política de cookies') ?>
                  </li>
              </ul>
          </div>
          <div class="footercolumn">
              <ul class="footercontent secciones">
                  <li class="footertitle">
                      <?= __('Secciones') ?>
                  </li>
                  <li>
                      <?= __('Portada') ?>
                  </li>
                  <li>
                      <?= __('Destacados') ?>
                  </li>
                  <li>
                      <?= __('Nuevos') ?>
                  </li>
                  <li>
                      <?= __('Comentarios') ?>
                  </li>
              </ul>
          </div>
          <div class="footercolumn">
              <ul class="footercontent usuario">
                  <li class="footertitle">
                      Manuel
                  </li>
                  <li>
                      <?= __('Perfil') ?>
                  </li>
                  <li>
                      <?= __('Nuevo producto') ?>
                  </li>
                  <li>
                      <?= __('Mis productos') ?>
                  </li>
                  <li>
                      <?= __('Chats') ?>
                  </li>
              </ul>
          </div>
      </div>
      <div class="footerright">
          <div class="footercolumn">
              <ul class="footercontent redes">
                  <li class="footertitle">
                      <?= __('Redes') ?>
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
                      <?= $this->Html->image('youtube_icon.svg', array('alt' => __('Profile'), 'class' => 'footerimg', 'escape' => false)) ?>
                      Youtube
                  </li>
              </ul>
          </div>
          <div class="footercolumn">
              <ul class="footercontent usuarios">
                  <li class="footertitle">
                      <?= __('Usuarios') ?>
                  </li>
                  <li>
                      <?= $this->Html->image('users_blue_icon.svg', array('alt' => __('Users'), 'class' => 'footerimg', 'escape' => false)) ?>
                      359553 <?= __('miembros') ?>
                  </li>
                  <li>
                      <?= $this->Html->image('users_green_icon.svg', array('alt' => __('Connected'), 'class' => 'footerimg', 'escape' => false)) ?>
                      15028 <?= __('online') ?>
                  </li>
              </ul>
          </div>
      </div>
  </footer>
</body>
</html>
