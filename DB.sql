-- --------------------------------------------------------
-- Host:                         81.31.151.15
-- Server version:               10.3.27-MariaDB-log - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for interna5_savecomm
CREATE DATABASE IF NOT EXISTS `interna5_savecomm` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `interna5_savecomm`;

-- Dumping structure for table interna5_savecomm.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table interna5_savecomm.category: ~6 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `category`) VALUES
	(1, 'Nuovi Servizi'),
	(2, 'Informazioni e vicinanza ai clienti'),
	(3, 'Rivoluzionare gli studi'),
	(4, 'Formazione'),
	(5, 'Innovazione'),
	(6, 'Clima Aziendale');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table interna5_savecomm.form
CREATE TABLE IF NOT EXISTS `form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(50) NOT NULL,
  `week` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `id_subcategory` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_form_subcategory` (`id_subcategory`),
  KEY `FK_form_category` (`id_category`),
  KEY `FK_form_users` (`id_user`),
  CONSTRAINT `FK_form_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`),
  CONSTRAINT `FK_form_subcategory` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`),
  CONSTRAINT `FK_form_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=latin1;

-- Dumping data for table interna5_savecomm.form: ~164 rows (approximately)
/*!40000 ALTER TABLE `form` DISABLE KEYS */;
INSERT INTO `form` (`id`, `value`, `week`, `year`, `id_subcategory`, `id_category`, `id_user`) VALUES
	(1, '550', 13, '2020', 10, 5, 1),
	(2, '2000', 13, '2020', 11, 5, 1),
	(3, '1', 13, '2020', 12, 6, 1),
	(4, '1', 1, '2020', 1, 1, 1),
	(5, '2', 1, '2020', 2, 1, 1),
	(6, '1', 1, '2020', 5, 2, 1),
	(7, '2', 1, '2020', 6, 2, 1),
	(8, '90', 12, '2020', 1, 1, 1),
	(9, '100', 12, '2020', 2, 1, 1),
	(10, '15.00', 12, '2020', 3, 1, 1),
	(11, '150.00', 12, '2020', 4, 1, 1),
	(12, '67', 12, '2020', 5, 2, 1),
	(13, '676', 12, '2020', 6, 2, 1),
	(14, '65', 12, '2020', 10, 5, 1),
	(15, '67', 12, '2020', 11, 5, 1),
	(16, '30', 12, '2020', 7, 3, 1),
	(17, '100', 12, '2020', 8, 3, 1),
	(18, '8', 12, '2020', 9, 4, 1),
	(19, '8', 12, '2020', 13, 4, 1),
	(20, '1', 12, '2020', 12, 6, 1),
	(21, '10', 13, '2020', 1, 1, 1),
	(22, '1', 13, '2020', 2, 1, 1),
	(23, '2', 13, '2020', 1, 1, 12),
	(24, '15', 13, '2020', 2, 1, 12),
	(25, '300.00', 13, '2020', 3, 1, 12),
	(26, '2,000.00', 13, '2020', 4, 1, 12),
	(27, '15', 13, '2020', 5, 2, 12),
	(28, '20', 13, '2020', 6, 2, 12),
	(29, '8', 13, '2020', 7, 3, 12),
	(30, '40', 13, '2020', 8, 3, 12),
	(31, '8', 13, '2020', 9, 4, 12),
	(32, '8', 13, '2020', 13, 4, 12),
	(33, '4', 13, '2020', 10, 5, 12),
	(34, '15', 13, '2020', 11, 5, 12),
	(35, '1', 13, '2020', 12, 6, 12),
	(36, '01', 13, '2020', 1, 1, 15),
	(37, '01', 13, '2020', 2, 1, 15),
	(38, '0.00', 13, '2020', 3, 1, 15),
	(39, '0.00', 13, '2020', 4, 1, 15),
	(40, '1', 13, '2020', 7, 3, 15),
	(41, '25', 13, '2020', 8, 3, 15),
	(42, '1', 13, '2020', 9, 4, 15),
	(43, '1', 13, '2020', 13, 4, 15),
	(44, '1', 13, '2020', 10, 5, 15),
	(45, '1', 13, '2020', 12, 6, 15),
	(46, '5', 13, '2020', 1, 1, 18),
	(47, '4', 13, '2020', 2, 1, 18),
	(48, '0.00', 13, '2020', 3, 1, 18),
	(49, '0.00', 13, '2020', 4, 1, 18),
	(50, '3', 13, '2020', 5, 2, 18),
	(51, '0', 13, '2020', 6, 2, 18),
	(52, '3', 13, '2020', 7, 3, 18),
	(53, '1', 13, '2020', 8, 3, 18),
	(54, '5', 13, '2020', 9, 4, 18),
	(55, '5', 13, '2020', 13, 4, 18),
	(56, '3', 13, '2020', 10, 5, 18),
	(57, '3', 13, '2020', 11, 5, 18),
	(58, '2', 13, '2020', 12, 6, 18),
	(59, '1', 13, '2020', 1, 1, 22),
	(60, '3', 13, '2020', 2, 1, 22),
	(61, '1,100.00', 13, '2020', 3, 1, 22),
	(62, '3,000.00', 13, '2020', 4, 1, 22),
	(63, '10', 13, '2020', 5, 2, 22),
	(64, '13', 13, '2020', 6, 2, 22),
	(65, '2', 13, '2020', 7, 3, 22),
	(66, '40', 13, '2020', 8, 3, 22),
	(67, '4', 13, '2020', 9, 4, 22),
	(68, '4', 13, '2020', 13, 4, 22),
	(69, '1', 13, '2020', 10, 5, 22),
	(70, '10', 13, '2020', 11, 5, 22),
	(71, '2', 13, '2020', 12, 6, 22),
	(72, '2', 13, '2020', 1, 1, 21),
	(73, '2', 13, '2020', 2, 1, 21),
	(74, '0.00', 13, '2020', 3, 1, 21),
	(75, '0.00', 13, '2020', 4, 1, 21),
	(76, '7', 13, '2020', 5, 2, 21),
	(77, '14', 13, '2020', 6, 2, 21),
	(78, '9', 13, '2020', 7, 3, 21),
	(79, '40', 13, '2020', 8, 3, 21),
	(80, '4', 13, '2020', 9, 4, 21),
	(81, '4', 13, '2020', 13, 4, 21),
	(82, '3', 13, '2020', 10, 5, 21),
	(83, '7', 13, '2020', 11, 5, 21),
	(84, '1', 13, '2020', 12, 6, 21),
	(85, '0', 13, '2020', 1, 1, 10),
	(86, '0', 13, '2020', 2, 1, 10),
	(87, '0.00', 13, '2020', 3, 1, 10),
	(88, '0.00', 13, '2020', 4, 1, 10),
	(89, '6', 13, '2020', 1, 1, 14),
	(90, '8', 13, '2020', 2, 1, 14),
	(91, '100.00', 13, '2020', 3, 1, 14),
	(92, '500.00', 13, '2020', 4, 1, 14),
	(93, '10', 13, '2020', 5, 2, 14),
	(94, '2', 13, '2020', 6, 2, 14),
	(95, '20', 13, '2020', 7, 3, 14),
	(96, '30', 13, '2020', 8, 3, 14),
	(97, '12', 13, '2020', 9, 4, 14),
	(98, '12', 13, '2020', 13, 4, 14),
	(99, '4', 13, '2020', 10, 5, 14),
	(100, '10', 13, '2020', 11, 5, 14),
	(101, '4', 13, '2020', 12, 6, 14),
	(102, '7', 13, '2020', 1, 1, 31),
	(103, '10', 13, '2020', 2, 1, 31),
	(104, '300.00', 13, '2020', 3, 1, 31),
	(105, '500.00', 13, '2020', 4, 1, 31),
	(106, '10', 13, '2020', 5, 2, 31),
	(107, '5', 13, '2020', 6, 2, 31),
	(108, '4', 13, '2020', 7, 3, 31),
	(109, '5', 13, '2020', 8, 3, 31),
	(110, '4', 13, '2020', 9, 4, 31),
	(111, '4', 13, '2020', 13, 4, 31),
	(112, '5', 13, '2020', 10, 5, 31),
	(113, '10', 13, '2020', 11, 5, 31),
	(114, '1', 13, '2020', 12, 6, 31),
	(115, '1', 13, '2020', 1, 1, 32),
	(116, '3', 13, '2020', 2, 1, 32),
	(117, '10', 13, '2020', 5, 2, 32),
	(118, '30', 13, '2020', 6, 2, 32),
	(119, '8', 13, '2020', 7, 3, 32),
	(120, '50', 13, '2020', 8, 3, 32),
	(121, '4', 13, '2020', 9, 4, 32),
	(122, '4', 13, '2020', 13, 4, 32),
	(123, '2', 13, '2020', 10, 5, 32),
	(124, '10', 13, '2020', 11, 5, 32),
	(125, '1', 13, '2020', 12, 6, 32),
	(126, '1', 13, '2020', 1, 1, 38),
	(127, '1', 13, '2020', 2, 1, 38),
	(128, '0.00', 13, '2020', 3, 1, 38),
	(129, '0.00', 13, '2020', 4, 1, 38),
	(130, '10', 13, '2020', 5, 2, 38),
	(131, '6', 13, '2020', 6, 2, 38),
	(132, '5', 13, '2020', 7, 3, 38),
	(133, '40', 13, '2020', 8, 3, 38),
	(134, '0', 13, '2020', 9, 4, 38),
	(135, '0', 13, '2020', 13, 4, 38),
	(136, '0', 13, '2020', 10, 5, 38),
	(137, '10', 13, '2020', 11, 5, 38),
	(138, '0', 13, '2020', 12, 6, 38),
	(139, '2', 14, '2020', 1, 1, 11),
	(140, '5', 14, '2020', 2, 1, 11),
	(141, '2,000.00', 14, '2020', 3, 1, 11),
	(142, '40,000.00', 14, '2020', 4, 1, 11),
	(143, '40', 14, '2020', 5, 2, 11),
	(144, '10', 14, '2020', 6, 2, 11),
	(145, '10', 14, '2020', 7, 3, 11),
	(146, '40', 14, '2020', 8, 3, 11),
	(147, '6', 14, '2020', 9, 4, 11),
	(148, '6', 14, '2020', 13, 4, 11),
	(149, '10', 14, '2020', 10, 5, 11),
	(150, '40', 14, '2020', 11, 5, 11),
	(151, '2', 14, '2020', 12, 6, 11),
	(152, '1', 17, '2020', 1, 1, 46),
	(153, '5', 17, '2020', 2, 1, 46),
	(154, '0.00', 17, '2020', 3, 1, 46),
	(155, '800.00', 17, '2020', 4, 1, 46),
	(156, '10', 17, '2020', 5, 2, 46),
	(157, '10', 17, '2020', 6, 2, 46),
	(158, '10', 17, '2020', 7, 3, 46),
	(159, '40', 17, '2020', 8, 3, 46),
	(160, '10', 17, '2020', 9, 4, 46),
	(161, '10', 17, '2020', 13, 4, 46),
	(162, '0', 17, '2020', 10, 5, 46),
	(163, '10', 17, '2020', 11, 5, 46),
	(164, '1', 17, '2020', 12, 6, 46);
