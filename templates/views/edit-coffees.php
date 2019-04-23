<br>
<br>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
    <?php $coffee = $locals['coffee']; ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="panel panel-success">
                        <div class="panel-heading">Edit Coffees</div>
                        <div class="panel-body">
                           <form action='' method='post'>
                            <div class="col-md-10">
                                <label for='coffee_name'>Coffee Name:</label>
                                <input type='text'id='coffee_name' name='coffee_name' value='<?= $coffee->getCoffeeName(); ?>' class="form-control">
                            </div>
                            <div class="col-md-10">
                            <label for='supplier_name'>Supplier Name</label>
                            <input type='text' id='supplier_name' name='supplier_name' value='<?= $coffee->getSupplierName(); ?>' class="form-control">
                            </div>
                            <div class="col-md-5">
                            <label for='price'>Price</label>
                            <input type='text' id='price' name='price' value='<?= $coffee->getPrice(); ?>' class="form-control">
                            </div>
                            <div class="col-md-5">
                            <label for='quantity'>Quantity</label>
                            <input type='text' id='quantity' name='quantity' value='<?= $coffee->getQuantity(); ?>'class="form-control">
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
