<?php
// FILE: ticket/process_login.php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once 'includes/db.php';
require_once 'includes/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        if ($user['is_active'] != 1) {
            $_SESSION['error_message'] = "บัญชีของท่านยังไม่ได้รับการอนุมัติ กรุณาติดต่อผู้ดูแลระบบ";
            header("Location: login.php");
            exit();
        }

        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['full_name'] = $user['full_name'];
        $_SESSION['role'] = $user['role'];
        
        generate_csrf_token(); // สร้าง CSRF Token สำหรับ Session นี้
        
        $_SESSION['success_message'] = "เข้าสู่ระบบสำเร็จ!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Username หรือ Password ไม่ถูกต้อง!";
        header("Location: login.php");
        exit();
    }
}
header("Location: login.php");
exit();