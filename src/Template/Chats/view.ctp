<?php
  $currentuser = $this->request->session()->read('Auth.User');
?>
      <div class="messagesview" id="testing">
          <div id="mc"></div>
      </div>
      <div class="newmessage">
          <?= $this->Form->create($message, ['templates' => ['inputContainer' => '{{content}}']]); ?>
          <?= $this->Form->input('content', array('type'=>'text','label' => false, 'class' =>'messagetextarea', 'rows' => '3', 'autocomplete' => 'off')); ?>
          <?= $this->Form->submit(__('Send'), array('class' =>'messagebutton', 'name' => 'submit')); ?>
          <?= $this->Form->end(); ?>
      </div>


<?= $this->Html->script('jquery-3.1.1.min.js'); ?>

<script type="text/javascript">
    function update(){
        var actualHeight = document.getElementsByClassName("messagesview")[0].scrollHeight;
        $.ajax({
            async: false,
            url: ' <?= $this->Url->build(["controller" => "chats", "action" => "view", $chat->id], true) ?> ',
            cache: false,
            type: 'POST',

            success: function (data) {
                $('#mc').html(data);
                if( actualHeight < document.getElementsByClassName("messagesview")[0].scrollHeight ){
                  $("div.messagesview").animate({scrollTop: document.getElementsByClassName("messagesview")[0].scrollHeight});
                }
            }
        });

        setTimeout('update()', 2000);

    };

    $(document).ready(

        $(function()
        {

            update();
            $("div.messagesview").scrollTop(document.getElementsByClassName("messagesview")[0].scrollHeight);

            $('form').on('submit',
                function (event) {

                    event.preventDefault();

                    $.ajax(
                    {
                        url: ' <?= $this->Url->build(["controller" => "messages", "action" => "add", $chat->id], true) ?> ',
                        type: 'POST',
                        data: $('form').serialize(),
                        success: function ()
                        {
                            update();
                            $("div.messagesview").animate({scrollTop: document.getElementsByClassName("messagesview")[0].scrollHeight});
                        }
                    });

                    this.reset();

                }

            );

        })

    );
</script>
