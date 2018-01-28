/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100113
 Source Host           : localhost
 Source Database       : u217119419_happy

 Target Server Type    : MySQL
 Target Server Version : 100113
 File Encoding         : utf-8

 Date: 01/28/2018 00:16:31 AM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `ciudades`
-- ----------------------------
DROP TABLE IF EXISTS `ciudades`;
CREATE TABLE `ciudades` (
  `idCiudad` int(11) NOT NULL AUTO_INCREMENT,
  `idPais` int(11) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `habitantes` int(11) DEFAULT NULL,
  `activo` int(1) DEFAULT NULL,
  PRIMARY KEY (`idCiudad`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `ciudades`
-- ----------------------------
BEGIN;
INSERT INTO `ciudades` VALUES ('1', '1', 'Pto Montt', '280000', '1'), ('2', '1', 'Santiago', '6158080', '1'), ('3', '1', 'Concepción', '216061', '1'), ('4', '1', 'Temuco', '280613', '1'), ('5', '1', 'Pta. Arenas', '127454', '1'), ('6', '2', 'Tacna', null, '1'), ('7', '2', 'Lima', null, '1');
COMMIT;

-- ----------------------------
--  Table structure for `genero`
-- ----------------------------
DROP TABLE IF EXISTS `genero`;
CREATE TABLE `genero` (
  `idGenero` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idGenero`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `genero`
-- ----------------------------
BEGIN;
INSERT INTO `genero` VALUES ('1', 'Terror', '0'), ('2', 'Policial (o Thriller)', '1'), ('3', 'Romántica', '1'), ('4', 'Aventura', '1'), ('5', 'Ficcion / Realidad', '1'), ('6', 'Ciencia Ficción', '1'), ('7', 'Investigación', '1'), ('8', 'Biográfica', '1'), ('9', 'Infantil', '1'), ('10', 'Autoayuda', '1'), ('11', 'Erótica', '1'), ('12', 'Hogar', '1'), ('13', 'Enciclopedia / Manual', '1'), ('14', 'Politica', '1'), ('15', 'Economia / Marketing', '1'), ('16', 'Sociedad', '1'), ('17', 'Deportes', '1'), ('18', 'Viajes / Cultura', '1'), ('19', 'Otros temas / Varios', '1'), ('20', 'Epistolar', '1');
COMMIT;

-- ----------------------------
--  Table structure for `imagenes`
-- ----------------------------
DROP TABLE IF EXISTS `imagenes`;
CREATE TABLE `imagenes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `ruta` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `imagenes`
-- ----------------------------
BEGIN;
INSERT INTO `imagenes` VALUES ('1', 'lkjdlkasd', 'cinthia.jpg'), ('2', 'titulo 1', 'cinthia1.jpg'), ('3', 'titulo 1', 'cinthia2.jpg'), ('4', 'titulo 1', 'cinthia3.jpg'), ('5', 'titulo 1', 'cinthia4.jpg'), ('6', 'test2', 'cinthia5.jpg'), ('7', 'dasdas', 'Captura_de_pantalla_2017-09-16_a_las_15_01_14.png'), ('8', 'qwert', 'cinthia6.jpg'), ('9', 'dasdsa', 'cinthia7.jpg'), ('10', 'czxczx', 'cinthia8.jpg'), ('11', 'xczxc', 'cinthia9.jpg'), ('12', 'zczxcz', 'cinthia10.jpg'), ('13', 'zczxcz', 'cinthia11.jpg'), ('14', 'Nuevo Titulo', 'cinthia12.jpg'), ('15', 'dasdsa', 'Transferencia_a__6500598598.pdf'), ('16', 'dasdsa', 'Transferencia_a__6500598599.pdf'), ('17', '10001010', 'Transferencia_a__65005985910.pdf'), ('18', 'Taza 1', 'taza.jpg'), ('19', 'tadasdasd', 'taza1.jpg');
COMMIT;

-- ----------------------------
--  Table structure for `libros`
-- ----------------------------
DROP TABLE IF EXISTS `libros`;
CREATE TABLE `libros` (
  `idLibros` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `resumen` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `genero` varchar(255) DEFAULT NULL,
  `puntaje` tinyint(4) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `imgExterna` tinyint(4) DEFAULT NULL,
  `fechaCreacion` date DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idLibros`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `libros`
-- ----------------------------
BEGIN;
INSERT INTO `libros` VALUES ('1', 'El libro del cementerio', 'Neil Gaiman', 'El libro del cementerio (título original en inglés The graveyard book) es una novela del escritor británico Neil Gaiman que parodia con una mezcla de humor, ternura y originalidad los géneros fantástico y de terror, y que fue publicada en 2008. El propio ', '<p>«El libro del cementerio es infinitamente imaginativo, narrado con maestría y como Nad mismo, demasiado inteligente para pertenecer a un solo público: este libro es para todos. Te encantará a morir.» Holly Black, co-creadora de Las crónicas de Spiderwick</p>\n<p>Escuchad esta trágica historia: una familia que duerme, un asesino sin compasión y una criatura aventurera, un huérfano que escapa de la muerte. ¿O no?</p>\n<p>El pequeño escapa del peligro y consigue gatear hasta lo más alto de la colina. Detrás de la valla que se encuentra, existe un lugar oscuro y tranquilo, un cementerio lleno de una vida especial. El niño es recibido allí donde los muertos no duermen y todos los que allí habitan deciden brindarle su protección, porque fuera, tras la valla que separa a la ciudad de sus fantasmas, el asesino vil espera pacientemente.</p>\n\nEl niño sin padres, sin lugar en el mundo, sin nombre, será acogido por los espíritus amables, que hacen un pacto para protegerlo. Lo llamarán Nadie, porque no se parece a nadie más que a sí mismo. Será Nad para sus “padres”, Nad para sus compañeros de juegos, niños que nunca más crecerán, Nad para su mentor. Y Nadie para el hombre que lo busca para matarlo.', '1', '17', null, 'imagenes/home/883.jpg', '0', '2017-12-11', '1', '1'), ('2', 'Harmony House', 'Nic Sheff', 'En Playa Paraíso algo está mal. El padre de Jen cree que mudarse a Harmony House es la mejor manera de seguir adelante luego de la muerte de su esposa. Pero todos los que han vivido allí saben lo que se oculta detrás de sus muros. Todos conocen el poder d', null, '1', '10', null, 'imagenes/home/Harmony_House-TAPA-ALTA.jpg', '0', '2017-12-11', '1', '1'), ('3', 'Historia secreta de Chile', 'Jorge Baradit', '¿Arturo Prat fue un apasionado espiritista? ¿Por qué murió asesinado Manuel Rodríguez y donde se encuentran sus restos? ¿Hubo en la Patagonia una monarquía dirigida por un francés cuyos súbditos eran un grupo de mapuches? ¿La estrella solitaria de nuestra', null, '1', '15', null, 'imagenes/home/bara.jpg', '0', '2017-12-11', '1', '1'), ('4', 'La larga marcha ', ' Stephen King', 'Un centenar de chicos adolescentes participan en una marcha anual llamada \"La larga marcha\", que es un \"deporte nacional.\" Cada Caminante debe mantener una velocidad de al menos 6\'5 kilómetros por hora; si cae por debajo de esa velocidad durante 30 segund', null, '1', '20', null, 'imagenes/home/lalargamarcha.jpeg', '0', '2017-12-11', '1', '1'), ('5', 'Cell', ' Stephen King', 'Clayton Riddell es un escritor de historietas de Maine que por fin ve una oportunidad de ayudar a su familia cuando recibe un contrato para publicar su novela gráfica ”El Caminante Oscuro”. Mientras está comprando un helado el día 1 de octubre, algo extra', null, '1', '25', null, 'imagenes/home/cell.jpeg', '0', '2017-12-11', '1', '1'), ('6', 'La niebla', ' Stephen King', 'La mañana después de una violenta tormenta eléctrica, una niebla espesa se propaga rápidamente por la pequeña ciudad de Bridgton, Maine, reduciendo la visibilidad y provocando la aparición de numerosas criaturas ocultas que atacan a cualquier persona que ', null, '1', '30', null, 'imagenes/home/laniebla.jpg', '0', '2017-12-11', '1', '1'), ('7', 'Cementerio de animales', ' Stephen King', 'Louis Creed, un buen médico se instala en una hermosa casa en Ludlow (Maine) junto con su familia. Al llegar al lugar donde se encuentra la residencia conoce a Jud Crandall, un viejo y amable vecino de los Creed y de esta manera terminan enlazando una ami', null, '1', '35', null, 'imagenes/home/cementeriodeanimales.jpg', '0', '2017-12-11', '1', '1'), ('8', 'Carrie', ' Stephen King', 'Esta novela fue la cuarta escrita por Stephen King, pero fue la primera en publicarse. La escribió mientras vivía en un remolque en Hermon, Maine, en la máquina de escribir portátil de su esposa, Tabitha. Comenzó siendo una historia corta para la revista ', null, '1', '40', null, 'imagenes/home/carrie.jpg', '0', '2017-12-11', '1', '1'), ('9', 'Carrie', ' Stephen King', 'Esta novela fue la cuarta escrita por Stephen King, pero fue la primera en publicarse. La escribió mientras vivía en un remolque en Hermon, Maine, en la máquina de escribir portátil de su esposa, Tabitha. Comenzó siendo una historia corta para la revista ', null, '1', '45', null, 'imagenes/home/carrie.jpg', '0', '2017-12-11', '1', '1'), ('10', 'Carrie', ' Stephen King', 'Esta novela fue la cuarta escrita por Stephen King, pero fue la primera en publicarse. La escribió mientras vivía en un remolque en Hermon, Maine, en la máquina de escribir portátil de su esposa, Tabitha. Comenzó siendo una historia corta para la revista ', null, '1', '50', null, 'imagenes/home/carrie.jpg', '0', '2017-12-11', '1', '1'), ('11', 'la prueba', ' Stephen King', 'Clayton Riddell es un escritor de historietas de Maine que por fin ve una oportunidad de ayudar a su familia cuando recibe un contrato para publicar su novela gráfica ”El Caminante Oscuro”. Mientras está comprando un helado el día 1 de octubre, algo extra', null, '1', '25', null, 'imagenes/home/cell.jpeg', '0', '2017-12-11', '1', '1'), ('18', 'prueba nombre', 'prueba autor', 'prueba resumen', 'prueba descripcion', '2', '50', null, 'https://www.petdarling.com/articulos/wp-content/uploads/2014/11/eliminar-pis-de-gato.jpg', '1', null, '1', '1'), ('19', 'dasdsa', 'dasd', 'dasd', 'dasdsa', '2', '40', null, 'https://vignette.wik', '1', null, '1', '1');
COMMIT;

-- ----------------------------
--  Table structure for `notas`
-- ----------------------------
DROP TABLE IF EXISTS `notas`;
CREATE TABLE `notas` (
  `idNotas` int(11) NOT NULL AUTO_INCREMENT,
  `idPersona` int(11) DEFAULT NULL,
  `1B` int(11) DEFAULT NULL,
  `2B` int(11) DEFAULT NULL,
  `3B` int(11) DEFAULT NULL,
  `4B` int(11) DEFAULT NULL,
  `notaFinal` int(11) DEFAULT NULL,
  PRIMARY KEY (`idNotas`),
  KEY `idPersona` (`idPersona`),
  CONSTRAINT `pkidPersona` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `notas`
-- ----------------------------
BEGIN;
INSERT INTO `notas` VALUES ('1', '3', '31', '32', '33', '34', '33'), ('2', '1', '20', '12', '13', '14', '13'), ('3', '2', '70', '70', '70', '0', '35');
COMMIT;

-- ----------------------------
--  Table structure for `paises`
-- ----------------------------
DROP TABLE IF EXISTS `paises`;
CREATE TABLE `paises` (
  `idPais` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombrePais` varchar(255) DEFAULT NULL,
  `activo` int(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`idPais`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `paises`
-- ----------------------------
BEGIN;
INSERT INTO `paises` VALUES ('1', 'Chile', '1'), ('2', 'Perú', '1'), ('3', 'Bolivia', '1'), ('4', 'Argentina', '0'), ('5', 'Brazil', '1'), ('6', 'España', '1');
COMMIT;

-- ----------------------------
--  Table structure for `persona`
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `appaterno` varchar(30) DEFAULT NULL,
  `apmaterno` varchar(30) DEFAULT NULL,
  `idPais` int(11) DEFAULT NULL,
  `idCiudad` varchar(255) DEFAULT NULL,
  `fecnac` date DEFAULT NULL,
  PRIMARY KEY (`idPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `persona`
-- ----------------------------
BEGIN;
INSERT INTO `persona` VALUES ('1', 'Winston', 'Bravo', 'Anoni', '1', '1', '1992-01-05'), ('2', 'Cinthia', 'Roa', 'Vargas', '1', '1', '1990-12-07'), ('3', 'Usuario', 'Usuario P', 'Usuario M', '2', '6', '1992-01-05'), ('4', 'Invitado', 'Invitado P', 'Invitado M', '2', '7', '1992-01-05'), ('5', 'prueba5', 'paterno 5', 'materno 5', '1', '2', '2017-10-04'), ('7', 'prueba 7.1', 'paterno 7.1', 'materno 7.1', '1', '5', '2017-10-10'), ('8', 'prueba 8', 'paterno 8', 'materno 8', '1', '5', '2017-09-27'), ('34', 'qwe', 'qwe', 'ewq', '1', '3', '2017-11-06'), ('35', 'Pruebanuev', 'Pruebanuev', 'Prueba', '1', '3', '2017-11-19'), ('36', 'qwe', 'asd', 'asd', '1', '3', '2017-11-08'), ('37', 'das', 'dasdas', 'dasdas', '1', '3', '2017-11-09'), ('38', 'prueba1000', 'prueba1000', 'prueba1000', '2', '7', '2017-11-27'), ('39', 'dasd', 'das', 'das', '1', '1', '2018-01-02'), ('40', null, null, null, null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for `usuario`
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(50) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `idPersona` int(11) DEFAULT NULL,
  `tipo` int(1) DEFAULT NULL,
  `fechaIngreso` datetime DEFAULT NULL,
  `fechaActualizacion` datetime DEFAULT NULL,
  `intentos` int(11) unsigned DEFAULT '0',
  `activo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `idPersona` (`idPersona`),
  CONSTRAINT `FK_idPersona` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `usuario`
-- ----------------------------
BEGIN;
INSERT INTO `usuario` VALUES ('1', 'wbravoanoni@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1', '1', '2017-10-13 23:48:52', '2017-11-01 00:41:47', '0', '1'), ('2', 'cinthia.roa90@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2', '3', '2017-12-13 23:48:56', '2017-11-01 19:53:50', '0', '1'), ('3', 'usuario@prueba.cl', '7c4a8d09ca3762af61e59520943dc26494f8941b', '3', '3', '2017-08-13 23:49:03', null, '0', '1'), ('4', 'invitado@prueba.cl', '7c4a8d09ca3762af61e59520943dc26494f8941b', '4', '4', '2017-09-13 23:49:10', '2017-10-28 18:59:10', '0', '0'), ('5', 'prueba5@prueba.cl', 'prueba5', '5', '2', '2017-10-28 17:34:50', null, '0', '1'), ('7', 'prueba7@prueba.cl', 'prueba 7', '7', '3', '2017-10-28 17:36:37', '2017-10-28 17:37:46', '0', '1'), ('8', 'prueba8@prueba.cl', 'prueba8', '8', '1', '2017-10-28 17:41:05', '2017-10-28 17:41:23', '0', '1'), ('38', 'prueba1000@prueba.cl', 'Wb123123', '38', '3', '2017-11-19 18:27:28', null, '0', '1'), ('39', 'prueba@prueba.cl', 'Wb123456', '39', '3', '2018-01-21 03:04:52', null, '0', '1'), ('40', null, null, '40', null, '2018-01-22 21:56:44', null, '0', null);
COMMIT;

-- ----------------------------
--  Table structure for `zz_history_login`
-- ----------------------------
DROP TABLE IF EXISTS `zz_history_login`;
CREATE TABLE `zz_history_login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `platform` varchar(50) DEFAULT NULL,
  `browser` varchar(50) DEFAULT NULL,
  `version` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_robot` binary(1) DEFAULT NULL,
  `is_mobile` binary(1) DEFAULT NULL,
  `agent_string` varchar(150) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `zz_history_login`
-- ----------------------------
BEGIN;
INSERT INTO `zz_history_login` VALUES ('1', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-06 00:18:27'), ('2', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-06 00:18:44'), ('3', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-06 00:20:49'), ('4', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-06 00:20:58'), ('5', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-06 00:21:40'), ('6', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-06 02:39:41'), ('7', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-06 02:53:02'), ('8', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-06 12:04:26'), ('9', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-06 12:25:24'), ('10', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-06 12:26:29'), ('11', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-06 18:35:21'), ('12', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-07 00:21:49'), ('13', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-07 00:22:57'), ('14', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-07 00:24:36'), ('15', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-07 13:04:41'), ('16', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-07 13:37:16'), ('17', '3', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-07 13:50:12'), ('18', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-07 16:30:07'), ('19', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-07 16:31:12'), ('20', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-07 16:49:24'), ('21', '2', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-07 17:04:03'), ('22', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-07 17:06:02'), ('23', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-09 22:14:20'), ('24', '3', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-09 23:12:04'), ('25', '3', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '::1', '2017-10-09 23:12:51'), ('26', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-11 23:33:17'), ('27', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-11 23:35:48'), ('28', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-13 21:27:41'), ('29', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-13 21:37:17'), ('30', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-13 21:39:41'), ('31', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-13 21:40:27'), ('32', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-13 21:49:14'), ('33', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-13 22:13:33'), ('34', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-13 22:27:32'), ('35', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-13 22:28:59'), ('36', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-13 22:38:18'), ('37', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-13 22:43:27'), ('38', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-13 22:52:25'), ('39', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-13 22:52:53'), ('40', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-13 23:03:46'), ('41', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-13 23:04:14'), ('42', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-13 23:06:34'), ('43', '2', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-13 23:19:38'), ('44', '3', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-13 23:40:45'), ('45', '4', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-13 23:41:59'), ('46', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-13 23:43:52'), ('47', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-14 00:37:53'), ('48', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-14 00:38:47'), ('49', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-14 20:03:48'), ('50', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-14 20:51:10'), ('51', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-14 21:03:15'), ('52', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-14 22:58:47'), ('53', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-14 23:03:49'), ('54', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-14 23:07:24'), ('55', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-15 14:08:44'), ('56', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-15 22:03:50'), ('57', '1', 'Mac OS X', 'Firefox', '56.0', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:56.0) Gecko/20100101 Firefox/56.0', '127.0.0.1', '2017-10-21 00:00:24'), ('58', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-21 00:01:35'), ('59', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-21 11:23:01'), ('60', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-21 16:24:51'), ('61', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-21 16:30:27'), ('62', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-21 16:55:01'), ('63', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-21 17:02:10'), ('64', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-21 22:28:19'), ('65', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-21 22:47:06'), ('66', '2', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-21 22:57:43'), ('67', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-21 23:26:15'), ('68', '2', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-21 23:26:38'), ('69', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-21 23:29:44'), ('70', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-22 19:20:54'), ('71', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-27 16:51:50'), ('72', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-27 17:12:36'), ('73', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-27 17:46:46'), ('74', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-27 23:47:45'), ('75', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-27 23:52:37'), ('76', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-28 17:28:50'), ('77', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-28 19:19:34'), ('78', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-28 22:07:03'), ('79', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-28 22:27:32'), ('80', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-29 16:35:02'), ('81', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-10-31 22:19:50'), ('82', '2', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-01 00:29:19'), ('83', '2', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-01 00:29:43'), ('84', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-01 00:34:16'), ('85', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-01 13:53:00'), ('86', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-01 14:11:30'), ('87', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-01 14:14:57'), ('88', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-01 14:19:20'), ('89', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-01 15:51:16'), ('90', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-01 16:10:25'), ('91', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-01 16:30:20'), ('92', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-01 16:34:30'), ('93', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-01 16:36:33'), ('94', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-01 18:33:13'), ('95', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-01 19:13:59'), ('96', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-04 23:15:55'), ('97', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-05 12:17:16'), ('98', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-05 17:19:42'), ('99', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-05 17:52:43'), ('100', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-05 23:59:27'), ('101', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-06 00:18:19'), ('102', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-06 00:34:38'), ('103', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-06 00:35:36'), ('104', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-06 10:21:18'), ('105', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-06 11:04:08'), ('106', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-06 17:33:47'), ('107', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-06 17:42:34'), ('108', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-06 17:45:29'), ('109', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-06 21:05:44'), ('110', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-06 21:10:44'), ('111', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-06 21:13:17'), ('112', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-06 21:17:58'), ('113', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-06 21:20:46'), ('114', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-06 21:24:27'), ('115', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-06 21:26:37'), ('116', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-19 11:53:06'), ('117', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-19 12:25:07'), ('118', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-19 14:55:17'), ('119', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-19 14:57:01'), ('120', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-19 17:16:16'), ('121', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-11-19 22:20:54'), ('122', '1', 'Mac OS X', 'Chrome', '59.0.3071.86', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', '127.0.0.1', '2017-12-04 18:30:50'), ('123', '1', 'Mac OS X', 'Chrome', '63.0.3239.84', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', '127.0.0.1', '2017-12-24 22:03:27'), ('124', '1', 'Mac OS X', 'Chrome', '63.0.3239.132', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '127.0.0.1', '2018-01-21 02:42:07'), ('125', '1', 'Mac OS X', 'Chrome', '63.0.3239.132', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '127.0.0.1', '2018-01-21 21:31:32'), ('126', '1', 'Mac OS X', 'Chrome', '63.0.3239.132', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '127.0.0.1', '2018-01-22 00:54:43'), ('127', '1', 'Mac OS X', 'Chrome', '63.0.3239.132', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '127.0.0.1', '2018-01-22 20:06:33'), ('128', '1', 'Mac OS X', 'Chrome', '63.0.3239.132', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '127.0.0.1', '2018-01-22 20:23:04'), ('129', '1', 'Mac OS X', 'Chrome', '63.0.3239.132', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '127.0.0.1', '2018-01-22 22:03:24'), ('130', '1', 'Mac OS X', 'Chrome', '63.0.3239.132', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '127.0.0.1', '2018-01-22 22:06:43'), ('131', '1', 'Mac OS X', 'Chrome', '63.0.3239.132', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '127.0.0.1', '2018-01-22 23:13:51'), ('132', '1', 'Mac OS X', 'Chrome', '63.0.3239.132', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '127.0.0.1', '2018-01-22 23:31:12'), ('133', '1', 'Mac OS X', 'Chrome', '63.0.3239.132', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '127.0.0.1', '2018-01-22 23:36:12'), ('134', '1', 'Mac OS X', 'Chrome', '63.0.3239.132', 0x30, 0x30, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '127.0.0.1', '2018-01-26 23:35:31');
COMMIT;

-- ----------------------------
--  Table structure for `zz_login_tipo`
-- ----------------------------
DROP TABLE IF EXISTS `zz_login_tipo`;
CREATE TABLE `zz_login_tipo` (
  `idLogin` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`idLogin`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `zz_login_tipo`
-- ----------------------------
BEGIN;
INSERT INTO `zz_login_tipo` VALUES ('1', 'Maestro', '1'), ('2', 'Administrador', '1'), ('3', 'Usuario', '1'), ('4', 'Invitado', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
