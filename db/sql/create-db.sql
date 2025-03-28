/*
	Database Creation Script for the cafe database
*/
DROP DATABASE IF EXISTS cafe_db;

CREATE DATABASE cafe_db;

USE cafe_db;

/* Create PRODUCT_GROUP table. */

CREATE TABLE product_group (
  product_group_number INT(3) NOT NULL PRIMARY KEY,
  product_group_name VARCHAR(25) NOT NULL DEFAULT ''
  );

/* INSERT initialization data into the PRODUCT_GROUP table. */

INSERT INTO product_group (product_group_number, product_group_name) VALUES
	  (1, 'Cake')
	, (2, 'Drinks'),
  (3, 'Dishes');

/* Create PRODUCT table. */

CREATE TABLE product (
  id INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(40) NOT NULL DEFAULT '',
  description VARCHAR(200) NOT NULL DEFAULT '',
  price DECIMAL(10,2) NOT NULL DEFAULT 0.0,
  product_group INT(2) NOT NULL DEFAULT 1,
  image_url VARCHAR(256) DEFAULT 'images/default-image.jpg',
  FOREIGN KEY (product_group) REFERENCES product_group (product_group_number)
  );

/* INSERT initialization data into the PRODUCT table. */

INSERT INTO product (product_name, description, price, product_group, image_url) VALUES
	  ('Black Forest', 'Fresh, Berry and Chocolate... Simply delicious!', 13.50, 1, 'images/black_forest.png')
	, ('Choco Banana', 'We have more than half-a-dozen flavors!', 15.00, 1, 'images/choco_banana.png')
	, ('Durian', 'Made with Malaysia Musang King with a touch of Madagascar vanilla', 22.50, 1, 'images/durian.png')
	, ('Araibata Spagetti', 'Italy style pasta with  Tomato Sauce  ', 15.50, 3, 'images/araibata spagetti.png')
	, ('Marcaroni', 'Bursting taste with a Homemade secret Marcaroni sauce', 12.50, 3, 'images/marcaroni.png')
  , ('Bolongnese', 'Made with france cheese and a delicious imported Pasta', 16.50, 3, 'images/bolognese.png')
	, ('Coffee', 'Freshly-ground black or blended Columbian coffee', 6.00, 2, 'images/coffee.png')
	, ('Tea', 'Rich flavour red tea from Cameron Highland', 5.00, 2, 'images/tea.png')
	, ('Strawberry Soda', 'Strawberry juice with the sparking feels', 8.50, 2, 'images/strawberry.png');

/* Create ORDER table. */

CREATE TABLE `order` (
  order_number INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  order_date_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  amount DECIMAL(10,2) NOT NULL DEFAULT 0.0
  );

/* Create ORDER_ITEM table. */

CREATE TABLE order_item (
  order_number INT(5) NOT NULL,
  order_item_number INT(5) NOT NULL,
  product_id INT(3),
  quantity INT(2),
  amount DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (order_number, order_item_number),
  FOREIGN KEY (order_number) REFERENCES `order` (order_number),
  FOREIGN KEY (product_id) REFERENCES product (id)
  );
