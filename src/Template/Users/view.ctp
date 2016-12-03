<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Name') ?></th>
        <td><?= h($user->name) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Username') ?></th>
        <td><?= h($user->username) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Email') ?></th>
        <td><?= h($user->email) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Actions') ?></th>
        <td>
          <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id],['class' => 'editbutton']) ?>
          <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['class' => 'deletebutton', 'confirm' => __('Are you sure you want to delete {0}?', $user->name)]) ?>
        </td>
    </tr>
</table>