<?php
include("conn.php");
include("clogin.php");

// ตรวจสอบว่ามีการส่ง athlete_id หรือไม่
if(isset($_GET['action_even']) && $_GET['action_even'] == 'edit' && isset($_GET['athlete_id'])) {
    $athlete_id = $_GET['athlete_id'];
    
    // ดึงข้อมูลนักกีฬาตาม ID
    $sql = "SELECT * FROM athletes WHERE athlete_id = $athlete_id";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        // หากไม่พบข้อมูล ให้กลับไปยังหน้าแสดงรายการ
        echo "<script>alert('ไม่พบข้อมูลนักกีฬา'); window.location.href='show.php';</script>";
        exit();
    }
} else {
    // หากไม่มี ID ให้กลับไปยังหน้าแสดงรายการ
    echo "<script>window.location.href='show.php';</script>";
    exit();
}
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

        .form-label {
            color: #ffdd00; /* Yellow text for labels */
            font-weight: 500;
        }

        .form-control, .form-select {
            background-color: #2a2a2a;
            border-color: #c10000;
            color: #fff;
        }

        .form-control:focus, .form-select:focus {
            background-color: #333;
            color: #fff;
            border-color: #ff3333;
            box-shadow: 0 0 0 0.25rem rgba(193, 0, 0, 0.25);
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #ff3333; /* Bright red */
            font-size: 0.9em;
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
        <h1 class="text-center">แก้ไขข้อมูลนักกีฬา</h1>
        
        <form action="update.php" method="POST" class="row g-3">
            <input type="hidden" name="athlete_id" value="<?php echo $row['athlete_id']; ?>">
            
            <div class="col-md-6">
                <label for="first_name" class="form-label">ชื่อนักกีฬา</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row['first_name']; ?>" required>
            </div>
            
            <div class="col-md-6">
                <label for="last_name" class="form-label">นามสกุลนักกีฬา</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row['last_name']; ?>" required>
            </div>
            
            <div class="col-md-6">
                <label for="date_of_birth" class="form-label">วันเกิด</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $row['date_of_birth']; ?>" required>
            </div>
            
            <div class="col-md-6">
                <label for="sport" class="form-label">ประเภทกีฬา</label>
                <select class="form-select" id="sport" name="sport" required>
                    <option value="Football" <?php echo ($row['sport'] == 'Football') ? 'selected' : ''; ?>>Football</option>
                    <option value="Basketball" <?php echo ($row['sport'] == 'Basketball') ? 'selected' : ''; ?>>Basketball</option>
                    <option value="Badminton" <?php echo ($row['sport'] == 'Badminton') ? 'selected' : ''; ?>>Badminton</option>
                    <option value="Tennis" <?php echo ($row['sport'] == 'Tennis') ? 'selected' : ''; ?>>Tennis</option>
                    <option value="Boxing" <?php echo ($row['sport'] == 'Boxing') ? 'selected' : ''; ?>>Boxing</option>
                    <option value="Volleyball" <?php echo ($row['sport'] == 'Volleyball') ? 'selected' : ''; ?>>Volleyball</option>
                    <option value="Athletics" <?php echo ($row['sport'] == 'Athletics') ? 'selected' : ''; ?>>Athletics</option>
                </select>
            </div>
            
            <div class="col-md-6">
                <label for="nationality" class="form-label">สัญชาติ</label>
                <select class="form-select" id="nationality" name="nationality" required>
                    <option value="Thai" <?php echo ($row['nationality'] == 'Thai') ? 'selected' : ''; ?>>Thai</option>
                    <option value="American" <?php echo ($row['nationality'] == 'American') ? 'selected' : ''; ?>>American</option>
                    <option value="Japanese" <?php echo ($row['nationality'] == 'Japanese') ? 'selected' : ''; ?>>Japanese</option>
                    <option value="Korean" <?php echo ($row['nationality'] == 'Korean') ? 'selected' : ''; ?>>Korean</option>
                    <option value="Chinese" <?php echo ($row['nationality'] == 'Chinese') ? 'selected' : ''; ?>>Chinese</option>
                    <option value="Malaysian" <?php echo ($row['nationality'] == 'Malaysian') ? 'selected' : ''; ?>>Malaysian</option>
                    <option value="Filipino" <?php echo ($row['nationality'] == 'Filipino') ? 'selected' : ''; ?>>Filipino</option>
                    <option value="Australian" <?php echo ($row['nationality'] == 'Australian') ? 'selected' : ''; ?>>Australian</option>
                    <option value="British" <?php echo ($row['nationality'] == 'British') ? 'selected' : ''; ?>>British</option>
                </select>
            </div>
            
            <div class="col-md-6">
                <label for="join_date" class="form-label">วันที่เริ่มต้นเข้าร่วม</label>
                <input type="date" class="form-control" id="join_date" name="join_date" value="<?php echo $row['join_date']; ?>" required>
            </div>
            
            <div class="col-12 mt-4 text-center">
                <button type="submit" class="btn btn-primary btn-lg me-2">บันทึกข้อมูล</button>
                <a href="show.php" class="btn btn-primary btn-lg">ยกเลิก</a>
            </div>
        </form>

        <div class="footer mt-4">
            พัฒนาโดย 664485036   นาย ฑีฆายุ เปรมสุข หมู่เรียน 66/96
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>