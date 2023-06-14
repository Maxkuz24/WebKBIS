<?php
include "../../path.php";
include "../../app/controllers/preposts1.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>КБИС</title>

    <!--Bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <!--Встроенные стили-->
    <link rel="stylesheet" href="../../assets/css/foradms.css" />

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

        <div class="panel col-9">
            <div class="button row">
                <a href="<?php echo BASE_URL . "sadmin/zapisi/create.php"; ?>" class="col-2 btn btn-success">Создать</a>
                <span class="col-1"></span>
            </div>
            <div class="row title-table">
                <h2>Управление записями</h2>
                <div class="col-2">ID users</div>
                <div class="col-4">Имя преподавателя</div>
                <div class="col-4">Управление</div>
            </div>
            <?php foreach ($postsAdm as $key => $post): ?>
                <div class="row post">
                    <div class="title col-2">
                        <?= mb_substr($post['id'], 0, 30, 'UTF-8') ?>
                    </div>
                    <div class="title col-4">
                        <?= mb_substr($post['title'], 0, 30, 'UTF-8') ?>
                    </div>
                    <div class="red col-2"><a href="edit.php?id=<?= $post['id']; ?>">Редакт.</a></div>
                    <div class="del col-2"><a href="edit.php?delete_id=<?= $post['id']; ?>">Удалить</a></div>
                    <?php if ($post['status']): ?>

                        <div class="status col-2"><a href="edit.php?publish=0&pub_id=<?= $post['id']; ?>">Опубликовано</a></div>
                    <?php else: ?>
                        <div class="status col-2"><a href="edit.php?publish=1&pub_id=<?= $post['id']; ?>">Скрыто</a></div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
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