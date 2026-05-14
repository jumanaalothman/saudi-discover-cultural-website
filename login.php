<?php
session_start();
include "../includes/db.php";

$error = "";

if (isset($_SESSION["admin_id"])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    $stmt = mysqli_prepare($conn, "SELECT * FROM admins WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $admin = mysqli_fetch_assoc($result);

    if ($admin && password_verify($password, $admin["password"])) {
        $_SESSION["admin_id"] = $admin["id"];
        $_SESSION["admin_username"] = $admin["username"];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "اسم المستخدم أو كلمة المرور غير صحيحة";
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل دخول المشرف</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js"></script>
</head>
<body>

<nav class="navbar">
    <h2>تسجيل دخول المشرف</h2>
    <ul>
        <li><a href="../index.php">الرئيسية</a></li>
        <li><button class="mode-btn" onclick="toggleMode()">الوضع الليلي</button></li>
    </ul>
</nav>

<main class="login-wrapper">
   <form class="form-card" method="POST" action="" onsubmit="return validateLoginForm(this);">
        <h2>تسجيل دخول المشرف</h2>

        <?php if ($error != "") { ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php } ?>

        <label>اسم المستخدم</label>
       <input type="text" name="username">

        <label>كلمة المرور</label>
        <input type="password" name="password">

        <button class="btn" type="submit">دخول</button>
    </form>
</main>

</body>
</html>
