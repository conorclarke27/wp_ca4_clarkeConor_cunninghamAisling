<? require('./models/ShoppingCart.php');?>
    
    <div class="row" style="margin-top: 20px;">
    <?php foreach ($locals['viewAllCoffees'] as $coffee) {
                                ?>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?= $coffee->getCoffeeName() ?></h5>
        <p class="card-text"> <img src="./assets/images/coffee.png" class="img responsive img-thumbnail"  alt="Coffee"></p>
        <div class="card-footer" style="height:150px;">
        <h5><?= $coffee->getPrice() ?></h5>
        <input style="height:30px; width:50px; float:right;" type='text' name='quantity' class="form-control quantity" id="<?= $coffee->getCoffeeId() ?>">
        <a style="float:left;" class="btn btn-danger btn-xs add_to_cart" id="add_to_cart" name="add_to_cart" 
        data-productid="<?= $coffee->getCoffeeId() ?>" 
        data-productname="<?= $coffee->getCoffeeName() ?>" 
        data-suppliername="<?= $coffee->getSupplierName() ?>"
        data-price="<?= $coffee->getPrice() ?>">Add To Cart</a>
        <br> <br>

        <?php if($locals["admin"]){?>
        <a style="float:right;" class="btn btn-success btn-xs" href='edit-coffees?coffee_id=<?= $coffee->getCoffeeId() ?>'> Edit </a>
        <a style="float:left;" class='btn btn-danger btn-xs' href='DeleteCoffee?coffee_id=<?= $coffee->getCoffeeId() ?>'> Delete</a>
        <?php }?></div>
      </div>
    </div>
  </div>
  <?php }?>
  <div class="col-md-3">
    <div class="card">
    <div class="card-body">
    <h5 class="card-title">Cart</h5>
       <div id="cart_details">
       <p class="card-text">
                            <h3 align="center"> Cart is Empty</h3></p>
                            </div>
                            </div>
                            </div>



                </div>
</div>