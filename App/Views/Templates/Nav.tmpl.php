<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">
        <a class="navbar-brand" href="<?= URL_ROOT ?>"><?= SITE_NAME ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL_ROOT ?>"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL_ROOT . 'explore' ?>"><i class="fas fa-map-signs"></i> Explore</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL_ROOT . 'about' ?>"><i class="fas fa-info"></i> About</a>
                </li>

                <?php if (!Core\Util\Session::isLoggedIn()) : ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL_ROOT . 'login' ?>"><i class="fas fa-sign-in-alt"></i> Login</a>
                    </li>

                <?php else : ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                            <?= !empty(Core\Util\Session::getValue('username')) ? Core\Util\Session::getValue('username') : 'My Account'; ?>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= URL_ROOT . 'management' ?>"><i class="fas fa-th"></i> Management</a>
                            <a class="dropdown-item" href="<?= URL_ROOT . 'upload' ?>"><i class="fas fa-upload"></i> Upload</a>
                            <a class="dropdown-item" href="<?= URL_ROOT . 'settings' ?>"><i class="fab fa-whmcs"></i> Settings</a>
                            <div class="dropdown-divider"></div>
                            <form method="post" action="<?= URL_ROOT; ?>logout" autocomplete="off">
                                <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Log out</button>
                            </form>
                        </div>
                    </li>

                <?php endif ?>

            </ul>
        </div>
    </div>
</nav>
