<?php
require('init.php')
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Админка новостного портала</title>
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
</head>
<body>
<header>
    <a href="/">юзеринка</a>
</header>
<section class="main">
    <?php
    if ($_POST) {
        if (isset($_POST["action"]) && $_POST["action"] == "POST" && isset($_POST["title"]) && isset($_POST["text"])) {
            $title = mysqli_real_escape_string($conn, $_POST["title"]);
            $text = mysqli_real_escape_string($conn, $_POST["text"]);
            $insert = $conn->query("INSERT INTO news (`title`, `text`) VALUES (\"" . $title . "\",\"" . $text . "\")");
            if ($insert && mysqli_affected_rows($conn) > 0) {
                echo '<div class="info-message">Новостная запись успешно создана</div>';
            } else {
                echo '<div class="error-message">Ошибка взаимодействия с БД</div>';
            }
        } else if (isset($_POST["action"]) && $_POST["action"] == "DELETE" && isset($_POST["id"])) {
            $id = (int)$_POST["id"];
            $delete = $conn->query("DELETE FROM news WHERE id = " . $id);
            if ($delete && mysqli_affected_rows($conn) > 0) {
                echo '<div class="info-message">Новостная запись успешно удалена</div>';
            } else {
                echo '<div class="error-message">Ошибка взаимодействия с БД или запись не найдена</div>';
            }
        } else {
            echo '<div class="error-message">Некорректный запрос</div>';
        }
    }
    ?>

    <form method="post">
        <input type="hidden" name="action" value="POST">
        <div class="form-field">название статьи <input name="title"></div>
        <div class="form-field">текст статьи <input name="text"></div>
        <input type="submit" value="!"/>
    </form>

    <?php
    $news_list = $conn->query("SELECT `title`, `id` FROM news ORDER BY `postingTime` DESC")->fetch_all(MYSQLI_ASSOC);
    foreach ($news_list as $news_item) {
        $title = htmlspecialchars($news_item["title"]);
        $id = htmlspecialchars($news_item["id"]);
        echo '<article><p>' . $title . '</p>' .
            '<form method="post">' .
            '<input type="hidden" name="action" value="DELETE">' .
            '<input type="hidden" name="id" value="' . $id . '">' .
            '<input type="submit" value="удалить...">'.
            '</form>' .
            '</article>';
    }
    ?>

</section>
</body>
