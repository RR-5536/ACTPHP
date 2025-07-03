<?php
// FILE: ticket/process_register.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'includes/db.php';
require_once 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    verify_csrf_token();
    
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($full_name) || empty($email) || empty($username) || empty($password)) {
        $_SESSION['error_message'] = "กรุณากรอกข้อมูลให้ครบทุกช่อง";
        header('Location: register.php');
        exit();
    }

    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        $_SESSION['error_message'] = "Username นี้มีผู้ใช้งานแล้ว";
        header('Location: register.php');
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // ผู้ใช้ใหม่จะถูกตั้งค่าเป็น is_active = 0 (รออนุมัติ)
    $stmt = $pdo->prepare("INSERT INTO users (full_name, email, username, password, role, is_active) VALUES (?, ?, ?, ?, 'user', 0)");
    
    if ($stmt->execute([$full_name, $email, $username, $hashed_password])) {
        
        // --- ส่วนแจ้งเตือน Admin ---
        $newUserFullName = htmlspecialchars($full_name);
        $message = "มีผู้ใช้ใหม่ '$newUserFullName' สมัครเข้ามาและกำลังรอการอนุมัติ";

        // ดึง ID ของ Admin ทุกคน
        $stmt_admins = $pdo->query("SELECT id FROM users WHERE role = 'admin'");
        $admin_ids = $stmt_admins->fetchAll(PDO::FETCH_COLUMN);

        // สร้าง Notification ให้ Admin ทุกคน
        if (!empty($admin_ids)) {
            $stmt_notify = $pdo->prepare("INSERT INTO notifications (user_id, message) VALUES (?, ?)");
            foreach ($admin_ids as $admin_id) {
                $stmt_notify->execute([$admin_id, $message]);
            }
        }
        // --- จบส่วนแจ้งเตือน ---

        $_SESSION['success_message'] = "สมัครสมาชิกสำเร็จ! กรุณารอผู้ดูแลระบบทำการอนุมัติบัญชีของท่าน";
        header('Location: login.php');
        exit();
    } else {
        $_SESSION['error_message'] = "เกิดข้อผิดพลาดในการสมัครสมาชิก";
        header('Location: register.php');
        exit();
    }
}