<?php

require APP_ROOT . '/Views/Layouts/head.php';
require APP_ROOT . '/Views/Layouts/nav.php';
//require APP_ROOT . '/Views/Layouts/footer.php';

?>

<div class="container">
    <div class="row">
        <div class="col-3"></div>

        <!-- Login Form-->
        <div class="col-6 login-form">
        <form method="post" action="<?= URL_ROOT; ?>login" autocomplete="off">

            <!-- Username -->
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="input-username" value="<?= $data['username']; ?>"
                class="form-control <?= (!empty($errors['usernameError'])) ? 'is-invalid' : ''; ?>" 
                placeholder="Username" aria-describedby="help-username">
                <small id="help-username" class="text-muted"></small>
                <small id="error-username" class="text-danger"><?php if (!empty($errors['usernameError'])) { echo $errors['usernameError']; } ?></small>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="input-password" value="<?= $data['password']; ?>"
                class="form-control <?= (!empty($errors['passwordError'])) ? 'is-invalid' : ''; ?>" 
                placeholder="Password" aria-describedby="help-password">
                <small id="help-password" class="text-muted"></small>
                <small id="error-username" class="text-danger"><?php if (!empty($errors['passwordError'])) { echo $errors['passwordError']; } ?></small>
            </div>

            <!-- Remember Me -->
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="remember-me">
                <label class="form-check-label" for="remember-me">Remember me</label>
            </div>

            <!-- Login Button -->
            <button type="submit" class="btn btn-dark btn-block" value="Login">LOGIN</button>

            <div class="form-group login-redirect">
                <small class="">Don't have an account? <a href="<?= URL_ROOT . 'register' ?>">Register here</a>.</small>
            </div>
        </form>
        </div>

        <div class="col-3"></div>
    </div>
</div>