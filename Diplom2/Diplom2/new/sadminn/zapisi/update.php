<?php
include "../../path.php";
require_once '../../app/database/connect.php';
include SITE_ROOT . "/app/database/db.php";

$id = $_SESSION['iddd'];
$id_user = $_POST['id_user'];
$title = $_POST['title'];
$img = $_POST['img'];
$content = $_POST['content'];
$status = $_POST['status'];
$id_topic = $_POST['id_topic'];
$iduser = $_POST['iduser'];

mysqli_query($connect, "UPDATE `prepod` SET `title` = '$title', `content` = '$content', `img` = '$img', `iduser` = '$iduser' WHERE `id` = '$id'");

header('location: ' . BASE_URL . 'sadmin/zapisi/index.php'); ?>