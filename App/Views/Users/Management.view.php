<?php require APP_ROOT . '/Views/Templates/Head.tmpl.php'; ?>
<?php require APP_ROOT . '/Views/Templates/Nav.tmpl.php'; ?>
<?php Core\Util\Session::authenticate(); ?>

<div class="container">

    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center p-4 mb-3 border-bottom">
        <h1>Management</h1>
    </div>

<div class="container">

    <h3 class="text-center">Uploads</h3>
    <div class="col-lg-12 col-sm-6">

            <table class="table table-light table border table-striped table-hover table-responsive-sm w-100 d-block d-md-table caption-top">
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
                        <th scope="row"><?= isset($data[$i]->imageId) ? $data[$i]->imageId : '' ?></th>

                        <!-- Image Path -->
                        <td id="image-wrapper">
                            <img id="image" src="<?= isset($data[$i]->thumbnailPath) ? $data[$i]->thumbnailPath : '' ?>" alt="Image">
                        </td>

                        <!-- User Data -->
                        <td><?= isset($data[$i]->name) ? $data[$i]->name : '' ?></td>
                        <td><?= isset($data[$i]->username) ? $data[$i]->username : '' ?></td>
                        <td><?= isset($data[$i]->email) ? $data[$i]->email : '' ?></td>

                        <!-- User Address -->
                        <td>
                            <span><?= isset($data[$i]->streetAddress) ? $data[$i]->streetAddress . '<br>' : ''?></span>
                            <span><?= isset($data[$i]->city) ? $data[$i]->city . '<br>': '' ?></span>
                            <span><?= isset($data[$i]->postcode) ? $data[$i]->postcode . '<br>' : '' ?></span>
                            <span><?= isset($data[$i]->country) ? $data[$i]->country . '<br>' : '' ?></span>
                        </td>

                        <!-- Delete Button -->

                        <td id="delete-image-form" class="">
                            <?php if ((int)(Core\Util\Session::getValue('userId')) === $data[$i]->uploaderId ? $data[$i]->uploaderId : '') : ?>
                            <form method="post" action="<?= URL_ROOT; ?>management/deleteImage" autocomplete="off">
                                <input type="hidden" name="imageId" value="<?= isset($data[$i]->imageId) ? $data[$i]->imageId : ''?>">
                                <input type="submit" name="deleteImage" value="Delete" class="btn btn-danger">
                            </form>
                            <?php endif ?>
                        </td>

                    </tr>
                <?php endfor ?>
                </tbody>
                I want to <a href="<?= URL_ROOT . 'upload' ?>">upload</a> an image.
            </table>

    </div>
</div>

<?php require APP_ROOT . '/Views/Templates/Footer.tmpl.php'; ?>
