<?php
include "path.php";
session_start();
unset($_SESSION['post']);
unset($_SESSION['nn']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=0.9" />

  <title>КБИС</title>

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

  <?php include("app/include/header.php");
  include SITE_ROOT . "/app/database/db.php"; ?>



  <div class="selector_prepoda">
    <!-- <div class="sidebar col-md-3 col-6">
      <div class="section search">
        <h3>Поиск</h3>
        <form action="search.php" method="post">
          <input type="text" name="search-term" class="test-input" placeholder="Введите преподавателя" />
        </form>
      </div>
      <div class="section topics">
        <ul>
          <?php foreach ($topics as $key => $topic): ?>
            <li><a href="<?= BASE_URL . 'category.php?id=' . $topic['id']; ?>">
                <?= $topic['name']; ?>
              </a></li>
          <? endforeach; ?>
        </ul>
      </div>
    </div> -->

    <?php $posts = selectAllFromPostsWithUsersOnIndex('prepod', 'users'); ?>

    <h2>Преподавательский состав</h2>
    <div class="card_prepod">
      <?php foreach ($posts as $post): ?>
        <div class="post row">
          <div class="img col-12 col-md-4">
            <img src="<?= BASE_URL . 'assets/images/' . $post['img'] ?>" alt="<?= $post['title'] ?>"
              class="img-thumbnail" />
          </div>
          <div class="post_text col-12 col-md-8">
            <h3>
              <a href="<?= BASE_URL . 'single.php?post=' . $post['id']; ?>"><?= $post['title'] ?></a>
            </h3>
            <p class="preview-text">
              <?= $post['content'] ?>
            </p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  </div>

  <?php include("app/include/footer.php"); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>