-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 26 août 2020 à 12:27
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `api_entissab`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`id`, `email`, `pass`) VALUES
(1, 'almor@gmail.com', '123456'),
(2, 'admin@gmail.com', 'admin'),
(3, 'client@gmail.com', '123456'),
(4, 'zsx@zsx.zsx', 'zsx'),
(5, 'ber@ber.ber', 'ber');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant_existed`
--

CREATE TABLE `etudiant_existed` (
  `id` int(11) NOT NULL,
  `massar` varchar(200) NOT NULL,
  `date_naiss` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant_existed`
--

INSERT INTO `etudiant_existed` (`id`, `massar`, `date_naiss`) VALUES
(1, 'd123456', '16/03/1994');

-- --------------------------------------------------------

--
-- Structure de la table `inscription_nv`
--

CREATE TABLE `inscription_nv` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `nom_fr` varchar(200) NOT NULL,
  `prenon_fr` varchar(200) NOT NULL,
  `nom_ar` varchar(200) CHARACTER SET utf8 NOT NULL,
  `prenom_ar` varchar(200) CHARACTER SET utf8 NOT NULL,
  `cin` varchar(200) NOT NULL,
  `massar` varchar(200) NOT NULL,
  `date_naiss` varchar(200) NOT NULL,
  `lieux_naiss` varchar(200) NOT NULL,
  `tel` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `adress` varchar(200) NOT NULL,
  `adress_ar` varchar(200) CHARACTER SET utf8 NOT NULL,
  `fct_pere` varchar(200) NOT NULL,
  `fct_mere` varchar(200) NOT NULL,
  `pays` varchar(200) NOT NULL,
  `annee_bac` varchar(200) NOT NULL,
  `serie_bac` varchar(200) NOT NULL,
  `montion_bac` varchar(200) NOT NULL,
  `img_bac` varchar(200) NOT NULL,
  `img_bac_v` varchar(200) NOT NULL,
  `img_cin` varchar(200) NOT NULL,
  `img_cin_v` varchar(200) NOT NULL,
  `img_relever` varchar(200) NOT NULL,
  `img_etudiant` varchar(200) NOT NULL,
  `img_entissab` varchar(200) NOT NULL,
  `terms` varchar(200) NOT NULL,
  `section` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscription_nv`
--

INSERT INTO `inscription_nv` (`id`, `id_account`, `nom_fr`, `prenon_fr`, `nom_ar`, `prenom_ar`, `cin`, `massar`, `date_naiss`, `lieux_naiss`, `tel`, `email`, `adress`, `adress_ar`, `fct_pere`, `fct_mere`, `pays`, `annee_bac`, `serie_bac`, `montion_bac`, `img_bac`, `img_bac_v`, `img_cin`, `img_cin_v`, `img_relever`, `img_etudiant`, `img_entissab`, `terms`, `section`) VALUES
(20, 1, 'qsd', 'qsd', 'ضسي', 'ضسي', 'qsd', 'qsd', '2020-08-27', 'qsd', '0645236521', 'admin2@gmail.com', 'qsd', 'ضسي', '55', '52', '110', '2008', '0049', 'Passable', 'qsd_qsd_2020-08-25.png', 'qsd_qsd_verso_2020-08-25.png', 'qsd_qsd_2020-08-25.png', 'qsd_qsd_verso_2020-08-25.png', 'qsd_qsd_2020-08-25.png', 'qsd_qsd_2020-08-25.png', 'qsd_qsd_2020-08-25.png', 'on', 'A');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `code` int(11) NOT NULL,
  `lib` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`code`, `lib`) VALUES
(224, 'MYANMAR'),
(540, 'SAMOA AMERICAINES'),
(538, 'SAINT SIEGE'),
(537, 'SAINT KITTS ET NEVIS'),
(248, 'QATAR'),
(249, 'BAHREIN'),
(225, 'BRUNEI'),
(226, 'SINGAPOUR'),
(227, 'MALAISIE'),
(229, 'MALDIVES'),
(230, 'HONG KONG'),
(231, 'INDONESIE'),
(232, 'MACAO'),
(234, 'CAMBODGE'),
(235, 'SRI LANKA'),
(236, 'TAIWAN'),
(238, 'COREE DU NORD'),
(239, 'COREE DU SUD'),
(240, 'KOWEIT'),
(241, 'LAOS'),
(242, 'MONGOLIE'),
(243, 'VIETNAM'),
(309, 'TANZANIE'),
(246, 'BANGLADESH'),
(247, 'EMIRATS ARABES UNIS'),
(331, 'BURKINA FASO'),
(310, 'ZIMBABWE'),
(250, 'OMAN'),
(251, 'YEMEN'),
(252, 'ARMENIE'),
(253, 'AZERBAIDJAN'),
(254, 'CHYPRE'),
(255, 'GEORGIE'),
(256, 'KAZAKHSTAN'),
(257, 'KIRGHISTAN'),
(258, 'OUZBEKISTAN'),
(259, 'TADJIKISTAN'),
(260, 'TURKMENISTAN'),
(261, 'PALESTINE'),
(301, 'EGYPTE'),
(302, 'LIBERIA'),
(303, 'AFRIQUE DU SUD'),
(304, 'GAMBIE'),
(306, 'STE HELENE'),
(330, 'GUINEE'),
(308, 'CHAGOS(ARCHIPEL)'),
(351, 'TUNISIE'),
(352, 'ALGERIE'),
(390, 'ILE MAURICE'),
(332, 'KENYA'),
(311, 'NAMIBIE'),
(312, 'ZAIRE'),
(314, 'GUINEE EQUATORIALE'),
(315, 'ETHIOPIE'),
(316, 'LIBYE'),
(317, 'ERYTHREE'),
(318, 'SOMALIE'),
(321, 'BURUNDI'),
(322, 'CAMEROUN'),
(323, 'CENTRAFRIQUE'),
(324, 'CONGO'),
(326, 'COTE D\'IVOIRE'),
(327, 'BENIN'),
(328, 'GABON'),
(329, 'GHANA'),
(350, 'MAROC'),
(409, 'GUATEMALA'),
(410, 'HAITI'),
(411, 'HONDURAS'),
(391, 'SWAZILAND'),
(333, 'MADAGASCAR'),
(334, 'MALAWI'),
(335, 'MALI'),
(336, 'MAURITANIE'),
(337, 'NIGER'),
(338, 'NIGERIA'),
(339, 'OUGANDA'),
(340, 'RWANDA'),
(341, 'SENEGAL'),
(342, 'SIERRA LEONE'),
(343, 'SOUDAN'),
(344, 'TCHAD'),
(345, 'TOGO'),
(346, 'ZAMBIE'),
(347, 'BOTSWANA'),
(348, 'LESOTHO'),
(408, 'SAINT DOMINGUE'),
(429, 'BELIZE'),
(431, 'ANTILLES NEERLANDAISES'),
(412, 'NICARAGUA'),
(432, 'PORTO RICO'),
(392, 'GUINEE BISSAU'),
(393, 'MOZAMBIQUE'),
(394, 'SAO TOME ET PRINCIPE'),
(395, 'ANGOLA'),
(396, 'CAP VERT'),
(397, 'COMORES'),
(398, 'SEYCHELLES'),
(399, 'DJIBOUTI'),
(401, 'CANADA'),
(404, 'ETATS UNIS'),
(405, 'MEXIQUE'),
(406, 'COSTA RICA'),
(407, 'CUBA'),
(428, 'GUYANE'),
(507, 'NAURU'),
(508, 'FIDJI'),
(509, 'TONGA OU FRIENDLY'),
(433, 'TRINITE ET TOBAGO'),
(413, 'PANAMA'),
(414, 'EL SALVADOR'),
(415, 'ARGENTINE'),
(416, 'BRESIL'),
(417, 'CHILI'),
(418, 'BOLIVIE'),
(419, 'COLOMBIE'),
(420, 'EQUATEUR'),
(421, 'PARAGUAY'),
(422, 'PEROU'),
(423, 'URUGUAY'),
(424, 'VENEZUELA'),
(426, 'JAMAIQUE'),
(427, 'ILES MALOUINES'),
(506, 'SAMOA OCCIDENTALES'),
(527, 'ILES VIERGES (ETATS UNIS)'),
(510, 'PAPOUASIE NOUVELLE GUINEE'),
(528, 'ILES VIERGES (ROYAUME UNIS)'),
(434, 'BARBADE'),
(435, 'GRENADE ETGRENADINES'),
(436, 'BAHAMAS'),
(437, 'SURINAM'),
(438, 'DOMINIQUE'),
(439, 'SAINTE LUCIE'),
(440, 'SAINT VINCENT'),
(441, 'ANTIGUA ET BARBUDA'),
(442, 'ST CHRISTOPHE NIEVES'),
(501, 'AUSTRALIE'),
(502, 'NOUVELLE ZELANDE'),
(505, 'ILES DU PACIFIQUE'),
(526, 'ILES COOK'),
(532, 'NIOUE'),
(533, 'NOUVELLE CALEDONIE'),
(535, 'POLYNESIE FRANCAISE'),
(990, 'AUTRES pays'),
(996, 'FRANCE'),
(529, 'LA REUNION'),
(511, 'TUVALU'),
(512, 'SALOMON'),
(513, 'KIRIBATI'),
(514, 'VANUATU'),
(515, 'ILE MARSHALL'),
(516, 'MICRONESIE'),
(517, 'REPUBLIQUE DES ILES PALAOS'),
(519, 'ARUBA'),
(521, 'BERMUDES'),
(522, 'GUADELOUPE'),
(523, 'GUAM'),
(524, 'GUYANA'),
(525, 'ILES CAIMAN'),
(530, 'MARTINIQUE'),
(156, 'EX REPUBLIQUE YOUGOSLAVE DE MACEDOINE I'),
(201, 'ARABIE SAOUDITE'),
(203, 'IRAK'),
(204, 'IRAN'),
(205, 'LIBAN'),
(206, 'SYRIE'),
(207, 'ISRAEL'),
(208, 'TURQUIE'),
(212, 'AFGHANISTAN'),
(213, 'PAKISTAN'),
(214, 'BHOUTAN'),
(155, 'UKRAINE'),
(215, 'NEPAL'),
(216, 'CHINE POPULAIRE'),
(217, 'JAPON'),
(219, 'THAILANDE'),
(220, 'PHILIPPINES'),
(222, 'JORDANIE'),
(151, 'MOLDAVIE'),
(223, 'INDE'),
(123, 'RUSSIE'),
(125, 'ALBANIE'),
(126, 'GRECE'),
(127, 'ITALIE'),
(128, 'SAINT MARIN'),
(129, 'VATICAN'),
(130, 'ANDORRE'),
(131, 'BELGIQUE'),
(132, 'GRANDE BRETAGNE'),
(133, 'GIBRALTAR'),
(134, 'ESPAGNE'),
(135, 'PAY BAS'),
(136, 'IRLANDE'),
(137, 'LUXEMBOURG'),
(138, 'MONACO'),
(139, 'PORTUGAL'),
(140, 'SUISSE'),
(122, 'POLOGNE'),
(144, 'MALTE'),
(145, 'SLOVENIE'),
(148, 'BIELORUSSIE'),
(101, 'DANEMARK'),
(102, 'ISLANDE'),
(103, 'NORVEGE'),
(104, 'SUEDE'),
(105, 'FINLANDE'),
(106, 'ESTONIE'),
(107, 'LETTONIE'),
(108, 'LITHUANIE'),
(109, 'ALLEMAGNE'),
(110, 'AUTRICHE'),
(100, 'EXFRANCE'),
(111, 'BULGARIE'),
(112, 'HONGRIE'),
(113, 'LIECHTENSTEIN'),
(114, 'ROUMANIE'),
(116, 'REPUBLIQUE TCHEQUE'),
(117, 'SLOVAQUIE'),
(118, 'BOSNIE HERZEGOVINE'),
(119, 'CROATIE'),
(121, 'YOUGOSLAVIE');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant_existed`
--
ALTER TABLE `etudiant_existed`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscription_nv`
--
ALTER TABLE `inscription_nv`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `etudiant_existed`
--
ALTER TABLE `etudiant_existed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `inscription_nv`
--
ALTER TABLE `inscription_nv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
