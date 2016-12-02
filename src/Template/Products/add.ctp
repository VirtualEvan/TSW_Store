<?= $this->Form->create($product, ['type' => 'file', 'templates' => ['inputContainer' => '<div class="inputdiv" >{{content}}</div>']]) ?>
    <?= $this->Form->input('name',['class' => 'input']); ?>
    <?= $this->Form->input('price',['class' => 'input']); ?>
    <?= $this->Html->div('inputdiv',$this->Form->file('upload', ['enctype' => 'multipart/form-data'])); ?>
    <?= $this->Form->input('description', ['type' => 'textarea', 'class' => 'producttextarea']); ?>
    <?= $this->Html->div('inputdiv', $this->Form->button(__('Add product'), ['class' => 'addbutton'])) ?>
<?= $this->Form->end() ?>

