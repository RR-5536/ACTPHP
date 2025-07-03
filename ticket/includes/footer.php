<?php // FILE: ticket/includes/footer.php ?>
</main> <!-- close container -->
<footer class="bg-light text-center text-lg-start mt-auto py-3">
  <div class="text-center">© <?= date('Y') ?> Archem Thailand - HelpDesk System</div>
</footer>
<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100">
  <div id="approvalToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header"><i class="bi bi-person-check-fill me-2 text-primary"></i><strong class="me-auto">การอนุมัติผู้ใช้</strong><small>เมื่อสักครู่</small><button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button></div>
    <div class="toast-body" id="toast-body-content">มีผู้ใช้ใหม่กำลังรอการอนุมัติ!</div>
  </div>
</div>
<?php endif; ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(document).ready(function() {
    lightbox.option({'resizeDuration': 200, 'fadeDuration': 300, 'imageFadeDuration': 300, 'wrapAround': true });
    const csrfToken = '<?= $_SESSION["csrf_token"] ?? "" ?>';
    $('#notificationDropdown').on('show.bs.dropdown', function () {
        if ($('#notification-badge').length > 0) {
            $.ajax({
                url: '/ticket/ajax_mark_read.php',
                type: 'POST',
                dataType: 'json',
                data: { csrf_token: csrfToken },
                success: function(response) { if(response.status === 'success') { $('#notification-badge').remove(); } }
            });
        }
    });
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
    const approvalToastEl = document.getElementById('approvalToast');
    const approvalToast = new bootstrap.Toast(approvalToastEl);
    let lastPendingCount = -1;
    function checkApproval() {
        $.ajax({
            url: '/ticket/ajax_check_approval.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.status === 'success' && data.pending_count > 0) {
                    if (lastPendingCount !== -1 && data.pending_count > lastPendingCount) {
                        $('#toast-body-content').html(`มีผู้ใช้ใหม่ <b>${data.pending_count} คน</b> รออนุมัติ <br>ล่าสุด: ${data.pending_users}`);
                        approvalToast.show();
                    }
                    lastPendingCount = data.pending_count;
                } else if (data.status === 'success') { lastPendingCount = 0; }
            }
        });
    }
    checkApproval(); 
    setInterval(checkApproval, 30000);
    <?php endif; ?>
});
</script>
</body>
</html>