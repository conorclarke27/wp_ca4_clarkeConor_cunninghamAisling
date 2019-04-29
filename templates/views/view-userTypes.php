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
    <?php foreach ($locals['viewAllUserTypes'] as $userType) { ?>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">User Type: <?= $userType->getTypeName() ?></h5>
        <p class="card-text">Type ID: <?=  $userType->getTypeId() ?> </p>
        </div>
        <div class="card-footer">
        <a class='btn btn-success btn-xs' href="edit-userTypes?type_id=<?= $userType->getTypeId() ?>"> Edit</a>
        <a  class="btn btn-danger btn-xs" href="DeleteUserType?type_id=<?= $userType->getTypeId() ?>">Delete</a>
        
      </div>
    </div>
  </div>
  <?php }?>
  </div>

    </body>
</html>