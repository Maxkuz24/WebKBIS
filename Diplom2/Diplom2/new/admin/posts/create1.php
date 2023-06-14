<?php
include "../../path.php";
require_once '../../app/database/connect.php';
include SITE_ROOT . "/app/database/db.php";
$id = $_POST['id'];
$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$time .= "-";
$time .= $_POST['timedead'];
$prepodawatel = $_POST['prepodawatel'];
$kabinet = $_POST['kabinet'];
$kolprepod = $_POST['kolprepod'];

$sql = 'SELECT id, name FROM topics';
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($result)) {
    if ($row['id'] === $name) {
        $name = $row['name'];
        print($name);
    }
}

$sqll = 'SELECT id, title FROM prepod';
$resultt = mysqli_query($connect, $sqll);
while ($row = mysqli_fetch_array($resultt)) {
    if ($row['id'] === $prepodawatel) {
        $prepodawatel = $row['title'];
        print($prepodawatel);
    }
}

// mysqli_query($connect, "INSERT INTO `zapisi` (`id`, `name`, `date`, `time`, `prepodawatel`, `kabinet`, `kolstud`, `kolprepod`)
//                                       VALUES (NULL, '$name', '$date', '$time', '$prepodawatel', '$kabinet', '0', '$kolprepod')");
header('location: ' . BASE_URL . 'sadmin/posts/index.php'); ?>
<?php
include "../../path.php";
require_once '../../app/database/connect.php';
// include SITE_ROOT . "/app/database/db.php";
$id = $_POST['id'];
$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$prepodawatel = $_POST['prepodawatel'];
$kabinet = $_POST['kabinet'];
$kolprepod = $_POST['kolprepod'];

$sql = 'SELECT id, name FROM topics';
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($result)) {
    if ($row['id'] === $name) {
        $name = $row['name'];
        print($name);
    }
}

$sqll = 'SELECT id, title FROM prepod';
$resultt = mysqli_query($connect, $sqll);
while ($row = mysqli_fetch_array($resultt)) {
    if ($row['id'] === $prepodawatel) {
        $prepodawatel = $row['title'];
        print($prepodawatel);
    }
}

mysqli_query($connect, "INSERT INTO `zapisi` (`id`, `name`, `date`, `time`, `prepodawatel`, `kabinet`, `kolstud`, `kolprepod`)
                                      VALUES (NULL, '$name', '$date', '$time', '$prepodawatel', '$kabinet', '0', '$kolprepod')");
header('location: ' . BASE_URL . 'admin/posts/index.php'); ?>