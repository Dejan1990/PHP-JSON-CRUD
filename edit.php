<?php

include 'users/users.php';

if (!isset($_GET['id'])) {
    include 'partials/not_found.php';
    exit;
}

$userId = $_GET['id'];

$user = getUserById($userId);

if (!$user) {
    include 'partials/not_found.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = updateUser($_POST, $userId);

    if (isset($_FILES['picture'])) {
        uploadImage($_FILES['picture'], $user);
    }
    header('Location: index.php');
}

include 'partials/header.php';

?>

<?php include '_form.php' ?>
