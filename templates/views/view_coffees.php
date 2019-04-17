<h2>View Coffees</h2>

<table>
    <tr>

        <th><strong>coffee ID</strong></th>
        <th><strong>Coffee Name</strong></th>
        <th><strong>Supplier Name</strong></th>
        <th><strong>Price</strong></th>
        <th><strong>Quantity </strong></th>

    </tr>



    <ul>
        <?php
        foreach ($locals['viewAllCoffees'] as $coffee) {
            ?>
            <tr>
                <td><?= $coffee->getCoffeeId() ?></td>
                <td><?= $coffee->getCoffeeName() ?></td>
                <td><?= $coffee->getSupplierName() ?></td>
                <td><?= $coffee->getPrice() ?></td>
                <td><?= $coffee->getQuantity() ?></td>

                <td>
                    <a class='btn' href='deletecoffee?coffeeID=<?= $coffee->getCoffeeId() ?>'> Delete coffee </a> 
                </td>
                <td>
                    <a class='btn' href='editcoffee?coffeeID=<?= $coffee->getCoffeeId() ?>'> Edit coffee </a> 
                </td>

            </tr>
        </ul>

    <?php }
    ?>

</table>

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
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">Products</div>
                        <div class="panel-body">
                            <div class ="col-md-4">

                                <?php
                                foreach ($coffees['viewAllCoffees'] as $coffee) {
                                    ?>

                                    <div class="panel panel-info">
                                        <div class="panel-heading"><?= $coffee->getCoffeeID() ?></div>
                                        <div class="panel-body">
                                            <img src="images/kenco-smooth.jpg" class="img-thumbnail"  alt="Responsive image">
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
                    <div class ="panel-footer">&copy; 2019</div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</body>
</html>