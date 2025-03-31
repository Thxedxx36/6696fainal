<?php
include("conn.php");
include("clogin.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            background-color: #121212; /* Dark background */
            margin: 0;
            padding: 20px;
            color: #fff; /* White text for the body */
        }

        .page-container {
            background-color: #1e1e1e; /* Dark container */
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4); /* Red-tinted shadow */
            padding: 30px;
            border: 2px solid #c10000; /* Dark red border */
        }

        h1 {
    color: #ffffff; /* Changed from #ffdd00 to white */
    font-weight: 800;
    margin-bottom: 30px;
    border-bottom: 3px solid #c10000;
    padding-bottom: 15px;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 2.8rem;
    text-shadow: 0 0 10px #ffffff, 0 0 20px #ffffff, 0 0 30px #ffffff; /* Changed shadow color to match text */
    animation: whiteGlow 1.5s ease-in-out infinite alternate; /* Updated animation name */
    line-height: 1.3;
}

@keyframes whiteGlow { /* Updated animation name */
    from {
        text-shadow: 0 0 10px #ffffff, 0 0 20px #ffffff; /* Changed from yellow to white */
    }
    to {
        text-shadow: 0 0 15px #ffffff, 0 0 25px #ffffff, 0 0 35px #ffffff, 0 0 45px #ffffff; /* Changed from yellow to white */
    }
}

        .form-control, .form-select {
            background-color: #2a2a2a;
            border-radius: 5px;
            border-color: #c10000; /* Dark red */
            color: #fff;
        }

        .form-control:focus, .form-select:focus {
            background-color: #2a2a2a;
            border-color: #ff3333;
            box-shadow: 0 0 0 0.25rem rgba(255, 51, 51, 0.25);
            color: #fff;
        }

        label {
            color: #ff3333; /* Bright red */
            font-weight: 500;
            margin-bottom: 8px;
        }

        .btn-primary {
            background-color: #c10000; /* Dark red */
            border-color: #900000;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #ff3333; /* Bright red */
            border-color: #c10000;
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: #500000; /* Very dark red */
            border-color: #300000;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #700000;
            border-color: #500000;
            transform: scale(1.05);
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #ff3333; /* Bright red */
            font-size: 0.9em;
        }

        .alert-success {
            background-color: #1e2e1e;
            color: #4CAF50;
            border-color: #4CAF50;
        }

        .alert-danger {
            background-color: #2e1e1e;
            color: #ff3333;
            border-color: #c10000;
        }

        .alert-warning {
            background-color: #2e2e1e;
            color: #FFC107;
            border-color: #FFC107;
        }

        /* ส่วนของ User Info Box */
        .user-info-container {
            margin-bottom: 25px;
        }
        
        .user-info-box {
            display: flex;
            align-items: center;
            background-color: #2a2a2a;
            border: 2px solid #c10000;
            border-radius: 8px;
            padding: 12px 20px;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(255, 0, 0, 0.2);
        }
        
        .user-info-title {
            font-weight: 600;
            color: #ffdd00;
            margin-right: 10px;
            white-space: nowrap;
        }
        
        .user-info-data {
            color: #fff;
            border-left: 2px solid #c10000;
            padding-left: 15px;
            margin-left: 5px;
        }

        .edit-form {
            background-color: #2a2a2a;
            border-radius: 10px;
            border: 1px solid #c10000;
            padding: 25px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(255, 0, 0, 0.2);
        }

        .athlete-id-badge {
            background-color: #c10000;
            color: #fff;
            font-weight: 600;
            padding: 5px 15px;
            border-radius: 5px;
            display: inline-block;
        }

        @media (max-width: 768px) {
            .page-container {
                padding: 15px;
            }
            h1 {
                font-size: 2.2rem; /* Slightly smaller on mobile */
            }
        }

        @media (min-width: 992px) {
            h1 {
                font-size: 3.2rem; /* Even larger on desktops */
            }
        }
    </style>

    <title>แก้ไขข้อมูลนักกีฬา</title>
</head>

