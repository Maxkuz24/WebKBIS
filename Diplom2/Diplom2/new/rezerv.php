<?php
  session_start();
   // if (!isset($_SESSION['online']))
   // {
   //  header('Location:single.php');
   //  exit();
  // }
?>

<?php
include "path.php";
include "app/database/connect.php";

$iid = $_SESSION['id'];
// echo($iid);
$idd = $_GET['id'];
$products = mysqli_query($connect, "SELECT * FROM `zapisi` WHERE id='$idd'");
$products = mysqli_fetch_all($products);
foreach ($products as $product) {
	// $id_stud = $_SESSION['id'];
	$id = $product[0];
	$name = $product[1];
	$date = $product[2];
	$time = $product[3];
	$prepodawatel = $product[4];
	$kabinet = $product[5];
	$kolstud = $product[6];
	}

// echo($post['id']);
// echo($idd); //iid 71    idd 55
// echo($name);
// echo($date);
// echo($time);
// echo($prepodawatel);
// echo($kabinet);
// echo($kolstud);


// echo('ид записи:');
// echo($idd);   //iid 55
// echo(' ид студ:');
// echo($iid);   //idd 71

$schet = 0;
$resulltt = mysqli_query($connect, "SELECT id_zapisi FROM bron WHERE id_stud=$iid");
while ($roww = mysqli_fetch_array($resulltt)) {
    if ($roww['id_zapisi'] == $idd){
        $schet=$schet + 1;
        // echo($roww['id_zapisi']);
    }
}

// echo(' кол-во:');
// echo($schet);

if ($schet > 0) {
	header('location: ' . BASE_URL . 'single.php');
}
else {
// //ДОБАВЛЯЮ ЗАПИСЬ В БРОНЬ
mysqli_query($connect, "INSERT INTO `bron` (`id`, `name`, `date`, `time`, `prepodawatel`, `kabinet`, `id_stud`, `id_zapisi`)
                                      VALUES (NULL, '$name', '$date', '$time', '$prepodawatel', '$kabinet', '$iid', '$idd')");


$sqll = 'SELECT id, kolstud FROM zapisi';
$resultt = mysqli_query($connect, $sqll);
while ($row = mysqli_fetch_array($resultt)) {
    if ($row['id'] === $idd){
        $kolstud = $row['kolstud'];
    }
}
$kolstudd = $kolstud + '1';
echo($kolstudd);
mysqli_query($connect, "UPDATE `zapisi` SET `kolstud` = '$kolstudd' WHERE `id` = '$idd'");
header('location: ' . BASE_URL . 'single.php');
}
