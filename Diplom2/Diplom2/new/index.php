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
  <meta name="viewport" content="width=device-width, initial-scale=0.5" />

  <title>КБИС</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

  <link rel="stylesheet" href="assets/css/stylee.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
</head>


<body>

  <?php include("app/include/header.php");
  include SITE_ROOT . "/app/database/db.php";
  ?>

  <div class="main-content">
    <div class="brain">
      <div class="row">
        <h1>Добро пожаловать</h1>
        <div class="col">
          <article class="card">
            <img class="card__background" src="assets/images/newprepod.jpg" alt="prep" width="350" />
            <div class="card__content | flow">
              <div class="card__content--container | flow">
                <h2 class="card__title">Преподаватель</h2>
                <p class="card__description">
                  Преподаватели могут просматривать записи на консультации
                </p>
              </div>
              <button onclick="location.href = 'admin/posts/index.php'" class="card__button">Войти</button>
            </div>
          </article>
        </div>
        <div class="col">
          <article class="card">
            <img class="card__background" src="assets/images/studentt.jpg" alt="stud" width="350" />
            <div class="card__content | flow">
              <div class="card__content--container | flow">
                <h2 class="card__title">Студент</h2>
                <p class="card__description">
                  Студенты могут записываться на консультации
                </p>
              </div>
              <button onclick="location.href = 'choice.php'" class="card__button">Войти</button>
            </div>
          </article>
        </div>
      </div>
    </div>

    <div class="navigation">
      <button onclick="location.href = '#info'" type="button" class="btn btn-outline-light">О кафедре</button>
      <button onclick="location.href = '#sostav'" type="button" class="btn btn-outline-light">Преподаватели</button>
      <button onclick="location.href = '#new'" type="button" class="btn btn-outline-light">Новости</button>
    </div>

    <div class="info">
      <img src="assets/images/locker.gif" alt="pic" class="info-image">
      <div class="info-content">
        <h3 class="info-title" id="info">Основная информация о кафедре:</h3>
        <p class="info-text">Кафедра «Кибербезопасность информационных систем» федерального государственного
          бюджетного
          образовательного учреждения высшего образования «Донской Государственный Технический университет» </br></br>
          В
          рамках основной профессиональной образовательной программы "Компьютерная безопасность" реализуется обучение
          технологиям проектирования и разработке методов защиты для современных информационно-измерительных систем,
          вычислительных сетей, предназначенных для получения, передачи и хранения ценной объективной информации.</p>
        <button onclick="location.href = 'about.php'" class="buttonmore">Подробнее</button>
      </div>
    </div>

    <div class="brain2">
      <div class="sostav">
        <h1 id="sostav">Преподавательский состав</h1>
      </div>

      <div id="carousel">
        <div id="drag-container">
          <div id="spin-container" align="center">
            <?php $posts = selectAllFromPostsWithUsersOnIndex('prepod', 'users'); ?>
            <?php foreach ($posts as $post): ?>
              <?php $img = selectOne('prepod', ['img' => $_GET['post']]);
              $title = explode(" ", $post['title']);
              $kkk = substr($title[1], 0, 2);
              $ttt = substr($title[2], 0, 2);?>
              <a href="<?= BASE_URL . 'single.php?post=' . $post['id']; ?>">
              <img src="<?= BASE_URL . 'assets/images/' . $post['img'] ?>" alt="" /> <?= $title[0] . ' ' . $kkk . '. ' . $ttt . '.'; ?> </a>
            <?php endforeach; ?>
            <!-- <?php $post['title']; ?> -->
            <p>КБИС</p>
          </div>
          <div id="ground"></div>
        </div>
      </div>

      <script>
        let radius = 440;
        let autoRotate = true;
        let rotateSpeed = -60;
        let imgWidth = 140;
        let imgHeight = 205;
        setTimeout(init, 300);
        let odrag = document.getElementById("drag-container");
        let ospin = document.getElementById("spin-container");
        let carousel = document.getElementById("carousel");
        let aImg = ospin.getElementsByTagName("a");
        ospin.style.width = imgWidth + "px";
        ospin.style.height = imgHeight + "px";
        let ground = document.getElementById("ground");
        ground.style.width = radius * 3 + "px";
        ground.style.height = radius * 3 + "px";
        function init(delayTime) {
          for (let i = 0; i < aImg.length; i++) {
            aImg[i].style.transform =
              "rotateY(" +
              i * (360 / aImg.length) +
              "deg) translateZ(" +
              radius +
              "px)";
            aImg[i].style.transition = "transform 1s";
            aImg[i].style.transitionDelay =
              delayTime || (aImg.length - i) / 4 + "s";
          }
        }
        function applyTranform(obj) {
          if (tY > 180) tY = 180;
          if (tY < 0) tY = 0;
          obj.style.transform = "rotateX(" + -tY + "deg) rotateY(" + tX + "deg)";
        }
        function playSpin(yes) {
          ospin.style.animationPlayState = yes ? "running" : "paused";
        }
        let sX,
          sY,
          nX,
          nY,
          desX = 0,
          desY = 0,
          tX = 0,
          tY = 10;
        if (autoRotate) {
          let animationName = rotateSpeed > 0 ? "spin" : "spinRevert";
          ospin.style.animation = `${animationName} ${Math.abs(
            rotateSpeed
          )}s infinite linear`;
        }
        carousel.onpointerdown = function (e) {
          clearInterval(odrag.timer);
          e = e || window.event;
          let sX = e.clientX,
            sY = e.clientY;
          this.onpointermove = function (e) {
            e = e || window.event;
            let nX = e.clientX,
              nY = e.clientY;
            desX = nX - sX;
            desY = nY - sY;
            tX += desX * 0.1;
            tY += desY * 0.1;
            applyTranform(odrag);
            sX = nX;
            sY = nY;
          };
          this.onpointerup = function (e) {
            odrag.timer = setInterval(function () {
              desX *= 0.95;
              desY *= 0.95;
              tX += desX * 0.1;
              tY += desY * 0.1;
              applyTranform(odrag);
              playSpin(false);
              if (Math.abs(desX) < 0.5 && Math.abs(desY) < 0.5) {
                clearInterval(odrag.timer);
                playSpin(true);
              }
            }, 17);
            this.onpointermove = this.onpointerup = null;
          };
          return false;
        };
      </script>

      <?php $posts = selectAllFromPostsWithUsersOnIndex('posts', 'users'); ?>

      <div class="news">
        <h1 id="new">Последние публикации</h1>
        <?php foreach ($posts as $post): ?>
          <div class="news-block">
            <div class="news-content">
              <div class="img col-12 col-md-4">
                <img src="<?= BASE_URL . 'assets/images/posts/' . $post['img'] ?>" alt="<?= $post['title'] ?>"
                  class="img-thumbnail" />
              </div>
              <div class="post_text col-12 col-md-8">
                <h3>
                  <a href="<?= BASE_URL . 'single1.php?post=' . $post['id']; ?>"><?= substr($post['title'], 0, 140) . '...' ?></a>
                </h3>

                <p class="preview-text">
                  <?= mb_substr($post['content'], 0, 160, 'UTF-8') . '...' ?>
                </p>
              </div>
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