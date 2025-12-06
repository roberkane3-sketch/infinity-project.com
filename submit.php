<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $skills = isset($_POST['skills']) ? $_POST['skills'] : [];

    // حفظ البيانات في ملف CSV
    $file = fopen("submissions.csv", "a");
    fputcsv($file, [$name, $email, implode(", ", $skills)]);
    fclose($file);

    // بعد الحفظ → تحويل لصفحة terms.html
    header("Location: terms.html");
    exit();
} else {
    echo "Invalid request!";
}
?>