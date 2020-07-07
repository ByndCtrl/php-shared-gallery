<?php
require APP_ROOT . '/Views/Templates/Head.tmpl.php'; ?>
<?php
require APP_ROOT . '/Views/Templates/Nav.tmpl.php'; ?>

<div class="container">

    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">Management</h1>
    </div>

    <h1 class="text-center">Upload</h1>
    <div class="col-sm-12 col-lg-6 mr-auto ml-auto border p-4">
        <form method="post" action="<?= URL_ROOT; ?>upload" enctype="multipart/form-data">

            <!-- Image Name -->
            <div class="form-group">
                <label for="imageName"><strong>Name</strong></label>
                <input type="text" name="imageName" id="input-imageName" class="form-control" placeholder="Image name"
                       aria-describedby="help-imageName">
                <small id="help-imageName" class="text-muted"></small>
                <small id="error-imageName" class="text-danger"><?php
                    if (!empty($errors['nameError'])) {
                        echo $errors['nameError'];
                    } ?></small>
            </div>

            <!-- Image File -->
            <div class="form-group">
                <label><strong>Upload Files</strong></label>
                <div class="custom-file">
                    <input type="file" name="image" id="input-image" class="custom-file-input form-control">
                    <label class="custom-file-label" for="image">Choose file</label>
                    <small id="error-imageExtension" class="text-danger"><?php
                        if (!empty($errors['extensionError'])) {
                            echo $errors['extensionError'];
                        } ?></small>
                    <small id="error-imageSize" class="text-danger"><?php
                        if (!empty($errors['sizeError'])) {
                            echo $errors['sizeError'];
                        } ?></small>
                    <small id="success-upload" class="text-success"><?php
                        if (!empty($data['success'])) {
                            echo $data['success'];
                        } ?></small>
                </div>
            </div>

            <!-- Upload Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-dark btn-block" value="Upload">UPLOAD</button>
            </div>

        </form>
    </div>
</div>

<hr>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
    <h1 class="h4">Uploads</h1>
</div>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <table class="table-striped table-bordered table-hover imageTable">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Image Name</th>
                    <th scope="col">User</th>
                    <th scope="col">User E-mail</th>
                    <th scope="col">User Address</th>
                </tr>
                </thead>

                <tbody>
                <?php
                for ($i = 0; $i < count($data); $i++) : ?>
                    <tr>
                        <th class="imageCell"
                            scope="row"><?= isset($data[$i]->imageId) ? $data[$i]->imageId : '' ?></th>

                        <td class="imageCell">
                            <img class="img-fluid"
                                 src="<?= isset($data[$i]->thumbnailPath) ? $data[$i]->thumbnailPath : '' ?>" alt="">
                        </td>

                        <td class="imageCell"><?= isset($data[$i]->name) ? $data[$i]->name : '' ?></td>
                        <td class="imageCell"><?= isset($data[$i]->username) ? $data[$i]->username : '' ?></td>
                        <td class="imageCell"><?= isset($data[$i]->email) ? $data[$i]->email : '' ?></td>
                        <td class="imageCell"><?= isset($data[$i]->address) ? $data[$i]->address : '' ?></td>
                    </tr>
                <?php
                endfor ?>
                </tbody>

            </table>
        </div>
    </div>
</div>

<?php
require APP_ROOT . '/Views/Templates/Footer.tmpl.php'; ?>
