<?php
include "../../path.php";
include "../../app/controllers/preposts1.php";
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
        <?php
        include("../../database/connect.php");
        // require_once 'connect.php';
        $_SESSION['iddd'] = $_GET['id'];
        $product = mysqli_query($connect, "SELECT * FROM `prepod` WHERE `id` = '$id'");
        $product = mysqli_fetch_assoc($product);
        ?>

        <div class="panel col-9">
            <div class="row title-table">
                <h2>Редактирование преподавателей</h2>
            </div>
            <div class="row add-post">
                <div class="mb-12 col-12 col-md-12 err">
                    <!-- Вывод массива с ошибками -->
                    <?php include "../../app/helps/errorInfo.php"; ?>
                </div>
                <div class="row add-post">
                    <div class="mb-12 col-12 col-md-12 err">
                        <?php include("../../app/helps/errorInfo.php") ?>
                    </div>

                    <form action="update.php" method="post" align="center">
                        <!-- <p style="color: #000;">Предмет</p> -->
                        <p style="color: #000;">ФИО преподавателя</p>
                        <input type="text" name="title" value="<?= $product['title'] ?>">

                        <p style="color: #000;">Описание проподавателя</p>
                        <input type="textarea" name="content" value="<?= $product['content'] ?>">
                        <p style="color: #000;">Загрузить фото</p>
                        <input type="file" name="img" value="<?= $product['img'] ?>">
                        <p style="color: #000;">Введите ID</p>
                        <input type="text" name="iduser" value="<?= $product['iduser'] ?>">
                        <br> <br>
                        <button name="edit_post" class="btn btn-primary" type="submit">Редактировать
                            преподавателя</button>
                    </form>
                    </form>
                </div>

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