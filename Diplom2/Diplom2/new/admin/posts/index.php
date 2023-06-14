<?php
include "../../path.php";
include "../../app/controllers/posts.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0.9" />

    <title>Ваши занятия</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../assets/css/foradminsss.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php include("../../app/include/header.php"); ?>

    <div class="container">

        <div class="panel col-9">

            <a href="<?php echo BASE_URL . "admin/posts/create.php"; ?>" class="btn btn-success">Создать</a>

            <h4>Ваши запланированные занятия:</h4><br>

            <div class="tabliza">
                <table>
                    <tr>
                        <th>Предмет</th>
                        <th>Дата приёма</th>
                        <th>Время приёма</th>
                        <th>Преподаватель</th>
                        <th>Кабинет</th>
                        <th>Кол-во студентов, планирующих<br />прийти на занятие</th>
                        <th>Общее кол-во мест</th>
                        <th>Изменить</th>
                        <th>Удалить</th>
                    </tr>

                    <?php
                    include("../../database/connect.php");

                    $products = mysqli_query($connect, "SELECT * FROM `zapisi` WHERE prepodawatel='Короченцев Д. А.'");
                    $products = mysqli_fetch_all($products);

                    foreach ($products as $product) {
                        ?>
                        <tr>

                            <td align="center">
                                <?= $product[1] ?>
                            </td>
                            <td align="center">
                                <?= $product[2] ?>
                            </td>
                            <td align="center">
                                <?= $product[3] ?>
                            </td>
                            <td align="center">
                                <?= $product[4] ?>
                            </td>
                            <td align="center">
                                <?= $product[5] ?>
                            </td>
                            <td align="center">
                                <?= $product[6] ?>
                            </td>
                            <td align="center">
                                <?= $product[7] ?>
                            </td>
                            <td><a href="edit.php?id=<?= $product[0] ?>">ㅤ<img src="../../assets/images/edit.png"
                                        class="img-fluid" align="center" width="25px"></a></td>
                            <td><a style="color: red;" href="delete.php?id=<?= $product[0] ?>" align="center">ㅤ<img
                                        src="../../assets/images/trash.png" class="img-fluid" align="center"
                                        width="25px"></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <?php include("../../app/include/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>