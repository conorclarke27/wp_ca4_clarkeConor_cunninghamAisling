<h2>View User Types</h2>
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
                        <div class="panel-heading">User Types</div>
                        <div class="panel-body">
                            <?php foreach ($locals['viewAllUserTypes'] as $userType) { ?>
                                <div class ="col-md-5">
                                    <div class="panel panel-info">
                                        <div class="panel-body">
                                            <div class="panel-heading">Type ID: <?=  $userType->getTypeId() ?></div>
                                            <div class="panel-heading">Type Name: <?= $userType->getTypeName() ?></div>
                                        </div>
                                        <div class="panel-heading" style="height:40px;">
                                            <a style="float:left;" class='btn btn-success btn-xs' href="edit-userTypes?type_id=<?= $userType->getTypeId() ?>"> Edit User </a>
                                            <a style="float:right;" class="btn btn-danger btn-xs" href="DeleteUserType?type_id=<?= $userType->getTypeId() ?>">Delete User Type</a>
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