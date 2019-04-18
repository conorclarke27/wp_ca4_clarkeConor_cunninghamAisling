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
            <a class='btn' href='deletecoffee?coffeeID=<?= $order->getCoffeeID() ?>'> Delete coffee </a> 
        </td>
        <td>
            <a class='btn' href='editcoffee?coffeeID=<?= $order->getCoffeeID() ?>'> Edit coffee </a> 
        </td>
      </tr>
    <?php } ?>
  </ul>

    

</table>








