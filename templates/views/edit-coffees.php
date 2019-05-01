<br>
<br>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<?php $coffee = $locals['coffee']; ?>
<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-9">
<div class="card text-white bg-info mb-3">
  <div class="card-body">
    <h5 class="card-title">Edit Coffee</div></h5>
    <p class="card-text">
    <form action='' method='post'>
        <div class="col-sm-10">
            <label for='coffee_name'>Coffee Name:</label>
            <input type='text'id='coffee_name' name='coffee_name' value='<?= $coffee->getCoffeeName(); ?>' class="form-control">
        </div>
        <div class="col-sm-10">
            <label for='supplier_name'>Supplier Name</label>
            <input type='text' id='supplier_name' name='supplier_name' value='<?= $coffee->getSupplierName(); ?>' class="form-control">
        </div>
        <div class="col-sm-5">
            <label for='price'>Price</label>
            <input type='text' id='price' name='price' value='<?= $coffee->getPrice(); ?>' class="form-control">
        </div>
        <div class="col-sm-5">
            <label for='quantity'>Quantity</label>
            <input type='text' id='quantity' name='quantity' value='<?= $coffee->getQuantity(); ?>'class="form-control">
        </div>
        <p><br/></p>
        <div class="row">
            <div class="col-sm-11">
                <input style="float:right;" type='submit' value='Edit' class="btn btn-success btn-lg">
            </div>
        </div>
    </form>
    </p>
    </div>
</div>
</div>
<div class="col-md-1"></div>

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
