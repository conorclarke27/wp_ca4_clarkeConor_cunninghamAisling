<?php $order = $locals['order']; ?>
<?php $coffees = $locals['viewAllCoffees']?>
<br>
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

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="panel panel-success">
                        <div class="panel-heading">Edit Order</div>
                        <div class="panel-body">
                           <form action='' method='post'>
                            <div class="col-md-8">
                            <label for='user_id'>User ID:</label>
                            <input type='text' id='user_id' name='user_id' value='<?= $order->getUserID(); ?>'class="form-control">
                            </div>
                            <div  class="col-md-8">
                            <label for="coffee_id">Coffee Name:</label>
                            <select name="coffee_id" id="coffee_id" class="form-control">
                            <option value="" disabled selected>Select...</option>
                            <?php foreach($coffees as $coffee) {?>                                                                                                           
                            <option value="<?= $coffee->getCoffeeId()?>"><?= $coffee->getCoffeeName()?> </option>
                            <?php } ?>
                            </select>
                            </div>
                            <p><br/></p>
                            <div class="row">
                            <div class="col-md-12">
                                <input style="float:right;" type='submit' value='Edit Order' class="btn btn-success btn-lg">
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
