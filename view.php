<?php
require __DIR__. '/users/users.php';

$userId = $_GET['id'];
if(!isset($_GET['id'])){
    echo "Not Found";
    exit;
}

$user = getUserById($userId);
if(!$user){
    echo "Not Found";
    exit;
}

?>

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
    <div class="card-header">
        <h3>
            View User:  <b><?php echo $user['name']?></b>
        </h3>
    </div> 
    <div class="card-body">
        <a href="update.php?id=<?=$user['id']?>">Edit</a>
        <a href="delete.php?id=<?=$user['id']?>">Delete</a>
    </div>

    <table class="table">
        <tbody>
            <tr>
                <th>Id:</th>
                <td><?=$user['id'] ?></td>
            </tr>
            <tr>
                <th>Name:</th>
                <td><?=$user['name'] ?></td>
            </tr>
            <tr>
                <th>Username:</th>
                <td><?=$user['username'] ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?=$user['email'] ?></td>
            </tr>
            <tr>
                <th>Phone:</th>
                <td><?=$user['phone'] ?></td>
            </tr>
            <tr>
                <th>Website:</th>
                <td><?=$user['website'] ?></td>
            </tr>
            <tr>
                <th>Extension:</th>
                <td><?=$user['extension'] ?></td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>
