<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            background-color: #121212; /* สีพื้นหลังดำ */
            margin: 0;
            padding: 0;
            color: #fff; /* ข้อความสีขาว */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .error-container {
            background-color: #1e1e1e; /* พื้นหลังกล่องสีเทาเข้ม */
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(193, 0, 0, 0.4); /* เงาสีแดง */
            padding: 40px;
            width: 100%;
            max-width: 400px;
            border: 2px solid #c10000; /* ขอบสีแดงเข้ม */
            text-align: center;
            position: relative;
            z-index: 2;
        }

        h1 {
            color: #ff3333; /* หัวเรื่องสีแดง */
            font-weight: 800;
            margin-bottom: 20px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 0 0 10px rgba(255, 0, 0, 0.7); /* เงาข้อความสีแดง */
        }

        h2 {
            color: #ffffff; /* ข้อความรองสีขาว */
            font-size: 1.2rem;
            margin-bottom: 30px;
            padding-bottom: 15px;
            text-align: center;
            border-bottom: 1px solid #c10000; /* เส้นใต้สีแดงเข้ม */
        }

        .btn-back {
            width: 100%;
            margin-top: 15px;
            background-color: #c10000; /* ปุ่มสีแดงเข้ม */
            border-color: #900000;
            transition: all 0.3s ease;
            color: white;
        }

        .btn-back:hover {
            background-color: #ff3333; /* ปุ่มเมื่อโฮเวอร์สีแดงสว่าง */
            border-color: #c10000;
            transform: scale(1.05);
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #8a8a8a; /* ข้อความส่วนท้ายสีเทา */
            font-size: 0.9em;
        }

        .team-name {
            color: #ff3333; /* ชื่อทีมสีแดง */
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 1.2em;
        }

        .decoration {
            position: absolute;
            opacity: 0.2;
            z-index: 1;
        }

        .decoration-top-left {
            top: 20px;
            left: 20px;
            transform: rotate(-45deg);
        }

        .decoration-bottom-right {
            bottom: 20px;
            right: 20px;
            transform: rotate(135deg);
        }

        @media (max-width: 768px) {
            .error-container {
                padding: 20px;
                margin: 15px;
            }
            h1 {
                font-size: 1.8rem;
            }
            h2 {
                font-size: 1rem;
            }
        }
    </style>
    
    <title>ตรวจสอบ Login</title>
</head>
<body>
    <svg class="decoration decoration-top-left" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
        <circle cx="50" cy="50" r="40" fill="#c10000" />
    </svg>
    
    <svg class="decoration decoration-bottom-right" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
        <circle cx="50" cy="50" r="40" fill="#c10000" />
    </svg>

    <div class="error-container">
        <div class="team-name">ทีม RED SHADOW</div>
        <h1>Login ผิดพลาด</h1>
        <h2>กรุณาตรวจสอบ ชื่อผู้ใช้และรหัสผ่าน</h2>
        <a href="login.php" class="btn btn-back">กลับสู่หน้าจอ Login</a>
        <div class="footer">
            พัฒนาโดย 664485036 นาย ฑีฆายุ เปรมสุข
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>