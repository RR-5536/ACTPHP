<?php
// FILE: ticket/login.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// ถ้า login อยู่แล้ว ให้ไปหน้าหลักทันที
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
require_once 'includes/functions.php';
require 'includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3><i class="bi bi-box-arrow-in-right"></i> เข้าสู่ระบบ HelpDesk</h3>
            </div>
            <div class="card-body">
                <form action="process_login.php" method="POST">
                    <?= csrf_input_field() ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                ยังไม่มีบัญชี? <a href="register.php">สมัครสมาชิกที่นี่</a>
            </div>
        </div>
    </div>
</div>

<?php require 'includes/footer.php'; ?>