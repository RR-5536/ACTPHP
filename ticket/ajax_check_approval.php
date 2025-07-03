<?php
// FILE: ticket/ajax_check_approval.php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once 'includes/db.php';

// ตรวจสอบว่าผู้ใช้เป็น Admin หรือไม่
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    try {
        // นับจำนวนผู้ใช้ที่ยังไม่ active
        $stmt = $pdo->query("SELECT COUNT(*) as count, GROUP_CONCAT(username SEPARATOR ', ') as users FROM users WHERE is_active = 0");
        $result = $stmt->fetch();

        // ส่งข้อมูลกลับไปเป็น JSON
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'success',
            'pending_count' => (int)$result['count'],
            'pending_users' => $result['users']
        ]);

    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'success', 'pending_count' => 0]);
}