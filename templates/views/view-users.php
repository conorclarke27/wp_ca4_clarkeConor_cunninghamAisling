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
                <div class="col-md-9">
                    <div class="panel panel-info">
                        <div class="panel-heading">Users</div>
                        <div class="panel-body">
                            <?php foreach ($locals['viewAllUsers'] as $user) { ?>
                                <div class ="col-md-3">
                                    <div class="panel panel-info">
                                        <div class="panel-heading"><?= $user->getUsername() ?></div>
                                        <div class="panel-body">
                                            <div class="panel-heading"><?= $user->getUserType() ?></div>
                                            <div class="panel-heading"><?= $user->getEmail() ?></div>
                                            <div class="panel-heading"><?= $user->getSupplier_Name() ?></div>
                                        </div>
                                        <button style="float:left;" class="btn btn-danger btn-xs">Edit User</button>
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
                <div class="col-md-1"></div>
            </div>
    </body>
</html>