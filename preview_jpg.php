<?php

// ❌ ไม่ใช้ mPDF แล้ว

// ขนาด 1920x1080 px (ใช้ใน browser จริง)
$bg_url = 'img/bg2.jpg';
$company = 'บจก.บีดีเอ็มเอสเทรนนิ่ง (สำนักงานใหญ่)';
$date = '24 กุมภาพันธ์ 2569';
$user = 'Username ตามไฟล์แนบ';
$link = 'https://www.entraining.net/';
$qr_url = "https://api.qrserver.com/v1/create-qr-code/?size=430x430&data=" . urlencode($link);
$spare = 'User1001<br>User1002<br>User1003<br>User1004<br>User1005';

$data = [
    ['user' => '@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => '@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => '@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => '@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => '@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => '@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => '@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => '@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => '@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => '@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => '@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => '@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => '@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => '@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => '@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => '@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => '@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => '@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => '@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => '@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
];

$total = count($data);
$half = ceil($total / 2);

if ($total <= 14) {
    $left_data = $data;
    $right_data = [];
} else {
    $left_data = array_slice($data, 0, $half);
    $right_data = array_slice($data, $half);
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

<style>

body{
    margin:0;
    background:#333;
}

/* 🔥 ครอบทั้งหมดไว้ในกล่อง 1920x1080 */
#capture-area{
    position:relative;
    width:1920px;
    height:1080px;
    margin:auto;
    background-image:url("<?= $bg_url ?>");
    background-size:cover;
    overflow:hidden;
    font-family:"Prompt";
    color:#ffffff;
}

.content-overlay {
    padding: 1px;
    height: 100%;
}

.header {
    margin-top: 100px;
    margin-left: 60px;
    width: 1290px;
    text-align: center;
}

.date {
    position: absolute;
    bottom: 40px;
    left: 227px;
    width: 500px;
    text-align: center;
    font-size: 33pt;
    color: #f1c40f;
    font-weight: bold;
}

.user {
    position: absolute;
    bottom: 88px;
    left: 1070px;
    width: 500px;
    text-align: left;
    font-size: 22pt;
    color: #f1c40f;
    font-weight: bold;
}

.link {
    position: absolute;
    bottom: 0px;
    left: 893px;
    width: 800px;
    height: 45px;
    font-size: 18pt;
    color: #ffffff;
}

.qr-code {
    position: absolute;
    bottom: 73px;
    left: 1435px;
}

.spare {
    position: absolute;
    bottom: 550px;
    left: 1450px;
    width: 200px;
    height: 300px;
    font-size: 23pt;
    color: #ffffff;
}

.header h1 { 
    font-size: 42pt; 
    color: #f1c40f;
}

.list-container {
    position: absolute;
    top: 200px;
    left: 180px;
    width: 1350px;
    height: 750px;
}

.one {
    position: absolute;
    top: 200px;
    left: 180px;
    width: 1350px;
    height: 750px;
}

.two {
    position: absolute;
    top: 200px;
    left: 40px;
    width: 1350px;
    height: 750px;
}

.main-list-table {
    margin: 0 auto;
    width: 1000px;
    padding: 5px;
}

.list-column {
    width: 50%;
    vertical-align: top;
    padding: 0 40px;
}

.v-line {
    border-right: 2px solid rgba(255, 255, 255, 0.6);
}

.user-row-table {
    width: 100%;
    margin-bottom: 8px;
}

.user-row-table td {
    font-size: 20pt;
    padding: 2px 0;
}

.col-id {
    width: 10px;
    text-align: left;
    font-weight: bold;
    /* color: #f1c40f; */
    padding-right: 10px;
}

.col-name {
    text-align: left;
    text-transform: uppercase;
    white-space: nowrap;
}

</style>
</head>

<body>

<div id="capture-area">

<div class="content-overlay">
    <div class="header">
        <h1><?= $company ?></h1>
    </div>
</div>

<?php
            $contenclass = (!empty($right_data)) ? 'two' : 'one';
            ?>

<div class="<?= $contenclass ?>">
    <table class="main-list-table">
        <tr>
            <?php
            $left_class = (!empty($right_data)) ? 'list-column v-line' : 'list-column';
            ?>
            <td class="<?= $left_class ?>">
                <?php foreach ($left_data as $row): ?>
                    <table class="user-row-table">
                        <tr>
                            <td class="col-id"><?= $row['user'] ?></td>
                            <td class="col-name">&nbsp;&nbsp;<?= $row['name'] ?></td>
                        </tr>
                    </table>
                <?php endforeach; ?>
            </td>

            <?php if (!empty($right_data)): ?>
            <td class="list-column">
                <?php foreach ($right_data as $row): ?>
                    <table class="user-row-table">
                        <tr>
                            <td class="col-id"><?= $row['user'] ?></td>
                            <td class="col-name">&nbsp;&nbsp;<?= $row['name'] ?></td>
                        </tr>
                    </table>
                <?php endforeach; ?>
            </td>
            <?php endif; ?>

        </tr>
    </table>
</div>

<div class="date"><?= $date ?></div>
<div class="user"><?= $user ?></div>
<div class="link"><?= $link ?></div>

<div class="qr-code">
    <img src="<?= $qr_url ?>">
</div>

<div class="spare"><?= $spare ?></div>

</div>

<br><br>
<center>
<button onclick="downloadJPG()" style="padding:15px 40px;font-size:20px;">
Download JPG
</button>
</center>

<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<script>
function downloadJPG(){
    const element = document.getElementById("capture-area");

    html2canvas(element,{
        scale:2,
        useCORS:true,
        allowTaint:true
    }).then(canvas=>{
        const imgData = canvas.toDataURL("image/jpeg",1.0);
        const link = document.createElement("a");
        link.href = imgData;
        link.download = "transaction_report.jpg";
        link.click();
    });
}
</script>

</body>
</html>