<?php include('config.php'); ?>
<?php include(INCLUDE_PATH . '/logic/userSignup.php'); ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>JaBak WebMapping v-0.0</title>
        <link rel="icon" href="assets/images/JaBak.ico"/>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://openlayers.org/en/v3.20.1/css/ol.css" type="text/css">
        <meta charset="utf-8">
        <title>JaBak WebMapping v-0.0</title>
        <link rel="icon" href="assets/images/JaBak.ico"/>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <!-- Custome styles -->
        <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
        <script src="https://openlayers.org/en/v3.20.1/build/ol.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.js"></script>
        <script src="assets/js/Olscript.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.4.3/proj4.js"></script>
        <link rel="stylesheet" href="Switcher/src/ol-layerswitcher.css" />
        <link rel="stylesheet" href="Switcher/examples/layerswitcher.css" />
        <script src="https://epsg.io/3857.js"></script>
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="Switcher/dist/ol-layerswitcher.js"></script>
        <script src="Switcher/examples/layerswitcher.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>



        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    </head>
<body>
<?php include(INCLUDE_PATH . "/layouts/navindex.php") ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <form class=" form-group" action="login.php" method="post">
                    <h2 class="text-center">Login</h2>
                    <hr>
                    <!-- display form error messages  -->
                    <?php include(INCLUDE_PATH . "/layouts/messages.php") ?>
                    <div class="form-group <?php echo isset($errors['username']) ? 'has-error' : '' ?>">
                        <label class="control-label">Username or Email</label>
                        <input type="text" name="username" id="password" value="<?php echo $username; ?>" class="form-control">
                        <?php if (isset($errors['username'])): ?>
                            <span class="help-block"><?php echo $errors['username'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group <?php echo isset($errors['password']) ? 'has-error' : '' ?>">
                        <label class="control-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        <?php if (isset($errors['password'])): ?>
                            <span class="help-block"><?php echo $errors['password'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login_btn" class="btn btn-success">Login</button>
                    </div>
                    <p>Don't have an account? <a href="signup.php">Sign up</a></p>
                </form>
            </div>
        </div>
    </div>
<?php include(INCLUDE_PATH . "/layouts/footer.php") ?>