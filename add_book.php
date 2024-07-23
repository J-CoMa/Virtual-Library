<?php
include './includes/config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $publish_year = $_POST['publish_year'];
    $isbn = $_POST['isbn'];
    $sql = "INSERT INTO t_book (title, genre, publish_year, isbn) VALUES ('$title', '$genre',
$publish_year, '$isbn')";
    if ($conn->query($sql) === TRUE) {
        echo "Book successfully added!";
        header('Location: list_books_admin.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style.css">
    <title>WeBooks - Add Book</title>
</head>

<body>
    <section id="header">
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <!-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg> -->
                    <span class="fs-4 serif-font text-white"><span class="webooks-text-yellow">WE</span>BOOKS</span>
                </a>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="./Index.html" class="nav-link px-2 header-link">Home</a></li>
                    <li><a href="./list_books_admin.php" class="nav-link px-2 header-link-secondary">Books</a></li>
                    <li><a href="#" class="nav-link px-2 header-link">Pricing</a></li>
                    <li><a href="#" class="nav-link px-2 header-link">FAQs</a></li>
                    <li><a href="#" class="nav-link px-2 header-link">About</a></li>
                </ul>

                <div class="col-md-3 text-end">
                    <button type="button" class="btn btn-outline-yellow me-2">Login</button>
                    <button type="button" class="btn btn-yellow">Sign-up</button>
                </div>
            </header>
        </div>
    </section>

    <section id="body">
        <div class="container">
            <h2>Add Book</h2>
            <form method="POST" action="">
                <label>Title:</label><br>
                <input type="text" name="title" required><br>
                <label>Genre:</label><br>
                <input type="text" name="genre"><br>
                <label>Publish Year:</label><br>
                <input type="number" name="publish_year"><br>
                <label>ISBN:</label><br>
                <input type="text" name="isbn" maxlength="13" required><br><br>
                <input type="submit" value="Add">
            </form>
            <a href="list_books_admin.php">Return to the Book List</a>
        </div>
    </section>
</body>

</html>