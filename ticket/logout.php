<?php
// FILE: ticket/logout.php

// เริ่มต้น session เพื่อที่จะเข้าถึงและทำลายมันได้
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. ล้างข้อมูลทั้งหมดในตัวแปร $_SESSION
$_SESSION = array();

// 2. ทำลาย session cookie (ถ้ามี)
// วิธีนี้จะช่วยให้มั่นใจว่า session ถูกลบออกจากฝั่งเบราว์เซอร์ด้วย
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 3. ทำลาย session ที่ฝั่งเซิร์ฟเวอร์อย่างสมบูรณ์
session_destroy();

// 4. ไปยังหน้า Login
// ใช้ header Location ตัวพิมพ์ใหญ่ตามมาตรฐาน และ exit() ทันที
header("Location: login.php");
exit();