<?php
require 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $plain_password = $_POST['password'];

    // 1. Check if Empty
    if (empty($email) || empty($plain_password)) {
        $message = "Please Fill all the Blanks";

    // 2. Check Password Length
    } elseif (strlen($plain_password) < 8) {
        $message = "The password must be at least 8 characters";

    // 3. SUCCESS: Everything is valid!
    } else {
        
        $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO users (email,password) VALUES (:email,:pass)";
            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ':email' => $email,
                'pass' => $hashed_password
            ]);

            header("Location: user_index.php");
            exit;

        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $message = "Error: That email already exists!";
            } else {
                $message = "Database Error: " . $e->getMessage();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new user</title>
</head>

<body>

    <h2>Add new user</h2>

    <?php if ($message): ?>
        <p style="color: red; font-weight: bold;"><?php echo $message; ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <label>Email:</label>
        <br>
        <input type="email" name="email" required>
        <br>
        <br>

        <label>Password:</label>
        <br>
        <input type="password" name="password" required>
        <br>
        <br>

        <button type="submit">Save User</button>
        <a href="user_index.php">cancel</a>
    </form>

</body>
</html>