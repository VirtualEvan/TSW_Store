<?php
  $currentuser = $this->request->session()->read('Auth.User');
?>

<nav class="mainnavigation">
  <div class="logo">
    <?php echo $this->Html->link(
          $this->Html->image('icon.svg', array('alt' => 'Logo', 'class' => 'logoimg', 'escape' => false)).'Traepaká',
          array('controller' => 'Products', 'action' => 'index'),
          array('class' => 'indexlink', 'escape' => false)
        );

    ?>
  </div>
  <div class="navlogin">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create(null, ['templates' => ['inputContainer' => '<div class="inputdiv" >{{content}}</div>'],'url' => ['controller' => 'Users', 'action' => 'login']]) ?>
        <?= $this->Form->input('username', array('class' => 'input')) ?>
        <?= $this->Form->input('password', array('class' => 'input')) ?>
        <?= $this->Html->div('inputdiv', $this->Form->button(__('Login'), array('class' => 'loginbutton'))
      .$this->Html->link(
          $this->Form->input(__('Register'), array('templates' => ['inputContainer' => '{{content}}'], 'type'=>'button', 'class' => 'registerbutton', 'label' => false)),
          array('controller' => 'Users', 'action' => 'add'),
          array('class' => 'nounderline', 'escape' => false)));
    ?>
    <?= $this->Form->end() ?>
  </div>
</nav>

