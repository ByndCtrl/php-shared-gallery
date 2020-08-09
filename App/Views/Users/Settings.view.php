<?php require APP_ROOT . '/Views/Templates/Head.tmpl.php'; ?>
<?php require APP_ROOT . '/Views/Templates/Nav.tmpl.php'; ?>
<?php Core\Util\Session::authenticate(); ?>

<div class="container">

    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center p-4 mb-3 border-bottom">
        <h1>Management</h1>
    </div>

    <h3 class="text-center">Settings</h3>

    <div class="row mb-3">

        <!-- Update Email Form-->
        <div class="col-sm-12 col-lg-6 mr-auto ml-auto border p-4 bg-light text-dark">
            <form method="post" action="<?= URL_ROOT; ?>settings/updateEmail" autocomplete="off">

                <div class="form-group row">
                    <label for="staticEmail" class="col-12 col-form-label font-weight-bold">Current Email</label>
                    <div class="col-12">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                               value="<?= !empty($data['currentEmail']) ? $data['currentEmail'] : '' ?>">
                    </div>
                </div>

                <!-- New Email Input-->
                <div class="mb-3">
                    <label for="input-new-email" class="form-label font-weight-bold">New Email</label>
                    <input type="email" name="newEmail" id="input-new-email"
                           value="<?= !empty($data['newEmail']) ? $data['newEmail'] : ''; ?>"
                           class="form-control <?= !empty($errors['newEmail']) ? 'is-invalid' : ''; ?>"
                           placeholder="Enter a new email address.">
                    <small id="error-new-email" class="text-danger"> <?= !empty($errors['newEmail']) ? $errors['newEmail'] : ''; ?></small>
                </div>

                <!-- Update Email Button -->
                <button type="submit" class="btn btn-outline-dark btn-block font-weight-bold" name="updateEmail">UPDATE EMAIL</button>

            </form>
        </div>

    </div>

    <div class="row mb-3">

        <!-- Update Password Form-->
        <div class="col-sm-12 col-lg-6 mr-auto ml-auto border p-4 bg-light text-dark">
            <form method="post" action="<?= URL_ROOT; ?>settings/updatePassword" autocomplete="off">

                <!-- New Password Input -->
                <div class="form-group">
                    <label for="input-new-password" class="form-label font-weight-bold">New Password</label>
                    <input type="password" name="newPassword" id="input-new-password"
                           value="<?= !empty($data['currentPassword']) ? $data['currentPassword'] : '' ?>"
                           class="form-control <?= !empty($errors['newPassword']) ? 'is-invalid' : ''; ?>"
                           placeholder="New Password"
                           aria-describedby="help-new-password">
                    <small id="help-new-password" class="text-muted">Enter a new password.</small>
                    <small id="error-new-password" class="text-danger"><?= !empty($errors['newPassword']) ? $errors['newPassword'] : '' ?></small>
                </div>

                <!-- Show Password -->
                <div class="form-group form-check" id="show-password-container">
                    <input class="form-check-input" type="checkbox" id="show-password"
                           onclick="showNewPassword()"
                           aria-label="Show password as plain text. Warning: this will display your password on the screen.">
                    <label class="form-check-label" for="show-password">
                        <small class="no-select"><i class="fas fa-low-vision fa-lg"></i> Show password</small>
                    </label>
                </div>

                <!-- Update Password Button -->
                <button type="submit" class="btn btn-outline-dark btn-block font-weight-bold" name="updatePassword">UPDATE PASSWORD</button>

            </form>
        </div>

    </div>

    <div class="row mb-3">

        <!-- Delete Account Form-->
        <div class="col-sm-12 col-lg-6 mr-auto ml-auto border p-4 bg-light text-dark">
            <form method="post" action="<?= URL_ROOT; ?>settings/deleteAccount">

                <!-- Delete Account Button -->
                <button type="submit" class="btn btn-outline-danger btn-block font-weight-bold" name="deleteAccount">DELETE ACCOUNT</button>

            </form>
        </div>

    </div>

</div>

<?php require APP_ROOT . '/Views/Templates/Footer.tmpl.php'; ?>
