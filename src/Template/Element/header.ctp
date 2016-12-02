<header class="header">
      <?= $this->Form->create(null, ['templates' => ['inputContainer' => '{{content}}'],'url' => ['controller' => 'Products', 'action' => 'search']]); ?>
      <?=
          $this->Form->input('keyword', array(
              'label' => false,
              'placeholder' => __('Search...'),
              'class' => 'searchbar'
          ));
      ?>
      <?= $this->Form->button(__('Search'), array('class' => 'searchbutton', 'templates' => ['inputContainer' => '{{content}}'])); ?>
      <?= $this->Form->end(); ?>
</header>