
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT '1',
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

CREATE TABLE IF NOT EXISTS `r_passos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `estagio` char(1) NOT NULL DEFAULT '0',
  `ok` char(1) NOT NULL DEFAULT '0',
  `setor` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `login` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `senha` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ativo` char(1) COLLATE latin1_general_ci NOT NULL DEFAULT 's',
  `administrador` char(1) COLLATE latin1_general_ci NOT NULL DEFAULT 'n',
  `datacad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT 'img/noperfil.jpg',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`login`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;
