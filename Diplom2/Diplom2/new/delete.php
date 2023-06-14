<?php
include "path.php";
include SITE_ROOT . "/app/database/connect.php";

$id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `zapisi` WHERE `id` = '$id'");

header('Location: ../admin/posts/index.php');