<?php
// กำหนด title เริ่มต้นหากไม่มีการตั้งค่าจากหน้าอื่น
if (!isset($pageTitle)) {
    $pageTitle = 'ระบบ E-Learning IT สำหรับพนักงาน';
}
// กำหนด base path เริ่มต้นถ้ายังไม่มีการตั้งค่า
if (!isset($base_path)) {
    $base_path = './';
}
include 'partials/head.php';
?>

    <div class="container">
        <header class="main-header">
            <div class="logo-container">
                <img src="https://media.jobthai.com/v1/images/logo-pic-map/309288_pic_20220902165518.jpeg?type=webp&width=3840&quality=50&blur=1" alt="Archem E-Learning Logo">
            </div>
            <p>แหล่งรวมความรู้ด้านเทคโนโลยีสารสนเทศที่สำคัญ เพื่อให้พนักงานทุกคนเข้าใจและใช้งานระบบได้อย่างมีประสิทธิภาพ</p>
            <p>จัดทำโดย แผนก IT - Facility Systems Develop</p>
        </header>

        <h2 class="section-title">เร็วๆนี้</h2>
        <ul class="course-list">
             <li>
                <div class="course-icon">
                    <img src="https://img.icons8.com/plasticine/100/book.png" alt="Book Icon">
                </div>
                <div class="course-content">
                    <h3>เนื้อหาที่ต้องอ่านก่อนทำแบบทดสอบ</h3>
                    <p>เตรียมพบกับการทดสอบความรู้ด้านความปลอดภัยทางไซเบอร์ที่กำลังจะมาถึง</p>
                    <a href="TEST_Edu_2025/eduth.php">อ่านรายละเอียด V.TH (เร็วๆนี้)</a>
                    <a href="TEST_Edu_2025/edueng.php">Read Details V.ENG (Coming Soon)</a>
                </div>
            </li>
            <li>
                <div class="course-icon">
                    <img src="https://img.icons8.com/plasticine/100/checklist.png" alt="Quiz Icon">
                </div>
                <div class="course-content">
                    <h3>แบบทดสอบ IT Security Education for 2025</h3>
                    <p>ทำแบบทดสอบเพื่อประเมินความเข้าใจของคุณเกี่ยวกับความปลอดภัยด้านไอที</p>
                    <a href="https://forms.gle/kjse9ZTXGaNmAJwVA" target="_blank">แบบทดสอบ</a>
                    <a href="https://forms.gle/akaKLDwS54BNGQVL7" target="_blank">IT TEST</a>
                </div>
            </li>
             <li>
                <div class="course-icon">
                    <img src="https://img.icons8.com/plasticine/100/google-logo.png" alt="Google Icon">
                </div>
                <div class="course-content">
                    <h3>เข้าสู่ระบบ E-Learning Google Classroom</h3>
                    <p>สำหรับเข้าสู่แพลตฟอร์ม Google Classroom เพื่อเรียนรู้บทเรียนเพิ่มเติมและทำแบบทดสอบ</p>
                    <a href="https://classroom.google.com/" target="_blank">ไปที่ Google Classroom</a>
                </div>
            </li>
        </ul>

        <h2 class="section-title">หัวข้อ</h2>
        <ul class="course-list">
            <li>
                <div class="course-icon">
                    <img src="https://img.icons8.com/plasticine/100/laptop.png" alt="Laptop Icon">
                </div>
                <div class="course-content">
                    <h3>การใช้งานคอมพิวเตอร์และเครือข่ายเบื้องต้น</h3>
                    <p>เรียนรู้พื้นฐานการใช้งานคอมพิวเตอร์ การเชื่อมต่อเครือข่าย และการเข้าถึงทรัพยากรของบริษัท</p>
                    <a href="subfolder/basic_computer_network.php">อ่านบทเรียน (TH)</a>
                    <a href="subfolder/basic_computer_network_eng.php">Read Lesson (ENG)</a>
                </div>
            </li>
            <li>
                <div class="course-icon">
                    <img src="https://img.icons8.com/plasticine/100/firewall.png" alt="Security Shield Icon">
                </div>
                <div class="course-content">
                    <h3>ความปลอดภัยทางไซเบอร์และนโยบาย IT</h3>
                    <p>ทำความเข้าใจภัยคุกคามทางไซเบอร์ วิธีป้องกันตัว และปฏิบัติตามนโยบายด้าน IT ของบริษัท</p>
                    <a href="subfolder/cyber_security_policy_th.php">อ่านบทเรียน</a>
                </div>
            </li>
            <li>
                <div class="course-icon">
                    <img src="https://img.icons8.com/plasticine/100/security-shield.png" alt="Data Protection Icon">
                </div>
                <div class="course-content">
                    <h3>การจัดเก็บและสำรองข้อมูลอย่างปลอดภัย</h3>
                    <p>แนวทางการจัดเก็บไฟล์ การใช้ Shared Drive และความสำคัญของการสำรองข้อมูล</p>
                    <a href="subfolder/data_storage_backup_th.php">อ่านบทเรียน</a>
                </div>
            </li>
            <li>
                <div class="course-icon">
                    <img src="https://img.icons8.com/plasticine/100/module.png" alt="Application Icon">
                </div>
                <div class="course-content">
                    <h3>โปรแกรมพื้นฐานที่ใช้ในโรงงาน (SAP, Office 365)</h3>
                    <p>แนะนำการใช้งานเบื้องต้นของโปรแกรมสำคัญ เช่น SAP B1 และ Microsoft Office 365</p>
                    <a href="subfolder/factory_software_th.php">อ่านบทเรียน</a>
                </div>
            </li>
        </ul>

        <h2 class="section-title">อื่นๆ</h2>
        <ul class="course-list">
             <li>
                <div class="course-icon">
                    <img src="https://img.icons8.com/plasticine/100/customer-support.png" alt="Support Icon">
                </div>
                <div class="course-content">
                    <h3>ติดต่อแผนก IT</h3>
                    <p>ข้อมูลติดต่อและช่องทางด่วนในการแจ้งปัญหา หรือขอความช่วยเหลือจากทีม IT</p>
                    <a href="https://contacts.google.com/ratchanon.rattanaubol@archem.inc" target="_blank">ดูข้อมูลติดต่อ</a>
                </div>
            </li>
            <li>
                <div class="course-icon">
                    <img src="https://img.icons8.com/plasticine/100/error.png" alt="Error Icon">
                </div>
                <div class="course-content">
                    <h3>แจ้งปัญหา </h3>
                    <p>สำหรับแจ้งปัญหาทุกระบบ</p>
                    <a href="http://10.34.1.19/ticket/login.php" onclick="showTestModal()">แจ้งปัญหา</a>
                </div>
            </li>
        </ul>

        <h2 class="section-title">Event Room&IT</h2>
        <div class="google-calendar-container" style="text-align: center; margin-top: 30px; margin-bottom: 30px;">
            <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&ctz=Asia%2FBangkok&showPrint=0&src=ratchanon.rattanaubol@archem.inc&src=c_classroom7d7a1675@group.calendar.google.com&src=c_188cec03dpbsiduiai1qmicci6clq@resource.calendar.google.com&src=c_188b68n41a3fgjk0n2crkl798k37s@resource.calendar.google.com&color=%230b8043&color=%23d50000&color=%23f6bf26&color=%23000000" style="border:solid 1px #777; width: 100%; height: 600px;" frameborder="0" scrolling="no"></iframe>
        </div>

        <?php include 'partials/footer.php'; ?>

    </div>

    <div class="test-modal-overlay" id="testSystemModal">
        <div class="test-modal-content">
            <button class="test-modal-close-btn" id="closeTestModalBtn">×</button>
            <p>กำลังทดสอบระบบครับ</p>
        </div>
    </div>
    <script>
        // Script สำหรับ Test System Modal (แสดงแค่ครั้งเดียว)
        document.addEventListener('DOMContentLoaded', () => {
            const testModal = document.getElementById('testSystemModal');
            const closeBtn = document.getElementById('closeTestModalBtn');

            // 1. ตรวจสอบใน localStorage ว่าผู้ใช้เคยเห็น Modal นี้แล้วหรือยัง
            if (!localStorage.getItem('hasSeenTestModal')) {
                // 2. ถ้ายังไม่เคยเห็น (ค่าเป็น null) ให้แสดง Modal
                setTimeout(() => {
                    if (testModal) {
                        testModal.classList.add('is-visible');
                    }
                }, 500);

                // 3. ตั้งค่าใน localStorage ว่า "เคยเห็นแล้ว" เพื่อไม่ให้แสดงอีกในครั้งต่อไป
                localStorage.setItem('hasSeenTestModal', 'true');
            }

            // ฟังก์ชันสำหรับปิด Modal (ยังคงต้องมีไว้สำหรับครั้งแรกที่แสดง)
            const closeModal = () => {
                if (testModal) {
                    testModal.classList.remove('is-visible');
                }
            };

            if (closeBtn) {
                closeBtn.addEventListener('click', closeModal);
            }

            if (testModal) {
                testModal.addEventListener('click', (event) => {
                    if (event.target === testModal) {
                        closeModal();
                    }
                });
            }
        });

        // Function to show the test modal when "แจ้งปัญหา" is clicked
        function showTestModal() {
            const testModal = document.getElementById('testSystemModal');
            if (testModal) {
                testModal.classList.add('is-visible');
            }
        }
    </script>
</body>
</html>