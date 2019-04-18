<h2>Sign Up </h2>

<div>
                <label for='type_id'>User Type ID:</label>
                <input type='text' id='type_id' name='type_id' value='<?= $type_id['value'] ?>'>
            </div>

            <div>
                <label for='username'>Username:</label>
                <input type='text' id='username' name='username' value='<?= $username['value'] ?>'>
            </div>
            <div>
                <label for='password'>Password:</label>
                <input type='password' id='password' name='password' value='<?= $password ?>'>
            </div>
            <div>
                <label for='email'>Email:</label>
                <input type='email' id='email' name='email' value='<?= $email['value'] ?>'>
            </div>
            <div>
                <label for='supplier_name'>Supplier:</label>
                <input type='text' id='supplier_name' name='supplier_name' value='<?= $supplier_name['value'] ?>'>
            </div>
                    


            <div>
                <input type='submit' name ="register" value='send'>
            </div>
        </form>
