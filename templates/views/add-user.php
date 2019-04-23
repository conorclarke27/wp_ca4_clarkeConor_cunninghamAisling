<h2>Add Users</h2>
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
                                <input type='text' id='type_id' name='type_id' value='<?= $type_id['value'] ?>' class="form-control">
                            </div>
                            <div class="col-md-10">
                                <label for='username'>Username:</label>
                                <input type='text' id='username' name='username' value='<?= $username['value'] ?>' class="form-control">
                            </div>
                            <div class="col-md-5">
                                <label for='email'>Email:</label>
                                <input type='email' id='email' name='email' value='<?= $email['value'] ?>' class="form-control">
                            </div>
                            <div class="col-md-5">
                                <label for='password'>Password:</label>
                                <input type='password' id='password' name='password' value='<?= $password ?>' class="form-control">
                            </div>
                            <div class="col-md-10">
                                <label for='supplier_name'>Supplier:</label>
                                <input type='text' id='supplier_name' name='supplier_name' value='<?= $supplier_name['value'] ?>' class="form-control">
                            </div>
                            <p><br/></p>
                            <div class="row">
                            <div class="col-md-12">
                                <input style="float:right;" type='submit' value='Sign Up' class="btn btn-success btn-lg">
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
