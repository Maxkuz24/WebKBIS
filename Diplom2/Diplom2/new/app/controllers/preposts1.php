<?php

include SITE_ROOT . "/app/database/db.php";
if (!$_SESSION) {
    header('location: ' . BASE_URL . 'log.php');
}

$errorMsg = [];
$id = '';
$title = '';
$content = '';
$img = '';
$topic = '';

$topics = selectAll('topics');
$posts = selectAll('prepod');
$postsAdm = selectAllFromPostsWithUsers('prepod', 'users');

// Код для формы создания записи
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])) {

    if (!empty($_FILES['img']['name'])) {
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\assets\images\\" . $imgName;


        if (strpos($fileType, 'image') === false) {
            array_push($errorMsg, "Подгружаемый файл не является изображением!");
        } else {
            $result = move_uploaded_file($fileTmpName, $destination);

            if ($result) {
                $_POST['img'] = $imgName;
            } else {
                array_push($errorMsg, "Ошибка загрузки изображения на сервер");
            }
        }
    } else {
        array_push($errorMsg, "Ошибка получения картинки");
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    $publish = isset($_POST['publish']) ? 1 : 0;


    if ($title === '' || $content === '' || $topic === '') {
        array_push($errorMsg, "Не все поля заполнены!");
    } elseif (mb_strlen($title, 'UTF8') < 7) {
        array_push($errorMsg, "Название статьи должно быть более 7-ми символов");
    } else {
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $topic
        ];

        $post = insert('prepod', $post);
        $post = selectOne('prepod', ['id' => $id]);
        header('location: ' . BASE_URL . 'sadmin/zapisi/index.php');
    }
} else {
    $id = '';
    $title = '';
    $content = '';
    $publish = '';
    $topic = '';
    $iduser = '';
}


// АПДЕЙТ СТАТЬИ
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $post = selectOne('prepod', ['id' => $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $topic = $post['id_topic'];
    $publish = $post['status'];
    $iduser = $post['iduser'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post'])) {
    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    $iduser = trim($_POST['iduser']);
    $publish = isset($_POST['publish']) ? 1 : 0;

    if (!empty($_FILES['img']['name'])) {
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\assets\images\\" . $imgName;


        if (strpos($fileType, 'image') === false) {
            array_push($errorMsg, "Подгружаемый файл не является изображением!");
        } else {
            $result = move_uploaded_file($fileTmpName, $destination);

            if ($result) {
                $_POST['img'] = $imgName;
            } else {
                array_push($errorMsg, "Ошибка загрузки изображения на сервер");
            }
        }
    } else {
        array_push($errorMsg, "Ошибка получения картинки");
    }


    if ($title === '' || $content === '' || $topic === '') {
        array_push($errorMsg, "Не все поля заполнены!");
    } elseif (mb_strlen($title, 'UTF8') < 7) {
        array_push($errorMsg, "Название статьи должно быть более 7-ми символов");
    } else {
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $topic,
            'iduser' => $iduser
        ];

        $post = update('prepod', $id, $post);
        header('location: ' . BASE_URL . 'sadmin/zapisi/index.php');
    }
}

// Статус опубликовать или снять с публикации
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])) {
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];

    $postId = update('prepod', $id, ['status' => $publish]);

    header('location: ' . BASE_URL . 'sadmin/zapisi/index.php');
    exit();
}

// Удаление статьи
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('prepod', $id);
    header('location: ' . BASE_URL . 'sadmin/zapisi/index.php');
}