<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ทดสอบระบบสั่งการด้วยเสียง (Speech to Text)</title>
    <style>
        body { font-family: 'Tahoma', sans-serif; text-align: center; padding-top: 50px; background-color: #f4f4f9; }
        .container { background: white; padding: 30px; border-radius: 15px; display: inline-block; shadow: 0 4px 6px rgba(0,0,0,0.1); border: 1px solid #ddd; }
        #status { color: #666; font-style: italic; }
        #result { 
            font-size: 24px; color: #2c3e50; font-weight: bold; 
            margin-top: 20px; min-height: 50px; padding: 10px; border: 2px dashed #3498db; border-radius: 10px;
        }
        .btn-listen {
            background-color: #3498db; color: white; border: none; padding: 10px 20px;
            border-radius: 5px; cursor: pointer; font-size: 16px; transition: 0.3s;
        }
        .btn-listen:hover { background-color: #2980b9; }
        .listening { animation: pulse 1.5s infinite; background-color: #e74c3c !important; }
        @keyframes pulse { 0% { opacity: 1; } 50% { opacity: 0.5; } 100% { opacity: 1; } }
    </style>
</head>
<body>

<div class="container">
    <h2>Voice Command Tester 🎤</h2>
    <p id="status">กดปุ่มด้านล่างเพื่อเริ่มพูด (รองรับภาษาไทย)</p>
    
    <button id="startBtn" class="btn-listen" onclick="startListening()">เริ่มบันทึกเสียง</button>
    
    <div id="result">... สิ่งที่คุณพูดจะปรากฏตรงนี้ ...</div>
    
    <p style="margin-top: 20px; font-size: 0.9em; color: #888;">
        (แนะนำให้ใช้ Chrome ในการทดสอบ)
    </p>
</div>

<script>
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

    if (!SpeechRecognition) {
        alert("ขออภัย Browser ของคุณไม่รองรับการสั่งงานด้วยเสียง กรุณาใช้ Google Chrome");
    } else {
        const recognition = new SpeechRecognition();
        recognition.lang = 'th-TH';
        recognition.continuous = false;
        recognition.interimResults = false;

        const startBtn = document.getElementById('startBtn');
        const resultDiv = document.getElementById('result');
        const statusText = document.getElementById('status');

        function startListening() {
            recognition.start();
            startBtn.classList.add('listening');
            startBtn.innerText = "กำลังฟัง...";
            resultDiv.innerText = "กำลังประมวลผล...";
        }

        // รวมเงื่อนไขทั้งหมดไว้ใน onresult เดียว
        recognition.onresult = (event) => {
            const command = event.results[0][0].transcript.trim();
            resultDiv.innerText = "คุณพูดว่า: " + command;
            
            // 1. เงื่อนไขเปิด Google
            if (command.includes("ตั้งตู้") || command.includes("ทีพี")) {
                resultDiv.innerHTML += "<br><span style='color:green;'>ระบบ: กำลังเปิด Google...</span>";
                // ใช้ window.open (อย่าลืมกด Allow Popup ที่มุมขวาบนของ Browser ด้วยนะครับ)
                window.open("https://www.entraining.net/2018/adm/welcome.php?page=academy&act=add_form", "_blank");
            }
            
            // 2. เงื่อนไขไปหน้า Wallet (PHP ของคุณ)
            else if (command.includes("ดูวอลเล็ต")) {
                resultDiv.innerHTML += "<br><span style='color:blue;'>ระบบ: กำลังไปหน้าประวัติการเงิน...</span>";
                window.location.href = "wallet_history.php"; 
            }

            // 3. เงื่อนไขทักทาย
            else if (command.includes("สวัสดี")) {
                resultDiv.innerHTML += "<br><span style='color:orange;'>ระบบ: สวัสดีครับคุณเจ้าของ!</span>";
            }
        };

        recognition.onend = () => {
            startBtn.classList.remove('listening');
            startBtn.innerText = "เริ่มบันทึกเสียง";
            statusText.innerText = "พูดจบแล้ว กดอีกครั้งเพื่อเริ่มใหม่";
        };

        recognition.onerror = (event) => {
            console.error(event.error);
            startBtn.classList.remove('listening');
            if(event.error === 'not-allowed') {
                alert("กรุณากดยอมรับการใช้ไมโครโฟนด้วยครับ");
            }
        };
    }
</script>

</body>
</html>