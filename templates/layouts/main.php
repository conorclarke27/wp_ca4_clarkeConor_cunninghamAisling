<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title><?= $locals['pageTitle'] ?? 'Coffee Cart' ?></title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <script src='assets/scripts/signupForm.js'></script>
        <script src='assets/scripts/shoppingCart.js'></script>
        <script src='assets/scripts/confirm.js'></script>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="">Coffee Cart</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= SITE_BASE_DIR ?>/"><span class="fas fa-home"></span> Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= SITE_BASE_DIR ?>/view-coffees"><span class = "fas fa-mug-hot"></span> Products</a>
                    </li>
                    <?php if ($_SESSION['Admin'] === TRUE) { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= SITE_BASE_DIR ?>/admin-menu"><span class = "fas fa-user-cog"></span> Admin Menu</a>
                    </li>
                    <?php }?>
                    <?php if ($_SESSION['LOGGED_IN'] === TRUE) { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= SITE_BASE_DIR ?>/view-orders"><span class = "fas fa-user-cog"></span> Orders</a>
                    </li>
                    <?php }?>
                    <?php if (!($_SESSION['LOGGED_IN'] === TRUE)) { ?>
                     <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle"  id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-users"></span> Users</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown07">
                            <a class="dropdown-item" href='<?= SITE_BASE_DIR ?>/add-user'>Sign Up</a>
                            <a class="dropdown-item" href='<?= SITE_BASE_DIR ?>/user-login' >Log In</a>
                            <a class="dropdown-item" href='<?= SITE_BASE_DIR ?>/admin-login' >Admin</a>
                        </div>
                    </li>
                    <?php }?>

                </ul>
                <form class="form-inline my-2 my-md-0">
                    <?php if ($_SESSION['LOGGED_IN'] === TRUE || $_SESSION['Admin'] === TRUE ) { ?>
                    <a class="nav-link"style="color:white;"><span class="far fa-user"></span> Hi,<?=$_SESSION['Name'];?></a>
                    <a class="nav-link"style="color:white;" href="<?= SITE_BASE_DIR ?>/logout"><span class="fas fa-sign-out-alt"></span> Logout</a>
                    <a class="nav-link disabled" href=''><span class="fas fa-shopping-cart"></span> Cart <span class="badge badge-secondary">0</a>

                    <?php } ?>

                </form>
            </div>
        </div>
    </nav>

</head>
<body>


    <div class='container'>
        <?= \Rapid\Renderer::VIEW_PLACEHOLDER ?>
    </div>

</body>

<footer class="footer mt-auto py-5 ">
    <div class="container ">
        <span class="text-muted">Coffee Cart &copy 2019</span>
    </div>
</footer>

</html>
