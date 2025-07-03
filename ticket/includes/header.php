<?php
// FILE: ticket/includes/header.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'db.php';
require_once 'functions.php';

// ดึงข้อมูล Notification สำหรับผู้ใช้ที่ Login อยู่
$unread_count = 0;
$notifications = [];
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    $stmt_count = $pdo->prepare("SELECT COUNT(*) FROM notifications WHERE user_id = ? AND is_read = 0");
    $stmt_count->execute([$user_id]);
    $unread_count = $stmt_count->fetchColumn();

    $stmt_list = $pdo->prepare("SELECT * FROM notifications WHERE user_id = ? ORDER BY created_at DESC LIMIT 5");
    $stmt_list->execute([$user_id]);
    $notifications = $stmt_list->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบแจ้งปัญหา (HelpDesk System)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Lightbox2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="/ticket/assets/css/style.css">
    <link rel="stylesheet" href="/ticket/assets/css/archem-theme.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="/ticket/index.php"><i class="bi bi-headset"></i> HelpDesk System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <?php if (isset($_SESSION['user_id'])): ?>
            <li class="nav-item"><a class="nav-link" href="/ticket/my_tickets.php"><i class="bi bi-card-list me-1"></i> ใบงานของฉัน</a></li>
            <li class="nav-item"><a class="nav-link" href="/ticket/create_ticket.php"><i class="bi bi-pencil-square me-1"></i> แจ้งปัญหาใหม่</a></li>
            <?php if (isset($_SESSION['role']) && in_array($_SESSION['role'], ['staff', 'admin'])): ?>
              <li class="nav-item"><a class="nav-link" href="/ticket/admin/index.php"><i class="bi bi-kanban me-1"></i> แดชบอร์ดผู้ดูแล</a></li>
            <?php endif; ?>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav d-flex align-items-center">
        <?php if (isset($_SESSION['user_id'])): ?>
            <li class="nav-item dropdown">
              <a class="nav-link position-relative" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="การแจ้งเตือน">
                <i class="bi bi-bell-fill fs-5"></i>
                <?php if ($unread_count > 0): ?>
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="notification-badge"><?= $unread_count ?><span class="visually-hidden">unread messages</span></span>
                <?php endif; ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown" style="width: 350px;">
                <li class="px-3 py-2 d-flex justify-content-between align-items-center"><h6 class="mb-0">การแจ้งเตือน</h6></li>
                <li><hr class="dropdown-divider"></li>
                <?php if (empty($notifications)): ?>
                    <li><p class="text-center text-muted p-3 mb-0">ไม่มีการแจ้งเตือน</p></li>
                <?php else: ?>
                    <?php foreach($notifications as $notif): ?>
                    <li>
                        <a class="dropdown-item text-wrap <?= $notif['is_read'] ? 'text-muted' : 'fw-bold' ?>" href="<?= !empty($notif['ticket_id']) ? '/ticket/view_ticket.php?id='.$notif['ticket_id'] : '/ticket/admin/manage_users.php' ?>">
                            <small><?= htmlspecialchars($notif['message']) ?></small>
                            <small class="d-block text-black-50"><?= date('d/m/Y H:i', strtotime($notif['created_at'])) ?></small>
                        </a>
                    </li>
                    <?php endforeach; ?>
                <?php endif; ?>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i> <?= htmlspecialchars($_SESSION['full_name']) ?> (<?= htmlspecialchars($_SESSION['role']) ?>)</a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                    <li><a class="dropdown-item" href="/ticket/admin/manage_users.php"><i class="bi bi-people-fill me-2"></i>จัดการผู้ใช้งาน</a></li>
                    <li><hr class="dropdown-divider"></li>
                <?php endif; ?>
                <li><a class="dropdown-item" href="/ticket/logout.php"><i class="bi bi-box-arrow-right me-2"></i>ออกจากระบบ</a></li>
              </ul>
            </li>
        <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="/ticket/login.php">เข้าสู่ระบบ</a></li>
            <li class="nav-item"><a class="nav-link" href="/ticket/register.php">สมัครสมาชิก</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<main class="container mt-4 mb-5">
    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert"><?= $_SESSION['success_message'] ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>
    <?php if (isset($_SESSION['error_message'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert"><?= $_SESSION['error_message'] ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
        <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>