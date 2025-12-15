<?php
require 'db.php';

$sql = "SELECT id, email, created_at FROM users";

$stmt =  $pdo->query($sql);

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn { padding: 5px 10px; text-decoration: none; color: white; border-radius: 4px; }
        .btn-edit { background-color: #28a745; }
        .btn-delete { background-color: #dc3545; }
    </style>
</head>
<body>

    <h2>User Management</h2>
    <a href="create.php" class="btn" style="background-color: #007bff;">+ Add New User</a>
    <br><br>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Joined Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo $user['created_at']; ?></td>
                    <td>
                        <a href="user_edit.php?id=<?php echo $user['id']; ?>" class="btn btn-edit">Edit</a>
                        <a href="user_delete.php?id=<?php echo $user['id']; ?>" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            
            <?php if (count($users) === 0): ?>
                <tr>
                    <td colspan="4" style="text-align:center;">No users found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>