<?= $this->Form->create($product, ['type' => 'file', 'templates' => ['inputContainer' => '<div class="inputdiv" >{{content}}</div>']]) ?>
    <?= $this->Form->input('name',['class' => 'input']); ?>
    <?= $this->Form->input('price',['class' => 'input']); ?>
    <?= $this->Html->div('inputdiv',$this->Form->file('upload', ['enctype' => 'multipart/form-data'])); ?>
    <?= $this->Form->input('description', ['type' => 'textarea', 'class' => 'producttextarea']); ?>
    <?php
        $options = [
            'home' => __('Home'),
            'fashion' => __('Fashion'),
            'home-appliances' => __('Home Appliances'),
            'leisure' => __('Leisure'),
            'util' => __('Utils')
        ];
        echo $this->Form->select('category', $options, [
            'multiple' => 'checkbox'
        ]);
    ?>
    <?= $this->Html->div('inputdiv', $this->Form->button(__('Add product'), ['class' => 'addbutton'])) ?>
<?= $this->Form->end() ?>

