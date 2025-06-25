<?php 
// กำหนด Title และ Path สำหรับหน้านี้
$pageTitle = 'ระบบ E-Learning IT สำหรับพนักงาน';
$base_path = './'; // Path พื้นฐานสำหรับไฟล์ที่อยู่ Root Directory
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
        
        <!-- EDITED: เปลี่ยนชื่อหัวข้อ และอัปเดตลิงก์ -->
        <h2 class="section-title">เร็วๆนี้</h2>
        <ul class="course-list">
             <li>
                <div class="course-icon">
                    <img src="https://img.icons8.com/plasticine/100/document.png" alt="3D Document Icon">
                </div>
                <div class="course-content">
                    <h3>แบบทดสอบ IT Security Education for 2025 !! (เร็วๆนี้)</h3>
                    <p>เตรียมพบกับการทดสอบความรู้ด้านความปลอดภัยทางไซเบอร์ที่กำลังจะมาถึง</p>
                    <p>เร็วๆนี้ coming soon</p>
                    <a href="TEST_Edu_2025/eduth.php">อ่านรายละเอียด V.TH (เร็วๆนี้)</a>
                    <a href="TEST_Edu_2025/edueng.php">Read Details V.ENG (Coming Soon)</a>
                </div>
            </li>
             <li>
                <div class="course-icon">
                    <img src="https://img.icons8.com/plasticine/100/google-logo.png" alt="3D Google Icon">
                </div>
                <div class="course-content">
                    <h3>เข้าสู่ระบบ E-Learning Google Classroom</h3>
                    <p>สำหรับเข้าสู่แพลตฟอร์ม Google Classroom เพื่อเรียนรู้บทเรียนเพิ่มเติมและทำแบบทดสอบ</p>
                    <a href="https://classroom.google.com/" target="_blank">ไปที่ Google Classroom</a>
                </div>
            </li>
        </ul>

        <!-- EDITED: เปลี่ยนชื่อหัวข้อ -->
        <h2 class="section-title">หัวข้อ</h2>
        <ul class="course-list">
            <li>
                <div class="course-icon">
                    <img src="https://img.icons8.com/plasticine/100/laptop.png" alt="3D Laptop Icon">
                </div>
                <div class="course-content">
                    <h3>การใช้งานคอมพิวเตอร์และเครือข่ายเบื้องต้น</h3>
                    <p>เรียนรู้พื้นฐานการใช้งานคอมพิวเตอร์ การเชื่อมต่อเครือข่าย และการเข้าถึงทรัพยากรของบริษัท</p>
                    <a href="basic_computer_network.php">อ่านบทเรียน</a>
                </div>
            </li>
            <li>
                <div class="course-icon">
                    <img src="https://img.icons8.com/plasticine/100/firewall.png" alt="3D Security Shield Icon">
                </div>
                <div class="course-content">
                    <h3>ความปลอดภัยทางไซเบอร์และนโยบาย IT</h3>
                    <p>ทำความเข้าใจภัยคุกคามทางไซเบอร์ วิธีป้องกันตัว และปฏิบัติตามนโยบายด้าน IT ของบริษัท</p>
                    <a href="maintence%20PIC.webp" target="_blank">อ่านบทเรียน</a>
                </div>
            </li>
            <li>
                <div class="course-icon">
                    <img src="https://img.icons8.com/plasticine/100/database.png" alt="3D Database Icon">
                </div>
                <div class="course-content">
                    <h3>การจัดเก็บและสำรองข้อมูลอย่างปลอดภัย</h3>
                    <p>แนวทางการจัดเก็บไฟล์ การใช้ Shared Drive และความสำคัญของการสำรองข้อมูล</p>
                    <a href="maintence%20PIC.webp" target="_blank">อ่านบทเรียน</a>
                </div>
            </li>
            <li>
                <div class="course-icon">
                    <img src="https://img.icons8.com/plasticine/100/module.png" alt="3D Modules Icon">
                </div>
                <div class="course-content">
                    <h3>โปรแกรมพื้นฐานที่ใช้ในโรงงาน (SAP, Office 365)</h3>
                    <p>แนะนำการใช้งานเบื้องต้นของโปรแกรมสำคัญ เช่น SAP B1 และ Microsoft Office 365</p>
                    <a href="maintence%20PIC.webp" target="_blank">อ่านบทเรียน</a>
                </div>
            </li>
        </ul>

        <!-- EDITED: เพิ่มหัวข้อและรายการใหม่ -->
        <h2 class="section-title">อื่นๆ</h2>
        <ul class="course-list">
             <li>
                <div class="course-icon">
                    <img src="https://img.icons8.com/plasticine/100/customer-support.png" alt="3D Support Icon">
                </div>
                <div class="course-content">
                    <h3>ติดต่อแผนก IT</h3>
                    <p>ข้อมูลติดต่อและช่องทางด่วนในการแจ้งปัญหา หรือขอความช่วยเหลือจากทีม IT</p>
                    <a href="https://contacts.google.com/ratchanon.rattanaubol@archem.inc" target="_blank">ดูข้อมูลติดต่อ</a>
                </div>
            </li>
        </ul>

        <?php include 'partials/footer.php'; ?>

    </div>

    <div class="floating-widget-container" id="floatingWidget">
        <button class="widget-toggle-button" id="widgetToggleButton">
            <span>เครื่องมือ & ปฏิทิน</span>
            <i class="fa-solid fa-chevron-up"></i>
        </button>
        <div class="widget-content">
            <div id="live-clock"></div>
            <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&ctz=Asia%2FBangkok&showPrint=0&src=Y18xODhjZWNvbzNkcGJzaWR1aWFpMXFtaWNpNmNscUByZXNvdXJjZS5jYWxlbmRhci5nb29nbGUuY29t&src=Y18xODhiNjhuNDFhM2ZnamswbjJjcmtsNzk4azM3c0ByZXNvdXJjZS5jYWxlbmRhci5nb29nbGUuY29t" 
                    class="google-calendar-iframe">
            </iframe>
        </div>
    </div>


    <script>
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const timeString = `${hours}:${minutes}:${seconds}`;
            
            const clockElement = document.getElementById('live-clock');
            if (clockElement) {
                clockElement.textContent = timeString;
            }
        }
        setInterval(updateClock, 1000);
        updateClock();

        const widgetToggleButton = document.getElementById('widgetToggleButton');
        const floatingWidget = document.getElementById('floatingWidget');

        widgetToggleButton.addEventListener('click', () => {
            floatingWidget.classList.toggle('is-open');
        });
    </script>
</body>
</html>