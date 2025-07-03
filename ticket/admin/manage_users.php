<?php
// FILE: ticket/admin/manage_users.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../includes/db.php';
require_once '../includes/functions.php';
check_auth(['admin']); // เฉพาะ Admin เท่านั้น!

// -- จัดการ Action ต่างๆ ที่ส่งมาจากฟอร์ม (POST request) --
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf_token(); // ตรวจสอบ CSRF Token ก่อนเสมอ
    $pdo->beginTransaction();
    try {
        // --- Action: เพิ่มผู้ใช้ใหม่ ---
        if (isset($_POST['add_user'])) {
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            // Admin สามารถเพิ่มผู้ใช้ที่ใช้งานได้ทันที (is_active = 1)
            $stmt = $pdo->prepare("INSERT INTO users (username, password, full_name, email, role, is_active) VALUES (?, ?, ?, ?, ?, 1)");
            $stmt->execute([$username, $password, $full_name, $email, $role]);
            $_SESSION['success_message'] = 'เพิ่มผู้ใช้ใหม่สำเร็จ!';
        }
        // --- Action: แก้ไขข้อมูลผู้ใช้ ---
        elseif (isset($_POST['edit_user'])) {
            $user_id = $_POST['user_id'];
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            $is_active = isset($_POST['is_active']) ? 1 : 0; // รับค่าสถานะจาก checkbox
            
            $sql = "UPDATE users SET full_name = ?, email = ?, role = ?, is_active = ? WHERE id = ?";
            $params = [$full_name, $email, $role, $is_active, $user_id];

            if (!empty($_POST['password'])) {
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $sql = "UPDATE users SET full_name = ?, email = ?, role = ?, is_active = ?, password = ? WHERE id = ?";
                $params = [$full_name, $email, $role, $is_active, $password, $user_id];
            }
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            $_SESSION['success_message'] = 'แก้ไขข้อมูลผู้ใช้สำเร็จ!';
        }
        // --- Action: ลบผู้ใช้ ---
        elseif (isset($_POST['delete_user'])) {
            $user_id = $_POST['user_id'];
            if ($user_id == $_SESSION['user_id']) {
                 throw new Exception("ไม่สามารถลบบัญชีของตัวเองได้");
            }
            $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
            $stmt->execute([$user_id]);
            $_SESSION['success_message'] = 'ลบผู้ใช้สำเร็จ!';
        }
        // --- Action: อนุมัติผู้ใช้ ---
        elseif (isset($_POST['approve_user'])) {
            $user_id = $_POST['user_id'];
            $stmt = $pdo->prepare("UPDATE users SET is_active = 1 WHERE id = ?");
            $stmt->execute([$user_id]);
            $_SESSION['success_message'] = 'อนุมัติผู้ใช้งานสำเร็จ!';
        }

        $pdo->commit();
    } catch (Exception $e) {
        $pdo->rollBack();
        $_SESSION['error_message'] = 'เกิดข้อผิดพลาด: ' . $e->getMessage();
    }
    // Redirect กลับมาที่หน้าเดิมเพื่อแสดงผลลัพธ์
    header("Location: manage_users.php");
    exit();
}
// -- จบส่วน Action --

// ดึงข้อมูลผู้ใช้ทั้งหมดจากฐานข้อมูล (เรียงตามสถานะก่อน แล้วตามด้วย ID)
$stmt = $pdo->query("SELECT id, username, full_name, email, role, created_at, is_active FROM users ORDER BY is_active ASC, id ASC");
$users = $stmt->fetchAll();

require '../includes/header.php';
?>

<h2><i class="bi bi-people-fill"></i> จัดการผู้ใช้งาน</h2>
<hr>

<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal">
    <i class="bi bi-plus-circle"></i> เพิ่มผู้ใช้ใหม่
