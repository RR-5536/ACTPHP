<?php 
$pageTitle = 'IT Security Education for 2025';
$base_path = '../'; // พาธพื้นฐานต้องกลับไป 1 ระดับ
include '../partials/head.php'; // พาธสำหรับ include ต้องกลับไป 1 ระดับ
?>
<body class="text-gray-800">

    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto py-2 px-8 flex justify-start items-center relative h-16">
            <a href="http://10.34.1.19/index.php" class="inline-block px-5 py-2 bg-blue-600 text-white font-bold rounded-md hover:bg-blue-700 transition duration-300">
                <i class="fas fa-arrow-left mr-2"></i>กลับสู่เมนูหลัก
            </a>
            <img src="https://media.jobthai.com/v1/images/logo-pic-map/309288_pic_20220902165518.jpeg?type=webp&width=3840&quality=50&blur=1" alt="Archem Logo" class="h-12 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
        </div>
    </header>

    <div class="container mx-auto p-8 bg-white rounded-lg shadow-xl my-10 relative">
        <h1 class="text-4xl font-extrabold text-center text-blue-800 pb-4 border-b-4 border-blue-600 mb-8">
            IT Security Education for 2025
        </h1>
        <p class="text-sm text-gray-600 text-right mb-6" id="current-date"></p>
        <p class="text-lg mb-6 text-gray-700">เรียนรู้เรื่องความมั่นคงปลอดภัยทางไซเบอร์ เพื่อปกป้องตัวคุณและโรงงานของเรา</p>
        <div class="bg-blue-100 border-l-4 border-blue-500 p-5 mb-8 rounded-md shadow-sm">
            <p class="text-gray-800"><strong class="text-red-600">สวัสดีพนักงานทุกท่าน!</strong> ในโลกที่เทคโนโลยีก้าวหน้าไปอย่างรวดเร็วในปี 2025 นี้ การรักษาความมั่นคงปลอดภัยทางไซเบอร์ไม่ได้เป็นเพียงหน้าที่ของฝ่าย IT อีกต่อไป แต่เป็นความรับผิดชอบร่วมกันของพนักงานทุกคนในโรงงานของเรา บทความนี้จะช่วยให้คุณเข้าใจหลักการพื้นฐานที่สำคัญ เพื่อปกป้องข้อมูลสำคัญของโรงงานและระบบการผลิตของเราจากภัยคุกคามต่างๆ</p>
        </div>
        <div class="section-card bg-gray-50 p-8 mb-6 rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
            <h2 class="text-2xl font-bold text-blue-700 mb-4 pb-2 border-b-2 border-blue-200 flex items-center">
                <i class="fas fa-shield-alt mr-3 text-blue-500"></i>1. ทำไม IT Security จึงสำคัญสำหรับพนักงานทุกคน?
            </h2>
            <p class="mb-4 text-gray-700">ในยุคที่ระบบการผลิตและข้อมูลของโรงงานเชื่อมโยงกับโลกออนไลน์มากขึ้น ภัยคุกคามทางไซเบอร์ก็เพิ่มขึ้นตามไปด้วย <strong>พนักงานทุกคนคือแนวหน้าสำคัญในการป้องกันภัยเหล่านี้</strong> เพราะผู้ไม่หวังดีมักจะหาช่องโหว่จากผู้ใช้งานเป็นด่านแรก หากเราขาดความรู้ความเข้าใจ ผลกระทบที่ตามมาอาจรุนแรงกว่าที่คุณคิด:</p>
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4 rounded-md">
                <p class="text-yellow-800 font-medium"><strong>อ้างอิงจากนโยบาย:</strong> ข้อมูลถือเป็นองค์ประกอบสำคัญเทียบเท่ากับบุคคล วัสดุ และเงิน การรักษาความปลอดภัยข้อมูลจึงเป็นหน้าที่ที่องค์กรต้องปฏิบัติตามให้ครบถ้วน และบริษัทใช้แนวคิด <strong class="text-blue-700">Zero Trust</strong> ในการจัดการความปลอดภัยข้อมูล</p>
            </div>
            <ul class="list-none pl-6">
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">การผลิตหยุดชะงัก:</strong> ระบบควบคุมการผลิตอาจถูกรบกวน ทำให้เครื่องจักรหยุดทำงาน ส่งผลให้เกิดความเสียหายทางเศรษฐกิจมหาศาล</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">ข้อมูลสูญหายหรือถูกขโมย:</strong> ข้อมูลลับทางการค้า สูตรการผลิต ข้อมูลลูกค้า หรือแม้แต่ข้อมูลทางการเงิน อาจถูกขโมยไปใช้ในทางที่ผิด</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">ชื่อเสียงของโรงงานเสียหาย:</strong> ความน่าเชื่อถือลดลง ลูกค้าขาดความมั่นใจในความปลอดภัยของข้อมูล</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">ความปลอดภัยของพนักงานลดลง:</strong> ในบางกรณี การโจมตีอาจส่งผลกระทบต่อระบบความปลอดภัยทางกายภาพ</li>
            </ul>
        </div>
        <div class="section-card bg-gray-50 p-8 mb-6 rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
            <h2 class="text-2xl font-bold text-blue-700 mb-4 pb-2 border-b-2 border-blue-200 flex items-center">
                <i class="fas fa-key mr-3 text-blue-500"></i>2. สร้างและจัดการรหัสผ่านอย่างไรให้ปลอดภัย?
            </h2>
            <p class="mb-4 text-gray-700">รหัสผ่านเปรียบเสมือนกุญแจสำคัญสู่ข้อมูลและระบบของเรา การตั้งและจัดการรหัสผ่านอย่างถูกวิธีจึงเป็นสิ่งสำคัญที่สุด:</p>
            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-4 rounded-md">
                <p class="text-blue-800 font-medium"><strong>อ้างอิงจากนโยบาย:</strong> ตาม <a href="../เกณฑ์นโยบายการตั้งรหัสผ่าน.docx" class="text-blue-600 hover:underline" target="_blank">"แนวทางการตั้งรหัสผ่าน"</a> และ <a href="../แนวทางการตั้งรหัสผ่าน (ฉบับปรับปรุง).docx" class="text-blue-600 hover:underline" target="_blank">"แนวทางการตั้งรหัสผ่าน (ฉบับปรับปรุง)"</a> มีข้อกำหนดดังนี้:</p>
                <ul class="list-disc ml-6 mt-2 text-gray-700">
                    <li>รหัสผ่านทั่วไปควรมีความยาวอย่างน้อย 8 ตัวอักษร</li>
                    <li>ควรใช้ตัวพิมพ์ใหญ่, พิมพ์เล็ก, ตัวเลข, และสัญลักษณ์อย่างน้อย 3 ใน 4 ประเภท</li>
                    <li>ห้ามใช้รหัสผ่านซ้ำกับระบบอื่น</li>
                    <li>แนะนำให้อัปเดตรหัสผ่านทุก 6 เดือน</li>
                    <li>แนะนำอย่างยิ่งให้เปิดใช้งานการยืนยันตัวตนแบบสองขั้นตอน (2FA) ทุกครั้งที่ระบบรองรับ</li>
                </ul>
                <p class="text-blue-800 font-medium mt-2"><strong>ตัวอย่างรหัสผ่านที่ควรหลีกเลี่ยง:</strong> ตัวเลขลำดับ, คำในพจนานุกรม, ข้อมูลส่วนตัว (วันเกิด, ชื่อ), และการใช้รหัสผ่านที่ซ้ำกับ Username</p>
            </div>
            <ul class="list-none pl-6">
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">ใช้รหัสผ่านที่ซับซ้อน:</strong> ควรประกอบด้วยตัวอักษรพิมพ์เล็ก (a-z), พิมพ์ใหญ่ (A-Z), ตัวเลข (0-9) และสัญลักษณ์พิเศษ (!@#$%^&*) ผสมกัน และมีความยาวอย่างน้อย 8-12 ตัวอักษรขึ้นไป</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">ห้ามใช้รหัสผ่านซ้ำ:</strong> ไม่ควรใช้รหัสผ่านเดียวกันกับบัญชีส่วนตัวหรือระบบอื่นๆ เพราะหากรหัสผ่านหนึ่งรั่วไหล บัญชีอื่นๆ ของคุณก็จะตกอยู่ในความเสี่ยงด้วย</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">เปลี่ยนรหัสผ่านสม่ำเสมอ:</strong> ควรเปลี่ยนรหัสผ่านทุกๆ 3-6 เดือน หรือตามนโยบายของโรงงาน</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">ห้ามเปิดเผยรหัสผ่าน:</strong> ไม่ว่าจะเป็นเพื่อนร่วมงาน หัวหน้างาน หรือแม้แต่อ้างว่าเป็นฝ่าย IT ก็ตาม **ฝ่าย IT จะไม่มีวันขอรหัสผ่านของคุณเด็ดขาด** หากมีใครขอรหัสผ่าน ให้สงสัยไว้ก่อนว่าเป็นการหลอกลวง</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">เปิดใช้งานการยืนยันตัวตนแบบสองขั้นตอน (2FA):</strong> ผู้ใช้งานจะต้องเปิดใช้งานระบบการยืนยันตัวตนแบบสองขั้นตอนในระบบที่รองรับคุณสมบัตินี้ เช่น Google Workspace และ Microsoft Office</li>
            </ul>
        </div>
        <div class="section-card bg-gray-50 p-8 mb-6 rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
            <h2 class="text-2xl font-bold text-blue-700 mb-4 pb-2 border-b-2 border-blue-200 flex items-center">
                <i class="fas fa-envelope-open-text mr-3 text-blue-500"></i>3. ระวังอีเมลและข้อความหลอกลวง (Phishing)
            </h2>
            <p class="mb-4 text-gray-700">ฟิชชิ่งเป็นหนึ่งในภัยคุกคามที่พบบ่อยที่สุด โดยผู้ไม่หวังดีจะปลอมตัวเป็นองค์กรหรือบุคคลที่น่าเชื่อถือเพื่อหลอกให้คุณเปิดเผยข้อมูลส่วนตัว หรือคลิกลิงก์ที่มีมัลแวร์:</p>
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4 rounded-md">
                <p class="text-yellow-800 font-medium"><strong>อ้างอิงจากนโยบาย:</strong> ผู้ใช้งานจะต้องใช้บัญชีอีเมลที่บริษัทจัดหาให้สำหรับการติดต่อสื่อสารในเรื่องงานเท่านั้น หากได้รับอีเมลที่มีลักษณะน่าสงสัย เช่น มีไฟล์แนบที่ไม่รู้จัก หรือมีลิงก์ (URL) ที่ไม่น่าเชื่อถือ ผู้ใช้งานจะต้องไม่เปิดไฟล์แนบดังกล่าว ไม่คลิกลิงก์ และลบอีเมลนั้นทิ้งทันที</p>
            </div>
            <ul class="list-none pl-6">
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">ตรวจสอบผู้ส่ง:</strong> ดูชื่ออีเมลหรือเบอร์โทรศัพท์ให้ดี หากไม่คุ้นเคย หรือชื่ออีเมลดูแปลกๆ (เช่น ไม่ใช่โดเมนของบริษัท) ให้ระมัดระวังเป็นพิเศษ</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">ระวังลิงก์และไฟล์แนบ:</strong> **ห้ามคลิกลิงก์หรือเปิดไฟล์แนบจากอีเมลที่คุณไม่รู้จักหรือน่าสงสัยเด็ดขาด** ลิงก์และไฟล์แนบเหล่านี้อาจนำไปสู่เว็บไซต์ปลอม หรือดาวน์โหลดมัลแวร์เข้าสู่คอมพิวเตอร์ของคุณ</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">สังเกตคำพูดที่กระตุ้น:</strong> อีเมลฟิชชิ่งมักจะใช้ถ้อยคำที่กระตุ้นให้คุณรีบดำเนินการ เช่น "บัญชีของคุณกำลังจะถูกปิด", "คุณได้รับรางวัล", "ต้องดำเนินการทันที" เพื่อสร้างความตกใจและเร่งเร้าให้คุณทำตาม</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">หากไม่แน่ใจ ให้สอบถามฝ่าย IT:</strong> ทางที่ดีที่สุดคือการสอบถามฝ่าย IT หรือผู้รับผิดชอบก่อนที่จะทำสิ่งใดๆ</li>
            </ul>
        </div>
        <div class="section-card bg-gray-50 p-8 mb-6 rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
            <h2 class="text-2xl font-bold text-blue-700 mb-4 pb-2 border-b-2 border-blue-200 flex items-center">
                <i class="fas fa-hard-drive mr-3 text-blue-500"></i>4. การใช้ USB และอุปกรณ์ภายนอกอย่างปลอดภัย (รวมถึงอุปกรณ์ส่วนตัว)
            </h2>
            <p class="mb-4 text-gray-700">อุปกรณ์จัดเก็บข้อมูลแบบพกพา เช่น USB Drive หรือ External Hard Drive สามารถเป็นพาหะนำมัลแวร์เข้าสู่ระบบของโรงงานได้ เพื่อความปลอดภัยสูงสุด จึงมีข้อกำหนดที่สำคัญดังนี้:</p>
            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-4 rounded-md">
                <p class="text-blue-800 font-medium"><strong>อ้างอิงจากนโยบาย:</strong> ห้ามพนักงานใช้เครื่องส่วนตัว (Bring Your Own Device: BYOD) ในการทำงาน อุปกรณ์ PC มาตรฐานของ Archem จะมีการตั้งค่าเพื่อจำกัดการอ่านและเขียนข้อมูลบนอุปกรณ์จัดเก็บข้อมูลภายนอก ข้อมูลสำคัญที่จัดเก็บอยู่ในอุปกรณ์จัดเก็บข้อมูลภายนอก จะต้องได้รับการเข้ารหัสเพื่อความปลอดภัย และก่อนทิ้งหรือส่งคืนอุปกรณ์จัดเก็บข้อมูล จะต้องดำเนินการลบข้อมูลที่อยู่ภายในอุปกรณ์โดยใช้ซอฟต์แวร์หรือวิธีการที่เหมาะสม</p>
            </div>
            <ul class="list-none pl-6">
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">ห้ามเสียบ USB ที่ไม่รู้จัก:</strong> หากคุณพบ USB Drive ที่ไม่ทราบแหล่งที่มา **ห้ามเสียบเข้ากับคอมพิวเตอร์ของโรงงานเด็ดขาด** USB เหล่านั้นอาจถูกติดตั้งมัลแวร์มาเพื่อโจมตีระบบโดยเฉพาะ</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">สแกนไวรัสทุกครั้ง:</strong> หากจำเป็นต้องใช้ USB ของบุคคลภายนอก หรือนำข้อมูลจากภายนอกเข้ามาในระบบของโรงงาน **ควรทำการสแกนไวรัสให้แน่ใจก่อนทุกครั้ง** โดยทำผ่านช่องทางที่ฝ่าย IT กำหนดเท่านั้น</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">ห้ามใช้อุปกรณ์ส่วนตัว (BYOD) กับระบบของโรงงาน:</strong> ตามนโยบายของบริษัท ไม่อนุญาตให้พนักงานนำอุปกรณ์ส่วนตัว (เช่น USB Drive ส่วนตัว, โทรศัพท์มือถือส่วนตัว, โน้ตบุ๊กส่วนตัว) มาเชื่อมต่อกับระบบเครือข่าย หรือคอมพิวเตอร์ของโรงงานเด็ดขาด เพื่อป้องกันความเสี่ยงจากมัลแวร์ที่อาจติดมากับอุปกรณ์ส่วนตัว และเพื่อรักษาความลับของข้อมูลโรงงาน</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">ใช้เฉพาะอุปกรณ์ที่ได้รับอนุญาต:</strong> ควรใช้เฉพาะอุปกรณ์ USB หรืออุปกรณ์ภายนอกที่ได้รับอนุญาตและผ่านการตรวจสอบความปลอดภัยจากฝ่าย IT ของโรงงานเท่านั้น</li>
            </ul>
        </div>
        <div class="section-card bg-gray-50 p-8 mb-6 rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
            <h2 class="text-2xl font-bold text-blue-700 mb-4 pb-2 border-b-2 border-blue-200 flex items-center">
                <i class="fas fa-lock mr-3 text-blue-500"></i>5. การรักษาความปลอดภัยข้อมูลในชีวิตประจำวัน
            </h2>
            <p class="mb-4 text-gray-700">การปฏิบัติเล็กๆ น้อยๆ ในชีวิตประจำวันก็มีส่วนช่วยในการรักษาความปลอดภัยของข้อมูล:</p>
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4 rounded-md">
                <p class="text-yellow-800 font-medium"><strong>อ้างอิงจากนโยบาย:</strong> เมื่อไม่ได้ใช้งานคอมพิวเตอร์ ผู้ใช้งานจะต้องทำการล็อกหน้าจอ หรือออกจากระบบ (Log off) และปิดเครื่องทุกครั้งเมื่อเลิกใช้งานประจำวัน ข้อมูลสำคัญทุกประเภทจะต้องถูกจัดเก็บไว้บน Google Drive เท่านั้น</p>
            </div>
            <ul class="list-none pl-6">
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">ล็อกหน้าจอคอมพิวเตอร์:</strong> เมื่อคุณลุกออกจากโต๊ะทำงาน ไม่ว่าจะเพียงชั่วครู่หรือเป็นเวลานาน **ควรกดปุ่ม Windows + L (สำหรับ Windows) เพื่อล็อกหน้าจอคอมพิวเตอร์ของคุณทุกครั้ง** เพื่อป้องกันไม่ให้ผู้อื่นเข้าถึงข้อมูลได้โดยไม่ได้รับอนุญาต</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">ไม่ทิ้งเอกสารสำคัญ:</strong> หลีกเลี่ยงการทิ้งเอกสารหรือข้อมูลสำคัญไว้บนโต๊ะทำงานโดยไม่มีผู้ดูแล</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">ระวังการสนทนา:</strong> ไม่ควรพูดคุยข้อมูลที่เป็นความลับของโรงงานในที่สาธารณะ หรือในบริเวณที่ผู้อื่นสามารถได้ยิน</li>
            </ul>
        </div>
        <div class="section-card bg-gray-50 p-8 mb-6 rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
            <h2 class="text-2xl font-bold text-blue-700 mb-4 pb-2 border-b-2 border-blue-200 flex items-center">
                <i class="fas fa-exclamation-triangle mr-3 text-blue-500"></i>6. การรายงานเหตุการณ์ผิดปกติ: "สงสัยไว้ก่อน ดีกว่าแก้ไขทีหลัง"
            </h2>
            <p class="mb-4 text-gray-700">นี่คือหลักปฏิบัติที่สำคัญที่สุดในการรักษาความปลอดภัยทางไซเบอร์ หากคุณพบเห็นหรือสงสัยว่ามีสิ่งผิดปกติเกิดขึ้นกับระบบคอมพิวเตอร์, อีเมล, หรืออุปกรณ์ใดๆ ของโรงงาน:</p>
            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-4 rounded-md">
                <p class="text-blue-800 font-medium"><strong>อ้างอิงจากนโยบาย:</strong> หากพบเหตุการณ์ผิดปกติ ผู้ใช้งานจะต้องปฏิบัติตาม <a href="../ขั้นตอนจัดการอุบัติการณ์ด้าน IT.docx" class="text-blue-600 hover:underline" target="_blank">"ขั้นตอนจัดการอุบัติการณ์ด้าน IT"</a> โดยทันที</p>
            </div>
            <ul class="list-none pl-6">
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">แจ้งฝ่าย IT ทันที:</strong> **ห้ามพยายามแก้ไขปัญหาด้วยตัวเองเด็ดขาด** เพราะการแก้ไขที่ไม่ถูกต้องอาจทำให้สถานการณ์เลวร้ายลง หรือทำให้ฝ่าย IT หาต้นตอของปัญหาได้ยากขึ้น</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">ความรวดเร็วเป็นสิ่งสำคัญ:</strong> การแจ้งเหตุการณ์ที่รวดเร็ว ช่วยให้ฝ่าย IT สามารถเข้าถึงและแก้ไขปัญหาได้ทันท่วงที ซึ่งจะช่วยจำกัดความเสียหายที่อาจเกิดขึ้นได้อย่างมาก</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">ทุกคนคือผู้เฝ้าระวัง:</strong> ไม่ว่าคุณจะเป็นพนักงานแผนกใด การแจ้งเหตุการณ์ที่น่าสงสัยคือความรับผิดชอบของพนักงานทุกคนในการช่วยปกป้องโรงงานของเรา</li>
            </ul>
        </div>
        <div class="section-card bg-gray-50 p-8 mb-6 rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
            <h2 class="text-2xl font-bold text-blue-700 mb-4 pb-2 border-b-2 border-blue-200 flex items-center">
                <i class="fas fa-gavel mr-3 text-blue-500"></i>7. การปฏิบัติตามกฎหมายและนโยบายของบริษัท
            </h2>
            <p class="mb-4 text-gray-700">การปฏิบัติตามข้อกำหนดทางกฎหมายและนโยบายที่บริษัทกำหนดเป็นสิ่งสำคัญเพื่อปกป้ององค์กร:</p>
            <ul class="list-none pl-6">
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">ห้ามใช้ซอฟต์แวร์ละเมิดลิขสิทธิ์:</strong> ผู้ใช้งานจะต้องปฏิบัติตาม <a href="../แนวทางการจัดการลิขสิทธิ์.docx" class="text-blue-600 hover:underline" target="_blank">"แนวทางการจัดการลิขสิทธิ์"</a> อย่างเคร่งครัด และห้ามติดตั้งหรือใช้งานซอฟต์แวร์ที่ไม่ได้รับอนุญาตหรือละเมิดลิขสิทธิ์โดยเด็ดขาด</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">การให้ข้อมูลกับหน่วยงานภายนอก:</strong> ในกรณีที่หน่วยงานภายนอก เช่น เจ้าหน้าที่ตำรวจ หรือศาล มีการร้องขอข้อมูล ผู้ใช้งานจะต้องปฏิบัติตามคำแนะนำของฝ่ายกฎหมายของบริษัทอย่างเคร่งครัด</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">เข้ารับการฝึกอบรมด้านความปลอดภัย:</strong> ผู้ใช้งานทุกคนมีหน้าที่ต้องเข้ารับการฝึกอบรมด้านความปลอดภัยของระบบ IT ที่จัดขึ้นโดยฝ่าย IT อย่างน้อยปีละหนึ่งครั้ง</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">การทบทวนนโยบาย:</strong> มาตรฐานความปลอดภัย IT จะได้รับการทบทวนเป็นประจำ (แนะนำปีละ 1 ครั้ง) หรือเมื่อมีการเปลี่ยนแปลงที่สำคัญ</li>
            </ul>
        </div>
        <div class="bg-blue-100 border-l-4 border-blue-500 p-5 mb-8 rounded-md shadow-sm">
            <p class="text-gray-800"><strong>สรุป:</strong> ความมั่นคงปลอดภัยทางไซเบอร์คือการทำงานร่วมกันของทุกคน การที่คุณมีความรู้ความเข้าใจในหลักปฏิบัติด้าน IT Security จะช่วยให้โรงงานของเราปลอดภัยจากการโจมตี และช่วยให้เราสามารถทำงานได้อย่างมีประสิทธิภาพและมั่นใจยิ่งขึ้นในปี 2025 นี้</p>
        </div>
        <div class="text-center text-gray-500 text-sm mt-10">
            © 2025 Archem Thailand - IT Security Department. All rights reserved.
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dateOptions = { year: 'numeric', month: 'long', day: 'numeric' };
            const currentDate = new Date().toLocaleDateString('th-TH', dateOptions);
            document.getElementById('current-date').textContent = `วันที่: ${currentDate}`;
        });
    </script>
</body>
</html>