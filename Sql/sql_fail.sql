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
alter table users add column is_admin boolean default false ; 
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
(default, 'chicken wings', 'menu-1.jpg', 'Energistically recaptiualize prospective manufactured ', '10', 1, default),
(default, 'pizza', 'menu-2.jpg', 'Holisticly simplify superior meta-services for ', '20', 2, default),
(default, 'steak', 'menu-3.jpg', 'Continually reintermediate wireless vortals through', '30', 3, default),
(default, 'steak', 'menu-3.jpg', 'Continually reintermediate wireless vortals through', '30', 1, default),
(default, 'pizza', 'menu-2.jpg', 'Holisticly simplify superior meta-services for ', '20', 1, default),
(default, 'omelette-aux-fines-herbes', 'omelette.jpeg', "Une omelette légère et moelleuse garnie d'un mélange d'herbes fraîches telles que le persil, le basilic et l estragon. ", '30', 1,default),
(default, 'Pancakes aux myrtilles', 'Pancakes aux myrtilles.jpg', "Des pancakes moelleux garnis de myrtilles fraîches et arrosés de sirop d'érable pur. Accompagnés de tranches de bacon croustillant ou de saucisses de porc.", '50', 1, default),
(default, 'Salade César au poulet grillé', 'Salade César au poulet grillé.jpeg', "Une salade fraîche composée de laitue croquante, de morceaux de poulet grillé, de croûtons croustillants, de copeaux de parmesan et d'une vinaigrette César maison", '40', 2, default),
;

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


CREATE TABLE `orders` (
  `id` int(10) primary key NOT NULL auto_increment,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `town` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `zipcode` int(20) NOT NULL,
  `phone_number` int(50) NOT NULL,
  `address` text NOT NULL,
  `total_prix` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ;
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `town`, `country`, `zipcode`, `phone_number`, `address`, `total_price`, `user_id`, `status`, `created_at`) VALUES
(7, 'Omar El  Bzizi', 'omar@gmail.com', 'town', 'country', 209332, 123034333, 'Progressively communicate user friendly internal o', 10, 1, 'Pending', '2023-04-11 09:37:21'),
(8, 'Omar El  Bzizi', 'omar@gmail.com	', 'sample town', 'sample town', 923, 19232234, 'Efficiently exploit dynamic e-tailers before high-quality core competencies. Quickly administrate ', 40, 1, 'Pending', '2023-04-11 10:38:52'),
(9, 'Omar El  Bzizi', 'omar@gmail.com	', 'sample town', 'sample country', 2923, 10233444, 'Progressively communicate user friendly internal o', 30, 1, 'Pending', '2023-04-11 10:47:40'),
(10, 'Omar El  Bzizi', 'omar@gmail.com', 'sample town', 'sample country', 990032, 1929344, 'Collaboratively plagiarize maintainable products after viral growth strategies. Efficiently aggregate efficient ', 40, 1, 'Pending', '2023-04-11 11:02:45');


CREATE TABLE `bookings` (
  `id` int(10) NOT NULL primary key auto_increment,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date_booking` varchar(200) NOT NULL,
  `num_people` int(10) NOT NULL,
  `special_request` text NOT NULL,
  `status` varchar(200) NOT NULL default 'Pending',
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `date_booking`, `num_people`, `special_request`, `status`, `user_id`, `created_at`) VALUES
(1, 'zzzzzzzzzz', 'omar123@gmail.com', '04/12/2023 3:13 PM', 3, 'Energistically actualize B2B web-readiness after', 'Confirmed', 1, '2023-04-09 13:13:17'),
(2, 'Omar El  Bzizi', 'omar123@gmail.com', '04/11/2023 3:15 PM', 2, 'Rapidiously expedite team driven potentialities with interoperable \"outside the box\" thinking. Professionally formulate cross-platform internaProgressively communicate user friendly internal o', 'Done', 1, '2023-04-09 13:16:01'),
(4, 'Omar El  Bzizi', 'omar123@gmail.com', '04/12/2023 12:40 PM', 2, 'Energistically actualize B2B web-readiness after', 'Pending', 1, '2023-04-11 10:40:46'),
(5, 'Omar El  Bzizi', 'omar123@gmail.com', '04/13/2023 12:45 PM', 2, 'Energistically actualize B2B web-readiness after', 'Pending', 1, '2023-04-11 10:48:59'),
(6, 'Omar El  Bzizi', 'omar123@gmail.com', '04/12/2023 12:59 PM', 2, 'Quickly grow prospective ideas and backend ', 'Pending', 1, '2023-04-11 11:00:15');

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `review` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `username`, `created_at`) VALUES
(1, 'Collaboratively empower visionary infomediaries through installed base outsourcing. Progressively iterate B2C communities and top-line content. ', 'Omar El  Bzizi', '2023-04-09 14:09:46'),
(2, ' outsourcing. Progressively iterate B2C communities and top-line content. ', 'Omar El  Bzizi', '2023-04-09 14:09:46'),
(3, '', 'omarmed123', '2023-04-11 10:49:50');

CREATE  TABLE `Contacte` (
  `id` int(10) NOT NULL primary Key auto_increment,
  `username` varchar(200) NOT NULL,
   `email` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(200)  NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` varchar(50) not null default 'Pending'
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
alter table contacte add column status varchar(50) default "Pending";

/*===============================================================================================
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
