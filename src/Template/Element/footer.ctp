<?php
  $currentuser = $this->request->session()->read('Auth.User');
?>

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
                    <?= $currentuser['name'] ?>
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