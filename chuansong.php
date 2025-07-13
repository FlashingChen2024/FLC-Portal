<?php
// 引入配置文件
require_once 'config.php';

// 连接数据库
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// 检查连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 查询已审核的网站
$sql = "SELECT * FROM websites WHERE status = 1 ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 获取随机网站信息
    $row = $result->fetch_assoc();
    $websiteName = $row['name'];
    $websiteUrl = $row['url'];
} else {
    $websiteName = "暂无可用网站";
    $websiteUrl = "index.php";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>老陈传送门 - 3秒后跳转</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 100px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .countdown {
            font-size: 48px;
            color: #007BFF;
            margin: 30px 0;
        }
        p {
            font-size: 1.1em;
            color: #666;
            line-height: 1.6;
        }
        footer {
            text-align: center;
            margin-top: 50px;
            font-size: 14px;
            color: #999;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>正在跳转至<?php echo $websiteName; ?></h1>
        <div class="countdown" id="countdown">3</div>
        <p>将在<span id="countdownText">3</span>秒后自动跳转，或者点击<a href="<?php echo $websiteUrl; ?>">这里</a>手动跳转</p>
    </div>

    <footer>
        网站由<a href="https://hydun.com" target="_blank">火毅盾云安全</a>提供防护及CDN加速服务
    </footer>

    <script>
        // 倒计时功能
        let count = 3;
        const countdownElement = document.getElementById("countdown");
        const countdownTextElement = document.getElementById("countdownText");
        
        const interval = setInterval(() => {
            count--;
            countdownElement.textContent = count;
            countdownTextElement.textContent = count;
            
            if (count <= 0) {
                clearInterval(interval);
                window.location.href = "<?php echo $websiteUrl; ?>";
            }
        }, 1000);
    </script>
</body>
</html>