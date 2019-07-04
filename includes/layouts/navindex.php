<nav class="bg-light noPrint navbar navbar-expand-md navbar-dark  bg-dark" style="margin-bottom: 0px">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="nav navbar-nav navbar-right">

            <li><a href="<?php echo BASE_URL . 'index.php' ?>">Home</a></li>
            <?php if (isset($_SESSION['user'])): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['user']['username'] ?> <span class="caret"></span></a>

                    <?php if (isAdmin($_SESSION['user']['id'])): ?>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo BASE_URL . 'admin/profile.php' ?>">Profile</a></li>
                            <li><a href="<?php echo BASE_URL . 'admin/dashboard.php' ?>">Dashboard</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo BASE_URL . 'logout.php' ?>" style="color: red;">Logout</a></li>
                        </ul>
                    <?php else: ?>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo BASE_URL . 'logout.php' ?>" style="color: red;">Logout</a></li>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php else: ?>
            <li><a href="<?php echo BASE_URL . 'signup.php' ?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="<?php echo BASE_URL . 'login.php' ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

<?php endif; ?>
            <li><a href="<?php echo BASE_URL . 'Map.php' ?>">Mapping</a>
            </li>
        </ul>
    </div>
</nav>

