<?php
// FILE: ticket/process_create_ticket.php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once 'includes/db.php';
require_once 'includes/functions.php';
check_auth();

if ($_SERVER["REQUEST_METHOD"] != "POST") { header("Location: create_ticket.php"); exit(); }
verify_csrf_token(); // ตรวจสอบ CSRF Token

$user_id = $_SESSION['user_id'];
$title = trim($_POST['title']);
$category_id = $_POST['category_id'];
$description = trim($_POST['description']);

if (empty($title) || empty($category_id) || empty($description)) {
    $_SESSION['error_message'] = "กรุณากรอกข้อมูลที่จำเป็นให้ครบถ้วน";
    header("Location: create_ticket.php");
    exit();
}

try {
    $pdo->beginTransaction();
    $sql = "INSERT INTO tickets (user_id, category_id, title, description, status, created_at, updated_at) VALUES (?, ?, ?, ?, 'new', NOW(), NOW())";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id, $category_id, $title, $description]);
    $ticket_id = $pdo->lastInsertId();

    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $max_file_size = 25 * 1024 * 1024; // 25 MB
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'zip', 'doc', 'docx', 'xls', 'xlsx', 'txt'];
        $file_name = $_FILES['attachment']['name'];
        $file_size = $_FILES['attachment']['size'];
        $file_tmp = $_FILES['attachment']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if ($file_size > $max_file_size) { throw new Exception("ขนาดไฟล์เกิน 25 MB"); }
        if (!in_array($file_ext, $allowed_extensions)) { throw new Exception("ไม่อนุญาตให้อัปโหลดไฟล์ประเภท .$file_ext"); }
        
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) { mkdir($upload_dir, 0755, true); }

        $new_filename = 'ticket_' . $ticket_id . '_' . uniqid() . '.' . $file_ext;
        $target_path = $upload_dir . $new_filename;

        if (move_uploaded_file($file_tmp, $target_path)) {
            $sql_attach = "INSERT INTO ticket_attachments (ticket_id, file_name, file_path) VALUES (?, ?, ?)";
            $stmt_attach = $pdo->prepare($sql_attach);
            $stmt_attach->execute([$ticket_id, basename($file_name), $new_filename]);
        } else { throw new Exception("ไม่สามารถย้ายไฟล์ไปยังโฟลเดอร์ uploads ได้"); }
    }
    $pdo->commit();
    $_SESSION['success_message'] = "สร้างใบแจ้งปัญหาสำเร็จแล้ว! Ticket ID: " . $ticket_id;
    header("Location: my_tickets.php");
    exit();

} catch (Exception $e) {
    $pdo->rollBack();
    $_SESSION['error_message'] = "เกิดข้อผิดพลาด: " . $e->getMessage();
    header("Location: create_ticket.php");
    exit();
}