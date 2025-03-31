<?php
include("conn.php");
?>

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

        .login-container {
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
            color: #ffffff; /* ข้อความสีขาว */
            font-weight: 800;
            margin-bottom: 30px;
            border-bottom: 3px solid #c10000; /* เส้นใต้สีแดงเข้ม */
            padding-bottom: 15px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 0 0 10px rgba(255, 0, 0, 0.7); /* เงาข้อความสีแดง */
        }

        .form-control {
            background-color: #2a2a2a; /* พื้นหลังช่องกรอกข้อมูลสีเทา */
            border-radius: 5px;
            border-color: #c10000; /* ขอบช่องกรอกข้อมูลสีแดงเข้ม */
            color: #fff; /* ข้อความในช่องกรอกสีขาว */
            margin-bottom: 20px;
        }

        .form-control:focus {
            background-color: #2a2a2a;
            border-color: #ff3333; /* ขอบเมื่อโฟกัสสีแดงสว่าง */
            box-shadow: 0 0 0 0.25rem rgba(255, 51, 51, 0.25);
            color: #fff;
        }

        .form-label {
            color: #ff3333; /* ป้ายกำกับสีแดงสว่าง */
            font-weight: 500;
            text-align: left;
            display: block;
            margin-bottom: 8px;
        }

        .btn-custom {
            width: 100%;
            margin-top: 15px;
            background-color: #c10000; /* ปุ่มสีแดงเข้ม */
            border-color: #900000;
            transition: all 0.3s ease;
            color: white;
        }

        .btn-custom:hover {
            background-color: #ff3333; /* ปุ่มเมื่อโฮเวอร์สีแดงสว่าง */
            border-color: #c10000;
            transform: scale(1.05);
        }

        .btn-outline {
            width: 100%;
            margin-top: 10px;
            background-color: transparent;
            border-color: #c10000;
            color: #ff3333;
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            background-color: #300000; /* พื้นหลังปุ่มเมื่อโฮเวอร์สีแดงเข้มมาก */
            color: #fff;
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

        .alert {
            margin-bottom: 20px;
            border-radius: 10px;
        }

        @media (max-width: 768px) {
            .login-container {
                padding: 20px;
                margin: 15px;
            }
            h1 {
                font-size: 1.8rem;
            }
        }
    </style>
    
    <title>ระบบเข้าสู่ระบบ</title>
</head>
<body>
    <svg class="decoration decoration-top-left" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
        <circle cx="50" cy="50" r="40" fill="#c10000" />
    </svg>
    
    <svg class="decoration decoration-bottom-right" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
        <circle cx="50" cy="50" r="40" fill="#c10000" />
    </svg>

    <div class="login-container">
        <div class="team-name">ทีม RED SHADOW</div>
        <h1>เข้าสู่ระบบ</h1>
        
        <?php
        // ตรวจสอบว่ามีการส่งข้อมูลการเข้าสู่ระบบมาหรือไม่
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $u_id = $_POST['u_id'];
            $u_passwd = $_POST['u_passwd'];
            
            // ป้องกัน SQL Injection
            $u_id = mysqli_real_escape_string($conn, $u_id);
            $u_passwd = mysqli_real_escape_string($conn, $u_passwd);
            
            // สร้างคำสั่ง SQL เพื่อตรวจสอบข้อมูลผู้ใช้
            $sql = "SELECT * FROM userdata WHERE u_id = '$u_id' AND u_passwd = '$u_passwd'";
            $result = mysqli_query($conn, $sql);
            
            // ตรวจสอบว่าพบข้อมูลหรือไม่
            if (mysqli_num_rows($result) == 1) {
                // ดึงข้อมูลผู้ใช้
                $row = mysqli_fetch_assoc($result);
                
                // เริ่มหรือกู้คืน session
                session_start();
                
                // กำหนดค่า session
                $_SESSION['u_id'] = $row['u_id'];
                $_SESSION['u_name'] = $row['u_name'];
                
                // เปลี่ยนเส้นทางไปยังหน้า index หรือหน้าหลักหลังจากเข้าสู่ระบบสำเร็จ
                echo "<script>window.location.href = 'show.php';</script>";
                exit();
            } else {
                // แสดงข้อความเมื่อเข้าสู่ระบบไม่สำเร็จ
                echo '<div class="alert alert-danger">ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</div>';
            }
        }
        ?>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">ชื่อผู้ใช้</label>
                <input type="text" class="form-control" id="username" name="u_id" maxlength="30" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">รหัสผ่าน</label>
                <input type="password" class="form-control" id="password" name="u_passwd" maxlength="30" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-custom">เข้าสู่ระบบ</button>
                <button type="reset" class="btn btn-outline">ยกเลิก</button>
            </div>
        </form>
        <div class="footer">
            พัฒนาโดย 664485036 นาย ฑีฆายุ เปรมสุข
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>