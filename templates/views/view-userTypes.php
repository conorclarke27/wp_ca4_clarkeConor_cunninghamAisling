    <h2>User Types</h2>
    <div class="row" style="margin-top: 20px;">
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
