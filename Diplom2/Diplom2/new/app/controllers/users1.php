<?php
include SITE_ROOT . "/app/database/db.php";

$errorMsg = [];

function userAuth($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    if ($_SESSION['admin'] == 1) {
        header('location: ' . BASE_URL . "sadmin/users/index.php");
    }
    elseif ($_SESSION['admin'] == 2) {
        header('location: ' . BASE_URL . "sadmin/users/index.php");
    }
    else {
        header('location: ' . BASE_URL);
    }
}

$users = selectAll('users');

// Код для формы регистрации
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {

    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if ($login === '' || $email === '' || $passF === '') {
        array_push($errorMsg, "Не все поля заполнены!");
    } elseif (mb_strlen($login, 'UTF8') < 2) {
        array_push($errorMsg, "Логин должен быть более 2-х символов");
    } elseif ($passF !== $passS) {
        array_push($errorMsg, "Пароли в обеих полях должны соответствовать!");
    } else {
        $existence = selectOne('users', ['email' => $email]);
        if ($existence['email'] === $email) {
            array_push($errorMsg, "Пользователь с такой почтой уже зарегистрирован!");
        } else {
            $pass = password_hash($passF, PASSWORD_ARGON2I);
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id]);
            userAuth($user);
        }
    }
} else {
    $login = '';
    $email = '';
}

// Код для формы авторизации
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {

    $email = trim($_POST['mail']);
    $pass = trim($_POST['password']);

    if ($email === '' || $pass === '') {
        array_push($errorMsg, "Не все поля заполнены!");
    } else {
        $existence = selectOne('users', ['email' => $email]);
        if ($existence && password_verify($pass, $existence['password'])) {
            userAuth($existence);
        } else {
            array_push($errorMsg, "Почта либо пароль введены неверно!");
        }
    }
} else {
    $email = '';
}

// Код добавления пользователя в админке
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])) {


    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if ($login === '' || $email === '' || $passF === '') {
        array_push($errorMsg, "Не все поля заполнены!");
    } elseif (mb_strlen($login, 'UTF8') < 2) {
        array_push($errorMsg, "Логин должен быть более 2-х символов");
    } elseif ($passF !== $passS) {
        array_push($errorMsg, "Пароли в обеих полях должны соответствовать!");
    } else {
        $existence = selectOne('users', ['email' => $email]);
        if ($existence['email'] === $email) {
            array_push($errorMsg, "Пользователь с такой почтой уже зарегистрирован!");
        } else {
            $pass = password_hash($passF, PASSWORD_ARGON2I);
            if (isset($_POST['admin']))
                $admin = 1;
            $user = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $user);
            $user = selectOne('users', ['id' => $id]);
            userAuth($user);
        }
    }
} else {
    $login = '';
    $email = '';
}

// Код удаления пользователя в админке
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('users', $id);
    header('location: ' . BASE_URL . 'sadmin/users/index.php');
}

// РЕДАКТИРОВАНИЕ ПОЛЬЗОВАТЕЛЯ ЧЕРЕЗ АДМИНКУ
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])) {
    $user = selectOne('users', ['id' => $_GET['edit_id']]);

    $id = $user['id'];
    $admin = $user['admin'];
    $username = $user['username'];
    $email = $user['email'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])) {

    $id = $_POST['id'];
    $mail = trim($_POST['mail']);
    $login = trim($_POST['login']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);
    $admin = isset($_POST['admin']) ? 1 : 0;

    if ($login === '') {
        array_push($errorMsg, "Не все поля заполнены!");
    } elseif (mb_strlen($login, 'UTF8') < 2) {
        array_push($errorMsg, "Логин должен быть более 2-х символов");
    } elseif ($passF !== $passS) {
        array_push($errorMsg, "Пароли в обеих полях должны соответствовать!");
    } else {
        $pass = password_hash($passF, PASSWORD_ARGON2I);
        if (isset($_POST['admin']))
            $admin = 1;
        $user = [
            'admin' => $admin,
            'username' => $login,
            'password' => $pass
        ];

        $user = update('users', $id, $user);
        header('location: ' . BASE_URL . 'sadmin/users/index.php');
    }
}