<form method="POST" enctype="multipart/form-data" action="">
    <div class="form-group">
        <label>ID</label>
        <input name="id" value="<?php echo $user['id'] ?>"
                class="form-control">
    </div>
    <div class="form-group">
        <label>Name</label>
        <input name="name" value="<?php echo $user['name'] ?>"
                class="form-control">
    </div>
    <div class="form-group">
        <label>Username</label>
        <input name="username" value="<?php echo $user['username'] ?>"
                class="form-control">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input name="email" value="<?php echo $user['email'] ?>"
                class="form-control">
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input name="phone" value="<?php echo $user['phone'] ?>"
                class="form-control">
    </div>
    <div class="form-group">
        <label>Website</label>
        <input name="website" value="<?php echo $user['website'] ?>"
                class="form-control">
    </div>
    <div class="form-group">
        <label>Extension</label>
        <input name="extension" value="<?php echo $user['extension'] ?>"
                class="form-control">
    </div>
    <div class="form-group">
        <label>Image</label>
        <input name="picture" type="file" class="form-control-file">
    </div>

    <button class="btn btn-success">Submit</button>
</form>