<h2>Add Coffees</h2>

<form action='' method='post'>

    <label for='user_id'>User ID:</label>
    <input type='text' id='user_id' name='user_id' value='<?= $user_id['value']; ?>'>

    <label for='coffee_id'>Coffee ID:</label>
    <input type='text' id='coffee_id' name='coffee_id' value='<?= $coffee_id['value']; ?>'>

    <input type='submit' value='Submit'>

</form>