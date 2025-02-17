-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 17-02-2025 a las 15:11:02
-- Versión del servidor: 10.5.18-MariaDB-1:10.5.18+maria~ubu2004
-- Versión de PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `EMMS25`
--
CREATE DATABASE IF NOT EXISTS `EMMS25` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `EMMS25`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `google_oauth`
--

CREATE TABLE IF NOT EXISTS `google_oauth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provider` varchar(255) NOT NULL,
  `provider_value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_errors`
--

CREATE TABLE IF NOT EXISTS `log_errors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(150) NOT NULL,
  `function_name` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=223 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registered`
--

CREATE TABLE IF NOT EXISTS `registered` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `register` varchar(50) NOT NULL,
  `phase` varchar(150) NOT NULL,
  `email` varchar(250) NOT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `phone` varchar(300) DEFAULT NULL,
  `company` varchar(300) DEFAULT NULL,
  `jobPosition` varchar(150) DEFAULT NULL,
  `ecommerce` tinyint(1) NOT NULL DEFAULT 1,
  `ecommerce-vip` tinyint(1) NOT NULL DEFAULT 0,
  `digital-trends` tinyint(1) NOT NULL DEFAULT 0,
  `digital-trends-vip` tinyint(1) NOT NULL DEFAULT 0,
  `source_utm` text DEFAULT NULL,
  `medium_utm` text DEFAULT NULL,
  `campaign_utm` text DEFAULT NULL,
  `content_utm` text DEFAULT NULL,
  `term_utm` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1764 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings_during_days`
--

CREATE TABLE IF NOT EXISTS `settings_during_days` (
  `day` int(11) NOT NULL,
  `live` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings_phase`
--

