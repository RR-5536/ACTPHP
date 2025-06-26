<?php
$pageTitle = 'Basic Computer and Network Usage';
// เนื่องจากไฟล์นี้ย้ายไป subfolder, base path ต้องกลับไป 1 ระดับ
$base_path = '../';
include '../partials/head.php'; // ปรับ path การ include
?>

    <header class="unified-header">
        <div class="unified-header-content">
            <a href="../index.php" class="back-button">← Back to Main Menu</a> <img src="https://media.jobthai.com/v1/images/logo-pic-map/309288_pic_20220902165518.jpeg?type=webp&width=3840&quality=50&blur=1" alt="Archem Logo" class="header-logo">
        </div>
    </header>

    <div class="container">
        <div class="sub-header">
            <h1>Basic Computer and Network Usage</h1>
            <p>Learn the essential fundamentals for working in our digital environment.</p>
        </div>

        <h2 class="section-title">Learning Topics (Click to Read)</h2>

        <div class="featured-topic-box" data-topic-id="1">
            <div class="header">
                <span class="icon"><i class="fa-solid fa-desktop"></i></span>
                <span class="title">Basic Computer Usage</span>
            </div>
            <p>Learn essential basic computer usage such as components, file management, basic programs, and connecting devices.</p>
        </div>

        <div class="topic-grid-container">
            <div class="topic-box" data-topic-id="2"><span class="icon"><i class="fa-solid fa-shield-virus"></i></span><span class="title">Basic Security</span></div>
            <div class="topic-box" data-topic-id="3"><span class="icon"><i class="fa-solid fa-key"></i></span><span class="title">Account and Password Management</span></div>
            <div class="topic-box" data-topic-id="4"><span class="icon"><i class="fa-solid fa-folder-open"></i></span><span class="title">Data and File Management</span></div>
            <div class="topic-box" data-topic-id="5"><span class="icon"><i class="fa-solid fa-envelope-circle-check"></i></span><span class="title">Secure Email Usage</span></div>
            <div class="topic-box" data-topic-id="6"><span class="icon"><i class="fa-solid fa-wifi"></i></span><span class="title">Appropriate Internet Usage</span></div>
            <div class="topic-box" data-topic-id="7"><span class="icon"><i class="fa-solid fa-bug-slash"></i></span><span class="title">Antivirus Program Management</span></div>
            <div class="topic-box" data-topic-id="8"><span class="icon"><i class="fa-solid fa-hard-drive"></i></span><span class="title">External Storage Device Management</span></div>
            <div class="topic-box" data-topic-id="9"><span class="icon"><i class="fa-solid fa-boxes-stacked"></i></span><span class="title">Company IT Asset Management</span></div>
            <div class="topic-box" data-topic-id="10"><span class="icon"><i class="fa-solid fa-triangle-exclamation"></i></span><span class="title">Security Incident Reporting</span></div>
            <div class="topic-box" data-topic-id="11"><span class="icon"><i class="fa-solid fa-gavel"></i></span><span class="title">Legal and Policy Compliance</span></div>
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
                <p>In this section, you will learn about basic computer usage essential for daily work, such as:</p>
            </div>
            <div class="content-section modal-points">
                <ul>
                    <li>Main computer components (Hardware)</li>
                    <li>Operating systems and file management (Windows OS & File Management)</li>
                    <li>Basic program usage (e.g., Web Browser, Microsoft Office)</li>
                    <li>Connecting external devices (Printer, USB Drive)</li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                <p><strong>Recommendation:</strong> Understanding the computer's structure and practicing organized file management will enhance work efficiency.</p>
            </div>
        </div>
        <div data-content-id="2">
            <div class="content-section modal-intro">
                <p>Data security is of utmost importance. In this section, you will learn how to protect your data and devices from various threats:</p>
            </div>
            <div class="content-section modal-points">
                <ul>
                    <li>Creating and managing strong passwords</li>
                    <li>Beware of phishing emails and suspicious links</li>
                    <li>Installing and updating Antivirus programs</li>
                    <li>The importance of regular data backups</li>
                    <li>Company internet usage policy</li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                <p><strong>Recommendation:</strong> Strictly adhering to basic security guidelines will reduce the risk of cyber attacks.</p>
            </div>
        </div>
        <div data-content-id="3">
            <div class="content-section modal-intro">
                 <p>Learn how to create secure passwords and manage user accounts to ensure data security:</p>
            </div>
            <div class="content-section modal-points">
                <ul>
                    <li>Fundamental principles for maximum password security</li>
                    <li>Password length requirements: General passwords must be at least 8 characters long</li>
                    <li>Character type requirements to increase complexity: Should include at least 3 out of 4 types (uppercase, lowercase, numbers, special characters)</li>
                    <li>It is recommended to change passwords every 6 months or immediately if you suspect a password has been compromised.</li>
                    <li>Account management: Do not disclose or share passwords with others, and change passwords immediately after receiving initial passwords.</li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                 <p><strong>Recommendation:</strong> Avoid using easily guessable personal information and always enable two-factor authentication (2FA).</p>
            </div>
        </div>
        <div data-content-id="4">
            <div class="content-section modal-intro">
                <p>Understand guidelines for data storage, classification of critical data, and secure data backup:</p>
            </div>
            <div class="content-section modal-points">
                <ul>
                    <li>Management of critical data must comply with relevant requirements, such as "Document Management Guidelines" and "Personal Data Management Guidelines."</li>
                    <li>Critical data must be stored on Google Drive and should not be stored on personal computers.</li>
                    <li>The system will record computer or mobile device usage, such as sending/receiving emails, internet usage, and data access.</li>
                    <li>Data and file backups should have defined scope and frequency based on data importance.</li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                <p><strong>Recommendation:</strong> Store important data on Google Drive only, and encrypt data when necessary.</p>
            </div>
        </div>
        <div data-content-id="5">
            <div class="content-section modal-intro">
                <p>Learn how to use company email, identify suspicious emails, and verify recipients before sending emails:</p>
            </div>
            <div class="content-section modal-points">
                <ul>
                    <li>Users must use company-provided email accounts for work-related communication only.</li>
                    <li>If a suspicious email is received (e.g., unknown attachments or untrustworthy links), users must not open the attachment, click the link, and delete the email immediately.</li>
                    <li>Before sending any email, users must carefully verify the recipient's address.</li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                 <p><strong>Recommendation:</strong> Use company email accounts for work only and be cautious of phishing emails.</p>
            </div>
        </div>
        <div data-content-id="6">
            <div class="content-section modal-intro">
                <p>Understand the company's internet usage policy and restrictions on publishing data on public cloud services:</p>
            </div>
            <div class="content-section modal-points">
                 <ul>
                    <li>Do not publish information related to company operations on public cloud services or various social media unless written permission is obtained from the IT department.</li>
                    <li>Usage of public cloud services for business purposes must be pre-approved by the IT department.</li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                 <p><strong>Recommendation:</strong> Do not publish information related to company operations on public cloud services without authorization.</p>
            </div>
        </div>
        <div data-content-id="7">
            <div class="content-section modal-intro">
                <p>Learn the importance of installing and updating antivirus programs:</p>
            </div>
            <div class="content-section modal-points">
                <ul>
                    <li>All computers used in the company must have antivirus software approved by the IT department installed.</li>
                    <li>Antivirus programs must always have their virus definitions updated to the latest version.</li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                 <p><strong>Recommendation:</strong> Ensure that antivirus programs always have their virus definitions updated to the latest version.</p>
            </div>
        </div>
        <div data-content-id="8">
             <div class="content-section modal-intro">
                <p>Understand usage restrictions and guidelines for protecting data on external storage devices:</p>
            </div>
            <div class="content-section modal-points">
                <ul>
                    <li>Standard Archem PCs are configured to restrict reading and writing data on external storage devices. If usage is necessary, a request must be submitted through the company's designated system.</li>
                    <li>Important data stored on external storage devices must be encrypted for security.</li>
                    <li>Devices used to store important data must be kept in a securely lockable location and regularly audited.</li>
                    <li>Before disposing of or returning storage devices, data within the device must be securely erased using appropriate methods to ensure that such data cannot be recovered.</li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                 <p><strong>Recommendation:</strong> Important data stored on external devices must be encrypted, and data should be securely erased before disposal.</p>
            </div>
        </div>
        <div data-content-id="9">
            <div class="content-section modal-intro">
                 <p>Learn the IT asset management policy and users' responsibilities for maintenance:</p>
            </div>
            <div class="content-section modal-points">
                <ul>
                    <li>Strictly prohibited from using personal IT devices (Bring Your Own Device: BYOD) for company operations.</li>
                    <li>All types of IT tools provided by the company must be used solely for company operational purposes.</li>
                    <li>When using the Archem network or the company's Google Workspace, usersจำเป็นต้องปฏิบัติตามข้อกำหนด "Standard Archem PC Specifications"</li>
                    <li>IT assets include computers, servers, printers, network devices, operating systems, software, and data.</li>
                    <li>IT Asset Management (ITAM) will be conducted by the IT Asset Manager and System Administrator at least once a year.</li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                <p><strong>Recommendation:</strong> Do not use personal IT devices (BYOD) for work, and comply with Archem's standard PC specifications.</p>
            </div>
        </div>
        <div data-content-id="10">
            <div class="content-section modal-intro">
                <p>Understand the reporting procedure for security incidents, such as lost devices, virus infections, or unauthorized access:</p>
            </div>
            <div class="content-section modal-points">
                <ul>
                    <li>If a computer or storage medium is lost, stolen, or infected with a computer virus, users must immediately follow the "IT Incident Management Procedure."</li>
                    <li>The system administrator will investigate and report suspicious incidents.</li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                <p><strong>Recommendation:</strong> Report security incidents immediately upon discovery to allow the IT team to act quickly.</p>
            </div>
        </div>
        <div data-content-id="11">
            <div class="content-section modal-intro">
                 <p>Learn about requirements regarding licensed software usage and providing information to external agencies:</p>
            </div>
            <div class="content-section modal-points">
                <ul>
                    <li>Users must strictly adhere to the "Copyright Management Guidelines" and are strictly prohibited from installing or using unauthorized or copyrighted software.</li>
                    <li>In cases where external agencies, such as police officers or courts, request information, users must strictly follow the company's legal department's advice.</li>
                    <li>Users must comply with all laws and regulations.</li>
                </ul>
            </div>
            <div class="content-section modal-recommendation">
                 <p><strong>Recommendation:</strong> Do not install or use pirated software, and follow the legal department's advice when external parties request information.</p>
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