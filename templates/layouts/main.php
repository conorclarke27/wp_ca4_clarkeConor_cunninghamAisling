<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title><?= $locals['pageTitle'] ?? 'Default Title' ?></title>

        <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        </head>
    <body>


<div class ="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">Coffee Cart</a>
                </div>
                <ul class ="nav navbar-nav">
                    <li> <a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                    <li> <a href="#"><span class="glyphicon glyphicon-modal-window"></span>Products</a></li>
                    <li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search"></li>
                    <li style="top:10px;left:20px;"><input type="submit" class="btn btn-primary" id="search_btn"></li>
                </ul>
                <ul class ="nav navbar-nav navbar-right">
                    <li> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
                        <div class="dropdown-menu" style="width:400px;">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-2">Product ID</div>
                                        <div class="col-md-2">Product Name</div>
                                        <div class="col-md-2">Product Image</div>
                                        <div class="col-md-2">Product Price €</div>
                                        <div class="col-md-2">Quantity</div>
                                        <div class="col-md-2">Total Price €</div>
                                    </div>
                                </div>
                                <div class="panel-body"></div>
                                <div class="footer"></div>
                            </div>
                        </div>

                    </li>
                    <li> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Sign In</a>
                        <ul class="dropdown-menu">
                            <div style="width:300px;height:auto;">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Log in</div>
                                    <div class="panel-heading">
                                        <label for="email">Email</label>
                                        <input type="email" class ="form-control" id="email" />
                                        <label for="pass">Password</label>
                                        <input type="password" class ="form-control" id="password" />
                                        <p><br/></p>
                                        <a href="#" style="color:white; list-style:none;">Forgotten Password</a>
                                        <input type="submit" class="btn btn-success" style="float:right;" id="login" value="Login">
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </li>
                    <li> <a href="#"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
                </ul>
            </div>
        </div>

        
        <div class='container'>
            <?= \Rapid\Renderer::VIEW_PLACEHOLDER ?>

    </body>
</div>
<div>
    <footer>
        <p class="copyright">
            &copy; Coffee Cart  <?php echo date("Y"); ?>
        </p>
    </footer>
</div>


</html>