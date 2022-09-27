<?php
require 'users.php';

$userId = $_GET['id'];

$user = getUserById($userId);


?>

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

