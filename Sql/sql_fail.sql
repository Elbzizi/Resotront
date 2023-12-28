drop database if exists restoran;
create database restoran;
use restoran;
create table users (
id int primary key auto_increment,
username varchar(150) not null,
email varchar(150) not null,
password varchar(100) not null,
create_at timestamp not null default current_timestamp()
);
CREATE TABLE `foods` (
  `id` int(10) NOT NULL primary key auto_increment,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `prix` varchar(20) NOT NULL,
 /* ALTER TABLE foods <============ pour le meal_id ===========>
	ADD COLUMN customer_id INT,
    ADD CONSTRAINT fk_customer
    FOREIGN KEY (customer_id)
    REFERENCES customers(customer_id);
    la requite pour afficher ======>SELECT * FROM ordersJOIN customers ON orders.customer_id = customers.customer_id
    WHERE customers.customer_id = 1;*/
  `meal_id` int(1) NOT NULL, 
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ;
INSERT INTO `foods` (`id`, `name`, `image`, `description`, `prix`, `meal_id`, `created_at`) VALUES
(1, 'chicken wings', 'menu-1.jpg', 'Energistically recaptiualize prospective manufactured ', '10', 1, '2023-04-08 11:44:38'),
(2, 'pizza', 'menu-2.jpg', 'Holisticly simplify superior meta-services for ', '20', 2, '2023-04-08 11:44:38'),
(3, 'steak', 'menu-3.jpg', 'Continually reintermediate wireless vortals through', '30', 3, '2023-04-08 11:44:38'),
(6, 'steak', 'menu-3.jpg', 'Continually reintermediate wireless vortals through', '30', 1, '2023-04-08 11:44:38'),
(7, 'pizza', 'menu-2.jpg', 'Holisticly simplify superior meta-services for ', '20', 1, '2023-04-08 11:44:38');

-- -
CREATE TABLE `cart` (
  `id` int(10) NOT NULL primary key auto_increment ,
  `item_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `prix` varchar(10) NOT NULL,
  `image` varchar(200) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created-at` timestamp NOT NULL DEFAULT current_timestamp()
) ;

INSERT INTO `cart` (`id`, `item_id`, `name`, `prix`, `image`, `user_id`, `created-at`) VALUES
(default, 1, 'chicken wings', '10', 'menu-1.jpg', 1, '2023-04-11 09:22:55'),
(default, 2, 'steak', '30', 'menu-3.jpg', 1, '2023-04-11 11:01:48');

/*
CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `foods` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(20) NOT NULL,
  `meal_id` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `image`, `description`, `price`, `meal_id`, `created_at`) VALUES
(1, 'chicken wings', 'menu-1.jpg', 'Energistically recaptiualize prospective manufactured ', '10', 1, '2023-04-08 11:44:38'),
(2, 'pizza', 'menu-2.jpg', 'Holisticly simplify superior meta-services for ', '20', 2, '2023-04-08 11:44:38'),
(3, 'steak', 'menu-3.jpg', 'Continually reintermediate wireless vortals through', '30', 3, '2023-04-08 11:44:38'),
(6, 'steak', 'menu-3.jpg', 'Continually reintermediate wireless vortals through', '30', 1, '2023-04-08 11:44:38'),
(7, 'pizza', 'menu-2.jpg', 'Holisticly simplify superior meta-services for ', '20', 1, '2023-04-08 11:44:38');

-- --
