<h2>Add New Customer</h2>

<?php if (isset($validation)): ?>
    <div style="color: red;"><?= $validation->listErrors() ?></div>
<?php endif; ?>

<form action="<?= base_url('customers/create') ?>" method="post">
    <?= csrf_field() ?>
    <p>
        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="<?= old('full_name') ?>">
    </p>
    <p>
        <label>Email:</label><br>
        <input type="text" name="email" value="<?= old('email') ?>">
    </p>
    <button type="submit">Save</button>
</form>
