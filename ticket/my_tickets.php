<?php
// FILE: ticket/my_tickets.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'includes/db.php';
require_once 'includes/functions.php';
check_auth();

$user_id = $_SESSION['user_id'];

// --- จัดการ Pagination ---
$items_per_page = 10;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $items_per_page;

// นับจำนวน Ticket ทั้งหมดของ User คนนี้
$stmt_count = $pdo->prepare("SELECT COUNT(*) FROM tickets WHERE user_id = ?");
$stmt_count->execute([$user_id]);
$total_items = $stmt_count->fetchColumn();

// --- ส่วนที่แก้ไข SQL ให้ใช้ Named Parameters ทั้งหมด ---
$stmt = $pdo->prepare("
    SELECT t.*, c.name as category_name 
    FROM tickets t
    JOIN categories c ON t.category_id = c.id
    WHERE t.user_id = :user_id
    ORDER BY t.updated_at DESC
    LIMIT :limit OFFSET :offset
");
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':limit', $items_per_page, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$tickets = $stmt->fetchAll();
// --- จบส่วนที่แก้ไข ---

require 'includes/header.php';
?>

<h2><i class="bi bi-list-task"></i> ใบงานของฉัน (<?= $total_items ?> รายการ)</h2>
<hr>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>หัวข้อ</th>
                        <th>ประเภท</th>
                        <th>สถานะ</th>
                        <th>อัปเดตล่าสุด</th>
                        <th class="text-center">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($tickets)): ?>
                        <tr><td colspan="6" class="text-center p-4">ไม่พบข้อมูลใบงาน</td></tr>
                    <?php else: ?>
                        <?php foreach ($tickets as $ticket): ?>
                        <tr>
                            <td class="align-middle">#<?= htmlspecialchars($ticket['id']) ?></td>
                            <td class="align-middle"><?= htmlspecialchars($ticket['title']) ?></td>
                            <td class="align-middle"><?= htmlspecialchars($ticket['category_name']) ?></td>
                            <td class="align-middle"><?= getStatusBadge($ticket['status']) ?></td>
                            <td class="align-middle"><?= date('d/m/Y H:i', strtotime($ticket['updated_at'])) ?></td>
                            <td class="text-center">
                                <a href="view_ticket.php?id=<?= $ticket['id'] ?>" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> ดูรายละเอียด
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if ($total_items > $items_per_page): ?>
    <div class="card-footer bg-light">
        <?php
            $base_url = 'my_tickets.php?';
            echo generate_pagination($total_items, $items_per_page, $current_page, $base_url);
        ?>
    </div>
    <?php endif; ?>
</div>

<?php require 'includes/footer.php'; ?>