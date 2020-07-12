<?php require APP_ROOT . '/Views/Templates/Head.tmpl.php'; ?>
<?php require APP_ROOT . '/Views/Templates/Nav.tmpl.php'; ?>

<div class="container full-height">

    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">Management</h1>
    </div>

    <h3 class="text-center">Upload</h3>

    <div class="col-sm-12 col-lg-6 mr-auto ml-auto border p-4">
        <form method="post" action="<?= URL_ROOT; ?>upload" enctype="multipart/form-data">

            <!-- Image Name -->
            <div class="form-group">
                <label for="input-imageName"><strong>Name</strong></label>
                <input type="text" name="imageName" id="input-imageName" class="form-control" placeholder="Image name"
                       aria-describedby="help-imageName">
                <small id="help-imageName" class="text-muted"></small>
                <small id="error-imageName" class="text-danger">
                    <?php
                    if (!empty($errors['nameError']))
                    {
                        echo $errors['nameError'];
                    }
                    ?>
                </small>
            </div>

            <!-- Image File -->
            <div class="form-group">
                <label><strong>Upload Files</strong></label>
                <div class="custom-file">
                    <input type="file" name="image" id="input-image" class="custom-file-input form-control">
                    <label class="custom-file-label" for="input-image">Choose file</label>
                    <small id="error-imageExtension" class="text-danger">
                        <?php
                        if (!empty($errors['extensionError']))
                        {
                            echo $errors['extensionError'];
                        }
                        ?>
                    </small>
                    <small id="error-imageSize" class="text-danger">
                        <?php
                        if (!empty($errors['sizeError']))
                        {
                            echo $errors['sizeError'];
                        }
                        ?>
                    </small>
                    <small id="success-upload" class="text-success">
                        <?php
                        if (!empty($data['success']))
                        {
                            echo $data['success'];
                        }
                        ?>
                    </small>
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

<div class="container">

    <h3 class="text-center">Uploads</h3>
    <div class="col-lg-12 col-sm-6">

        <table class="table table-bordered table-striped table-dark table-hover">
            <caption>List of images and uploader information.</caption>

            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Image Name</th>
                    <th scope="col">User</th>
                    <th scope="col">User E-mail</th>
                    <th scope="col">User Address</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
            <?php for ($i = 0; $i < count($data); $i++) : ?>
                <tr>
                    <!-- Image Id -->
                    <th class="" scope="row"><?= isset($data[$i]->imageId) ? $data[$i]->imageId : '' ?></th>

                    <!-- Image Path -->
                    <td id="image" class="">
                        <img class="img-fluid" src="<?= isset($data[$i]->thumbnailPath) ? $data[$i]->thumbnailPath : '' ?>" alt="Image">
                    </td>

                    <!-- User Data -->
                    <td class=""><?= isset($data[$i]->name) ? $data[$i]->name : '' ?></td>
                    <td class=""><?= isset($data[$i]->username) ? $data[$i]->username : '' ?></td>
                    <td class=""><?= isset($data[$i]->email) ? $data[$i]->email : '' ?></td>

                    <!-- User Address -->
                    <td class="">
                        <span><?= isset($data[$i]->streetAddress) ? $data[$i]->streetAddress . '<br>' : ''?></span>
                        <span><?= isset($data[$i]->city) ? $data[$i]->city . '<br>': '' ?></span>
                        <span><?= isset($data[$i]->postcode) ? $data[$i]->postcode . '<br>' : '' ?></span>
                        <span><?= isset($data[$i]->country) ? $data[$i]->country . '<br>' : '' ?></span>
                    </td>

                    <!-- Delete Button -->
                    <?php if ((int)(\Core\Util\Session::getValue('userId')) === $data[$i]->uploaderId) : ?>
                    <td id="delete-image-form" class="">
                        <form method="post" action="<?= URL_ROOT; ?>deleteImage" autocomplete="off">
                            <input type="hidden" name="imageId" value="<?= isset($data[$i]->imageId) ? $data[$i]->imageId : ''?>">
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                    <?php endif ?>
                </tr>
            <?php endfor ?>
            </tbody>
        </table>
    </div>
</div>

<?php require APP_ROOT . '/Views/Templates/Footer.tmpl.php'; ?>
