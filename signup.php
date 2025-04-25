<?php
require_once 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if ($stmt->execute([$username, $password])) {
        echo "✅ تم التسجيل بنجاح.";
    } else {
        echo "❌ فشل في إنشاء الحساب.";
    }
}
?>
<form method="post">
    <label>اسم المستخدم:</label><input type="text" name="username" required><br>
    <label>كلمة المرور:</label><input type="password" name="password" required><br>
    <button type="submit">تسجيل</button>
</form>
