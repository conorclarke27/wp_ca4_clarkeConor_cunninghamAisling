<h2>View Coffees</h2>

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
                    <div class="panel panel-info">
                        <div class="panel-heading">Products</div>
                        <div class="panel-body">
                        <?php
                                foreach ($locals['viewAllCoffees'] as $coffee)  {
                                    ?>
                            <div class ="col-md-3">

                                

                                    <div class="panel panel-info">
                                        <div class="panel-heading"><?= $coffee->getCoffeeName() ?></div>
                                        <div class="panel-body">
                                            <img src="./assets/images/kenco-smooth.jpg" class="img-thumbnail"  alt="Responsive image">
                                        </div>
                                        <div class="panel-heading" style="height:80px;"><?= $coffee->getPrice() ?>
                                            <a style="float:right;" class="btn btn-danger btn-xs" name="add_to_cart">Add To Cart</a>
                                            <br><br>
                                            <a style="float:left;" class='btn btn-danger btn-xs' href='DeleteCoffee?coffee_id=<?= $coffee->getCoffeeId() ?>'> Delete</a>
                                            <a style="float:right;" class="btn btn-success btn-xs" href='edit-coffees?coffee_id=<?= $coffee->getCoffeeId() ?>'> Edit </a>
                                            </div>
                                            </div>
                                </div>
                            <?php }
                            ?>

                        </div>

                    </div>



                </div>


                <div class="col-md-1"></div>

            </div>
        </div>
    </body>
</html>