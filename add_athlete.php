<?php
include("conn.php");
include("clogin.php");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลนักกีฬา | RED SHADOW</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            background-color: #121212; /* Dark background */
            margin: 0;
            padding: 20px;
            color: #fff; /* White text for the body */
        }

        .add-container {
            background-color: #1e1e1e; /* Dark container */
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4); /* Red-tinted shadow */
            padding: 30px;
            border: 2px solid #c10000; /* Dark red border */
            max-width: 800px;
            margin: 0 auto;
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

        .form-label {
            color: #ffdd00; /* Yellow label text */
            font-weight: 500;
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

        .btn-custom-save {
            background-color: #c10000; /* Dark red */
            border-color: #900000;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-custom-save:hover {
            background-color: #ff3333; /* Bright red */
            border-color: #c10000;
            transform: scale(1.05);
        }

        .btn-custom-cancel {
            background-color: #500000; /* Very dark red */
            border-color: #300000;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-custom-cancel:hover {
            background-color: #700000;
            border-color: #500000;
            transform: scale(1.05);
        }

        .btn-custom-view {
            background-color: #2a2a2a; /* Dark gray */
            border-color: #c10000;
            color: #ffdd00;
            transition: all 0.3s ease;
        }

        .btn-custom-view:hover {
            background-color: #3a3a3a;
            border-color: #ff3333;
            color: #ffdd00;
            transform: scale(1.05);
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

        .text-muted {
            color: #ff3333 !important; /* Bright red */
        }

        .invalid-feedback {
            color: #ff6666;
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

        @media (max-width: 768px) {
            .add-container {
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
</head>

<body>
    <div class="container add-container">
        <h1>เพิ่มข้อมูลนักกีฬา</h1>
        
        <div class="user-info-box">
            <div class="user-info-title">ผู้เข้าสู่ระบบ :</div>
            <div class="user-info-data">RED SHADOW TEAM</div>
        </div>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="needs-validation" novalidate id="athleteForm">
            <div class="row mb-3">
                <label for="athlete_id" class="col-sm-3 col-form-label form-label">รหัสนักกีฬา</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="athlete_id" name="athlete_id" required>
                    <div class="invalid-feedback">
                        กรุณากรอกรหัสนักกีฬา
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="first_name" class="col-sm-3 col-form-label form-label">ชื่อนักกีฬา</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                    <div class="invalid-feedback">
                        กรุณากรอกชื่อนักกีฬา
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="last_name" class="col-sm-3 col-form-label form-label">นามสกุลนักกีฬา</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                    <div class="invalid-feedback">
                        กรุณากรอกนามสกุลนักกีฬา
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="date_of_birth" class="col-sm-3 col-form-label form-label">วันเกิด</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                    <div class="invalid-feedback">
                        กรุณาเลือกวันเกิด
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="sport" class="col-sm-3 col-form-label form-label">ประเภทกีฬา</label>
                <div class="col-sm-9">
                    <select name="sport" id="sport" class="form-select" required>
                        <option value="" selected disabled>เลือกประเภทกีฬา</option>
                        <option value="Football">Football</option>
                        <option value="Basketball">Basketball</option>
                        <option value="Badminton">Badminton</option>
                        <option value="Tennis">Tennis</option>
                        <option value="Boxing">Boxing</option>
                        <option value="Volleyball">Volleyball</option>
                        <option value="Athletics">Athletics</option>
                    </select>
                    <div class="invalid-feedback">
                        กรุณาเลือกประเภทกีฬา
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="nationality" class="col-sm-3 col-form-label form-label">สัญชาติ</label>
                <div class="col-sm-9">
                    <select name="nationality" id="nationality" class="form-select" required>
                        <option value="" selected disabled>เลือกสัญชาติ</option>
                        <option value="Thai">Thai</option>
                        <option value="American">American</option>
                        <option value="Japanese">Japanese</option>
                        <option value="Korean">Korean</option>
                        <option value="Chinese">Chinese</option>
                        <option value="Malaysian">Malaysian</option>
                        <option value="Filipino">Filipino</option>
                        <option value="Australian">Australian</option>
                        <option value="British">British</option>
                    </select>
                    <div class="invalid-feedback">
                        กรุณาเลือกสัญชาติ
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="join_date" class="col-sm-3 col-form-label form-label">วันที่เข้าร่วม</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="join_date" name="join_date" required>
                    <div class="invalid-feedback">
                        กรุณาเลือกวันที่เข้าร่วม
                    </div>
                </div>
            </div>
            
            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-custom-save me-2">
                    บันทึกข้อมูล
                </button>
                <button type="button" class="btn btn-custom-cancel me-2" onclick="window.location.href='show.php'">
                    ยกเลิก
                </button>
                <a href="show.php" class="btn btn-custom-view">
                    แสดงข้อมูล
                </a>
            </div>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form data and sanitize inputs
            $athlete_id = mysqli_real_escape_string($conn, $_POST['athlete_id']);
            $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
            $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
            $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
            $sport = mysqli_real_escape_string($conn, $_POST['sport']);
            $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
            $join_date = mysqli_real_escape_string($conn, $_POST['join_date']);
            
            // Insert data into database
            $sql = "INSERT INTO athletes (athlete_id, first_name, last_name, date_of_birth, sport, nationality, join_date) 
                    VALUES ('$athlete_id', '$first_name', '$last_name', '$date_of_birth', '$sport', '$nationality', '$join_date')";
            
            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success mt-3 text-center">
                        บันทึกข้อมูลนักกีฬาเรียบร้อยแล้ว
                      </div>';
            } else {
                echo '<div class="alert alert-danger mt-3 text-center">
                        เกิดข้อผิดพลาด: ' . $conn->error . '
                      </div>';
            }
            
            // Close connection
            $conn->close();
        }
        ?>

        <div class="text-center mt-3 text-muted small">
            RED SHADOW TEAM © 2025
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Form Validation Script -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            
            // Loop over them and prevent submission
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>