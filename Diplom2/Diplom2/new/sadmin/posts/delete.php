<?php
include "../../path.php";
require_once '../../app/database/connect.php';
$id = $_GET['id'];
mysqli_query($connect, "INSERT INTO closezapisi select * from zapisi WHERE id=$id");
mysqli_query($connect, "DELETE FROM `zapisi` WHERE `id` = '$id'");
mysqli_query($connect, "DELETE FROM `bron` WHERE `id_zapisi` = '$id'");

header('location: ' . BASE_URL . 'sadmin/posts/index.php'); ?>