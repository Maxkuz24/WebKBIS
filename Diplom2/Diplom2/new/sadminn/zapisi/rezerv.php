<?php
  session_start();
   if (!isset($_SESSION['online']))
   {
    header('Location:index.php');
    exit();
  }

?>
<?php

require_once 'connect.php';

$id = $_GET['id'];
$_SESSION['id']=$_GET['id'];
$products = mysqli_query($connect, "SELECT * FROM `zapisi` WHERE id='$id'");
$products = mysqli_fetch_all($products);
foreach ($products as $product) {
	$id_stud = 28;
	// $id_stud = $product[0];
	$name = $product[1];
	$date = $product[2];
	$time = $product[3];
	$prepodawatel = $product[4];
	$kabinet = $product[5];
	$kolstud = $product[6];
	}


include ('func.php');
// echo($id_stud);

// $e_mail = $_SESSION['email']
// $produc = mysqli_query($connect, "SELECT * FROM `candidates` WHERE e_mail='$e_mail'");
// $produc = mysqli_fetch_all($produc);
// foreach ($produc as $product) {
// 	$id_stud = $product[0];
// 	}


//проверка на повторение бронирования

$connection = @new mysqli($host,$db_user,$db_password,$db_name);
  if($connection->connect_errno!=0)
  {
  throw new Exception(mysqli_connect_errno());
   }

$result=$connection->query("SELECT id_stud FROM bron WHERE id='$id'");
if (!$result) throw new Exception($connection->error);
$how_many_mails=$result->num_rows;
  if ($how_many_mails>0) {
     header('Location: /list21.php');
   }
   else{
   	mysqli_query($connect,"INSERT INTO `bron` VALUES ('$id', '$name', '$date', '$time', '$prepodawatel', '$kabinet', '$id_stud')");
   	$kolstud = $kolstud + 1;
   	mysqli_query($connect, "UPDATE `zapisi` SET `kolstud` = '$kolstud' WHERE `id` = '$id'");
   	header('Location: /list21.php');
   }
