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
        $title = htmlspecialchars($news_item["title"]);
        $text = htmlspecialchars($news_item["text"]);
        echo '<article>' . '<h2>' . $title . '</h2>' . '<p class="news-text">' . $text . '</p>' . '</article>';
    }

    ?>
</section>
</body>
