<?php
include "includes/db.php";

$sql = "SELECT * FROM regions ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

$category_sql = "SELECT DISTINCT category FROM regions ORDER BY category";
$category_result = mysqli_query($conn, $category_sql);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>معرض المناطق</title>
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
    <h1 class="page-title">معرض المناطق</h1>
    <p>اختر نوع المنطقة أو المكان، ثم اضغط على البطاقة لعرض التفاصيل.</p>

    <div class="filters">
        <button class="filter-btn active-filter" data-filter="all" onclick="filterRegions('all')">الكل</button>
        <?php while ($cat = mysqli_fetch_assoc($category_result)) { ?>
            <button class="filter-btn" data-filter="<?php echo htmlspecialchars($cat['category']); ?>" onclick="filterRegions('<?php echo htmlspecialchars($cat['category']); ?>')">
                <?php echo htmlspecialchars($cat['category']); ?>
            </button>
        <?php } ?>
    </div>

    <section class="gallery">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <a class="region-card" data-category="<?php echo htmlspecialchars($row['category']); ?>" href="details.php?id=<?php echo $row['id']; ?>">
                <img src="<?php echo htmlspecialchars($row['main_image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
                <div class="region-content">
                    <small><?php echo htmlspecialchars($row['category']); ?></small>
                    <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                    <p><?php echo htmlspecialchars($row['short_description']); ?></p>
                </div>
            </a>
        <?php } ?>
    </section>
</main>



</body>
</html>
