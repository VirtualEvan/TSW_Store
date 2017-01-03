<?php
$currentuser = $this->request->session()->read('Auth.User');
  echo $this->Html->div('chatname', __('Chats'));
  foreach ($chats as $chat):
    if($currentuser["id"]==$chat->user_id){
    echo $this->Html->link($chat->product->name.$this->Html->image('Users/'.$chat->product->user_id, array('alt' => 'Seller', 'class' => 'userimgchats', 'escape' => false, 'onerror' => "this.src='".$this->Url->image('profile_img.svg')."'")), array('controller' => 'Chats', 'action' => 'view', $chat->id), array('class' => 'chatlink', 'escape' => false));
  }else {
    echo $this->Html->link($chat->product->name.$this->Html->image('Users/'.$chat->user_id, array('alt' => 'Buyer', 'class' => 'userimgchats', 'escape' => false, 'onerror' => "this.src='".$this->Url->image('profile_img.svg')."'")), array('controller' => 'Chats', 'action' => 'view', $chat->id), array('class' => 'chatlink2', 'escape' => false));
  }
  endforeach;
?>
