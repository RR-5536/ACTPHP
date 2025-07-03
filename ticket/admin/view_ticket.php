<?php
// FILE: ticket/admin/view_ticket.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../includes/db.php';
require_once '../includes/functions.php';
check_auth(['staff', 'admin']);

$ticket_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($ticket_id === 0) {
    header('Location: index.php');
    exit();
}

// --- ส่วนจัดการ Action ทั้งหมด (POST request) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf_token();
    $pdo->beginTransaction();
    try {
        // อัปเดตสถานะและผู้รับผิดชอบ
        if (isset($_POST['update_status'])) {
            $new_status = $_POST['status'];
            $assigned_to = !empty($_POST['assigned_to']) ? $_POST['assigned_to'] : null;

            // ดึงข้อมูลเก่าเพื่อเปรียบเทียบและแจ้งเตือน
            $stmt_old = $pdo->prepare("SELECT status, user_id FROM tickets WHERE id = ?");
            $stmt_old->execute([$ticket_id]);
            $old_ticket = $stmt_old->fetch();
            
            $stmt_update = $pdo->prepare("UPDATE tickets SET status = ?, assigned_to = ?, updated_at = NOW() WHERE id = ?");
            $stmt_update->execute([$new_status, $assigned_to, $ticket_id]);
            
            // ถ้าสถานะมีการเปลี่ยนแปลงจริง และไม่ใช่การกระทำกับตัวเอง
            if ($old_ticket && $old_ticket['status'] !== $new_status && $old_ticket['user_id'] != $_SESSION['user_id']) {
                $status_text = getStatusBadge($new_status);
                $message = "สถานะของใบงาน #$ticket_id ของคุณได้เปลี่ยนเป็น " . strip_tags($status_text);
                $stmt_notify = $pdo->prepare("INSERT INTO notifications (user_id, ticket_id, message) VALUES (?, ?, ?)");
                $stmt_notify->execute([$old_ticket['user_id'], $ticket_id, $message]);
            }
            $_SESSION['success_message'] = "อัปเดตสถานะใบงานสำเร็จ";
        } 
        // ลบคอมเมนต์
        elseif (isset($_POST['delete_reply'])) {
            $reply_id = $_POST['reply_id'];

            $stmt_files = $pdo->prepare("SELECT file_path FROM reply_attachments WHERE reply_id = ?");
            $stmt_files->execute([$reply_id]);
            $files_to_delete = $stmt_files->fetchAll(PDO::FETCH_COLUMN);
            foreach ($files_to_delete as $file) {
                if ($file && file_exists("../uploads/$file")) { unlink("../uploads/$file"); }
            }
            $pdo->prepare("DELETE FROM reply_attachments WHERE reply_id = ?")->execute([$reply_id]);
            $pdo->prepare("DELETE FROM ticket_replies WHERE id = ? AND ticket_id = ?")->execute([$reply_id, $ticket_id]);
            $_SESSION['success_message'] = "ลบคอมเมนต์สำเร็จ";
        } 
        // ลบใบงานทั้งหมด
        elseif (isset($_POST['delete_ticket'])) {
            $stmt_ticket_files = $pdo->prepare("SELECT file_path FROM ticket_attachments WHERE ticket_id = ?");
            $stmt_ticket_files->execute([$ticket_id]);
            foreach ($stmt_ticket_files->fetchAll(PDO::FETCH_COLUMN) as $file) { if ($file && file_exists("../uploads/$file")) unlink("../uploads/$file"); }
            $pdo->prepare("DELETE FROM ticket_attachments WHERE ticket_id = ?")->execute([$ticket_id]);

            $stmt_reply_ids = $pdo->prepare("SELECT id FROM ticket_replies WHERE ticket_id = ?");
            $stmt_reply_ids->execute([$ticket_id]);
            $reply_ids = $stmt_reply_ids->fetchAll(PDO::FETCH_COLUMN);
            if (!empty($reply_ids)) {
                $placeholders = implode(',', array_fill(0, count($reply_ids), '?'));
                $stmt_reply_files = $pdo->prepare("SELECT file_path FROM reply_attachments WHERE reply_id IN ($placeholders)");
                $stmt_reply_files->execute($reply_ids);
                foreach ($stmt_reply_files->fetchAll(PDO::FETCH_COLUMN) as $file) { if ($file && file_exists("../uploads/$file")) unlink("../uploads/$file"); }
                $pdo->prepare("DELETE FROM reply_attachments WHERE reply_id IN ($placeholders)")->execute($reply_ids);
            }
            
            $pdo->prepare("DELETE FROM ticket_replies WHERE ticket_id = ?")->execute([$ticket_id]);
            $pdo->prepare("DELETE FROM tickets WHERE id = ?")->execute([$ticket_id]);

            $pdo->commit();
            $_SESSION['success_message'] = "ลบใบงาน #$ticket_id เรียบร้อยแล้ว";
            header("Location: index.php");
            exit();
        }
        $pdo->commit();
    } catch(Exception $e) {
        $pdo->rollBack();
        $_SESSION['error_message'] = "เกิดข้อผิดพลาด: " . $e->getMessage();
    }
    header("Location: view_ticket.php?id=$ticket_id");
    exit();
} // <-- นี่คือวงเล็บ `}` ที่หายไปครับ

