<?php
    require __DIR__. '/users/users.php';
    $users = getUser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    
<div class="container" style="width:1000px;">  

    <a class="btn btn-success" href="create.php">Create New User</a>

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Website</th>
                    <th scope="col">Extension</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $user['id']; ?></td>
                        <td>
                            <?php if(isset($user['extension'])): ?>
                                <img width="100px" src="<?php echo "users/images/${user['id']}.${user['extension']}" ?>" alt="">
                            <?php endif; ?>
                        </td>
                        <td><?= $user['name']; ?></td>
                        <td><?= $user['username']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['phone']; ?></td>
                        <td><?= $user['website']; ?></td>
                        <td><?= $user['extension']; ?></td>
                        <td>
                            <a class="btn btn-sm btn-outline-info" href="view.php?id=<?=$user['id']?>">View</a>
                            <a class="btn btn-secondary" href="update.php?id=<?=$user['id']?>">Edit</a>
                            <form method="POST" action="delete.php">
                                <input type="hidden" name="id" value="<?=$user['id'] ?>">
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach;; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>