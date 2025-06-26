<?php
// กำหนด title เริ่มต้นหากไม่มีการตั้งค่าจากหน้าอื่น
if (!isset($pageTitle)) {
    $pageTitle = 'ระบบ E-Learning IT สำหรับพนักงาน';
}
// กำหนด base path เริ่มต้นถ้ายังไม่มีการตั้งค่า
if (!isset($base_path)) {
    $base_path = './';
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    
    <!-- ตั้งค่า Base URL เพื่อให้ลิงก์ CSS ทำงานถูกที่ -->
    <base href="<?php echo $base_path; ?>">

    <!-- CSS and Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- ตอนนี้ path "style.css" จะถูกอ้างอิงจาก base href ที่เราตั้งค่า -->
    <link rel="stylesheet" href="style.css">
    
    <!-- Tailwind CSS (สำหรับหน้า Security Education) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Style for Security Pages (ถ้าต้องการแยก) -->
    <?php if (strpos($_SERVER['REQUEST_URI'], 'eduth') !== false || strpos($_SERVER['REQUEST_URI'], 'edueng') !== false): ?>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            line-height: 1.6;
            color: #333;
        }
        ul.list-none li {
            padding-left: 25px;
            position: relative;
        }
        ul.list-none li::before {
            content: "\f058";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            color: #27ae60;
            position: absolute;
            left: 0;
            top: 3px;
        }
    </style>
    <?php endif; ?>
</head>
<body>