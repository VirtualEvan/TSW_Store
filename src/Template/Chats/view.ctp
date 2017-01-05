<?php
  $currentuser = $this->request->session()->read('Auth.User');
?>
      <div class="messagesview" id="testing">
          <div id="mc"></div>
      </div>
      <div class="newmessage">
          <?= $this->Form->create($message, ['url' => ['controller' => 'messages', 'action' => 'add', $chat->id], 'templates' => ['inputContainer' => '{{content}}']]); ?>
          <?= $this->Form->input('content', array('type'=>'text','label' => false, 'class' =>'messagetextarea', 'rows' => '3', 'autocomplete' => 'off')); ?>
          <?= $this->Form->submit(__('Send'), array('class' =>'messagebutton', 'name' => 'submit')); ?>
          <?= $this->Form->end(); ?>
      </div>


<script type="text/javascript">
    var chat_id = '<?= $chat->id  ?>';
</script>
<?= $this->Html->script('jquery-3.1.1.min.js'); ?>
<?= $this->Html->script('ajax-chat.js'); ?>

