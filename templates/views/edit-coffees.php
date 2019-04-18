<?php $coffee = $locals['coffee']; ?>

<h2>Edit Coffees</h2>

<form action='' method='post'>

    <label for='coffee_name'>Coffee Name:</label>
    <input type='text' id='coffee_name' name='coffee_name' value='<?= $coffee->getCoffeeName(); ?>'>

    <label for='supplier_name'>Supplier Name</label>
    <input type='text' id='supplier_name' name='supplier_name' value='<?= $coffee->getSupplierName(); ?>'>

    <label for='price'>Price</label>
    <input type='text' id='price' name='price' value='<?= $coffee->getPrice(); ?>'>

    <label for='quantity'>Quantity</label>
    <input type='text' id='quantity' name='quantity' value='<?= $coffee->getQuantity(); ?>'>

    <input type='submit' value='Submit'>

</form>