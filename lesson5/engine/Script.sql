DROP DATABASE IF exists lesson_fifth;
CREATE DATABASE lesson_fifth;
USE lesson_fifth;

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media`(
	`id` SERIAL PRIMARY KEY,
	`filename` VARCHAR(255)	
);

INSERT INTO `media` (`filename`)
VALUES 
('Небесный мост'),
('Две луны'),
('Метеориты'),
('Напряжение'),
('Арахниды'),
('Леденой океан'),
('Восход'),
('Средневековье'),
('Яхта'),
('Рассвет'),
('Звездное небо'),
('Скорпион'),
('Город'),
('Китайская стена');

DROP TABLE IF EXISTS `images_mini`;
CREATE TABLE `images_mini` (
	`id` SERIAL,
    `url_img_mini` VARCHAR(100),
    `size` VARCHAR(100),
    `media_id` BIGINT UNSIGNED,

    FOREIGN KEY (media_id) REFERENCES media(id)
);

INSERT INTO `images_mini` (`url_img_mini`, `size`, `media_id`)
VALUES 
('resources/images_mini/01.jpg', '240 x 180 15,2KB', 1),
('resources/images_mini/02.jpg', '240 x 180 9,56KB', 2),
('resources/images_mini/03.jpg', '240 x 180 9,73KB', 3),
('resources/images_mini/04.jpg', '240 x 180 9,50KB', 4),
('resources/images_mini/05.jpg', '240 x 180 19,7KB', 5),
('resources/images_mini/06.jpg', '240 x 180 12,2KB', 6),
('resources/images_mini/07.jpg', '240 x 180 14,8KB', 7),
('resources/images_mini/08.jpg', '240 x 180 114,7KB', 8),
('resources/images_mini/09.jpg', '240 x 180 9,83KB', 9),
('resources/images_mini/10.jpg', '240 x 180 13,2KB', 10),
('resources/images_mini/11.jpg', '240 x 180 12,9KB', 11),
('resources/images_mini/12.jpg', '240 x 180 22,8KB', 12),
('resources/images_mini/13.jpg', '240 x 180 19,8KB', 13),
('resources/images_mini/14.jpg', '240 x 180 21,2KB', 14);


DROP TABLE IF EXISTS `images_big`;
CREATE TABLE `images_big` (
	`id` SERIAL,
    `url_img_big` VARCHAR(100),
    `size` VARCHAR(100),
    `view_count` INT UNSIGNED NOT NULL,
    `media_id` BIGINT UNSIGNED,

    FOREIGN KEY (media_id) REFERENCES media(id)
);

INSERT INTO `images_big` (`url_img_big`, `size`, `view_count`, `media_id`)
VALUES 
('resources/images_big/01.jpg', '800 x 600 108,8KB', 0, 1),
('resources/images_big/02.jpg', '800 x 600 68,4KB', 0, 2),
('resources/images_big/03.jpg', '800 x 600 68,6KB', 0, 3),
('resources/images_big/04.jpg', '800 x 600 60,3KB', 0, 4),
('resources/images_big/05.jpg', '800 x 600 156,9KB', 0, 5),
('resources/images_big/06.jpg', '800 x 600 87,8KB', 0, 6),
('resources/images_big/07.jpg', '800 x 512 97,1KB', 0, 7),
('resources/images_big/08.jpg', '800 x 600 101,3KB', 0, 8),
('resources/images_big/09.jpg', '800 x 600 79,1KB', 0, 9),
('resources/images_big/10.jpg', '800 x 600 94,9KB', 0, 10),
('resources/images_big/11.jpg', '800 x 600 96,3KB', 0, 11),
('resources/images_big/12.jpg', '800 x 600 136KB', 0, 12),
('resources/images_big/13.jpg', '800 x 600 110,4KB', 0, 13),
('resources/images_big/14.jpg', '800 x 600 148,3KB', 0, 14);


