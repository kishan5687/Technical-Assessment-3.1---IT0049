<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New User</title>
</head>
<body>
    <h2>Add New User Account</h2>

    <!-- Display Validation Errors -->
    <?php if (isset($validation)): ?>
        <div style="color: red; margin-bottom: 15px;">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('users/create') ?>" method="post">
        <?= csrf_field() ?>
        
        <p>
            <label>Username:</label><br>
            <input type="text" name="username" value="<?= old('username') ?>">
        </p>
        
        <p>
            <label>Full Name:</label><br>
            <input type="text" name="full_name" value="<?= old('full_name') ?>">
        </p>
        
        <button type="submit">Save User</button>
        <a href="<?= base_url('users') ?>">Cancel</a>
    </form>
</body>
</html>
