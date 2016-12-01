<?php
  echo $this->Html->div('chatname',$chat->product->name);
  $currentuser = $this->request->session()->read('Auth.User');
?>
<!--
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $chat->has('product') ? $this->Html->link($chat->product->name, ['controller' => 'Products', 'action' => 'view', $chat->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($chat->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($chat->user_id) ?></td>
        </tr>
    </table>
  -->
        <?php if (!empty($chat->messages)): ?>
            <?php foreach ($chat->messages as $messages):
              if($messages->sender == 0 && $currentuser['id'] == $chat->product->user_id){
                $messageclass = "sender";
              }
              elseif($messages->sender == 1 && $currentuser['id'] == $chat->user_id){
                $messageclass = "sender";
              }
              else {
                $messageclass = "recipient";
              }
            ?>
            <div class="messagecontainer">
              <div class="<?= "message ".$messageclass ?>">
                <?= h($messages->content) ?>
                <div class="messagehour">
                  <?= h($messages->created) ?>
                </div>
              </div>
            </div>
            <!--
            <tr>
                <td><?= h($messages->id) ?></td>
                <td><?= h($messages->sender) ?></td>
                <td><?= h($messages->chat_id) ?></td>
                <td><?= h($messages->content) ?></td>
                <td><?= h($messages->created) ?></td>
            </tr>
          -->
            <?php
              endforeach;
              endif;
            ?>
      <div class="newmessage">
        <?= $this->Form->create($message, ['url' => ['controller' => 'messages', 'action' => 'add', $chat->id]]); ?>
        <?= $this->Form->textarea('content', array('label' => false, 'class' =>'messagetextarea')); ?>
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
