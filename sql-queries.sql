CREATE TABLE `books` ( `id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) NOT NULL , `price` DECIMAL NOT NULL , `image` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;

INSERT INTO books (id, title, price, image) VALUES (NULL, 'book one', '10.99', './images/book1.jpg'), (NULL, 'book two', '12.99', './images/book2.jpg'), (NULL, 'book three', '12.99', './images/book3.jpg'), (NULL, 'book four', '22.99', './images/book4.jpg'), (NULL, 'book five', '29.99', './images/book5.jpg'), (NULL, 'book six', '32.99', './images/book6.jpg'), (NULL, 'book seven', '9.99', './images/book7.jpg'), (NULL, 'book eight', '19.99', './images/book8.jpg')