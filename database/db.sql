CREATE DATABASE pemilu_bem;

CREATE TABLE IF NOT EXISTS `pemilu_bem`.`admin` (
	id_admin smallint(2) NOT NULL AUTO_INCREMENT,
	username varchar(100) NOT NULL,
	password varchar(255) NOT NULL,
	nama varchar(100) NOT NULL,
	last_seen datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `pemilu_bem`.`kandidat` (
	NIM int(5) NOT NULL,
	nama varchar(100) NOT NULL,
	suara int(11) NOT NULL
	PRIMARY KEY (`NIM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `pemilu_bem`.`mahasiswa` (
	NIM int(5) NOT NULL AUTO_INCREMENT,
	nama varchar(100) NOT NULL,
	password varchar(255) NOT NULL,
  memilih int(5) NULL,
	PRIMARY KEY (`NIM`),
  FOREIGN KEY (memilih) REFERENCES kandidat(NIM)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;