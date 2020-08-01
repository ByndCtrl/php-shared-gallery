<?php require APP_ROOT . '/Views/Templates/Head.tmpl.php'; ?>
<?php require APP_ROOT . '/Views/Templates/Nav.tmpl.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-4"></div>

        <div class="col-4 centered">
            <button class="btn btn-block btn-outline-dark font-weight-bold" value="Image Count" id="showImageCount">
                Image Count
            </button>

            <div id="imageCount">

            </div>
        </div>

        <div class="col-4"></div>
    </div>
</div>

<?php require APP_ROOT . '/Views/Templates/Footer.tmpl.php'; ?>

<script>
let isActive = false;
let imageCountContainer = document.getElementById("imageCount");
let showImageCountButton = document.getElementById("showImageCount");

showImageCountButton.addEventListener("click", getImageCount);

function getImageCount()
{
    if (isActive === false)
    {
        let request = new XMLHttpRequest();
        request.open('POST', 'pages/ajaxTest');
        request.onload = function()
        {
            if (request.status >= 200 && request.status < 400)
            {
                let data = JSON.parse(request.responseText);
                displayImageCount(data);
            }
        };
        request.send();
        isActive = true;
    }
}

function displayImageCount(data)
{
    imageCountContainer.insertAdjacentHTML('beforeend', data);
}
</script>