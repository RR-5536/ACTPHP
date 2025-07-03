<?php
// FILE: ticket/view_ticket.php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once 'includes/db.php';
require_once 'includes/functions.php';
check_auth();

$ticket_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($ticket_id === 0) { header('Location: my_tickets.php'); exit(); }

$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['role'];

// --- ดึงข้อมูล ---
$sql = "SELECT t.*, c.name as category_name, u.full_name as user_name FROM tickets t JOIN categories c ON t.category_id = c.id JOIN users u ON t.user_id = u.id WHERE t.id = ?";
if ($user_role == 'user') { $sql .= " AND t.user_id = ?"; $stmt = $pdo->prepare($sql); $stmt->execute([$ticket_id, $user_id]); } 
else { $stmt = $pdo->prepare($sql); $stmt->execute([$ticket_id]); }
$ticket = $stmt->fetch();

if (!$ticket) { $_SESSION['error_message'] = "ไม่พบ Ticket หรือคุณไม่มีสิทธิ์เข้าถึง"; header('Location: my_tickets.php'); exit(); }

$stmt_files = $pdo->prepare("SELECT * FROM ticket_attachments WHERE ticket_id = ?"); $stmt_files->execute([$ticket_id]); $attachments = $stmt_files->fetchAll();
$stmt_replies = $pdo->prepare("SELECT r.*, u.full_name, u.role FROM ticket_replies r JOIN users u ON r.user_id = u.id WHERE r.ticket_id = ? AND r.is_internal_note = 0 ORDER BY r.created_at ASC");
$stmt_replies->execute([$ticket_id]); $replies = $stmt_replies->fetchAll();
$reply_attachments = [];
if (!empty($replies)) {
    $reply_ids = array_column($replies, 'id'); $placeholders = implode(',', array_fill(0, count($reply_ids), '?'));
    $stmt_reply_files = $pdo->prepare("SELECT * FROM reply_attachments WHERE reply_id IN ($placeholders)"); $stmt_reply_files->execute($reply_ids);
    $files_data = $stmt_reply_files->fetchAll(); foreach($files_data as $file) { $reply_attachments[$file['reply_id']][] = $file; }
}

require 'includes/header.php';
?>

<div class="d-flex justify-content-between align-items-center"><h2><i class="bi bi-ticket-detailed"></i> รายละเอียดใบงาน #<?= htmlspecialchars($ticket['id']) ?></h2><a href="<?= $user_role == 'user' ? 'my_tickets.php' : 'admin/index.php' ?>" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> กลับไปรายการ</a></div><hr>
<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header"><strong>รายละเอียดปัญหา</strong></div>
            <div class="card-body">
                <p><?= nl2br(htmlspecialchars($ticket['description'])) ?></p>
                <?php if (!empty($attachments)): ?>
                    <hr><h6><i class="bi bi-paperclip"></i> ไฟล์แนบเริ่มต้น:</h6><ul>
                        <?php foreach ($attachments as $file): ?><li><a href="/ticket/uploads/<?= htmlspecialchars($file['file_path']) ?>" target="_blank"><?= htmlspecialchars($file['file_name']) ?></a></li><?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
        <h4 class="mb-3"><i class="bi bi-chat-dots"></i> การสนทนา</h4>
        <?php if (empty($replies)): ?><p class="text-center text-muted">ยังไม่มีการตอบกลับ</p><?php endif; ?>
        <?php foreach ($replies as $reply): ?>
        <div class="card mb-3 card-reply <?= ($reply['user_id'] == $ticket['user_id']) ? 'card-reply-user' : 'card-reply-staff' ?>">
            <div class="card-body">
                <p class="mb-1"><?= nl2br(htmlspecialchars($reply['message'])) ?></p>
                <?php if (isset($reply_attachments[$reply['id']])): ?>
                <div class="reply-attachment-gallery row g-2">
                    <?php foreach ($reply_attachments[$reply['id']] as $file): ?>
                        <div class="col-auto">
                            <a href="/ticket/uploads/<?= htmlspecialchars($file['file_path']) ?>" data-lightbox="reply-images-<?= $reply['id'] ?>" data-title="<?= htmlspecialchars($file['file_name']) ?>">
                                <img src="/ticket/uploads/<?= htmlspecialchars($file['file_path']) ?>" class="reply-attachment-thumb">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <small class="text-muted d-block mt-2">โดย: <strong><?= htmlspecialchars($reply['full_name']) ?></strong> เมื่อ: <?= date('d/m/Y H:i', strtotime($reply['created_at'])) ?></small>
            </div>
        </div>
        <?php endforeach; ?>
        <div class="card mt-4">
            <div class="card-header"><h5><i class="bi bi-reply-fill"></i> ตอบกลับ</h5></div>
            <div class="card-body">
                <form action="process_reply.php" method="POST" enctype="multipart/form-data">
                    <?= csrf_input_field() ?>
                    <input type="hidden" name="ticket_id" value="<?= $ticket['id'] ?>">
                    <div class="mb-3"><textarea class="form-control" name="message" rows="4" placeholder="พิมพ์ข้อความของคุณที่นี่..."></textarea></div>
                    <div class="mb-3"><label for="attachments" class="form-label">แนบไฟล์ (สามารถเลือกได้หลายไฟล์)</label><input class="form-control" type="file" name="attachments[]" id="attachments" multiple></div>
                    <button type="submit" class="btn btn-primary">ส่งข้อความ</button>
                    <?php if ($ticket['status'] != 'closed' && $user_id == $ticket['user_id']): ?>
                        <button type="submit" name="action" value="close_ticket" class="btn btn-success float-end"><i class="bi bi-check-circle"></i> ปิดงาน (แก้ไขปัญหาแล้ว)</button>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header"><strong>ข้อมูลใบงาน</strong></div>
            <div class="card-body">
                <p><strong>หัวข้อ:</strong> <?= htmlspecialchars($ticket['title']) ?></p>
                <p><strong>ผู้แจ้ง:</strong> <?= htmlspecialchars($ticket['user_name']) ?></p>
                <p><strong>ประเภท:</strong><br><?= htmlspecialchars($ticket['category_name']) ?></p>
                <p><strong>สถานะ:</strong> <?= getStatusBadge($ticket['status']) ?></p>
                <p><strong>วันที่แจ้ง:</strong> <?= date('d/m/Y H:i', strtotime($ticket['created_at'])) ?></p>
                <p><strong>อัปเดตล่าสุด:</strong><br><?= date('d/m/Y H:i', strtotime($ticket['updated_at'])) ?></p>
            </div>
        </div>
    </div>
</div>
<?php require 'includes/footer.php'; ?>