<?= $this->Form->create($user, ['type' => 'file', 'templates' => ['inputContainer' => '<div class="inputdiv" >{{content}}</div>']]) ?>
    <?= $this->Form->input('name',['class' => 'input']); ?>
    <?= $this->Form->input('username',['class' => 'input']); ?>
    <?= $this->Form->input('password', ['class' => 'input']);//TODO:QUITAR ESTO ?>
    <?= $this->Form->input('email', ['class' => 'input']); ?>
    <?= $this->Html->div('inputdiv',$this->Form->file('upload', ['enctype' => 'multipart/form-data'])); ?>
    <?= $this->Html->div('inputdiv', $this->Form->button(__('Edit user'), ['class' => 'editbutton'])) ?>
<?= $this->Form->end() ?>