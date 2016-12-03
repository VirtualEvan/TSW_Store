<?php
$currentuser = $this->request->session()->read('Auth.User');
  echo $this->Html->div('chatname', __('Chats'));
  foreach ($chats as $chat):
    //TODO: Mostrar los de cad usuario contando eliminados y fotos
    if($currentuser["id"]==$chat->user_id){
    echo $this->Html->link($chat->product->name, array('controller' => 'Chats', 'action' => 'view', $chat->id), array('class' => 'chatlink', 'escape' => false));
  }else {
    echo $this->Html->link($chat->product->name, array('controller' => 'Chats', 'action' => 'view', $chat->id), array('class' => 'chatlink2', 'escape' => false));
  }
  endforeach;
?>
