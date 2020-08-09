<?php require APP_ROOT . '/Views/Templates/Head.tmpl.php'; ?>
<?php require APP_ROOT . '/Views/Templates/Nav.tmpl.php'; ?>

<div class="container pt-5">
    <div class="card text-white bg-dark mb-3 mt-3 text-dark">
        <div class="card-header">
            <img class="card-img-top d-block h-50" src="<?= $data['image']->path ?>" alt="Image">
        </div>
        <div class="card-body">
            <h3 class="card-title font-weight-bold mb-3"><?= $data['image']->name ?></h3>
            <h6 class="font-weight-bolder">Uploader: </h6><p class="card-text font-weight-light"><?= $data['user']->username ?> | <?= $data['user']->email ?></p>
            <h6 class="font-weight-bolder">Uploaded at: </h6><p class="card-text font-weight-light"><?= $data['image']->uploadedAt ?></p>
        </div>
    </div>
</div>

<?php require APP_ROOT . '/Views/Templates/Footer.tmpl.php'; ?>

