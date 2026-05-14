<?php
include "../includes/admin_auth.php";
include "../includes/db.php";

$message = "";

if (isset($_GET["msg"])) {
    if ($_GET["msg"] == "added") {
        $message = "تمت إضافة المحتوى بنجاح";
    } elseif ($_GET["msg"] == "updated") {
        $message = "تم تحديث المحتوى بنجاح";
    } elseif ($_GET["msg"] == "deleted") {
        $message = "تم حذف المحتوى بنجاح";
    }
}

$result = mysqli_query($conn, "SELECT * FROM regions ORDER BY id DESC");

if (!$result) {
    die("حدث خطأ أثناء جلب البيانات.");
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js"></script>
</head>
<body>

<nav class="navbar">
    <h2>لوحة المشرف</h2>
    <ul>
        <li><a href="../index.php">زيارة الموقع</a></li>
        <li><a href="dashboard.php">لوحة التحكم</a></li>
        <li><a href="add.php">إضافة محتوى</a></li>
        <li><button class="mode-btn" type="button" onclick="toggleMode()">الوضع الليلي</button></li>
        <li><a class="logout-btn" href="logout.php">تسجيل الخروج</a></li>
    </ul>
</nav>

<main class="container">
    <?php if ($message != "") { ?>
        <div class="success-message"><?php echo htmlspecialchars($message); ?></div>
    <?php } ?>

    <div class="admin-actions">
        <div>
            <h1 class="page-title">إدارة المحتوى</h1>
            <p>يمكنكِ من هنا عرض جميع المناطق والأماكن، تعديلها، حذفها، أو إضافة محتوى جديد.</p>
        </div>
        <a class="btn" href="add.php">إضافة محتوى جديد</a>
    </div>

    <section class="table-card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>المنطقة</th>
                    <th>التصنيف</th>
                    <th>الوصف المختصر</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo htmlspecialchars($row["name"]); ?></td>
                        <td><?php echo htmlspecialchars($row["category"]); ?></td>
                        <td><?php echo htmlspecialchars($row["short_description"]); ?></td>
                        <td>
                            <a class="btn-small edit-btn" href="edit.php?id=<?php echo $row["id"]; ?>">تعديل</a>
                            <a class="btn-small delete-btn" onclick="return confirmDelete();" href="delete.php?id=<?php echo $row["id"]; ?>">حذف</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</main>

</body>
</html>