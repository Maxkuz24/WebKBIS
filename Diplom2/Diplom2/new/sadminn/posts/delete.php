<?php
include "../../path.php";
require_once '../../app/database/connect.php';
$id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `zapisi` WHERE `id` = '$id'");

header('location: ' . BASE_URL . 'sadmin/posts/index.php'); ?>