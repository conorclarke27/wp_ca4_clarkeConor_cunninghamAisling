
    <div class="row" style="margin-top: 20px;">
    <?php foreach ($locals['viewAllUsers'] as $user) {
                                ?>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><span class="far fa-user"></span>User: <?= $user->getUsername()?></h5>
        <p class="card-text">User Type: <?= $user->getUserType() ?> </p>
        <p class="card-text">Email: <?= $user->getEmail() ?> </p>
        <p class="card-text">Supplier:  <?=$user->getSupplier_Name() ?> </p>
        <div class="card-footer">
          <a  class='btn btn-success btn-xs' href="edit-users?user_id=<?= $user->getUserId() ?>"> Edit</a>
          <a  class="btn btn-danger btn-xs" href="DeleteUser?user_id=<?= $user->getUserId() ?>">Delete</a>
        </div>
      </div>
    </div>
  </div>
  <?php }?>
  </div>
    