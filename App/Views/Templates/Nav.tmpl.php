<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">
        <a class="navbar-brand" href="

        <?= URL_ROOT ?>"><?= SITE_NAME ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL_ROOT ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL_ROOT . 'about' ?>">About</a>
                </li>

                <?php
                if (!isset($_SESSION['isLoggedIn'])) : ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL_ROOT . 'login' ?>">Login</a>
                    </li>

                <?php
                else : ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            My Account
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= URL_ROOT . 'management' ?>">Management</a>
                            <a class="dropdown-item" href="<?= URL_ROOT . 'settings' ?>">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= URL_ROOT . 'logout' ?>">Log out</a>
                        </div>
                    </li>

                <?php
                endif ?>

            </ul>
        </div>
    </div>
</nav>
