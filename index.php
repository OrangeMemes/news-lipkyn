<?php
require('init.php')
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Новостной портал</title>
</head>
<body>
<header>
    <a href="admin.php">админка</a>
</header>
<section class="main">
    <?php

    $news_list = $conn->query("SELECT `title`, `text`, `postingTime` FROM news ORDER BY `postingTime` DESC")->fetch_all(MYSQLI_ASSOC);
    foreach ($news_list as $news_item) {
        echo '<article>' . '<h2>' . $news_item["title"] . '</h2>' . '<p class="news-text">' . $news_item["text"] . '</p>' . '</article>';
    }

    ?>
</section>
</body>
