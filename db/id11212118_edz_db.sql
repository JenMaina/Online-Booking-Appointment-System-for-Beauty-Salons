-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2019 at 05:25 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id11212118_edz_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `name`, `dob`, `address`, `email`, `contact`, `image`) VALUES
('admin', 'admin', 'Admin', '1997-12-10', 'Lingayen, Pangasinan', 'admin@admin.com', '09123456789', 0x313537343832393437325f373337312e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `baner`
--

CREATE TABLE `baner` (
  `bid` int(15) NOT NULL,
  `title` varchar(100) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `image` blob NOT NULL,
  `sid` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baner`
--

INSERT INTO `baner` (`bid`, `title`, `msg`, `image`, `sid`) VALUES
(18, 'front', 'welcome to blissfully Novs', 0x313537313230353836345f383737392e6a7067, 4),
(20, 'blissfully novs', 'Godbless', 0x313537313230363136325f383636342e6a7067, 4),
(21, 'BLISS', 'THANK YOU!', 0x313537313230363632375f323737332e6a7067, 4),
(22, 'Opening of Belis', 'Welcome', 0x313537313230383235325f363330382e6a7067, 2),
(23, 'Belis', 'Welcome ', 0x313537313230383338305f343939382e6a7067, 2),
(24, 'bla bla', 'Welcome Ulit', 0x313537313230383538345f373236392e6a7067, 2),
(25, 'lemonblush', 'welcome', 0x313537313230393134385f383934392e6a7067, 3),
(26, 'lemonblush', 'front', 0x313537313230393137325f343032392e6a7067, 3),
(27, 'of lemonblush', 'customer', 0x313537313230393234385f383734352e6a7067, 3),
(28, 'Bellissima.ph', 'Bellissima.ph', 0x313537313237313239365f343437392e6a7067, 2),
(29, 'BLISSFULLY', 'Blissfully', 0x313537313237313333375f373939382e6a7067, 4),
(31, 'J and L', 'aa', 0x313537313237313539395f373734352e6a7067, 1),
(32, 'Lemon Blush', 'Lemon Blush', 0x313537313237313632335f393432352e6a7067, 3),
(33, '50% Discount', 'Gupit Kuko', 0x313537313238333039365f343239362e6a7067, 8);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `aid` int(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `datecreated` datetime NOT NULL,
  `dov` varchar(30) NOT NULL,
  `tym` time NOT NULL,
  `fname` varchar(30) NOT NULL,
  `sid` int(15) NOT NULL,
  `stfid` int(20) NOT NULL,
  `serid` int(20) NOT NULL,
  `simage` blob NOT NULL,
  `sername` varchar(30) NOT NULL,
  `rate` decimal(15,2) NOT NULL,
  `duration` time NOT NULL,
  `status` varchar(100) NOT NULL,
  `notif_status` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`aid`, `username`, `datecreated`, `dov`, `tym`, `fname`, `sid`, `stfid`, `serid`, `simage`, `sername`, `rate`, `duration`, `status`, `notif_status`) VALUES
(20, 'edz', '2019-11-28 16:44:02', '11/30/2019', '10:00:00', 'Edz', 4, 5, 100, 0x313537303936373636355f333331352e6a7067, 'Foor Spa w/ Pedicure (Basic)', 249.00, '01:00:00', 'CONFIRMED', 1),
(21, 'Liza', '2019-11-28 16:48:45', '11/30/2019', '16:00:00', 'Liza Sabalboro', 4, 5, 85, 0x313537303936373437345f333233362e6a7067, 'Armpit (Waxing)', 149.00, '01:00:00', 'DONE', 1),
(22, 'Markee', '2019-11-28 16:52:05', '11/28/2019', '12:00:00', 'Mark Lagleva', 1, 2, 16, 0x313537303936383932335f383837302e6a7067, 'Brazilian Blowout', 799.00, '02:00:00', 'Booked, waiting the for update...', 1),
(23, 'edz', '2019-11-29 12:43:06', '11/30/2019', '09:00:00', 'Edz', 2, 4, 40, 0x313537303936363430365f373035342e6a7067, 'Ear Candling', 120.00, '00:00:00', 'Booked, waiting the for update...', 1),
(24, 'Liza', '2019-11-29 15:47:48', '11/30/2019', '12:00:00', 'Liza Sabalboro', 4, 5, 78, 0x313537303936373838395f343631312e6a7067, 'Hair Cut', 36.00, '01:00:00', 'CANCELLED', 1),
(25, 'milovessangel', '2019-11-30 21:33:17', '12/05/2019', '11:00:00', 'Angelica C. Escano', 2, 4, 43, 0x313537303936363433325f383335302e6a7067, 'Foot Spa w/ Pedicure', 250.00, '00:00:00', 'DONE', 1),
(26, 'edz', '2019-12-02 09:56:15', '12/04/2019', '14:00:00', 'Edz', 3, 7, 54, 0x313537303937303139305f313830302e6a7067, 'Hair Color', 300.00, '01:00:00', 'CANCELLED', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `name`, `gender`, `address`, `dob`, `contact`, `email`, `username`, `password`, `image`) VALUES
(2, 'Edz', 'male', '#25 Estanza, Lingayen, Pangasinan', '06/28/1999', '09123456789', 'elekpatov2@gmail.com', 'edz', '1234', 0x313537343930303939325f343230322e6a7067),
(3, 'Liza Sabalboro', 'female', 'Mangaldan, Pangasinan', '07/15/1999', '09090909090', 'lizasabalboro@gmail.com', 'Liza', 'lizaa', 0x313537353031343137315f333831382e6a7067),
(5, 'Cris', 'female', 'Lingayen', '10/27/1989', '09123456789', 'crisgarsk@yahoo.com', 'Cris', '12345', NULL),
(6, 'Mark Lagleva', 'male', 'Dagupan', '09/08/1982', '09171236456', 'ferdinand@gmail.com', 'Markee', 'markee', NULL),
(7, 'Angel Escano', 'female', 'Libis Bukid Malinta Valenzuela City', '10/09/1995', '09309413160', 'angelicaescano091928@gmail.com', 'milovessangel', 'ilovemyself09', 0x313537353132313135395f333537332e6a706567);

-- --------------------------------------------------------

--
-- Table structure for table `fservice`
--

CREATE TABLE `fservice` (
  `sid` int(15) NOT NULL,
  `serid` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fservice`
--

INSERT INTO `fservice` (`sid`, `serid`) VALUES
(1, 5),
(1, 7),
(1, 16),
(1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `mid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL DEFAULT 'Lingayen',
  `image` blob DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`mid`, `name`, `gender`, `dob`, `contact`, `address`, `username`, `email`, `password`, `city`, `image`) VALUES
(1, 'Cristeta tolentino', 'female', '01/25/1989', '123456789', 'Ramos st. Lingayen, Pangasinan', 'cristeta', 'cristeta@gmail.com', 'cristeta', 'Lingayen', 0x313537343836313130365f393135352e6a7067),
(2, 'Ferdinand Mata', 'male', '02/14/1990', '09951645783', 'Pangapisan west Lingayen, Pangasinan', 'fmata', 'ferdinand@gmail.com', 'fmata', 'Lingayen', 0x313537343836313136375f333532372e6a7067),
(3, 'Carla Perez', 'female', '03/21/1991', '124567893', 'Manibok Lingayen, Pangasinan', 'carla', 'carla1@gmail.com', 'carla', 'Lingayen', 0x313537343836313030325f313139372e6a7067),
(4, 'Markee Lagleva', 'male', '04/08/1990', '123567894', 'Alvear st. Lingayen, Pangasinan', 'markee', 'markee@gmail.com', 'markee', 'Lingayen', 0x313537343836313231335f353633362e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `manager_salon`
--

CREATE TABLE `manager_salon` (
  `sid` int(20) NOT NULL,
  `mid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager_salon`
--

INSERT INTO `manager_salon` (`sid`, `mid`) VALUES
(1, 3),
(2, 1),
(3, 4),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE `maps` (
  `mapid` int(20) NOT NULL,
  `sid` int(20) NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maps`
--

INSERT INTO `maps` (`mapid`, `sid`, `url`) VALUES
(1, 3, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d338.9568990005266!2d120.23148309601024!3d16.020825254255424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d16.0208922!2d120.2315514!5e0!3m2!1sen!2sph!4v1574971865315!5m2!1sen!2sph\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>'),
(2, 1, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d338.95735729657105!2d120.23150206209208!3d16.020555457966672!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d16.020554999999998!2d120.23162909999999!5e0!3m2!1sen!2sph!4v1574971902402!5m2!1sen!2sph\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>'),
(3, 2, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d239.66694390651853!2d120.2300578834512!3d16.030627826398845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d16.0306836!2d120.2301042!5e0!3m2!1sen!2sph!4v1574972008465!5m2!1sen!2sph\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>'),
(4, 4, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d239.6664753696826!2d120.23027464878064!3d16.031017661744716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d16.031074699999998!2d120.2304175!5e0!3m2!1sen!2sph!4v1574972079235!5m2!1sen!2sph\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `riv` int(20) NOT NULL,
  `sid` int(20) NOT NULL,
  `cid` int(20) NOT NULL,
  `aid` int(20) NOT NULL,
  `serid` int(20) NOT NULL,
  `rating` int(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `datecreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`riv`, `sid`, `cid`, `aid`, `serid`, `rating`, `title`, `comment`, `datecreated`) VALUES
(1, 3, 2, 12, 57, 4, 'Very Good Service', 'Nice', '2019-11-28 11:20:55'),
(2, 4, 3, 15, 89, 2, 'Fair Service', 'Okay lang pero di ganun kaganda', '2019-11-28 12:25:43'),
(3, 4, 3, 21, 85, 5, 'Excelent Service', 'SO nicee!', '2019-11-29 15:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `revenue_salon`
--

CREATE TABLE `revenue_salon` (
  `riv` int(20) NOT NULL,
  `sid` int(20) NOT NULL,
  `aid` int(20) NOT NULL,
  `image` blob NOT NULL,
  `sername` varchar(100) NOT NULL,
  `rate` decimal(15,2) NOT NULL,
  `tenpercent` decimal(15,2) NOT NULL,
  `datedone` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `revenue_salon`
--

INSERT INTO `revenue_salon` (`riv`, `sid`, `aid`, `image`, `sername`, `rate`, `tenpercent`, `datedone`) VALUES
(6, 4, 21, 0x313537303936373437345f333233362e6a7067, 'Armpit (Waxing)', 149.00, 14.90, '2019-11-28 08:49:49'),
(7, 2, 25, 0x313537303936363433325f383335302e6a7067, 'Foot Spa w/ Pedicure', 250.00, 25.00, '2019-11-30 21:40:22'),
(8, 2, 25, 0x313537303936363433325f383335302e6a7067, 'Foot Spa w/ Pedicure', 250.00, 25.00, '2019-11-30 21:40:23'),
(9, 2, 25, 0x313537303936363433325f383335302e6a7067, 'Foot Spa w/ Pedicure', 250.00, 25.00, '2019-11-30 21:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `salon`
--

CREATE TABLE `salon` (
  `sid` int(11) NOT NULL,
  `mid` int(20) DEFAULT NULL,
  `sname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `quotes` text DEFAULT NULL,
  `welcome` varchar(255) DEFAULT NULL,
  `image` blob DEFAULT NULL,
  `status_salon` int(15) NOT NULL DEFAULT 0,
  `notif_status` int(20) NOT NULL DEFAULT 0,
  `datecreated1` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salon`
--

INSERT INTO `salon` (`sid`, `mid`, `sname`, `address`, `city`, `contact`, `email`, `quotes`, `welcome`, `image`, `status_salon`, `notif_status`, `datecreated1`) VALUES
(2, 1, 'Bellissima Salon.ph', 'Alvear 2 St. Lingayen, Pangasinan', 'Lingayen', '09123456789', 'bellisima@gmail.com', 'Love is in the HAIR', 'Welcome Welcome Welcome', 0x313537303139353036335f333036382e6a7067, 1, 2, '2019-11-17 23:27:15'),
(3, 4, 'Lemon Blush Salons', 'Lingayen, Pangasinan', 'Lingayen', '09123456789', 'lemonblush@gmail.com', 'Improve your selfies see your stylist.', 'welcome po kayo.', 0x313537343838343835335f363432372e6a7067, 1, 2, '2019-11-17 23:27:15'),
(1, 3, 'J&L Beauty Salon for Men & Women', 'Wawa Lingayen, Pangasinan', 'Lingayen', '123456', 'jandl@gmail.com', 'Invest in your hair, you wear it everyday.', 'Welcome po :)', 0x313537343837383436335f373735392e6a7067, 1, 2, '2019-11-17 23:27:15'),
(4, 2, 'BLISSFULLY NOVS', 'Alvear 2 St. Lingayen, Pangasinan', 'Lingayen', '09123456789', 'blissfully@gmail.com', 'HAHA', 'WELCOME PO', 0x313537303732333731395f373535332e6a7067, 1, 2, '2019-11-17 23:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `service1`
--

CREATE TABLE `service1` (
  `serid` int(11) NOT NULL,
  `sername` varchar(100) NOT NULL,
  `rate` decimal(15,2) NOT NULL,
  `duration` time NOT NULL DEFAULT '00:00:00',
  `descrip` varchar(1000) NOT NULL,
  `sid` int(11) NOT NULL,
  `image` blob NOT NULL,
  `fs` int(30) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service1`
--

INSERT INTO `service1` (`serid`, `sername`, `rate`, `duration`, `descrip`, `sid`, `image`, `fs`) VALUES
(1, 'Rebond', 899.00, '00:00:00', 'blah blah blah1', 1, 0x313537303936393434345f373934372e6a7067, 0),
(2, 'Rebonding w/ Hot-oil', 700.00, '00:00:00', 'blah blah blah', 1, 0x313537303936393438395f363135312e6a7067, 0),
(3, 'Rebonding w/ Cellophane', 1000.00, '00:00:00', 'blah blah blah', 1, 0x313537303936393437325f363633392e6a7067, 0),
(4, 'Rebonding w/ Keratin', 800.00, '00:00:00', 'blah blah blah', 1, 0x313537303936393530375f363933312e6a7067, 0),
(5, 'Cellophane w/ Free Haircut', 250.00, '01:00:00', 'Cellophane is able to fill and also plump the hair shafts in the process and thereby, seals the layer of the cuticle of the hair', 1, 0x313537303936393034365f323438392e6a7067, 1),
(6, 'Highlights w/ Free Haircut', 250.00, '01:00:00', 'blah blah blah', 1, 0x313537303936393135385f353830362e6a7067, 0),
(7, 'Haircut w/ Shampoo', 50.00, '01:00:00', 'Hair refers to the styling of hair, usually on the human scalp. Sometimes, this could also mean an editing of facial or body hair.', 1, 0x313537303936393131365f383338312e6a7067, 1),
(8, 'Relax w/ Hot-oil', 250.00, '01:00:00', 'Important to keep your natural hair looking and feeling its best, and it’s no secret that hot oil treatments are great for your hair', 1, 0x313537303936393533395f373630392e6a7067, 0),
(9, 'Relax w/ Cellophane', 300.00, '00:00:00', 'blah blah blah', 1, 0x313537303936393532365f343035392e6a7067, 0),
(10, 'Waving w/ Hot-oil', 300.00, '01:00:00', 'Waving w/ hot oil treatments are a popular option for dry, damaged, brittle hair.', 1, 0x313537303936393535325f363238382e6a7067, 0),
(11, 'Hairdye w/ Hot-oil', 250.00, '01:00:00', 'Hair coloring, or hair dyeing, is the practice of changing the hair color. The main reasons for this are cosmetic: to cover gray or white hair, to change to a color regarded as more fashionable or desirable, or to restore the original hair color after it has been discolored by hairdressing processes or sun bleaching', 1, 0x313537303936393132365f363035302e6a7067, 0),
(12, 'Hot-oil w/ Free Haircut', 100.00, '00:00:00', 'blah blah blah', 1, 0x313537303936393137315f333735342e6a7067, 0),
(13, 'Keratin w/ Free Haircut', 199.00, '00:00:00', 'blah blah blah', 1, 0x313537303936393235305f393630322e6a7067, 0),
(14, 'Hairspa w/ Free Haircut', 150.00, '01:00:00', 'A basic hair spa procedure starts with washing your hair with a shampoo. It typically starts with massaging your scalp gently with the shampoo and working its way down to every single strand of hair.', 1, 0x313537303936393134345f373032322e6a7067, 0),
(15, 'Ironing w/ Shampoo', 100.00, '00:00:00', 'blah blah blah', 1, 0x313537303936393233335f313334392e6a7067, 0),
(16, 'Brazilian Blowout', 799.00, '02:00:00', 'Brazilian hair smoothing treatment is a semi-permanent hair smoothing method done by temporarily sealing a liquid keratin and a preservative solution into the hair with a hair iron. It is often confused for a hair straightener, it is not because it does not chemically alter the structure of the hair.', 1, 0x313537303936383932335f383837302e6a7067, 1),
(17, 'Manicure', 50.00, '00:00:00', '12343445', 1, 0x313537303936393331395f333830352e6a7067, 0),
(18, 'Pedicure', 50.00, '00:00:00', 'blah blah blah', 1, 0x313537303936393339355f373539362e6a7067, 0),
(19, 'Foot Spa', 200.00, '01:00:00', 'Foot spa is a relaxing and effective technique that caters with all the demands of the feet.', 1, 0x313537303936393130345f333737312e6a7067, 1),
(20, 'Haircut', 40.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363533305f343431352e6a7067, 0),
(21, 'Hairstyle', 100.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363534305f343132382e6a7067, 0),
(22, 'Hot-oil', 80.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363536335f393635352e6a7067, 0),
(23, 'Hair Relax', 199.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363530375f353432382e6a7067, 0),
(24, 'Hair Spa', 150.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363531395f333434362e6a7067, 0),
(25, 'Hair Color', 350.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363437325f323135322e6a7067, 0),
(26, 'Cellophane', 350.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363332385f393439322e6a7067, 0),
(27, 'Keratin', 300.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363632355f393430322e6a7067, 0),
(28, 'Powerdose', 599.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363637395f333434312e6a7067, 0),
(29, 'Highlights', 150.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363535335f333238352e6a7067, 0),
(30, 'Organic Rebond', 499.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363837335f363534312e6a7067, 0),
(31, 'Brazilian Blowout', 599.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363238365f363734342e6a7067, 0),
(32, 'Color w/ Brazilian', 999.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363337395f353432362e6a7067, 0),
(33, 'Brazilian w/ Powerdose / Free ', 999.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363330355f343732372e6a7067, 0),
(34, 'Color w/ Highlight / Treatment', 999.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363339355f363732322e6a7067, 0),
(35, 'Rebond w/ Color Brazilian', 1999.00, '02:00:00', 'Awesome color hair', 2, 0x313537303936363730305f383431332e6a7067, 0),
(36, 'Kerabond w/ Color', 2499.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363631325f333530312e6a7067, 0),
(37, 'Kerabond', 1499.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363539315f373335352e6a7067, 0),
(39, 'Semi Delino', 499.00, '01:15:00', 'Cleanses Hair from Roots to Tips to Prevent Hair Thinning and Balding', 2, 0x313537303936363731315f343837342e6a7067, 0),
(40, 'Ear Candling', 120.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363430365f373035342e6a7067, 0),
(41, 'Eyelashes Extension', 499.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363431375f383435302e6a7067, 0),
(42, 'Hair and Make Up', 599.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363436315f363631302e6a7067, 0),
(43, 'Foot Spa w/ Pedicure', 250.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363433325f383335302e6a7067, 0),
(44, 'Gel Polish w/ Pedicure', 250.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363434365f353231302e6a7067, 0),
(45, 'Manicure', 50.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363633385f373037332e6a7067, 0),
(46, 'Pedicure', 60.00, '00:00:00', 'blah blah blah', 2, 0x313537303936363636335f343237342e6a7067, 0),
(47, 'Haircut', 50.00, '01:00:00', 'Haircut refers to the styling of hair, the fashioning of hair can be considered an aspect of personal grooming, fashion.', 3, 0x313537303937303535365f343339372e6a7067, 0),
(48, 'Shampoo Dry', 50.00, '01:00:00', 'Essentially it’s a powder or fast-drying spray that provides a water-free option for cleansing your hair. Some dry shampoos come in paste form, and some are available in different shades so you can match your dry shampoo to your hair color. Dry shampoo absorbs excess sebum and other oils from your roots, freshens up the rest of your hair and leaves it smelling fresher.', 3, 0x313537303937303738375f343130352e6a7067, 0),
(49, 'Manicure', 50.00, '01:00:00', 'A manicure is a cosmetic beauty treatment for the fingernails and hands performed at home or in a salon.', 3, 0x313537303937303538345f323735312e6a7067, 0),
(50, 'Pedicure', 50.00, '01:00:00', 'A pedicure is a cosmetic treatment of the feet and toenails, the word pedicure is derived from the Latin words pedis, which means of the foot and cura, which means care.', 3, 0x313537303937303631315f343737342e6a7067, 0),
(51, 'Foot Spa', 150.00, '01:00:00', 'Foot Spa and its benefits basically the procedure includes soaking the feet in a foot bath including salt, warm water.', 3, 0x313537303937303137395f323232382e6a7067, 0),
(52, 'Nail Art', 100.00, '01:00:00', 'nail art is a creative way to paint, decorate, enhance and embellish the nails, it is a type of artwork that can be done on fingernails and toenails.', 3, 0x313537303937303539355f393634382e6a7067, 0),
(53, 'Eyelashes Extension', 499.00, '01:00:00', 'Eyelash extensions are used to enhance the lenght, cureliness, and thickness of natural eyelashes.', 3, 0x313537303937303136355f323834302e6a7067, 0),
(54, 'Hair Color', 300.00, '01:00:00', 'Hair coloring, is practice of changing the hair color.', 3, 0x313537303937303139305f313830302e6a7067, 0),
(55, 'Hot-oil', 150.00, '01:00:00', 'A hot oil treatment is the process of adding warm oil to hair and scalp. the purpose of treatment is to ensure that the moisture from water is retained as well as to soothe dry scalp.', 3, 0x313537303937303537325f383932342e6a7067, 0),
(56, 'Hair Spa', 200.00, '01:00:00', 'A hair spa consist of oil massaging, shampoo, hairmask, and conditiong.', 3, 0x313537303937303231385f383039372e6a7067, 0),
(57, 'Cellophane', 300.00, '01:00:00', 'The cellophane hair treatment is also known as a semi permanent coloring service.', 3, 0x313537303936393730335f353439332e6a7067, 0),
(58, 'Semi Di Lino / Piak', 500.00, '01:30:00', 'Semi di Lino, the original treatment line for luminous hair, is being renewed and enhanced.', 3, 0x313537303937303730315f373237342e6a7067, 0),
(59, 'Powerdose Loreal', 550.00, '01:30:00', 'The technology is two -fold; it works from the inside-out. the protein molecule drive inside the hair and fills the potholes to strengthen, and there is a ceremide that closes the cuticle outside to smooth the hair.', 3, 0x313537303937303637315f373538342e6a7067, 0),
(60, 'Hair Spa Loreal', 500.00, '01:00:00', 'This helps recovery of the shine and moisture in the hair.', 3, 0x313537303937303237355f393031382e6a7067, 0),
(61, 'Sumpreme Keratin', 300.00, '01:00:00', 'SUPREME KERATIN - Repleneshing the hair structure to promote vital and healthy looking hair.', 3, 0x313537303937303935335f333438382e6a7067, 0),
(62, 'Brazilian Treatments', 1000.00, '02:00:00', 'The brazillan blowout hair treatment is a liquid keratin formula that bond to your hair.', 3, 0x313537303936393639345f343038312e6a7067, 0),
(63, 'Hair Straight', 200.00, '01:30:00', 'Hair straightening is a hair styling technique used since 1890 involving the flattening and straightening of hair in order to give it a smooth. Streamlined and sleek apperance.', 3, 0x313537303937303534325f353432322e6a7067, 0),
(64, 'Rebond Classic', 1000.00, '03:00:00', 'Rebonding involves chemically altering the structure of the hair whereas straightening involves temporary changes in the texture or shape of hair using different equipment and solutions.', 3, 0x313537303937303638385f373336382e6a7067, 0),
(65, 'Rebond Matrix', 1500.00, '03:30:00', 'Rebonding involves chemically altering the structure of the hair whereas straightening involves temporary changes in the texture or shape of hair using different equipment and solutions.', 3, 0x313537303937303839375f393639362e6a7067, 0),
(66, 'Rebond Loreal', 2500.00, '03:00:00', 'Rebonding involves chemically altering the structure of the hair whereas straightening involves temporary changes in the texture or shape of hair using different equipment and solutions.', 3, 0x313537303937313237365f353036312e6a7067, 0),
(67, 'Cellophane Loreal', 500.00, '01:00:00', 'Cellophane loreal add color and shine to your hair.', 3, 0x313537303937303031365f343537352e6a7067, 0),
(68, 'Color Loreal', 500.00, '01:00:00', 'Hair coloring, is the practice of changing the color of your hair.', 3, 0x313537303937303135315f313332362e6a7067, 0),
(69, 'Hair Do Style / Make Up', 350.00, '02:00:00', 'The style do is a set of two hair wraps, designed to be worm alone together, and make up is the way in which the parts or ingredients of something are put together.', 3, 0x313537303937303230345f353334382e6a7067, 0),
(70, 'Rebond (HIGH END)', 999.00, '00:00:00', 'blah blah', 4, 0x313537303936383738355f323239372e6a7067, 0),
(71, 'Semi Rebond (HIGH END)', 699.00, '01:00:00', 'Rebonding is a chemical hair treatment that makes your hair straight, sleek and shiny.', 4, 0x313537303936383833365f383136372e6a7067, 0),
(72, 'Brazillian (HIGH END)', 899.00, '02:00:00', 'Brazilian hair smoothing treatment is a semi-permanent hair smoothing method done by temporarily sealing a liquid keratin and a preservative solution into the hair with a hair iron. It is often confused for a hair straightener, it is not because it does not chemically alter the structure of the hair.', 4, 0x313537303936373438395f323935332e6a7067, 0),
(73, 'Hair Color (HIGH END)', 499.00, '01:00:00', 'Hair color for only 1 hour.', 4, 0x313537303936373835325f353036302e6a7067, 0),
(74, 'Cellophane (HIGH END)', 399.00, '01:00:00', 'The hair cellophane treatment is a popular shine exchanging service that is also known as a hair gloss treatment. ', 4, 0x313537303936373530305f333136342e6a7067, 0),
(75, 'Hi-Lites (HIGH END)', 799.00, '01:00:00', 'Make your hair new style of color.', 4, 0x313537303936383336385f343635392e6a7067, 0),
(76, 'Cold Wave (HIGH END)', 699.00, '02:00:00', ' In a cold wave perm, dry hair is sectioned and curled around a plastic rod, over which the cold wave solution (usually Pagoda Cold Wave Lotion) is poured, completely soaking the hair.', 4, 0x313537303936373539365f313638392e6a7067, 0),
(77, 'Power Dose (HIGH END)', 599.00, '00:00:00', 'blah blah', 4, 0x313537303936383736375f353630342e6a7067, 0),
(78, 'Hair Cut', 36.00, '01:00:00', 'A hairstyle, hairdo, or haircut refers to the styling of hair, usually on the human scalp. Sometimes, this could also mean an editing of facial or body hair', 4, 0x313537303936373838395f343631312e6a7067, 0),
(79, 'Hair Spa (HIGH END)', 299.00, '01:00:00', 'Hair Spa is a therapy that is essential for maintaining a healthy growth.', 4, 0x313537303936373939335f373534322e6a7067, 0),
(80, 'Hair Wax (HIGH END)', 299.00, '01:00:00', 'Hair wax is a thick hairstyling product containing wax, used to assist with holding the hair.', 4, 0x313537303936383235305f343630332e6a7067, 0),
(81, 'Hot Oil (HIGH END)', 299.00, '01:00:00', 'blah blah', 4, 0x313537303936383338325f323137322e6a7067, 0),
(82, 'Hair Extension (Human Hair)', 3500.00, '02:00:00', 'Artificial hair integrations, more commonly known as hair extensions or hair weaves, add length and/or fullness to human hair. Hair extensions are usually clipped, glued, or sewn on natural hair by incorporating additional human or synthetic hair.', 4, 0x313537303936373937335f313233342e6a7067, 0),
(83, 'Ear Candle (HIGH END)', 249.00, '00:15:00', 'Ear Candling for only 15 Minutes.', 4, 0x313537303936373630395f353639372e6a7067, 0),
(84, 'Threading (HIGH END)', 149.00, '00:00:00', 'blah blah', 4, 0x313537303936383838365f313831352e6a7067, 0),
(85, 'Armpit (Waxing)', 149.00, '01:00:00', 'Daily shaving with razors can leave the underarms feeling sore and irritated. Why not try waxing them instead? It’s kinder to the skin and results in a finer re-growth that’s softer and sparser in the long term.', 4, 0x313537303936373437345f333233362e6a7067, 0),
(86, 'Legs (Waxing)', 699.00, '01:00:00', 'Our full leg waxing treatment involves removing hair from both legs and applying our soothing wax formula in strips, from the top of the thigh to the ankle.', 4, 0x313537303936383433375f343432382e6a7067, 0),
(87, 'Mustache (Waxing)', 149.00, '00:30:00', 'blah blah', 4, 0x313537303936383531375f313039332e6a7067, 0),
(88, 'Hair & Make Up (Traditional)', 299.00, '02:00:00', ' styling hair and applying makeup', 4, 0x313537303936373833375f353737312e6a7067, 0),
(89, 'Hair & Make Up (Air Brushl)', 799.00, '02:00:00', ' styling hair and applying makeup', 4, 0x313537303936373832335f343639382e6a7067, 0),
(90, 'Eye Lashes Extension (Natural)', 499.00, '01:00:00', 'Eyelash extensions are used to enhance the length, curliness, fullness, and thickness of natural eyelashes. The extensions may be made from several materials including mink, synthetic, human or horse hair.', 4, 0x313537303936373633375f373331392e6a7067, 0),
(91, 'Eye Lashes Extension (Faboulou)', 699.00, '01:00:00', 'Eyelash extensions are used to enhance the length, curliness, fullness, and thickness of natural eyelashes. The extensions may be made from several materials including mink, synthetic, human or horse hair.', 4, 0x313537303936373632365f373131362e6a7067, 0),
(92, 'Manicure', 49.00, '01:00:00', 'A manicure is a cosmetic beauty treatment for the fingernails and hands performed at home or in a nail salon.', 4, 0x313537303936383436375f393437352e6a7067, 0),
(93, 'Pedicure', 59.00, '01:00:00', 'pedicure is a cosmetic treatment of the feet and toenails, analogous to a manicure', 4, 0x313537303936383734385f383130342e6a7067, 0),
(94, 'Gel Polish', 499.00, '01:00:00', 'A gel polish manicure is a manicure that uses a soft gel in the form of polish. ', 4, 0x313537303936373830365f373634352e6a7067, 0),
(95, 'Nail Extension', 999.00, '01:30:00', 'Nail extensions – A lightweight plastic plate that follows the shape of the nail is glued to the tip of the natural nail in order to add length', 4, 0x313537303936383732385f393932312e6a7067, 0),
(96, 'Nail Art / Magnetic Cats Eye Polish', 1499.00, '01:00:00', 'Nail art is a creative way to paint, decorate, enhance, and embellish the nails.', 4, 0x313537303936383538325f343037302e6a7067, 0),
(97, 'Hand Paraffin w/ Manicure ', 199.00, '01:00:00', 'Make your nail glossy and smooth..', 4, 0x313537303936383333355f363631332e6a7067, 0),
(98, 'Foot Paraffin w/ Pedicure', 249.00, '01:00:00', 'Foot paraffin with Pedicure is a relaxing and effective technique that caters with all the demands of the feet and hands.', 4, 0x313537303936373739325f333133352e6a7067, 0),
(99, 'Foor Spa w/ Pedicure (Magic)', 299.00, '01:00:00', 'Foot spa is a relaxing and effective technique that caters with all the demands of the feet with Pedicure.', 4, 0x313537303936373638315f313536312e6a7067, 0),
(100, 'Foor Spa w/ Pedicure (Basic)', 249.00, '01:00:00', 'Foot spa is a relaxing and effective technique that caters with all the demands of the feet.', 4, 0x313537303936373636355f333331352e6a7067, 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `stfid` int(20) NOT NULL,
  `sid` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`stfid`, `sid`, `name`, `gender`, `dob`, `address`, `contact`, `city`, `image`) VALUES
(1, 1, 'Kiehl Albert Estrada', 'male', '10/03/1995', 'Alvear 2 St. Lingayen, Pangasinan', '09123456789', 'Lingayen', 0x313537343834333332305f343938332e6a7067),
(2, 1, 'Rizaldy', 'male', '10/21/1993', 'Alvear 2 St. Lingayen, Pangasinan', '09123456789', 'Lingayen', 0x313537343834333335375f383633382e6a7067),
(3, 2, 'Mark James Sabalboro', 'male', '05/01/1996', 'SanJacinto Pangasinan', '09179539133', 'Lingayen', 0x313537343834323537335f373539392e6a7067),
(4, 2, 'Abner Escaño', 'male', '04/28/1991', 'SanCarlos City, Pangasinan', '09156976871', 'Lingayen', 0x313537343834323739345f383039322e6a7067),
(5, 4, 'Ednyl Soriano', 'male', '06/28/1999', 'Estanza, Lingayen, Pangasinan', '09129038120', 'Lingayen', 0x313537343834333734395f333637332e6a706567),
(6, 4, 'John Francis Arnaiz', 'male', '03/07/1999', 'Sual, Pangasinan', '09951645783', 'Lingayen', 0x313537343834333832345f383639362e6a706567),
(7, 3, 'Joven Iglesias', 'male', '05/23/1992', 'Bugallon, Pangasinan', '0129334234', 'Lingayen', 0x313537343834343037375f353435312e6a7067),
(8, 3, 'Reyfer Aquino', 'male', '07/09/1990', 'Mangatarem, Pangasinan', '2371199999', 'Lingayen', 0x313537343834343136385f353837362e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `staff_availability`
--

CREATE TABLE `staff_availability` (
  `timeid` int(20) NOT NULL,
  `sid` int(20) NOT NULL,
  `stfid` int(20) NOT NULL,
  `fro` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_availability`
--

INSERT INTO `staff_availability` (`timeid`, `sid`, `stfid`, `fro`) VALUES
(4, 1, 1, '10:00:00'),
(5, 1, 1, '11:00:00'),
(6, 1, 1, '12:00:00'),
(7, 1, 1, '13:00:00'),
(8, 1, 1, '17:00:00'),
(9, 1, 1, '14:00:00'),
(10, 1, 1, '15:00:00'),
(11, 1, 1, '16:00:00'),
(13, 1, 2, '10:00:00'),
(14, 1, 2, '11:00:00'),
(16, 1, 2, '13:00:00'),
(17, 1, 2, '14:00:00'),
(18, 1, 2, '15:00:00'),
(19, 1, 2, '16:00:00'),
(20, 1, 2, '17:00:00'),
(24, 1, 2, '12:00:00'),
(35, 1, 2, '09:00:00'),
(36, 1, 1, '09:00:00'),
(37, 2, 3, '09:00:00'),
(38, 2, 3, '10:00:00'),
(39, 2, 3, '11:00:00'),
(40, 2, 3, '12:00:00'),
(41, 2, 3, '13:00:00'),
(42, 2, 3, '14:00:00'),
(43, 2, 3, '15:00:00'),
(44, 2, 3, '16:00:00'),
(45, 2, 3, '17:00:00'),
(46, 2, 4, '09:00:00'),
(47, 2, 4, '10:00:00'),
(48, 2, 4, '11:00:00'),
(49, 2, 4, '12:00:00'),
(50, 2, 4, '13:00:00'),
(51, 2, 4, '14:00:00'),
(52, 2, 4, '15:00:00'),
(53, 2, 4, '16:00:00'),
(54, 2, 4, '17:00:00'),
(55, 4, 5, '09:00:00'),
(56, 4, 5, '10:00:00'),
(57, 4, 5, '11:00:00'),
(58, 4, 5, '12:00:00'),
(59, 4, 5, '13:00:00'),
(60, 4, 5, '14:00:00'),
(61, 4, 5, '15:00:00'),
(62, 4, 5, '16:00:00'),
(63, 4, 5, '17:00:00'),
(64, 3, 7, '09:00:00'),
(65, 3, 7, '10:00:00'),
(66, 3, 7, '11:00:00'),
(67, 3, 7, '12:00:00'),
(68, 3, 7, '13:00:00'),
(69, 3, 7, '14:00:00'),
(70, 3, 7, '15:00:00'),
(71, 3, 7, '16:00:00'),
(72, 3, 7, '17:00:00'),
(73, 4, 6, '09:00:00'),
(74, 4, 6, '10:00:00'),
(75, 4, 6, '11:00:00'),
(76, 4, 6, '12:00:00'),
(77, 4, 6, '13:00:00'),
(78, 4, 6, '14:00:00'),
(79, 4, 6, '15:00:00'),
(80, 4, 6, '16:00:00'),
(81, 4, 6, '17:00:00'),
(82, 3, 8, '09:00:00'),
(83, 3, 8, '10:00:00'),
(84, 3, 8, '11:00:00'),
(85, 3, 8, '12:00:00'),
(86, 3, 8, '13:00:00'),
(87, 3, 8, '14:00:00'),
(88, 3, 8, '15:00:00'),
(89, 3, 8, '16:00:00'),
(90, 3, 8, '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff_service`
--

CREATE TABLE `staff_service` (
  `stfserid` int(20) NOT NULL,
  `sid` int(20) NOT NULL,
  `stfid` int(20) NOT NULL,
  `serid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(15) NOT NULL,
  `status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'CONFIRMED'),
(2, 'CANCELLED'),
(4, 'DONE');

-- --------------------------------------------------------

--
-- Table structure for table `weekdays`
--

CREATE TABLE `weekdays` (
  `nod` int(20) NOT NULL,
  `days` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weekdays`
--

INSERT INTO `weekdays` (`nod`, `days`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `workingtime`
--

CREATE TABLE `workingtime` (
  `did` int(20) NOT NULL,
  `sid` int(20) NOT NULL,
  `nod` int(20) NOT NULL,
  `weekdays` varchar(100) NOT NULL,
  `fro` time NOT NULL,
  `tto` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workingtime`
--

INSERT INTO `workingtime` (`did`, `sid`, `nod`, `weekdays`, `fro`, `tto`) VALUES
(8, 1, 1, 'Monday', '09:00:00', '18:00:00'),
(9, 1, 2, 'Tuesday', '09:00:00', '18:00:00'),
(10, 1, 3, 'Wednesday', '09:00:00', '18:00:00'),
(11, 1, 4, 'Thursday', '09:00:00', '18:00:00'),
(12, 1, 5, 'Friday', '09:00:00', '18:00:00'),
(13, 1, 6, 'Saturday', '09:00:00', '18:00:00'),
(14, 1, 7, 'Sunday', '09:00:00', '18:00:00'),
(15, 3, 1, 'Monday', '09:00:00', '18:00:00'),
(16, 3, 2, 'Tuesday', '09:00:00', '18:00:00'),
(17, 3, 1, 'Monday', '09:00:00', '18:00:00'),
(18, 3, 3, 'Wednesday', '09:00:00', '18:00:00'),
(19, 3, 4, 'Thursday', '09:00:00', '18:00:00'),
(20, 3, 5, 'Friday', '09:00:00', '18:00:00'),
(21, 3, 6, 'Saturday', '09:00:00', '18:00:00'),
(22, 4, 1, 'Monday', '09:00:00', '18:00:00'),
(23, 4, 2, 'Tuesday', '09:00:00', '18:00:00'),
(24, 4, 3, 'Wednesday', '09:00:00', '18:00:00'),
(25, 4, 4, 'Thursday', '09:00:00', '18:00:00'),
(26, 4, 5, 'Friday', '09:00:00', '18:00:00'),
(27, 4, 6, 'Saturday', '09:00:00', '18:00:00'),
(28, 4, 7, 'Sunday', '09:00:00', '18:00:00'),
(29, 2, 1, 'Monday', '09:00:00', '18:00:00'),
(30, 2, 2, 'Tuesday', '09:00:00', '18:00:00'),
(31, 2, 3, 'Wednesday', '09:00:00', '18:00:00'),
(32, 2, 4, 'Thursday', '09:00:00', '18:00:00'),
(33, 2, 5, 'Friday', '09:00:00', '18:00:00'),
(34, 2, 6, 'Saturday', '09:00:00', '18:00:00'),
(35, 2, 7, 'Sunday', '09:00:00', '18:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `baner`
--
ALTER TABLE `baner`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`aid`,`username`,`datecreated`,`fname`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`,`email`,`username`);

--
-- Indexes for table `fservice`
--
ALTER TABLE `fservice`
  ADD PRIMARY KEY (`serid`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `manager_salon`
--
ALTER TABLE `manager_salon`
  ADD PRIMARY KEY (`sid`,`mid`),
  ADD UNIQUE KEY `sid` (`sid`),
  ADD UNIQUE KEY `mid` (`mid`);

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`mapid`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`riv`,`aid`);

--
-- Indexes for table `revenue_salon`
--
ALTER TABLE `revenue_salon`
  ADD PRIMARY KEY (`riv`);

--
-- Indexes for table `salon`
--
ALTER TABLE `salon`
  ADD PRIMARY KEY (`sid`,`sname`);

--
-- Indexes for table `service1`
--
ALTER TABLE `service1`
  ADD PRIMARY KEY (`serid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`stfid`);

--
-- Indexes for table `staff_availability`
--
ALTER TABLE `staff_availability`
  ADD PRIMARY KEY (`timeid`,`sid`,`stfid`,`fro`),
  ADD KEY `stfid` (`stfid`);

--
-- Indexes for table `staff_service`
--
ALTER TABLE `staff_service`
  ADD PRIMARY KEY (`stfserid`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekdays`
--
ALTER TABLE `weekdays`
  ADD PRIMARY KEY (`nod`);

--
-- Indexes for table `workingtime`
--
ALTER TABLE `workingtime`
  ADD PRIMARY KEY (`did`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baner`
--
ALTER TABLE `baner`
  MODIFY `bid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `aid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `mapid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `riv` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `revenue_salon`
--
ALTER TABLE `revenue_salon`
  MODIFY `riv` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `salon`
--
ALTER TABLE `salon`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2324;

--
-- AUTO_INCREMENT for table `service1`
--
ALTER TABLE `service1`
  MODIFY `serid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `stfid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff_availability`
--
ALTER TABLE `staff_availability`
  MODIFY `timeid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `staff_service`
--
ALTER TABLE `staff_service`
  MODIFY `stfserid` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workingtime`
--
ALTER TABLE `workingtime`
  MODIFY `did` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `staff_availability`
--
ALTER TABLE `staff_availability`
  ADD CONSTRAINT `staff_availability_ibfk_1` FOREIGN KEY (`stfid`) REFERENCES `staff` (`stfid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
