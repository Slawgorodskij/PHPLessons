DROP DATABASE IF exists lesson_sixth;
CREATE DATABASE lesson_sixth;
USE lesson_sixth;


DROP TABLE IF EXISTS products;
CREATE TABLE products (
    id SERIAL PRIMARY KEY,
    article INT UNSIGNED NOT NULL,
    name VARCHAR(255),
    description TEXT,
    discount FLOAT UNSIGNED,
    price DECIMAL (11,2)  
);

INSERT INTO products (`article`, `name`, `description`, `discount`, `price`)
VALUES 
(2560,'The Park','Et mollitia et est minus ut repudiandae delectus odio. Rerum fugit pariatur quod iste similique sit quasi. Maxime consequatur animi possimus aut provident laudantium. Vero rerum iure eveniet fugit adipisci ut.',0,399.00),
(254364,'Cardigan','Repellat pariatur ab cum quos nobis. Et non placeat iure qui. Distinctio unde facere quam provident.',10,320.00),
(4836052,'Sweater','Et occaecati officiis omnis accusamus voluptatum nemo voluptatum alias. Autem omnis ut quod quidem. Sit ut omnis quia laborum. Distinctio dolorem eveniet omnis rem fugit hic dolorem.',10,475.01),
(85786,'ELLERY CAPSULE','Eos temporibus sunt necessitatibus harum nihil harum itaque. Consectetur dolorem aut inventore pariatur dolore dolorem sed. Vitae quas qui qui perferendis et quasi voluptatem. Qui ut doloribus aut deleniti quia ut.',15,364.18),
(867325,'Blazer','Reiciendis vero enim minus doloribus et dolores consequatur sint. Sed debitis et voluptatem enim. Laudantium ea modi vitae sunt reiciendis. Nostrum officia et placeat eos aut voluptate dolores.',5,250.00),
(25867,'Romper','Nostrum omnis voluptatem quia esse sit veniam est. At cumque mollitia distinctio reiciendis consequatur iure. Qui sit et molestiae quae corrupti aliquam voluptas.',0,508.42);


DROP TABLE IF EXISTS reviews_product;
CREATE TABLE reviews_product(
  id SERIAL PRIMARY KEY,
  user_name VARCHAR(255),
  product_id BIGINT UNSIGNED NOT NULL,
  body TEXT NOT NULL,
  created_at DATETIME DEFAULT NOW(),
  
  FOREIGN KEY (product_id) REFERENCES products(id) 
);

INSERT INTO reviews_product (`user_name`, `product_id`, `body`, `created_at`)
VALUES 
('Wanda',1,'Voluptatem accusamus odio provident labore aperiam voluptatem molestias deserunt. Incidunt dolor saepe magnam ipsam. Magnam error odio neque.','2021-01-29 06:05:04'),
('Gonzalo',2,'Vero quia sint id. Harum consequatur a saepe non odit provident ex. Quisquam incidunt aperiam ipsam assumenda.','2021-01-15 09:44:58'),
('Leopold',1,'Eos optio quia repellendus et. Nam deleniti unde porro nostrum aut. Qui odit soluta quae qui. Dolorem ea distinctio labore.','2021-03-08 17:09:54'),
('Merle',3,'Id quo earum animi commodi laboriosam dolorum. Rerum ut quas totam. Rem id placeat delectus voluptas necessitatibus nam dolorum.','2021-02-26 23:54:50'),
('Dariana',1,'Incidunt ab aliquam cupiditate commodi saepe modi iure. Molestias voluptatibus quam est repudiandae vel.','2021-04-28 11:34:49'),
('Merritt',4,'Sed quo nostrum et eos voluptatum. Sapiente sapiente non voluptate voluptatum. Vel modi voluptatem possimus consequatur illo sunt labore et. Minus quis sunt facere voluptas.','2021-09-05 18:59:45'),
('Rhett',5,'Consequatur voluptas libero laborum magni esse ipsam eaque. Maxime et minima soluta ipsum cumque ipsum.','2021-01-13 11:28:32'),
('Jaime',6,'Maxime debitis magnam deleniti accusantium. Voluptatem incidunt cum autem voluptatem ut animi praesentium. Quod autem quasi porro ex minima officia. Cumque culpa vel voluptas.','2021-06-29 23:50:46'),
('Leonor',3,'Dolore autem commodi dolor sunt. Consequatur voluptate nam suscipit tempora. Eum aut officiis delectus eaque consectetur repudiandae velit sit.','2021-05-20 20:07:49'),
('Ressie',5,'Commodi debitis perspiciatis optio aspernatur non. Necessitatibus aut omnis ipsum fugiat natus numquam omnis. Occaecati minima est alias occaecati officiis aut.','2021-09-08 00:08:44');



