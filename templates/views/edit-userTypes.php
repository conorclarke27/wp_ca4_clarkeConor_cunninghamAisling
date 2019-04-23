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

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="panel panel-success">
                        <div class="panel-heading">User Types</div>
                        <div class="panel-body">
                           <form action='' method='post'>
                            <div class="col-md-10">
                                <label for='type_id'>User Type ID:</label>
                                <input type='text' id='type_id' name='type_id' readonly="readonly" value='<?= $type->getTypeId(); ?>' class="form-control">
                            </div>
                            <div class="col-md-10">
                                <label for='typename'>Type Name:</label>
                                <input type='text' id='typename' name='typename' value='<?= $type->getTypeName(); ?>' class="form-control">
                            </div>
                            <p><br/></p>
                            <div class="row">
                            <div class="col-md-12">
                                <input style="float:right;" type='submit' value='Edit' class="btn btn-success btn-lg">
                            </div>
                            </div>
                        </form>
                        </div>

                    </div>



                </div>


                <div class="col-md-1"></div>

            </div>
        </div>
    </body>
</html>
