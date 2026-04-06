<?php
session_start();
include("db.php");
include("session_check.php");

if($_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit();
}

/* ambil report dari POST atau session */
if(isset($_POST['report']) && $_POST['report'] != ''){
    $_SESSION['selected_report'] = $_POST['report'];
}

$report = $_SESSION['selected_report'] ?? '';

$preview = isset($_POST['preview']);
$apply_filter = isset($_POST['apply_filter']);

$filter_field = $_POST['filter_field'] ?? '';
$filter_value = trim($_POST['filter_value'] ?? '');
$id_from = trim($_POST['id_from'] ?? '');
$id_to = trim($_POST['id_to'] ?? '');

$rows = [];
$columns = [];
$table_name = '';

function getReportConfig($report){
    if($report == 'traffic'){
        return [
            'table' => 'usage_logs',
            'columns' => ['id','user_name','user_email','website','access_result','created_at'],
            'filterable' => ['id','user_name','user_email','website','access_result','created_at']
        ];
    }
    if($report == 'blocked'){
        return [
            'table' => 'filters',
            'columns' => ['id','domain','filter_type','created_at'],
            'filterable' => ['id','domain','filter_type','created_at']
        ];
    }
    if($report == 'alerts'){
        return [
            'table' => 'notifications',
            'columns' => ['id','recipient_email','message','created_at'],
            'filterable' => ['id','recipient_email','message','created_at']
        ];
    }
    if($report == 'support'){
        return [
            'table' => 'support',
            'columns' => ['id','reporter_name','issue','status','created_at'],
            'filterable' => ['id','reporter_name','issue','status','created_at']
        ];
    }
    if($report == 'users'){
        return [
            'table' => 'users',
            'columns' => ['id','name','email','role','status','last_login'],
            'filterable' => ['id','name','email','role','status','last_login']
        ];
    }
    return null;
}

$config = getReportConfig($report);

if(($preview || $apply_filter || $report != '') && $config){
    $table_name = $config['table'];
    $columns = $config['columns'];

    $sql = "SELECT " . implode(",", $columns) . " FROM {$table_name} WHERE 1=1";

    if($id_from !== '' && is_numeric($id_from)){
        $sql .= " AND id >= " . (int)$id_from;
    }

    if($id_to !== '' && is_numeric($id_to)){
        $sql .= " AND id <= " . (int)$id_to;
    }

    if($filter_field !== '' && in_array($filter_field, $config['filterable']) && $filter_value !== ''){
        $safe_value = mysqli_real_escape_string($conn, $filter_value);
        $sql .= " AND {$filter_field} LIKE '%{$safe_value}%'";
    }

    $sql .= " ORDER BY id ASC";

    $result = mysqli_query($conn, $sql);

    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
    }

    $_SESSION['report_preview'] = [
        'report' => $report,
        'sql' => $sql,
        'table' => $table_name,
        'columns' => $columns
    ];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Generate Reports</title>
<style>
body{
    font-family:Arial;
    text-align:center;
    margin:0;
    min-height:100vh;
    background-image:url("images/walpaperr.png");
    background-repeat:no-repeat;
    background-position:center top;
    background-size:100% 100%;
}


