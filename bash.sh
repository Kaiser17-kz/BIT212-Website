#!/bin/bash -xe
apt update -y


sudo apt install apache2
sudo apt install mysql-server
sudo apt install php-mysql


sudo systemctl start apache2
sudo systemctl enable apache2

sudo systemctl start mysql
sudo systemctl enable mySQL


cd ~
wget https://secretrecipewebsite.s3.us-east-1.amazonaws.com/cafe.zip 


sudo unzip cafe.zip -d /var/www/html/ 

mysql -u root -e "CREATE USER 'admin' IDENTIFIED WITH mysql_native_password BY 'cafe'";
mysql -u root -e "GRANT all privileges on *.* to 'admin'@'%';"
mysql -u root -e "CREATE DATABASE CAFE;"
mysql -u root -e "USE CAFE; 
CREATE TABLE productgroup (
  product_group INT(3) NOT NULL PRIMARY KEY,
  product_group_name VARCHAR(25) NOT NULL DEFAULT ''
  );


INSERT INTO productgroup (product_group, product_group_name) VALUES
	(1, 'Cake')
	, (2, 'Drinks'),
  (3, 'Dishes')
  ,(4,'Others');

CREATE TABLE product (
  id INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(40) NOT NULL DEFAULT '',
  description VARCHAR(200) NOT NULL DEFAULT '',
  price DECIMAL(10,2) NOT NULL DEFAULT 0.0,
  product_group INT(2) NOT NULL DEFAULT 1,
  image_url VARCHAR(256) DEFAULT 'images/default-image.jpg',
  FOREIGN KEY (product_group) REFERENCES productgroup (product_group)
  );

CREATE TABLE ordertable(
  order_number INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  order_date_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  amount DECIMAL(10,2) NOT NULL DEFAULT 0.0
  );


CREATE TABLE order_item (
  order_number INT(5) NOT NULL,
  order_item_number INT(5) NOT NULL,
  product_id INT(3),
  quantity INT(2),
  amount DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (order_number, order_item_number),
  FOREIGN KEY (order_number) REFERENCES ordertable(order_number),
  FOREIGN KEY (product_id) REFERENCES product (id)
  );



INSERT INTO product (product_name, description, price, product_group, image_url) VALUES
	  ('Black Forest', 'Sweet, fruity, and chocolatey—pure indulgence!', 13.50, 1, 'images/black_forest.png')
	, ('Choco Banana', 'We’ve got the perfect blend of chocolate and banana!', 15.00, 1, 'images/choco_banana.png')
	, ('Vanila Cake', 'Made with Madagascar vanilla with a sweet scent of frostings', 22.50, 1, 'images/vanila.jpg')
	, ('Araibata Spagetti', 'Italy style tomato pasta with thick sauce  ', 15.50, 3, 'images/araibata_spagetti.png')
	, ('Marcaroni and Cheese', 'A rich and creamy delight with our secret homemade mac & cheese sauce!', 12.50, 3, 'images/marcaroni.png')
  , ('Bolongnese', 'Made with rich Bolognese sauce and delicious imported pasta!', 16.50, 3, 'images/bolognese.png')
	, ('Latte', 'Freshly brewed black or expertly blended Colombian coffee!', 6.00, 2, 'images/coffee.png')
	, ('Tea', 'Elegant and full-bodied English tea, crafted to perfection!', 5.00, 2, 'images/tea.png')
	, ('Strawberry Soda', 'Strawberry smoothie with the fresh strawberries', 8.50, 2, 'images/strawberry.png');"




cd ~
cd /var/www/html/cafe
npm install aws aws-sdk


mysqldump  -u admin -p --databases CAFE > cafe.sql
mysql -u admin -p  -h secretrecipedb.c1qc6y8aacwe.us-east-1.rds.amazonaws.com < cafe.sql

aws secretsmanager create-secret \
--name SecretRecipeDBSecret \
--description "Database secret for  Secret Recipe Website Database" \
--secret-string "{\"user\":\"admin\",\"password\":\"secretrecipecafe\",\"host\":\"secretrecipedb.c1qc6y8aacwe.us-east-1.rds.amazonaws.com\",\"db\"a:\"CAFE\",\"server_url\":\"  secretrecipedb.c1qc6y8aacwe.us-east-1.rds.amazonaws.com \"}"
