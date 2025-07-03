<?php
// FILE: ticket/process_reply.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'includes/db.php';
require_once 'includes/functions.php';
check_auth();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}
verify_csrf_token();

$ticket_id = $_POST['ticket_id'];
$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];
$message = trim($_POST['message'] ?? '');
$is_internal_note = (isset($_POST['is_internal_note']) && $role != 'user') ? 1 : 0;
$action = $_POST['action'] ?? '';

if (empty($message) && empty($_FILES['attachments']['name'][0]) && empty($action)) {
    $_SESSION['error_message'] = "กรุณาพิมพ์ข้อความหรือแนบไฟล์อย่างน้อย 1 อย่าง";
    $redirect_url = ($role == 'user') ? "view_ticket.php?id=$ticket_id" : "admin/view_ticket.php?id=$ticket_id";
    header("Location: $redirect_url");
    exit();
}

try {
    $pdo->beginTransaction();

    $stmt = $pdo->prepare("SELECT * FROM tickets WHERE id = ?");
    $stmt->execute([$ticket_id]);
    $ticket = $stmt->fetch();
    if (!$ticket || ($role == 'user' && $ticket['user_id'] != $user_id)) {
        throw new Exception("ไม่พบ Ticket หรือคุณไม่มีสิทธิ์");
    }

    $reply_id = null;

    if (!empty($message)) {
        $stmt_reply = $pdo->prepare("INSERT INTO ticket_replies (ticket_id, user_id, message, is_internal_note) VALUES (?, ?, ?, ?)");
        $stmt_reply->execute([$ticket_id, $user_id, $message, $is_internal_note]);
        $reply_id = $pdo->lastInsertId();
    }

    if (isset($_FILES['attachments']) && !empty($_FILES['attachments']['name'][0])) {
        if (is_null($reply_id)) {
            $system_message = "(แนบไฟล์)";
            $stmt_reply = $pdo->prepare("INSERT INTO ticket_replies (ticket_id, user_id, message, is_internal_note) VALUES (?, ?, ?, ?)");
            $stmt_reply->execute([$ticket_id, $user_id, $system_message, $is_internal_note]);
            $reply_id = $pdo->lastInsertId();
        }

        $max_file_size = 25 * 1024 * 1024;
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'zip', 'doc', 'docx', 'xls', 'xlsx', 'txt'];
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true);

        foreach ($_FILES['attachments']['name'] as $key => $name) {
            if ($_FILES['attachments']['error'][$key] == 0) {
                $file_size = $_FILES['attachments']['size'][$key];
                $file_tmp = $_FILES['attachments']['tmp_name'][$key];
                $file_ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

                if ($file_size > $max_file_size) { throw new Exception("ขนาดไฟล์ '" . htmlspecialchars($name) . "' เกิน 25 MB"); }
                if (!in_array($file_ext, $allowed_extensions)) { throw new Exception("ไม่อนุญาตให้อัปโหลดไฟล์ประเภท .$file_ext"); }
                
                $new_filename = 'reply_' . $reply_id . '_' . uniqid() . '.' . $file_ext;
                $target_path = $upload_dir . $new_filename;

                if (move_uploaded_file($file_tmp, $target_path)) {
                    $sql_attach = "INSERT INTO reply_attachments (reply_id, file_name, file_path) VALUES (?, ?, ?)";
                    $stmt_attach = $pdo->prepare($sql_attach);
                    $stmt_attach->execute([$reply_id, basename($name), $new_filename]);
                } else {
                    throw new Exception("ไม่สามารถอัปโหลดไฟล์: " . htmlspecialchars($name));
                }
            }
        }
    }

    if (!is_null($reply_id)) {
        // --- ส่วนสร้าง Notification ---
        if (!$is_internal_note) { // ไม่ต้องแจ้งเตือนถ้าเป็น Internal Note
            $sender_name = htmlspecialchars($_SESSION['full_name']);
            $message_text = "คุณ $sender_name ได้ตอบกลับในใบงาน #$ticket_id";
            
            $recipient_id = null;
            if ($role !== 'user') { // ถ้าคนตอบคือ Staff/Admin -> แจ้งเตือน User เจ้าของใบงาน
                $recipient_id = $ticket['user_id'];
            } else if ($role === 'user' && !empty($ticket['assigned_to'])) { // ถ้าคนตอบคือ User -> แจ้งเตือน Staff ที่รับผิดชอบ
                $recipient_id = $ticket['assigned_to'];
            }

            if ($recipient_id && $recipient_id != $_SESSION['user_id']) {
                $stmt_notify = $pdo->prepare("INSERT INTO notifications (user_id, ticket_id, message) VALUES (?, ?, ?)");
                $stmt_notify->execute([$recipient_id, $ticket_id, $message_text]);
            }
        }
        // --- จบส่วนสร้าง Notification ---

        if ($role != 'user' && $ticket['status'] == 'new') {
            $stmt_update = $pdo->prepare("UPDATE tickets SET status = 'in_progress', assigned_to = ?, updated_at = NOW() WHERE id = ?");
            $assignee = $ticket['assigned_to'] ?? $user_id;
            $stmt_update->execute([$assignee, $ticket_id]);
        } else {
            $stmt_update = $pdo->prepare("UPDATE tickets SET updated_at = NOW() WHERE id = ?");
            $stmt_update->execute([$ticket_id]);
        }
        if (empty($action)) {
             $_SESSION['success_message'] = "ส่งข้อความตอบกลับเรียบร้อยแล้ว";
        }
    }

    if ($action === 'close_ticket' && $role === 'user' && $ticket['user_id'] == $user_id) {
        $stmt_update = $pdo->prepare("UPDATE tickets SET status = 'closed', updated_at = NOW() WHERE id = ?");
        $stmt_update->execute([$ticket_id]);
        $_SESSION['success_message'] = "Ticket #$ticket_id ได้ถูกปิดแล้ว";
    }

    $pdo->commit();
} catch (Exception $e) {
    $pdo->rollBack();
    $_SESSION['error_message'] = "เกิดข้อผิดพลาด: " . $e->getMessage();
}

$redirect_url = ($role == 'user') ? "view_ticket.php?id=$ticket_id" : "admin/view_ticket.php?id=$ticket_id";
header("Location: $redirect_url");
exit();