// --- จบส่วน Action ---


// --- ส่วนดึงข้อมูล ---
$stmt = $pdo->prepare("
    SELECT t.*, c.name as category_name, u.full_name as user_name, u.email as user_email
    FROM tickets t
    JOIN categories c ON t.category_id = c.id
    JOIN users u ON t.user_id = u.id
    WHERE t.id = ?
");
$stmt->execute([$ticket_id]);
$ticket = $stmt->fetch();
if (!$ticket) {
    $_SESSION['error_message'] = "ไม่พบใบงานที่ระบุ";
    header('Location: index.php');
    exit();
}

$stmt_staff = $pdo->prepare("SELECT id, full_name FROM users WHERE role IN ('staff', 'admin')");
$stmt_staff->execute();
$staff_list = $stmt_staff->fetchAll();
$stmt_files = $pdo->prepare("SELECT * FROM ticket_attachments WHERE ticket_id = ?");
$stmt_files->execute([$ticket_id]);
$attachments = $stmt_files->fetchAll();
$stmt_replies = $pdo->prepare("SELECT r.*, u.full_name, u.role FROM ticket_replies r JOIN users u ON r.user_id = u.id WHERE r.ticket_id = ? ORDER BY r.created_at ASC");
$stmt_replies->execute([$ticket_id]);
$replies = $stmt_replies->fetchAll();
$reply_attachments = [];
if (!empty($replies)) {
    $reply_ids = array_column($replies, 'id');
    $placeholders = implode(',', array_fill(0, count($reply_ids), '?'));
    $stmt_reply_files = $pdo->prepare("SELECT * FROM reply_attachments WHERE reply_id IN ($placeholders)");
    $stmt_reply_files->execute($reply_ids);
    $files_data = $stmt_reply_files->fetchAll();
    foreach($files_data as $file) {
        $reply_attachments[$file['reply_id']][] = $file;
    }
}
// --- จบส่วนดึงข้อมูล ---

require '../includes/header.php';
?>

<div class="d-flex justify-content-between align-items-center">
    <h2><i class="bi bi-ticket-detailed"></i> รายละเอียดใบงาน #<?= htmlspecialchars($ticket['id']) ?></h2>
    <a href="index.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> กลับไปรายการหลัก</a>
</div>
<hr>

<div class="row">
    <!-- คอลัมน์ซ้าย: รายละเอียดปัญหาและการสนทนา -->
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header"><strong>รายละเอียดปัญหา</strong></div>
            <div class="card-body">
                <p><?= nl2br(htmlspecialchars($ticket['description'])) ?></p>
                <?php if (!empty($attachments)): ?>
                    <hr>
                    <h6><i class="bi bi-paperclip"></i> ไฟล์แนบเริ่มต้น:</h6>
                    <ul>
                        <?php foreach ($attachments as $file): ?>
                            <li><a href="/ticket/uploads/<?= htmlspecialchars($file['file_path']) ?>" target="_blank"><?= htmlspecialchars($file['file_name']) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>

        <h4 class="mb-3"><i class="bi bi-chat-dots"></i> การสนทนา</h4>
        <?php if (empty($replies)): ?>
            <p class="text-center text-muted">ยังไม่มีการตอบกลับในใบงานนี้</p>
        <?php endif; ?>
        <?php foreach ($replies as $reply): 
            $cardClass = ($reply['role'] == 'user') ? 'card-reply-user' : ($reply['is_internal_note'] ? 'card-reply-internal' : 'card-reply-staff');
        ?>
        <div class="card mb-3 card-reply <?= $cardClass ?>">
            <div class="card-body">
                <form action="view_ticket.php?id=<?= $ticket_id ?>" method="POST" class="float-end">
                    <?= csrf_input_field() ?>
                    <input type="hidden" name="reply_id" value="<?= $reply['id'] ?>">
                    <button type="submit" name="delete_reply" class="btn btn-sm btn-outline-danger border-0" title="ลบคอมเมนต์นี้" onclick="return confirm('ยืนยันการลบคอมเมนต์และไฟล์แนบทั้งหมดในคอมเมนต์นี้?')">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </form>
                <p class="mb-1"><?= nl2br(htmlspecialchars($reply['message'])) ?></p>
                
                <?php if (isset($reply_attachments[$reply['id']])): ?>
                <div class="reply-attachment-gallery row g-2">
                    <?php foreach ($reply_attachments[$reply['id']] as $file): ?>
                        <div class="col-auto">
                            <a href="/ticket/uploads/<?= htmlspecialchars($file['file_path']) ?>" target="_blank" title="<?= htmlspecialchars($file['file_name']) ?>">
                                <img src="/ticket/uploads/<?= htmlspecialchars($file['file_path']) ?>" class="reply-attachment-thumb">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <small class="text-muted d-block mt-2">
                    โดย: <strong><?= htmlspecialchars($reply['full_name']) ?> (<?= htmlspecialchars($reply['role']) ?>)</strong> 
                    เมื่อ: <?= date('d/m/Y H:i', strtotime($reply['created_at'])) ?>
                    <?php if ($reply['is_internal_note']): ?><span class="badge bg-danger ms-2">บันทึกภายใน</span><?php endif; ?>
                </small>
            </div>
        </div>
        <?php endforeach; ?>

        <div class="card mt-4">
            <div class="card-header"><h5><i class="bi bi-reply-fill"></i> ตอบกลับ / เพิ่มบันทึกภายใน</h5></div>
            <div class="card-body">
                <form action="/ticket/process_reply.php" method="POST" enctype="multipart/form-data">
                    <?= csrf_input_field() ?>
                    <input type="hidden" name="ticket_id" value="<?= $ticket['id'] ?>">
                    <div class="mb-3">
                        <textarea class="form-control" name="message" rows="4" placeholder="พิมพ์ข้อความตอบกลับ หรือบันทึกช่วยจำ..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="attachments" class="form-label">แนบไฟล์ (สามารถเลือกได้หลายไฟล์)</label>
                        <input class="form-control" type="file" name="attachments[]" id="attachments" multiple>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="is_internal_note" value="1" id="is_internal_note">
                        <label class="form-check-label" for="is_internal_note">เป็นบันทึกภายใน (ลูกค้าจะไม่เห็นข้อความนี้)</label>
                    </div>
                    <button type="submit" class="btn btn-primary">ส่งข้อความ</button>
                </form>
            </div>
        </div>
    </div>

    <!-- คอลัมน์ขวา: ข้อมูล และ แผงควบคุม -->
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header"><strong><i class="bi bi-info-circle"></i> ข้อมูลใบงาน</strong></div>
            <div class="card-body">
                <p><strong>ผู้แจ้ง:</strong><br><?= htmlspecialchars($ticket['user_name']) ?> (<?= htmlspecialchars($ticket['user_email']) ?>)</p>
                <p><strong>ประเภท:</strong><br><?= htmlspecialchars($ticket['category_name']) ?></p>
                <p><strong>สถานะปัจจุบัน:</strong><br><?= getStatusBadge($ticket['status']) ?></p>
                <p><strong>วันที่แจ้ง:</strong><br><?= date('d/m/Y H:i', strtotime($ticket['created_at'])) ?></p>
                <p><strong>อัปเดตล่าสุด:</strong><br><?= date('d/m/Y H:i', strtotime($ticket['updated_at'])) ?></p>
            </div>
        </div>

        <div class="card">
            <div class="card-header"><h4><i class="bi bi-gear-fill"></i> แผงควบคุม</h4></div>
            <div class="card-body">
                <form action="view_ticket.php?id=<?= $ticket_id ?>" method="POST">
                    <?= csrf_input_field() ?>
                    <div class="mb-3">
                        <label for="status" class="form-label"><strong>เปลี่ยนสถานะ</strong></label>
                        <select name="status" id="status" class="form-select">
                            <option value="new" <?= $ticket['status'] == 'new' ? 'selected' : '' ?>>ใหม่</option>
                            <option value="in_progress" <?= $ticket['status'] == 'in_progress' ? 'selected' : '' ?>>กำลังดำเนินการ</option>
                            <option value="resolved" <?= $ticket['status'] == 'resolved' ? 'selected' : '' ?>>แก้ไขแล้ว</option>
                            <option value="closed" <?= $ticket['status'] == 'closed' ? 'selected' : '' ?>>ปิดงานแล้ว</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="assigned_to" class="form-label"><strong>มอบหมายให้เจ้าหน้าที่</strong></label>
                        <select name="assigned_to" id="assigned_to" class="form-select">
                            <option value="">-- ไม่ระบุ --</option>
                            <?php foreach($staff_list as $staff): ?>
                            <option value="<?= $staff['id'] ?>" <?= $ticket['assigned_to'] == $staff['id'] ? 'selected' : '' ?>><?= htmlspecialchars($staff['full_name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="d-grid"><button type="submit" name="update_status" class="btn btn-warning"><i class="bi bi-save"></i> อัปเดตสถานะใบงาน</button></div>
                </form>
                <div class="danger-zone">
                     <p class="form-text mb-2">การกระทำในส่วนนี้ไม่สามารถย้อนกลับได้</p>
                     <div class="d-grid gap-2">
                         <button type="button" class="btn btn-outline-info" disabled title="ฟังก์ชันนี้ยังไม่เปิดใช้งาน"><i class="bi bi-envelope-fill"></i> แจ้งเตือนทางอีเมล</button>
                         <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteTicketModal"><i class="bi bi-trash-fill"></i> ลบใบงานนี้</button>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteTicketModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="view_ticket.php?id=<?= $ticket_id ?>" method="POST">
                <?= csrf_input_field() ?>
                <div class="modal-header bg-danger text-white"><h5 class="modal-title">ยืนยันการลบใบงาน</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <p>คุณแน่ใจหรือไม่ว่าต้องการลบใบงาน <strong>#<?= $ticket_id ?></strong> พร้อมทั้งคอมเมนต์และไฟล์แนบทั้งหมด? <br><strong>การกระทำนี้ไม่สามารถย้อนกลับได้!</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" name="delete_ticket" class="btn btn-danger">ยืนยันการลบ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require '../includes/footer.php'; 
?>