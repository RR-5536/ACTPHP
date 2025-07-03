<?php
// FILE: ticket/admin/index.php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once '../includes/db.php';
require_once '../includes/functions.php';
check_auth(['staff', 'admin']);

// --- 1. ดึงข้อมูลสรุปสำหรับ Dashboard ---
$stmt_status = $pdo->query("SELECT status, COUNT(*) as count FROM tickets GROUP BY status");
$status_counts_raw = $stmt_status->fetchAll(PDO::FETCH_KEY_PAIR);
$status_counts = ['new' => 0, 'in_progress' => 0, 'resolved' => 0, 'closed' => 0];
$status_counts = array_merge($status_counts, $status_counts_raw);
$total_tickets = array_sum($status_counts_raw);

$stmt_categories = $pdo->query("SELECT c.name, COUNT(t.id) as count FROM categories c LEFT JOIN tickets t ON c.id = t.category_id GROUP BY c.id, c.name ORDER BY c.name");
$category_data_raw = $stmt_categories->fetchAll();
$category_labels = []; $category_values = [];
foreach ($category_data_raw as $row) {
    $category_labels[] = $row['name'];
    $category_values[] = (int)$row['count'];
}

// --- 2. จัดการ Pagination, Filter, Sort ---
$items_per_page = 15;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $items_per_page;

$filter_status = $_GET['status'] ?? 'all'; 
$sort_by = $_GET['sort'] ?? 'updated_at';
$sort_order = $_GET['order'] ?? 'desc';
$allowed_sort_columns = ['id', 'title', 'category_name', 'status', 'updated_at'];
if (!in_array($sort_by, $allowed_sort_columns)) { $sort_by = 'updated_at'; }
$sort_order = strtolower($sort_order) === 'asc' ? 'asc' : 'desc';
$next_sort_order = $sort_order === 'asc' ? 'desc' : 'asc';

// --- 3. ดึงข้อมูล (แก้ไข SQL และ Parameters) ---
$where_clause = "";
$params = [];
if (in_array($filter_status, ['new', 'in_progress', 'resolved', 'closed'])) {
    $where_clause = "WHERE t.status = :status"; // <--- แก้ไขตรงนี้
    $params[':status'] = $filter_status;       // <--- แก้ไขตรงนี้
}

// Query ที่ 1: นับจำนวนรายการ
$sql_count = "SELECT COUNT(*) FROM tickets t $where_clause";
$stmt_count = $pdo->prepare($sql_count);
$stmt_count->execute($params);
$total_items = $stmt_count->fetchColumn();

// Query ที่ 2: ดึงข้อมูลของหน้าปัจจุบัน
$sql_tickets = "SELECT t.id, t.title, t.status, t.updated_at, c.name as category_name, u.full_name as user_name, a.full_name as assigned_name FROM tickets t JOIN categories c ON t.category_id = c.id JOIN users u ON t.user_id = u.id LEFT JOIN users a ON t.assigned_to = a.id $where_clause ORDER BY $sort_by $sort_order LIMIT :limit OFFSET :offset";
$stmt_tickets = $pdo->prepare($sql_tickets);

// Bind named parameters ทั้งหมด
$stmt_tickets->bindValue(':limit', $items_per_page, PDO::PARAM_INT);
$stmt_tickets->bindValue(':offset', $offset, PDO::PARAM_INT);
if (!empty($params)) {
    foreach ($params as $key => $value) {
        $stmt_tickets->bindValue($key, $value);
    }
}
$stmt_tickets->execute();
$tickets = $stmt_tickets->fetchAll();


require '../includes/header.php';

function sortableHeader($title, $column_name, $current_sort_by, $current_sort_order, $next_sort_order, $current_filter_status) {
    $icon = '';
    if ($current_sort_by === $column_name) {
        $icon = $current_sort_order === 'asc' ? ' <i class="bi bi-sort-up"></i>' : ' <i class="bi bi-sort-down"></i>';
        $order = $next_sort_order;
    } else { $order = 'asc'; }
    $url = "?status=$current_filter_status&sort=$column_name&order=$order";
    return "<a href=\"$url\">$title$icon</a>";
}
?>

