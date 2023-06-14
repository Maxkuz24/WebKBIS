<?php
  // session_start();
  //  if (!isset($_SESSION['online']))
  //  {
  //   header('Location:index.php');
  //   exit();
  // }
?>
<?php
include "path.php";
require_once 'app/database/connect.php';
// include SITE_ROOT . "/app/database/db.php";
// require_once 'connect.php';

$id = $_GET['id'];

$sqll = 'SELECT id, id_zapisi FROM bron';
$resultt = mysqli_query($connect, $sqll);
while ($row = mysqli_fetch_array($resultt)) {
    if ($row['id'] === $id){
        $idd = $row['id_zapisi'];
        print($idd);
    }
}
// echo($id);
// header('location: ' . BASE_URL . 'single.php');
// $prod = mysqli_query($connect, "SELECT * FROM `zapisi` WHERE `id` = '$id'");

$sqll = 'SELECT id, kolstud FROM zapisi';
$resultt = mysqli_query($connect, $sqll);
while ($row = mysqli_fetch_array($resultt)) {
    if ($row['id'] === $idd){
        $kolstud = $row['kolstud'];
    }
}
$kolstudd = $kolstud - '1';
// echo($kolstudd);

mysqli_query($connect, "UPDATE `zapisi` SET `kolstud` = '$kolstudd' WHERE `id` = '$idd'");

mysqli_query($connect, "DELETE FROM `bron` WHERE id='$id'");
header('location: ' . BASE_URL . 'single.php');

