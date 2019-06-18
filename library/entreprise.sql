
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*database name entreprise*/

Drop Table if EXISTS entreprise,membres,admin;

CREATE TABLE IF NOT EXISTS `entreprise` (
    `id` SERIAL,
    `namecie` varchar(100) NOT NULL,
    `namecontact` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `city` varchar(100) NOT NULL,
    `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `auth_cre` varchar(50),
    `updated` TIMESTAMP DEFAULT 0 ON UPDATE CURRENT_TIMESTAMP,
    `auth_updt` varchar(50),
    CONSTRAINT pk_Cie PRIMARY KEY (id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `entreprise` (`namecie`, `namecontact`, `email`, `city`, `created`) VALUES
('Open','Latour', 'dupont@orange.fr','Lannion', '2019-05-15 10:43:55'),
('Nokia','Lapierre', 'dupont@orange.fr','lannion', '2019-05-15 10:43:55'),
('3D Ouest','Durant', 'dupont@orange.fr', 'lannion', '2019-05-15 10:43:55'),
('4D sud','Toto', 'dupont@orange.fr', 'lannion', '2019-05-15 10:43:55'),
('MarsuProd','Franquin', 'dupuis@orange.fr', 'bruxelles', '2019-05-15 10:43:55'),
('Lanfeust','Trolls', 'vert@rouge.fr', 'lannion', '2019-05-15 10:43:55'),
('Voxpass','Guidou', 'dupont@orange.fr', 'lannion', '2019-05-15 10:43:55'),
('Symbiose','Durant', 'dupont@orange.fr', 'lannion', '2019-05-15 10:43:55'),
('Skill informatique','Durant', 'dupont@orange.fr', 'lannion', '2019-05-15 10:43:55'),
('Amazon','Durant', 'dupont@free.fr', 'lannion', '2019-05-15 10:43:55');

CREATE TABLE IF NOT EXISTS `membres` (
    `id` SERIAL AUTO_INCREMENT,
    `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP, 
    `nom` varchar(100) NOT NULL,
    `prenom` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `pass` varchar(100) NOT NULL,
    `admin` boolean, 
    CONSTRAINT pk_Users PRIMARY KEY (id)
    
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `membres` (`date`, `nom`, `prenom`, `email`, `pass`) VALUES 
( '2019-05-15 10:43:55', 'admin', 'admin', 'admin@gmail.com', '$2y$10$7/IUiFIvni3Vc28kx6ket.j3ZAs3hdVLcvazEZkqczmfKmV0yvCWS'),
( '2019-05-15 10:43:55', 'chabaneix', 'eric', 'chabxeric@gmail.com', '$2y$10$7/IUiFIvni3Vc28kx6ket.j3ZAs3hdVLcvazEZkqczmfKmV0yvCWS' );

CREATE TABLE IF NOT EXISTS `admin` (
    `id` SERIAL AUTO_INCREMENT,
    `nom` varchar(100) NOT NULL,
    `prenom` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `pass` varchar(255) NOT NULL,
    CONSTRAINT pk_Users PRIMARY KEY (id)
    
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `admin` (`nom`, `prenom`, `email`, `pass`) VALUES 
('admin', 'admin', 'admin@gmail.com', 'root'),
('chabaneix', 'eric', 'chabxeric@gmail.com', 'eric'),
('gay', 'andrea', 'admin@gmail.com', 'andrea'),
('d\'orazio', 'laurent', 'admin@gmail.com', 'laurent');

