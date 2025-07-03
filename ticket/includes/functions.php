<?php
// FILE: ticket/includes/functions.php

function getStatusBadge($status) {
    $badgeClass = ''; $statusText = '';
    switch ($status) {
        case 'new': $badgeClass = 'bg-primary'; $statusText = 'ใหม่'; break;
        case 'in_progress': $badgeClass = 'bg-warning text-dark'; $statusText = 'กำลังดำเนินการ'; break;
        case 'resolved': $badgeClass = 'bg-success'; $statusText = 'แก้ไขแล้ว'; break;
        case 'closed': $badgeClass = 'bg-secondary'; $statusText = 'ปิดงานแล้ว'; break;
        default: $badgeClass = 'bg-light text-dark'; $statusText = htmlspecialchars($status); break;
    }
    return '<span class="badge ' . $badgeClass . '">' . $statusText . '</span>';
}

function check_auth($roles = []) {
    if (!isset($_SESSION['user_id'])) { header('Location: /ticket/login.php'); exit(); }
    if (!empty($roles) && !in_array($_SESSION['role'], $roles)) { header('Location: /ticket/index.php'); exit(); }
}

// --- CSRF Protection Functions (ฉบับแก้ไข) ---
function generate_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
}

function verify_csrf_token() {
    if (!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        session_unset();
        session_destroy();
        die('CSRF token validation failed. การร้องขอไม่ถูกต้อง กรุณาลองเข้าสู่ระบบใหม่อีกครั้ง');
    }
}

function csrf_input_field() {
    if(empty($_SESSION['csrf_token'])) { generate_csrf_token(); }
    return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($_SESSION['csrf_token']) . '">';
}
// --- End CSRF ---

function generate_pagination($total_items, $items_per_page, $current_page, $base_url) {
    $total_pages = ceil($total_items / $items_per_page); if ($total_pages <= 1) return '';
    $html = '<nav aria-label="Page navigation"><ul class="pagination justify-content-center mb-0">';
    $prev_disabled = ($current_page <= 1) ? "disabled" : "";
    $html .= '<li class="page-item ' . $prev_disabled . '"><a class="page-link" href="' . $base_url . '&page=' . ($current_page - 1) . '">ก่อนหน้า</a></li>';
    for ($i = 1; $i <= $total_pages; $i++) {
        $active_class = ($i == $current_page) ? "active" : "";
        $html .= '<li class="page-item ' . $active_class . '"><a class="page-link" href="' . $base_url . '&page=' . $i . '">' . $i . '</a></li>';
    }
    $next_disabled = ($current_page >= $total_pages) ? "disabled" : "";
    $html .= '<li class="page-item ' . $next_disabled . '"><a class="page-link" href="' . $base_url . '&page=' . ($current_page + 1) . '">ถัดไป</a></li>';
    $html .= '</ul></nav>';
    return $html;
}