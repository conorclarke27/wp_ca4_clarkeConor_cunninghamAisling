<h2>View Orders</h2>
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
                        <div class="panel-heading">Orders</div>
                        <div class="panel-body">
                        <?php foreach ($locals['viewAllOrders'] as $order) { ?>
                                <div class ="col-md-3">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">Order: <?= $order->getOrderID() ?></div>
                                        <div class="panel-body">
                                            <div class="panel-heading">User ID: <?= $order->getUserID() ?></div>
                                            <div class="panel-heading">Coffee ID: <?= $order->getCoffeeID() ?></div>
                                        </div>
                                        <div class="panel-heading" style="height:40px;">
                                            <a style="float:left;" class='btn btn-success btn-xs' href='edit-orders?order_id=<?= $order->getOrderID() ?>'> Edit</a>
                                            <a style="float:right;" class="btn btn-danger btn-xs" href='DeleteOrder?order_id=<?= $order->getOrderID() ?>'>Delete</a>
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