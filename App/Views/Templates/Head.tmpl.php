<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- Bootstrap v5 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

    <!-- Custom Project Styling -->
    <link rel="stylesheet" href="<?= URL_ROOT; ?>css/style.css">

    <!-- Font Awesome 5 SVG -->
    <script defer src="https://use.fontawesome.com/releases/v5.13.1/js/all.js" integrity="sha384-heKROmDHlJdBb+n64p+i+wLplNYUZPaZmp2HZ4J6KCqzmd33FJ8QClrOV3IdHZm5" crossorigin="anonymous"></script>

    <title><?= (isset($title)) ? SITE_NAME . ' | ' . $title : SITE_NAME . ' | ' . ucwords($_GET['url']); ?></title>
</head>
<html>
<body>

