-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 18, 2019 at 07:23 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `i_id` int(11) NOT NULL,
  `i_name` varchar(128) NOT NULL,
  `i_description` varchar(1000) NOT NULL,
  `i_image` varchar(128) NOT NULL,
  `i_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`i_id`, `i_name`, `i_description`, `i_image`, `i_price`) VALUES
(1, 'French Fries', 'Fried potato strips served with Tomato sauce', './static/images/1.jpg', 110),
(2, 'Corn Fritters', 'Sweet corn kernels and spring onion fritters served with tomato sauce', './static/images/2.jpg', 130),
(3, 'Aloo Dhanya Tikki', 'Deep fried potato, cheese and coriander pattice flavored with North Indian spices', './static/images/3.jpg', 130),
(4, 'Fish Cube Masala Fry', 'Deep fried fish cubes dusted with Kerala spices', './static/images/4.jpg', 170),
(5, 'Crispy Chilly Chicken', 'A popular and delicious Hakka, Indian Chinese takeout dish, dry chilli chicken is made with crispy chicken chunks and lightly tossed in a spicy chilli sauce', './static/images/5.jpg', 200),
(6, 'Veg Manchurian', 'This dish is made of deep fried mixed vegetable dumplings tossed in Chinese sauces', './static/images/6.jpg', 160),
(7, 'Chicken Manchurian', ' Flavoured with soy sauce, tomato sauce, ginger, green chilli, vinegar giving an authentic taste of chicken manchurian', './static/images/7.jpg', 220),
(8, 'Dal Pakoda', 'Prepared the pakodas using split moong dal, which gives the pakodas a light and airy texture. And the addition of palak makes it even more crispier', './static/images/8.jpg', 180),
(9, 'Tomato and Basil Soup', 'A thick tomato soup flavored with basil and celery', './static/images/9.jpg', 120),
(10, 'Cock-a-leekie', 'Scottish clear soup with chicken and bacon', './static/images/10.jpg', 150),
(11, 'Sweet Corn Chicken Soup', 'Thick Chinese soup with chicken and corns', './static/images/11.jpg', 150),
(12, 'Prawn Bisque', 'Thick creamy Shellfish soup served with Garlic Bread', './static/images/12.jpg', 160),
(13, 'Dal Palak', 'Gently spiced preparation of dal and spinach leaves cooked with lentils', './static/images/13.jpg', 125),
(14, 'Diwani Hundi', 'Fresh mixed vegetables cooked with turmeric and coriander', './static/images/14.jpg', 125),
(15, 'Butter Palak Paneer', 'Paneer cooked in a gravy of palak and buttermasala', './static/images/15.jpg', 150),
(16, 'Malabar Kozhi Curry', 'Rustic chicken curry made with coconut milk and flavored with robust Kerala spices', './static/images/16.jpg', 195),
(17, 'Chicken Mappas', 'Gently spiced Kerala preparation of chicken simmered in thick coconut milk', './static/images/17.jpg', 195),
(18, 'Kadai Murg', 'A fiery Punjabi Chicken preparation with bell peppers and onion (spicy or less spicy)', './static/images/18.jpg', 195),
(19, 'Mutton Kosha', 'Kosha is similar in meaning to bhuna, which involves slowly cooking a gravy to get a rich, dark-brown gravy and melt-in-the-mouth mutton pieces', './static/images/19.jpg', 280),
(20, 'Schezwan Chilli Chicken', 'Chicken with chilies is a popular Indo Chinese fusion dish with unique, bold flavours', './static/images/20.jpg', 240),
(21, 'Sweet and Sour Chicken', 'Popular dish, because that combination of crunchy chicken, sweet juicy pineapple and crisp peppers just cannot be beat', './static/images/21.jpg', 250),
(22, 'Sesame Chicken', 'Crispy Chicken pieces tossed in a sweet and savory honey sesame sauce', './static/images/22.jpg', 230),
(23, 'Butter Naan', 'Indian Bread made with Flour cooked with butter in tandoor', './static/images/23.jpg', 60),
(24, 'Jeera Rice', 'Rice steamed with Jeera', './static/images/24.jpg', 90),
(25, 'Veg Pulao', 't is a spicy rice dish prepared by cooking rice with various vegetables and spices', './static/images/25.jpg', 110),
(26, 'Chicken Pulao', 'One pot flavored chicken pilaf cooked with mild Indian spices', './static/images/26.jpg', 175),
(27, 'Veg Hakka Noodles', 'It is an Indo-Chinese preparation that is made by tossing boiled noodles and stir fried vegetables in Chinese sauces', './static/images/27.jpg', 110),
(28, 'Chicken Hakka Noodles', 'It is a Chinese dish of boiled noodles tossed with boiled and shredded chicken and vegetables in Chinese sauces', './static/images/28.jpg', 150),
(29, 'Chicken Fried Rice', 'Made with chicken, eggs, onions, carrots, peas, and rice!', './static/images/29.jpg', 170),
(30, 'Schezwan Fried Rice', 'Blend of rice with vegetables like Bell Peppers, Carrots, French Beans and Spring Onion which are tossed with Soy Sauce and Schezwan Sauce', './static/images/30.jpg', 150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`i_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
