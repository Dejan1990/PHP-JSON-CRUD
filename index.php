<?php

include 'partials/header.php';
include 'users/users.php';

$users = getUsers();

?>
<div class="container mt-5">
    <p>
        <a href="create.php" class="btn btn-success">Create new User</a>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Website</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td>
                        <?php if (isset($user['extension'])) : ?>
                            <img 
                                style="width: 60px;margin: 0px;" 
                                src="<?php echo "users/images/${user['id']}.${user['extension']}" ?>" 
                                alt=""
                            >
                        <?php endif; ?>
                    </td>
                    <td><?php echo $user['name'] ?></td>
                    <td><?php echo $user['username'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['phone'] ?></td>
                    <td>
                        <a target="_blank" href="http://<?php echo $user['website'] ?>">
                            <?php echo $user['website'] ?>
                        </a>
                    </td>
                    <td>
                        <a href="view.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-info">View</a>
                        <a href="edit.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form class="d-inline" action="delete.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include 'partials/footer.php'; ?>