<?php
// FILE: ticket/includes/db.php

// --- ส่วนที่เพิ่มใหม่: การตั้งค่า Environment ---
// เปลี่ยนเป็น 'production' เมื่อนำระบบขึ้นใช้งานจริง
// 'development' = แสดง Error ทุกอย่าง
// 'production' = ไม่แสดง Error แต่จะบันทึกลง Log ของ Server
define('ENVIRONMENT', 'development'); 

if (ENVIRONMENT === 'production') {
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
} else {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}
// ---------------------------------------------

$host = 'localhost';
$dbname = 'ticket_system_db';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // ใน Production จริงๆ จะไม่แสดง Error นี้ แต่จะหยุดการทำงาน
    // และบันทึก Log ตามการตั้งค่าด้านบน
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}