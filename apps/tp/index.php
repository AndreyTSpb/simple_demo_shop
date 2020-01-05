<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 02/01/2020
 * Time: 19:41
 */
?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title><?=$title?></title>

        <!-- Bootstrap core CSS and Custom styles for this template -->
        <?=$css;?>

    </head>
    <body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">Carousel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <?php if(empty($_COOKIE['hash_key'])):?>
                    <a class="btn btn-primary" href="<?=DOCUMENT_ROOT.DS?>signin">Sign in</a>
                    <a class="btn btn-outline-primary" href="<?=DOCUMENT_ROOT.DS?>signup">Sign up</a>
                <?php else:?>
                    <a class="btn btn-primary" href="<?=DOCUMENT_ROOT.DS?>signout">Sign out</a>
                <?php endif;?>
                <!-- BUTTON SHOP-CART -->
                <a class="btn btn-circle" href="#" id="shopping-cart"><i class="fa fa-shopping-basket"></i> </a>
                <!-- /END BUTTON SHOP-CART -->
            </div>
        </nav>
    </header>

    <main role="main">
        <!-- INSERT CONTENT -->
        <?php include 'apps/views/'.$content_view; ?>
        <!-- /END INSERT CONTENT -->
        <!-- FOOTER -->
        <footer class=" container pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <small class="d-block mb-3 text-muted">&copy; 2017-<?=date("Y",time())?></small>
                </div>
                <div class="col-6 col-md">
                    <h5>Features</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Cool stuff</a></li>
                        <li><a class="text-muted" href="#">Random feature</a></li>
                        <li><a class="text-muted" href="#">Team feature</a></li>
                        <li><a class="text-muted" href="#">Stuff for developers</a></li>
                        <li><a class="text-muted" href="#">Another one</a></li>
                        <li><a class="text-muted" href="#">Last time</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Resources</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Resource</a></li>
                        <li><a class="text-muted" href="#">Resource name</a></li>
                        <li><a class="text-muted" href="#">Another resource</a></li>
                        <li><a class="text-muted" href="#">Final resource</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>About</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Team</a></li>
                        <li><a class="text-muted" href="#">Locations</a></li>
                        <li><a class="text-muted" href="#">Privacy</a></li>
                        <li><a class="text-muted" href="#">Terms</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </main>

    <!--SHOP-CART -->
    <?php include 'apps/views/cart.php';?>
    <!-- /END SHOP-CART -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?=$js?>
    </body>
</html>

