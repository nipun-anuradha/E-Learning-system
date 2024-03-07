-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table e_learning_db.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table e_learning_db.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
REPLACE INTO `admin` (`id`, `email`, `password`) VALUES
	(1, 'admin@gmail.com', 'admin123');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table e_learning_db.course
DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table e_learning_db.course: ~7 rows (approximately)
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
REPLACE INTO `course` (`id`, `name`, `description`) VALUES
	(1, 'Web Programming', 'Sample description about this subject. This is test description for web programming'),
	(2, 'Data Science', 'Sample description about this subject. This is test description for data science'),
	(3, 'Mathematics For ICT', 'Sample description about this subject. This is test description for Maths'),
	(5, 'Python', 'Sample description about this subject. This is test description for python'),
	(7, 'IOT', 'Sample description about this subject. This is test description for IOT');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;

-- Dumping structure for table e_learning_db.lecture
DROP TABLE IF EXISTS `lecture`;
CREATE TABLE IF NOT EXISTS `lecture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `link` text DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lecture_course1_idx` (`course_id`),
  CONSTRAINT `fk_lecture_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table e_learning_db.lecture: ~4 rows (approximately)
/*!40000 ALTER TABLE `lecture` DISABLE KEYS */;
REPLACE INTO `lecture` (`id`, `date`, `time`, `link`, `course_id`) VALUES
	(1, '2023-11-15', '01:46:29', 'https://zoom.us', 2),
	(8, '2023-11-15', '03:44:25', 'https://zoom.us', 1),
	(9, '2023-11-15', '03:44:26', 'https://zoom.us', 2),
	(10, '2023-11-20', '19:00:00', 'https://zoom.us', 1),
	(11, '2023-11-23', '17:00:00', 'https://www.google.com', 7);
/*!40000 ALTER TABLE `lecture` ENABLE KEYS */;

-- Dumping structure for table e_learning_db.note_file
DROP TABLE IF EXISTS `note_file`;
CREATE TABLE IF NOT EXISTS `note_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `path` text DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_note_file_course1_idx` (`course_id`),
  CONSTRAINT `fk_note_file_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table e_learning_db.note_file: ~2 rows (approximately)
/*!40000 ALTER TABLE `note_file` DISABLE KEYS */;
REPLACE INTO `note_file` (`id`, `name`, `description`, `path`, `course_id`) VALUES
	(3, 'note01', 'test document file', 'uploads/notes/note01.pdf', 1),
	(4, 'note02', 'test doc', 'uploads/notes/note02.pdf', 1);
/*!40000 ALTER TABLE `note_file` ENABLE KEYS */;

-- Dumping structure for table e_learning_db.student
DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table e_learning_db.student: ~3 rows (approximately)
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
REPLACE INTO `student` (`id`, `fname`, `lname`, `contact`, `email`, `password`, `status`) VALUES
	(1, 'Nipun', 'an', '0785522888', 'anuradha.studeo@gmail.com', '12345678', 'active'),
	(2, 'Nipun', 'Anuradha', '0778855888', 'studeo@gmail.com', '12345678', 'active'),
	(3, 'sname', 'slnamee', '0785522111', 's@hotmail.com', '12345678', 'active');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;

-- Dumping structure for table e_learning_db.student_has_course
DROP TABLE IF EXISTS `student_has_course`;
CREATE TABLE IF NOT EXISTS `student_has_course` (
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`student_id`,`course_id`),
  KEY `fk_student_has_course_course1_idx` (`course_id`),
  KEY `fk_student_has_course_student1_idx` (`student_id`),
  CONSTRAINT `fk_student_has_course_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  CONSTRAINT `fk_student_has_course_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table e_learning_db.student_has_course: ~3 rows (approximately)
/*!40000 ALTER TABLE `student_has_course` DISABLE KEYS */;
REPLACE INTO `student_has_course` (`student_id`, `course_id`) VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(1, 5),
	(2, 1),
	(3, 2),
	(3, 3),
	(3, 5),
	(3, 7);
/*!40000 ALTER TABLE `student_has_course` ENABLE KEYS */;

-- Dumping structure for table e_learning_db.teacher
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_teacher_course_idx` (`course_id`),
  CONSTRAINT `fk_teacher_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table e_learning_db.teacher: ~2 rows (approximately)
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
REPLACE INTO `teacher` (`id`, `fname`, `lname`, `contact`, `email`, `password`, `status`, `course_id`) VALUES
	(1, 'kavi', 'nipu', '0778877888', 'a@gmail.com', '12345678', 'active', 1),
	(2, 't2', 't2', '0778888998', 't2@gmail.com', '12345678', 'active', 2),
	(3, 'new', 'teacher', '0776699852', 'newteacher@gmail.com', '12345678', 'active', 7);
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
