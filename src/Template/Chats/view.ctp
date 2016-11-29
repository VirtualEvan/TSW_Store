<?php
  echo $this->Html->div('chatname',$chat->product->name);
  $currentuser = 1; //TODO: ELIMINAR ESTO
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
              if($messages->sender == 0 && $currentuser == $chat->product->user_id){
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
        <?= $this->Form->textarea('content', array('div' => false, 'label' => false,  'escape' => false,'class' =>'messagetextarea')); ?>
        <?= $this->Form->button(__('Send'), array('class' =>'messagebutton')) ?>
      </div>
