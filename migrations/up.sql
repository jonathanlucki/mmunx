SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `amendments` (
  `amendment_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `resolution` int(11) NOT NULL,
  `type` text NOT NULL,
  `clause` int(11) DEFAULT NULL,
  `status` text NOT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `code` text NOT NULL,
  `points` int(11) NOT NULL,
  `order_num` int(11) NOT NULL,
  `person1` text,
  `email1` text,
  `person2` text,
  `email2` text,
  `person3` text,
  `email3` text,
  `person4` text,
  `email4` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `resolutions` (
  `num` int(11) NOT NULL,
  `title` text NOT NULL,
  `status` text NOT NULL,
  `clauses` int(11) NOT NULL,
  `submitter` int(11) NOT NULL,
  `seconder` int(11) NOT NULL,
  `negator` int(11) NOT NULL,
  `speakers` int(11) NOT NULL DEFAULT '0',
  `pdf` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `screen` (
  `id` int(11) NOT NULL DEFAULT '0',
  `active_screen` varchar(999) NOT NULL DEFAULT 'title',
  `active_resolution` int(11) DEFAULT NULL,
  `active_amendment` int(11) DEFAULT NULL,
  `voting` int(11) DEFAULT NULL,
  `vote_result` varchar(999) DEFAULT NULL,
  `speakers_list_limit` int(11) NOT NULL DEFAULT '10',
  `message` text,
  `paging_system_open` tinyint(1) NOT NULL DEFAULT '0',
  `temp_speaker_1` int(11) DEFAULT NULL,
  `temp_speaker_2` int(11) DEFAULT NULL,
  `temp_speaker_3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;


ALTER TABLE `amendments`
  ADD PRIMARY KEY (`amendment_id`);

ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `resolutions`
  ADD PRIMARY KEY (`num`);

ALTER TABLE `screen`
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
