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

    updateUser($_POST, $userId);

    if (isset($_FILES['picture'])) {
        if (!is_dir(__DIR__ . "/images")) {
            mkdir(__DIR__ . "/images");
        }
        //Get the file extension from the file
        $fileName = $_FILES['picture']['name'];
        //Search for the dot in the file 
        $dotPosition = strpos($fileName, '.');
        //Take the substring from the dot position till the end of the string 
        $extension = substr($fileName, $dotPosition + 1);
        move_uploaded_file($_FILES['picture']['tmp_name'], __DIR__ . "/images/$userId.$extension");

        $user['extension'] = $extension;
        updateUser($user, $userId);
    }
    header('Location: index.php');
}

include 'partials/header.php';
?>

<div class="container">
<div class="card">
    <div class="card-header">
        <h3>Update user: <?php echo $user['name'] ?></h3>
    </div>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
            <!--    Hidden field for saving id and submitting it to determine if we need to create user or updated it-->
            <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
            <div class="form-group">
                <label>Name</label>
                <input name="name" value="<?php echo $user['name'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input name="username" value="<?php echo $user['username'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="email" value="<?php echo $user['email'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input name="phone" value="<?php echo $user['phone'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Website</label>
                <input name="website" value="<?php echo $user['website'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input name="picture" type="file" class="form-control-file">
            </div>

            <button class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
</div>