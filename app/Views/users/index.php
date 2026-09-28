<table border="1">
    <thead>
        <tr>
            <th>Avatar</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td>
                <?php if (!empty($user['avatar'])): ?>
                    <img src="<?= base_url('uploads/' . $user['avatar']) ?>" alt="Avatar" width="50" style="border-radius: 50%;">
                <?php else: ?>
                    <img src="<?= base_url('images/placeholder.png') ?>" alt="Default" width="50" style="border-radius: 50%;">
                <?php endif; ?>
            </td>
            <td><?= esc($user['username']) ?></td>
            <td><?= esc($user['full_name']) ?></td>
            <td>
                <a href="<?= base_url('users/edit/' . $user['id']) ?>">Edit</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