table{
width:100%;
border-collapse:collapse;
margin-top:15px;
background:white;
}
th, td{
border:1px solid #ccc;
padding:8px;
text-align:center;
font-size:14px;
}
th{
background:#f2f2f2;
}
button{
padding:10px 20px;
border:none;
border-radius:20px;
cursor:pointer;
margin:5px;
}
.preview{background:#2b78e4;color:white;}
.delete{background:#dc3545;color:white;}
.download{background:#198754;color:white;}
.back{background:#ddd;}
.confirm{background:#ff9800;color:white;}
.filterbtn{background:#6f42c1;color:white;}
.section{
margin-top:25px;
padding:18px;
background:#fafafa;
border:1px solid #ddd;
border-radius:15px;
}
.footer{
margin-top:20px;
text-align:center;
color:black;
}
input, select{
padding:8px;
border-radius:10px;
border:1px solid #bbb;
margin:4px;
}
.top-buttons{
text-align:center;
margin-top:15px;
}
</style>
</head>
<body>

<div class="box">
    <center>
        <img src="images/logo.png" width="100">
        <h2>Generate Reports</h2>
    </center>

    <form method="POST" action="generate_reports.php">
        <b>Select Report:</b><br><br>

        <label><input type="radio" name="report" value="traffic" <?php if($report=='traffic') echo 'checked'; ?> required> Traffic Logs</label><br>
        <label><input type="radio" name="report" value="blocked" <?php if($report=='blocked') echo 'checked'; ?>> Blocked Sites</label><br>
        <label><input type="radio" name="report" value="alerts" <?php if($report=='alerts') echo 'checked'; ?>> Alert / Notification Logs</label><br>
        <label><input type="radio" name="report" value="support" <?php if($report=='support') echo 'checked'; ?>> Support Issues</label><br>
        <label><input type="radio" name="report" value="users" <?php if($report=='users') echo 'checked'; ?>> Users</label><br><br>

        <div class="top-buttons">
            <button type="submit" name="preview" class="preview">Preview Report</button>
            <button type="button" class="back" onclick="location.href='admin_dashboard.php'">Back</button>
        </div>
    </form>

    <?php if($report != '' && $config){ ?>
    <div class="section">
        <h3 style="text-align:center;">Report Preview</h3>

        <?php if(empty($rows)){ ?>
            <p style="text-align:center;">No data found.</p>
        <?php } else { ?>
            <table>
                <tr>
                    <th>Select</th>
                    <th>No.</th>
                    <?php foreach($columns as $col){ ?>
                        <th><?php echo htmlspecialchars($col); ?></th>
                    <?php } ?>
                </tr>

                <?php $no=1; foreach($rows as $row){ ?>
                <tr>
                    <td><input type="checkbox" form="deleteForm" name="delete_ids[]" value="<?php echo $row['id']; ?>"></td>
                    <td><?php echo $no++; ?></td>
                    <?php foreach($columns as $col){ ?>
                        <td><?php echo htmlspecialchars($row[$col] ?? ''); ?></td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </table>

            <div class="section">
                <h4 style="text-align:center;">Optional Filter / Sorting</h4>
                <p style="text-align:center;">Admin boleh tengok semua report dulu. Lepas itu kalau nak, baru filter data tertentu sahaja.</p>

                <form method="POST" action="generate_reports.php" style="text-align:center;">
                    <input type="hidden" name="report" value="<?php echo htmlspecialchars($report); ?>">

                    <b>Filter by ID range:</b><br>
                    From <input type="number" name="id_from" value="<?php echo htmlspecialchars($id_from); ?>" style="width:90px;">
                    To <input type="number" name="id_to" value="<?php echo htmlspecialchars($id_to); ?>" style="width:90px;">

                    <br><br>

                    <b>Filter by field:</b><br>
                    <select name="filter_field">
                        <option value="">-- Select Field (Optional) --</option>
                        <?php foreach($config['filterable'] as $field){ ?>
                            <option value="<?php echo $field; ?>" <?php if($filter_field==$field) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($field); ?>
                            </option>
                        <?php } ?>
                    </select>

                    <input type="text" name="filter_value" placeholder="Type value here..." value="<?php echo htmlspecialchars($filter_value); ?>" style="width:240px;">

                    <br><br>

                    <button type="submit" name="apply_filter" class="filterbtn">Apply Filter</button>
                </form>
            </div>

            <form id="deleteForm" method="POST" action="confirm_delete_report.php" style="margin-top:15px; text-align:center;">
                <button type="submit" name="delete_selected" class="delete">Delete Selected</button>
                <button type="submit" name="delete_all" class="confirm">Delete All Filtered Data</button>
            </form>

            <form method="POST" action="export_report.php" style="margin-top:15px; text-align:center;">
                <button type="submit" class="download">Download PDF</button>
            </form>
        <?php } ?>
    </div>
    <?php } ?>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
