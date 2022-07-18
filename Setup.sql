-- Create Users Address TABLE

CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `street` varchar(600) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `city` varchar(200) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp()
);



-- Create The Cities Table

CREATE TABLE `cities` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `cityName` varchar(200) NOT NULL
);



-- Dumps 

INSERT INTO `users` (`id`, `firstname`, `surname`, `email`, `street`, `zipcode`, `city`, `dateTime`) VALUES
(29, 'Kratos', 'Lords', 'kratos@gmail.com', 'Root 671, SWAT road, hill 65', 30409, 'Ontario', '2022-06-27 00:01:21'),
(33, 'Erica', 'Martins', 'erica53@gmail.com', 'Behind Santana Mall', 80087, 'Accra', '2022-06-27 00:01:22'),
(35, 'Paul', 'Namis', 'pauls@hotmail.com', 'Phoenix Mall, Crescent 52', 95040, 'Phoenix', '2022-06-27 00:41:14'),
(43, 'Santos', 'Gregory', 'gregory@gmail.com', 'Root 10, Los Angeles', 78905, 'Los Angeles', '2022-06-27 00:50:29'),
(74, 'Gabriel', 'Augustine', 'gabson2939@gmail.com', 'Behind UBA Bank, Lafia Nasarawa State', 90890, 'Phoenix', '2022-06-30 11:55:48');


INSERT INTO `cities` (`id`, `cityName`) VALUES
(1, 'Lagos'),
(2, 'Abuja'),
(3, 'New York'),
(4, 'Accra'),
(5, 'Atmore'),
(6, 'Troy'),
(7, 'Berlin'),
(8, 'Phoenix'),
(9, 'Newport'),
(10, 'Los Angeles'),
(11, 'Ontario'),
(12, 'San Francisco'),
(13, 'Norwich'),
(14, 'Lake City');
