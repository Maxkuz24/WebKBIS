<?php
$e_mail = $_SESSION['e_mail'];
// echo($e_mail);
$pp = mysqli_query($connect, "SELECT * FROM `candidates` WHERE e_mail='$e_mail'");
$pp = mysqli_fetch_all($pp);
foreach ($pp as $productss) {
 $id_stud = $productss[0];
 }