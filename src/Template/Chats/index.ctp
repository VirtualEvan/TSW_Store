<?php
  echo $this->Html->div('chatname', __('Chats'));
  foreach ($chats as $chat):
    //TODO: Mostrar los de cad usuario contando eliminados y fotos
    echo $this->Html->link($chat->product->name, array('controller' => 'Chats', 'action' => 'view', $chat->id), array('class' => 'chatlink', 'escape' => false));
  endforeach;
?>