<?php
// FILE: ticket/create_ticket.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'includes/db.php';
require_once 'includes/functions.php';
check_auth(); // ตรวจสอบว่า login หรือยัง

// ดึง Categories หลัก
$stmt_cat = $pdo->query("SELECT * FROM categories ORDER BY name ASC");
$categories = $stmt_cat->fetchAll();

require 'includes/header.php';
?>

<h2><i class="bi bi-pencil-square"></i> แจ้งปัญหาใหม่</h2>
<hr>

<form action="process_create_ticket.php" method="POST" enctype="multipart/form-data">
    
    <!-- === ส่วนที่แก้ไข: เพิ่ม CSRF Token ที่นี่ === -->
    <?= csrf_input_field() ?>
    <!-- ============================================= -->

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="mb-3">
                <label for="category_id" class="form-label">เลือกแผนกหลัก <span class="text-danger">*</span></label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <option value="" selected disabled>-- กรุณาเลือกแผนก --</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= htmlspecialchars($category['id']) ?>">
                            <?= htmlspecialchars($category['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">หัวข้อปัญหา <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">กรุณาอธิบายรายละเอียดของปัญหา <span class="text-danger">*</span></label>
                <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
            </div>

            <div class="mb-3">
                <label for="attachment" class="form-label">แนบรูปภาพประกอบ (ถ้ามี)</label>
                <input class="form-control" type="file" id="attachment" name="attachment">
                <div class="form-text">ไฟล์ภาพจะช่วยให้เจ้าหน้าที่เข้าใจปัญหาได้เร็วขึ้น (สูงสุด 25MB)</div>
            </div>
            
            <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i> ส่งเรื่อง</button>
            <a href="index.php" class="btn btn-secondary">ยกเลิก</a>
        </div>
    </div>
</form>

<?php require 'includes/footer.php'; ?>