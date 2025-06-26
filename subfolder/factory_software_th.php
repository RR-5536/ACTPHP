<?php
$pageTitle = 'โปรแกรมพื้นฐานที่ใช้ในโรงงาน (SAP, Office 365)';
// เนื่องจากไฟล์นี้ย้ายไป subfolder, base path ต้องกลับไป 1 ระดับ
$base_path = '../';
include '../partials/head.php'; // ปรับ path การ include
?>
<body class="text-gray-800">
    <header class="unified-header">
        <div class="unified-header-content">
            <a href="../index.php" class="back-button">← กลับสู่เมนูหลัก</a> <img src="https://media.jobthai.com/v1/images/logo-pic-map/309288_pic_20220902165518.jpeg?type=webp&width=3840&quality=50&blur=1" alt="Archem Logo" class="header-logo">
        </div>
    </header>

    <div class="container mx-auto p-8 bg-white rounded-lg shadow-xl my-10 relative">
        <h1 class="text-4xl font-extrabold text-center text-blue-800 pb-4 border-b-4 border-blue-600 mb-8">
            โปรแกรมพื้นฐานที่ใช้ในโรงงาน (SAP, Office 365)
        </h1>
        <div class="text-center p-10 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 rounded-md shadow-md">
            <i class="fas fa-tools fa-3x mb-4 text-yellow-600"></i>
            <p class="text-2xl font-bold mb-2">ระบบกำลังปรับปรุง</p>
            <p class="text-lg">ขออภัยในความไม่สะดวก เนื้อหาสำหรับหัวข้อนี้กำลังอยู่ในระหว่างการพัฒนาและปรับปรุง</p>
            <p class="text-md mt-4">กรุณากลับมาตรวจสอบอีกครั้งในภายหลัง</p>
        </div>
    </div>

    <?php include '../partials/footer.php'; ?> </body>
</html>