<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" class="h-100" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/style.css">
  <?php include './includes/validation.php'; ?>
  <title>WeBooks - Your Books</title>
</head>

<body class="d-flex flex-column h-100">
  <section id="header">
    <div class="container">
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="./login2.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <!-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg> -->
          <span class="fs-4 serif-font text-white"><span class="webooks-text-yellow">WE</span>BOOKS</span>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="./login2.php" class="nav-link px-2 header-link">Home</a></li>
          <li><a href="./list_books.php" class="nav-link px-2 header-link">Library</a></li>
          <li><a href="./owned_books.php" class="nav-link px-2 header-link-secondary">Your Books</a></li>
        </ul>

        <?php
        include './includes/config.php';
        $sql_header = "SELECT * FROM t_user WHERE user_id = '$_SESSION[user_id]'";
        $result_header = mysqli_query($conn, $sql_header) or die(mysqli_error($conn));
        $row_header = mysqli_fetch_assoc($result_header);
        ?>

        <ul class="navbar-nav col-md-3 text-end">
          <li class="nav-item dropdown">
            <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $row_header['first_name'] . " " . $row_header['last_name']; ?>
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="./user_profile.php">Profile</a></li>
              <li><a class="dropdown-item" href="#">History</a></li>
              <?php if ($row_header['admin'] == 1) {
                echo "<li><a class='dropdown-item text-info' href='./admin/index.php'>Admin Page</a></li>";
              }
              ?>
              <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </header>
    </div>
  </section>

  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pb-4 mb-4 border-bottom">
      <h1 class="d-flex align-items-center mb-3 mb-md-0 me-md-auto">Your Books</h1>
    </div>
  </div>

  <?php
  include './includes/config.php';
  $user_id = $_SESSION['user_id'];
  /* $sql = "SELECT book_id FROM t_loan WHERE user_id = $user_id"; */
  $sql = "SELECT * FROM t_book
        INNER JOIN t_loan ON t_book.book_id = t_loan.book_id
        WHERE t_loan.user_id = $user_id
        AND t_loan.delivery_date IS NULL";
  $result = $conn->query($sql);
  ?>

  <section id="listing">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-md-between pb-4 mb-4">
        <table class="table table-hover align-middle">
          <thead>
            <tr>
              <th>Title</th>
              <th>Genre</th>
              <th>Publish Year</th>
              <th>ISBN</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php while ($row = $result->fetch_assoc()) : ?>
              <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['genre']; ?></td>
                <td><?php echo $row['publish_year']; ?></td>
                <td><?php echo $row['isbn']; ?></td>
                <td>
                  <a class="btn btn-outline-yellow" href="./loan_details.php?book_id=<?php echo $row['book_id']; ?>" role="button">Details</a>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <footer class="footer mt-auto pt-3">
    <div class="container">
      <p class="text-center text-body-secondary border-top py-3 m-0">© João Martins. All Rights Reserved</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>