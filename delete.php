<?php

include 'users/users.php';

if (!isset($_GET['id'])) {
    include 'partials/not_found.php';
    exit;
}

$userId = $_GET['id'];
deleteUser($userId);

/*
$user = getUserById($userId);

if (!$user) {
    include 'partials/not_found.php';
    exit;
}*/

header('Location: index.php');