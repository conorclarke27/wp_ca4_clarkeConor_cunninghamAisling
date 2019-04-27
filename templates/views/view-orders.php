<h2>View Orders</h2>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
    <div class="row">
    <?php foreach ($locals['viewAllOrders'] as $order) { ?>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Order: <?= $order->getOrderID() ?></h5>
        <p class="card-text"> User ID: <?= $order->getUserID() ?></p>
        <p class="card-text"> Coffee ID: <?= $order->getCoffeeID() ?></p>
        <div class="card-footer" style="height:150px;">
        <a  class='btn btn-success btn-xs' href='edit-orders?order_id=<?= $order->getOrderID() ?>'> Edit</a>
        <a class="btn btn-danger btn-xs" href='DeleteOrder?order_id=<?= $order->getOrderID() ?>'>Delete</a>
      </div>
    </div>
  </div>
  </div>
  <?php }?>
   </div>
    </body>
</html>