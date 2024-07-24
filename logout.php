<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/style.css">
  <meta http-equiv="refresh" content="3;url=index.html">
  <title>WeBooks - Logout</title>
</head>

<body>
  <?php
  session_start();
  $_SESSION = array();
  session_destroy();
  ?>

  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="./login2.php" class="d-flex align-items-center mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <!-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg> -->
        <span class="fs-4 serif-font text-white"><span class="webooks-text-yellow">WE</span>BOOKS</span>
      </a>
    </header>

    <div class='text-center mb-5'>
      <h3 class='mb-5'>Session Terminated!</h3>
      <h6>You will be redirected</h6>
      <p>Click <a href='index.html' target='_self'>here</a> if you dont get automatically redirected.</p>
    </div>
  </div>


</body>

</html>