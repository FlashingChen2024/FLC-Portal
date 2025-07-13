-- 创建网站信息表
CREATE TABLE IF NOT EXISTS `websites` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  `remark` TEXT,
  `status` TINYINT DEFAULT 0, -- 0=未审核，1=已审核
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- 创建管理员表
CREATE TABLE IF NOT EXISTS `admins` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL
);

-- 插入默认管理员账号
INSERT INTO `admins` (`username`, `password`) 
SELECT 'FlashingChen', MD5('evan520robby')
WHERE NOT EXISTS (SELECT 1 FROM `admins` WHERE `username` = 'admin');