DROP TABLE IF EXISTS `photo`;
CREATE TABLE `photo`(
	`id` SERIAL PRIMARY KEY,
	`url_img` VARCHAR(100),
    `product_id` BIGINT UNSIGNED NOT NULL,

    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO `photo` (`url_img`, `product_id`)
VALUES 
('resources/images/product1.png',1),
('resources/images/product2.png',2),
('resources/images/product3.png',3),
('resources/images/product4.png',4),
('resources/images/product5.png',5),
('resources/images/product6.png',6);


DROP TABLE IF EXISTS `additional_photo`;
CREATE TABLE `additional_photo`(
	`id` SERIAL PRIMARY KEY,
	`url_img` VARCHAR(100),
    `product_id` BIGINT UNSIGNED NOT NULL,

    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO `additional_photo` (`url_img`, `product_id`)
VALUES 
('resources/images/product11.png',1),
('resources/images/product12.png',1),
('resources/images/product13.png',1),
('resources/images/product14.png',1),
('resources/images/product21.png',2),
('resources/images/product22.png',2),
('resources/images/product23.png',2),
('resources/images/product24.png',2),
('resources/images/product31.png',3),
('resources/images/product32.png',3),
('resources/images/product33.png',3),
('resources/images/product34.png',3),
('resources/images/product41.png',4),
('resources/images/product42.png',4),
('resources/images/product43.png',4),
('resources/images/product44.png',4),
('resources/images/product51.png',5),
('resources/images/product52.png',5),
('resources/images/product53.png',5),
('resources/images/product54.png',5),
('resources/images/product61.png',6),
('resources/images/product62.png',6),
('resources/images/product63.png',6),
('resources/images/product64.png',6);

DROP TABLE IF EXISTS product_colors;
CREATE TABLE product_colors(
	id SERIAL,
	colors CHAR (30) NOT NULL
);

INSERT INTO product_colors (`colors`)
VALUES 
('white'),
('black'),
('blue'),
('gray');


DROP TABLE IF EXISTS product_size;
CREATE TABLE product_size(
	id SERIAL,
	sizes CHAR (4) NOT NULL
);

INSERT INTO product_size (`sizes`)
VALUES 
('M'),
('L'),
('XL'),
('XXL');

DROP TABLE IF EXISTS product_quantity;
CREATE TABLE product_quantity(
  id SERIAL PRIMARY KEY,
  product_id BIGINT UNSIGNED NOT NULL,
  color_id BIGINT UNSIGNED NOT NULL,
  size_id BIGINT UNSIGNED NOT NULL,
  quantity INT UNSIGNED DEFAULT 0,
  
  FOREIGN KEY (product_id) REFERENCES products(id),
  FOREIGN KEY (color_id) REFERENCES product_colors(id),
  FOREIGN KEY (size_id) REFERENCES product_size(id) 
);

INSERT INTO product_quantity (`product_id`, `color_id`, `size_id`, `quantity`) 
VALUES 
(1,1,1,4),
(1,1,2,5),
(1,1,3,2),
(1,2,1,5),
(1,2,2,5),
(1,2,4,5),
(1,3,3,3),
(1,3,1,3),
(1,3,4,8),
(1,4,1,2),
(1,4,2,1),
(1,4,3,5),
(1,4,4,8),
(2,1,1,4),
(2,1,3,4),
(2,1,4,4),
(2,2,1,4),
(2,2,3,4),
(2,2,4,5),
(2,3,1,3),
(2,3,2,8),
(2,3,3,3),
(2,4,1,2),
(2,4,2,8),
(2,4,3,6),
(2,4,4,8),
(3,1,1,4),
(3,1,2,5),
(3,1,3,2),
(3,2,1,5),
(3,2,2,5),
(3,2,4,5),
(3,3,3,3),
(3,3,1,3),
(3,3,4,8),
(3,4,1,2),
(3,4,2,1),
(3,4,3,5),
(3,4,4,8),
(4,1,1,4),
(4,1,3,4),
(4,1,4,4),
(4,2,1,4),
(4,2,3,4),
(4,2,4,5),
(4,3,1,3),
(4,3,2,8),
(4,3,3,3),
(4,4,1,2),
(4,4,2,8),
(4,4,3,6),
(4,4,4,8),
(5,1,1,4),
(5,1,2,5),
(5,1,3,2),
(5,2,1,5),
(5,2,2,5),
(5,2,4,5),
(5,3,3,3),
(5,3,1,3),
(5,3,4,8),
(5,4,1,2),
(5,4,2,1),
(5,4,3,5),
(5,4,4,8),
(6,1,1,4),
(6,1,3,4),
(6,1,4,4),
(6,2,1,4),
(6,2,3,4),
(6,2,4,5),
(6,3,1,3),
(6,3,2,8),
(6,3,3,3),
(6,4,1,2),
(6,4,2,8),
(6,4,3,6),
(6,4,4,8);

select 
product_colors.colors,
product_size.sizes 
from product_quantity
join product_size on product_size.id  = product_quantity.size_id 
join product_colors on product_colors.id  = product_quantity.color_id
where product_quantity.quantity>0 and product_quantity.product_id=1 ;



join product_quantity on product_quantity.product_id = products.id 
join product_size on product_size.id  = product_quantity.size_id 
join product_colors on product_colors.id  = product_quantity.color_id
where products.id=1 and product_quantity.quantity>0;



