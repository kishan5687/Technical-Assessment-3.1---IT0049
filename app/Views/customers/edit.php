<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Customer</title>
</head>
<body>
    <h2>Edit Customer Account</h2>

    <?php if (isset($validation)): ?>
        <div style="color: red; margin-bottom: 15px;">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('customers/update/' . $customer['id']) ?>" method="post">
        <?= csrf_field() ?>

        <p>
            <label>Full Name:</label><br>
            <input type="text" name="full_name" value="<?= old('full_name', $customer['full_name']) ?>">
        </p>

        <p>
            <label>Email Address:</label><br>
            <input type="text" name="email" value="<?= old('email', $customer['email']) ?>">
        </p>

        <button type="submit">Update Customer</button>
        <a href="<?= base_url('customers') ?>">Cancel</a>
    </form>
</body>
</html>
