<?php
  $currentuser = $this->request->session()->read('Auth.User');
  use Cake\I18n\I18n;
?>

<footer class="footer">
    <div class="footerleft">
        <div class="footercolumn">
            <ul class="footercontent">
                <li class="footertitle">
                    <?= __('© Traepaká 2016') ?>
                </li>
                <li>
                    <?= __('Rules') ?>
                </li>
                <li>
                    <?= __('Contact') ?>
                </li>
                <li>
                    <?= __('Legal information') ?>
                </li>
                <li>
                    <?= __('Cookies policy') ?>
                </li>
            </ul>
        </div>
        <div class="footercolumn">
            <ul class="footercontent secciones">
                <li class="footertitle">
                    <?= __('Language') ?>
                </li>
                <li>
                    <?= $this->Html->link(
                          __('English'),
                          array('controller' => 'App', 'action' => 'setLanguage', 'en'),
                          array('class' => 'footerlink', 'escape' => false)
                        )
                    ?>
                </li>
                <li>
                  <?= $this->Html->link(
                        __('Spanish'),
                        array('controller' => 'App', 'action' => 'setLanguage', 'es'),
                        array('class' => 'footerlink', 'escape' => false)
                      )
                  ?>
                </li>
            </ul>
        </div>
        <div class="footercolumn">
            <ul class="footercontent usuario">
                <li class="footertitle">
                    <?= isset($currentuser)? $currentuser['name'] : 'User' ?>
                </li>
                <li>
                    <?= __('Profile') ?>
                </li>
                <li>
                    <?= __('New product') ?>
                </li>
                <li>
                    <?= __('My products') ?>
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
                    <?= __('Networks') ?>
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
                    <?= __('Users') ?>
                </li>
                <li>
                    <?= $this->Html->image('users_blue_icon.svg', array('alt' => __('Users'), 'class' => 'footerimg', 'escape' => false)) ?>
                    359553 <?= __('members') ?>
                </li>
                <li>
                    <?= $this->Html->image('users_green_icon.svg', array('alt' => __('Connected'), 'class' => 'footerimg', 'escape' => false)) ?>
                    15028 <?= __('online') ?>
                </li>
            </ul>
        </div>
    </div>
</footer>
