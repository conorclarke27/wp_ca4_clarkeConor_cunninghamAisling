<h2></h2>
<?php $types = $locals['viewAllTypes']?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>

      
    <div class="row">
    <div class="col-sm-1"></div>
<div class="col-sm-9">
    <div class="card text-white bg-info mb-3">
      <div class="card-body">
        <h5 class="card-title">Welcome! Please fill out our sign up form</div></h5>
        <p class="card-text">
        <form action='' method='post'>
                            <div class="col-sm-10">
                            <label for="type_id">Type Name:</label>
                            <select name="type_id" id="type_id" class="form-control">
                            <option value="" disabled selected>Select...</option>
                            <?php foreach($types as $type) {?>                                                                                                           
                            <option value="<?= $type->getTypeId()?>"><?= $type->getTypeName()?> </option>
                            <?php } ?>
                            </select>
                            </div>
                            <div class="col-sm-10">
                                <label for='username'>Username:</label>
                                <input type='text' id='username' name='username' value='<?= $username['value'] ?>' class="form-control">
                            </div>
                            <div class="col-sm-10">
                                <label for='email'>Email:</label>
                                <input type='email' id='email' name='email' value='<?= $email['value'] ?>' class="form-control">
                            </div>
                            <div class="col-sm-5">
                                <label for='password'>Password:</label>
                                <input type='password' id='password' name='password' value='<?= $password ?>' class="form-control">
                            </div>
                            <div class="col-sm-5">
                                <label for='password2'>Re-enter Password:</label>
                                <input type='password' id='password2' name='password2' value='<?= $password2 ?>' class="form-control">
                            </div>
                            <div class="col-sm-10">
                                <label for='supplier_name'>Supplier:</label>
                                <input type='text' id='supplier_name' name='supplier_name' value='<?= $supplier_name['value'] ?>' class="form-control">
                            </div>
                            <p><br/></p>
                            <div class="row">
                            <div class="col-sm-11">
                                <input style="float:right;" type='submit' value='Sign Up' class="btn btn-success btn-lg">
                            </div>
                            </div>
                        </form>
       </p>

        
      </div>
    </div>
  </div>
  </div>
  </body>
</html>
