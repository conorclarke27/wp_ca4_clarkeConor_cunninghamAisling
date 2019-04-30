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
    <h5 class="card-title">Create a coffee</div></h5>
    <p class="card-text">
    <form action='' method='post'>
        <div class="col-sm-10">
          <label for='coffee_name'>Coffee Name:</label>
          <input type='text' id='coffee_name' name='coffee_name' value='<?= $coffee_name['value']; ?>' class="form-control">
        </div>
        <div class="col-sm-10">
          <label for='supplier_name'>Supplier Name</label>
          <input type='text' id='supplier_name' name='supplier_name' value='<?= $supplier_name['value']; ?>'' class="form-control">
        </div>
        <div class="col-sm-5">
          <label for='price'>Price</label>
          <input type='text' id='price' name='price' value='<?= $price['value']; ?>' class="form-control">
        </div>
        <div class="col-sm-5">
          <label for='quantity'>Quantity</label>
          <input type='text' id='quantity' name='quantity' value='<?= $quantity['value']; ?>' class="form-control">
        </div>
        <p><br/></p>
        <div class="row">
          <div class="col-sm-11">
            <input style="float:right;" type='submit' value='Add Coffee' class="btn btn-success btn-lg">
          </div>
        </div>
    </form>
    </p>
  </div>
</div>
</div>
                       
</body>
</html>
