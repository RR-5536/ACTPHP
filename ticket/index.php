<?php
// FILE: ticket/index.php (ฉบับแก้ไขใหม่ทั้งหมด)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'includes/db.php';
require_once 'includes/functions.php';

// ถ้ายังไม่ Login ให้ไปหน้า Login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// ดึงข้อมูลตาม Role
$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['role'];

if (in_array($user_role, ['staff', 'admin'])) {
    // --- สำหรับ Staff และ Admin ---
    $stmt_status = $pdo->query("SELECT status, COUNT(*) as count FROM tickets GROUP BY status");
    $status_counts_raw = $stmt_status->fetchAll(PDO::FETCH_KEY_PAIR);
    $status_counts = ['new' => 0, 'in_progress' => 0, 'resolved' => 0, 'closed' => 0];
    $status_counts = array_merge($status_counts, $status_counts_raw);

    $stmt_tickets = $pdo->query("
        SELECT t.id, t.title, t.status, t.updated_at, c.name as category_name
        FROM tickets t
        JOIN categories c ON t.category_id = c.id
        ORDER BY t.updated_at DESC LIMIT 5
    ");
    $tickets = $stmt_tickets->fetchAll();
} else {
    // --- สำหรับ User ทั่วไป ---
    $stmt_status = $pdo->prepare("SELECT status, COUNT(*) as count FROM tickets WHERE user_id = ? GROUP BY status");
    $stmt_status->execute([$user_id]);
    $status_counts_raw = $stmt_status->fetchAll(PDO::FETCH_KEY_PAIR);
    $status_counts = ['open' => 0, 'closed' => 0];
    $status_counts['open'] = ($status_counts_raw['new'] ?? 0) + ($status_counts_raw['in_progress'] ?? 0);
    $status_counts['closed'] = ($status_counts_raw['resolved'] ?? 0) + ($status_counts_raw['closed'] ?? 0);

    $stmt_tickets = $pdo->prepare("
        SELECT id, title, status, updated_at
        FROM tickets
        WHERE user_id = ?
        ORDER BY updated_at DESC LIMIT 5
    ");
    $stmt_tickets->execute([$user_id]);
    $tickets = $stmt_tickets->fetchAll();
}

require 'includes/header.php';
?>

<div class="card bg-light border-0 mb-4">
    <div class="card-body">
        <h4 class="card-title">ยินดีต้อนรับ, <?= htmlspecialchars($_SESSION['full_name']) ?>!</h4>
        <p class="card-text text-muted mb-0">ภาพรวมสถานะใบงานของคุณในระบบ HelpDesk</p>
    </div>
</div>


<?php if (in_array($user_role, ['staff', 'admin'])): ?>
    <!-- ================== หน้าจอสำหรับ Staff / Admin ================== -->
    <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm border-left-primary h-100">
                <div class="dashboard-card">
                    <div class="card-icon text-primary"><i class="bi bi-bell-fill"></i></div>
                    <div class="card-text"><h4><?= $status_counts['new'] ?></h4><span>ใบงานใหม่</span></div>
                    <a href="admin/index.php?status=new" class="stretched-link" title="ดูใบงานใหม่ทั้งหมด"></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm border-left-warning h-100">
                <div class="dashboard-card">
                    <div class="card-icon text-warning"><i class="bi bi-hourglass-split"></i></div>
                    <div class="card-text"><h4><?= $status_counts['in_progress'] ?></h4><span>กำลังดำเนินการ</span></div>
                    <a href="admin/index.php?status=in_progress" class="stretched-link" title="ดูใบงานที่กำลังดำเนินการ"></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm border-left-success h-100">
                <div class="dashboard-card">
                    <div class="card-icon text-success"><i class="bi bi-check-circle-fill"></i></div>
                    <div class="card-text"><h4><?= $status_counts['resolved'] ?></h4><span>แก้ไขแล้ว</span></div>
                    <a href="admin/index.php?status=resolved" class="stretched-link" title="ดูใบงานที่แก้ไขแล้ว"></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
             <div class="card shadow-sm h-100">
                <div class="card-body text-center d-flex flex-column justify-content-center">
                    <a href="create_ticket.php" class="btn btn-primary btn-lg"><i class="bi bi-plus-circle-fill me-2"></i>แจ้งปัญหาใหม่</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h5><i class="bi bi-clock-history"></i> ใบงานล่าสุดในระบบ</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead><tr><th>ID</th><th>หัวข้อ</th><th>ประเภท</th><th>สถานะ</th><th>อัปเดตล่าสุด</th><th></th></tr></thead>
                    <tbody>
                        <?php if (empty($tickets)): ?>
                            <tr><td colspan="6" class="text-center p-4">ยังไม่มีใบงานในระบบ</td></tr>
                        <?php else: ?>
                            <?php foreach ($tickets as $ticket): ?>
                                <tr>
                                    <td class="align-middle">#<?= $ticket['id'] ?></td>
                                    <td class="align-middle"><?= htmlspecialchars($ticket['title']) ?></td>
                                    <td class="align-middle"><?= htmlspecialchars($ticket['category_name']) ?></td>
                                    <td class="align-middle"><?= getStatusBadge($ticket['status']) ?></td>
                                    <td class="align-middle"><?= date('d/m/Y H:i', strtotime($ticket['updated_at'])) ?></td>
                                    <td class="text-end">
                                        <a href="admin/view_ticket.php?id=<?= $ticket['id'] ?>" class="btn btn-sm btn-outline-primary">จัดการ</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="admin/index.php">ดูใบงานทั้งหมด...</a>
        </div>
    </div>

<?php else: ?>
    <!-- ================== หน้าจอสำหรับ User ทั่วไป (เหมือนเดิม) ================== -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-left-warning h-100">
                <div class="dashboard-card">
                    <div class="card-icon text-warning"><i class="bi bi-folder2-open"></i></div>
                    <div class="card-text"><h4><?= $status_counts['open'] ?></h4><span>ใบงานที่เปิดอยู่</span></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-left-secondary h-100">
                <div class="dashboard-card">
                    <div class="card-icon text-secondary"><i class="bi bi-archive-fill"></i></div>
                    <div class="card-text"><h4><?= $status_counts['closed'] ?></h4><span>ใบงานที่ปิดแล้ว</span></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center d-flex flex-column justify-content-center">
                    <a href="create_ticket.php" class="btn btn-primary btn-lg"><i class="bi bi-plus-circle-fill me-2"></i>แจ้งปัญหาใหม่</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h5><i class="bi bi-clock-history"></i> ใบงานล่าสุดของคุณ</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead><tr><th>ID</th><th>หัวข้อ</th><th>สถานะ</th><th>อัปเดตล่าสุด</th><th></th></tr></thead>
                    <tbody>
                        <?php if (empty($tickets)): ?>
                            <tr><td colspan="5" class="text-center p-4">คุณยังไม่เคยแจ้งปัญหา</td></tr>
                        <?php else: ?>
                            <?php foreach ($tickets as $ticket): ?>
                                <tr>
                                    <td class="align-middle">#<?= $ticket['id'] ?></td>
                                    <td class="align-middle"><?= htmlspecialchars($ticket['title']) ?></td>
                                    <td class="align-middle"><?= getStatusBadge($ticket['status']) ?></td>
                                    <td class="align-middle"><?= date('d/m/Y H:i', strtotime($ticket['updated_at'])) ?></td>
                                    <td class="text-end">
                                        <a href="view_ticket.php?id=<?= $ticket['id'] ?>" class="btn btn-sm btn-outline-primary">ดูรายละเอียด</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="my_tickets.php">ดูใบงานทั้งหมดของคุณ...</a>
        </div>
    </div>
<?php endif; ?>

<?php require 'includes/footer.php'; ?>