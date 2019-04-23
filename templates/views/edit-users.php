<?php $user = $locals['user']; ?>
<h2>Edit Users</h2>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="panel panel-success">
                        <div class="panel-heading">Sign Up Form</div>
                        <div class="panel-body">
                           <form action='' method='post'>
                            <div class="col-md-10">
                                <label for='type_id'>User Type ID:</label>
                                <input type='text' id='type_id' name='type_id' value='<?= $user->getUserType(); ?>' class="form-control">
                            </div>
                            <div class="col-md-10">
                                <label for='username'>Username:</label>
                                <input type='text' id='username' name='username' value='<?= $user->getUserName(); ?>' class="form-control">
                            </div>
                            <div class="col-md-5">
                                <label for='email'>Email:</label>
                                <input type='email' id='email' name='email' value='<?= $user->getEmail(); ?>' class="form-control">
                            </div>
                            <div class="col-md-5">
                                <label for='password'>Password:</label>
                                <input type='password' id='password' name='password' value='<?= $user->getPassword(); ?>' class="form-control">
                            </div>
                            <div class="col-md-10">
                                <label for='supplier_name'>Supplier:</label>
                                <input type='text' id='supplier_name' name='supplier_name' value='<?= $user->getSupplier_Name(); ?>' class="form-control">
                            </div>
                            <p><br/></p>
                            <div class="row">
                            <div class="col-md-12">
                                <input style="float:right;" type='submit' value='Edit' class="btn btn-success btn-lg">
                            </div>
                            </div>
                        </form>
                        </div>

                    </div>



                </div>


                <div class="col-md-1"></div>

            </div>
        </div>
    </body>
</html>
