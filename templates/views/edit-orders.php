<?php $order = $locals['order']; ?>

<h2>Edit Orders</h2>

<form action='' method='post'>

    <label for='user_id'>User ID:</label>
    <input type='text' id='user_id' name='user_id' value='<?= $order->getUserID(); ?>'>

    <label for='coffee_id'>Coffee ID:</label>
    <input type='text' id='coffee_id' name='coffee_id' value='<?= $order->getCoffeeID(); ?>'>

    <input type='submit' value='Submit'>

</form>