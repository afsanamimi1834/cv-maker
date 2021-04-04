-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2021 at 04:24 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv_maker`
--

-- --------------------------------------------------------

--
-- Table structure for table `basic_info`
--

CREATE TABLE `basic_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `objective` longtext NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basic_info`
--

INSERT INTO `basic_info` (`id`, `user_id`, `name`, `email`, `phone`, `profession`, `address`, `objective`, `image`) VALUES
(24, 60, 'teke@mailinator.com', 'keteki@mailinator.com', '2', 'torytewy@mailinator.com', 'Tempor aliqua Sit ', 'Placeat doloremque ', 'teke@mailinator.com_1617485595_38475543.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `user_id`, `name`, `title`, `details`, `start_date`, `end_date`, `location`) VALUES
(12, 60, 'Paki Horne', 'Avram Hancock', 'Quibusdam tempore a', 'Ramona Brooks', 'Steven Page', 'Jennifer Frazier');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `github` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `stack_overflow` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id`, `user_id`, `github`, `linkedin`, `stack_overflow`, `facebook`) VALUES
(11, 60, 'Eveniet ut aliqua ', 'Et et pariatur Volu', 'Consequatur Ut mole', 'Dicta doloribus sit ');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `user_id`, `link`, `name`, `details`) VALUES
(13, 60, 'Guy Gillespie', 'Ruth Guthrie', 'Quos consequatur Ve');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `b_email` varchar(255) NOT NULL,
  `b_phone` varchar(255) NOT NULL,
  `b_profession` varchar(255) NOT NULL,
  `b_address` text NOT NULL,
  `b_objective` longtext NOT NULL,
  `b_image` varchar(255) NOT NULL,
  `i_name_1` varchar(255) NOT NULL,
  `j_title_1` varchar(255) NOT NULL,
  `j_details_1` longtext NOT NULL,
  `start_date_1` varchar(255) NOT NULL,
  `end_date_1` varchar(255) NOT NULL,
  `j_location_1` varchar(255) NOT NULL,
  `i_name_2` varchar(255) NOT NULL,
  `j_title_2` varchar(255) NOT NULL,
  `j_details_2` longtext NOT NULL,
  `start_date_2` varchar(255) NOT NULL,
  `end_date_2` varchar(255) NOT NULL,
  `j_location_2` varchar(255) NOT NULL,
  `p_name_1` text NOT NULL,
  `p_details_1` longtext NOT NULL,
  `p_name_2` text NOT NULL,
  `p_details_2` longtext NOT NULL,
  `p_name_3` text NOT NULL,
  `p_details_3` longtext NOT NULL,
  `skill` longtext NOT NULL,
  `link_1` text NOT NULL,
  `link_2` text NOT NULL,
  `link_3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`id`, `user_id`, `b_name`, `b_email`, `b_phone`, `b_profession`, `b_address`, `b_objective`, `b_image`, `i_name_1`, `j_title_1`, `j_details_1`, `start_date_1`, `end_date_1`, `j_location_1`, `i_name_2`, `j_title_2`, `j_details_2`, `start_date_2`, `end_date_2`, `j_location_2`, `p_name_1`, `p_details_1`, `p_name_2`, `p_details_2`, `p_name_3`, `p_details_3`, `skill`, `link_1`, `link_2`, `link_3`) VALUES
(1, 0, 'kusy@mailinator.com', 'dicur@mailinator.com', '25', 'gizakozoc@mailinator.com', 'Proident do et fugi', 'Eligendi commodo vol', 'kusy@mailinator.com_1617361930_21626302.jpg', 'hajiryje@mailinator.com', 'punonag@mailinator.com', 'Accusamus quia saepe', 'sesoma@mailinator.com', 'zohelo@mailinator.com', 'pisuvyboto@mailinator.com', 'cikebykaj@mailinator.com', 'jakimyri@mailinator.com', 'Cupiditate aut optio', 'qobadi@mailinator.com', 'lopinitacu@mailinator.com', 'qiba@mailinator.com', 'rixasiq@mailinator.com', 'Nisi adipisicing eum', 'wuliroripy@mailinator.com', 'Eum exercitation cup', 'devo@mailinator.com', 'Lorem voluptas conse', '<p>ggdffggggggggsdgsdfgsdfg</p>\r\n<p>dfgdsfgfdsgfsdgsdfg</p>\r\n<p>fdgsdfgsdfgsdfg</p>\r\n<p>dsfgsdfgsdfgdsg</p>\r\n<p>sdgdsfgdfgds</p>', 'zobuherebe@mailinator.com', 'qogotihu@mailinator.com', 'zolykuleno@mailinator.com'),
(2, 0, 'vequb@mailinator.com', 'hyziba@mailinator.com', '4', 'gavofopis@mailinator.com', 'Repellendus Porro l', 'Iusto voluptatibus s', 'vequb@mailinator.com_1617362164_91919618.jpg', 'kobabunam@mailinator.com', 'pyturan@mailinator.com', 'Sequi sit enim eum ', 'dycymyxud@mailinator.com', 'hiha@mailinator.com', 'makekakabe@mailinator.com', 'xezacuxune@mailinator.com', 'solad@mailinator.com', 'Aliqua Dolores labo', 'kiwy@mailinator.com', 'vekixef@mailinator.com', 'meno@mailinator.com', 'jygub@mailinator.com', 'Ut in eos possimus ', 'qeko@mailinator.com', 'Ut assumenda facere ', 'jexino@mailinator.com', 'Aliqua Eu consequun', '<p>ggdffggggggggsdgsdfgsdfg</p> <p>dfgdsfgfdsgfsdgsdfg</p> <p>fdgsdfgsdfgsdfg</p> <p>dsfgsdfgsdfgdsg</p> <p>sdgdsfgdfgds</p>', 'zuwybafepi@mailinator.com', 'kexuwur@mailinator.com', 'mebuvyjyvo@mailinator.com'),
(3, 47, 'muzelipypy@mailinator.com', 'zulete@mailinator.com', '90', 'kyraxelul@mailinator.com', 'Accusantium obcaecat', 'Corporis voluptas do', 'muzelipypy@mailinator.com_1617369117_82584591.jpg', 'zuqibonixa@mailinator.com', 'johy@mailinator.com', 'Tempore deleniti ip', 'dyrafykyr@mailinator.com', 'bytikeh@mailinator.com', 'huto@mailinator.com', 'cypuzunot@mailinator.com', 'lomuzyruf@mailinator.com', 'Dolores est aliquip', 'sulazah@mailinator.com', 'xudegi@mailinator.com', 'nika@mailinator.com', 'revakabyd@mailinator.com', 'Nemo cumque tempora ', 'maci@mailinator.com', 'Ab sit quasi repelle', 'wyqedolej@mailinator.com', 'Doloribus accusamus ', '<h3><strong>sdfsdfsdfsadf</strong></h3>\r\n<p>afdsafasfs</p>\r\n<p><em><strong>asdfasdfasdf</strong></em></p>\r\n<p>asdfsadf</p>', 'forizuci@mailinator.com', 'liwac@mailinator.com', 'guquxazos@mailinator.com');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `user_id`, `skill`) VALUES
(6, 60, '<p>fsdfsdfsf</p>\r\n<p>fsdfsdf</p>\r\n<p>dsfsdfas</p>\r\n<p>sdfsdfs</p>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `name`, `email`, `phone`, `image`, `password`) VALUES
(3, 1, 'Admin', 'admin@gmail.com', '01723669999', 'Admin_1617513755_34661075.jpg', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 2, 'User', 'user@gmail.com', '01223559966', 'User_1617513897_81741852.jpg', '81dc9bdb52d04dc20036dbd8313ed055'),
(14, 2, 'xyz', 'xyz@gmail.com', '62626262', 'xyz update_1617526187_46007290.jpg', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basic_info`
--
ALTER TABLE `basic_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basic_info`
--
ALTER TABLE `basic_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
