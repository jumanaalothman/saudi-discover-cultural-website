<?php
include "../includes/admin_auth.php";
include "../includes/db.php";

$error = "";
$name = "";
$category = "";
$short_description = "";
$description = "";
$history = "";
$culture = "";
$landmarks = "";
$main_image = "";
$image_one = "";
$image_two = "";
$image_three = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $category = trim($_POST["category"]);
    $short_description = trim($_POST["short_description"]);
    $description = trim($_POST["description"]);
    $history = trim($_POST["history"]);
    $culture = trim($_POST["culture"]);
    $landmarks = trim($_POST["landmarks"]);
    $main_image = trim($_POST["main_image"]);
    $image_one = trim($_POST["image_one"]);
    $image_two = trim($_POST["image_two"]);
    $image_three = trim($_POST["image_three"]);

    if (
        empty($name) || empty($category) || empty($short_description) ||
        empty($description) || empty($history) || empty($culture) ||
        empty($landmarks) || empty($main_image) || empty($image_one) ||
        empty($image_two) || empty($image_three)
    ) {
        $error = "يرجى تعبئة جميع الحقول.";
    } else {
        $sql = "INSERT INTO regions
                (name, category, short_description, description, history, culture, landmarks, main_image, image_one, image_two, image_three)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param(
                $stmt,
                "sssssssssss",
                $name,
                $category,
                $short_description,
                $description,
                $history,
                $culture,
                $landmarks,
                $main_image,
                $image_one,
                $image_two,
                $image_three
            );

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                header("Location: dashboard.php?msg=added");
                exit();
            } else {
                $error = "حدث خطأ أثناء إضافة المحتوى.";
            }

            mysqli_stmt_close($stmt);
        } else {
            $error = "تعذر تجهيز الاستعلام.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة محتوى</title>
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
    <form class="form-card" method="POST" action="" onsubmit="return validateContentForm(this);">
        <h1 class="page-title">إضافة محتوى جديد</h1>

        <?php if (!empty($error)) : ?>
            <p class="error-message"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <label>اسم المنطقة أو المكان</label>
       <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">

        <label>التصنيف</label>
        <select name="category">
            <option value="">اختر التصنيف</option>
            <?php
            $categories = ["مدينة", "دينية", "تراثية", "طبيعية", "ساحلية"];
            foreach ($categories as $cat) {
                $selected = ($category == $cat) ? "selected" : "";
                echo "<option value='$cat' $selected>$cat</option>";
            }
            ?>
        </select>

        <label>وصف مختصر</label>
        <input type="text" name="short_description" value="<?php echo htmlspecialchars($short_description); ?>">

        <label>الوصف العام</label>
      <textarea name="description"><?php echo htmlspecialchars($description); ?></textarea>

        <label>معلومات تاريخية</label>
<textarea name="history"><?php echo htmlspecialchars($history); ?></textarea>

<label>معلومات ثقافية</label>
<textarea name="culture"><?php echo htmlspecialchars($culture); ?></textarea>

        <label>أهم المعالم - افصل بينها بفواصل</label>
        <input type="text" name="landmarks" value="<?php echo htmlspecialchars($landmarks); ?>">

        <label>رابط الصورة الرئيسية</label>
<input type="text" name="main_image" value="<?php echo htmlspecialchars($main_image); ?>">

        <label>رابط الصورة الإضافية الأولى</label>
<input type="text" name="image_one" value="<?php echo htmlspecialchars($image_one); ?>">

        <label>رابط الصورة الإضافية الثانية</label>
<input type="text" name="image_two" value="<?php echo htmlspecialchars($image_two); ?>">
        
        <label>رابط الصورة الإضافية الثالثة</label>
<input type="text" name="image_three" value="<?php echo htmlspecialchars($image_three); ?>">
        
        <button class="btn" type="submit">إضافة المحتوى</button>
    </form>
</main>

</body>
</html>