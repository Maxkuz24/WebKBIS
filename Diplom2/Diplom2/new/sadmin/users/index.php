<?php session_start();
include "../../path.php";
include "../../app/controllers/users1.php"
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
                <a href="<?php echo BASE_URL . "sadmin/users/create.php"; ?>" class="col-2 btn btn-success">Создать</a>
                <span class="col-1"></span>
            </div>
            <div class="row title-table">
                <h2>Пользователи</h2>
                <div class="col-1">ID</div>
                <div class="col-2">Логин</div>
                <div class="col-4">Email</div>
                <div class="col-2">Роль</div>
                <div class="col-3">Управление</div>
            </div>
            <?php foreach ($users as $key => $user): ?>
                <div class="row post">
                    <div class="col-1">
                        <?= $user['id']; ?>
                    </div>
                    <div class="col-2">
                        <?= $user['username']; ?>
                    </div>
                    <div class="col-4">
                        <?= $user['email']; ?>
                    </div>
                    <?php if ($user['admin'] == 1): ?>
                        <div class="col-2">Препод.</div>
                    <?php elseif ($user['admin'] == 2): ?>
                        <div class="col-2">Админ.</div>
                    <?php else: ?>
                        <div class="col-2">Студ.</div>
                    <? endif; ?>
                    <div class="red col-2"><a href="edit.php?edit_id=<?= $user['id']; ?>">edit</a></div>
                    <div class="del col-1"><a href="index.php?delete_id=<?= $user['id']; ?>">delete</a></div>
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