CREATE TABLE IF NOT EXISTS `settings_phase` (
  `event` varchar(255) NOT NULL,
  `pre` tinyint(4) NOT NULL,
  `during` tinyint(4) NOT NULL,
  `post` tinyint(4) NOT NULL,
  `transition` varchar(255) NOT NULL,
  `transmission` varchar(255) NOT NULL DEFAULT 'youtube',
  PRIMARY KEY (`event`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `settings_phase`
--

INSERT INTO `settings_phase` (`event`, `pre`, `during`, `post`, `transition`, `transmission`) VALUES
('digital-trends24', 0, 0, 1, 'live-off', 'youtube'),
('ecommerce25', 0, 0, 1, 'live-off', 'youtube');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `speakers`
--

CREATE TABLE IF NOT EXISTS `speakers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(255) NOT NULL DEFAULT 'ecommerce',
  `exposes` varchar(255) NOT NULL DEFAULT 'conference',
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt_image` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `sm_twitter` varchar(255) DEFAULT NULL,
  `sm_linkedin` varchar(255) DEFAULT NULL,
  `sm_instagram` varchar(255) DEFAULT NULL,
  `sm_facebook` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `bio` text NOT NULL,
  `image_company` varchar(255) NOT NULL,
  `alt_image_company` varchar(255) NOT NULL,
  `time` varchar(255) DEFAULT NULL,
  `link_time` varchar(500) DEFAULT NULL,
  `orden` varchar(255) DEFAULT NULL,
  `day` varchar(1) DEFAULT NULL,
  `youtube` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `slug` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `meta_title` varchar(350) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `meta_image` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `meta_twitter` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `speakers`
--

INSERT INTO `speakers` (`id`, `event`, `exposes`, `name`, `image`, `alt_image`, `job`, `sm_twitter`, `sm_linkedin`, `sm_instagram`, `sm_facebook`, `title`, `description`, `bio`, `image_company`, `alt_image_company`, `time`, `link_time`, `orden`, `day`, `youtube`, `slug`, `status`, `meta_title`, `meta_description`, `meta_image`, `meta_twitter`) VALUES
(1, 'digital-trends', 'conference', 'José A. Robles', 'jose-robles-agenda.png', 'José A. Robles', 'Consultor SEO y Director del Máster SEO de DinoRank', 'https://twitter.com/joserobles_Seo ', 'https://www.linkedin.com/in/jose-antonio-robles-lozano/', '', '', 'sss', 'SEO para eCommerce: aumenta el tráfico y vende más gracias a la arquitectura web', 'Consultor SEO, experto en el análisis de palabras clave, la optimización de contenidos y la mejora de la experiencia del usuario en sitios web de comercio electrónico. Director del Máster SEO de DinoRank.', 'dinorank-agenda.png', 'Dinorank', '', '', '6', '1', '', 'dinorank', NULL, '', '', '', ''),
(2, 'digital-trends', 'conference', 'José Ramón Padrón', 'joseramon-padron-agenda.png', 'Siteground', 'Country Manager en SiteGround', 'http://twitter.com/monchomad', 'https://www.linkedin.com/in/joseramonpadrongarcia/', '', '', 'ghfgh', 'Mejora tus ventas gracias a la experiencia de usuario', 'Country Manager en SiteGround. Co-organizador de la Meetup WordPress y la WordCamp de Las Palmas de Gran Canaria y Global Lead de WordCamp Europe Online. Experto en Hosting y Open Source.', 'siteground-agenda.png', 'Siteground', '', '', '50', '1', '', 'siteground', NULL, '', '', '', ''),
(3, 'digital-trends', 'conference', 'Miguel Estevan', 'miguel-estevan-agenda.png', 'Miguel Estevan', 'CEO en Ecommerce Nights', 'https://mobile.twitter.com/mestevan', 'https://www.linkedin.com/in/mestevan?originalSubdomain=pa', 'https://www.instagram.com/mestevan/?hl=es', '', 'ghghgh', 'A confirmar', 'Fundador de eCommerce Nights, hotSale y Wandoo. Profesor y Coordinador del Diplomado en Comercio Electrónico en la Universidad Latina de Panamá. Head of Ecommerce en Empresa Panameña de Alimentos.', 'ecommerce-nighst-agenda.png', 'ecommerce nights', '', '', '70', '1', '', 'ecommercenights', NULL, '', '', '', ''),
(4, 'digital-trends', 'conference', 'Federico Muñoz Villavicencio', 'federico-villavicencio-agenda.png', 'Federico Villavicencia - Meta', 'Client Solutions Manager en Meta', '', 'https://www.linkedin.com/in/federicomuvi/', '', '', 'sss', 'Campañas inteligentes y Advantage+ Shopping Campaigns para tu Ecommerce', 'Experto en marketing digital especializado en venta consultiva para anunciantes de performance con experiencia en Fintech y eCommerce (DTC/Marketplaces).', 'meta-agenda.png', 'Meta', '', '', '20', '1', '', 'meta', NULL, '', '', '', ''),
(5, 'digital-trends', 'conference', 'Manuel García Cuerva', 'manuel-garcia-cuerva-agenda.png', 'Manuel García Cuerva - VTEX', 'Head Global VTEX Profit Pools en VTEX', '', 'https://www.linkedin.com/in/manuatbetamod/', '', '', 'sss', 'Social Selling: qué es lo que aprendimos y qué se viene', 'Manuel García Cuerva es un emprendedor y experto en tecnología con más de 20 años de experiencia en la industria del comercio electrónico. Antes de unirse a VTEX como Head of Live Shopping, fundó y dirigió varias empresas exitosas.', 'vtex-agenda.png', 'VTEX', '', '', '40', '1', '', 'manuelgarcíacuerva', NULL, '', '', '', ''),
(6, 'digital-trends', 'conference', 'Ricardo Tayar', 'ricardo-tayar-agenda.png', 'Ricardo Tayar', 'CEO y Fundador de Flat 101', '', 'https://es.linkedin.com/in/ricardotayar', '', '', 'sss', 'CRO en E-commerce: best practices para mejorar la conversión', 'Fundador y CEO de Flat 101, agencia de marketing digital lider en estrategias de conversión y experiencia de usuario. Con más de 20 años de experiencia en la industria, es además autor de varios libros sobre marketing digital y UX.', 'flat101-agenda.png', 'Flat 101', '', '', '30', '1', '', 'ricardotayar', NULL, '', '', '', ''),
(7, 'digital-trends', 'conference', 'Ana Ivars', 'ana-ivars-agenda.png', 'Ana Ivars', ' Founder & CEO en Dinamiza Digital ', 'https://mobile.twitter.com/AnaIvarsParcero/status/1641388231106101248', 'https://www.linkedin.com/in/anaivarsparcero/', 'https://www.instagram.com/ana.ivars/?hl=es', '', 'ssss', 'A confirmar', 'Consultora, Formadora y Speaker | CEO en Agencia Dinamiza Digital | Forbes Business Council Official Member 2023♟ Ayuda a empresas y profesionales a vender más desde la estrategia digital y publicidad online.', 'anaivars-agenda.png', 'Ana Ivars', '', '', '10', '1', '', 'anaivars', NULL, '', '', '', ''),
(8, 'digital-trends', 'interview', 'pedrito', 'siteground.png', 'harold', 'home office', 'dfdf', '', '', '', 'pepito', 'pedrito clavara un clavito en vivo', 'pedrito clavara un clavito en vivo', 'siteground.png', 'pedrito clavara un clavito en vivo', '', '', '', '2', 'https://www.youtube.com/watch?v=m25Kkj9M9v8&ab_channel=FromDoppler', 'pedrito clavara un clavito en vivo', NULL, '', '', '', ''),
(9, 'digital-trends', 'conference', 'matias', 'neilpatel.png', 'harold', 'home office', 'dfdf', '', '', '', 'dsfgsdfsdf', 'dgjdjfgjgj', 'yhertyrtyertyrty', 'neilpatel.png', 'retyrtyrety', '', '', '', '2', '', 'rtyrtyrtyrtyrty', NULL, '', '', '', ''),
(10, 'digital-trends', 'conference', 'amtias', 'woo.png', '', '', '', '', '', '', 'yhedhdfh', 'ddfghdfgdfg', '', '', '', '', '', '', '3', '', '', NULL, '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sponsors`
--

CREATE TABLE IF NOT EXISTS `sponsors` (
  `sponsor_id` int(11) NOT NULL AUTO_INCREMENT,
  `sponsor_type` enum('SPONSOR','PREMIUM','STARTER') DEFAULT NULL,
  `name_company` varchar(255) NOT NULL,
  `logo_company` varchar(255) DEFAULT NULL,
  `alt_logo_company` varchar(255) NOT NULL,
  `link_site` varchar(255) DEFAULT NULL,
  `priority_home` varchar(255) DEFAULT NULL,
  `conference_name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `description_card` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `visible_card` tinyint(1) NOT NULL DEFAULT 0,
  `priority_card` varchar(255) DEFAULT NULL,
  `image_landing` varchar(255) DEFAULT NULL,
  `alt_image_landing` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `image_youtube` varchar(255) DEFAULT NULL,
  `alt_image_youtube` varchar(255) DEFAULT NULL,
  `title_magnet` text DEFAULT NULL,
  `description_magnet` text DEFAULT NULL,
  `link_magnet` varchar(255) DEFAULT NULL,
  `title_promo_company` text DEFAULT NULL,
  `description_promo_company` text DEFAULT NULL,
  `link_promo_company` varchar(255) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`sponsor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sponsors`
--

INSERT INTO `sponsors` (`sponsor_id`, `sponsor_type`, `name_company`, `logo_company`, `alt_logo_company`, `link_site`, `priority_home`, `conference_name`, `title`, `description`, `description_card`, `slug`, `visible_card`, `priority_card`, `image_landing`, `alt_image_landing`, `youtube`, `image_youtube`, `alt_image_youtube`, `title_magnet`, `description_magnet`, `link_magnet`, `title_promo_company`, `description_promo_company`, `link_promo_company`, `status`) VALUES
(1, 'STARTER', 'China Rodriguez', '20230317T122856277Z710679.png', 'China Rodriguez', NULL, '1', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(2, 'STARTER', 'Ultravioleta', '20230317T122926188Z978476.png', 'Ultravioleta', NULL, '20', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(3, 'STARTER', 'Infonegocios', '20230317T122954107Z502796.png', 'Infonegocios', NULL, '30', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(4, 'SPONSOR', 'Sitgrouund', '', 'Sitegrouund', 'https://www.siteground.es/?utm_medium=link&utm_source=event&utm_campaign=EMMS23', '1', 'Estrategias de WPO y UX para tu E-commerce ', 'Cómo escoger un hosting para tu E-commerce', 'Elegir el proveedor de servicio más adecuado para tu tienda online, implica un análisis mucho más exhaustivo que el que harías para una web personal. Hay factores adicionales que deberás considerar. Descubre los aspectos que debes tener en cuenta para acertar en tu decisión. ', 'Descubre cómo elegir el hosting para tu E-commerce para asegurarte un rendimiento óptimo. ', 'siteground', 1, '1', '', 'Marketing de contenidos para tu E-commerce', 's-6M309Yl5I', '', 'Marketing de contenidos para tu E-commerce', 'eBook de Marketing de Contenidos', 'El Marketing de contenidos ha demostrado ser eficaz para aumentar visitas web, generar más clientes potenciales que la publicidad pagada, conseguir mayores tasas de conversión, mejorar el posicionamiento SEO y establecer relaciones con los clientes y aumentar la lealtad hacia la marca. Descubre cómo aplicarlo en tu estrategia digital. ', 'https://www.siteground.es/ebook-marketing-contenidos?utm_medium=link&utm_source=landing&utm_campaign=EMMS_Doppler', 'SiteGround', 'SiteGround es una empresa líder en hosting web reconocida internacionalmente por su enfoque en la tecnología. Centrándose en la velocidad web, la seguridad y un servicio al cliente sin igual, las herramientas creadas por SiteGround te protegen de posibles ataques y pueden hacer que tu web sea 100 veces más rápida.', 'pedro', '1'),
(5, 'SPONSOR', 'DinoRANK', '20230331T142247249Z570898.png', 'DinoRANK', 'https://dinorank.com/?utm_campaign=emms-ecommerce', '2', 'SEO para E-commerce: La importancia de la intención de búsqueda en 2023', 'Estrategia SEO para eCommerce', 'No todas las personas que están buscando “zapatillas” en internet están pensando en comprar. Por eso, no tiene sentido atacar todas las keywords que se te ocurran. Muchas no van a generar ventas y, las que generan ventas, van a estar “ocupadas” por los gigantes del comercio online. Entonces, ¿qué puedes hacer tú? Te lo explicamos en este vídeo.\nDescubre todo lo que tienes que saber para controlar al máximo esta estrategia y aparecer entre las primeras posiciones cuando tus potenciales clientes utilizan un buscador. ', 'Descubre cómo controlar al máximo la estrategia de intención de búsqueda de tus potenciales clientes para aparecer entre las primeras posiciones en buscadores. ', 'dinorank', 1, '2', '20230331T142247249Z201753.png', 'Estratgias para Intención de búsqueda', 'BWN-ICTw83Q', '20230330T102247464Z357297.png', 'Estratgias para Intención de búsqueda', 'Curso gratis: Multiplica las visitas de tu eCommerce', 'Descubre paso a paso la estrategia para aparecer en las búsquedas de los usuarios que desean comprar los productos que vendes y planta cara a otros gigantes del comercio online como AliExpress, Zara o Leroy Merlín entre otros. Aunque seas un eCommerce pequeño o mediano.', 'https://dinorank.com/blog/curso-gratis-ecommerce/?utm_campaign=emms-ecommerce', 'Prueba DinoRANK con un 50% de descuento', 'Imagina que alguien te dijera cómo mejorar tus contenidos para posicionar más alto, o cómo organizar tu eCommerce para enamorar a Google. Imagina encontrar keywords que no posiciona tu competencia, o saber cómo busca tu usuario en internet. Imagina multiplicar x2 tu tráfico.', 'https://dinorank.com/registro/?utm_campaign=emms-ecommerce&codPromo=ecodino', '1'),
(6, 'STARTER', 'Luis Maram', '20230329T111618059Z736116.png', 'Luis Maram', NULL, '40', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(7, 'STARTER', 'Mkt digital experience', '20230329T111651394Z339517.png', 'Marketing digital experience', NULL, '50', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(8, 'STARTER', 'Club de las Emprndedoras', '20230329T111710257Z090204.png', 'Club de las Emprndedoras', NULL, '60', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(9, 'STARTER', 'Ignacio Santiago', '20230329T111731344Z455405.png', 'Ignacio Santiago', NULL, '70', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(10, 'STARTER', 'Epico', '20230329T111747496Z898195.png', 'Epico', NULL, '80', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(11, 'STARTER', 'Micaela Sabja', '20230331T084320642Z732877.png', 'Micaela Sabja', NULL, '90', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(12, 'STARTER', 'MIMEC', '20230331T084414063Z501057.png', 'MIMEC', NULL, '100', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(13, 'STARTER', 'Cámara Argentina de Fintech', '20230331T084443405Z219766.png', 'Cámara Argentina de Fintech', NULL, '110', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(14, 'STARTER', 'Cámara dee Comercio de Córdoba', '20230331T084514301Z535073.png', 'Cámara dee Comercio de Córdoba', NULL, '120', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(15, 'STARTER', 'Growby', '20230331T084538115Z587466.png', 'Growby', NULL, '130', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(16, 'STARTER', 'Del querer al hacer', '20230331T084559291Z231911.png', 'Del querer al hacer', NULL, '140', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(17, 'STARTER', 'IT Ahora', '20230331T084624476Z612615.png', 'IT Ahora', NULL, '150', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(18, 'STARTER', 'Emprendedores News', '20230331T084738367Z487749.png', 'Emprendedores News', NULL, '160', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(19, 'STARTER', 'Grandes Pymes', '20230331T085247285Z879670.png', 'Grandes Pymes', NULL, '170', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(20, 'STARTER', 'Mundo Contact', '20230331T085308334Z486520.png', 'Mundo Contact', NULL, '195', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(21, 'STARTER', 'Marketing al Día', '20230331T085328868Z516303.png', 'Marketing al Día', NULL, '200', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(22, 'STARTER', 'Bulb', '20230331T085352836Z665289.png', 'Bulb', NULL, '210', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(23, 'STARTER', 'Moni en la Web', '20230331T085411802Z765799.png', 'Moni en la Web', NULL, '220', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(24, 'STARTER', 'Mi Pyme no Para', '20230331T085442178Z436410.png', 'Mi Pyme no Para', NULL, '230', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(25, 'STARTER', 'Entre Emprenedores Workshop', '20230331T085507776Z867777.png', 'Entre Emprenedores Workshop', NULL, '240', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(26, 'STARTER', 'Disruptivo TV', '20230331T085528208Z709702.png', 'Disruptivo TV', NULL, '245', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(27, 'STARTER', 'Caro Siri', '20230331T085719765Z754128.png', 'Caro Siri', NULL, '250', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(28, 'STARTER', 'SED Emprendedor', '20230331T085736043Z513096.png', 'SED Emprendedor', NULL, '260', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(29, 'STARTER', 'AD Media Rock', '20230331T085811273Z535760.png', 'AD Media Rock', NULL, '270', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(30, 'STARTER', 'AMDAR', '20230331T085823850Z432089.png', 'AMDAR', NULL, '280', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(31, 'STARTER', 'We Connect', '20230331T085842074Z226329.png', 'We Connect', NULL, '300', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(32, 'STARTER', 'Flor Lamas', '20230331T085855731Z953447.png', 'Flor Lamas', NULL, '310', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(33, 'STARTER', 'Somos Branders OK', '20230331T085912200Z517799.png', 'Somos Branders OK', NULL, '320', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(34, 'STARTER', 'Power Hub', '20230331T090009023Z036658.png', 'Power Hub', NULL, '330', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(35, 'STARTER', 'Mamita Power', '20230331T090023070Z980079.png', 'Mamita Power', NULL, '340', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(36, 'SPONSOR', 'Raiola Networks', '20230414T131238131Z129591.png', 'Raiola Networks', 'https://raiolanetworks.es/', '0', '', '', '', '', '', 0, '', NULL, '', '', NULL, '', '', '', '', '', '', '', '1'),
(37, 'SPONSOR', 'Ecommerce Nights', '20230414T135912974Z369843.jpg', 'Ecommerce Nights', 'https://ecommercenights.com.pa/', '55', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(38, 'PREMIUM', 'China Rodriguez', '20230331T132012607Z101734.png', 'China Rodriguez', 'https://www.chinarodriguez.com/?v=5b61a1b298a0', '10', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(39, 'PREMIUM', 'Infonegocios', '20230331T132712231Z130779.png', 'Infonegocios', 'https://infonegocios.info/', '20', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(40, 'PREMIUM', 'Luis Maram', '20230403T081656888Z509960.png', 'Luis Maram', 'https://www.luismaram.com/', '30', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(41, 'PREMIUM', 'Mkt Digital Experience', '20230403T081812354Z569059.png', 'Marketing Digital Experience', 'https://marketingdigitalexperience.com/', '40', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(42, 'PREMIUM', 'El Club de las Emprendedoras', '20230403T081843858Z572614.png', 'El Club de las Emprendedoras', 'https://elclubdeemprendedoras.com/', '50', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(43, 'PREMIUM', 'Epico', '20230403T081913937Z583841.png', 'Epico', 'https://epico.gob.ec/', '60', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(44, 'PREMIUM', 'Angie Sanmartino', '20230403T081937841Z076140.png', 'Angie Sanmartino', 'https://angiesammartino.com.ar/', '70', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(45, 'PREMIUM', 'Consejo de la Comunicación', '20230403T082006630Z161594.png', 'Consejo de la Comunicación', 'https://cc.org.mx/', '80', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(46, 'PREMIUM', 'Sofia Alicio', '20230403T082033302Z221098.png', 'Sofia Alicio', 'https://sofiaalicio.com/', '90', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(47, 'PREMIUM', 'Mujeres que Emprenden', '20230403T082056564Z318990.png', 'Mujeres que Emprenden', 'https://aula.mujeresqueemprenden.com/', '100', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(48, 'PREMIUM', 'Digitalizadas', '20230403T082119139Z851342.png', 'Digitalizadas', 'https://digitalizadas.com.ar/', '110', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(49, 'PREMIUM', 'Entrer Emprendedores Workshop', '20230403T082142988Z265154.png', 'Entrer Emprendedores Workshop', 'https://www.entreemprendedores.com.ar/', '120', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(50, 'PREMIUM', 'Mai Pistiner', '20230403T082208468Z719956.png', 'Academia Mai Pistiner', 'https://www.maipistiner.com/', '140', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(51, 'PREMIUM', 'Interlat', '20230403T082234666Z839299.png', 'Interlat', 'https://interlat.co/', '150', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(52, 'STARTER', 'EUDE', '20230403T082307950Z115064.png', 'EUDE', NULL, '150', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(53, 'STARTER', 'Círculo Empresarial', '20230403T082454058Z907380.png', 'Círculo Empresarial', NULL, '160', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(54, 'STARTER', 'CEVEC', '20230403T082528464Z053843.png', 'CEVEC', NULL, '170', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(55, 'STARTER', 'El PUblicista', '20230403T082602950Z164011.png', 'El PUblicista', NULL, '170', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(56, 'STARTER', 'Soy Emprendedora', '20230403T082639158Z504938.png', 'Soy Emprendedora', NULL, '180', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(57, 'STARTER', 'Mujeres en Tecnología', '20230403T082713061Z595231.png', 'Mujeres en Tecnología', NULL, '190', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stripe_customers`
--

CREATE TABLE IF NOT EXISTS `stripe_customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `final_price` decimal(10,2) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_country` varchar(255) NOT NULL,
  `customer_tax` varchar(255) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `coupon_id` varchar(255) DEFAULT NULL,
  `coupon_name` varchar(255) DEFAULT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_phase` varchar(255) NOT NULL,
  `ticket_name` varchar(255) NOT NULL,
  `ticket_price_id` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscriptions_doppler`
--

CREATE TABLE IF NOT EXISTS `subscriptions_doppler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `list` varchar(50) NOT NULL,
  `register` varchar(50) NOT NULL,
  `form_id` varchar(50) NOT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `phone` varchar(300) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `company` varchar(300) DEFAULT NULL,
  `jobPosition` varchar(150) DEFAULT NULL,
  `ecommerce` tinyint(1) NOT NULL DEFAULT 1,
  `digital-trends` tinyint(1) NOT NULL DEFAULT 0,
  `ip` varchar(150) NOT NULL,
  `country_ip` varchar(150) NOT NULL,
  `privacy` tinyint(1) NOT NULL,
  `promotions` tinyint(1) DEFAULT NULL,
  `source_utm` text DEFAULT NULL,
  `medium_utm` text DEFAULT NULL,
  `campaign_utm` text DEFAULT NULL,
  `content_utm` text DEFAULT NULL,
  `term_utm` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1933 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscription_doppler_list_errors`
--

CREATE TABLE IF NOT EXISTS `subscription_doppler_list_errors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `list` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `error_code` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
