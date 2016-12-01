<?php
  $currentuser = $this->request->session()->read('Auth.User');
?>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Name') ?></th>
        <td><?= h($product->name) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Description') ?></th>
        <td><?= h($product->description) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('User') ?></th>
        <td><?= $product->has('user') ? $this->Html->link($product->user->name, ['controller' => 'Users', 'action' => 'view', $product->user->id]) : '' ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($product->id) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Price') ?></th>
        <td><?= $this->Number->format($product->price) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Created') ?></th>
        <td><?= h($product->created) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Actions') ?></th>
        <?php if ($currentuser['id']==$product->user_id): ?>
          <td>
            <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?>
            <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
          </td>
        <?php else:
          foreach ($product->chats as $chats) {
            if($currentuser['id']==$chats->user_id){
              $chatexists = true;
        ?>
              <td>
                <?php
                    echo $this->Html->link(__('View Chat'), ['controller' => 'chats', 'action' => 'view', $chats->id]);
                ?>
              </td>
        <?php
            }
          }
        ?>
        <td>
          <?php
            if(!isset($chatexists)){
              echo $this->Html->link(__('Start Chat'), ['controller' => 'chats', 'action' => 'add', $product->id]);
            }
          ?>
        </td>

        <?php endif; ?>
    </tr>
</table>