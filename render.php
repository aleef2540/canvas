<?php
require_once __DIR__ . '/vendor/autoload.php';

// ขนาด 1920x1080 px แปลงเป็น mm
$width = 508;
$height = 285.75;

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];


$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [$width, $height],
    'margin_left' => 0,
    'margin_right' => 0,
    'margin_top' => 0,
    'margin_bottom' => 0,
    'transparent' => true,
    'img_dpi' => 96,
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/font', // โฟลเดอร์ที่เก็บไฟล์ .ttf
    ]),
    'fontdata' => $fontData + [
        'prompt' => [
            'R' => 'Prompt-Regular.ttf',
            'B' => 'Prompt-Bold.ttf',
        ]
    ],
    'default_font' => 'prompt' // ตั้งค่าให้เป็นฟอนต์หลัก
]);

// ตรงนี้คุณสามารถเปลี่ยนเป็นรูปพื้นหลังของคุณได้เลย
$bg_url = 'img/bg2.jpg';
$company = 'บจก.บีดีเอ็มเอสเทรนนิ่ง (สำนักงานใหญ่)';
$date = '24 กุมภาพันธ์ 2569';
$user = 'Username ตามไฟล์แนบ';
$link = 'https://www.entraining.net/';
$qr_url = "https://api.qrserver.com/v1/create-qr-code/?size=430x430&data=" . urlencode($link);
$spare = 'User1001<br>User1002<br>User1003<br>User1004<br>User1005';
$data = [
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
    ['user' => 'iroj.bhothidhong@ych.com', 'name' => 'ชัญญานุช อ่วมสาสตร์'],
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

$html = '
<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
<style>
    @page {
        background-image: url("' . $bg_url . '");
        background-image-resize: 6;
    }
    body {
        font-family: "garuda"; /* หรือ thsarabun */
        color: #ffffff;
    }
    .content-overlay {
        // border: 4px solid #f1c40f;
        padding: 1px;
        height: 100%;
    }
    .header {
        // border: 4px solid #f1c40f;
        // padding-bottom: 20px;
        // margin-bottom: 30px;
        margin-top: 60px;
        margin-left: 60px;
        // background-color: red;
        width: 1290px;
        text-align: center;
        // height: 100px;
    }
    .date {
         position: absolute; /* ใช้ absolute เพื่ออ้างอิงตำแหน่งกับหน้ากระดาษ */
         bottom: 40px;       /* ห่างจากขอบล่าง 50px (ปรับตัวเลขนี้ตามความเหมาะสมของพื้นหลัง) */
         left: 227px;         /* ห่างจากขอบซ้าย */
        
        //border: 4px solid #f1c40f;
        // padding-bottom: 20px;
        // margin-bottom: 30px;
        // margin-top: 600px;
        // background-color: red;
        width: 500px;
        text-align: center;
        // height: 100px;
        font-family: "Prompt"; font-size: 33pt; color: #f1c40f;
        font-weight: bold; /* สั่งให้เป็นตัวหนา */

        
    }
    .user {
        position: absolute; /* ใช้ absolute เพื่ออ้างอิงตำแหน่งกับหน้ากระดาษ */
        bottom: 88px;       /* ห่างจากขอบล่าง 50px (ปรับตัวเลขนี้ตามความเหมาะสมของพื้นหลัง) */
        left: 1070px;         /* ห่างจากขอบซ้าย */
       width: 500px;
       text-align: left;
       font-family: "Prompt"; 
       font-size: 22pt; 
       color: #f1c40f;
       font-weight: bold; /* สั่งให้เป็นตัวหนา */

       
   }
   .link {
    position: absolute; /* ใช้ absolute เพื่ออ้างอิงตำแหน่งกับหน้ากระดาษ */
    bottom: 0px;       /* ห่างจากขอบล่าง 50px (ปรับตัวเลขนี้ตามความเหมาะสมของพื้นหลัง) */
    left: 893px;         /* ห่างจากขอบซ้าย */
   width: 800px;
   text-align: left;
   height: 45px;
   font-family: "Prompt"; 
   font-size: 18pt; 
   color: #ffffff;
   
}
.qr-code {
    position: absolute; /* ใช้ absolute เพื่ออ้างอิงตำแหน่งกับหน้ากระดาษ */
    bottom: 73px;       /* ห่างจากขอบล่าง 50px (ปรับตัวเลขนี้ตามความเหมาะสมของพื้นหลัง) */
    left: 1435px;         /* ห่างจากขอบซ้าย */
   
}

.spare {
    position: absolute; /* ใช้ absolute เพื่ออ้างอิงตำแหน่งกับหน้ากระดาษ */
    bottom: 545px;       /* ห่างจากขอบล่าง 50px (ปรับตัวเลขนี้ตามความเหมาะสมของพื้นหลัง) */
    left: 1420px;         /* ห่างจากขอบซ้าย */
   width: 200px;
   text-align: center;
   height: 300px;
   font-family: "Prompt"; 
   font-size: 23pt; 
   color: #ffffff;
//    border: 4px solid #f1c40f;
}


    // .date h1 { font-family: "Prompt"; font-size: 37pt; color: #f1c40f;}

    .header h1 { font-family: "Prompt"; font-size: 42pt; color: #f1c40f;}
    
    p {font-family: "Prompt"; font-size: 40pt; color: #f1c40f;}
    .status-success { color: #2ecc71; }

    /* กล่องคุมพื้นที่รายชื่อ */
    .list-container {
        position: absolute;
        top: 200px;      /* ปรับระดับสูง-ต่ำตามความเหมาะสม */
        left: 40px;
        width: 1350px;   /* ความกว้างที่ครอบคลุม 2 คอลัมน์รายชื่อ */
        height: 750px;
    }

    .main-list-table {
        margin: 0 auto;       /* ดีดตารางทั้งก้อนมาอยู่กึ่งกลางหน้าจอ */
        width: 1000px;
        // border: 4px solid #f1c40f;
        padding: 5px;
        /* มั่นใจว่าไม่มีสีพื้นหลัง */
    background: transparent;
    background-color: transparent;
    }

    .list-column {
        width: 50%;
        vertical-align: top;
        padding: 0 40px;
        // border: 4px solid #f1c40f;
    }

    /* เส้นตั้งคั่นกลางสีขาว */
    .v-line {
        border-right: 2px solid rgba(255, 255, 255, 0.6);
    }

    /* ตารางย่อยสำหรับแต่ละบรรทัด (ID + Name) */
    .user-row-table {
        width: 100%;
        margin-bottom: 8px;
        // border: 4px solid red;
        text-align: center;
        // padding-left: 100px;
    }

    .user-row-table td {
        font-family: "prompt";
        font-size: 20pt;
        color: #ffffff;
        padding: 2px 0;
        // border: 4px solid #ffffff;
        
    }

    .col-id {
        /* ล็อกความกว้าง ID ไว้ระดับหนึ่งเพื่อให้ชื่อฝั่งซ้าย-ขวาดูตรงกัน */
    width: 10px; 
    text-align: left;
    font-weight: bold;
    color: #f1c40f;
    padding-right: 10px; /* เว้นระยะห่างจากชื่อ */
    border: none;
    }

    .col-name {
        /* เอา width: 50px ออก เพื่อให้มันกว้างตามชื่อที่ยาวที่สุด */
    // width: auto; 
    text-align: left;
    text-transform: uppercase;
    white-space: nowrap; /* ป้องกันไม่ให้ mPDF ตัดบรรทัดชื่อถ้าไม่จำเป็น */
    border: none;
    }

</style>

<div class="content-overlay">
    <div class="header">
        <h1>'.$company.'</h1>
    </div>
</div>

<div class="list-container">
    <table class="main-list-table">
        <tr>';
            // คอลัมน์ซ้าย (แสดงเสมอ)
            // เช็คว่าถ้ามีข้อมูลขวา ให้เติมคลาส v-line เพื่อเอาเส้นคั่นกลางมาโชว์
            $left_class = (!empty($right_data)) ? 'list-column v-line' : 'list-column';
            $html .= '<td class="' . $left_class . '">';
                foreach ($left_data as $row) {
                    $html .= '
                    <table class="user-row-table">
                        <tr>
                            <td class="col-id">' . $row['user'] . '</td>
                            <td class="col-name">&nbsp;&nbsp;' . $row['name'] . '</td>
                        </tr>
                    </table>';
                }
            $html .= '</td>';

            // คอลัมน์ขวา (แสดงเฉพาะเมื่อมีข้อมูลเท่านั้น)
            if (!empty($right_data)) {
                $html .= '<td class="list-column">';
                    foreach ($right_data as $row) {
                        $html .= '
                        <table class="user-row-table">
                            <tr>
                                <td class="col-id">' . $row['user'] . '</td>
                                <td class="col-name">&nbsp;&nbsp;' . $row['name'] . '</td>
                            </tr>
                        </table>';
                    }
                $html .= '</td>';
            }

$html .= '</tr>
    </table>
</div>
<div class="date">
'.$date.'
</div>
<div class="user">
'.$user.'
</div>
<div class="link">
'.$link.'
</div>
<div class="qr-code">
        <img src="' . $qr_url . '">
    </div>
    <div class="spare">
         '. $spare . '
    </div>
';

$mpdf->WriteHTML($html);
$mpdf->Output('transaction_report.pdf', 'I');
