<!-- File: src/Template/Articles/index.ctp -->

<h1>Store products</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Seller</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($products as $product): ?>
    <tr>
        <td><?= $product->id ?></td>
        <td>
            <?= $this->Html->link($product->name, ['action' => 'view', $product->id]) ?>
        </td>
        <td>
            <?= $product->price.'€' ?>
        </td>
        <td>
            <?= $product->description ?>
        </td>
        <td>
            <?= $product->created->format(DATE_RFC850) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>