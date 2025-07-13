# 老陈传送门系统 - 部署与安装指南

## 一、项目简介
"老陈传送门"是一个网站跳转平台，用户访问指定页面时可随机跳转至已审核的网站，并提供网站申请、后台管理等功能。

## 二、技术栈
- **前端**：HTML + CSS + JavaScript
- **后端**：PHP
- **数据库**：MySQL
- **安全防护**：火毅盾云安全（CDN & 防护）

## 三、目录结构
```
├── /admin/             # 后台管理页面
├── /api/               # API接口文件
├── /css/               # 样式文件
├── /js/                # JavaScript脚本
├── /images/            # 图片资源
├── config.php          # 配置文件
├── index.php           # 首页
├── chuansong.php       # 传送页面
└── init.sql            # 数据库初始化文件
```

## 四、环境要求
- PHP 7.4+（需启用 mysqli 扩展）
- MySQL 5.6+
- Apache/Nginx Web服务器
- HTTPS证书（推荐）

## 五、安装步骤

### 1. 导入数据库结构
使用 `init.sql` 文件创建数据库表结构：
```sql
-- 创建数据库
CREATE DATABASE IF NOT EXISTS chuansong;

-- 使用数据库
USE chuansong;

-- 导入表结构和初始数据
SOURCE init.sql;
```

### 2. 修改配置文件 `config.php`
根据您的实际环境修改数据库连接信息和管理员账号密码：
```php
// 数据库配置
define('DB_HOST', 'localhost'); // 数据库地址
define('DB_USER', 'root');      // 数据库用户名
define('DB_PASS', '');          // 数据库密码
define('DB_NAME', 'chuansong'); // 数据库名称

// 管理员配置
define('ADMIN_USER', 'admin');         // 管理员用户名
define('ADMIN_PASS', md5('admin123')); // 管理员密码（MD5加密）
```

### 3. 配置Web服务器
#### Apache配置示例：
```apacheconf
<VirtualHost *:80>
    ServerAdmin admin@example.com
    DocumentRoot "D:/AI_Coding/go_chenyuxia_com"
    ServerName localhost

    <Directory "D:/AI_Coding/go_chenyuxia_com">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

#### Nginx配置示例：
```nginx
server {
    listen 80;
    server_name localhost;
    root D:/AI_Coding/go_chenyuxia_com;
    index index.php index.html;

    location / {
        try_files $uri $uri/ =404;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php-fpm.sock;
    }
}
```

### 4. 访问后台管理界面
打开浏览器，访问 `/admin/login.php` 进行登录。
默认管理员账号：
- 用户名：admin
- 密码：admin123

## 六、安全建议
1. 修改默认管理员密码为更复杂的密码
2. 将 `/admin/` 目录重命名为不易猜测的名称
3. 在生产环境中关闭 PHP 错误输出（`display_errors = Off`）
4. 定期备份数据库
5. 对于高安全性需求，可以添加以下措施：
   - 登录尝试次数限制（防止暴力破解）
   - 两步验证（如短信验证码或邮箱验证）
   - IP白名单访问控制
   - 使用 HTTPS 加密传输（必须）

## 七、常见问题及解决方法

### 1. 页面显示“数据库连接失败”
- 检查 `config.php` 中的数据库连接信息是否正确
- 确保 MySQL 服务正在运行
- 检查数据库用户是否有权限访问 `chuansong` 数据库

### 2. 登录页面无法登录
- 确认输入的用户名和密码是否正确（默认：admin/admin123）
- 检查数据库中的 `admins` 表是否存在以及记录是否正确
- 确保 PHP 的 session 功能已启用

### 3. 提交申请后数据未保存
- 检查 `submit_website.php` 接口是否正常工作
- 确保 `websites` 表存在且有写入权限
- 检查 PHP 是否启用了 mysqli 扩展

### 4. 前端样式显示异常
- 确保 `/css/style.css` 文件被正确加载
- 检查浏览器控制台是否有 404 错误（路径错误）
- 清除浏览器缓存或尝试硬刷新（Ctrl+F5 或 Cmd+Shift+R）

## 八、扩展功能建议
1. 添加网站分类功能
2. 增加点击统计功能
3. 增加前台搜索网站功能
4. 增加网站图标上传功能
5. 实现分页功能（当前为一次性加载全部数据）
6. 添加登录验证码功能（防止暴力破解）
7. 实现导出/导入网站数据功能（CSV或Excel格式）
8. 增加操作日志记录功能（记录管理员操作历史）
9. 实现多管理员支持和权限分级管理