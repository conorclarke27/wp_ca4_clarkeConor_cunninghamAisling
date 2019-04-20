<?php $user = $locals['user']; ?>

<h2>Edit Users</h2>

<form action='' method='post'>

    <label for='type_id'>Type:</label>
    <input type='text' id='type_id' name='type_id' value='<?= $user->getUserType(); ?>'>

    <label for='username'>Username:</label>
    <input type='text' id='username' name='username' value='<?= $user->getUserName(); ?>'>

    <label for='password'>Password:</label>
    <input type='text' id='password' name='password' value='<?= $user->getPassword(); ?>'>

    <label for='email'>Email:</label>
    <input type='text' id='email' name='email' value='<?= $user->getEmail(); ?>'>

    <label for='supplier_name'>Supplier Name:</label>
    <input type='text' id='supplier_name' name='supplier_name' value='<?= $user->getSupplier_Name(); ?>'>

    <input type='submit' value='Submit'>

</form>