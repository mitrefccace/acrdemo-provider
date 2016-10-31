-- Create script for the Portal Database

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS portaldb;
USE portaldb;

-- create the database user if it does not exist; grant privileges
GRANT ALL PRIVILEGES  ON portaldb.* TO 'your db user'@'localhost' IDENTIFIED BY 'your db password' WITH GRANT OPTION;

--
-- Table structure for table `user_data`
--
DROP TABLE IF EXISTS `user_data`;
CREATE TABLE `user_data` (
  `vrs` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isAdmin` BOOLEAN NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`vrs`, `username`, `password`, `first_name`, `last_name`, `address`, `city`, `state`, `zip_code`, `email`,`isAdmin`) VALUES
(1235550001, 'admin', 'password', 'Carl', 'Grimes', '1 Park Place', 'Hollywood', 'CA', '90028', 'admin@comp.org', TRUE),
(1235550002, 'root', 'password', 'Rick', 'Grimes', '1 Walking Way', 'Hollywood', 'CA', '90028', 'root@comp.org', FALSE),
(1235550003, 'jasmith', 'password', 'Jane', 'Smith', '10 Hollywood Boulevard', 'Hollywood', 'CA', '90028', 'janesmith@gmail.com', FALSE),
(1235550004, 'jsmith', 'password', 'John', 'Smith', '11 Hollywood Boulevard', 'Hollywood', 'CA', '90028', 'jsmith@gmail.com', FALSE),
(1235550005, 'mjones', 'password', 'Mary', 'Jones', '12 Hollywood Boulevard', 'Hollywood', 'CA', '90028', 'mjones@msn.com', FALSE),
(1235550006, 'rfranklin', 'password', 'Robert', 'Franklin', '13 Hollywood Boulevard', 'Hollywood', 'CA', '90028', 'rfranklin@icloud.com', FALSE),
(1235550007, 'canthony', 'password', 'Carmelo', 'Anthony', '14 Hollywood Boulevard', 'Hollywood', 'CA', '90028', 'canthony@knicks.com', FALSE),
(1235550008, 'josmith', 'password', 'John', 'Jones', '15 Hollywood Boulevard', 'Hollywood', 'CA', '90028', 'josmith@msn.com', FALSE);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`vrs`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `user_data`
  MODIFY `vrs` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1235550009;