<h2><i class="bi bi-speedometer2"></i> Dashboard ภาพรวม</h2><hr>
<div class="row g-4 mb-4">
    <div class="col-md-6 col-lg-3"><div class="card shadow-sm border-left-primary h-100"><div class="dashboard-card"><div class="card-icon text-primary"><i class="bi bi-bell-fill"></i></div><div class="card-text"><h4><?= $status_counts['new'] ?></h4><span>ใบงานใหม่</span></div><a href="?status=new" class="stretched-link"></a></div></div></div>
    <div class="col-md-6 col-lg-3"><div class="card shadow-sm border-left-warning h-100"><div class="dashboard-card"><div class="card-icon text-warning"><i class="bi bi-hourglass-split"></i></div><div class="card-text"><h4><?= $status_counts['in_progress'] ?></h4><span>กำลังดำเนินการ</span></div><a href="?status=in_progress" class="stretched-link"></a></div></div></div>
    <div class="col-md-6 col-lg-3"><div class="card shadow-sm border-left-success h-100"><div class="dashboard-card"><div class="card-icon text-success"><i class="bi bi-check-circle-fill"></i></div><div class="card-text"><h4><?= $status_counts['resolved'] ?></h4><span>แก้ไขแล้ว</span></div><a href="?status=resolved" class="stretched-link"></a></div></div></div>
    <div class="col-md-6 col-lg-3"><div class="card shadow-sm border-left-secondary h-100"><div class="dashboard-card"><div class="card-icon text-secondary"><i class="bi bi-archive-fill"></i></div><div class="card-text"><h4><?= $total_tickets ?></h4><span>ใบงานทั้งหมด</span></div><a href="?" class="stretched-link"></a></div></div></div>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="card shadow-sm h-100"><div class="card-header"><h5 class="mb-0"><i class="bi bi-pie-chart-fill"></i> สัดส่วนปัญหาตามแผนก</h5></div><div class="card-body d-flex align-items-center justify-content-center"><div style="position: relative; height:320px; width:100%"><canvas id="categoryChart"></canvas></div></div></div>
    </div>
    <div class="col-lg-6">
        <div class="card shadow-sm h-100 d-flex flex-column">
            <div class="card-header d-flex justify-content-between align-items-center"><h5 class="mb-0"><i class="bi bi-table"></i> ใบงานในระบบ (<?= $total_items ?> รายการ)</h5><?php if ($filter_status !== 'all'): ?><a href="index.php" class="btn btn-sm btn-outline-secondary py-1"><i class="bi bi-x"></i> ล้างตัวกรอง</a><?php endif; ?></div>
            <div class="card-body p-0 flex-grow-1"><div class="table-responsive h-100"><table class="table table-striped table-hover mb-0"><thead class="table-light"><tr><th><?= sortableHeader('ID', 'id', $sort_by, $sort_order, $next_sort_order, $filter_status) ?></th><th><?= sortableHeader('สถานะ', 'status', $sort_by, $sort_order, $next_sort_order, $filter_status) ?></th><th><?= sortableHeader('อัปเดต', 'updated_at', $sort_by, $sort_order, $next_sort_order, $filter_status) ?></th><th class="text-end">จัดการ</th></tr></thead><tbody><?php if (empty($tickets)): ?><tr><td colspan="4" class="text-center p-5">ไม่พบข้อมูลใบงานในหมวดหมู่นี้</td></tr><?php endif; ?><?php foreach ($tickets as $ticket): ?><tr><td class="align-middle">#<?= htmlspecialchars($ticket['id']) ?></td><td class="align-middle"><?= getStatusBadge($ticket['status']) ?></td><td class="align-middle" style="font-size: 0.85rem;"><?= date('d/m/y H:i', strtotime($ticket['updated_at'])) ?></td><td class="text-end"><a href="view_ticket.php?id=<?= $ticket['id'] ?>" class="btn btn-info btn-sm py-0 px-2"><i class="bi bi-search"></i> ดู</a></td></tr><?php endforeach; ?></tbody></table></div></div>
            <?php if ($total_items > $items_per_page): ?>
            <div class="card-footer bg-light"><?php $base_url = 'index.php?' . http_build_query(['status' => $filter_status, 'sort' => $sort_by, 'order' => $sort_order]); echo generate_pagination($total_items, $items_per_page, $current_page, $base_url); ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('categoryChart');
    if (ctx) { new Chart(ctx, { type: 'doughnut', data: { labels: <?= json_encode($category_labels) ?>, datasets: [{ label: 'จำนวนใบงาน', data: <?= json_encode($category_values) ?>, backgroundColor: ['#2980b9', '#f39c12', '#1abc9c', '#e74c3c', '#9b59b6', '#34495e'], borderColor: '#fff', borderWidth: 3, hoverOffset: 4 }] }, options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'right', labels: { boxWidth: 20, padding: 15 } }, title: { display: false } }, cutout: '60%' } }); }
});
</script>

<?php require '../includes/footer.php'; ?>