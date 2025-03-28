--
-- Creates a admin user that can connect from any host and sets the password for all admin users in Mariadb
--
USE mysql;
CREATE user 'admin'@'%';
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%';
--UPDATE user SET password=PASSWORD("cafe") WHERE user='admin';
SET PASSWORD FOR 'admin'@'%' = PASSWORD('cafe');
flush privileges;