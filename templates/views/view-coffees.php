<h2></h2>
<? require('./models/ShoppingCart.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>

    <div class="row">
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
        <a style="float:right;" class="btn btn-success btn-xs" href='edit-coffees?coffee_id=<?= $coffee->getCoffeeId() ?>'> Edit </a>
        <a style="float:left;" class='btn btn-danger btn-xs' href='DeleteCoffee?coffee_id=<?= $coffee->getCoffeeId() ?>'> Delete</a>
        </div>
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
</body>
</html>

<script>
    $(document).ready(function () {
        $('.add_to_cart').click(function ()
        {
            var product_id = $(this).data("productid");
            var product_name = $(this).data("productname");
            var supplier_name = $(this).data("suppliername");
            var product_price = $(this).data("price");
            var quantity = $('#' + product_id).val();



            if (quantity != '' && quantity > 0)
            {
                //alert(quantity + "," + product_id + "," + product_name);
                $.ajax({
                    url: "<?= SITE_BASE_DIR ?>/Models/ShoppingCart/add",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        product_name: product_name,
                        product_price: product_price,
                        quantiy: quantity},
                    success: function (data)
                    {
                        alert("Product added to cart");
                        $('#cart_details').html(data);
                        $('#' + product_id).val('');

                    }
                });

            } else
            {
                alert("Please eneter quantity");

            }

        })

    });

</script>


