<?php
include "../../path.php";
require_once '../../app/database/connect.php';
$id = $_GET['id'];
mysqli_query($connect, "INSERT INTO zapisi select * from closezapisi WHERE id=$id");
mysqli_query($connect, "DELETE FROM `closezapisi` WHERE `id` = '$id'");
mysqli_query($connect, "UPDATE `zapisi` SET `kolstud` = 0 WHERE `id` = '$id'");
// mysqli_query($connect, "DELETE FROM `bron` WHERE `id_zapisi` = '$id'");

header('location: ' . BASE_URL . 'sadmin/posts2/index.php'); ?>