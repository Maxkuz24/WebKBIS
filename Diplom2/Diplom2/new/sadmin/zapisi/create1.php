<?php
include "../../path.php";
require_once '../../app/database/connect.php';
include SITE_ROOT . "/app/database/db.php";
$id_user = $_POST['id_user'];
$title = $_POST['title'];
$img = $_POST['img'];
$content = $_POST['content'];
$status = $_POST['status'];
$id_topic = $_POST['id_topic'];
$iduser = $_POST['iduser'];

mysqli_query($connect, "INSERT INTO `prepod` (`id`, `id_user`, `title`, `img`, `content`, `status`, `id_topic`, `created_date`, `iduser`)
                                      VALUES (NULL, '1', '$title', '$img', '$content', '1', '1', '2023-05-13', '$iduser')");
header('location: ' . BASE_URL . 'sadmin/zapisi/index.php'); ?>