</button>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>Email</th>
                        <th>สิทธิ์ (Role)</th>
                        <th>สถานะ</th>
                        <th class="text-center">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <!-- เพิ่ม class สีพื้นหลังสำหรับแถวที่รออนุมัติ เพื่อให้เห็นเด่นชัด -->
                    <tr class="<?= $user['is_active'] == 0 ? 'table-warning' : '' ?>">
                        <td><?= $user['id'] ?></td>
                        <td><?= htmlspecialchars($user['username']) ?></td>
                        <td><?= htmlspecialchars($user['full_name']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><span class="badge bg-dark"><?= htmlspecialchars(ucfirst($user['role'])) ?></span></td>
                        <td>
                            <?php if ($user['is_active'] == 1): ?>
                                <span class="badge bg-success"><i class="bi bi-check-circle-fill"></i> ใช้งานได้</span>
                            <?php else: ?>
                                <span class="badge bg-warning text-dark"><i class="bi bi-hourglass-split"></i> รออนุมัติ</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <?php if ($user['is_active'] == 0): ?>
                                <form action="manage_users.php" method="POST" class="d-inline">
                                    <?= csrf_input_field() ?>
                                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                    <button type="submit" name="approve_user" class="btn btn-success btn-sm" title="อนุมัติผู้ใช้งานนี้">
                                        <i class="bi bi-check-lg"></i> อนุมัติ
                                    </button>
                                </form>
                            <?php endif; ?>

                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal-<?= $user['id'] ?>" title="แก้ไขข้อมูล">
                                <i class="bi bi-pencil-fill"></i> แก้ไข
                            </button>
                            
                            <?php if ($user['id'] != $_SESSION['user_id']): // ป้องกัน Admin ลบบัญชีของตัวเอง ?>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal-<?= $user['id'] ?>" title="ลบผู้ใช้">
                                <i class="bi bi-trash-fill"></i> ลบ
                            </button>
                            <?php endif; ?>
                        </td>
                    </tr>
                    
                    <!-- Modal สำหรับแก้ไขผู้ใช้ (Edit User Modal) -->
                    <div class="modal fade" id="editUserModal-<?= $user['id'] ?>" tabindex="-1" aria-labelledby="editUserModalLabel-<?= $user['id'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="manage_users.php" method="POST">
                                    <?= csrf_input_field() ?>
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editUserModalLabel-<?= $user['id'] ?>">แก้ไขผู้ใช้: <?= htmlspecialchars($user['username']) ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                        <div class="mb-3">
                                            <label class="form-label">ชื่อ-นามสกุล</label>
                                            <input type="text" name="full_name" class="form-control" value="<?= htmlspecialchars($user['full_name']) ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">รหัสผ่านใหม่ (กรอกเพื่อเปลี่ยน)</label>
                                            <input type="password" name="password" class="form-control" placeholder="ไม่ต้องกรอกถ้าไม่ต้องการเปลี่ยน">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">สิทธิ์ (Role)</label>
                                            <select name="role" class="form-select" required>
                                                <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                                                <option value="staff" <?= $user['role'] == 'staff' ? 'selected' : '' ?>>Staff</option>
                                                <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                            </select>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="is_active_<?= $user['id'] ?>" name="is_active" value="1" <?= $user['is_active'] ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="is_active_<?= $user['id'] ?>">สถานะใช้งาน (Active)</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                        <button type="submit" name="edit_user" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal สำหรับลบผู้ใช้ (Delete User Modal) -->
                    <div class="modal fade" id="deleteUserModal-<?= $user['id'] ?>" tabindex="-1" aria-labelledby="deleteUserModalLabel-<?= $user['id'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="manage_users.php" method="POST">
                                    <?= csrf_input_field() ?>
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteUserModalLabel-<?= $user['id'] ?>">ยืนยันการลบ</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                        <p>คุณแน่ใจหรือไม่ว่าต้องการลบผู้ใช้ <strong><?= htmlspecialchars($user['username']) ?></strong> ? การกระทำนี้ไม่สามารถย้อนกลับได้</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                        <button type="submit" name="delete_user" class="btn btn-danger">ยืนยันการลบ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal สำหรับเพิ่มผู้ใช้ใหม่ (Add User Modal) -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="manage_users.php" method="POST">
                <?= csrf_input_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">เพิ่มผู้ใช้ใหม่</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                     <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ชื่อ-นามสกุล</label>
                        <input type="text" name="full_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">สิทธิ์ (Role)</label>
                        <select name="role" class="form-select" required>
                            <option value="user" selected>User</option>
                            <option value="staff">Staff</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" name="add_user" class="btn btn-primary">เพิ่มผู้ใช้</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require '../includes/footer.php';
?>