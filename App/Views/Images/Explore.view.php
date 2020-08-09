<?php require APP_ROOT . '/Views/Templates/Head.tmpl.php'; ?>
<?php require APP_ROOT . '/Views/Templates/Nav.tmpl.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="font-weight-bold text-center pt-4">Explore</h2>
        </div>
    </div>
</div>

<div class="masonry">
    <?php foreach($data['image'] as $image) : ?>
        <div class="item">
            <a href="<?= URL_ROOT . 'image?id='; echo $image->id ?>"><img src="<?= $image->path ?>" alt="Image"></a>
        </div>
    <?php endforeach ?>
</div>

<?php require APP_ROOT . '/Views/Templates/Footer.tmpl.php'; ?>

