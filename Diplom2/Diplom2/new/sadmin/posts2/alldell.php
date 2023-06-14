<?php
include "../../path.php";
require_once '../../app/database/connect.php';

mysqli_query($connect, "DELETE FROM `closezapisi`");

header('location: ' . BASE_URL . 'sadmin/posts2/index.php'); ?>