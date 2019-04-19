<h2>Create an order</h2>
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
                        <div class="panel-heading">Create an Order</div>
                        <div class="panel-body">
                           <form action='' method='post'>
                            <div class="col-md-8">
                            <label for='user_id'>User ID:</label>
                            <input type='text' id='user_id' name='user_id' value='<?= $user_id['value']; ?>'class="form-control">
                            </div>
                            <div class="col-md-8">
                            <label for='coffee_id'>Coffee ID:</label>
                            <input type='text' id='coffee_id' name='coffee_id' value='<?= $coffee_id['value']; ?>' class="form-control">
                            </div>
                            <p><br/></p>
                            <div class="row">
                            <div class="col-md-12">
                                <input style="float:right;" type='submit' value='Create Order' class="btn btn-success btn-lg">
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
