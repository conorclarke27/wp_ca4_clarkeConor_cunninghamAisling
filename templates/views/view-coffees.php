<? require('./models/ShoppingCart.php');?>

<div class="row" style="margin-top: 20px;">
    <?php foreach ($locals['viewAllCoffees'] as $coffee) {
        ?>
        <div class="col-sm-3" id='shopping_cart'>
            <div class="card">
                <div class="card-body">
                <form id='shopping_cart' action='' method='post'>
                    <h5 class="card-title" id='coffeename'><span class="fas fa-coffee"></span> <?= $coffee->getCoffeeName() ?></h5>
                    <p class="card-text"> <img src="./assets/images/coffee.png" class="img responsive img-thumbnail"  alt="Coffee"></p>
                    <p></p>
                        <?php if ($_SESSION["LOGGED_IN"]) { ?>
                          <div class="card-footer" style="height:150px;">
                            <h5 id='price'>€<?= $coffee->getPrice() ?></h5>
                            <input style="height:30px; width:50px; float:right;" type='text' name='quantity' class="form-control quantity" id="quantity">
                            <a style="float:left;" class="btn btn-danger btn-xs add_to_cart" type='submit' id="submit" name="add_to_cart">Add To Cart</a>
                        <?php } else { ?>
                          <div class="card-footer" style="height:100px;">
                            <h5>€<?= $coffee->getPrice() ?></h5>
                            <h5>You must log in or sign up to purchase</h5>
                        <?php } ?>
                        <br> <br>

                        <?php if ($locals["admin"]) { ?>
                            <a style="float:right;" class="btn btn-success btn-xs" href='edit-coffees?coffee_id=<?= $coffee->getCoffeeId() ?>'> Edit </a>
                            <a style="float:left;" class='btn btn-danger btn-xs' href='DeleteCoffee?coffee_id=<?= $coffee->getCoffeeId() ?>'> Delete</a>
                        <?php } ?></div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="col-md-3">
        <?php if ($_SESSION["LOGGED_IN"]) { ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cart</h5>
                    <div id="cart_details">
                        <p class="card-text">
                        <h3 align="center"> Cart is Empty</h3></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>