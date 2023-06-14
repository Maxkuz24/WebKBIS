<?php
include("path.php");
include "app/controllers/users.php";
?>
<!DOCTYPE html>
<html lang="ru">

<?php
if ($_SESSION['admin'] == 1) {
  header('location: ' . BASE_URL . "admin/posts/index.php");
} elseif ($_SESSION['admin'] == 2) {
  header('location: ' . BASE_URL . "sadmin/posts/index.php");
} else {
}
?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=0.9" />

  <title>Авторизация</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

  <link rel="stylesheet" href="assets/css/forrelog.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
</head>

<body>

  <?php include("app/include/header.php"); ?>

  <div class="container reg_form">
    <form class="row justify-content-center" method="post" action="log.php">
      <h2 class="col-12">Авторизация</h2>
      <div class="mb-3 col-12 col-md-4 err">
        <?php include("app/helps/errorInfo.php") ?>
      </div>
      <div class="w-100"></div>
      <div class="mb-3 col-12 col-md-4">
        <label for="formGroupExampleInput" class="form-label">Ваша почта</label>
        <input name=mail type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
          placeholder="Введите вашу почту" />
      </div>

      <div class="w-100"></div>
      <div class="mb-3 col-12 col-md-4">
        <label for="exampleInputPassword1" class="form-label">Пароль</label>
        <input name="password" value="" type="password" class="form-control" id="exampleInputPassword1" />
      </div>
      <div class="w-100"></div>

      <div class="mb-3 col-12 col-md-4">
        <button type="submit" name="button-log" class="btn btn-secondary">Войти</button>
        <a href="reg.php">Зарегистрироваться</a>
      </div>
    </form>
  </div>

  <?php include("app/include/footer.php"); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>