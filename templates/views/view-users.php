<h2>View Users</h2>
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
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="panel panel-info">
                        <div class="panel-heading">Users</div>
                        <div class="panel-body">
                            <?php foreach ($locals['viewAllUsers'] as $user) { ?>
                                <div class ="col-md-5">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">User: <?= $user->getUsername()?></div>
                                        <div class="panel-body">
                                            <div class="panel-heading">User Type: <?=  $user->getUserType() ?></div>
                                            <div class="panel-heading">Email: <?= $user->getEmail() ?></div>
                                            <div class="panel-heading">Supplier:  <?=$user->getSupplier_Name() ?></div>
                                        </div>
                                        <div class="panel-heading" style="height:40px;">
                                            <a class='btn' href="edit-users?user_id=<?= $user->getUserId() ?>"> Edit User </a>
                                            <button style="float:right;" class="btn btn-danger btn-xs">Delete User</button>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                            ?>

                        </div>

                    </div>



                </div>


                <div class="col-md-1"></div>

            </div>
        </div>
    </body>
</html>