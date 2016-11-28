<?php
  foreach ($products as $product):
    $div_price = $this->Html->div('price', $this->Number->format($product->price).$this->Html->image('profile_img.svg', array('alt' => 'Seller', 'class' => 'sellerimg', 'escape' => false)));
    $div_productname = $this->Html->div('productname', h($product->name));
    $div_description = $this->Html->div('description', $div_productname.$div_price);
    $div_productimg = $this->Html->div('productimg', $this->Html->image('ejemplo.jpg', array('alt' => 'Product', 'class' => 'productimgsize', 'escape' => false)));
    $div_product = $this->Html->div('product', $div_productimg.$div_description);

    echo $this->Html->link(
        $div_product,
        array('controller' => 'Products', 'action' => 'view', $product->id),
        array('class' => 'linkproduct', 'escape' => false)
    );
  endforeach;
?>
