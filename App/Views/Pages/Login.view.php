<?php require APP_ROOT . 'Views/Templates/Head.tmpl.php'; ?>
<?php require APP_ROOT . 'Views/Templates/Nav.tmpl.php'; ?>

<div class="container">

    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center p-4 mb-3 border-bottom">
        <h2 class="font-weight-bold">Login</h2>
    </div>

        <!-- Login Form-->
        <div class="col-sm-12 col-lg-6 mr-auto ml-auto border p-4 bg-light text-dark">
            <form method="post" action="<?= URL_ROOT; ?>login" autocomplete="off">

                <!-- Username -->
                <div class="mb-3">
                    <i class="fas fa-user"></i>
                    <label for="input-username" class="form-label font-weight-bold">Username</label>
                    <input type="text" name="username" id="input-username"
                           value="<?= !empty($data['username']) ? $data['username'] : '' ?>"
                           class="form-control <?= !empty($errors['username']) ? 'is-invalid' : ''; ?>"
                           autofocus>
                    <small id="error-username" class="text-danger"><?= !empty($errors['username']) ? $errors['username'] : ''; ?></small>
                </div>

                <!-- Password -->
                <div class="mb-3"">
                    <i class="fas fa-lock"></i>
                    <label for="input-password" class="form-label font-weight-bold">Password</label>
                    <input type="password" name="password" id="input-password"
                           value="<?= !empty($data['password']) ? $data['password'] : '' ?>"
                           class="form-control <?= !empty($errors['password']) ? 'is-invalid' : ''; ?>">
                    <small id="error-password" class="text-danger"><?= !empty($errors['password']) ? $errors['password'] : ''; ?></small>
                </div>

                <!-- Remember Me -->
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="rememberMe" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>

                <small id="error-register" class="text-danger"><?= !empty($errors['login']) ? $errors['login'] : ''; ?></small>

                <!-- Login Button -->
                <button type="submit" class="btn btn-dark btn-block font-weight-bold w-50 justify-content-center m-auto" value="login" name="login">LOGIN</button>

                <div class="form-group login-redirect">
                    <small class="">Don't have an account? <a href="<?= URL_ROOT . 'register' ?>">Register here</a>.</small>
                </div>

            </form>
        </div>

        <div class="col-3"></div>
    </div>
</div>

<?php require APP_ROOT . 'Views/Templates/Footer.tmpl.php'; ?>
