<?php
    require ('init.php')
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Новостной портал</title>
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
</head>
<body>
<header>
<a>админка</a>
</header>

<?php

$news_list = $conn->query("SELECT `title`, `text`, `postingTime` FROM news ORDER BY `postingTime`")->fetch_all(MYSQLI_ASSOC);
foreach ($news_list as $news_item) {
    echo '<article>'.'<h2>'.$news_item["title"].'</h2>'.'<p>'.$news_item["text"].'</p>'.'</article>';
}

?>
</body>
