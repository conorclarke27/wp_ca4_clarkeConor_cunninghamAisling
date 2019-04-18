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
                                        <div class="panel-heading"><?= $coffee->getPrice() ?>
                                            <button style="float:right;" class="btn btn-danger btn-xs">Add To Cart</button>
                                        </div>
                                    </div>
                             
                                </div>
                                       
                        <?php }
                            ?>
                            

                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
</body>
</html>