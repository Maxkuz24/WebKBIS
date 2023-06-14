<?php
include "../../path.php";
include "../../app/controllers/posts.php";
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>КБИС</title>

    <!--Bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <!--Встроенные стили-->
    <link rel="stylesheet" href="../../assets/css/foradminsss.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- header -->
    <?php include("../../app/include/header.php"); ?>

    <div class="container">
        <?php include "../../app/include/sidebar-sadmin.php" ?>

        <div class="posts col-9">
            <div class="button row">
                <a href="<?php echo BASE_URL . "sadmin/posts/create.php"; ?>" class="col-2 btn btn-success">Создать</a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "sadmin/posts/index.php"; ?>" class="col-2 btn btn-warning">Вернуться</a>
            </div>

            <h3 style="color: #000;" align="center">Добавить</h3>
            <form action="create1.php" method="post" align="center">
                <p style="color: #000;">Предмет</p>
                <select name="name" class="form-select" aria-label="Default select example">
                    <option selected>Выбор предмета:</option>
                    <?php foreach ($topics as $key => $topic): ?>
                        <option value="<?= $topic['id']; ?>"><?= $topic['name'] ?></option>

                    <?php endforeach; ?>
                </select>
                <!-- <p style="color: #000;">Предмет</p>
                <input type="text" name="name"> -->
                <p style="color: #000;">Дата приёма</p>
                <input type="date" name="date">
                <p style="color: #000;">Время начала приёма</p>
                <input type="time" name="time">
                <p style="color: #000;">Время окончания приёма</p>
                <input type="time" name="timedead">
                <p style="color: #000;">Преподаватель</p>
                <select name="prepodawatel" class="form-select" aria-label="Default select example">
                    <option selected>Выбор преподавателя:</option>
                    <?php foreach ($prepod as $key => $prepod): ?>
                        <option value="<?= $prepod['id']; ?>"><?= $prepod['title'] ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- <input type="text" name="prepodawatel"> -->
                <p style="color: #000;">Кабинет</p>
                <input type="text" name="kabinet">
                <p style="color: #000;">Максимальное колличество студентов на приём</p>
                <input type="text" name="kolprepod">

                <br> <br>
                <button name="edit_post" class="btn btn-primary" type="submit">Добавить запись</button>
            </form>
        </div>
    </div>
    </div>

    <!-- Подвал -->
    <?php include("../../app/include/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>