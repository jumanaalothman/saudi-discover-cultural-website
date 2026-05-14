<?php
include "../includes/admin_auth.php";
include "../includes/db.php";

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: dashboard.php");
    exit();
}

$id = intval($_GET["id"]);

$stmt = mysqli_prepare($conn, "DELETE FROM regions WHERE id = ?");

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header("Location: dashboard.php?msg=deleted");
            exit();
        } else {
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header("Location: dashboard.php");
            exit();
        }
    } else {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        die("حدث خطأ أثناء حذف المحتوى.");
    }
} else {
    mysqli_close($conn);
    die("تعذر تجهيز استعلام الحذف.");
}
?>