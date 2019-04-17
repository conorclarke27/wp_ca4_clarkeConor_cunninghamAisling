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