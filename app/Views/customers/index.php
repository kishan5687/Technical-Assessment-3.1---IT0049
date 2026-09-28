<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Directory</title>
</head>
<body>
    <h2>Customer Accounts Directory</h2>
    
    <!-- Display Flash Messages for Success Alerts -->
    <?php if (session()->getFlashdata('success')): ?>
        <div style="color: green; margin-bottom: 15px;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <p><a href="<?= base_url('customers/new') ?>">+ Add New Customer</a></p>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($customers) && is_array($customers)): ?>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= esc($customer['id']) ?></td>
                        <td><?= esc($customer['full_name']) ?></td>
                        <td><?= esc($customer['email']) ?></td>
                        <td>
                            <!-- Link to the edit form with the row ID -->
                            <a href="<?= base_url('customers/edit/' . $customer['id']) ?>">Edit Account</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align: center;">No customer records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    
    <p><a href="<?= base_url('users') ?>">Go to User Directory</a></p>
</body>
</html>
