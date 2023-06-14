<?php
include "../../path.php";
require_once '../../app/database/connect.php';
include SITE_ROOT . "/app/database/db.php";

$id = $_POST['id'];
$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$prepodawatel = $_POST['prepodawatel'];
$kabinet = $_POST['kabinet'];
$kolprepod = $_POST['kolprepod'];

mysqli_query($connect, "UPDATE `zapisi` SET `name` = '$name', `date` = '$date', `time` = '$time', `prepodawatel` = '$prepodawatel', `kabinet` = '$kabinet', `kolprepod` = '$kolprepod' WHERE `id` = '$id'");

header('location: ' . BASE_URL . 'sadmin/posts/index.php'); ?>