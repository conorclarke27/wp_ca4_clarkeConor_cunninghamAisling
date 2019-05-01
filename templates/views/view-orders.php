    <h2>View Orders</h2>
    <div class="row" style="margin-top: 20px;">
    <?php foreach ($locals['viewAllOrders'] as $order) { ?>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Order: <?= $order->getOrderID() ?></h5>
        <p class="card-text"> User ID: <?= $order->getUserID() ?></p>
        <p class="card-text"> Coffee ID: <?= $order->getCoffeeID() ?></p>
        <div class="card-footer" style="height:100px;">
          <a  class='btn btn-success btn-xs' href='edit-orders?order_id=<?= $order->getOrderID() ?>'> Edit</a>
          <a class="btn btn-danger btn-xs" href='DeleteOrder?order_id=<?= $order->getOrderID() ?>'>Delete</a>
        </div>
      </div>
    </div>
  </div>
  <?php }?>
  </div>
