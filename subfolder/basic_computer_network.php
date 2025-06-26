<?php
$pageTitle = 'การใช้งานคอมพิวเตอร์และเครือข่ายเบื้องต้น';
// เนื่องจากไฟล์นี้ย้ายไป subfolder, base path ต้องกลับไป 1 ระดับ
$base_path = '../';
include '../partials/head.php'; // ปรับ path การ include
?>

    <header class="unified-header">
        <div class="unified-header-content">
            <a href="../index.php" class="back-button">← กลับสู่เมนูหลัก</a> <img src="https://media.jobthai.com/v1/images/logo-pic-map/309288_pic_20220902165518.jpeg?type=webp&width=3840&quality=50&blur=1" alt="Archem Logo" class="header-logo">
        </div>
    </header>

    <div class="container">
        <div class="sub-header">
            <h1>การใช้งานคอมพิวเตอร์และเครือข่ายเบื้องต้น</h1>
            <p>เรียนรู้พื้นฐานที่สำคัญสำหรับการทำงานในสภาพแวดล้อมดิจิทัลของเรา</p>
        </div>

        <h2 class="section-title">หัวข้อการเรียนรู้ (คลิกเพื่ออ่าน)</h2>

        <div class="featured-topic-box" data-topic-id="1">
            <div class="header">
                <span class="icon"><i class="fa-solid fa-desktop"></i></span>
                <span class="title">การใช้งานคอมพิวเตอร์พื้นฐาน</span>
            </div>
            <p>เรียนรู้การใช้งานคอมพิวเตอร์เบื้องต้นที่จำเป็น เช่น ส่วนประกอบ, การจัดการไฟล์, โปรแกรมพื้นฐาน และการเชื่อมต่ออุปกรณ์</p>
        </div>

        <div class="topic-grid-container">
            <div class="topic-box" data-topic-id="2"><span class="icon"><i class="fa-solid fa-shield-virus"></i></span><span class="title">ความปลอดภัยเบื้องต้น</span></div>
            <div class="topic-box" data-topic-id="3"><span class="icon"><i class="fa-solid fa-key"></i></span><span class="title">การจัดการบัญชีและรหัสผ่าน</span></div>
            <div class="topic-box" data-topic-id="4"><span class="icon"><i class="fa-solid fa-folder-open"></i></span><span class="title">การจัดการข้อมูลและไฟล์</span></div>
            <div class="topic-box" data-topic-id="5"><span class="icon"><i class="fa-solid fa-envelope-circle-check"></i></span><span class="title">การใช้อีเมลอย่างปลอดภัย</span></div>
            <div class="topic-box" data-topic-id="6"><span class="icon"><i class="fa-solid fa-wifi"></i></span><span class="title">การใช้อินเทอร์เน็ตอย่างเหมาะสม</span></div>
            <div class="topic-box" data-topic-id="7"><span class="icon"><i class="fa-solid fa-bug-slash"></i></span><span class="title">การจัดการโปรแกรมป้องกันไวรัส</span></div>
            <div class="topic-box" data-topic-id="8"><span class="icon"><i class="fa-solid fa-hard-drive"></i></span><span class="title">การจัดการอุปกรณ์จัดเก็บข้อมูลภายนอก</span></div>
            <div class="topic-box" data-topic-id="9"><span class="icon"><i class="fa-solid fa-boxes-stacked"></i></span><span class="title">การจัดการทรัพย์สิน IT ของบริษัท</span></div>
            <div class="topic-box" data-topic-id="10"><span class="icon"><i class="fa-solid fa-triangle-exclamation"></i></span><span class="title">การรายงานเหตุการณ์ด้านความปลอดภัย</span></div>
            <div class="topic-box" data-topic-id="11"><span class="icon"><i class="fa-solid fa-gavel"></i></span><span class="title">การปฏิบัติตามกฎหมายและนโยบาย</span></div>
        </div>

        <?php include '../partials/footer.php'; ?> </div>

    <div class="modal-overlay" id="topicModal">
        <div class="modal-content">
            <button class="modal-close-btn">×</button>
            <div class="modal-header">
                <h3 id="modalTitle"></h3>
            </div>
            <div class="modal-body" id="modalBody">
            </div>
        </div>
    </div>

    <div id="topic-content-storage" style="display: none;">
        <div data-content-id="1">
            <div class="content-section modal-intro">
                <p>ในหัวข้อนี้ ท่านจะได้เรียนรู้เกี่ยวกับการใช้งานคอมพิวเตอร์เบื้องต้นที่จำเป็นสำหรับการทำงานในชีวิตประจำวัน เช่น:</p>
            </div>
            <div class="content-section modal-points">
                <ul>
                    <li>ส่วนประกอบหลักของคอมพิวเตอร์ (Hardware)</li>
                    <li>ระบบปฏิบัติการและการจัดการไฟล์ (Windows OS & File Management)</li>
                    <li>การใช้งานโปรแกรมพื้นฐาน (เช่น Web Browser, Microsoft Office)</li>
                    <li>การเชื่อมต่ออุปกรณ์ภายนอก (Printer, USB Drive)</li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                <p><strong>คำแนะนำ:</strong> ทำความเข้าใจกับโครงสร้างของคอมพิวเตอร์และฝึกฝนการจัดการไฟล์อย่างเป็นระเบียบจะช่วยให้การทำงานมีประสิทธิภาพมากขึ้น</p>
            </div>
        </div>
        <div data-content-id="2">
            <div class="content-section modal-intro">
                <p>ความปลอดภัยของข้อมูลเป็นสิ่งสำคัญสูงสุด ในส่วนนี้ ท่านจะได้เรียนรู้ถึงวิธีการปกป้องข้อมูลและอุปกรณ์ของท่านจากภัยคุกคามต่างๆ:</p>
            </div>
            <div class="content-section modal-points">
                <ul>
                    <li>การสร้างและจัดการรหัสผ่านที่แข็งแกร่ง</li>
                    <li>การระวังอีเมลฟิชชิ่ง (Phishing) และลิงก์ที่น่าสงสัย</li>
                    <li>การติดตั้งและอัปเดตโปรแกรม Antivirus</li>
                    <li>ความสำคัญของการสำรองข้อมูลอย่างสม่ำเสมอ</li>
                    <li>นโยบายการใช้งานอินเทอร์เน็ตของบริษัท</li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                <p><strong>คำแนะนำ:</strong> การปฏิบัติตามแนวทางความปลอดภัยเบื้องต้นอย่างเคร่งครัดจะช่วยลดความเสี่ยงต่อการถูกโจมตีทางไซเบอร์</p>
            </div>
        </div>
        <div data-content-id="3">
            <div class="content-section modal-intro">
                 <p>เรียนรู้การสร้างรหัสผ่านที่ปลอดภัย และวิธีการจัดการบัญชีผู้ใช้งานเพื่อให้มั่นใจในความปลอดภัยของข้อมูล:</p>
            </div>
            <div class="content-section modal-points">
                <ul>
                    <li>หลักการพื้นฐานเพื่อความปลอดภัยสูงสุดในการตั้งรหัสผ่าน </li>
                    <li>ข้อกำหนดด้านความยาวของรหัสผ่าน โดยรหัสผ่านทั่วไปต้องมีความยาวอย่างน้อย 8 ตัวอักษร </li>
                    <li>ข้อกำหนดประเภทของตัวอักษรเพื่อเพิ่มความซับซ้อน โดยควรประกอบด้วยองค์ประกอบอย่างน้อย 3 ใน 4 ประเภท (ตัวอักษรพิมพ์ใหญ่, พิมพ์เล็ก, ตัวเลข, อักขระพิเศษ) </li>
                    <li>แนะนำให้เปลี่ยนรหัสผ่านทุก 6 เดือน หรือทันทีหากสงสัยว่ารหัสผ่านถูกเปิดเผย </li>
                    <li>การจัดการบัญชี: ห้ามเปิดเผยหรือแบ่งปันรหัสผ่านกับผู้อื่น และเปลี่ยนรหัสผ่านทันทีหลังจากได้รับรหัสผ่านเริ่มต้น </li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                 <p><strong>คำแนะนำ:</strong> หลีกเลี่ยงการใช้ข้อมูลส่วนตัวที่คาดเดาง่าย และเปิดใช้งานการยืนยันตัวตนแบบสองขั้นตอน (2FA) เสมอ </p>
            </div>
        </div>
        <div data-content-id="4">
            <div class="content-section modal-intro">
                <p>ทำความเข้าใจแนวทางการจัดเก็บข้อมูล การจำแนกประเภทข้อมูลสำคัญ และการสำรองข้อมูลอย่างปลอดภัย:</p>
            </div>
            <div class="content-section modal-points">
                <ul>
                    <li>การจัดการข้อมูลสำคัญจะต้องดำเนินการตามข้อกำหนดที่เกี่ยวข้อง เช่น "แนวทางการจัดการเอกสาร" และ "แนวทางการจัดการข้อมูลส่วนบุคคล" </li>
                    <li>ข้อมูลสำคัญจะต้องถูกจัดเก็บไว้บน Google Drive และไม่ควรจัดเก็บไว้ในเครื่องคอมพิวเตอร์ส่วนบุคคล </li>
                    <li>ระบบจะมีการบันทึกการใช้งานคอมพิวเตอร์หรืออุปกรณ์พกพา เช่น การรับ-ส่งอีเมล การใช้อินเทอร์เน็ต และการเข้าถึงข้อมูล </li>
                    <li>การสำรองข้อมูลและไฟล์ควรมีการกำหนดขอบเขตและช่วงความถี่ในการสำรองตามความสำคัญของข้อมูล </li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                <p><strong>คำแนะนำ:</strong> จัดเก็บข้อมูลสำคัญบน Google Drive เท่านั้น และเข้ารหัสข้อมูลเมื่อจำเป็น </p>
            </div>
        </div>
        <div data-content-id="5">
            <div class="content-section modal-intro">
                <p>เรียนรู้วิธีการใช้งานอีเมลของบริษัท การระบุอีเมลที่น่าสงสัย และการตรวจสอบผู้รับก่อนส่งอีเมล:</p>
            </div>
            <div class="content-section modal-points">
                <ul>
                    <li>ผู้ใช้งานจะต้องใช้บัญชีอีเมลที่บริษัทจัดหาให้สำหรับการติดต่อสื่อสารในเรื่องงานเท่านั้น </li>
                    <li>หากได้รับอีเมลที่มีลักษณะน่าสงสัย เช่น มีไฟล์แนบที่ไม่รู้จัก หรือมีลิงก์ (URL) ที่ไม่น่าเชื่อถือ ผู้ใช้งานจะต้องไม่เปิดไฟล์แนบดังกล่าว ไม่คลิกลิงก์ และลบอีเมลนั้นทิ้งทันที </li>
                    <li>ก่อนดำเนินการส่งอีเมลทุกครั้ง ผู้ใช้งานจะต้องตรวจสอบความถูกต้องของที่อยู่ผู้รับอย่างละเอียด </li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                 <p><strong>คำแนะนำ:</strong> ใช้บัญชีอีเมลของบริษัทเพื่องานเท่านั้น และระมัดระวังอีเมลฟิชชิ่ง </p>
            </div>
        </div>
        <div data-content-id="6">
            <div class="content-section modal-intro">
                <p>ทำความเข้าใจนโยบายการใช้งานอินเทอร์เน็ตของบริษัท และข้อจำกัดในการเผยแพร่ข้อมูลบนบริการคลาวด์สาธารณะ:</p>
            </div>
            <div class="content-section modal-points">
                 <ul>
                    <li>ห้ามเผยแพร่ข้อมูลที่เกี่ยวข้องกับการปฏิบัติงานของบริษัทบนบริการคลาวด์สาธารณะ หรือโซเชียลมีเดียต่างๆ เว้นแต่จะได้รับอนุญาตเป็นลายลักษณ์อักษรจากฝ่าย IT </li>
                    <li>การใช้งานบริการคลาวด์สาธารณะเพื่อวัตถุประสงค์ทางธุรกิจ จะต้องได้รับการอนุมัติล่วงหน้าจากฝ่าย IT </li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                 <p><strong>คำแนะนำ:</strong> ห้ามเผยแพร่ข้อมูลที่เกี่ยวข้องกับการปฏิบัติงานของบริษัทบนบริการคลาวด์สาธารณะโดยไม่ได้รับอนุญาต </p>
            </div>
        </div>
        <div data-content-id="7">
            <div class="content-section modal-intro">
                <p>เรียนรู้ความสำคัญของการติดตั้งและอัปเดตโปรแกรมป้องกันไวรัส:</p>
            </div>
            <div class="content-section modal-points">
                <ul>
                    <li>คอมพิวเตอร์ทุกเครื่องที่ใช้งานในบริษัท จะต้องติดตั้งโปรแกรมป้องกันไวรัสที่ได้รับอนุญาตจากฝ่าย IT </li>
                    <li>โปรแกรมป้องกันไวรัสจะต้องมีการอัปเดตฐานข้อมูลไวรัสให้เป็นปัจจุบันอยู่เสมอ </li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                 <p><strong>คำแนะนำ:</strong> ตรวจสอบให้แน่ใจว่าโปรแกรมป้องกันไวรัสมีการอัปเดตฐานข้อมูลไวรัสเป็นปัจจุบันเสมอ </p>
            </div>
        </div>
        <div data-content-id="8">
             <div class="content-section modal-intro">
                <p>ทำความเข้าใจข้อจำกัดในการใช้งาน และแนวทางการปกป้องข้อมูลในอุปกรณ์จัดเก็บข้อมูลภายนอก:</p>
            </div>
            <div class="content-section modal-points">
                <ul>
                    <li>อุปกรณ์ PC มาตรฐานของ Archem จะมีการตั้งค่าเพื่อจำกัดการอ่านและเขียนข้อมูลบนอุปกรณ์จัดเก็บข้อมูลภายนอก หากจำเป็นต้องใช้งาน จะต้องยื่นคำขอผ่านระบบที่บริษัทกำหนด </li>
                    <li>ข้อมูลสำคัญที่จัดเก็บอยู่ในอุปกรณ์จัดเก็บข้อมูลภายนอก จะต้องได้รับการเข้ารหัสเพื่อความปลอดภัย </li>
                    <li>อุปกรณ์ที่ใช้บันทึกข้อมูลสำคัญจะต้องถูกเก็บไว้ในสถานที่ที่สามารถล็อกได้อย่างปลอดภัย และมีการตรวจสอบอย่างสม่ำเสมอ </li>
                    <li>ก่อนทิ้งหรือส่งคืนอุปกรณ์จัดเก็บข้อมูล จะต้องดำเนินการลบข้อมูลที่อยู่ภายในอุปกรณ์โดยใช้วิธีการที่เหมาะสมเพื่อให้มั่นใจว่าข้อมูลดังกล่าวไม่สามารถกู้คืนได้อีก </li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                 <p><strong>คำแนะนำ:</strong> ข้อมูลสำคัญที่จัดเก็บในอุปกรณ์ภายนอกจะต้องได้รับการเข้ารหัส และลบข้อมูลอย่างปลอดภัยก่อนทิ้ง </p>
            </div>
        </div>
        <div data-content-id="9">
            <div class="content-section modal-intro">
                 <p>เรียนรู้นโยบายการจัดการสินทรัพย์ IT และหน้าที่ความรับผิดชอบของผู้ใช้งานในการดูแลรักษา:</p>
            </div>
            <div class="content-section modal-points">
                <ul>
                    <li>ห้ามนำอุปกรณ์ IT ส่วนตัว (Bring Your Own Device: BYOD) มาใช้ในการปฏิบัติงานของบริษัทโดยเด็ดขาด </li>
                    <li>เครื่องมือ IT ทุกประเภทที่บริษัทจัดหาให้ จะต้องถูกนำมาใช้เพื่อวัตถุประสงค์ในการปฏิบัติงานของบริษัทเท่านั้น </li>
                    <li>ในการใช้งานเครือข่ายอาเคม หรือ Google Workspace ของบริษัท ผู้ใช้งานจำเป็นต้องปฏิบัติตามข้อกำหนด "สเปก PC มาตรฐานอาเคม" </li>
                    <li>สินทรัพย์ไอที รวมถึงคอมพิวเตอร์ เซิร์ฟเวอร์ เครื่องพิมพ์ อุปกรณ์เครือข่าย ระบบปฏิบัติการ ซอฟต์แวร์ และข้อมูล </li>
                    <li>IT Asset Management (ITAM) จะดำเนินการโดย IT Asset Manager และ System Administrator อย่างน้อยปีละครั้ง </li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                <p><strong>คำแนะนำ:</strong> ห้ามนำอุปกรณ์ IT ส่วนตัว (BYOD) มาใช้ในการทำงาน และต้องปฏิบัติตามสเปก PC มาตรฐานของ Archem </p>
            </div>
        </div>
        <div data-content-id="10">
            <div class="content-section modal-intro">
                <p>ทำความเข้าใจขั้นตอนการรายงานเมื่อเกิดเหตุการณ์ด้านความปลอดภัย เช่น การสูญหายของอุปกรณ์ การติดไวรัส หรือการเข้าถึงโดยไม่ได้รับอนุญาต:</p>
            </div>
            <div class="content-section modal-points">
                <ul>
                    <li>หากคอมพิวเตอร์หรือสื่อบันทึกข้อมูลเกิดการสูญหาย ถูกโจรกรรม หรือติดไวรัสคอมพิวเตอร์ ผู้ใช้งานจะต้องปฏิบัติตาม "ขั้นตอนจัดการอุบัติการณ์ด้าน IT" โดยทันที </li>
                    <li>ผู้ดูแลระบบจะดำเนินการสอบสวนและแจ้งเหตุการณ์ที่น่าสงสัย </li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                <p><strong>คำแนะนำ:</strong> รายงานเหตุการณ์ด้านความปลอดภัยทันทีที่พบ เพื่อให้ทีม IT สามารถดำเนินการได้อย่างรวดเร็ว </p>
            </div>
        </div>
        <div data-content-id="11">
            <div class="content-section modal-intro">
                 <p>เรียนรู้ข้อกำหนดเกี่ยวกับการใช้ซอฟต์แวร์ลิขสิทธิ์ และการให้ข้อมูลกับหน่วยงานภายนอก:</p>
            </div>
            <div class="content-section modal-points">
                <ul>
                    <li>ผู้ใช้งานจะต้องปฏิบัติตาม "แนวทางการจัดการลิขสิทธิ์" อย่างเคร่งครัด และห้ามติดตั้งหรือใช้งานซอฟต์แวร์ที่ไม่ได้รับอนุญาตหรือละเมิดลิขสิทธิ์โดยเด็ดขาด </li>
                    <li>ในกรณีที่หน่วยงานภายนอก เช่น เจ้าหน้าที่ตำรวจ หรือศาล มีการร้องขอข้อมูล ผู้ใช้งานจะต้องปฏิบัติตามคำแนะนำของฝ่ายกฎหมายของบริษัทอย่างเคร่งครัด </li>
                    <li>ผู้ใช้งานต้องปฏิบัติตามกฎหมายและข้อกำหนดทั้งหมด </li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                 <p><strong>คำแนะนำ:</strong> ห้ามติดตั้งหรือใช้งานซอฟต์แวร์ละเมิดลิขสิทธิ์ และปฏิบัติตามคำแนะนำของฝ่ายกฎหมายเมื่อมีการร้องขอข้อมูลจากภายนอก </p>
            </div>
        </div>
    </div>

    <script>
        // JavaScript เดิมทั้งหมด ไม่มีการเปลี่ยนแปลง
        document.addEventListener('DOMContentLoaded', () => {
            const topicBoxes = document.querySelectorAll('.topic-box, .featured-topic-box');
            const modal = document.getElementById('topicModal');
            const modalTitle = document.getElementById('modalTitle');
            const modalBody = document.getElementById('modalBody');
            const closeModalBtn = modal.querySelector('.modal-close-btn');

            const openModal = (topicId) => {
                const titleElement = document.querySelector(`[data-topic-id="${topicId}"] .title`);
                const contentElement = document.querySelector(`#topic-content-storage [data-content-id="${topicId}"]`);

                if (titleElement && contentElement) {
                    modalTitle.textContent = titleElement.textContent;
                    modalBody.innerHTML = contentElement.innerHTML;
                    modal.classList.add('is-visible');
                }
            };

            const closeModal = () => {
                modal.classList.remove('is-visible');
            };

            topicBoxes.forEach(box => {
                box.addEventListener('click', () => {
                    const topicId = box.dataset.topicId;
                    openModal(topicId);
                });
            });

            closeModalBtn.addEventListener('click', closeModal);

            modal.addEventListener('click', (event) => {
                if (event.target === modal) {
                    closeModal();
                }
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && modal.classList.contains('is-visible')) {
                    closeModal();
                }
            });
        });
    </script>
</body>
</html>