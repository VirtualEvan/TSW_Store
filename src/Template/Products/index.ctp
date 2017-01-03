<?php
  foreach ($products as $product):
    $div_price = $this->Html->div('price', $this->Number->format($product->price).$this->Html->image('Users/'.$product->user->id, array('alt' => 'Seller', 'class' => 'sellerimg', 'escape' => false, 'onerror' => "this.src='".$this->Url->image('profile_img.svg')."'")));
    $div_productname = $this->Html->div('productname', $product->name);
    $div_description = $this->Html->div('description', $div_productname.$div_price);
    $div_productimg = $this->Html->div('productimg', $this->Html->image('Products/'.$product->image, array('alt' => 'Product', 'class' => 'productimgsize', 'escape' => false)));
    $div_product = $this->Html->div('product', $div_productimg.$div_description);

    echo $this->Html->link(
        $div_product,
        array('controller' => 'Products', 'action' => 'view', $product->id),
        array('class' => 'linkproduct', 'escape' => false)
    );
  endforeach;
?>
