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

            $date = new DateTime($coffee['dateOfRelease']);
            ?>
            <tr>
                <td><?= $coffee['coffee_ID'] ?></td>
                <td><?= $coffee['coffee_name'] ?></td>
                <td><?= $coffee['supplier_name'] ?></td>
                <td><?= $coffee['price'] ?></td>
                <td><?= $coffee['quantity'] ?></td>

                <td>
                    <a class='btn' href='deletecoffee?coffeeID=<?= $coffee['coffeeID'] ?>'> Delete coffee </a> 
                </td>
                <td>
                    <a class='btn' href='editcoffee?coffeeID=<?= $coffee['coffeeID'] ?>'> Edit coffee </a> 
                </td>

            </tr>
        </ul>

    <?php }
    ?>

</table>