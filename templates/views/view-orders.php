<h2>View Orders</h2>

<table>

  <tr>
    <th><strong>Order ID</strong></th>
    <th><strong>User ID</strong></th>
    <th><strong>Coffee ID</strong></th>
  </tr>

  <ul>
    <?php foreach ($locals['viewAllOrders'] as $order) { ?>
      <tr>
        <td><?= $order->getOrderID() ?></td>
        <td><?= $order->getUserID() ?></td>
        <td><?= $order->getCoffeeID() ?></td>

        <td>
            <a class='btn' href='DeleteOrder?order_id=<?= $order->getOrderID() ?>'> Delete Order </a> 
        </td>
        <td>
            <a class='btn' href='edit-orders?order_id=<?= $order->getOrderID() ?>'> Edit Order </a> 
        </td>
      </tr>
    <?php } ?>
  </ul>

    

</table>








