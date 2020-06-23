<?php

require APP_ROOT . '/Views/Layouts/head.php';
require APP_ROOT . '/Views/Layouts/nav.php';
//require APP_ROOT . '/Views/Layouts/footer.php';

?>
<?php var_dump($data); ?>
        <?php var_dump($errors); ?>
<main role="main" class="col-12">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        
      </div>

      <h2>User uploads</h2>

      <div class="table-responsive">
        <table class="table table-striped table-12 table-dark">
          <thead>
            <tr>
              <th>#</th>
              <th>Header</th>
              <th>Header
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>Lorem</td>
              <td>ipsum</td>
            </tr>
            <tr>
              <td>1,002</td>
              <td>amet</td>
              <td>consectetur</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>Integer</td>
              <td>nec</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>libero</td>
              <td>Sed</td>
            </tr>
            <tr>
              <td>1,004</td>
              <td>dapibus</td>
              <td>diam</td>
            </tr>
            <tr>
              <td>1,005</td>
              <td>Nulla</td>
              <td>quis</td>

            </tr>

          </tbody>
        </table>
      </div>
    </main>