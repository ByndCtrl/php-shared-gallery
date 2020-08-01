<?php require_once APP_ROOT . 'Views/Templates/Head.tmpl.php'; ?>
<?php require_once APP_ROOT . 'Views/Templates/Nav.tmpl.php'; ?>

<div class="container">

    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center p-4 mb-3 border-bottom">
        <h1>Register</h1>
    </div>

        <!-- Register Form -->
        <div class="col-sm-12 col-lg-6 mr-auto ml-auto border p-4 bg-light text-dark">
            <form method="post" action="<?= URL_ROOT; ?>register" autocomplete="off">

                <!-- Username -->
                <div class="mb-3">
                    <i class="fas fa-user"></i>
                    <label for="input-username" class="form-label font-weight-bold">Username</label>
                    <input type="text" name="username" id="input-username"
                           value="<?= !empty($data['username']) ? $data['username'] : ''; ?>"
                           class="form-control <?= !empty($errors['username']) ? 'is-invalid' : ''; ?>"
                           autofocus>
                    <small id="error-username" class="text-danger"><?= !empty($errors['username']) ? $errors['username'] : ''; ?></small>
                </div>

                <!-- E-mail -->
                <div class="mb-3">
                    <i class="fas fa-envelope"></i>
                    <label for="input-email" class="form-label font-weight-bold">E-mail</label>
                    <input type="email" name="email" id="input-email"
                           value="<?= !empty($data['email']) ? $data['email'] : ''; ?>"
                           class="form-control <?= !empty($errors['email']) ? 'is-invalid' : ''; ?>"
                           placeholder="E-mail"
                           aria-describedby="help-email">
                    <small id="help-email" class="text-muted">You can enter a fake email address.</small>
                    <small id="error-username" class="text-danger"><?= !empty($errors['email']) ? $errors['email'] : ''; ?></small>
                </div>

                <div class="mb-3 row">

                    <!-- Password -->
                    <div class="col-xl-6">
                        <i class="fas fa-unlock-alt"></i>
                        <label for="input-password" class="form-label font-weight-bold">Password</label>
                        <input type="password" name="password" id="input-password"
                               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                               value="<?= !empty($data['password']) ? $data['password'] : ''; ?>"
                               class="form-control <?= !empty($errors['password']) ? 'is-invalid' : ''; ?>"
                               placeholder="Password"
                               aria-describedby="help-password">

                        <!-- "&#13;" is new line in Firefox. -->
                        <small id="help-password" class="text-muted"  data-toggle="tooltip"
                               title="At least 1 Upper-Case Letter.&#13;At least 1 Lower-Case Letter.&#13;At least 1 Number.&#13;At least 8 Characters.&#13;">
                                Password requirements. (hover)
                        </small>

                        <small id="error-username" class="text-danger"><?= !empty($errors['password']) ? $errors['password'] : ''; ?></small>
                    </div>

                    <!-- Confirm Password-->
                    <div class="col-xl-6">
                        <i class="fas fa-unlock-alt"></i>
                        <label for="input-confirm-password" class="form-label font-weight-bold">Confirm password</label>
                        <input type="password" name="confirmPassword" id="input-confirm-password"
                               value="<?= !empty($data['confirmPassword']) ? $data['confirmPassword'] : ''; ?>"
                               class="form-control <?= !empty($errors['confirmPassword']) ? 'is-invalid' : ''; ?>"
                               placeholder="Password"
                               autocomplete="off"
                               aria-describedby="help-confirm-password">
                        <small id="help-confirm-password" class="text-muted">Re-enter your password.</small>
                        <small id="error-confirm-password" class="text-danger"><?= !empty($errors['confirmPassword']) ? $errors['confirmPassword'] : ''; ?></small>
                    </div>

                </div>

                <!-- Show Password -->
                <div class="form-check" id="show-password-container">
                    <input class="form-check-input" type="checkbox" id="show-password"
                           onclick="showPassword()"
                           aria-label="Show password as plain text. Warning: this will display your password on the screen.">
                    <label class="form-check-label" for="show-password">
                        <small class="no-select"><i class="fas fa-low-vision fa-lg"></i> Show password</small>
                    </label>
                </div>

                <!-- Street Address -->
                <div class="mb-3">
                    <i class="fas fa-map-marked-alt"></i>
                    <label for="input-street-address" class="form-label font-weight-bold">Street Address</label>
                    <input type="text" name="streetAddress" id="input-street-address"
                           value="<?= !empty($data['streetAddress']) ? $data['streetAddress'] : ''; ?>"
                           class="form-control <?= !empty($errors['streetAddress']) ? 'is-invalid' : ''; ?>"
                           placeholder="1234 Main St">
                    <small id="error-street-address" class="text-danger"><?= !empty($errors['streetAddress']) ? $errors['streetAddress'] : ''; ?></small>
                </div>

                <div class="mb-3 row">

                    <!-- City -->
                    <div class="col-xl-6">
                        <i class="fas fa-city"></i>
                        <label for="input-city" class="form-label font-weight-bold">City</label>
                        <input type="text" name="city" id="input-city"
                               value="<?= !empty($data['city']) ? $data['city'] : ''; ?>"
                               class="form-control <?= !empty($errors['city']) ? 'is-invalid' : ''; ?>"
                               placeholder="New York">
                        <small id="error-city" class="text-danger"><?= !empty($errors['city']) ? $errors['city'] : ''; ?></small>
                    </div>

                    <!-- Postcode -->
                    <div class="col-xl-6">
                        <i class="fas fa-map-marker-alt"></i>
                        <label for="input-postcode" class="form-label font-weight-bold">Postcode</label>
                        <input type="text" name="postcode" id="input-postcode"
                               value="<?= !empty($data['postcode']) ? $data['postcode'] : ''; ?>"
                               class="form-control <?= !empty($errors['postcode']) ? 'is-invalid' : ''; ?>"
                               placeholder="10001">
                        <small id="error-postcode" class="text-danger"><?= !empty($errors['postcode']) ? $errors['postcode'] : ''; ?></small>
                    </div>

                </div>

                <!-- Country -->
               <?php require_once APP_ROOT . 'Views/Templates/CountryInput.tmpl.php'; ?>

                <small id="error-register" class="text-danger"><?= !empty($errors['register']) ? $errors['register'] : ''; ?></small>

                <!-- Register Button -->
                <button type="submit" class="btn btn-dark btn-block font-weight-bold" value="Register">REGISTER</button>

                <div class="form-group login-redirect">
                    <small class="">Have an account? <a href="<?= URL_ROOT . 'login' ?>">Login here</a>.</small>
                </div>
            </form>

        </div>
</div>

<?php require_once APP_ROOT . 'Views/Templates/Footer.tmpl.php'; ?>
