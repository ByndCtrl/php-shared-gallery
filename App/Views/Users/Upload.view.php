<?php require APP_ROOT . '/Views/Templates/Head.tmpl.php'; ?>
<?php require APP_ROOT . '/Views/Templates/Nav.tmpl.php'; ?>
<?php Core\Util\Session::authenticate(); ?>

<div class="container">

    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">Management</h1>
    </div>

    <h3 class="text-center">Upload</h3>

    <div class="col-sm-12 col-lg-6 mr-auto ml-auto border p-4 bg-light text-dark">
        <form method="post" action="<?= URL_ROOT; ?>upload" enctype="multipart/form-data">

            <!-- Image Name -->
            <div class="mb-3">
                <label for="input-name"><strong>Name</strong></label>
                <input type="text" name="name" id="input-name"
                       value="<?= !empty($data['name']) ? $data['name'] : '' ?>"
                       class="form-control <?= (!empty($errors['name'])) ? 'is-invalid' : ''; ?>"
                       placeholder="Enter a name for your file.">
                <small id="error-name" class="text-danger"><?= !empty($errors['name']) ? $errors['name'] : ''; ?></small>
            </div>

            <!-- Image File
            <div class="form-file mb-3">
                <label class="form-file-label" for="input-image"><strong>File</strong></label>
                <input type="file" class="form-file-input custom-file-input" id="input-image">
                <label class="form-file-label" for="input-image">
                    <span class="form-file-text">Choose file...</span>
                    <span class="form-file-button">Browse</span>
                </label>

            </div>
-->
            <!-- Image File -->
            <label for="input-image"><strong>File</strong></label>
            <div class="form-file mb-3">

                <div class="custom-file">
                    <input type="file" name="image" id="input-image" class="custom-file-input form-control">
                </div>
                <small id="error-extension" class="text-danger"><?= !empty($errors['file']) ? $errors['file'] : ''; ?></small>
                <small id="error-extension" class="text-danger"><?= !empty($errors['extension']) ? $errors['extension'] : ''; ?></small>
                <small id="error-size" class="text-danger"><?= !empty($errors['size']) ? $errors['size'] : ''; ?></small>
            </div>



            <!-- Upload Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-dark btn-block font-weight-bold" value="Upload">UPLOAD</button>
            </div>

        </form>
    </div>
</div>

<?php require APP_ROOT . '/Views/Templates/Footer.tmpl.php'; ?>
