<?php $type = $locals['type']; ?>
<h2>Edit Users</h2>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>

<body>

<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-9">
<div class="card text-white bg-info mb-3">
  <div class="card-body">
    <h5 class="card-title">Edit User Types here:</div></h5>
    <p class="card-text">
    <form action='' method='post'>
        <div class="col-sm-10">
            <label for='type_id'>User Type ID:</label>
            <input type='text' id='type_id' name='type_id' readonly="readonly" value='<?= $type->getTypeId(); ?>' class="form-control">
        </div>
        <div class="col-sm-10">
            <label for='typename'>Type Name:</label>
            <input type='text' id='typename' name='typename' value='<?= $type->getTypeName(); ?>' class="form-control">
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
</body>
</html>
