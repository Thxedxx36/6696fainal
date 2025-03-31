<?php include("conn.php"); include("clogin.php"); ?> 
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "Kanit", sans-serif;
            background-color: #121212;
            margin: 0;
            padding: 20px;
            color: #fff;
        }
        
        .page-container {
            background-color: #1e1e1e;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
            padding: 30px;
            border: 2px solid #c10000;
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
            border-color: #c10000;
            color: #fff;
        }
        
        .form-control:focus, .form-select:focus {
            background-color: #2a2a2a;
            border-color: #ff3333;
            box-shadow: 0 0 0 0.25rem rgba(255, 51, 51, 0.25);
            color: #fff;
        }
        
        .btn-primary {
            background-color: #c10000;
            border-color: #900000;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #ff3333;
            border-color: #c10000;
            transform: scale(1.05);
        }
        
        .btn-danger {
            background-color: #500000;
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
            color: #ff3333;
            font-size: 0.9em;
        }
        
        .table {
            margin-top: 20px;
            color: #fff;
        }
        
        .table thead {
            background-color: #c10000;
            color: white;
        }
        
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #2a2a2a;
            color: #fff;
        }
        
        .table-striped tbody tr:nth-of-type(even) {
            background-color: #1e1e1e;
            color: #fff;
        }
        
        .table-hover tbody tr:hover {
            background-color: #3e0000;
            color: #fff;
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
        
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: #fff !important;
        }
        
        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            background-color: #2a2a2a;
            color: #fff;
            border: 1px solid #c10000;
        }
        
        .page-link {
            background-color: #2a2a2a;
            color: #ff3333;
            border-color: #c10000;
        }
        
        .page-link:hover {
            background-color: #c10000;
            color: #fff;
        }
        
        .page-item.active .page-link {
            background-color: #c10000;
            border-color: #900000;
        }
        
        /* User Info Box */
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
        
        .user-action-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 15px;
        }
        
        .team-logo {
            font-size: 2rem;
            font-weight: 900;
            color: #ff3333;
            text-shadow: 2px 2px 4px #000;
            margin-right: 15px;
            display: flex;
            align-items: center;
        }
        
        @media (max-width: 768px) {
            .page-container {
                padding: 15px;
            }
            
            h1 {
                font-size: 2.2rem;
            }
        }
        
        @media (min-width: 992px) {
            h1 {
                font-size: 3.2rem;
            }
        }
    </style>
    <title>ข้อมูลนักกีฬา RED SHADOW</title>
</head>
<body>
    <div class="container page-container">
        <?php
        if (isset($_GET['action_even']) && $_GET['action_even'] == 'delete') {
            $athlete_id = $_GET['athlete_id'];
            $sql = "SELECT * FROM athletes WHERE athlete_id=$athlete_id";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $sql = "DELETE FROM athletes WHERE athlete_id=$athlete_id";
                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success text-center'>ลบข้อมูลนักกีฬาสำเร็จ</div>";
                } else {
                    echo "<div class='alert alert-danger text-center'>ลบข้อมูลไม่สำเร็จ !!! </div>" . $conn->error;
                }
            } else {
                echo "<div class='alert alert-warning text-center'>ไม่พบข้อมูลนักกีฬา กรุณาตรวจสอบ</div>";
            }
        }
        ?>
        
        <div class="user-info-container">
            <h1 class="text-center">ข้อมูลนักกีฬา RED SHADOW</h1>
            <div class="user-info-box">
                <div class="team-logo">RED SHADOW</div>
                <div class="user-info-title">ผู้เข้าสู่ระบบ:</div>
                <div class="user-info-data">รหัส 664485036 นายฑีฆายุ เปรมสุข</div>
            </div>
            <div class="user-action-container">
                <a href="add_athlete.php" class="btn btn-primary">เพิ่มข้อมูลนักกีฬา</a>
            </div>
        </div>
        
        <div class="table-responsive">
            <table id="athleteTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>รหัสนักกีฬา</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>วันเกิด</th>
                        <th>ประเภทกีฬา</th>
                        <th>สัญชาติ</th>
                        <th>วันที่เข้าร่วมทีม</th>
                        <th>จัดการข้อมูล</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM athletes";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["athlete_id"] . "</td>";
                            echo "<td>" . $row["first_name"] . "</td>";
                            echo "<td>" . $row["last_name"] . "</td>";
                            echo "<td>" . $row["date_of_birth"] . "</td>";
                            echo "<td>" . $row["sport"] . "</td>";
                            echo "<td>" . $row["nationality"] . "</td>";
                            echo "<td>" . $row["join_date"] . "</td>";
                            echo '<td> 
                                <div class="btn-group" role="group">
                                    <a href="show.php?action_even=delete&athlete_id=' . $row['athlete_id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'ต้องการจะลบข้อมูลนักกีฬา ' . $row['athlete_id'] . ' ชื่อ ' . $row['first_name'] . ' ' . $row['last_name'] . '?\')">
                                        ลบข้อมูล
                                    </a>
                                    <a href="edit_athlete.php?action_even=edit&athlete_id=' . $row['athlete_id'] . '" class="btn btn-primary btn-sm" onclick="return confirm(\'ต้องการจะแก้ไขข้อมูลนักกีฬา ' . $row['athlete_id'] . ' ชื่อ ' . $row['first_name'] . ' ' . $row['last_name'] . '?\')">
                                        แก้ไขข้อมูล
                                    </a>
                                </div>
                            </td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>ผลลัพธ์ 0 รายการ</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
        
        <div class="footer mt-4">
            <p>© <?php echo date("Y"); ?> RED SHADOW TEAM. All Rights Reserved.</p>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery และ DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        new DataTable('#athleteTable', {
            language: {
                search: 'ค้นหา:',
                lengthMenu: 'แสดง _MENU_ รายการ',
                info: 'หน้า _PAGE_ จาก _PAGES_',
                infoEmpty: 'ไม่มีข้อมูล',
                zeroRecords: 'ไม่พบข้อมูล',
                paginate: {
                    first: 'หน้าแรก',
                    last: 'หน้าสุดท้าย',
                    next: 'ถัดไป',
                    previous: 'ก่อนหน้า'
                }
            }
        });
    </script>
</body>
</html>