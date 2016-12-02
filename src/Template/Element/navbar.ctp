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
  <ul class="list_nav">
    <li>
      <div class="profile">
        <div class="profileimgblock">
          <?php if(file_exists(WWW_ROOT . 'img/Users/' . $currentuser['id'])): ?>
          <?= $this->Html->image('Users/'.$currentuser['id'], array('alt' => 'Profile', 'class' => 'profileimg', 'escape' => false)) ?>
        <?php else: ?>
          <?= $this->Html->image('profile_img.svg', array('alt' => 'Profile', 'class' => 'profileimgdefault', 'escape' => false)) ?>
        <?php endif; ?>
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
            __('Add product').$this->Html->image('add_icon.svg', array('alt' => __('Add product'), 'class' => 'navimg', 'escape' => false)),
            array('controller' => 'Products', 'action' => 'add'),
            array('class' => 'nav', 'escape' => false)
          );
      ?>
    </li>
    <li>
      <?php echo $this->Html->link(
            __('My products').$this->Html->image('box_icon.svg', array('alt' => __('My products'), 'class' => 'navimg', 'escape' => false)),
            array('controller' => 'Products', 'action' => 'mine', $currentuser['id']),
            array('class' => 'nav', 'escape' => false)
          );
      ?>
    </li>
    <li>
      <?php echo $this->Html->link(
            __('Chats').$this->Html->image('chat_icon.svg', array('alt' => __('Chats'), 'class' => 'navimg', 'escape' => false)),
            array('controller' => 'Chats', 'action' => 'mine', $currentuser['id']),
            array('class' => 'nav', 'escape' => false)
          );
      ?>
    </li>
  </ul>
</nav>