/*!40000 ALTER TABLE `form` ENABLE KEYS */;

-- Dumping structure for table interna5_savecomm.subcategory
CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subcategory` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  KEY `id` (`id`),
  KEY `FK__category` (`id_category`),
  CONSTRAINT `FK__category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table interna5_savecomm.subcategory: ~13 rows (approximately)
/*!40000 ALTER TABLE `subcategory` DISABLE KEYS */;
INSERT INTO `subcategory` (`id`, `subcategory`, `id_category`) VALUES
	(1, 'Nr. Riunioni Colloqui Strategici con clienti', 1),
	(2, 'Totale Riunioni e colloqui', 1),
	(3, 'Ricavi Nuovi Servizi', 1),
	(4, 'Ricavi Totali', 1),
	(5, 'Nr. contatti settimanale', 2),
	(6, 'Nr. Clienti', 2),
	(7, 'Ore passate su adempimenti utili al futuro', 3),
	(8, 'Ore Lavorate', 3),
	(9, 'Numero ore formazione di tutti', 4),
	(10, 'Numero di contatti nuovi strumenti', 5),
	(11, 'Numero Contatti', 5),
	(12, 'Numero di riunioni strategiche', 6),
	(13, 'Numero dipendenti', 4);
/*!40000 ALTER TABLE `subcategory` ENABLE KEYS */;

