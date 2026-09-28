<h2>Edit User Account</h2>

<?php if (isset($validation)): ?>
    <div style="color: red;"><?= $validation->listErrors() ?></div>
<?php endif; ?>

<form action="<?= base_url('users/update/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <p>
        <label>Username:</label><br>
        <input type="text" name="username" value="<?= old('username', $user['username']) ?>">
    </p>
    <p>
        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="<?= old('full_name', $user['full_name']) ?>">
    </p>
    <p>
        <label>Profile Picture:</label><br>
        <?php if (!empty($user['avatar'])): ?>
            <img src="<?= base_url('uploads/' . $user['avatar']) ?>" width="50"><br>
        <?php endif; ?>
        <input type="file" name="avatar">
    </p>
    <button type="submit">Update Account</button>
</form>
