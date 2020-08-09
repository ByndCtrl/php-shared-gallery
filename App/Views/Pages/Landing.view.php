<?php require APP_ROOT . '/Views/Templates/Head.tmpl.php'; ?>
<?php require APP_ROOT . '/Views/Templates/Nav.tmpl.php'; ?>

<div class="container">
    <div class="row">


        <div class="col-4 centered">
            <h1 class="text-center p-5" id="imageCount"></h1>
            <button class="btn btn-block btn-outline-dark font-weight-bold" value="Image Count" id="showImageCount">
                Image Count
            </button>

        </div>

    </div>
</div>

<?php require APP_ROOT . '/Views/Templates/Footer.tmpl.php'; ?>

<script>
    var showImageCountButton = document.getElementById("showImageCount");
    var imageCountContainer = document.getElementById("imageCount");
    let isActive = false;

    showImageCountButton.addEventListener("click", getImageCount);
    showImageCountButton.addEventListener("click", fade);

    function getImageCount()
    {
        if (isActive === false)
        {
            let request = new XMLHttpRequest();
            request.open('POST', 'image/getImageCountAjax');
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

    function fade()
    {
        showImageCountButton.onclick = function ()
        {
            imageCountContainer.classList.toggle('fade');
        }
    }

</script>