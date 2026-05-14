<?php
include "includes/db.php";
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>اكتشف السعودية</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
</head>
<body class="home-page">

<nav class="navbar home-navbar">
    <h2>اكتشف السعودية</h2>

    <ul>
        <li><a href="index.php">الرئيسية</a></li>
        <li><a href="regions.php">معرض المناطق</a></li>
        <li><a href="admin/login.php">لوحة المشرف</a></li>
        <li><button class="mode-btn" onclick="toggleMode()">الوضع الليلي</button></li>
    </ul>
</nav>

<header class="home-hero">
    <div class="hero-overlay"></div>

    <div class="home-hero-content">

    <h1>اكتشف المملكة العربية السعودية</h1>

    <h2 class="hero-subtitle">حيث يلتقي التاريخ بالجمال</h2>

    <p class="hero-description">
        مرحبًا بك في المملكة العربية السعودية، وجهة تجمع بين الأصالة والحداثة،
        والطبيعة الساحرة، والتاريخ العريق.
    </p>

    <p class="hero-description second-description">
        استكشف المدن النابضة بالحياة، والمعالم التاريخية، والمناظر الطبيعية الخلابة،
        واستمتع برحلة تعكس جمال السعودية وتنوعها الثقافي الفريد.
    </p>

    <a class="hero-btn" href="regions.php">ابدأ رحلتك الآن </a>
</div>
</header>

<main class="home-content">

    <section class="about-section">
        <div class="about-card">
            <h2>عن المملكة العربية السعودية</h2>
            <p>
                المملكة العربية السعودية هي واحدة من أبرز دول الشرق الأوسط، وتتميز بتاريخها العريق، وتراثها الثقافي الغني، وتنوعها الطبيعي الفريد. تقع المملكة في شبه الجزيرة العربية، وتجمع بين الأصالة والتطور الحديث، مما يجعلها وجهة مميزة للزوار من مختلف أنحاء العالم.
<br>
تحتضن المملكة العديد من المعالم التاريخية والدينية المهمة، ومن أبرزها مكة المكرمة والمدينة المنورة اللتان تمثلان مكانة عظيمة لدى المسلمين حول العالم.
<br>
كما تشتهر السعودية بتنوعها الجغرافي الساحر، حيث تضم الصحارى الواسعة، والجبال الخضراء، والسواحل الجميلة، والمدن الحديثة النابضة بالحياة. ولكل منطقة ثقافتها الخاصة وعاداتها وتقاليدها التي تعكس جمال الهوية السعودية وتنوعها.
            </p>
            <p>
                يهدف هذا الموقع إلى تقديم تجربة عربية منظمة تساعد الزائر على
                استكشاف مناطق المملكة، والتعرّف على معالمها وثقافتها بطريقة
                واضحة وتفاعلية.
            </p>
        </div>
    </section>


  

</main>


</body>
</html>