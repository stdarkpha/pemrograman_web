<!DOCTYPE html>
<html data-theme="dark" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemrograman Web</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include('components/navbar.php'); ?>
    <?php
    // Default page is 'home'
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    // Include the corresponding page from the /pages directory
    $allowed_pages = ['home', 'about', 'news', 'contact', 'submit'];
    if (in_array($page, $allowed_pages)) {
        include('pages/' . $page . '.php');
    } else {
        echo "<h1>404 - Page Not Found</h1>";
    }
    ?>

</body>

</html>