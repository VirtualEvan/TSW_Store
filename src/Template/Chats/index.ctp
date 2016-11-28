<?php
  echo $this->Html->div('chatname', __('Chats'));
  foreach ($chats as $chat):
    echo $this->Html->link($chat->product->name, array('controller' => 'Chats', 'action' => 'view', $chat->id), array('class' => 'chatlink', 'escape' => false));
  endforeach;
?>