<body>
    <div class="container page-container">
        <div class="user-info-container">
            <h1 class="text-center">แก้ไขข้อมูลนักกีฬา</h1>
            
            <div class="user-info-box">
                <div class="user-info-title">ผู้เข้าสู่ระบบ :</div>
                <div class="user-info-data">พัฒนาโดย 664485036 นาย ฑีฆายุ เปรมสุข </div>
            </div>
        </div>

        <?php
        if(isset($_GET['action_even']) && $_GET['action_even']=='edit'){
            $athlete_id = $_GET['athlete_id'];
            $sql = "SELECT * FROM athletes WHERE athlete_id=$athlete_id";
            $result = $conn->query($sql);
            
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
            } else {
                echo "<div class='alert alert-warning text-center'>ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ</div>";
                echo "<div class='text-center mt-3'><a href='show.php' class='btn btn-primary'>กลับไปหน้าแสดงข้อมูล</a></div>";
                exit();
            }
        } else {
            echo "<div class='alert alert-danger text-center'>ไม่ได้ระบุข้อมูลที่ต้องการแก้ไข</div>";
            echo "<div class='text-center mt-3'><a href='show.php' class='btn btn-primary'>กลับไปหน้าแสดงข้อมูล</a></div>";
            exit();
        }
        ?>

        <div class="edit-form">
            <form action="edit_1.php" method="POST">
                <input type="hidden" name="athlete_id" value="<?php echo $row['athlete_id']; ?>">
                
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">รหัสนักกีฬา</label>
                    </div>
                    <div class="col-sm-8">
                        <div class="athlete-id-badge"><?php echo $row['athlete_id']; ?></div>
                    </div>
                </div>
               
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">ชื่อนักกีฬา</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="first_name" class="form-control" maxlength="100" value="<?php echo $row['first_name']; ?>" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">นามสกุลนักกีฬา</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="last_name" class="form-control" maxlength="100" value="<?php echo $row['last_name']; ?>" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">วันเกิด</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="date" name="date_of_birth" class="form-control" value="<?php echo $row['date_of_birth']; ?>" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">ประเภทกีฬา</label>
                    </div>
                    <div class="col-sm-8">
                        <select name="sport" class="form-select" required>
                            <option>กรุณาระบุประเภทกีฬา</option>
                            <option value="Football" <?php if ($row['sport']=='Football'){ echo "selected";} ?>>Football</option>
                            <option value="Basketball" <?php if ($row['sport']=='Basketball'){ echo "selected";} ?>>Basketball</option>
                            <option value="Badminton" <?php if ($row['sport']=='Badminton'){ echo "selected";} ?>>Badminton</option>
                            <option value="Tennis" <?php if ($row['sport']=='Tennis'){ echo "selected";} ?>>Tennis</option>
                            <option value="Boxing" <?php if ($row['sport']=='Boxing'){ echo "selected";} ?>>Boxing</option>
                            <option value="Volleyball" <?php if ($row['sport']=='Volleyball'){ echo "selected";} ?>>Volleyball</option>
                            <option value="Athletics" <?php if ($row['sport']=='Athletics'){ echo "selected";} ?>>Athletics</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">สัญชาติ</label>
                    </div>
                    <div class="col-sm-8">
                        <select name="nationality" class="form-select" required>
                            <option>กรุณาระบุสัญชาติ</option>
                            <option value="Thai" <?php if ($row['nationality']=='Thai'){ echo "selected";} ?>>Thai</option>
                            <option value="American" <?php if ($row['nationality']=='American'){ echo "selected";} ?>>American</option>
                            <option value="Japanese" <?php if ($row['nationality']=='Japanese'){ echo "selected";} ?>>Japanese</option>
                            <option value="Korean" <?php if ($row['nationality']=='Korean'){ echo "selected";} ?>>Korean</option>
                            <option value="Chinese" <?php if ($row['nationality']=='Chinese'){ echo "selected";} ?>>Chinese</option>
                            <option value="Malaysian" <?php if ($row['nationality']=='Malaysian'){ echo "selected";} ?>>Malaysian</option>
                            <option value="Filipino" <?php if ($row['nationality']=='Filipino'){ echo "selected";} ?>>Filipino</option>
                            <option value="Australian" <?php if ($row['nationality']=='Australian'){ echo "selected";} ?>>Australian</option>
                            <option value="British" <?php if ($row['nationality']=='British'){ echo "selected";} ?>>British</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">วันที่เริ่มต้นเข้าร่วม</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="date" name="join_date" class="form-control" value="<?php echo $row['join_date']; ?>" required>
                    </div>
                </div>

                <div class="row mb-3 mt-4">
                    <div class="col-sm-12 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary flex-grow-1 me-2">
                            <i class="bi bi-check-circle me-2"></i>บันทึกข้อมูล
                        </button>
                        <a href="show.php" class="btn btn-danger flex-grow-1">
                            <i class="bi bi-x-circle me-2"></i>ยกเลิก
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <div class="footer mt-4">
            พัฒนาโดย 664485036 นาย ฑีฆายุ เปรมสุข
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>