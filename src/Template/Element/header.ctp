<?= $this->Html->script('category.js'); ?>
<header class="header">
      <?= $this->Form->create(null, ['templates' => ['inputContainer' => '{{content}}'],'url' => ['controller' => 'Products', 'action' => 'search']]); ?>
      <?=
          $this->Form->input('keyword', array(
              'label' => false,
              'placeholder' => __('Search...'),
              'class' => 'searchbar'
          ));
      ?>
      <div class="multiselect">
        <div class="selectBox" onclick="showCheckboxes()">
          <select>
              <option><?= __('Category') ?></option>
          </select>
        <div class="overSelect"></div>
        </div>
        <div id="checkboxes">
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
        </div>
      </div>

      <?= $this->Form->button(__('Search'), array('class' => 'searchbutton', 'templates' => ['inputContainer' => '{{content}}'])); ?>
      <?= $this->Form->end(); ?>
</header>