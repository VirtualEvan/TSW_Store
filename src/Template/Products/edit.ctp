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
        $selected = explode(',', $product->category);
        foreach( $options as $key => $value ){
          if(in_array($key, $selected)){$checked=true;}else{$checked=false;}
          echo $this->Form->input('category[]',
              [
                  'templates' => ['inputContainer' => '<div class="checkbox" >{{content}}</div>'],
                  'value' => $key,
                  'label' => $value,
                  'checked' => $checked,
                  'hiddenField' => false,
                  'id' => 'category-'.$key
              ]);
        }
    ?>
    <?= $this->Html->div('inputdiv', $this->Form->button(__('Edit product'), ['class' => 'editbutton'])) ?>
<?= $this->Form->end() ?>
