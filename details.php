<?php
include "includes/db.php";

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: regions.php");
    exit();
}

$id = intval($_GET["id"]);

$stmt = mysqli_prepare($conn, "SELECT * FROM regions WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$region = mysqli_fetch_assoc($result);

if (!$region) {
    header("Location: regions.php");
    exit();
}

$landmarks = explode(",", $region["landmarks"]);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($region["name"]); ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
</head>
<body>

<nav class="navbar">
    <h2>اكتشف السعودية</h2>
    <ul>
        <li><a href="index.php">الرئيسية</a></li>
        <li><a href="regions.php">معرض المناطق</a></li>
        <li><a href="admin/login.php">لوحة المشرف</a></li>
        <li><button class="mode-btn" onclick="toggleMode()">الوضع الليلي</button></li>
    </ul>
</nav>

<main class="container">
    <section class="details-card">
        <img class="details-cover" src="<?php echo htmlspecialchars($region["main_image"]); ?>" alt="<?php echo htmlspecialchars($region["name"]); ?>">

        <h1 class="page-title"><?php echo htmlspecialchars($region["name"]); ?></h1>
        <p><?php echo nl2br(htmlspecialchars($region["description"])); ?></p>

        <div class="details-section">
            <h3>معلومات تاريخية</h3>
            <p><?php echo nl2br(htmlspecialchars($region["history"])); ?></p>
        </div>

        <div class="details-section">
            <h3>معلومات ثقافية</h3>
            <p><?php echo nl2br(htmlspecialchars($region["culture"])); ?></p>
        </div>

        <div class="details-section">
            <h3>أهم المعالم</h3>
            <ul>
                <?php foreach ($landmarks as $landmark) { ?>
                    <li><?php echo htmlspecialchars($landmark); ?></li>
                <?php } ?>
            </ul>
        </div>

        <h3>معرض الصور</h3>
        <div class="image-row">
            <img src="<?php echo htmlspecialchars($region["image_one"]); ?>" alt="صورة إضافية">
            <img src="<?php echo htmlspecialchars($region["image_two"]); ?>" alt="صورة إضافية">
            <img src="<?php echo htmlspecialchars($region["image_three"]); ?>" alt="صورة إضافية">
        </div>
    </section>
</main>


</body>
</html>
