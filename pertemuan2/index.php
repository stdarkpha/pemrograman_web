<!DOCTYPE html>
<html data-theme="dark" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemrograman Web - Konsep SPA</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include('components/navbar.php'); ?>
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    if (isset($_GET['news'])) {
        $news_name = $_GET['news'];
        $news_file = 'pages/news-detail/' . $news_name . '.php';
        if (file_exists($news_file)) {
            include($news_file);
        } else {
            echo "<h1>404 - News Not Found</h1>";
        }
    } else {
        $allowed_pages = ['home', 'about', 'news', 'survey', 'submit'];
        if (in_array($page, $allowed_pages)) {
            include('pages/' . $page . '.php');
        } else {
            echo "<h1>404 - Page Not Found</h1>";
        }
    }
    ?>
    <?php include('components/footer.php'); ?>
</body>

</html>