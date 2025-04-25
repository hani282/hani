<?php
require_once 'db.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->execute([$_POST['username']]);
    $user = $stmt->fetch();
    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.html");
        exit();
    } else {
        echo "❌ بيانات خاطئة.";
    }
}
?>
<form method="post">
    <label>اسم المستخدم:</label><input type="text" name="username" required><br>
    <label>كلمة المرور:</label><input type="password" name="password" required><br>
    <button type="submit">دخول</button>
</form>
