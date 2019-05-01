<?php $order = $locals['order']; ?>
<?php $coffees = $locals['viewAllCoffees']?>
<h2></h2>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
   
<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-9">
<div class="card text-white bg-info mb-3">
  <div class="card-body">
    <h5 class="card-title">Edit an order</div></h5>
    <p class="card-text">
    <form action='' method='post'>
        <div class="col-sm-8">
            <label for='user_id'>User ID:</label>
            <input type='text' id='user_id' name='user_id' readonly="readonly" value='<?= $order->getUserID() ?>'class="form-control">
        </div>
        <div  class="col-sm-8">
            <label for="coffee_id">Coffee Name:</label>
            <select name="coffee_id" id="coffee_id" class="form-control">
                <option value="" disabled selected>Select...</option>
                <?php foreach($coffees as $coffee) {?>                                                                                                           
                    <option value="<?= $coffee->getCoffeeId()?>"><?= $coffee->getCoffeeName()?> </option>
                <?php } ?>
            </select>
        </div>
        <p><br/></p>
        <div class="row">
        <div class="col-sm-11">
            <input style="float:right;" type='submit' value='Edit Order' class="btn btn-success btn-lg">
        </div>
        </div>
    </form>
   </p>
  </div>
</div>
</div>

<div class="alert alert-warning alert-dismissible" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <?php foreach($locals['form_error_messages'] as $errors) { ?>
    <p><?= $errors ?></p>
  <?php } ?>
</div>

</body>
    
</html>
