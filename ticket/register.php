<?php
// FILE: ticket/register.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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
                <h3><i class="bi bi-person-plus-fill"></i> สมัครสมาชิกใหม่</h3>
            </div>
            <div class="card-body">
                <form action="process_register.php" method="POST">
                    <?= csrf_input_field() ?>
                    <div class="mb-3">
                        <label for="full_name" class="form-label">ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control" name="full_name" required>
                    </div>
                     <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">ยืนยันการสมัครสมาชิก</button>
                    </div>
                </form>
            </div>
             <div class="card-footer text-center">
                มีบัญชีอยู่แล้ว? <a href="login.php">กลับไปหน้าเข้าสู่ระบบ</a>
            </div>
        </div>
    </div>
</div>
<?php require 'includes/footer.php'; ?>