-- Dumping structure for table interna5_savecomm.users
CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `ragione_sociale` varchar(50) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `cognome` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `citta` varchar(50) DEFAULT NULL,
  `data_attivazione` int(11) DEFAULT NULL,
  `last_access` int(11) DEFAULT NULL,
  `attivo` smallint(6) NOT NULL DEFAULT 1,
  `data_disat` date DEFAULT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- Dumping data for table interna5_savecomm.users: ~42 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`users_id`, `username`, `password`, `ragione_sociale`, `nome`, `cognome`, `telefono`, `citta`, `data_attivazione`, `last_access`, `attivo`, `data_disat`) VALUES
	(1, 'simonebrancozzi', 'simone2017', 'Leonida ', 'Simone ', 'Brancozzi', NULL, NULL, 1585235264, 1617478869, 0, NULL),
	(6, 'luca.lanteri@gmail.com', 'Luca5', NULL, 'Luca', 'Lanteri', '3355274958', 'Sanremo', 1585339169, 1616926041, 0, NULL),
	(7, 'bosco@omniaservice.biz', 'giuseppe2009', NULL, 'ALESSANDRO', 'BOSCO', '3389031300', 'FAVARA', 1585342944, 1616926104, 0, NULL),
	(8, 'bagnaresioliviero@gmail.com', 'taiula60', NULL, 'Oliviero', 'Bagnaresi', '3478227740', 'Riolo Terme', 1585381068, 1616917135, 0, NULL),
	(9, 'consulenze.cascone@gmail.com', 'bhgt56hg', NULL, 'Giuseppe', 'Cascone', '3351037074', 'Caserta', 1585383485, 1616926086, 0, NULL),
	(10, 'liviozizza.studio@gmail.com', 'Livio!1979', NULL, 'Livio', 'Zizza', '3208157546', 'Ciro\' marina', 1585383890, 1616936246, 0, NULL),
	(11, 'gennusolait@gmail.com', '444455556666', NULL, 'Gaetano', 'Gennuso', '3406989379', 'Caltavuturo PA', 1585385233, 1620560110, 0, NULL),
	(12, 'lorenzogelsomini@gmail.com', 'fatto', NULL, 'Lorenzo', 'Gelsomini', '3497412947', 'Fossombrone', 1585385620, 1616925760, 0, NULL),
	(13, 'roberto@robertomauro.it', 'Sandrina73', NULL, 'ROBERTO', 'MAURO', '3386359721', 'Udine', 1585385911, 1616921953, 0, NULL),
	(14, 'miguel@scordamaglia.it', 'SCverdebiancoriver', NULL, 'Miguel', 'Scordamaglia', '3356559175', 'Torino', 1585387074, 1616959957, 0, NULL),
	(15, 'studio.pogliaga@gmail.com', 'stuComm49.', NULL, 'Paola', 'Pogliaga', '3355697457', 'Roma', 1585388097, 1616926132, 0, NULL),
	(16, 'mziche@yahoo.it', 'mediatore73', NULL, 'Maurizio', 'Zichella', '3475414612', 'FOGGIA', 1585388241, 1616924302, 0, NULL),
	(18, 'cirpas2019@gmail.com', 'Efilino2', NULL, 'Pasquale', 'Cirigliano', '3358246286', 'Milano', 1585389532, 1616925567, 0, NULL),
	(19, 'dallogliogiovanna@gmail.com', 'giogiocomm', NULL, 'Giovanna', 'Dall\'Oglio', '3929768212', 'Mantova', 1585389668, 1616931126, 0, NULL),
	(20, 'luciocibelli@libero.it', 'lucio123', NULL, 'Lucio', 'Cibelli', '3476339765', 'Tortoreto Te', 1585391480, 1616927677, 0, NULL),
	(21, 'ciccanipasquale@virgilio.it', 'pippo2015', NULL, 'PASQUALE', 'CICCANI', '3371094452', 'L\'Aquila', 1585391834, 1619425631, 0, NULL),
	(22, 'info@studioconsul.latina.it', 'Sersan60???', NULL, 'Sergio', 'Santangelo', '3468282441', 'Latina', 1585392382, 1616931756, 0, NULL),
	(23, 'aborghi54@yahoo.it', 'Matteo85', NULL, 'Andrea', 'Borghi', '3387710857', 'Chieti', 1585392724, 1616928848, 0, NULL),
	(24, 'Stefano.nocioni@hotmail.it', 'AS123456', NULL, 'Stefano', 'Nocioni', '3484228109', 'Falconara marittima', 1585392730, 1616928778, 0, NULL),
	(25, 'giuliano.difrancesco@studiodifrancesco.it', 'Gdf76773', NULL, 'GIULIANO', 'DI FRANCESCO', '3903207680836', 'PESCARA', 1585393976, 1616930360, 0, NULL),
	(26, 'marcello.trudu@gmail.com', 'baddy1961', NULL, 'Marcello', 'Trudu', '3357868359', 'Oristano', 1585394148, 1616930207, 0, NULL),
	(27, 'sandro.zincani@gmail.com', 'iperius', NULL, 'SANDRO', 'ZINCANI', '3391113738', 'Pescara', 1585395273, 1617349645, 0, NULL),
	(28, 'marcomartinicascina@gmail.com', 'Aggeggio46', NULL, 'Marco', 'Martini', '39335314552', 'Cascina', 1585402349, 1616952052, 0, NULL),
	(29, 'frendalibertino@gmail.com', '1958', NULL, 'Libertino', 'Frenda', '393500751900', 'Raffafali', 1585402392, 1616938480, 0, NULL),
	(30, 'becchetti.gianluca@gmail.com', 'cruscotto', NULL, 'GIANLUCA', 'BECCHETTI', '3396625631', 'brescia', 1585405832, 1616941865, 0, NULL),
	(31, 'sc.rosa77@gmail.com', 'Raffaele91', NULL, 'Rosa', 'Scalera', '3286238905', 'Milano', 1585433798, 1616969910, 0, NULL),
	(32, 'pase.giovanni@gmail.com', 'Praticante.02', NULL, 'GIOVANNI', 'PASE', '3493112881', 'CONEGLIANO', 1585435416, 1616971496, 0, NULL),
	(33, 'gianluca_dami@hotmail.it', 'Pisa1909', NULL, 'Gianluca', 'Dami', '3480830866', 'Santa Croce sullâ€™Arno', 1585475594, NULL, 0, NULL),
	(34, 'andreamixi@libero.it', 'sharonsalvacommercialista', NULL, 'Andrea', 'Delbono', '3389520960', 'Parma', 1585477001, 1617013219, 0, NULL),
	(35, 'simonensc@libero.it', 'acmilan@88', NULL, 'Simone', 'Nesci', '3492167405', 'Vibo Valentia', 1585480736, 1617016796, 0, NULL),
	(36, 'sarah.capponi@gmail.com', 'StudioSarah', NULL, 'Sarah', 'Capponi', '3669950223', 'Fermo', 1585492530, 1617028646, 0, NULL),
	(37, 'studiogaliziaepinna@tiscali.it', 'Studio089', NULL, 'Marco', 'Pinna', '3296887473', 'Cagliari', 1585497499, 1617033591, 0, NULL),
	(38, 'ditizio.roberto@libero.it', '12345678', NULL, 'Roberto', 'Di Tizio', '0871950729', 'Pescara', 1585497903, 1617034274, 0, NULL),
	(39, 'dino.norscia@norsciaeparteners.it', '1234', NULL, 'dino', 'norscia', '085/4210832', 'montesilvano', 1585578630, NULL, 2, NULL),
	(40, 'drorlandiandrea@gmail.com', 'ioat43', NULL, 'Andrea', 'Orlandi', '3482227437', 'Castelfranco veneto', 1585595620, 1617131675, 0, NULL),
	(41, 'marangiletizia@gmail.com', 'polanti90', NULL, 'letizia', 'marangi', '3343437784', 'martina franca', 1585650712, 1617186784, 0, NULL),
	(42, 'g.p.biele@gmx.de', 'konsul73', NULL, 'Gian Piero', 'Biele', '3487727403', 'Bologna', 1585667770, 1618844006, 0, NULL),
	(43, 'amatifausto1@gmail.com', 'Ammar2002', NULL, 'FAUSTO', 'AMATI', '3357443708', 'ForlÃ¬', 1585677609, 1617213677, 0, NULL),
	(44, 'luca.giancarli@studiosanmichele.it', 'SANMICHELE2020', NULL, 'LUCA', 'GIANCARLI', '346 47 111 59', 'FALCONARA MARITTIMA', 1585731661, 1617267770, 0, NULL),
	(45, 'FILIPPO.RAMPONI@STBAC.NET', 'Giamboni81', NULL, 'FILIPPO', 'RAMPONI', '3496393320', 'MILANO', 1585837604, 1617374003, 0, NULL),
	(46, 'filippobergamino@gmail.com', 'Credembranc77', NULL, 'Filippo', 'Bergamino', '3494747750', 'Milano', 1586014617, 1619086584, 0, NULL),
	(47, '13gior@gmail.com', '!212146Gio?=', NULL, 'Giorgio', 'Fatarella', '3735104282', 'Segrate', 1586160682, 1617696816, 0, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
