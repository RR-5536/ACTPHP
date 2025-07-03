<?php
// FILE: ticket/ajax_mark_read.php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    try {
        // อัปเดตสถานะ is_read ทั้งหมดของผู้ใช้คนนี้ให้เป็น 1
        $stmt = $pdo->prepare("UPDATE notifications SET is_read = 1 WHERE user_id = ? AND is_read = 0");
        $stmt->execute([$user_id]);
        
        // ตอบกลับด้วยสถานะสำเร็จ (สำหรับ JavaScript)
        echo json_encode(['status' => 'success']);
    } catch (Exception $e) {
        // ตอบกลับด้วยสถานะล้มเหลว
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    // ถ้าการร้องขอไม่ถูกต้อง
    http_response_code(403);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}