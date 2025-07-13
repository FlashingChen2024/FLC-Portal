<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>老陈传送门</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: #f5f5f7;
            color: #1c1c1e;
        }
        .hero {
            background: linear-gradient(135deg, #007AFF, #00C2FF);
            color: white;
            padding: 5rem 2rem;
            text-align: center;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: 600;
            margin-bottom: 1rem;
            animation: fadeInDown 1s ease-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .hero p {
            font-size: 1.25rem;
            max-width: 600px;
            margin: 0 auto 2rem;
        }
        .features {
            padding: 4rem 2rem;
        }
        .feature {
            background-color: white;
            border-radius: 1.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            padding: 2rem;
            transition: transform 0.3s ease;
        }
        .feature:hover {
            transform: translateY(-5px);
        }
        .feature h3 {
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .feature p {
            color: #666;
        }
        .call-to-action {
            text-align: center;
            padding: 3rem 2rem;
        }
        .apply-btn {
            background-color: #007AFF;
            color: white;
            padding: 0.75rem 2rem;
            font-size: 1.1rem;
            border-radius: 1rem;
            border: none;
            transition: all 0.3s ease;
        }
        .apply-btn:hover {
            background-color: #0056b3;
            color: white;
        }
        footer {
            text-align: center;
            padding: 2rem;
            background-color: #fff;
            color: #999;
            font-size: 0.9rem;
            border-top: 1px solid #eee;
        }
        .modal-content {
            border-radius: 1.5rem;
            border: none;
        }
        .modal-header {
            border-bottom: none;
        }
        .modal-footer {
            border-top: none;
            justify-content: center;
        }
        .btn-apple {
            background-color: #007AFF;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 1rem;
            border: none;
            font-weight: 500;
        }
        .btn-apple:hover {
            background-color: #0056b3;
            color: white;
        }

        .btn-white-outline {
            background-color: white;
            color: #1c1c1e;
            border-color: #dee2e6;
        }

        .btn-white-outline:hover {
            background-color: #f8f9fa;
            color: #1c1c1e;
            border-color: #ced4da;
        }

        .btn-apple, .btn-white-outline {
            border-radius: 1rem;
            transition: all 0.3s ease;
        }

        .btn-apple:hover, .btn-white-outline:hover {
            transform: scale(1.05);
        }

        .btn-outline-apple {
            border-color: #007AFF;
            color: #007AFF;
            border-radius: 1rem;
            font-weight: 500;
        }
        .btn-outline-apple:hover {
            background-color: #007AFF;
            color: white;
            border-color: #007AFF;
        }
        .success-toast {
            top: 20px;
            left: 20px;
            right: auto;
            z-index: 1150;
            background-color: #ffffff;
            border-radius: 1rem;
            padding: 1rem 1.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            display: none;
            animation: fadeIn 0.3s ease forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .success-toast.show {
            display: block;
        }
        .success-toast .icon {
            width: 24px;
            height: 24px;
            vertical-align: middle;
            margin-right: 8px;
        }
        .success-toast .message {
            vertical-align: middle;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="hero">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="mb-0">欢迎使用老陈传送门</h2>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-apple btn-lg px-4 py-3" onclick="scrollToForm()">申请加入</button>
                <a href="/chuansong.php" class="btn btn-white-outline btn-lg px-4 py-3 ms-3 text-dark">立即跳转</a>
            </div>

            <script>
            function scrollToForm() {
                console.log('开始执行滚动函数');
                
                // 尝试立即滚动
                const form = document.getElementById('applyForm');
                if (form) {
                    scrollWithOffset(form);
                    console.log('立即找到表单元素并执行滚动');
                    return;
                }
                
                // 如果没找到元素，等待200ms后重试（可能被弹窗阻塞渲染）
                setTimeout(() => {
                    const form = document.getElementById('applyForm');
                    if (form) {
                        scrollWithOffset(form);
                        console.log('延迟找到表单元素并执行滚动');
                    } else {
                        console.error('未找到ID为 applyForm 的表单元素');
                    }
                }, 200);
            }

            function scrollWithOffset(form) {
                window.scrollTo({
                    top: form.getBoundingClientRect().top + window.scrollY - 80,
                    behavior: 'smooth'
                });
            }
            </script>
        </div>
    </div>

    <section class="features bg-light py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature">
                        <h3>快速跳转</h3>
                        <p>访问传送页面时，系统将为您随机选择一个已审核的优质网站，并在3秒倒计时后自动跳转。</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <h3>安全防护</h3>
                        <p>所有提交的网站都会经过管理员审核，确保内容合规、安全可靠。我们的服务由火毅盾云安全提供CDN加速与全面防护。</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <h3>开放合作</h3>
                        <p>只要您的网站符合规范，就可以加入我们的传送网络，让更多用户发现您的优质内容或服务。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold">为什么选择老陈传送门？</h2>
                <p class="text-muted mt-2">我们致力于打造一个公平、透明、安全的网站推广平台。</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="feature h-100">
                        <h3>智能筛选机制</h3>
                        <p>平台采用多维度审核机制，确保只有高质量网站才能进入传送网络，提升用户体验。</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feature h-100">
                        <h3>全球加速与安全</h3>
                        <p>依托火毅盾云安全提供的全球CDN加速和全方位安全防护，保障平台稳定运行，抵御各种攻击。</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feature h-100">
                        <h3>去中心化传播</h3>
                        <p>无需依赖搜索引擎，通过随机跳转实现去中心化流量分发，为中小站长提供更多曝光机会。</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feature h-100">
                        <h3>简洁无广告</h3>
                        <p>整个平台界面极简，没有干扰性广告，专注于为您提供最纯粹的网站跳转体验。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="call-to-action text-center py-5">
        <div class="container">
            <h2 class="mb-3">准备好加入了吗？</h2>
            <p class="mb-4">只需简单几步，就能让你的网站出现在千万用户的视野中。</p>
            <button class="btn btn-apple btn-lg px-4 py-3" data-bs-toggle="modal" data-bs-target="#myModal">立即申请加入</button>
            <a href="/chuansong.php" class="btn btn-outline-apple btn-lg px-4 py-3 ms-3">立即传送</a>
        </div>
    </section>

    <!-- 申请加入弹窗 -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">申请加入</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="applyForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">名称（您的网站名称）：</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="url" class="form-label">网址（请填写完整地址）：</label>
                            <input type="url" class="form-control" id="url" name="url" required>
                        </div>
                        <div class="mb-3">
                            <label for="remark" class="form-label">备注（可选，描述您的网站特色）：</label>
                            <textarea class="form-control" id="remark" name="remark" rows="3"></textarea>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-apple btn-lg">提交申请</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- 成功提示Toast -->
    <div class="success-toast" id="successToast">
        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%2300C85E' width='24' height='24'%3E%3Cpath d='M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z'/%3E%3C/svg%3E" alt="成功图标" class="icon">
        <span class="message">申请提交成功！</span>
    </div>

    <footer class="text-center">
        网站由<a href="https://hydun.com" target="_blank" class="text-decoration-none">火毅盾云安全</a>提供防护及CDN加速服务
    </footer>

    <!-- 引入 Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/main.js"></script>
    <script>
        // 首页申请加入弹窗功能
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('myModal');
            const toast = document.getElementById('successToast');

            // 表单提交处理
            const form = document.getElementById('applyForm');
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const formData = {
                        name: document.getElementById('name').value,
                        url: document.getElementById('url').value,
                        remark: document.getElementById('remark').value
                    };

                    fetch('/api/submit_website.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(formData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Success:', data);
                        if (data.success) {
                            toast.classList.add('show');
                            setTimeout(() => {
                                toast.classList.remove('show');
                                const modalInstance = bootstrap.Modal.getInstance(modal);
                                modalInstance.hide();
                                form.reset();
                            }, 1500);
                        } else {
                            alert('申请提交失败：' + (data.message || '未知错误'));
                        }
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                        alert('申请提交失败，请重试。');
                    });
                });
            }
        });
    </script>
</body>
</html>