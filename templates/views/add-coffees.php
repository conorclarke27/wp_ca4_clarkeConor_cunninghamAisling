<h2>Add Coffees</h2>

<form action='' method='post'>

    <label for='coffee_name'>Coffee Name:</label>
    <input type='text' id='coffee_name' name='coffee_name' value='<?= $coffee_name['value']; ?>'>

    <label for='supplier_name'>Supplier Name</label>
    <input type='text' id='supplier_name' name='supplier_name' value='<?= $supplier_name['value']; ?>'>

    <label for='price'>Price</label>
    <input type='text' id='price' name='price' value='<?= $price['value']; ?>'>

    <label for='quantity'>Quantity</label>
    <input type='text' id='quantity' name='quantity' value='<?= $quantity['value']; ?>'>

    <input type='submit' value='Submit'>

</form>