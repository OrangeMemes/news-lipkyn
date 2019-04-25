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

    if ($_POST && $_POST["title"] && $_POST["text"]) {
        $title = mysqli_real_escape_string($conn, $_POST["title"]);
        $text = mysqli_real_escape_string($conn, $_POST["text"]);
        $insert = $conn->query("INSERT INTO news (`title`, `text`) VALUES (\"" . $title . "\",\"" . $text . "\")");
        if ($insert) {
            echo '<div class="info-message">Новостная запись успешно создана</div>';
        } else {
            echo '<div class="info-message">Ошибка взаимодействия с БД</div>';
        }
    }
    ?>

    <form method="post">
        <div class="form-field">название статьи <input name="title"></div>
        <div class="form-field">текст статьи <input name="text"></div>
        <input type="submit" name="submit" value="!" />
    </form>

</section>
</body>
