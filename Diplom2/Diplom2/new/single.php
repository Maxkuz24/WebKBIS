<?php
include("path.php");
include "app/controllers/topics.php";
include("../../database/connect.php");
session_start();
if ($_SESSION['nn'] === NULL) {
  $_SESSION['post'] = selectPostFromPostsWithUsersOnSingle('prepod', 'users', $_GET['post']);
  $_SESSION['nn'] = 1;

}
// $post = selectPostFromPostsWithUsersOnSingle('prepod', 'users', $_GET['post']);
$post = $_SESSION['post'];

if ($_SESSION['id'] === NULL) {
  header('location: ' . BASE_URL . 'single2.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=0.9" />

  <title>Запись</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

  <link rel="stylesheet" href="assets/css/singl.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
</head>

<body>

  <?php include("app/include/header.php"); ?>



  <div class="single_post row">
    <h2>
      <?php echo $post['title']; ?>
    </h2>
    <div class="img col-12">
      <img src="<?= BASE_URL . 'assets/images/' . $post['img'] ?>" alt="<?= $post['title'] ?>" class="img-thumbnail"
        width=50%>
    </div>
    <div class="single_post_text col-12">
      <?= $post['content']; ?>
    </div>
    </form>
    <h3>Доступные записи:</h3>

    <div class="tabliza1">
      <table align="center">
        <tr align="center">
          <th>Предмет</th>
          <th>Дата приёма</th>
          <th>Время приёма</th>
          <!-- <th>Преподаватель</th> -->
          <th>Кабинет</th>
          <th>Осталось
            мест</th>
          <th>Забронировать</th>
        </tr>

        <?php
        $sql = 'SELECT id, title FROM prepod';
        $result = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_array($result)) {
          if ($row['id'] === $post['id']) {
            $id = $row['title'];
          }
        }
        $id = $post['title'];
        $_SESSION['xx'] = $post['title'];
        $products = mysqli_query($connect, "SELECT * FROM `zapisi` WHERE prepodawatel = '$id'");
        $products = mysqli_fetch_all($products);

        foreach ($products as $product) {
          if ($product[7] - $product[6] > 0) {
            ?>
            <tr>

              <td align="center">
                <?= $product[1] ?>
              </td align="center">
              <td align="center">
                <?= $product[2] ?>
              </td>
              <td align="center">
                <?= $product[3] ?>
              </td>
              <!-- <td align="center">
                <?= $product[4] ?>
              </td> -->
              <td align="center">
                <?= $product[5] ?>
              </td>
              <td align="center">
                <?= $product[7] - $product[6] ?>
              </td>
              <td align="center" style="width: 13%;"><a style="color: #1d00ff;" href="rezerv.php?id=<?= $product[0] ?>"><img
                    src="assets/images/bron.png" class="img-fluid" align="center" width="35px"></a></td>
            </tr>
            <?php
          }
        }
        ?>
      </table>
    </div>

    <h3> Таблица с вашими бронированиями:</h3>
    <div class="tabliza2">
      <table align="center">
        <tr align="center">
          <th>Предмет</th>
          <th>Дата приёма</th>
          <th>Время приёма</th>
          <th>Преподаватель</th>
          <th>Кабинет</th>
          <th>Отменить</th>
        </tr>
        <?php
        $id = $_SESSION['id'];
        $products = mysqli_query($connect, "SELECT * FROM `bron` WHERE id_stud='$id'");
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
            <td align="center" style="width: 13%;"><a href="del_bron.php?id=<?= $product[0] ?>"><img
                  src="assets/images/trash.png"></a></td>
          </tr>
          <?php
        }
        ?>
      </table>
    </div>
  </div>

  <?php include("app/include/footer.php"); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>