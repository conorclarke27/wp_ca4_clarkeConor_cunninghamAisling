<h2>View Coffees</h2>

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
                <div class="col-md-9">
                    <div class="panel panel-info">
                        <div class="panel-heading">Products</div>
                        <div class="panel-body">
                        <?php
                                foreach ($locals['viewAllCoffees'] as $coffee)  {
                                    ?>
                            <div class ="col-md-3">

                                

                                    <div class="panel panel-info">
                                        <div class="panel-heading"><?= $coffee->getCoffeeName() ?></div>
                                        <div class="panel-body">
                                            <img src="./assets/images/kenco-smooth.jpg" class="img-thumbnail"  alt="Responsive image">
                                        </div>
                                        <div class="panel-heading" style="height:80px;">
                                        <?= $coffee->getPrice() ?>
                                        <input style="height:30px; width:50px; float:right;" type='text' name='quantity' class="form-control quantity" id='qty'>
                                        <a style="float:left;" class="btn btn-danger btn-xs add_to_cart" id="add_to_cart" name="add_to_cart" 
                                        data-productid="<?= $coffee->getCoffeeId() ?>" 
                                        data-productname="<?= $coffee->getCoffeeName() ?>" 
                                        data-suppliername="<?= $coffee->getSupplierName() ?>"
                                        data-price="<?= $coffee->getPrice() ?>">Add To Cart</a>
                                            <br><br>
                                            <a style="float:right;" class="btn btn-success btn-xs" href='edit-coffees?coffee_id=<?= $coffee->getCoffeeId() ?>'> Edit </a>
                                            <a style="float:left;" class='btn btn-danger btn-xs' href='DeleteCoffee?coffee_id=<?= $coffee->getCoffeeId() ?>'> Delete</a>
                                            
                                            </div>
                                            </div>
                                </div>
                            <?php }
                            ?>

                        </div>

                    </div>



                </div>


                <div class="col-md-3">
                <div class="panel panel-info">
                <div class="panel-heading">Cart</div>
                <div id="cart_details">
                <h3 align="center"> Cart is Empty</h3></div></div>


                
            </div>
        </div>
    </body>
</html>

<script>
$(document).ready(function(){
    $('.add_to_cart').click(function()
    {
        var product_id = $(this).data("productid");
        var product_name = $(this).data("productname");
        var supplier_name = $(this).data("suppliername");
        var product_price = $(this).data("price");
        var quantity = $('#qty').val();

        

        if(quantity != '' && quantity >0)
        { 
            //alert(quantity + "," + product_id + "," + product_name);
            $.ajax({
                url:"./controllers/ShoppingCart.php/add",
                method:"POST",
                data:{
                product_id:product_id, 
                product_name:product_name,
                product_price:product_price,
                quantiy:quantity},
                success:function(data)
                {
                    alert("Product added to cart");
                    $('#cart_details').html(data)

                }
            });

        }
        else
        {
            alert("Please eneter quantity");
            
        }

    })

});
    
</script>
