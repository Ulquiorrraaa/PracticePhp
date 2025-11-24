<?php
require 'db.php';

// 1. Get ID safely
$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: users_index.php");
    exit;
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // --- SCENARIO A: User typed a NEW password ---
    if (!empty($password)) {

        // VALIDATION: Is it too short?
        if (strlen($password) < 8) {
            // STOP! Set the error.
            // We do NOT redirect here. We let the page reload so they see the error.
            $message = "Error: Password must be at least 8 characters.";
        } 
        else {
            // IT IS VALID: Update Email AND Password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "UPDATE users SET email=:email, password=:pass WHERE id=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'email' => $email,
                'pass' => $hashed_password,
                'id' => $id
            ]);

            // Success! Redirect.
            header("Location: users_index.php");
            exit;
        }

    } 
    // --- SCENARIO B: User left password BLANK (Keep old password) ---
    else {
        // Only update the Email
        $sql = "UPDATE users SET email=:email WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'email' => $email,
            'id' => $id
        ]);

        // Success! Redirect.
        header("Location: users_index.php");
        exit;
    }
}

// --- FETCH USER DATA (To fill the form) ---
$stmt = $pdo->prepare("SELECT * FROM users WHERE id= :id");
$stmt->execute(['id' => $id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header("Location: users_index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>

    <?php if ($message): ?>
        <p style="color: red; font-weight: bold;">
            <?php echo $message; ?>
        </p>
    <?php endif; ?>

    <form method="POST" action="">
        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        <br><br>

        <label>Password:</label><br>
        <input type="password" name="password" placeholder="Leave blank to keep current password">
        <br><br>

        <button type="submit">Update User</button>
        <a href="users_index.php">Cancel</a>
    </form>
</body>
</html>