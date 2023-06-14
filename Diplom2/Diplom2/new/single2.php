<?php
include("path.php");
include "app/controllers/topics.php";
include("../../database/connect.php");
$post = selectPostFromPostsWithUsersOnSingle('prepod', 'users', $_SESSION['ll']);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=0.9" />

  <title>Новость</title>

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

  <div class="container">
    <div class="container row">

      <div class="main-content col-md-9 col-12">

        <div class="single_post row">
          <h2>
            <?php echo $post['title']; ?>
          </h2>
          <div class="img col-12">
            <img src="<?= BASE_URL . 'assets/images/' . $post['img'] ?>" alt="<?= $post['title'] ?>"
              class="img-thumbnail" width=50%>
          </div>
          <div class="single_post_text col-12">
            <?= $post['content']; ?>
          </div>

        </div>
      </div>
    </div>
  </div>

  <?php include("app/include/footer.php"); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>