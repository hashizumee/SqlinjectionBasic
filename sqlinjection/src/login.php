<?php
require_once 'config.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // AMAN DARI SQL INJECTION (Prepared Statements)
    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo "<div class='success'>";
            echo "<h2>Login successful!</h2>";
            echo "<p>Welcome <strong>" . htmlspecialchars($user['username']) . "</strong></p>";
            echo "<p>Email: " . htmlspecialchars($user['email']) . "</p>";
            echo "<p>Admin status: " . ($user['is_admin'] ? "Yes" : "No") . "</p>";
            echo "</div>";
        } else {
            $error = "Invalid username or password";
        }
    } catch(PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>

<style>
body {
    font-family: Arial, sans-serif;
    background: #f0f2f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
form {
    background: white;
    padding: 20px 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    width: 300px;
}
form h2 {
    text-align: center;
    margin-bottom: 20px;
}
input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-top: 8px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
}
button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    border: none;
    color: white;
    border-radius: 8px;
    cursor: pointer;
}
button:hover {
    background-color: #0056b3;
}
.error {
    color: red;
    margin-top: 10px;
    text-align: center;
}
.success {
    background: #d4edda;
    color: #155724;
    padding: 15px;
    border-radius: 8px;
    margin-top: 20px;
}
</style>

<form method="POST">
    <h2>Login</h2>
    <label>Username:</label>
    <input type="text" name="username" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <button type="submit">Login</button>
    <?php if ($error) echo "<p class='error'>$error</p>"; ?>
</form>
