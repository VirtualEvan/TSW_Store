<?php
  $currentuser = $this->request->session()->read('Auth.User');
?>

      <?php if (!empty($data->messages)): ?>
          <div id="mc">
              <?php foreach ($data->messages as $messages):
                if($messages->sender == 0 && $currentuser['id'] == $data->product->user_id){
                  $messageclass = "sender";
                  $imgLocation = "Users/".$data->product->user_id;
                }
                elseif($messages->sender == 1 && $currentuser['id'] == $data->product->user_id){
                  $messageclass = "recipient";
                  $imgLocation = "Users/".$data->user_id;
                }
                elseif($messages->sender == 1 && $currentuser['id'] == $data->user_id){
                  $messageclass = "sender";
                  $imgLocation = "Users/".$data->user_id;
                }
                else {
                  $messageclass = "recipient";
                  $imgLocation = "Users/".$data->product->user_id;
                }
              ?>
              <div class="messagecontainer">
                <div class="<?= "message ".$messageclass ?>">
                  <?= $messages->content ?>
                  <div class="messagehour">
                    <?= $messages->created ?>
                    <?= $this->Html->image($imgLocation, array('alt' => 'Buyer', 'class' => 'userimgchatsmessages', 'escape' => false, 'onerror' => "this.src='".$this->Url->image('profile_img.svg')."'")); ?>
                  </div>
                </div>
              </div>
                <?php
                    endforeach;
                ?>
          </div>
      <?php
            endif;
      ?>
