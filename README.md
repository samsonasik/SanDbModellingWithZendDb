Zend\Db relational example usage
--------------------------------

1. import these sql ( data are fake :) ) :

```sql
--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `artist` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `artist`, `title`) VALUES
(1, 'Bruno Mars', 'Go'),
(2, 'Syahrini', 'Membahana');

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

DROP TABLE IF EXISTS `track`;
CREATE TABLE IF NOT EXISTS `track` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `album_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`id`, `title`, `album_id`) VALUES
(1, 'Sesuatu', 2),
(2, 'Aku Tak Biasa', 2),
(3, 'Grenade', 1),
(4, 'I like it!', 1);
```

2. go to :

```php
http://yourzf2app/testdb
```

reference :
https://gist.github.com/ralphschindler/6910421
