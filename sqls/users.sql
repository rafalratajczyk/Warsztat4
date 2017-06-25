CREATE TABLE `users`
(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR (255),
    `surname` VARCHAR(255),
    `email` VARCHAR(255),
    `password` VARCHAR(60),
    `order_address` VARCHAR(255)
);