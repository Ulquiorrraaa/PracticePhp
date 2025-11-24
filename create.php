<?php
require 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $plain_password = $_POST['password'];

    if (!empty($email) && !empty($plain_password)) {
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
                $message = "Error: That email is already exist!";
            } else {
                $message = "Please fill in all fields";
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
    <title>Add new usert</title>
</head>

<body>

    <h2>Add new user</h2>

    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
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