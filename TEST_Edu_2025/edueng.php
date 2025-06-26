<?php
$pageTitle = 'IT Security Education for 2025'; // กำหนดชื่อหน้า
$base_path = '../'; // พาธพื้นฐานต้องกลับไป 1 ระดับ
include '../partials/head.php'; // พาธสำหรับ include ต้องกลับไป 1 ระดับ
?>
<body class="text-gray-800">

    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto py-2 px-8 flex justify-start items-center relative h-16">
            <a href="http://10.34.1.19/index.php" class="inline-block px-5 py-2 bg-blue-600 text-white font-bold rounded-md hover:bg-blue-700 transition duration-300">
                <i class="fas fa-arrow-left mr-2"></i>Back to Main Menu
            </a>
            <img src="https://media.jobthai.com/v1/images/logo-pic-map/309288_pic_20220902165518.jpeg?type=webp&width=3840&quality=50&blur=1" alt="Archem Logo" class="h-12 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
        </div>
    </header>

    <div class="container mx-auto p-8 bg-white rounded-lg shadow-xl my-10 relative">
        <h1 class="text-4xl font-extrabold text-center text-blue-800 pb-4 border-b-4 border-blue-600 mb-8">
            IT Security Education for 2025
        </h1>
        <p class="text-sm text-gray-600 text-right mb-6" id="current-date"></p>
        <p class="text-lg mb-6 text-gray-700">Learn about cybersecurity to protect yourself and our factory.</p>
        <div class="bg-blue-100 border-l-4 border-blue-500 p-5 mb-8 rounded-md shadow-sm">
            <p class="text-gray-800"><strong class="text-red-600">Dear Employees!</strong> In the rapidly advancing technological world of 2025, cybersecurity is no longer just a responsibility of the IT department. It is a shared responsibility of every employee in our factory. This article will help you understand essential fundamental principles to protect our factory's critical data and production systems from various threats.</p>
        </div>
        <div class="section-card bg-gray-50 p-8 mb-6 rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
            <h2 class="text-2xl font-bold text-blue-700 mb-4 pb-2 border-b-2 border-blue-200 flex items-center">
                <i class="fas fa-shield-alt mr-3 text-blue-500"></i>1. Why is IT Security Important for Everyone?
            </h2>
            <p class="mb-4 text-gray-700">In an era where factory production systems and data are increasingly connected online, cyber threats are also on the rise. **Every employee is a critical frontline defense against these threats,** because malicious actors often look for vulnerabilities through users as the first point of entry. If we lack understanding, the consequences could be more severe than you might imagine:</p>
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4 rounded-md">
                <p class="text-yellow-800 font-medium"><strong>Reference from Policy:</strong> Information is a highly important element in the company, equivalent to people, assets, and money. Ensuring information security is an obligation the company must always comply with. The company also implements a <strong class="text-blue-700">Zero Trust</strong> approach to information security measures. </p>
            </div>
            <ul class="list-none pl-6">
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Production Disruptions:</strong> Production control systems could be interfered with, causing machinery to stop, leading to massive economic damage.</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Data Loss or Theft:</strong> Confidential trade information, production formulas, customer data, or even financial data could be stolen and misused.</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Damage to Factory Reputation:</strong> Credibility decreases, and customers lose confidence in data security.</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Reduced Employee Safety:</strong> In some cases, attacks might impact physical safety systems.</li>
            </ul>
        </div>
        <div class="section-card bg-gray-50 p-8 mb-6 rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
            <h2 class="text-2xl font-bold text-blue-700 mb-4 pb-2 border-b-2 border-blue-200 flex items-center">
                <i class="fas fa-key mr-3 text-blue-500"></i>2. How to Create and Manage Passwords Securely?
            </h2>
            <p class="mb-4 text-gray-700">Passwords are like important keys to our data and systems. Therefore, setting and managing passwords correctly is of utmost importance:</p>
            <div class="bg-blue-100 border-l-4 border-blue-400 p-4 mb-4 rounded-md">
                <p class="text-blue-800 font-medium"><strong>Reference from Policy:</strong> According to "<a href="../เกณฑ์นโยบายการตั้งรหัสผ่าน.docx" class="text-blue-600 hover:underline" target="_blank">Password Policy</a>" and "<a href="../แนวทางการตั้งรหัสผ่าน (ฉบับปรับปรุง).docx" class="text-blue-600 hover:underline" target="_blank">Updated Password Policy</a>", the requirements are as follows:</p>
                <ul class="list-disc ml-6 mt-2 text-gray-700">
                    <li>General passwords should be at least 8 characters long. </li>
                    <li>It is recommended to use at least 3 of 4 character types: uppercase, lowercase, numbers, and symbols. </li>
                    <li>Do not reuse passwords across different systems. </li>
                    <li>It is recommended to update passwords every 6 months. </li>
                    <li>Two-factor authentication (2FA) is strongly recommended whenever supported. </li>
                </ul>
                <p class="text-blue-800 font-medium mt-2"><strong>Examples of passwords to avoid:</strong> Sequential numbers, dictionary words, personal information (birth dates, names), and reusing usernames. </p>
            </div>
            <ul class="list-none pl-6">
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Use Complex Passwords:</strong> They should consist of a mix of lowercase letters (a-z), uppercase letters (A-Z), numbers (0-9), and special characters (!@#$%^&*) and be at least 8-12 characters long.</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Do Not Reuse Passwords:</strong> You should not use the same password for personal accounts or other systems, because if one password is leaked, your other accounts will also be at risk.</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Change Passwords Regularly:</strong> Passwords should be changed every 3-6 months, or according to factory policy.</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Never Disclose Passwords:</strong> Whether it's to colleagues, supervisors, or even someone claiming to be from IT, **the IT department will never ask for your password.** If anyone asks for your password, assume it is a scam.</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Enable Two-Factor Authentication (2FA):</strong> Users must enable two-factor authentication in systems that support this feature, such as Google Workspace and Microsoft Office. </li>
            </ul>
        </div>
        <div class="section-card bg-gray-50 p-8 mb-6 rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
            <h2 class="text-2xl font-bold text-blue-700 mb-4 pb-2 border-b-2 border-blue-200 flex items-center">
                <i class="fas fa-envelope-open-text mr-3 text-blue-500"></i>3. Beware of Phishing Emails and Messages
            </h2>
            <p class="mb-4 text-gray-700">Phishing is one of the most common threats, where malicious actors impersonate trusted organizations or individuals to trick you into revealing personal information or clicking on links containing malware:</p>
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4 rounded-md">
                <p class="text-yellow-800 font-medium"><strong>Reference from Policy:</strong> Users must use company-provided email accounts for work-related communication only. If a suspicious email is received (e.g., unknown attachments or untrustworthy links), users must not open the attachment, click the link, and delete the email immediately. </p>
            </div>
            <ul class="list-none pl-6">
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Check the Sender:</strong> Carefully examine the email address or phone number. If it looks unfamiliar or the email address seems strange (e.g., not the company's domain), be especially cautious.</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Beware of Links and Attachments:</strong> **Never click on links or open attachments from unknown or suspicious emails.** These links and attachments may lead to fake websites or download malware to your computer.</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Notice Urgency in Language:</strong> Phishing emails often use urgent language, such as "Your account will be closed soon," "You have won a prize," or "Immediate action required," to create panic and rush you into compliance.</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">If in Doubt, Ask IT:</strong> The best course of action is to ask the IT department or responsible personnel before taking any action.</li>
            </ul>
        </div>
        <div class="section-card bg-gray-50 p-8 mb-6 rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
            <h2 class="text-2xl font-bold text-blue-700 mb-4 pb-2 border-b-2 border-blue-200 flex items-center">
                <i class="fas fa-hard-drive mr-3 text-blue-500"></i>4. Secure Use of USB and External Devices (Including Personal Devices)
            </h2>
            <p class="mb-4 text-gray-700">Portable storage devices like USB drives or external hard drives can carry malware into factory systems. For maximum security, there are important requirements:</p>
            <div class="bg-blue-100 border-l-4 border-blue-400 p-4 mb-4 rounded-md">
                <p class="text-blue-800 font-medium"><strong>Reference from Policy:</strong> Employees are prohibited from using personal devices (Bring Your Own Device: BYOD) for work. Standard Archem PCs are configured to restrict reading and writing data on external storage devices. Important data stored on external storage devices must be encrypted for security. Before disposing of or returning storage devices, data within the device must be securely erased using appropriate software or methods. </p>
            </div>
            <ul class="list-none pl-6">
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Do Not Plug in Unknown USBs:</strong> If you find a USB drive from an unknown source, **do not plug it into any factory computer.** These USBs might be specifically infected with malware to attack systems.</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Scan for Viruses Every Time:</strong> If you must use a third-party USB or bring external data into the factory system, **always scan for viruses first** through IT-approved channels only.</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Do Not Use Personal Devices (BYOD) with Factory Systems:</strong> **According to company policy, employees are strictly prohibited from connecting personal devices (e.g., personal USB drives, personal mobile phones, personal laptops) to the factory network or computers.** This is to prevent risks from malware that might be on personal devices and to maintain the confidentiality of factory data.</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Use Only Authorized Devices:</strong> Only use USBs or external devices that are authorized and have passed security checks by the factory's IT department.</li>
            </ul>
        </div>
        <div class="section-card bg-gray-50 p-8 mb-6 rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
            <h2 class="text-2xl font-bold text-blue-700 mb-4 pb-2 border-b-2 border-blue-200 flex items-center">
                <i class="fas fa-lock mr-3 text-blue-500"></i>5. Daily Data Security Practices
            </h2>
            <p class="mb-4 text-gray-700">Small daily practices also contribute to data security:</p>
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4 rounded-md">
                <p class="text-yellow-800 font-medium"><strong>Reference from Policy:</strong> When not using the computer, users must lock the screen or log off and shut down the computer every time after daily use. All types of important data must only be stored on Google Drive. </p>
            </div>
            <ul class="list-none pl-6">
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Lock Your Computer Screen:</strong> When you step away from your desk, whether for a moment or a long time, **always press Windows + L (for Windows) to lock your computer screen.** This prevents unauthorized access to your data.</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Do Not Leave Important Documents Unattended:</strong> Avoid leaving documents or important information on your desk without supervision.</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Be Careful with Conversations:</strong> Do not discuss confidential factory information in public places or areas where others can overhear.</li>
            </ul>
        </div>
        <div class="section-card bg-gray-50 p-8 mb-6 rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
            <h2 class="text-2xl font-bold text-blue-700 mb-4 pb-2 border-b-2 border-blue-200 flex items-center">
                <i class="fas fa-exclamation-triangle mr-3 text-blue-500"></i>6. Reporting Abnormal Incidents: "Better Safe Than Sorry"
            </h2>
            <p class="mb-4 text-gray-700">This is the most crucial principle in cybersecurity. If you observe or suspect something unusual happening with factory computer systems, emails, or any devices:</p>
            <div class="bg-blue-100 border-l-4 border-blue-400 p-4 mb-4 rounded-md">
                <p class="text-blue-800 font-medium"><strong>Reference from Policy:</strong> If an abnormal incident is detected, users must immediately follow the "<a href="../ขั้นตอนจัดการอุบัติการณ์ด้าน IT.docx" class="text-blue-600 hover:underline" target="_blank">IT Security Incident Response Procedure</a>". </p>
            </div>
            <ul class="list-none pl-6">
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Notify IT Immediately:</strong> **Never attempt to resolve the issue yourself,** as incorrect handling could worsen the situation or make it harder for IT to identify the root cause.</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Speed is Key:</strong> Prompt reporting allows IT to access and resolve the problem quickly, significantly limiting potential damage.</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Everyone is a Watchdog:</strong> Regardless of your department, reporting suspicious incidents is every employee's responsibility to help protect our factory.</li>
            </ul>
        </div>
        <div class="section-card bg-gray-50 p-8 mb-6 rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
            <h2 class="text-2xl font-bold text-blue-700 mb-4 pb-2 border-b-2 border-blue-200 flex items-center">
                <i class="fas fa-gavel mr-3 text-blue-500"></i>7. Legal Compliance and Company Policy
            </h2>
            <p class="mb-4 text-gray-700">Adhering to legal requirements and company policies is crucial to protect the organization:</p>
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4 rounded-md">
                <p class="text-yellow-800 font-medium"><strong>Reference from Policy:</strong> Users must strictly adhere to the "<a href="../แนวทางการจัดการลิขสิทธิ์.docx" class="text-blue-600 hover:underline" target="_blank">Copyright Management Guidelines</a>" and are strictly prohibited from installing or using unauthorized or copyrighted software. All users are required to attend IT security training organized by the IT department at least once a year. IT security standards will be reviewed regularly (recommended annually) or when significant changes occur. </p>
            </div>
            <ul class="list-none pl-6">
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Prohibited Use of Pirated Software:</strong> Users must strictly adhere to the "Copyright Management Guidelines" and are strictly prohibited from installing or using unauthorized or copyrighted software.</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Providing Information to External Parties:</strong> If external entities, such as police officers or courts, request information, users must strictly follow the company's legal department's advice. </li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Mandatory Security Training:</strong> All users are required to attend IT security training organized by the IT department at least once a year.</li>
                <li class="relative mb-3 text-gray-800"><strong class="text-red-500">Policy Review:</strong> IT security standards will be reviewed regularly (recommended annually) or when significant changes occur.</li>
            </ul>
        </div>
        <div class="bg-blue-100 border-l-4 border-blue-500 p-5 mb-8 rounded-md shadow-sm">
            <p class="text-gray-800"><strong>Summary:</strong> Cybersecurity is a collective effort. Your knowledge and understanding of IT Security practices will help keep our factory safe from attacks and enable us to work more efficiently and confidently in 2025.</p>
        </div>
        </div>
    <?php include '../partials/footer.php'; ?> <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dateOptions = { year: 'numeric', month: 'long', day: 'numeric' };
            const currentDate = new Date().toLocaleDateString('en-US', dateOptions);
            document.getElementById('current-date').textContent = `Date: ${currentDate}`;
        });
    </script>
</body>
</html>