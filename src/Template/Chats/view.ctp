<?php
  echo $this->Html->div('chatname',$chat->product->name);
  $currentuser = $this->request->session()->read('Auth.User');
?>
      <?php if (!empty($chat->messages)): ?>
          <?php foreach ($chat->messages as $messages):
            if($messages->sender == 0 && $currentuser['id'] == $chat->product->user_id){
              $messageclass = "sender";
              $imgLocation = "Users/".$chat->product->user_id;
            }
            elseif($messages->sender == 1 && $currentuser['id'] == $chat->product->user_id){
              $messageclass = "recipient";
              $imgLocation = "Users/".$chat->user_id;
            }
            elseif($messages->sender == 1 && $currentuser['id'] == $chat->user_id){
              $messageclass = "sender";
              $imgLocation = "Users/".$chat->user_id;
            }
            else {
              $messageclass = "recipient";
              $imgLocation = "Users/".$chat->product->user_id;
            }
          ?>
          <div class="messagecontainer">
            <div class="<?= "message ".$messageclass ?>">
              <?= h($messages->content) ?>
              <div class="messagehour">
                <?= h($messages->created) ?>
                <?= $this->Html->image($imgLocation, array('alt' => 'Buyer', 'class' => 'userimgchatsmessages', 'escape' => false, 'onerror' => "this.src='".$this->Url->image('profile_img.svg')."'")); ?>
              </div>
            </div>
          </div>
      <?php
                endforeach;
            endif;
      ?>
      <div class="newmessage">
        <?= $this->Form->create($message, ['url' => ['controller' => 'messages', 'action' => 'add', $chat->id]]); ?>
        <?= $this->Form->textarea('content', array('label' => false, 'class' =>'messagetextarea', 'rows' => '3')); ?>
        <?= $this->Form->button(__('Send'), array('class' =>'messagebutton')); ?>
        <?php
          if($currentuser['id'] == $chat->user_id)
          {
            echo $this->Form->hidden('sender', array('value' => 1));
          }
          else
          {
            echo $this->Form->hidden('sender', array('value' => 0));
          }
        ?>
        <?= $this->Form->end(); ?>
      </div>
