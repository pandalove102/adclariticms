-- ================================================================
--
-- @version $Id: structure.sql 2017-06-01 12:12:05 gewa $
-- @package CMS Pro
-- @copyright 2017. wojoscripts.com
--
-- ================================================================
-- Database Content
-- ================================================================
--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `username` varchar(80) DEFAULT NULL,
  `ip` varbinary(16) DEFAULT NULL,
  `failed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `failed_last` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `type` varchar(20) DEFAULT NULL,
  `message` varchar(150) DEFAULT NULL,
  `importance` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '1 yes, 0 =no',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `banlist`
--

DROP TABLE IF EXISTS `banlist`;
CREATE TABLE IF NOT EXISTS `banlist` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('IP','Email') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'IP',
  `comment` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ban_ip` (`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `uid` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `mid` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `cid` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `tax` decimal(13,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `totaltax` decimal(13,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `coupon` decimal(13,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `total` decimal(13,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `originalprice` decimal(13,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `totalprice` decimal(13,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `cart_id` varchar(100) DEFAULT NULL,
  `order_id` varchar(100) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`),
  KEY `idx_user` (`uid`),
  KEY `idx_membership` (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `abbr` varchar(2) NOT NULL,
  `name` varchar(70) NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `home` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `vat` decimal(13,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `sorting` smallint(6) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `abbrv` (`abbr`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` VALUES(1, 'AF', 'Afghanistan', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(2, 'AL', 'Albania', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(3, 'DZ', 'Algeria', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(4, 'AS', 'American Samoa', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(5, 'AD', 'Andorra', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(6, 'AO', 'Angola', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(7, 'AI', 'Anguilla', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(8, 'AQ', 'Antarctica', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(9, 'AG', 'Antigua and Barbuda', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(10, 'AR', 'Argentina', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(11, 'AM', 'Armenia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(12, 'AW', 'Aruba', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(13, 'AU', 'Australia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(14, 'AT', 'Austria', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(15, 'AZ', 'Azerbaijan', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(16, 'BS', 'Bahamas', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(17, 'BH', 'Bahrain', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(18, 'BD', 'Bangladesh', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(19, 'BB', 'Barbados', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(20, 'BY', 'Belarus', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(21, 'BE', 'Belgium', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(22, 'BZ', 'Belize', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(23, 'BJ', 'Benin', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(24, 'BM', 'Bermuda', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(25, 'BT', 'Bhutan', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(26, 'BO', 'Bolivia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(27, 'BA', 'Bosnia and Herzegowina', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(28, 'BW', 'Botswana', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(29, 'BV', 'Bouvet Island', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(30, 'BR', 'Brazil', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(31, 'IO', 'British Indian Ocean Territory', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(32, 'VG', 'British Virgin Islands', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(33, 'BN', 'Brunei Darussalam', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(34, 'BG', 'Bulgaria', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(35, 'BF', 'Burkina Faso', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(36, 'BI', 'Burundi', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(37, 'KH', 'Cambodia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(38, 'CM', 'Cameroon', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(39, 'CA', 'Canada', 1, 1, '13.00', 1000);
INSERT INTO `countries` VALUES(40, 'CV', 'Cape Verde', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(41, 'KY', 'Cayman Islands', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(42, 'CF', 'Central African Republic', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(43, 'TD', 'Chad', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(44, 'CL', 'Chile', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(45, 'CN', 'China', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(46, 'CX', 'Christmas Island', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(47, 'CC', 'Cocos (Keeling) Islands', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(48, 'CO', 'Colombia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(49, 'KM', 'Comoros', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(50, 'CG', 'Congo', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(51, 'CK', 'Cook Islands', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(52, 'CR', 'Costa Rica', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(53, 'CI', 'Cote D''ivoire', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(54, 'HR', 'Croatia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(55, 'CU', 'Cuba', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(56, 'CY', 'Cyprus', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(57, 'CZ', 'Czech Republic', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(58, 'DK', 'Denmark', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(59, 'DJ', 'Djibouti', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(60, 'DM', 'Dominica', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(61, 'DO', 'Dominican Republic', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(62, 'TP', 'East Timor', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(63, 'EC', 'Ecuador', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(64, 'EG', 'Egypt', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(65, 'SV', 'El Salvador', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(66, 'GQ', 'Equatorial Guinea', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(67, 'ER', 'Eritrea', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(68, 'EE', 'Estonia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(69, 'ET', 'Ethiopia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(70, 'FK', 'Falkland Islands (Malvinas)', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(71, 'FO', 'Faroe Islands', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(72, 'FJ', 'Fiji', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(73, 'FI', 'Finland', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(74, 'FR', 'France', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(75, 'GF', 'French Guiana', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(76, 'PF', 'French Polynesia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(77, 'TF', 'French Southern Territories', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(78, 'GA', 'Gabon', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(79, 'GM', 'Gambia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(80, 'GE', 'Georgia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(81, 'DE', 'Germany', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(82, 'GH', 'Ghana', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(83, 'GI', 'Gibraltar', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(84, 'GR', 'Greece', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(85, 'GL', 'Greenland', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(86, 'GD', 'Grenada', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(87, 'GP', 'Guadeloupe', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(88, 'GU', 'Guam', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(89, 'GT', 'Guatemala', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(90, 'GN', 'Guinea', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(91, 'GW', 'Guinea-Bissau', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(92, 'GY', 'Guyana', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(93, 'HT', 'Haiti', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(94, 'HM', 'Heard and McDonald Islands', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(95, 'HN', 'Honduras', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(96, 'HK', 'Hong Kong', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(97, 'HU', 'Hungary', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(98, 'IS', 'Iceland', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(99, 'IN', 'India', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(100, 'ID', 'Indonesia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(101, 'IQ', 'Iraq', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(102, 'IE', 'Ireland', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(103, 'IR', 'Islamic Republic of Iran', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(104, 'IL', 'Israel', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(105, 'IT', 'Italy', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(106, 'JM', 'Jamaica', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(107, 'JP', 'Japan', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(108, 'JO', 'Jordan', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(109, 'KZ', 'Kazakhstan', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(110, 'KE', 'Kenya', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(111, 'KI', 'Kiribati', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(112, 'KP', 'Korea, Dem. Peoples Rep of', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(113, 'KR', 'Korea, Republic of', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(114, 'KW', 'Kuwait', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(115, 'KG', 'Kyrgyzstan', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(116, 'LA', 'Laos', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(117, 'LV', 'Latvia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(118, 'LB', 'Lebanon', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(119, 'LS', 'Lesotho', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(120, 'LR', 'Liberia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(121, 'LY', 'Libyan Arab Jamahiriya', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(122, 'LI', 'Liechtenstein', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(123, 'LT', 'Lithuania', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(124, 'LU', 'Luxembourg', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(125, 'MO', 'Macau', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(126, 'MK', 'Macedonia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(127, 'MG', 'Madagascar', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(128, 'MW', 'Malawi', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(129, 'MY', 'Malaysia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(130, 'MV', 'Maldives', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(131, 'ML', 'Mali', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(132, 'MT', 'Malta', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(133, 'MH', 'Marshall Islands', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(134, 'MQ', 'Martinique', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(135, 'MR', 'Mauritania', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(136, 'MU', 'Mauritius', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(137, 'YT', 'Mayotte', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(138, 'MX', 'Mexico', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(139, 'FM', 'Micronesia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(140, 'MD', 'Moldova, Republic of', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(141, 'MC', 'Monaco', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(142, 'MN', 'Mongolia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(143, 'MS', 'Montserrat', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(144, 'MA', 'Morocco', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(145, 'MZ', 'Mozambique', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(146, 'MM', 'Myanmar', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(147, 'NA', 'Namibia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(148, 'NR', 'Nauru', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(149, 'NP', 'Nepal', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(150, 'NL', 'Netherlands', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(151, 'AN', 'Netherlands Antilles', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(152, 'NC', 'New Caledonia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(153, 'NZ', 'New Zealand', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(154, 'NI', 'Nicaragua', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(155, 'NE', 'Niger', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(156, 'NG', 'Nigeria', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(157, 'NU', 'Niue', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(158, 'NF', 'Norfolk Island', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(159, 'MP', 'Northern Mariana Islands', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(160, 'NO', 'Norway', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(161, 'OM', 'Oman', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(162, 'PK', 'Pakistan', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(163, 'PW', 'Palau', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(164, 'PA', 'Panama', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(165, 'PG', 'Papua New Guinea', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(166, 'PY', 'Paraguay', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(167, 'PE', 'Peru', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(168, 'PH', 'Philippines', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(169, 'PN', 'Pitcairn', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(170, 'PL', 'Poland', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(171, 'PT', 'Portugal', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(172, 'PR', 'Puerto Rico', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(173, 'QA', 'Qatar', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(174, 'RE', 'Reunion', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(175, 'RO', 'Romania', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(176, 'RU', 'Russian Federation', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(177, 'RW', 'Rwanda', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(178, 'LC', 'Saint Lucia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(179, 'WS', 'Samoa', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(180, 'SM', 'San Marino', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(181, 'ST', 'Sao Tome and Principe', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(182, 'SA', 'Saudi Arabia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(183, 'SN', 'Senegal', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(184, 'RS', 'Serbia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(185, 'SC', 'Seychelles', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(186, 'SL', 'Sierra Leone', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(187, 'SG', 'Singapore', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(188, 'SK', 'Slovakia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(189, 'SI', 'Slovenia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(190, 'SB', 'Solomon Islands', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(191, 'SO', 'Somalia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(192, 'ZA', 'South Africa', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(193, 'ES', 'Spain', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(194, 'LK', 'Sri Lanka', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(195, 'SH', 'St. Helena', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(196, 'KN', 'St. Kitts and Nevis', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(197, 'PM', 'St. Pierre and Miquelon', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(198, 'VC', 'St. Vincent and the Grenadines', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(199, 'SD', 'Sudan', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(200, 'SR', 'Suriname', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(201, 'SJ', 'Svalbard and Jan Mayen Islands', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(202, 'SZ', 'Swaziland', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(203, 'SE', 'Sweden', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(204, 'CH', 'Switzerland', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(205, 'SY', 'Syrian Arab Republic', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(206, 'TW', 'Taiwan', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(207, 'TJ', 'Tajikistan', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(208, 'TZ', 'Tanzania, United Republic of', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(209, 'TH', 'Thailand', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(210, 'TG', 'Togo', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(211, 'TK', 'Tokelau', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(212, 'TO', 'Tonga', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(213, 'TT', 'Trinidad and Tobago', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(214, 'TN', 'Tunisia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(215, 'TR', 'Turkey', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(216, 'TM', 'Turkmenistan', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(217, 'TC', 'Turks and Caicos Islands', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(218, 'TV', 'Tuvalu', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(219, 'UG', 'Uganda', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(220, 'UA', 'Ukraine', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(221, 'AE', 'United Arab Emirates', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(222, 'GB', 'United Kingdom (GB)', 1, 0, '23.00', 999);
INSERT INTO `countries` VALUES(224, 'US', 'United States', 1, 0, '7.50', 998);
INSERT INTO `countries` VALUES(225, 'VI', 'United States Virgin Islands', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(226, 'UY', 'Uruguay', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(227, 'UZ', 'Uzbekistan', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(228, 'VU', 'Vanuatu', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(229, 'VA', 'Vatican City State', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(230, 'VE', 'Venezuela', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(231, 'VN', 'Vietnam', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(232, 'WF', 'Wallis And Futuna Islands', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(233, 'EH', 'Western Sahara', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(234, 'YE', 'Yemen', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(235, 'ZR', 'Zaire', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(236, 'ZM', 'Zambia', 1, 0, '0.00', 0);
INSERT INTO `countries` VALUES(237, 'ZW', 'Zimbabwe', 1, 0, '0.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(1) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `code` varchar(30) NOT NULL,
  `discount` smallint(2) UNSIGNED NOT NULL DEFAULT '0',
  `type` enum('p','a') NOT NULL DEFAULT 'p',
  `membership_id` varchar(50) NOT NULL DEFAULT '0',
  `ctype` varchar(30) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

DROP TABLE IF EXISTS `custom_fields`;
CREATE TABLE IF NOT EXISTS `custom_fields` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_en` varchar(60) NOT NULL,
  `tooltip_en` varchar(100) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `required` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `section` varchar(30) DEFAULT NULL,
  `sorting` int(4) UNSIGNED NOT NULL DEFAULT '0',
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields_data`
--

DROP TABLE IF EXISTS `custom_fields_data`;
CREATE TABLE IF NOT EXISTS `custom_fields_data` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `field_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `digishop_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `portfolio_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `field_name` varchar(40) DEFAULT NULL,
  `field_value` varchar(100) DEFAULT NULL,
  `section` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_user` (`user_id`),
  KEY `idx_field` (`field_id`),
  KEY `idx_digishop` (`digishop_id`),
  KEY `idx_portfolio` (`portfolio_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

DROP TABLE IF EXISTS `email_templates`;
CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_en` varchar(100) NOT NULL,
  `subject_en` varchar(150) NOT NULL,
  `help_en` tinytext,
  `body_en` text NOT NULL,
  `type` enum('news','mailer') DEFAULT 'mailer',
  `typeid` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` VALUES(1, 'Registration Email', 'Please verify your email', 'This template is used to send Registration Verification Email, when Configuration->Registration Verification is set to YES', '<table bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">\r\n  <tbody><tr>\r\n    <td style="background-color: #ffffff;" align="center" bgcolor="#ffffff" valign="top"><br>\r\n<table class="container" style="width:600px;max-width:600px" border="0" cellpadding="0" cellspacing="0" width="600px">\r\n<tbody><tr>\r\n<td height="30"></td>\r\n</tr>\r\n<tr>\r\n<td align="center">[LOGO]</td>\r\n</tr>\r\n<tr>\r\n<td height="20"></td>\r\n</tr>\r\n<tr>\r\n<td><p style="text-align:center;margin:0;font-family:Helvetica, Arial, sans-serif;font-size:26px;color:#222222;">Welcome to [COMPANY]</p></td>\r\n</tr>\r\n<tr>\r\n<td align="center"><img src="[SITEURL]/assets/images/line.png" alt="line" height="43" width="251" style="width:250px"></td>\r\n</tr>\r\n<tr>\r\n<td height="30"></td>\r\n</tr>\r\n<tr>\r\n<td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><br>\r\n  <div class="title" style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#374550">Congratulations!</div>\r\n  <br>\r\n  <div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> You are now registered member<br>\r\n    <br>\r\n    The administrator of this site has requested all new accounts to be activated by the users who created them thus your account is currently inactive. To activate your account, please visit the link below. <br>\r\n    <br>\r\n  </div></td>\r\n</tr>\r\n<tr>\r\n<td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> Here are your login details. Please keep them in a safe place: <br>\r\n    <br>\r\n    Username: [USERNAME]<br>\r\n    Password: [PASSWORD] </div></td>\r\n</tr>\r\n<tr>\r\n<td height="65"></td>\r\n</tr>\r\n<tr>\r\n<td align="center"><table>\r\n    <tbody><tr>\r\n<td style="background:#289CDC; padding:15px 18px;-webkit-border-radius: 4px; border-radius: 4px;font-family:Helvetica, Arial, sans-serif" align="center" bgcolor="#289CDC"><div align="center"> <a target="_blank" href="[LINK]" style="color:#ffffff;text-decoration: none;font-size: 16px;">Activate your Account</a> </div></td>\r\n    </tr>\r\n  </tbody></table></td>\r\n</tr>\r\n<tr>\r\n<td height="65"></td>\r\n</tr>\r\n<tr>\r\n<td style="border-bottom:1px solid #DDDDDD;"></td>\r\n</tr>\r\n<tr>\r\n<td height="25"></td>\r\n</tr>\r\n<tr>\r\n<td><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">\r\n    <tbody><tr>\r\n<td style="font-family:Helvetica, Arial, sans-serif" align="left" valign="top"><div align="left">\r\n<p style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br>\r\n  ©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved. \r\n</p></div></td>\r\n<td width="30"></td>\r\n<td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" height="53" width="52" style="width:52px"></a></td>\r\n<td width="16"></td>\r\n<td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" height="53" width="52" style="width:52px"></a></td>\r\n    </tr>\r\n  </tbody></table></td>\r\n</tr>\r\n</tbody></table></td>\r\n  </tr>\r\n</tbody></table>', 'mailer', 'regMail');
INSERT INTO `email_templates` VALUES(2, 'Forgot Password Email', 'Password Reset', 'This template is used for retrieving lost user password', '<table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#F0F0F0">\r\n  <tbody>\r\n    <tr>\r\n<td style="background-color: #ffffff;" align="center" valign="top" bgcolor="#ffffff"><br />\r\n<table class="container" style="width: 100%px; max-width: 600px;" border="0" width="100%" cellspacing="0" cellpadding="0">\r\n<tbody>\r\n  <tr>\r\n    <td height="30"> </td>\r\n  </tr>\r\n  <tr>\r\n    <td align="center">[LOGO]</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="20"> </td>\r\n  </tr>\r\n  <tr>\r\n    <td><p style="text-align: center; margin: 0; font-family: Helvetica, Arial, sans-serif; font-size: 26px; color: #222222;">New password reset from [COMPANY]</p></td>\r\n  </tr>\r\n  <tr>\r\n    <td align="center"><img style="width: 250px;" src="[SITEURL]/assets/images/line.png" alt="line" width="251" height="43" /></td>\r\n  </tr>\r\n  <tr>\r\n    <td height="30"> </td>\r\n  </tr>\r\n  <tr>\r\n    <td class="container-padding content" style="background-color: #ffffff; padding: 12px 24px 12px 24px;" align="left"><br />\r\nHello, [NAME] <br />\r\nIt seems that you or someone requested a new password for you.<br />\r\nWe have generated a new password, as requested: <br /></td>\r\n  </tr>\r\n  <tr>\r\n    <td class="container-padding content" style="background-color: #ffffff; padding: 12px 24px 12px 24px;" align="left"> New Password: [PASSWORD] </td>\r\n  </tr>\r\n  <tr>\r\n    <td height="65"> </td>\r\n  </tr>\r\n  <tr>\r\n    <td align="center"><table>\r\n<tbody>\r\n<tr>\r\n  <td style="background: #289CDC; padding: 15px 18px; -webkit-border-radius: 4px; border-radius: 4px; font-family: Helvetica, Arial, sans-serif;" align="center" bgcolor="#289CDC"><a target="_blank" href="[LINK]" style="color: #ffffff; text-decoration: none; font-size: 16px;">Login</a></td>\r\n</tr>\r\n</tbody>\r\n</table></td>\r\n  </tr>\r\n  <tr>\r\n    <td style="border-bottom: 1px solid #DDDDDD;"> </td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25"> </td>\r\n  </tr>\r\n  <tr>\r\n    <td style="text-align: center;" align="center"><table border="0" width="95%" cellspacing="0" cellpadding="0" align="center">\r\n<tbody>\r\n<tr>\r\n  <td style="font-family: Helvetica, Arial, sans-serif;" align="left" valign="top"><p style="text-align: left; color: #999999; font-size: 12px; font-weight: normal; line-height: 20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br />\r\n©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved.</p></td>\r\n  <td width="30"> </td>\r\n  <td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img style="width: 52px;" src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" width="52" height="53" /></a></td>\r\n  <td width="16"> </td>\r\n  <td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img style="width: 52px;" src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" width="52" height="53" /></a></td>\r\n</tr>\r\n</tbody>\r\n</table></td>\r\n  </tr>\r\n</tbody>\r\n</table></td>\r\n    </tr>\r\n  </tbody>\r\n</table>', 'mailer', 'userPassReset');
INSERT INTO `email_templates` VALUES(3, 'Welcome Mail From Admin', 'You have been registered', 'This template is used to send welcome email, when user is added by administrator', '<table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#F0F0F0">\n<tbody>\n<tr>\n<td style="background-color: #ffffff;" align="center" valign="top" bgcolor="#ffffff"><br />\n<table class="container" style="width: 100%px; max-width: 600px;" border="0" width="100%" cellspacing="0" cellpadding="0">\n<tbody>\n<tr>\n<td height="30"> </td>\n</tr>\n<tr>\n<td align="center">[LOGO]</td>\n</tr>\n<tr>\n<td height="20"> </td>\n</tr>\n<tr>\n<td>\n<p style="text-align: center; margin: 0; font-family: Helvetica, Arial, sans-serif; font-size: 26px; color: #222222;">Welcome to [COMPANY]</p>\n</td>\n</tr>\n<tr>\n<td align="center"><img style="width: 250px;" src="[SITEURL]/assets/images/line.png" alt="line" width="251" height="43" /></td>\n</tr>\n<tr>\n<td height="30"> </td>\n</tr>\n<tr>\n<td class="container-padding content" style="background-color: #ffffff; padding: 12px 24px 12px 24px;" align="left"><br />\nHello, [NAME]\n<br /> <br />\nYou''re now a member of [SITE_NAME]. <br /> Here are your login details. Please keep them in a safe place:\n</td>\n</tr>\n<tr>\n<td class="container-padding content" style="background-color: #ffffff; padding: 12px 24px 12px 24px;" align="left">\nHere are your login details. Please keep them in a safe place: <br /> <br /> Username: [USERNAME]<br /> Password: [PASSWORD]\n</td>\n</tr>\n<tr>\n<td height="65"> </td>\n</tr>\n<tr>\n<td align="center">\n<table>\n<tbody>\n<tr>\n<td style="background: #289CDC; padding: 15px 18px; -webkit-border-radius: 4px; border-radius: 4px; font-family: Helvetica, Arial, sans-serif;" align="center" bgcolor="#289CDC">\n<a target="_blank" href="[LINK]" style="color: #ffffff; text-decoration: none; font-size: 16px;">Login</a>\n</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr>\n<td height="65"> </td>\n</tr>\n<tr>\n<td style="border-bottom: 1px solid #DDDDDD;"> </td>\n</tr>\n<tr>\n<td height="25"> </td>\n</tr>\n<tr>\n<td style="text-align: center;" align="center">\n<table border="0" width="95%" cellspacing="0" cellpadding="0" align="center">\n<tbody>\n<tr>\n<td style="font-family: Helvetica, Arial, sans-serif;" align="left" valign="top">\n\n<p style="text-align: left; color: #999999; font-size: 12px; font-weight: normal; line-height: 20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br /> ©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved.</p>\n\n</td>\n<td width="30"> </td>\n<td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img style="width: 52px;" src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" width="52" height="53" /></a></td>\n<td width="16"> </td>\n<td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img style="width: 52px;" src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" width="52" height="53" /></a></td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>', 'mailer', 'regMailAdmin');
INSERT INTO `email_templates` VALUES(4, 'Default Newsletter', 'Newsletter', 'This is a default newsletter template', '<table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#F0F0F0">\r\n<tbody>\r\n<tr>\r\n<td style="background-color: #ffffff;" align="center" valign="top" bgcolor="#ffffff"><br />\r\n<table style="width: 100%px; max-width: 600px;" border="0" width="100%" cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr>\r\n<td height="30"> </td>\r\n</tr>\r\n<tr>\r\n<td align="center">[LOGO]</td>\r\n</tr>\r\n<tr>\r\n<td height="20"> </td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p style="text-align: center; margin: 0; font-family: Helvetica, Arial, sans-serif; font-size: 26px; color: #222222;">[COMPANY] Newsletter</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align="center"><img style="width: 250px;" src="[SITEURL]/assets/images/line.png" alt="line" width="251" height="43" /></td>\r\n</tr>\r\n<tr>\r\n<td height="30"> </td>\r\n</tr>\r\n<tr>\r\n<td style="background-color: #ffffff; padding: 12px 24px 12px 24px;" align="left"><br />\r\nHello, [NAME]\r\n<br /> <br />\r\n[ATTACHMENT]\r\n<br /> <br />\r\nNewsletter content goes here...: <br /> \r\n</td>\r\n</tr>\r\n<tr>\r\n<td height="65"> </td>\r\n</tr>\r\n<tr>\r\n<td style="border-bottom: 1px solid #DDDDDD;"> </td>\r\n</tr>\r\n<tr>\r\n<td height="25"> </td>\r\n</tr>\r\n<tr>\r\n<td style="text-align: center;" align="center">\r\n<table border="0" width="95%" cellspacing="0" cellpadding="0" align="center">\r\n<tbody>\r\n<tr>\r\n<td style="font-family: Helvetica, Arial, sans-serif;" align="left" valign="top">\r\n\r\n<p style="text-align: left; color: #999999; font-size: 12px; font-weight: normal; line-height: 20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br /> ©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved.</p>\r\n\r\n</td>\r\n<td width="30"> </td>\r\n<td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img style="width: 52px;" src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" width="52" height="53" /></a></td>\r\n<td width="16"> </td>\r\n<td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img style="width: 52px;" src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" width="52" height="53" /></a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'news', 'newsletter');
INSERT INTO `email_templates` VALUES(5, 'Transaction Completed', 'Payment Completed', 'This template is used to notify administrator on successful payment transaction', '<table bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">\n  <tbody>\n    <tr>\n<td style="background-color: #ffffff;" align="center" bgcolor="#ffffff" valign="top"><br>\n<table style="width:100%px;max-width:600px" border="0" cellpadding="0" cellspacing="0" width="100%">\n<tbody>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td align="center">[LOGO]</td>\n  </tr>\n  <tr>\n    <td height="20"></td>\n  </tr>\n  <tr>\n    <td><p style="text-align:center;margin:0;font-family:Helvetica, Arial, sans-serif;font-size:26px;color:#222222;"> Hello Admin</p></td>\n  </tr>\n  <tr>\n    <td align="center"><img src="[SITEURL]/assets/images/line.png" alt="line" style="width:250px" height="43" width="251"></td>\n  </tr>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left">\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> You have received new payment following: </div>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222">\n<table>\n<tbody><tr>\n  <td style="width:120px"><strong>Username:</strong></td>\n  <td>[NAME]</td>\n</tr>\n<tr>\n  <td><strong>Membership:</strong></td>\n  <td>[ITEMNAME]</td>\n</tr>\n<tr>\n  <td><strong>Price:</strong></td>\n  <td>[PRICE]</td>\n</tr>\n<tr>\n  <td><strong>Status:</strong></td>\n  <td>[STATUS]</td>\n</tr>\n<tr>\n  <td><strong>Processor:</strong></td>\n  <td>[PP]</td>\n</tr>\n<tr>\n  <td><strong>IP:</strong></td>\n  <td>[IP]</td>\n</tr>\n</tbody></table>\n</div>\n</td>\n  </tr>\n  <tr>\n    <td height="65"></td>\n  </tr>\n  <tr>\n    <td style="border-bottom:1px solid #DDDDDD;"></td>\n  </tr>\n  <tr>\n    <td height="25"></td>\n  </tr>\n  <tr>\n    <td style="text-align:center" align="center"><table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">\n<tbody>\n<tr>\n  <td style="font-family:Helvetica, Arial, sans-serif" align="left" valign="top"><div align="left">\n<p style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br>\n©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved. </p>\n    </div></td>\n  <td width="30"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" style="width:52px" height="53" width="52"></a></td>\n  <td width="16"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" style="width:52px" height="53" width="52"></a></td>\n</tr>\n</tbody>\n</table></td>\n  </tr>\n</tbody>\n</table></td>\n    </tr>\n  </tbody>\n</table>', 'mailer', 'payComplete');
INSERT INTO `email_templates` VALUES(6, 'Transaction Suspicious', 'Suspicious Transaction', 'This template is used to notify administrator on failed/suspicious payment transaction', '<table bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">\n  <tbody>\n    <tr>\n<td style="background-color: #ffffff;" align="center" bgcolor="#ffffff" valign="top"><br>\n<table style="width:100%px;max-width:600px" border="0" cellpadding="0" cellspacing="0" width="100%">\n<tbody>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td align="center">[LOGO]</td>\n  </tr>\n  <tr>\n    <td height="20"></td>\n  </tr>\n  <tr>\n    <td><p style="text-align:center;margin:0;font-family:Helvetica, Arial, sans-serif;font-size:26px;color:#222222;"> Hello Admin</p></td>\n  </tr>\n  <tr>\n    <td align="center"><img src="[SITEURL]/assets/images/line.png" alt="line" style="width:250px" height="43" width="251"></td>\n  </tr>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> The following transaction has been disabled due to suspicious activity: </div>\n<br>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222">\n<table>\n<tbody>\n  <tr>\n    <td style="width:120px"><strong>Buyer:</strong></td>\n    <td>[USERNAME]</td>\n  </tr>\n  <tr>\n    <td><strong>Item:</strong></td>\n    <td>[ITEM]</td>\n  </tr>\n  <tr>\n    <td><strong>Price:</strong></td>\n    <td>[PRICE]</td>\n  </tr>\n  <tr>\n    <td><strong>Status:</strong></td>\n    <td>[STATUS]</td>\n  </tr>\n  <tr>\n    <td><strong>Processor:</strong></td>\n    <td>[PP]</td>\n  </tr>\n</tbody>\n</table>\n</div>\n<br>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:20px;text-align:left;color:#222222"> <em>Please verify this transaction is correct. If it is, please activate it in the transaction section of your site''s administration control panel. If not, it appears that someone tried to fraudulently obtain products from your site.</em> </div>\n</td>\n  </tr>\n  <tr>\n    <td height="65"></td>\n  </tr>\n  <tr>\n    <td style="border-bottom:1px solid #DDDDDD;"></td>\n  </tr>\n  <tr>\n    <td height="25"></td>\n  </tr>\n  <tr>\n    <td style="text-align:center" align="center"><table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">\n<tbody>\n<tr>\n  <td style="font-family:Helvetica, Arial, sans-serif" align="left" valign="top"><div align="left">\n<p style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br>\n©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved. </p>\n    </div></td>\n  <td width="30"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" style="width:52px" height="53" width="52"></a></td>\n  <td width="16"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" style="width:52px" height="53" width="52"></a></td>\n</tr>\n</tbody>\n</table></td>\n  </tr>\n</tbody>\n</table></td>\n    </tr>\n  </tbody>\n</table>', 'mailer', 'payBad');
INSERT INTO `email_templates` VALUES(7, 'Welcome Email', 'Welcome', 'This template is used to welcome newly registered user when Configuration->Registration Verification and Configuration->Auto Registration are both set to YES', '<table bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">\n  <tbody>\n    <tr>\n<td style="background-color: #ffffff;" align="center" bgcolor="#ffffff" valign="top"><br>\n<table class="container" style="width:100%px;max-width:600px" border="0" cellpadding="0" cellspacing="0" width="100%">\n<tbody>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td align="center">[LOGO]</td>\n  </tr>\n  <tr>\n    <td height="20"></td>\n  </tr>\n  <tr>\n    <td><p style="text-align:center;margin:0;font-family:Helvetica, Arial, sans-serif;font-size:26px;color:#222222;">Welcome to [COMPANY]</p></td>\n  </tr>\n  <tr>\n    <td align="center"><img src="[SITEURL]/assets/images/line.png" alt="line" height="43" width="251" style="width:250px"></td>\n  </tr>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><br>\n<div class="title" style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#374550">Hello, [NAME]</div>\n<br>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> You''re now a member of [SITE_NAME]. <br>\nHere are your login details. Please keep them in a safe place: <br>\n<br>\n</div></td>\n  </tr>\n  <tr>\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> Here are your login details. Please keep them in a safe place: <br>\n<br>\nUsername: [USERNAME]<br>\nPassword: [PASSWORD] </div></td>\n  </tr>\n  <tr>\n    <td height="65"></td>\n  </tr>\n  <tr>\n    <td style="border-bottom:1px solid #DDDDDD;"></td>\n  </tr>\n  <tr>\n    <td height="25"></td>\n  </tr>\n  <tr>\n    <td style="text-align:center" align="center"><table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">\n<tbody>\n<tr>\n  <td style="font-family:Helvetica, Arial, sans-serif" align="left" valign="top"><div align="left">\n<p style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br>\n©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved. </p>\n    </div></td>\n  <td width="30"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" height="53" width="52" style="width:52px"></a></td>\n  <td width="16"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" height="53" width="52" style="width:52px"></a></td>\n</tr>\n</tbody>\n</table></td>\n  </tr>\n</tbody>\n</table></td>\n    </tr>\n  </tbody>\n</table>\n', 'mailer', 'welcomeEmail');
INSERT INTO `email_templates` VALUES(8, 'Membership Expire 7 days', 'Your membership will expire in 7 days', 'This template is used to remind user that membership will expire in 7 days', '<table bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">\n  <tbody>\n    <tr>\n<td style="background-color: #ffffff;" align="center" bgcolor="#ffffff" valign="top"><br>\n<table class="container" style="width:100%px;max-width:600px" border="0" cellpadding="0" cellspacing="0" width="100%">\n<tbody>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td align="center">[LOGO]</td>\n  </tr>\n  <tr>\n    <td height="20"></td>\n  </tr>\n  <tr>\n    <td><p style="text-align:center;margin:0;font-family:Helvetica, Arial, sans-serif;font-size:26px;color:#222222;">Membership Notification From [COMPANY]</p></td>\n  </tr>\n  <tr>\n    <td align="center"><img src="[SITEURL]/assets/images/line.png" alt="line" style="width:250px" height="43" width="251"></td>\n  </tr>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><br>\n<div class="title" style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#374550">Hello, [NAME]</div>\n<br>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> Your current membership will expire in 7 days: <br>\n<br>\n</div></td>\n  </tr>\n  <tr>\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> Please <a href="[SITEURL]">login</a> to your user panel to extend or upgrade your membership.</div></td>\n  </tr>\n  <tr>\n    <td height="65"></td>\n  </tr>\n  <tr>\n    <td style="border-bottom:1px solid #DDDDDD;"></td>\n  </tr>\n  <tr>\n    <td height="25"></td>\n  </tr>\n  <tr>\n    <td style="text-align:center" align="center"><table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">\n<tbody>\n<tr>\n  <td style="font-family:Helvetica, Arial, sans-serif" align="left" valign="top"><div align="left">\n<p style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br>\n©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved. </p>\n    </div></td>\n  <td width="30"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" style="width:52px" height="53" width="52"></a></td>\n  <td width="16"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" style="width:52px" height="53" width="52"></a></td>\n</tr>\n</tbody>\n</table></td>\n  </tr>\n</tbody>\n</table></td>\n    </tr>\n  </tbody>\n</table>', 'mailer', 'memExp7');
INSERT INTO `email_templates` VALUES(9, 'Membership expired today', 'Your membership has expired', 'This template is used to remind user that membership had expired', '<table bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">\n  <tbody>\n    <tr>\n<td style="background-color: #ffffff;" align="center" bgcolor="#ffffff" valign="top"><br>\n<table class="container" style="width:100%px;max-width:600px" border="0" cellpadding="0" cellspacing="0" width="100%">\n<tbody>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td align="center">[LOGO]</td>\n  </tr>\n  <tr>\n    <td height="20"></td>\n  </tr>\n  <tr>\n    <td><p style="text-align:center;margin:0;font-family:Helvetica, Arial, sans-serif;font-size:26px;color:#222222;">Membership Notification From [COMPANY]</p></td>\n  </tr>\n  <tr>\n    <td align="center"><img src="[SITEURL]/assets/images/line.png" alt="line" style="width:250px" height="43" width="251"></td>\n  </tr>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><br>\n<div class="title" style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#374550">Hello, [NAME]</div>\n<br>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:30px;line-height:30px;text-align:left;color:red"> Your current membership has expired! <br>\n<br>\n</div></td>\n  </tr>\n  <tr>\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> Please <a href="[SITEURL]">login</a> to your user panel to extend or upgrade your membership.</div></td>\n  </tr>\n  <tr>\n    <td height="65"></td>\n  </tr>\n  <tr>\n    <td style="border-bottom:1px solid #DDDDDD;"></td>\n  </tr>\n  <tr>\n    <td height="25"></td>\n  </tr>\n  <tr>\n    <td style="text-align:center" align="center"><table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">\n<tbody>\n<tr>\n  <td style="font-family:Helvetica, Arial, sans-serif" align="left" valign="top"><div align="left">\n<p style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br>\n©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved. </p>\n    </div></td>\n  <td width="30"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" style="width:52px" height="53" width="52"></a></td>\n  <td width="16"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" style="width:52px" height="53" width="52"></a></td>\n</tr>\n</tbody>\n</table></td>\n  </tr>\n</tbody>\n</table></td>\n    </tr>\n  </tbody>\n</table>', 'mailer', 'memExp');
INSERT INTO `email_templates` VALUES(10, 'Contact Request', 'Contact Inquiry', 'This template is used to send default Contact Request Form', '<table bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">\n  <tbody>\n    <tr>\n<td style="background-color: #ffffff;" align="center" bgcolor="#ffffff" valign="top"><br>\n<table style="width:100%px;max-width:600px" border="0" cellpadding="0" cellspacing="0" width="100%">\n<tbody>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td align="center">[LOGO]</td>\n  </tr>\n  <tr>\n    <td height="20"></td>\n  </tr>\n  <tr>\n    <td><p style="text-align:center;margin:0;font-family:Helvetica, Arial, sans-serif;font-size:26px;color:#222222;"> Hello Admin</p></td>\n  </tr>\n  <tr>\n    <td align="center"><img src="[SITEURL]/assets/images/line.png" alt="line" style="width:250px" height="43" width="251"></td>\n  </tr>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> You have a new contact request:</div>\n<br>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222">\n<table>\n<tbody><tr>\n  <td style="width:120px"><strong>From:</strong></td>\n  <td>[EMAIL] - [NAME]</td>\n</tr>\n<tr>\n  <td><strong>Telephone:</strong></td>\n  <td>[PHONE]</td>\n</tr>\n<tr>\n  <td><strong>Subject:</strong></td>\n  <td>[MAILSUBJECT]</td>\n</tr>\n<tr>\n  <td><strong>IP:</strong></td>\n  <td>[IP]</td>\n</tr>\n</tbody></table>\n</div>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> [MESSAGE] </div></td>\n  </tr>\n  <tr>\n    <td height="65"></td>\n  </tr>\n  <tr>\n    <td style="border-bottom:1px solid #DDDDDD;"></td>\n  </tr>\n  <tr>\n    <td height="25"></td>\n  </tr>\n  <tr>\n    <td style="text-align:center" align="center"><table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">\n<tbody>\n<tr>\n  <td style="font-family:Helvetica, Arial, sans-serif" align="left" valign="top"><div align="left">\n<p style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br>\n©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved. </p>\n    </div></td>\n  <td width="30"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" style="width:52px" height="53" width="52"></a></td>\n  <td width="16"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" style="width:52px" height="53" width="52"></a></td>\n</tr>\n</tbody>\n</table></td>\n  </tr>\n</tbody>\n</table></td>\n    </tr>\n  </tbody></table>', 'mailer', 'contact');
INSERT INTO `email_templates` VALUES(11, 'New Comment', 'New Comment Added', 'This template is used to notify admin when new comment has been added', '<table bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">\r\n  <tbody>\r\n    <tr>\r\n<td style="background-color: #ffffff;" align="center" bgcolor="#ffffff" valign="top"><br>\r\n<table style="width:100%px;max-width:600px" border="0" cellpadding="0" cellspacing="0" width="100%">\r\n<tbody>\r\n  <tr>\r\n    <td height="30"></td>\r\n  </tr>\r\n  <tr>\r\n    <td align="center">[LOGO]</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="20"></td>\r\n  </tr>\r\n  <tr>\r\n    <td><p style="text-align:center;margin:0;font-family:Helvetica, Arial, sans-serif;font-size:26px;color:#222222;"> Hello Admin</p></td>\r\n  </tr>\r\n  <tr>\r\n    <td align="center"><img src="[SITEURL]/assets/images/line.png" alt="line" style="width:250px" height="43" width="251"></td>\r\n  </tr>\r\n  <tr>\r\n    <td height="30"></td>\r\n  </tr>\r\n  <tr>\r\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> You have a new comment post. If comments are not auto approved, you will need to manually approve from admin panel. Here are the details: </div>\r\n<br>\r\n<br>\r\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222">\r\n<table>\r\n<tbody>\r\n  <tr>\r\n    <td style="width:120px"><strong>From:</strong></td>\r\n    <td>[NAME]</td>\r\n  </tr>\r\n  <tr>\r\n    <td><strong>Page Url:</strong></td>\r\n    <td><a href="[PAGEURL]">[PAGEURL]</a></td>\r\n  </tr>\r\n  <tr>\r\n    <td><strong>IP:</strong></td>\r\n    <td>[IP]</td>\r\n  </tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<br>\r\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222">[MESSAGE] </div></td>\r\n  </tr>\r\n  <tr>\r\n    <td height="65"></td>\r\n  </tr>\r\n  <tr>\r\n    <td style="border-bottom:1px solid #DDDDDD;"></td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25"></td>\r\n  </tr>\r\n  <tr>\r\n    <td style="text-align:center" align="center"><table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">\r\n<tbody>\r\n<tr>\r\n  <td style="font-family:Helvetica, Arial, sans-serif" align="left" valign="top"><div align="left">\r\n<p style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br>\r\n©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved. </p>\r\n    </div></td>\r\n  <td width="30"></td>\r\n  <td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" style="width:52px" height="53" width="52"></a></td>\r\n  <td width="16"></td>\r\n  <td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" style="width:52px" height="53" width="52"></a></td>\r\n</tr>\r\n</tbody>\r\n</table></td>\r\n  </tr>\r\n</tbody>\r\n</table></td>\r\n    </tr>\r\n  </tbody>\r\n</table>', 'mailer', 'newComment');
INSERT INTO `email_templates` VALUES(12, 'Single Email', 'Single User Email', 'This template is used to email single user', '<table bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">\n  <tbody>\n    <tr>\n<td style="background-color: #ffffff;" align="center" bgcolor="#ffffff" valign="top"><br>\n<table style="width:100%px;max-width:600px" border="0" cellpadding="0" cellspacing="0" width="100%">\n<tbody>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td align="center">[LOGO]</td>\n  </tr>\n  <tr>\n    <td height="20"></td>\n  </tr>\n  <tr>\n    <td><p style="text-align:center;margin:0;font-family:Helvetica, Arial, sans-serif;font-size:26px;color:#222222;"> Hello [NAME]</p></td>\n  </tr>\n  <tr>\n    <td align="center"><img src="[SITEURL]/assets/images/line.png" alt="line" style="width:250px" height="43" width="251"></td>\n  </tr>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> Your message goes here... </div></td>\n  </tr>\n  <tr>\n    <td height="65"></td>\n  </tr>\n  <tr>\n    <td style="border-bottom:1px solid #DDDDDD;"></td>\n  </tr>\n  <tr>\n    <td height="25"></td>\n  </tr>\n  <tr>\n    <td style="text-align:center" align="center"><table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">\n<tbody>\n<tr>\n  <td style="font-family:Helvetica, Arial, sans-serif" align="left" valign="top"><div align="left">\n<p style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br>\n©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved. </p>\n    </div></td>\n  <td width="30"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" style="width:52px" height="53" width="52"></a></td>\n  <td width="16"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" style="width:52px" height="53" width="52"></a></td>\n</tr>\n</tbody>\n</table></td>\n  </tr>\n</tbody>\n</table></td>\n    </tr>\n  </tbody>\n</table>\n\n', 'mailer', 'singleMail');
INSERT INTO `email_templates` VALUES(13, 'Notify Admin', 'New User Registration', 'This template is used to notify admin of new registration when Configuration->Registration Notification is set to YES', '<table bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">\n  <tbody>\n    <tr>\n<td style="background-color: #ffffff;" align="center" bgcolor="#ffffff" valign="top"><br>\n<table style="width:100%px;max-width:600px" border="0" cellpadding="0" cellspacing="0" width="100%">\n<tbody>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td align="center">[LOGO]</td>\n  </tr>\n  <tr>\n    <td height="20"></td>\n  </tr>\n  <tr>\n    <td><p style="text-align:center;margin:0;font-family:Helvetica, Arial, sans-serif;font-size:26px;color:#222222;"> Hello Admin</p></td>\n  </tr>\n  <tr>\n    <td align="center"><img src="[SITEURL]/assets/images/line.png" alt="line" height="43" width="251" style="width:250px"></td>\n  </tr>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> You have a new user registration. You can login into your admin panel to view details:</div>\n<br>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222">\n<table>\n<tr>\n  <td style="width:120px"><strong>Username:</strong></td>\n  <td>[USERNAME]</td>\n</tr>\n<tr>\n  <td><strong>Name:</strong></td>\n  <td>[NAME]</td>\n</tr>\n<tr>\n  <td><strong>IP:</strong></td>\n  <td>[IP]</td>\n</tr>\n</table>\n</div></td>\n  </tr>\n  <tr>\n    <td height="65"></td>\n  </tr>\n  <tr>\n    <td style="border-bottom:1px solid #DDDDDD;"></td>\n  </tr>\n  <tr>\n    <td height="25"></td>\n  </tr>\n  <tr>\n    <td style="text-align:center" align="center"><table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">\n<tbody>\n<tr>\n  <td style="font-family:Helvetica, Arial, sans-serif" align="left" valign="top"><div align="left">\n<p style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br>\n©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved. </p>\n    </div></td>\n  <td width="30"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" height="53" width="52" style="width:52px"></a></td>\n  <td width="16"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" height="53" width="52" style="width:52px"></a></td>\n</tr>\n</tbody>\n</table></td>\n  </tr>\n</tbody>\n</table></td>\n    </tr>\n  </tbody>\n</table>\n', 'mailer', 'notifyAdmin');
INSERT INTO `email_templates` VALUES(14, 'Registration Pending', 'Registration Verification Pending', 'This template is used to send Registration Verification Email, when Configuration->Auto Registration is set to NO', '<table bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">\n  <tbody>\n    <tr>\n<td style="background-color: #ffffff;" align="center" bgcolor="#ffffff" valign="top"><br>\n<table class="container" style="width:600px;max-width:600px" border="0" cellpadding="0" cellspacing="0" width="600px">\n<tbody>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td align="center">[LOGO]</td>\n  </tr>\n  <tr>\n    <td height="20"></td>\n  </tr>\n  <tr>\n    <td><p style="text-align:center;margin:0;font-family:Helvetica, Arial, sans-serif;font-size:26px;color:#222222;">Welcome to [COMPANY]</p></td>\n  </tr>\n  <tr>\n    <td align="center"><img src="[SITEURL]/assets/images/line.png" alt="line" height="43" width="251" style="width:250px"></td>\n  </tr>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><br>\n<div class="title" style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#374550">Congratulations!</div>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> You are now registered member<br>\n<br>\nThe administrator of this site has requested all new accounts\nto be activated by the users who created them thus your account\nis currently pending verification process. <br>\n<br>\n</div></td>\n  </tr>\n  <tr>\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> Here are your login details. Please keep them in a safe place: <br>\n<br>\nUsername: [USERNAME]<br>\nPassword: [PASSWORD] </div></td>\n  </tr>\n  <tr>\n    <td height="65"></td>\n  </tr>\n  <tr>\n    <td style="border-bottom:1px solid #DDDDDD;"></td>\n  </tr>\n  <tr>\n    <td height="25"></td>\n  </tr>\n  <tr>\n    <td><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">\n<tbody>\n<tr>\n  <td style="font-family:Helvetica, Arial, sans-serif" align="left" valign="top"><div align="left">\n<p style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br>\n©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved. </p>\n    </div></td>\n  <td width="30"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" height="53" width="52" style="width:52px"></a></td>\n  <td width="16"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" height="53" width="52" style="width:52px"></a></td>\n</tr>\n</tbody>\n</table></td>\n  </tr>\n</tbody>\n</table></td>\n    </tr>\n  </tbody>\n</table>\n', 'mailer', 'regMailPending');
INSERT INTO `email_templates` VALUES(15, 'Offline Payment', 'Offline Notification', 'This template is used to send notification to a user when offline payment method is being used', '<table bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">\n  <tbody>\n    <tr>\n<td style="background-color: #ffffff;" align="center" bgcolor="#ffffff" valign="top"><br>\n<table class="container" style="width:600px;max-width:600px" border="0" cellpadding="0" cellspacing="0" width="600px">\n<tbody>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td align="center">[LOGO]</td>\n  </tr>\n  <tr>\n    <td height="20"></td>\n  </tr>\n  <tr>\n    <td><p style="text-align:center;margin:0;font-family:Helvetica, Arial, sans-serif;font-size:26px;color:#222222;">Purchase From [COMPANY]</p></td>\n  </tr>\n  <tr>\n    <td align="center"><img src="[SITEURL]/assets/images/line.png" alt="line" height="43" width="251" style="width:250px"></td>\n  </tr>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><br>\n<div class="title" style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#374550">Hello [NAME]!</div>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> You have purchased the following:</div>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222">[ITEMS]</div></td>\n  </tr>\n  <tr>\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222">Please send your payment to: </div>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222">[INFO]</div></td>\n  </tr>\n  <tr>\n    <td height="65"></td>\n  </tr>\n  <tr>\n    <td style="border-bottom:1px solid #DDDDDD;"></td>\n  </tr>\n  <tr>\n    <td height="25"></td>\n  </tr>\n  <tr>\n    <td><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">\n<tbody>\n<tr>\n  <td style="font-family:Helvetica, Arial, sans-serif" align="left" valign="top"><div align="left">\n<p style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br>\n©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved. </p>\n    </div></td>\n  <td width="30"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" height="53" width="52" style="width:52px"></a></td>\n  <td width="16"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" height="53" width="52" style="width:52px"></a></td>\n</tr>\n</tbody>\n</table></td>\n  </tr>\n</tbody>\n</table></td>\n    </tr>\n  </tbody>\n</table>\n', 'mailer', 'offlinePay');
INSERT INTO `email_templates` VALUES(16, 'Event Payment', 'Event Payment Completed', 'This template is used to notify user on successful booking event payment transaction.', '<table bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">\n  <tbody>\n    <tr>\n<td style="background-color: #ffffff;" align="center" bgcolor="#ffffff" valign="top"><br>\n<table class="container" style="width:600px;max-width:600px" border="0" cellpadding="0" cellspacing="0" width="600px">\n<tbody>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td align="center">[LOGO]</td>\n  </tr>\n  <tr>\n    <td height="20"></td>\n  </tr>\n  <tr>\n    <td><p style="text-align:center;margin:0;font-family:Helvetica, Arial, sans-serif;font-size:26px;color:#222222;">Purchase From [COMPANY]</p></td>\n  </tr>\n  <tr>\n    <td align="center"><img src="[SITEURL]/assets/images/line.png" alt="line" height="43" width="251" style="width:250px"></td>\n  </tr>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><br>\n<div class="title" style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#374550">Hello [NAME]!</div>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> You have successfully purchased and booked:</div>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> [ITEM]</div>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"><a href="[EVENTURL]">View Event Details</a></div></td>\n  </tr>\n  <tr>\n    <td height="65"></td>\n  </tr>\n  <tr>\n    <td style="border-bottom:1px solid #DDDDDD;"></td>\n  </tr>\n  <tr>\n    <td height="25"></td>\n  </tr>\n  <tr>\n    <td><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">\n<tbody>\n<tr>\n  <td style="font-family:Helvetica, Arial, sans-serif" align="left" valign="top"><div align="left">\n<p style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br>\n©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved. </p>\n    </div></td>\n  <td width="30"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" height="53" width="52" style="width:52px"></a></td>\n  <td width="16"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" height="53" width="52" style="width:52px"></a></td>\n</tr>\n</tbody>\n</table></td>\n  </tr>\n</tbody>\n</table></td>\n    </tr>\n  </tbody>\n</table>\n', 'mailer', 'eventPay');
INSERT INTO `email_templates` VALUES(17, 'New Invoice', 'You have new invoice', 'This template is used to notify user of a invoice being sent (Invoice Manager)', '<table bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">\n  <tbody>\n    <tr>\n<td style="background-color: #ffffff;" align="center" bgcolor="#ffffff" valign="top"><br>\n<table class="container" style="width:600px;max-width:600px" border="0" cellpadding="0" cellspacing="0" width="600px">\n<tbody>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td align="center">[LOGO]</td>\n  </tr>\n  <tr>\n    <td height="20"></td>\n  </tr>\n  <tr>\n    <td><p style="text-align:center;margin:0;font-family:Helvetica, Arial, sans-serif;font-size:26px;color:#222222;">Invoice From [COMPANY]</p></td>\n  </tr>\n  <tr>\n    <td align="center"><img src="[SITEURL]/assets/images/line.png" alt="line" height="43" width="251" style="width:250px"></td>\n  </tr>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><br>\n<div class="title" style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#374550">Hello [NAME]!</div>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222">We have attached an invoice in the amount of [AMOUNT]</div>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222">You may pay, view and print the invoice online by visiting link bellow.</div></td>\n  </tr>\n  <tr>\n    <td height="65"></td>\n  </tr>\n  <tr>\n    <td align="center"><table>\n<tbody>\n<tr>\n  <td style="background:#289CDC; padding:15px 18px;-webkit-border-radius: 4px; border-radius: 4px;font-family:Helvetica, Arial, sans-serif" align="center" bgcolor="#289CDC"><div align="center"> <a target="_blank" href="[LINK]" style="color:#ffffff;text-decoration: none;font-size: 16px;">View Invoice</a> </div></td>\n</tr>\n</tbody>\n</table></td>\n  </tr>\n  <tr>\n    <td style="border-bottom:1px solid #DDDDDD;"></td>\n  </tr>\n  <tr>\n    <td height="25"></td>\n  </tr>\n  <tr>\n    <td><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">\n<tbody>\n<tr>\n  <td style="font-family:Helvetica, Arial, sans-serif" align="left" valign="top"><div align="left">\n<p style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br>\n©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved. </p>\n    </div></td>\n  <td width="30"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" height="53" width="52" style="width:52px"></a></td>\n  <td width="16"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" height="53" width="52" style="width:52px"></a></td>\n</tr>\n</tbody>\n</table></td>\n  </tr>\n</tbody>\n</table></td>\n    </tr>\n  </tbody>\n</table>\n', 'mailer', 'newInvoice');
INSERT INTO `email_templates` VALUES(18, 'Transaction Completed IM', 'Payment Completed IM', 'This template is used to notify administrator on successful payment transaction from Invoice Manager', '<table bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">\n  <tbody>\n    <tr>\n<td style="background-color: #ffffff;" align="center" bgcolor="#ffffff" valign="top"><br>\n<table style="width:100%px;max-width:600px" border="0" cellpadding="0" cellspacing="0" width="100%">\n<tbody>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td align="center">[LOGO]</td>\n  </tr>\n  <tr>\n    <td height="20"></td>\n  </tr>\n  <tr>\n    <td><p style="text-align:center;margin:0;font-family:Helvetica, Arial, sans-serif;font-size:26px;color:#222222;"> Hello Admin</p></td>\n  </tr>\n  <tr>\n    <td align="center"><img src="[SITEURL]/assets/images/line.png" alt="line" style="width:250px" height="43" width="251"></td>\n  </tr>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> You have received new payment following: </div>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222">\n<table>\n<tbody>\n  <tr>\n    <td style="width:120px"><strong>Client Name:</strong></td>\n    <td>[NAME]</td>\n  </tr>\n  <tr>\n    <td><strong>Invoice #:</strong></td>\n    <td>[INVID]</td>\n  </tr>\n  <tr>\n    <td><strong>Amount:</strong></td>\n    <td>[AMOUNT]</td>\n  </tr>\n  <tr>\n    <td><strong>Status:</strong></td>\n    <td>[STATUS]</td>\n  </tr>\n  <tr>\n    <td><strong>Processor:</strong></td>\n    <td>[PP]</td>\n  </tr>\n  <tr>\n    <td><strong>IP:</strong></td>\n    <td>[IP]</td>\n  </tr>\n</tbody>\n</table>\n</div>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> You can view this transaction from your <a href="[URL]">admin panel</a></div></td>\n  </tr>\n  <tr>\n    <td height="65"></td>\n  </tr>\n  <tr>\n    <td style="border-bottom:1px solid #DDDDDD;"></td>\n  </tr>\n  <tr>\n    <td height="25"></td>\n  </tr>\n  <tr>\n    <td style="text-align:center" align="center"><table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">\n<tbody>\n<tr>\n  <td style="font-family:Helvetica, Arial, sans-serif" align="left" valign="top"><div align="left">\n<p style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br>\n©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved. </p>\n    </div></td>\n  <td width="30"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" style="width:52px" height="53" width="52"></a></td>\n  <td width="16"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" style="width:52px" height="53" width="52"></a></td>\n</tr>\n</tbody>\n</table></td>\n  </tr>\n</tbody>\n</table></td>\n    </tr>\n  </tbody>\n</table>\n\n', 'mailer', 'payCompleteIM');
INSERT INTO `email_templates` VALUES(19, 'PsDrive Submission', 'New PsDrive user submission', 'This template is used to notify administrator on successful PsDrive user submission', '<table bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">\n  <tbody>\n    <tr>\n<td style="background-color: #ffffff;" align="center" bgcolor="#ffffff" valign="top"><br>\n<table style="width:100%px;max-width:600px" border="0" cellpadding="0" cellspacing="0" width="100%">\n<tbody>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td align="center">[LOGO]</td>\n  </tr>\n  <tr>\n    <td height="20"></td>\n  </tr>\n  <tr>\n    <td><p style="text-align:center;margin:0;font-family:Helvetica, Arial, sans-serif;font-size:26px;color:#222222;"> Hello Admin</p></td>\n  </tr>\n  <tr>\n    <td align="center"><img src="[SITEURL]/assets/images/line.png" alt="line" style="width:250px" height="43" width="251"></td>\n  </tr>\n  <tr>\n    <td height="30"></td>\n  </tr>\n  <tr>\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> You have received a new PsDrive file submission: </div>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222">\n<table>\n<tbody>\n  <tr>\n    <td style="width:120px"><strong>User Name:</strong></td>\n    <td>[USERNAME]</td>\n  </tr>\n  <tr>\n    <td><strong>Filename:</strong></td>\n    <td>[FILENAME]</td>\n  </tr>\n  <tr>\n    <td><strong>Url:</strong></td>\n    <td>[FILEURL]</td>\n  </tr>\n  <tr>\n    <td><strong>IP:</strong></td>\n    <td>[IP]</td>\n  </tr>\n</tbody>\n</table>\n</div>\n<br>\n<br>\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> You can view this transaction from your <a href="[URL]">admin panel</a></div></td>\n  </tr>\n  <tr>\n    <td height="65"></td>\n  </tr>\n  <tr>\n    <td style="border-bottom:1px solid #DDDDDD;"></td>\n  </tr>\n  <tr>\n    <td height="25"></td>\n  </tr>\n  <tr>\n    <td style="text-align:center" align="center"><table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">\n<tbody>\n<tr>\n  <td style="font-family:Helvetica, Arial, sans-serif" align="left" valign="top"><div align="left">\n<p style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br>\n©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved. </p>\n    </div></td>\n  <td width="30"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" style="width:52px" height="53" width="52"></a></td>\n  <td width="16"></td>\n  <td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" style="width:52px" height="53" width="52"></a></td>\n</tr>\n</tbody>\n</table></td>\n  </tr>\n</tbody>\n</table></td>\n    </tr>\n  </tbody>\n</table>\n\n', 'mailer', 'psdNotifyAdmin');
INSERT INTO `email_templates` VALUES(20, 'Digishop User Notification', 'Transaction Completed', 'This template is used to notify user of completed transaction  (Digishop Manager)', '<table bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">\n<tbody>\n<tr>\n<td style="background-color: #ffffff;" align="center" bgcolor="#ffffff" valign="top"><br />\n<table style="width: 100%px; max-width: 600px;" border="0" cellpadding="0" cellspacing="0" width="100%">\n<tbody>\n<tr>\n<td height="30"></td>\n</tr>\n<tr>\n<td align="center">[LOGO]</td>\n</tr>\n<tr>\n<td height="20"></td>\n</tr>\n<tr>\n<td>\n<p style="text-align: center; margin: 0; font-family: Helvetica, Arial, sans-serif; font-size: 26px; color: #222222;">Hello [NAME]</p>\n</td>\n</tr>\n<tr>\n<td align="center"><img src="[SITEURL]/assets/images/line.png" alt="line" style="width: 250px;" height="43" width="251" /></td>\n</tr>\n<tr>\n<td height="30"></td>\n</tr>\n<tr>\n<td class="container-padding content" style="background-color: #ffffff; padding: 12px 24px 12px 24px;" align="left">\n<div class="body-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: left; color: #222222;">You have purchased the following items:</div>\n<br />\n<div class="body-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: left; color: #222222;">[ITEMS]</div>\n<br /> <br />\n<div class="body-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: left; color: #222222;">You can now download your item(s) above from <a href="[URL]">user dashboard</a></div>\n</td>\n</tr>\n<tr>\n<td height="65"></td>\n</tr>\n<tr>\n<td style="border-bottom: 1px solid #DDDDDD;"></td>\n</tr>\n<tr>\n<td height="25"></td>\n</tr>\n<tr>\n<td style="text-align: center;" align="center">\n<table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">\n<tbody>\n<tr>\n<td style="font-family: Helvetica, Arial, sans-serif;" align="left" valign="top">\n<div align="left">\n<p style="text-align: left; color: #999999; font-size: 12px; font-weight: normal; line-height: 20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br /> ©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved.</p>\n</div>\n</td>\n<td width="30"></td>\n<td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" style="width: 52px;" height="53" width="52" /></a></td>\n<td width="16"></td>\n<td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" style="width: 52px;" height="53" width="52" /></a></td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n<p></p>', 'mailer', 'digiNotifyUser');
INSERT INTO `email_templates` VALUES(21, 'Visual Form Submission', 'New Form Submission', 'This template is used to notify Admin on new visual form submission', '<table bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">\r\n  <tbody>\r\n    <tr>\r\n<td style="background-color: #ffffff;" align="center" bgcolor="#ffffff" valign="top"><br>\r\n<table style="width:100%px;max-width:600px" border="0" cellpadding="0" cellspacing="0" width="100%">\r\n<tbody>\r\n  <tr>\r\n    <td height="30"></td>\r\n  </tr>\r\n  <tr>\r\n    <td align="center">[LOGO]</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="20"></td>\r\n  </tr>\r\n  <tr>\r\n    <td><p style="text-align:center;margin:0;font-family:Helvetica, Arial, sans-serif;font-size:26px;color:#222222;"> Hello Admin</p></td>\r\n  </tr>\r\n  <tr>\r\n    <td align="center"><img src="[SITEURL]/assets/images/line.png" alt="line" height="43" width="251" style="width:250px"></td>\r\n  </tr>\r\n  <tr>\r\n    <td height="30"></td>\r\n  </tr>\r\n  <tr>\r\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> You have a new [FORMNAME] form submission:</div>\r\n<br>\r\n<br>\r\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> [FORMDATA] </div></td>\r\n  </tr>\r\n  <tr>\r\n    <td height="65"></td>\r\n  </tr>\r\n  <tr>\r\n    <td style="border-bottom:1px solid #DDDDDD;"></td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25"></td>\r\n  </tr>\r\n  <tr>\r\n    <td style="text-align:center" align="center"><table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">\r\n<tbody>\r\n<tr>\r\n  <td style="font-family:Helvetica, Arial, sans-serif" align="left" valign="top"><div align="left">\r\n<p style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br>\r\n©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved. </p>\r\n    </div></td>\r\n  <td width="30"></td>\r\n  <td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" height="53" width="52" style="width:52px"></a></td>\r\n  <td width="16"></td>\r\n  <td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" height="53" width="52" style="width:52px"></a></td>\r\n</tr>\r\n</tbody>\r\n</table></td>\r\n  </tr>\r\n</tbody>\r\n</table></td>\r\n    </tr>\r\n  </tbody>\r\n</table>', 'mailer', 'visualFormAdmin');
INSERT INTO `email_templates` VALUES(22, 'Blog Notification Admin', 'New Article Submission', 'This template is used to notify Admin on new blog article submission', '<table bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">\r\n  <tbody>\r\n    <tr>\r\n<td style="background-color: #ffffff;" align="center" bgcolor="#ffffff" valign="top"><br>\r\n<table style="width:100%px;max-width:600px" border="0" cellpadding="0" cellspacing="0" width="100%">\r\n<tbody>\r\n  <tr>\r\n    <td height="30"></td>\r\n  </tr>\r\n  <tr>\r\n    <td align="center">[LOGO]</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="20"></td>\r\n  </tr>\r\n  <tr>\r\n    <td><p style="text-align:center;margin:0;font-family:Helvetica, Arial, sans-serif;font-size:26px;color:#222222;"> Hello Admin</p></td>\r\n  </tr>\r\n  <tr>\r\n    <td align="center"><img src="[SITEURL]/assets/images/line.png" alt="line" height="43" width="251" style="width:250px"></td>\r\n  </tr>\r\n  <tr>\r\n    <td height="30"></td>\r\n  </tr>\r\n  <tr>\r\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> You have a new <strong>[FORMNAME]</strong> article pending approval.</div>\r\n<br>\r\n<br>\r\n<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222"> You can review  this article from your admin panel in Blog Module section. </div></td>\r\n  </tr>\r\n  <tr>\r\n    <td height="65"></td>\r\n  </tr>\r\n  <tr>\r\n    <td style="border-bottom:1px solid #DDDDDD;"></td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25"></td>\r\n  </tr>\r\n  <tr>\r\n    <td style="text-align:center" align="center"><table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">\r\n<tbody>\r\n<tr>\r\n  <td style="font-family:Helvetica, Arial, sans-serif" align="left" valign="top"><div align="left">\r\n<p style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br>\r\n©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved. </p>\r\n    </div></td>\r\n  <td width="30"></td>\r\n  <td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" height="53" width="52" style="width:52px"></a></td>\r\n  <td width="16"></td>\r\n  <td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" height="53" width="52" style="width:52px"></a></td>\r\n</tr>\r\n</tbody>\r\n</table></td>\r\n  </tr>\r\n</tbody>\r\n</table></td>\r\n    </tr>\r\n  </tbody>\r\n</table>', 'mailer', 'blogAdminNotify');
INSERT INTO `email_templates` VALUES(23, 'Blog Notification User', 'New Article Submission', 'This template is used to notify user on blog artilce status submission', '<table bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">\r\n  <tbody>\r\n    <tr>\r\n<td style="background-color: #ffffff;" align="center" bgcolor="#ffffff" valign="top"><br>\r\n<table style="width:100%px;max-width:600px" border="0" cellpadding="0" cellspacing="0" width="100%">\r\n<tbody>\r\n  <tr>\r\n    <td height="30"></td>\r\n  </tr>\r\n  <tr>\r\n    <td align="center">[LOGO]</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="20"></td>\r\n  </tr>\r\n  <tr>\r\n    <td><p style="text-align:center;margin:0;font-family:Helvetica, Arial, sans-serif;font-size:26px;color:#222222;"> Hello [NAME]</p></td>\r\n  </tr>\r\n  <tr>\r\n    <td align="center"><img src="[SITEURL]/assets/images/line.png" alt="line" height="43" width="251" style="width:250px"></td>\r\n  </tr>\r\n  <tr>\r\n    <td height="30"></td>\r\n  </tr>\r\n  <tr>\r\n    <td class="container-padding content" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff" align="left"><div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#222222">Your submitted article has been [STATUS]</div></td>\r\n  </tr>\r\n  <tr>\r\n    <td height="65"></td>\r\n  </tr>\r\n  <tr>\r\n    <td style="border-bottom:1px solid #DDDDDD;"></td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25"></td>\r\n  </tr>\r\n  <tr>\r\n    <td style="text-align:center" align="center"><table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">\r\n<tbody>\r\n<tr>\r\n  <td style="font-family:Helvetica, Arial, sans-serif" align="left" valign="top"><div align="left">\r\n<p style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br>\r\n©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved. </p>\r\n    </div></td>\r\n  <td width="30"></td>\r\n  <td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" height="53" width="52" style="width:52px"></a></td>\r\n  <td width="16"></td>\r\n  <td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" height="53" width="52" style="width:52px"></a></td>\r\n</tr>\r\n</tbody>\r\n</table></td>\r\n  </tr>\r\n</tbody>\r\n</table></td>\r\n    </tr>\r\n  </tbody>\r\n</table>', 'mailer', 'blogUserNotify');
INSERT INTO `email_templates` VALUES(24, 'Forgot Password Admin', 'Password Reset', 'This template is used for retrieving lost admin password', '<table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#F0F0F0">\r\n<tbody>\r\n<tr>\r\n<td style="background-color: #ffffff;" align="center" valign="top" bgcolor="#ffffff"><br />\r\n<table class="container" style="width: 100%px; max-width: 600px;" border="0" width="100%" cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr>\r\n<td height="30"> </td>\r\n</tr>\r\n<tr>\r\n<td align="center">[LOGO]</td>\r\n</tr>\r\n<tr>\r\n<td height="20"> </td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p style="text-align: center; margin: 0; font-family: Helvetica, Arial, sans-serif; font-size: 26px; color: #222222;">New password reset from [COMPANY]</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align="center"><img style="width: 250px;" src="[SITEURL]/assets/images/line.png" alt="line" width="251" height="43" /></td>\r\n</tr>\r\n<tr>\r\n<td height="30"> </td>\r\n</tr>\r\n<tr>\r\n<td class="container-padding content" style="background-color: #ffffff; padding: 12px 24px 12px 24px;" align="left"><br />\r\nHello, [NAME]\r\n<br />\r\nIt seems that you or someone requested a new password for you.<br /> We have generated a new password, as requested: <br /> \r\n</td>\r\n</tr>\r\n<tr>\r\n<td class="container-padding content" style="background-color: #ffffff; padding: 12px 24px 12px 24px;" align="left">\r\nNew Password: [PASSWORD]\r\n</td>\r\n</tr>\r\n<tr>\r\n<td height="65"> </td>\r\n</tr>\r\n<tr>\r\n<td align="center">\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td style="background: #289CDC; padding: 15px 18px; -webkit-border-radius: 4px; border-radius: 4px; font-family: Helvetica, Arial, sans-serif;" align="center" bgcolor="#289CDC">\r\n<a target="_blank" href="[LINK]" style="color: #ffffff; text-decoration: none; font-size: 16px;">Admin Panel</a>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style="border-bottom: 1px solid #DDDDDD;"> </td>\r\n</tr>\r\n<tr>\r\n<td height="25"> </td>\r\n</tr>\r\n<tr>\r\n<td style="text-align: center;" align="center">\r\n<table border="0" width="95%" cellspacing="0" cellpadding="0" align="center">\r\n<tbody>\r\n<tr>\r\n<td style="font-family: Helvetica, Arial, sans-serif;" align="left" valign="top">\r\n\r\n<p style="text-align: left; color: #999999; font-size: 12px; font-weight: normal; line-height: 20px;">This email is sent to you directly from <a href="[SITEURL]">[COMPANY]</a> The information above is gathered from the user input. <br /> ©[DATE] <a href="[SITEURL]">[COMPANY]</a>. All rights reserved.</p>\r\n\r\n</td>\r\n<td width="30"> </td>\r\n<td valign="top" width="52"><a target="_blank" href="http://facebook.com/[FB]"><img style="width: 52px;" src="[SITEURL]/assets/images/facebook.png" alt="facebook icon" width="52" height="53" /></a></td>\r\n<td width="16"> </td>\r\n<td valign="top" width="52"><a target="_blank" href="http://twitter.com/[TW]"><img style="width: 52px;" src="[SITEURL]/assets/images/twitter.png" alt="twitter icon" width="52" height="53" /></a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'mailer', 'adminPassReset');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

DROP TABLE IF EXISTS `gateways`;
CREATE TABLE IF NOT EXISTS `gateways` (
  `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `displayname` varchar(50) NOT NULL,
  `dir` varchar(25) NOT NULL,
  `live` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `extra_txt` varchar(100) DEFAULT NULL,
  `extra_txt2` varchar(100) DEFAULT NULL,
  `extra_txt3` varchar(100) DEFAULT NULL,
  `extra` varchar(100) DEFAULT NULL,
  `extra2` varchar(100) DEFAULT NULL,
  `extra3` text,
  `is_recurring` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` VALUES(1, 'paypal', 'PayPal', 'paypal', 1, 'Email Address', 'Currency Code', 'Not in Use', 'paypal@address.com', 'CAD', '', 1, 1);
INSERT INTO `gateways` VALUES(2, 'skrill', 'Skrill', 'skrill', 1, 'Email Address', 'Currency Code', 'Secret Passphrase', 'moneybookers@address.com', 'EUR', 'mypassphrase', 1, 1);
INSERT INTO `gateways` VALUES(3, 'offline', 'Offline Payment', 'offline', 0, 'Not in Use', 'Not in Use', 'Instructions', '', '', 'Please submit all payments to:\nBank Name:\nBank Account:\netc...', 0, 1);
INSERT INTO `gateways` VALUES(4, 'stripe', 'Stripe', 'stripe', 0, 'Secret Key', 'Currency Code', 'Publishable Key', 'sk_test_6sDE6wyuBXgEuHbrjZKyG5MlQ', 'CAD', 'pk_test_vRosykAcmL459P2r7H9hziwrg', 1, 1);
INSERT INTO `gateways` VALUES(5, 'payfast', 'PayFast', 'payfast', 0, 'Merchant ID', 'Merchant Key', 'PassPhrase', '10000100', '46f0cd694581a', '', 0, 1);
INSERT INTO `gateways` VALUES(6, 'ideal', 'iDeal', 'ideal', 0, 'API Key', 'Currency Code', 'Not in Use', 'test_uFQUaDAerAygbhcpMN95DJdsVkDDKrJ', 'EUR', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE IF NOT EXISTS `language` (
  `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `abbr` varchar(2) DEFAULT NULL,
  `langdir` enum('ltr','rtl') DEFAULT 'ltr',
  `color` varchar(7) DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL,
  `home` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` VALUES(1, 'English', 'en', 'ltr', '#7ACB95', 'http://www.wojoscripts.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `layout`
--

DROP TABLE IF EXISTS `layout`;
CREATE TABLE IF NOT EXISTS `layout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plug_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `page_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `mod_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `modalias` varchar(30) DEFAULT NULL,
  `page_slug_en` varchar(150) DEFAULT NULL,
  `is_content` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `plug_name` varchar(60) DEFAULT NULL,
  `place` varchar(20) DEFAULT NULL,
  `space` tinyint(1) UNSIGNED NOT NULL DEFAULT '10',
  `type` varchar(8) DEFAULT NULL,
  `sorting` int(11) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_page_id` (`page_id`),
  KEY `idx_plug_id` (`plug_id`),
  KEY `idx_mod_id` (`mod_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `layout`
--

INSERT INTO `layout` VALUES(6, 24, 0, 1, 'gallery', NULL, 0, NULL, 'bottom', 10, 'mod_id', 0);

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

DROP TABLE IF EXISTS `memberships`;
CREATE TABLE IF NOT EXISTS `memberships` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_en` varchar(80) NOT NULL DEFAULT '',
  `description_en` varchar(150) DEFAULT NULL,
  `thumb` varchar(40) DEFAULT NULL,
  `price` float(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `days` smallint(3) UNSIGNED NOT NULL DEFAULT '1',
  `period` varchar(1) NOT NULL DEFAULT 'D',
  `trial` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `recurring` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `private` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` VALUES(1, 'Trial 7', 'This is 7 days trial membership...', 'bronze.png', 0.00, 7, 'D', 1, 0, 0, 1);
INSERT INTO `memberships` VALUES(2, 'Basic 30', 'This is 30 days basic membership', 'silver.png', 29.99, 1, 'M', 0, 0, 0, 1);
INSERT INTO `memberships` VALUES(3, 'Platinum', 'Platinum Monthly Subscription.', 'gold.png', 49.99, 1, 'Y', 0, 1, 0, 1);
INSERT INTO `memberships` VALUES(4, 'Weekly Access', 'This is 7 days basic membership', 'platinum.png', 5.99, 1, 'W', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `page_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `page_slug_en` varchar(100) DEFAULT NULL,
  `name_en` varchar(100) NOT NULL,
  `mod_id` int(6) UNSIGNED NOT NULL DEFAULT '0',
  `mod_slug` varchar(100) DEFAULT NULL,
  `caption_en` varchar(100) DEFAULT NULL,
  `content_type` varchar(20) NOT NULL DEFAULT 'page',
  `link` varchar(200) DEFAULT NULL,
  `target` varchar(15) NOT NULL DEFAULT '_blank',
  `icon` varchar(50) DEFAULT NULL,
  `cols` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `position` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `home_page` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_parent_id` (`parent_id`),
  KEY `idx_page_id` (`page_id`),
  KEY `idx_mod_id` (`mod_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` VALUES(1, 0, 3, 'our-contact-info', 'Contact Us', 0, 'contact-us', 'Get in touch', 'page', '', '', 'mail icon', 1, 28, 0, 1);
INSERT INTO `menus` VALUES(2, 0, 1, 'home', 'Home Page', 0, 'home-page', 'Let&#039;s Start here', 'page', '', '', 'home icon', 1, 1, 1, 1);
INSERT INTO `menus` VALUES(3, 52, 7, 'middle-column', 'Single Column', 0, NULL, '', 'page', '', '', 'tasks icon', 1, 6, 0, 1);
INSERT INTO `menus` VALUES(5, 51, 5, 'demo-gallery-page', 'Gallery', 1, 'gallery', 'Gallery page', 'module', NULL, '', 'photo icon', 1, 18, 0, 1);
INSERT INTO `menus` VALUES(6, 0, 0, NULL, 'External Link', 0, 'external-link', '', 'web', 'http://www.google.com', '_blank', 'anchor icon', 1, 27, 0, 0);
INSERT INTO `menus` VALUES(7, 0, 0, NULL, 'More Pages', 0, 'more-pages', 'Demo Pages', 'web', '#', '_self', 'copy icon', 2, 2, 0, 1);
INSERT INTO `menus` VALUES(11, 52, 2, 'what-is-cms-pro', 'About Us', 0, 'about-us', 'Who are we', 'page', '', '', 'globe icon', 1, 8, 0, 1);
INSERT INTO `menus` VALUES(17, 52, 9, 'members-only', 'Members Only', 0, 'members-only', NULL, 'page', '', '', NULL, 1, 9, 0, 1);
INSERT INTO `menus` VALUES(18, 52, 10, 'membership-only', 'Membership Only', 0, 'membership-only', NULL, 'page', '', '', NULL, 1, 10, 0, 1);
INSERT INTO `menus` VALUES(19, 51, 11, 'event-calendar-demo', 'Event Manager Demo', 0, NULL, '', 'page', '', '', 'time icon', 1, 19, 0, 1);
INSERT INTO `menus` VALUES(20, 52, 12, 'page-with-comments', 'Comment Page', 0, NULL, '', 'page', '', '', 'photo icon', 1, 7, 0, 1);
INSERT INTO `menus` VALUES(21, 52, 13, 'right-sidebar', 'Sidebar Right', 0, NULL, '', 'page', '', '', 'browser icon', 1, 5, 0, 1);
INSERT INTO `menus` VALUES(34, 38, 0, 'portfolio', 'Portfolio', 6, NULL, NULL, 'web', '#', '_self', 'grid layout icon', 1, 24, 0, 1);
INSERT INTO `menus` VALUES(35, 57, 8, 'timeline-custom-demo', 'Timeline Custom', 0, NULL, '', 'page', '', '', 'photo icon', 1, 16, 0, 1);
INSERT INTO `menus` VALUES(36, 38, 0, 'digishop', 'Digishop', 7, NULL, '', 'web', '#', '_self', 'cart icon', 1, 25, 0, 1);
INSERT INTO `menus` VALUES(37, 38, 6, 'visual-forms', 'Visual Forms', 0, NULL, '', 'web', '#', '_self', 'tasks icon', 1, 26, 0, 1);
INSERT INTO `menus` VALUES(38, 0, 0, '', 'Premium Modules', 0, 'premium-modules', 'Premium Modules', 'web', '#', '', 'puzzle piece icon', 1, 22, 0, 1);
INSERT INTO `menus` VALUES(39, 38, 0, 'blog', 'Blog Manager', 8, NULL, '', 'web', '#', '_self', 'tasks icon', 1, 23, 0, 1);
INSERT INTO `menus` VALUES(42, 52, 21, 'left-sidebar', 'Sidebar Left', 0, NULL, '', 'page', '', '', 'photo icon', 0, 4, 0, 1);
INSERT INTO `menus` VALUES(43, 51, 22, 'demo-faq', 'FAQ Manager', 0, 'faq-manager', '', 'page', '', '', 'help icon', 0, 20, 0, 1);
INSERT INTO `menus` VALUES(51, 7, 0, NULL, 'Modules', 0, NULL, 'Modules', 'web', '#', '_self', '', 1, 17, 0, 1);
INSERT INTO `menus` VALUES(52, 7, 0, NULL, 'Demo Pages', 0, NULL, 'Demo Pages', 'web', '#', '_self', '', 1, 3, 0, 1);
INSERT INTO `menus` VALUES(53, 57, 0, 'timeline-event-demo', 'Timeline Events', 0, NULL, '', 'page', '', '', '', 1, 14, 0, 1);
INSERT INTO `menus` VALUES(54, 57, 0, 'timeline-portfolio-demo', 'Timeline Portfolio', 0, NULL, '', 'web', '#', '_self', '', 1, 13, 0, 1);
INSERT INTO `menus` VALUES(55, 57, 0, 'timeline-blog-demo', 'Timeline Blog', 0, NULL, '', 'web', '#', '_self', '', 1, 12, 0, 1);
INSERT INTO `menus` VALUES(56, 57, 0, 'timeline-rss-demo', 'Timeline Rss', 0, NULL, '', 'page', '', '', '', 1, 15, 0, 1);
INSERT INTO `menus` VALUES(57, 7, 0, NULL, 'Timeline', 0, NULL, '', 'web', '#', '_self', '', 1, 11, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_en` varchar(120) NOT NULL,
  `info_en` varchar(200) DEFAULT NULL,
  `modalias` varchar(60) NOT NULL,
  `hasconfig` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `hascoupon` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `hasfields` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `system` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `content` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` smallint(3) UNSIGNED NOT NULL DEFAULT '0',
  `is_menu` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_builder` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `keywords_en` varchar(200) DEFAULT NULL,
  `description_en` text,
  `icon` varchar(50) DEFAULT NULL,
  `ver` decimal(4,2) UNSIGNED NOT NULL DEFAULT '1.00',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` VALUES(1, 'Gallery', 'Fully featured gallery module', 'gallery', 1, 0, 0, 1, 1, 0, 1, 0, '', '', 'gallery/thumb.svg', '5.00', '2014-04-29 06:19:32', 1);
INSERT INTO `modules` VALUES(3, 'Comments', 'Encourage your readers to join in the discussion and leave comments and respond promptly to the comments left by your readers to make them feel valued', 'comments', 1, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, 'comments/thumb.svg', '5.00', '2016-10-15 22:05:56', 1);
INSERT INTO `modules` VALUES(4, 'Event Manager', 'Easily publish and manage your company events.', 'events', 1, 0, 0, 0, 1, 0, 0, 1, NULL, NULL, 'events/thumb.svg', '5.00', '2016-10-16 00:03:54', 1);
INSERT INTO `modules` VALUES(6, 'Universal Timeline', 'Create unlimited timline pugins.', 'timeline', 1, 0, 0, 1, 1, 0, 0, 0, NULL, NULL, 'timeline/thumb.svg', '5.00', '2016-10-28 20:59:59', 1);
INSERT INTO `modules` VALUES(9, 'AdBlock', 'Manage Ad Campaigns', 'adblock', 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 'adblock/thumb.svg', '5.00', '2016-11-15 04:20:18', 1);
INSERT INTO `modules` VALUES(11, 'Location Maps', 'Add Google Maps with multiple markers', 'gmaps', 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 'gmaps/thumb.svg', '5.00', '2016-11-20 04:08:30', 1);
INSERT INTO `modules` VALUES(12, 'Album One', NULL, 'gallery', 0, 0, 0, 0, 0, 1, 0, 1, NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'gallery/thumb.svg', '1.00', '2017-01-04 20:18:56', 1);
INSERT INTO `modules` VALUES(13, 'Album Two', NULL, 'gallery', 0, 0, 0, 0, 0, 2, 0, 1, NULL, NULL, 'gallery/thumb.svg', '1.00', '2017-01-04 20:27:41', 1);
INSERT INTO `modules` VALUES(14, 'Album Three', NULL, 'gallery', 0, 0, 0, 0, 0, 3, 0, 1, NULL, NULL, 'gallery/thumb.svg', '1.00', '2017-01-04 20:28:17', 1);
INSERT INTO `modules` VALUES(15, 'Album Four', NULL, 'gallery', 0, 0, 0, 0, 0, 4, 0, 1, NULL, NULL, 'gallery/thumb.svg', '1.00', '2017-01-04 20:28:48', 1);
INSERT INTO `modules` VALUES(18, 'Blog Timeline', NULL, 'timeline', 0, 0, 0, 0, 0, 1, 0, 1, NULL, NULL, 'timeline/thumb.svg', '1.00', '2017-01-04 20:48:31', 1);
INSERT INTO `modules` VALUES(19, 'Event Timeline', NULL, 'timeline', 0, 0, 0, 0, 0, 2, 0, 1, NULL, NULL, 'timeline/thumb.svg', '1.00', '2017-01-04 20:49:05', 1);
INSERT INTO `modules` VALUES(20, 'Rss Timeline', NULL, 'timeline', 0, 0, 0, 0, 0, 3, 0, 1, NULL, NULL, 'timeline/thumb.svg', '1.00', '2017-01-04 20:49:34', 1);
INSERT INTO `modules` VALUES(21, 'Portfolio Timeline', NULL, 'timeline', 0, 0, 0, 0, 0, 4, 0, 1, NULL, NULL, 'timeline/thumb.svg', '1.00', '2017-01-04 20:50:02', 1);
INSERT INTO `modules` VALUES(22, 'Facebook Timeline', NULL, 'timeline', 0, 0, 0, 0, 0, 5, 0, 1, NULL, NULL, 'timeline/thumb.svg', '1.00', '2017-01-04 20:50:33', 1);
INSERT INTO `modules` VALUES(23, 'Custom Timeline', NULL, 'timeline/custom_timeline', 0, 0, 0, 0, 0, 6, 0, 1, NULL, NULL, 'timeline/thumb.svg', '1.00', '2017-01-04 20:51:06', 1);
INSERT INTO `modules` VALUES(24, 'F.A.Q. Manager', 'Complete Frequently Asked Question Management Module', 'faq', 1, 0, 0, 0, 1, 0, 0, 1, NULL, NULL, 'faq/thumb.svg', '1.00', '2017-05-25 15:54:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mod_adblock`
--

DROP TABLE IF EXISTS `mod_adblock`;
CREATE TABLE IF NOT EXISTS `mod_adblock` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_en` varchar(100) NOT NULL,
  `plugin_id` varchar(30) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `total_views_allowed` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `total_clicks_allowed` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `minimum_ctr` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `image` varchar(50) DEFAULT NULL,
  `image_link` varchar(100) DEFAULT NULL,
  `image_alt` varchar(100) DEFAULT NULL,
  `html` text,
  `total_views` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `total_clicks` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mod_adblock`
--

INSERT INTO `mod_adblock` VALUES(1, 'Default Campaign', 'adblock/wojo-advert', '2014-04-24', '2020-10-01', 0, 0, '0.00', 'BANNER_sg2GlexD6Fnz.png', 'http://wojoscripts.com/', 'Wojo Advert', NULL, 3136, 1282, '2017-07-11 17:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `mod_comments`
--

DROP TABLE IF EXISTS `mod_comments`;
CREATE TABLE IF NOT EXISTS `mod_comments` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `section` varchar(20) NOT NULL,
  `vote_up` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `vote_down` int(11) NOT NULL DEFAULT '0',
  `body` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_parent` (`parent_id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_comment_id` (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
--
-- Table structure for table `mod_events`
--

DROP TABLE IF EXISTS `mod_events`;
CREATE TABLE IF NOT EXISTS `mod_events` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `title_en` varchar(100) NOT NULL,
  `venue_en` varchar(100) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `body_en` text,
  `contact_person` varchar(100) DEFAULT NULL,
  `contact_email` varchar(80) DEFAULT NULL,
  `contact_phone` varchar(24) DEFAULT NULL,
  `color` varchar(7) DEFAULT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mod_events`
--

INSERT INTO `mod_events` VALUES(1, 1, 'Bon Jovi', 'Air Canada Centre', '2017-04-10', '2017-03-12', '20:00:00', '22:00:00', '<p>Jon Bon Jovi and Co. head out on an extensive tour in 2017 in support of their new record This House Is Not For Sale. The band have previously played a handful of special listening parties, but this is the first series of dates on which most fans will have the chance to hear the group''s new material..</p>', 'John Doe', 'john@gmail.com', '555-555-5555', '#b2d280', 1);
INSERT INTO `mod_events` VALUES(2, 1, 'Norah Jones', 'Toronto Theater', '2017-05-26', '2017-05-27', '17:00:00', '17:00:00', '<p>Award winning vocalist and pianist Norah Jones is one of the most sensational artists of our time, and her unique blend of jazz and pop, and trademark sultry vocals appeal to audiences from a variety of genres.</p>', 'John Doe', 'john@gmail.com', '555-555-5555', '#ffcc99', 1);
INSERT INTO `mod_events` VALUES(3, 1, 'The Peppers&#39; Massive 2017 Tour', 'Toronto Theater', '2017-02-04', '2017-02-04', '17:00:00', '19:00:00', '<p>Following a select number of festival dates in 2016, The Red Hot Chili peppers are heading out onto the road proper for a huge world tour. Their first road trip since 2014, in comes in support of their latest offering The Getaway, a lush, textured album, co-produced by Danger Mouse and Radiohead producer Nigel Godrich, which was a creative reinvention for the band.</p>', 'John Doe', 'john@gmail.com', '555-555-5555', '#da8ba3', 1);
INSERT INTO `mod_events` VALUES(4, 1, 'Lionel Richie With Mariah Carey', 'Air Canada Center', '2017-03-30', '2017-03-30', '17:00:00', '19:00:00', '<p>A pop music force of nature, Lionel Richie has been making sweet music for over 50 years, both with the funk outfit The Commodores and as a solo artist. He has an Oscar, five Grammys and 16 American Music Awards to his name, with his songwriting talents matched only by his megawatt charisma and old-time showman stage persona. 2017 see Richie heading out on a nationwide tour, with a very special guest in tow - none other than pop diva Mariah Carey, taking a break from her Vegas residency.</p>', 'John Doe', 'john@gmail.com', '555-555-5555', '#b2d280', 1);
INSERT INTO `mod_events` VALUES(5, 1, 'Ariana Grande', 'Toronto Theater', '2017-03-05', '2017-03-05', '21:00:00', '23:00:00', '<p>She may be a pint-sized pop princess but don''t for a second doubt if Ariana Grande packs a punch! Dangerous Woman is one of the biggest albums of the year, and the long-awaited supporting tour is here! A huge step up from My Everything, Dangerous Woman is a mature effort from the young star, featuring a bunch of starry collaborators - Future, Nicki Minaj - and countless pop belters, such as the sultry title track and the finger clicking ''Into You''.</p>', 'John Doe', 'john@gmail.com', '555-555-5555', '#b2d280', 1);
INSERT INTO `mod_events` VALUES(6, 1, 'Tom Petty And The Heartbreakers', 'Air Canada Center', '2017-06-15', '2017-06-15', '19:00:00', '21:00:00', '<p>Tom Petty and the Heartbreakers are one of the great American bands of the last half century, practically owning the term ''heartland rock'' with their chronicling of the country''s zeitgeist throughout the decades. Great shakers in the American new wave scene, they''re best known tracks include ''Mary Jane''s Last Dance'', ''American Girl'', ''Learnin'' To Fly'', ''Stop Draggin'' My Heart Around'', ''I Won''t Back Down'', and ''Free Fallin''.</p>', 'John Doe', 'john@gmail.com', '555-555-5555', '#b2d280', 1);
INSERT INTO `mod_events` VALUES(7, 1, 'Justin Bieber', 'Toronto Theater', '2017-09-03', '2017-09-03', '13:30:00', '15:00:00', '<p>Young adult heartthrob and Canadian-born singer-songwriter Justin Bieber has come out of the chrysalis a new artist with a bold new musical statement - 2015''s Purpose. Gone are the fizzy teeny-bopper hits of yore, replaced with remarkably slick and mature dance tunes like ''What Do U Mean'' and ''Where Are U Now''. Catch him as he embarks on a mammoth follow-up to his 2016 Purpose world tour, coming to Rogers Centre in Toronto , ON.</p>', 'John Doe', 'john@gmail.com', '555-555-5555', '#da8ba3', 1);
INSERT INTO `mod_events` VALUES(8, 1, 'Abba Mania', 'Air Canada Center', '2017-02-09', '2017-02-09', '21:00:00', '23:00:00', '<p>ABBA fans of the US unite! It''s time to pull out the platform boots, bellbottom flairs and starched collars as ABBA Mania once again hits American shores. Transported from London''s West End and multiple tours of the UK, the show is an astounding tribute to the beloved music of one of the most successful acts in musical history. Don''t miss this chance to relive the best of the ABBA catalogue at Danforth Music Hall in Toronto, ON, February 9, 2017</p>', 'John Doe', 'john@gmail.com', '555-555-5555', '#da8ba3', 1);
INSERT INTO `mod_events` VALUES(9, 1, 'Bruno Mars', 'Toronto Theater', '2017-08-01', '2017-08-01', '13:30:00', '16:30:00', '<p>Bruno Mars is on top of the world right now. Still basking in the success of his Mark Ronson collaboration ''Uptown Funk'', he followed it up with another fierce of glittering pop funk, ''24K Magic'', the lead single from the album of the same name.</p>\n<p>A showcase for his incredible skills as a songwriter, musician and all round entertainer, 24K Magic is another entry in a hits filled catalogue which has seen Bruno become one of the biggest names in music.</p>', 'John Doe', 'john@gmail.com', '555-555-5555', '#da8ba3', 1);
INSERT INTO `mod_events` VALUES(10, 1, 'Neil Diamond', 'Air Canada Center', '2017-06-03', '2017-06-06', '11:00:00', '16:00:00', '<p>One of the most successful pop singers in history, the great Neil Diamond has now been in the business for half a century, a fact he''s celebrating with a huge 50th Anniversary Tour throughout 2017. A member of The Rock ''n'' Roll Hall of Fame, and more than 125 million record sales under his belt, Neil''s best known tracks include ''Sweet Caroline'', ''Red Red Wine'' and ''I''m a Believer'' (originally performed by The Monkees).</p>', 'John Doe', 'john@gmail.com', '555-555-5555', '#da8ba3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mod_faq`
--

DROP TABLE IF EXISTS `mod_faq`;
CREATE TABLE IF NOT EXISTS `mod_faq` (
  `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question_en` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer_en` text COLLATE utf8_unicode_ci,
  `sorting` int(6) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='contains f.a.q. data';

-- --------------------------------------------------------

--
-- Table structure for table `mod_gallery`
--

DROP TABLE IF EXISTS `mod_gallery`;
CREATE TABLE IF NOT EXISTS `mod_gallery` (
  `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_en` varchar(60) NOT NULL,
  `slug_en` varchar(100) DEFAULT NULL,
  `description_en` varchar(100) DEFAULT NULL,
  `thumb_w` smallint(1) UNSIGNED DEFAULT '500',
  `thumb_h` smallint(1) UNSIGNED NOT NULL DEFAULT '500',
  `poster` varchar(60) DEFAULT NULL,
  `cols` smallint(1) UNSIGNED NOT NULL DEFAULT '300',
  `dir` varchar(40) NOT NULL,
  `resize` varchar(30) DEFAULT NULL,
  `watermark` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'ebable watermark',
  `likes` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'enable like',
  `sorting` int(4) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mod_gallery`
--

INSERT INTO `mod_gallery` VALUES(1, 'Album One', 'album-one', '- New gallery module (albums), responsive images different layouts -', 500, 500, 'image_1.jpg', 400, 'album_one', 'thumbnail', 1, 1, 1);
INSERT INTO `mod_gallery` VALUES(2, 'Album Two', 'album-two', NULL, 500, 500, 'image_2.jpg', 300, 'album_two', 'bestFit', 0, 0, 2);
INSERT INTO `mod_gallery` VALUES(3, 'Album Three', 'album-three', NULL, 500, 500, 'image_3.jpg', 400, 'album_three', 'bestFit', 0, 0, 3);
INSERT INTO `mod_gallery` VALUES(4, 'Album Four', 'album-four', NULL, 500, 500, 'image_4.jpg', 400, 'album_four', 'bestFit', 0, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mod_gallery_data`
--

DROP TABLE IF EXISTS `mod_gallery_data`;
CREATE TABLE IF NOT EXISTS `mod_gallery_data` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `title_en` varchar(80) NOT NULL,
  `description_en` varchar(200) DEFAULT NULL,
  `thumb` varchar(80) DEFAULT NULL,
  `likes` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `sorting` int(11) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mod_gallery_data`
--

INSERT INTO `mod_gallery_data` VALUES(1, 1, 'Design in a Box', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_1.jpg', 150, 1);
INSERT INTO `mod_gallery_data` VALUES(2, 1, 'Social Vision', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_2.jpg', 226, 2);
INSERT INTO `mod_gallery_data` VALUES(3, 1, 'Planning and Planning', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_3.jpg', 328, 3);
INSERT INTO `mod_gallery_data` VALUES(4, 1, 'Up, up and away', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_4.jpg', 489, 4);
INSERT INTO `mod_gallery_data` VALUES(5, 1, 'Flying Ideas', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_5.jpg', 292, 5);
INSERT INTO `mod_gallery_data` VALUES(6, 1, 'Shopping Touch', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_6.jpg', 544, 6);
INSERT INTO `mod_gallery_data` VALUES(7, 1, 'True Colors', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_7.jpg', 754, 7);
INSERT INTO `mod_gallery_data` VALUES(8, 1, 'Touch the Future', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_8.jpg', 659, 8);
INSERT INTO `mod_gallery_data` VALUES(10, 2, 'Design in a Box', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_1.jpg', 156, 1);
INSERT INTO `mod_gallery_data` VALUES(11, 2, 'Social Vision', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_2.jpg', 225, 2);
INSERT INTO `mod_gallery_data` VALUES(12, 2, 'Planning and Planning', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_3.jpg', 358, 3);
INSERT INTO `mod_gallery_data` VALUES(13, 2, 'Up, up and away', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_4.jpg', 487, 4);
INSERT INTO `mod_gallery_data` VALUES(14, 2, 'Flying Ideas', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_5.jpg', 289, 5);
INSERT INTO `mod_gallery_data` VALUES(15, 2, 'Shopping Touch', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_6.jpg', 541, 6);
INSERT INTO `mod_gallery_data` VALUES(16, 2, 'True Colors', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_7.jpg', 752, 7);
INSERT INTO `mod_gallery_data` VALUES(17, 2, 'Touch the Future', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_8.jpg', 657, 8);
INSERT INTO `mod_gallery_data` VALUES(19, 3, 'Design in a Box', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_1.jpg', 150, 1);
INSERT INTO `mod_gallery_data` VALUES(20, 3, 'Social Vision', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_2.jpg', 647, 2);
INSERT INTO `mod_gallery_data` VALUES(21, 3, 'Planning and Planning', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_3.jpg', 325, 3);
INSERT INTO `mod_gallery_data` VALUES(22, 3, 'Up, up and away', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_4.jpg', 487, 4);
INSERT INTO `mod_gallery_data` VALUES(23, 3, 'Flying Ideas', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_5.jpg', 658, 5);
INSERT INTO `mod_gallery_data` VALUES(24, 3, 'Shopping Touch', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_6.jpg', 541, 6);
INSERT INTO `mod_gallery_data` VALUES(25, 3, 'True Colors', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_7.jpg', 752, 7);
INSERT INTO `mod_gallery_data` VALUES(26, 3, 'Touch the Future', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_8.jpg', 657, 8);
INSERT INTO `mod_gallery_data` VALUES(28, 4, 'Design in a Box', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_1.jpg', 150, 1);
INSERT INTO `mod_gallery_data` VALUES(29, 4, 'Social Vision', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_2.jpg', 225, 2);
INSERT INTO `mod_gallery_data` VALUES(30, 4, 'Planning and Planning', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_3.jpg', 325, 3);
INSERT INTO `mod_gallery_data` VALUES(31, 4, 'Up, up and away', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_4.jpg', 487, 4);
INSERT INTO `mod_gallery_data` VALUES(32, 4, 'Flying Ideas', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_5.jpg', 289, 5);
INSERT INTO `mod_gallery_data` VALUES(33, 4, 'Shopping Touch', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_6.jpg', 541, 6);
INSERT INTO `mod_gallery_data` VALUES(34, 4, 'True Colors', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_7.jpg', 752, 7);
INSERT INTO `mod_gallery_data` VALUES(35, 4, 'Touch the Future', 'Hop duon tioma lumigi nv, if tiela poezio sezononomo fri, semi pleje lingvonomo ac unt.', 'image_8.jpg', 897, 8);

-- --------------------------------------------------------

--
-- Table structure for table `mod_gmaps`
--

DROP TABLE IF EXISTS `mod_gmaps`;
CREATE TABLE IF NOT EXISTS `mod_gmaps` (
  `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `plugin_id` varchar(40) DEFAULT NULL,
  `lat` decimal(10,6) NOT NULL DEFAULT '0.000000',
  `lng` decimal(10,6) NOT NULL DEFAULT '0.000000',
  `body` tinytext,
  `zoom` tinyint(1) UNSIGNED NOT NULL DEFAULT '12',
  `minmaxzoom` varchar(5) DEFAULT NULL,
  `layout` varchar(50) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `type_control` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `streetview` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `style` blob,
  `pin` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mod_gmaps`
--

INSERT INTO `mod_gmaps` VALUES(1, 'Head Office', 'gmaps/head-office', '43.650319', '-79.378860', '1 Adelaide St W, Toronto, ON M5H 1L6, Canada', 14, '1,20', 'muted-blue', 'roadmap', 0, 0, 0x5b0d0a202020207b0d0a2020202020202020226665617475726554797065223a2022616c6c222c0d0a2020202020202020227374796c657273223a205b0d0a2020202020202020202020207b0d0a202020202020202020202020202020202273617475726174696f6e223a20300d0a2020202020202020202020207d2c0d0a2020202020202020202020207b0d0a2020202020202020202020202020202022687565223a202223653765636630220d0a2020202020202020202020207d0d0a20202020202020205d0d0a202020207d2c0d0a202020207b0d0a2020202020202020226665617475726554797065223a2022726f6164222c0d0a2020202020202020227374796c657273223a205b0d0a2020202020202020202020207b0d0a202020202020202020202020202020202273617475726174696f6e223a202d37300d0a2020202020202020202020207d0d0a20202020202020205d0d0a202020207d2c0d0a202020207b0d0a2020202020202020226665617475726554797065223a20227472616e736974222c0d0a2020202020202020227374796c657273223a205b0d0a2020202020202020202020207b0d0a20202020202020202020202020202020227669736962696c697479223a20226f6666220d0a2020202020202020202020207d0d0a20202020202020205d0d0a202020207d2c0d0a202020207b0d0a2020202020202020226665617475726554797065223a2022706f69222c0d0a2020202020202020227374796c657273223a205b0d0a2020202020202020202020207b0d0a20202020202020202020202020202020227669736962696c697479223a20226f6666220d0a2020202020202020202020207d0d0a20202020202020205d0d0a202020207d2c0d0a202020207b0d0a2020202020202020226665617475726554797065223a20227761746572222c0d0a2020202020202020227374796c657273223a205b0d0a2020202020202020202020207b0d0a20202020202020202020202020202020227669736962696c697479223a202273696d706c6966696564220d0a2020202020202020202020207d2c0d0a2020202020202020202020207b0d0a202020202020202020202020202020202273617475726174696f6e223a202d36300d0a2020202020202020202020207d0d0a20202020202020205d0d0a202020207d0d0a5d, 'pin2.png');

-- --------------------------------------------------------

--
-- Table structure for table `mod_timeline`
--

DROP TABLE IF EXISTS `mod_timeline`;
CREATE TABLE IF NOT EXISTS `mod_timeline` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `plugin_id` varchar(25) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `limiter` tinyint(1) UNSIGNED NOT NULL DEFAULT '10',
  `showmore` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `maxitems` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `colmode` varchar(20) DEFAULT 'dual',
  `readmore` varchar(150) DEFAULT NULL,
  `rssurl` varchar(200) DEFAULT NULL,
  `fbid` varchar(150) DEFAULT NULL,
  `fbpage` varchar(150) DEFAULT NULL,
  `fbtoken` varchar(150) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mod_timeline`
--

INSERT INTO `mod_timeline` VALUES(1, 'Blog Timeline', 'timeline/blog', 'blog', 10, 0, 0, 'dual', NULL, '0', NULL, NULL, NULL, '2016-10-28 18:46:39');
INSERT INTO `mod_timeline` VALUES(2, 'Event Timeline', 'timeline/event', 'event', 16, 10, 5, 'dual', NULL, NULL, NULL, NULL, NULL, '2016-10-28 18:46:39');
INSERT INTO `mod_timeline` VALUES(3, 'Rss Timeline', 'timeline/rss', 'rss', 20, 0, 0, 'dual', NULL, 'http://www.thestar.com/feeds.topstories.rss', NULL, NULL, NULL, '2016-10-28 18:46:39');
INSERT INTO `mod_timeline` VALUES(4, 'Portfolio Timeline', 'timeline/portfolio', 'portfolio', 12, 0, 0, 'dual', NULL, NULL, NULL, NULL, NULL, '2016-10-28 18:46:39');
INSERT INTO `mod_timeline` VALUES(5, 'Facebook Timeline', 'timeline/news', 'facebook', 10, 0, 0, 'left', NULL, NULL, NULL, NULL, NULL, '2016-10-28 18:46:39');
INSERT INTO `mod_timeline` VALUES(6, 'Custom Timeline', 'timeline/custom_timeline', 'custom', 30, 10, 10, 'dual', NULL, NULL, NULL, NULL, NULL, '2016-10-28 18:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `mod_timeline_data`
--

DROP TABLE IF EXISTS `mod_timeline_data`;
CREATE TABLE IF NOT EXISTS `mod_timeline_data` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tid` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'timeline id',
  `type` varchar(30) DEFAULT NULL,
  `title_en` varchar(100) DEFAULT NULL,
  `body_en` text,
  `images` blob,
  `dataurl` varchar(250) DEFAULT NULL,
  `height` smallint(3) UNSIGNED NOT NULL DEFAULT '300',
  `readmore` varchar(200) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `tid` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mod_timeline_data`
--

INSERT INTO `mod_timeline_data` VALUES(5, 6, 'blog_post', 'HTML Support', '<div class="content-center"> <a><i class="twitter big circular inverted success icon link"></i></a> <a><i class="facebook big circular inverted info icon link"></i></a> <a><i class="google plus big circular inverted danger icon link"></i></a> <a><i class="pinterest big circular inverted warning icon link"></i></a> <a><i class="dribbble big circular inverted purple icon link"></i></a> </div>', NULL, NULL, 0, NULL, '2016-01-20 03:28:02');
INSERT INTO `mod_timeline_data` VALUES(6, 6, 'iframe', 'Google Maps', '', NULL, 'https://google.com/maps/embed?pb=!1m14!1m8!1m3!1d5774.551951139716!2d-79.38573735330591!3d43.64242624743821!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b34d68bf33a9b%3A0x15edd8c4de1c7581!2sCN+Tower!5e0!3m2!1sen!2sca!4v1422155824800', 300, '', '2016-01-18 16:30:00');
INSERT INTO `mod_timeline_data` VALUES(7, 6, 'iframe', 'Youtube Videos', NULL, NULL, '//youtube.com/embed/YvR8LGOUpNA', 300, NULL, '2016-01-18 04:26:23');
INSERT INTO `mod_timeline_data` VALUES(8, 6, 'blog_post', 'Image Slider', NULL, 0x5b2274696d656c696e655c2f67616c6c6572795f31312e6a7067222c2274696d656c696e655c2f67616c6c6572795f31322e6a7067222c2274696d656c696e655c2f67616c6c6572795f31332e6a7067222c2274696d656c696e655c2f67616c6c6572795f31342e6a7067222c2274696d656c696e655c2f67616c6c6572795f31352e6a7067222c2274696d656c696e655c2f67616c6c6572795f31362e6a7067225d, NULL, 300, NULL, '2016-01-25 04:29:15');
INSERT INTO `mod_timeline_data` VALUES(9, 6, 'gallery', 'Gallery Slider', '', 0x5b2274696d656c696e655c2f67616c6c6572795f31312e6a7067222c2274696d656c696e655c2f67616c6c6572795f31322e6a7067222c2274696d656c696e655c2f67616c6c6572795f31332e6a7067222c2274696d656c696e655c2f67616c6c6572795f31342e6a7067222c2274696d656c696e655c2f67616c6c6572795f31352e6a7067222c2274696d656c696e655c2f67616c6c6572795f31362e6a7067225d, NULL, 300, '', '2016-01-22 05:08:26');
INSERT INTO `mod_timeline_data` VALUES(10, 6, 'blog_post', 'Single Image Only', NULL, 0x5b2274696d656c696e652f64656d6f5f696d6167655f342e6a7067225d, NULL, 0, NULL, '2015-01-24 00:45:21');
INSERT INTO `mod_timeline_data` VALUES(11, 6, 'blog_post', 'Single Image With Text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales dapibus dui, sed iaculis metus facilisis sed. Curae; Pellentesque ullamcorper nisl id justo ultrices hendrerit', 0x5b2274696d656c696e652f64656d6f5f696d6167655f322e6a7067225d, NULL, 0, NULL, '2015-01-23 03:20:29');
INSERT INTO `mod_timeline_data` VALUES(12, 6, 'blog_post', 'Single Image With Read More', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales dapibus dui, sed iaculis metus facilisis sed. Curae; Pellentesque ullamcorper nisl id justo ultrices hendrerit</p>', 0x5b2274696d656c696e652f64656d6f5f696d6167655f332e6a7067225d, NULL, 300, '//wojoscripts.com', '2015-01-20 16:30:00');
INSERT INTO `mod_timeline_data` VALUES(13, 6, 'blog_post', 'Text Only', 'Duis dapibus aliquam mi, eget euismod sem scelerisque ut. Vivamus at elit quis urna adipiscing iaculis. Curabitur vitae velit in neque dictum blandit. Proin in iaculis neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur vitae velit in neque dictum blandit. Proin in iaculis neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas<br><br>Duis dapibus aliquam mi, eget euismod sem scelerisque ut. Vivamus at elit quis urna adipiscing iaculis. Curabitur vitae velit in neque dictum blandit. Proin in iaculis neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur vitae velit in neque dictum blandit. Proin in iaculis neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas', NULL, NULL, 0, NULL, '2015-01-22 03:24:25');
INSERT INTO `mod_timeline_data` VALUES(14, 6, 'blog_post', 'HTML Support', '<div class="content-center"> <a><i class="twitter big circular inverted green icon link"></i></a> <a><i class="facebook big circular inverted blue icon link"></i></a> <a><i class="google plus big circular inverted red icon link"></i></a> <a><i class="pinterest big circular inverted orange icon link"></i></a> <a><i class="dribbble big circular inverted purple icon url alt link"></i></a> </div>', NULL, NULL, 0, NULL, '2015-01-20 03:28:02');
INSERT INTO `mod_timeline_data` VALUES(15, 6, 'iframe', 'Google Maps', NULL, NULL, 'https://google.com/maps/embed?pb=!1m14!1m8!1m3!1d5774.551951139716!2d-79.38573735330591!3d43.64242624743821!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b34d68bf33a9b%3A0x15edd8c4de1c7581!2sCN+Tower!5e0!3m2!1sen!2sca!4v1422155824800', 300, NULL, '2015-01-19 03:44:22');
INSERT INTO `mod_timeline_data` VALUES(16, 6, 'iframe', 'Youtube Videos', NULL, NULL, '//youtube.com/embed/YvR8LGOUpNA', 300, NULL, '2015-01-18 04:26:23');
INSERT INTO `mod_timeline_data` VALUES(17, 6, 'blog_post', 'Image Slider', '', 0x5b2274696d656c696e655c2f67616c6c6572795f31312e6a7067222c2274696d656c696e655c2f67616c6c6572795f31322e6a7067222c2274696d656c696e655c2f67616c6c6572795f31332e6a7067222c2274696d656c696e655c2f67616c6c6572795f31342e6a7067222c2274696d656c696e655c2f67616c6c6572795f31352e6a7067222c2274696d656c696e655c2f67616c6c6572795f31362e6a7067225d, NULL, 300, '', '2015-01-24 16:30:00');
INSERT INTO `mod_timeline_data` VALUES(18, 6, 'gallery', 'Gallery Slider', NULL, 0x5b2274696d656c696e655c2f67616c6c6572795f31312e6a7067222c2274696d656c696e655c2f67616c6c6572795f31322e6a7067222c2274696d656c696e655c2f67616c6c6572795f31332e6a7067222c2274696d656c696e655c2f67616c6c6572795f31342e6a7067222c2274696d656c696e655c2f67616c6c6572795f31352e6a7067222c2274696d656c696e655c2f67616c6c6572795f31362e6a7067225d, NULL, 300, NULL, '2015-01-22 05:08:26');
INSERT INTO `mod_timeline_data` VALUES(19, 6, 'blog_post', 'Single Image Only', NULL, 0x5b2274696d656c696e652f64656d6f5f696d6167655f342e6a7067225d, NULL, 0, NULL, '2014-01-24 00:45:21');
INSERT INTO `mod_timeline_data` VALUES(20, 6, 'blog_post', 'Single Image With Text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales dapibus dui, sed iaculis metus facilisis sed. Curae; Pellentesque ullamcorper nisl id justo ultrices hendrerit', 0x5b2274696d656c696e652f64656d6f5f696d6167655f322e6a7067225d, NULL, 0, NULL, '2014-01-23 03:20:29');
INSERT INTO `mod_timeline_data` VALUES(21, 6, 'blog_post', 'Single Image With Read More', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales dapibus dui, sed iaculis metus facilisis sed. Curae; Pellentesque ullamcorper nisl id justo ultrices hendrerit', 0x5b2274696d656c696e652f64656d6f5f696d6167655f332e6a7067225d, NULL, 0, '//wojoscripts.com', '2014-01-21 03:25:30');
INSERT INTO `mod_timeline_data` VALUES(22, 6, 'blog_post', 'Text Only', 'Duis dapibus aliquam mi, eget euismod sem scelerisque ut. Vivamus at elit quis urna adipiscing iaculis. Curabitur vitae velit in neque dictum blandit. Proin in iaculis neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur vitae velit in neque dictum blandit. Proin in iaculis neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas<br><br>Duis dapibus aliquam mi, eget euismod sem scelerisque ut. Vivamus at elit quis urna adipiscing iaculis. Curabitur vitae velit in neque dictum blandit. Proin in iaculis neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur vitae velit in neque dictum blandit. Proin in iaculis neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas', NULL, NULL, 0, NULL, '2014-01-22 03:24:25');
INSERT INTO `mod_timeline_data` VALUES(23, 6, 'blog_post', 'HTML Support', '<div class="content-center"> <a><i class="twitter big circular inverted green icon link"></i></a> <a><i class="facebook big circular inverted blue icon link"></i></a> <a><i class="google plus big circular inverted red icon link"></i></a> <a><i class="pinterest big circular inverted orange icon link"></i></a> <a><i class="dribbble big circular inverted purple icon url alt link"></i></a> </div>', NULL, NULL, 0, NULL, '2014-01-20 03:28:02');
INSERT INTO `mod_timeline_data` VALUES(24, 6, 'iframe', 'Google Maps', NULL, NULL, 'https://google.com/maps/embed?pb=!1m14!1m8!1m3!1d5774.551951139716!2d-79.38573735330591!3d43.64242624743821!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b34d68bf33a9b%3A0x15edd8c4de1c7581!2sCN+Tower!5e0!3m2!1sen!2sca!4v1422155824800', 300, NULL, '2014-01-19 03:44:22');
INSERT INTO `mod_timeline_data` VALUES(25, 6, 'iframe', 'Youtube Videos', NULL, NULL, '//youtube.com/embed/YvR8LGOUpNA', 300, NULL, '2014-01-18 04:26:23');
INSERT INTO `mod_timeline_data` VALUES(26, 6, 'blog_post', 'Image Slider', NULL, 0x5b2274696d656c696e655c2f67616c6c6572795f31312e6a7067222c2274696d656c696e655c2f67616c6c6572795f31322e6a7067222c2274696d656c696e655c2f67616c6c6572795f31332e6a7067222c2274696d656c696e655c2f67616c6c6572795f31342e6a7067222c2274696d656c696e655c2f67616c6c6572795f31352e6a7067222c2274696d656c696e655c2f67616c6c6572795f31362e6a7067225d, NULL, 300, NULL, '2014-01-25 04:29:15');
INSERT INTO `mod_timeline_data` VALUES(27, 6, 'gallery', 'Gallery Slider', NULL, 0x5b2274696d656c696e655c2f67616c6c6572795f31312e6a7067222c2274696d656c696e655c2f67616c6c6572795f31322e6a7067222c2274696d656c696e655c2f67616c6c6572795f31332e6a7067222c2274696d656c696e655c2f67616c6c6572795f31342e6a7067222c2274696d656c696e655c2f67616c6c6572795f31352e6a7067222c2274696d656c696e655c2f67616c6c6572795f31362e6a7067225d, NULL, 300, NULL, '2014-01-22 05:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_en` varchar(200) NOT NULL,
  `slug_en` varchar(150) DEFAULT NULL,
  `caption_en` varchar(150) DEFAULT NULL,
  `is_admin` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `page_type` enum('normal','home','contact','login','activate','account','register','search','sitemap','profile') NOT NULL DEFAULT 'normal',
  `membership_id` varchar(20) NOT NULL DEFAULT '0',
  `is_comments` tinyint(1) NOT NULL DEFAULT '0',
  `custom_bg_en` varchar(100) DEFAULT NULL,
  `theme` varchar(60) DEFAULT NULL,
  `access` enum('Public','Registered','Membership') NOT NULL DEFAULT 'Public',
  `body_en` text,
  `jscode` text,
  `keywords_en` varchar(200) DEFAULT NULL,
  `description_en` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `created_by_name` varchar(80) DEFAULT NULL,
  `is_system` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` VALUES(1, 'Welcome To Cms pro', 'home', '', 1, 'home', '0', 0, NULL, NULL, 'Public', '<div class="section">\r\n  <div class="row">\r\n    <div class="columns"> %%slider/master|plugin|1|5%% </div>\r\n  </div>\r\n</div>\r\n<div class="wojo-grid">\r\n  <div class="row">\r\n    <div class="columns">\r\n<div class="wojo huge space divider"></div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<div class="wojo-grid">\r\n  <div class="row gutters">\r\n    <div class="columns mobile-100 phone-100">\r\n<div class="wojo icon header"> <i class="icon circular blue bar chart"></i>\r\n<div class="content"> AWESOME IDEAS\r\n<p class="wojo normal text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n</div>\r\n</div>\r\n    </div>\r\n    <div class="columns mobile-100 phone-100">\r\n<div class="wojo icon header"> <i class="icon circular green paper plane"></i>\r\n<div class="content"> FAST DELIVERY\r\n<p class="wojo normal text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n</div>\r\n</div>\r\n    </div>\r\n    <div class="columns mobile-100 phone-100">\r\n<div class="wojo icon header"> <i class="icon circular red maple leaf"></i>\r\n<div class="content"> MADE IN CANADA\r\n<p class="wojo normal text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n</div>\r\n</div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<div class="wojo-grid">\r\n  <div class="row">\r\n    <div class="columns">\r\n<div class="wojo huge space divider"></div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<div class="section" style="background-image: url([SITEURL]/uploads/images/bg-about.jpg); background-repeat: no-repeat;background-position: 100% 50%;background-size: cover;padding:100px 0px 100px 0px;">\r\n  <div class="wojo-grid">\r\n    <div class="row horizontal-gutters">\r\n<div class="columns screen-70 tablet-100 mobile-100 phone-100">\r\n<h3 class="wojo white text">WHY CHOOSE US</h3>\r\n<p class="vertical-margin wojo white text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna u Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis ae irure dolor in reprehenderit in voluptate velit esse cillum</p>\r\n<p class="vertical-margin wojo white text">dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis</p>\r\n<p><a href="[SITEURL]" class="wojo red button">Read More</a></p>\r\n</div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<div class="wojo-grid">\r\n  <div class="row gutters">\r\n    <div class="columns">\r\n<div class="wojo huge space divider"></div>\r\n<h2 class="wojo center aligned header">OUR SERVICES\r\n<p class="sub header">- Over 400 brand new pixel perfect font icons -</p>\r\n</h2>\r\n<div class="wojo space divider"></div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<div class="wojo-grid">\r\n  <div class="row gutters">\r\n    <div class="columns mobile-100 phone-100">\r\n<div class="wojo fitted icon message"> <i class="layer rounded icon"></i>\r\n<div class="content">\r\n<div class="header"> GRAPHIC DESIGN </div>\r\n</div>\r\n</div>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing a elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad .</p>\r\n    </div>\r\n    <div class="columns mobile-100 phone-100">\r\n<div class="wojo fitted icon message"> <i class="desktop rounded icon"></i>\r\n<div class="content">\r\n<div class="header"> WEB DESIGN </div>\r\n</div>\r\n</div>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing a elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad .</p>\r\n    </div>\r\n    <div class="columns mobile-100 phone-100">\r\n<div class="wojo fitted icon message"> <i class="camera rounded icon"></i>\r\n<div class="content">\r\n<div class="header"> PHOTOGRAPHY </div>\r\n</div>\r\n</div>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing a elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad .</p>\r\n    </div>\r\n  </div>\r\n</div>\r\n<div class="wojo-grid">\r\n  <div class="row gutters">\r\n    <div class="columns mobile-100 phone-100">\r\n<div class="wojo big space divider"></div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<div class="wojo-grid">\r\n  <div class="row gutters">\r\n    <div class="columns mobile-100 phone-100">\r\n<div class="wojo fitted icon message"> <i class="pencil rounded icon"></i>\r\n<div class="content">\r\n<div class="header"> TEXT EDITOR </div>\r\n</div>\r\n</div>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing a elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad .</p>\r\n    </div>\r\n    <div class="columns mobile-100 phone-100">\r\n<div class="wojo fitted icon message"> <i class="target rounded icon"></i>\r\n<div class="content">\r\n<div class="header"> TIRGET FILL UP </div>\r\n</div>\r\n</div>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing a elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad .</p>\r\n    </div>\r\n    <div class="columns mobile-100 phone-100">\r\n<div class="wojo fitted icon message"> <i class="clock rounded icon"></i>\r\n<div class="content">\r\n<div class="header"> TIME SHEDULE WORK </div>\r\n</div>\r\n</div>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing a elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad .</p>\r\n    </div>\r\n  </div>\r\n</div>\r\n<div class="wojo-grid">\r\n  <div class="row">\r\n    <div class="columns">\r\n<div class="wojo huge space divider"></div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<div class="section" style="padding:16px">\r\n  <div class="row">\r\n    <div class="columns"> %%gallery|module|12|1%% </div>\r\n  </div>\r\n</div>\r\n<div class="section" style="padding:64px 0px">\r\n  <div class="wojo-grid">\r\n    <div class="row">\r\n<div class="columns">\r\n<h2 class="wojo center aligned header">CLIENTS &amp; TESTIMONIALS\r\n<p class="sub header">- Create unlimited carousels, with built in carousel plugin -</p>\r\n</h2>\r\n<div class="wojo huge space divider"></div>\r\n%%carousel/testimonials|plugin|1|23%% </div>\r\n    </div>\r\n  </div>\r\n</div>', '', 'builder,mistaken,idea,denouncing,pleasure,praising,pain,give,complete,account,system,expound,actual,teachings,explorer,truth,master,human,happiness', 'Cms pro is a web content management system made for the peoples who don&#039;t have much technical knowledge of HTML or PHP but know how to use a simple notepad with computer keyboard', '2014-01-27 23:11:36', 1, 'Web Master', 1, 1);
INSERT INTO `pages` VALUES(2, 'A few words about us', 'what-is-cms-pro', 'We are the only professional consulting firm backed by a business association.', 0, 'normal', '0', 0, NULL, NULL, 'Public', '<div class="section" style="padding:100px 0px">\r\n  <div class="wojo-grid">\r\n    <div class="row gutters">\r\n<div class="columns mobile-100 phone-100">\r\n<h2 class="wojo header">ABOUT CMS PRO\r\n<p class="sub header">We are a single global partnership united by a strong set of values, focused on client impact and long term success.</p>\r\n</h2>\r\n<p class="padding-top">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor uFlabore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercr itation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>\r\n<p class="vertical-padding">cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proins sunt in culpa qui officia deserunt mollit anim id est laborum. </p>\r\n<p>\r\n<div class="wojo labeled button" tabindex="0">\r\n<div class="wojo red button"> <i class="heart icon"></i> Like </div>\r\n<a class="wojo basic red left pointing label"> 3,250 </a> </div>\r\n</p>\r\n</div>\r\n<div class="columns mobile-100 phone-100"> <img src="[SITEURL]/uploads/images/about.jpg" class="wojo image"alt=""> </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<div class="section" style="background-color:#F7F8FB;padding:100px 0px">\r\n  <div class="row">\r\n    <div class="columns">\r\n<h2 class="wojo center aligned header">OUR GREATFUL CLIENTS</h2>\r\n    </div>\r\n  </div>\r\n  <div class="wojo-grid">\r\n    <div class="row phone-block-1 mobile-block-1 tablet-block-2 screen-block-2 gutters">\r\n<div class="column">\r\n<div class="wojo basic icon message">\r\n<div class="wojo basic image"><img src="[SITEURL]/uploads/images/partner2.png"></div>\r\n<div class="content">\r\n  <div class="header"> Frank`s Co. </div>\r\n  <small>www.franksco.comp</small>\r\n  <p>We are open and transparent about the work we do and how we do it.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="column">\r\n<div class="wojo basic icon message">\r\n<div class="wojo basic image"><img src="[SITEURL]/uploads/images/partner3.png"></div>\r\n<div class="content">\r\n  <div class="header"> Retro Beats </div>\r\n  <small>www.retrobeats.comp</small>\r\n  <p>We commit to achieving demonstrable impact for our stakeholders.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="column">\r\n<div class="wojo basic icon message">\r\n<div class="wojo basic image"><img src="[SITEURL]/uploads/images/partner4.png"></div>\r\n<div class="content">\r\n  <div class="header"> Tourner </div>\r\n  <small>www.tourner.comp</small>\r\n  <p>We are awed by human resilience, and believe in the ability of all people to thrive.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="column">\r\n<div class="wojo basic icon message">\r\n<div class="wojo basic image"><img src="[SITEURL]/uploads/images/partner5.png"></div>\r\n<div class="content">\r\n  <div class="header"> Retro Press </div>\r\n  <small>www.retropress.comp</small>\r\n  <p>We believe that all people have the right to live in peaceful communities.</p>\r\n</div>\r\n</div>\r\n</div>\r\n    </div>\r\n  </div>\r\n</div>\r\n\r\n\r\n<div class="section" style="background-color:#323847;padding:80px 0 40px 0">\r\n  <div class="wojo-grid">\r\n    <div class="row double-gutters">\r\n<div class="columns mobile-100 phone-100">\r\n<h2 class="wojo inverted header">PROGRESS BARS\r\n<p class="sub header">- Cool looking progress bars -</p>\r\n</h2>\r\n<p class="vertical-padding inverted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ua labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>\r\n<div class="wojo teal mini inverted progress" data-percent="35">\r\n<div class="bar"></div>\r\n<div class="label">35% Funded</div>\r\n</div>\r\n<div class="wojo violet mini inverted progress" data-percent="92">\r\n<div class="bar"></div>\r\n<div class="label">32% Uploading</div>\r\n</div>\r\n<div class="wojo red mini inverted progress" data-percent="60">\r\n<div class="bar"></div>\r\n<div class="label">60% Earned</div>\r\n</div>\r\n<div class="wojo yellow tiny inverted progress" data-percent="81">\r\n<div class="bar"></div>\r\n<div class="label">81% To Go</div>\r\n</div>\r\n<div class="wojo green tiny inverted progress" data-percent="100">\r\n<div class="bar"></div>\r\n<div class="label">100% Completed</div>\r\n</div>\r\n</div>\r\n<div class="columns mobile-100 phone-100">\r\n<h2 class="wojo inverted header">YOUTUBE PLAYER\r\n<p class="sub header">- Crete unlimited youtube players with built in CMS Pro yplayer plugin -</p>\r\n</h2>\r\n<div class="wojo space divider"></div>\r\n%%yplayer/vertical|plugin|2|19%% </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n', NULL, '', '', '2014-01-28 23:11:36', 1, 'Web Master', 0, 1);
INSERT INTO `pages` VALUES(3, 'Our Contact Info', 'our-contact-info', 'Fugiat dapibus tellus ac cursus commodo', 1, 'normal', '0', 0, NULL, NULL, 'Public', '<div class="section" style="padding:64px 0px">\r\n  <div class="wojo-grid">\r\n    <div class="row gutters">\r\n<div class="columns screen-25 tablet-25 mobile-50 phone-100 content-center"> <i class="icon large rounded inverted marker red link"></i>\r\n<p class="half-vertical-padding">105 Main street, Toronto<br>\r\nON, CANADA</p>\r\n</div>\r\n<div class="columns screen-25 tablet-25 mobile-50 phone-100 phone-100 content-center"> <i class="icon large rounded inverted phone red link"></i>\r\n<p class="half-vertical-padding">1 (+800) 123 456 789 <br>\r\n+1(800) 123 456 789 000</p>\r\n</div>\r\n<div class="columns screen-25 tablet-25 mobile-50 phone-100 phone-100 content-center"> <i class="icon large rounded inverted email red link"></i>\r\n<p class="half-vertical-padding">info@domain.com<br>\r\nwww.domain.com</p>\r\n</div>\r\n<div class="columns screen-25 tablet-25 mobile-50 phone-100 phone-100 content-center"> <i class="icon large rounded inverted clock red link"></i>\r\n<p class="half-vertical-padding">Monday-Friday:9am to 5pm<br>\r\nSunday:Closed</p>\r\n</div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<div class="wojo-grid">\r\n  <div class="row gutters">\r\n    <div class="columns screen-50 phone-100"> %%gmaps/head-office|plugin|1|20%% </div>\r\n    <div class="columns screen-50 phone-100"> %%contact|plugin|1|5%% </div>\r\n  </div>\r\n</div>\r\n', '', '', '', '2010-07-23 16:11:55', 1, 'Web Master', 1, 1);
INSERT INTO `pages` VALUES(5, 'Demo Gallery Page', 'demo-gallery-page', 'Responsive fluid gallery...', 0, 'normal', '0', 0, NULL, NULL, 'Public', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut tempor eros. Proin bibendum, lacus vitae venenatis convallis, libero ipsum imperdiet sem, ac consequat massa risus vel sem. Nunc nec ante non arcu mattis viverra. Morbi accumsan, augue ac dignissim tempus, lacus libero molestie est, in eleifend lorem purus eu mauris. Nulla at metus a enim faucibus placerat vitae a justo. Maecenas rhoncus ante libero.</p> ', NULL, '', '', '2010-07-23 16:11:55', 1, 'Web Master', 0, 1);
INSERT INTO `pages` VALUES(6, 'Visual Forms', 'visual-forms', 'Responsive visual forms', 0, 'normal', '0', 0, NULL, NULL, 'Public', '<div class="wojo-grid">\r\n  <div class="row">\r\n    <div class="columns">\r\n<div class="wojo huge space divider"></div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<div class="wojo-grid">\r\n  <div class="row gutters">\r\n    <div class="columns"> %%forms|module|16|1%% </div>\r\n  </div>\r\n</div>', NULL, '', '', '2010-07-23 16:26:17', 1, 'Web Master', 0, 1);
INSERT INTO `pages` VALUES(7, 'Middle Column', 'middle-column', 'Featuring middle column only layout', 0, 'normal', '0', 0, '', NULL, 'Public', '<div class="wojo-grid">\r\n  <div class="row">\r\n    <div class="columns">\r\n<div class="wojo huge space divider"></div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<div class="wojo-grid">\r\n  <div class="row align-center">\r\n    <div class="columns screen-70 tablet-100 mobile-100 phone-100">\r\n<h2 class="wojo center aligned header">PAGE WITHOUT SIDEBAR CENTERED\r\n<p class="sub header">- Built with CMS Pro /Pagebuilder/ -</p>\r\n</h2>\r\n<div class="wojo space divider"></div>\r\n<p>Perhaps you are a new entrepreneur about to launch a business or innovation you have been dreaming about for years. Or maybe you have an established business and things are going well, or maybe even too well. In both instances you are going to need capital - the ''oxygen'' that every business needs to grow and prosper.</p>\r\n<div class="margin-top">\r\n<div class="content-center"><img alt="" src="[SITEURL]/uploads/images/demoimage2.jpg"></div>\r\n<div class="wojo small dimmed text content-center">We know how to help you</div>\r\n<p class="vertical-margin">So now you are writing your first business plan or touching up the old one in anticipation of raising capital. Capital can only come into a business in one of two ways. Capital that is generated internally through positive cash flow from business operations (e.g., selling stuff), or from external funding sources. The new entrepreneur is limited to only one option - external funding sources. </p>\r\n</div>\r\n<h4 class="wojo center aligned header">Latest Twitts\r\n<p class="sub header">- This plugin is included in CMS Pro core -</p>\r\n</h4>\r\n%%twitts|plugin|0|15%%\r\n<div class="wojo space divider"></div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<div style="background-color:#323847;padding:50px 0px 50px 0px;" class="section wojo white text">\r\n  <div class="wojo-grid">\r\n    <div class="row gutters">\r\n<div class="columns mobile-100 phone-100 mobile-content-center phone-content-center">\r\n<h3> ABOUT <span class="wojo primary text">CMS Pro</span> <i class="icon wojologo"></i></h3>\r\n<p>Cms pro is a web content management system made for the peoples who don''t have much technical knowledge of HTML or PHP but know how to use a simple notepad with computer keyboard.</p>\r\n</div>\r\n<div class="columns mobile-100 phone-100 content-right mobile-content-center phone-content-center">\r\n<h3>MENU</h3>\r\n<div class="wojo list">\r\n<div class="item"><a class="inverted" href="#">About us</a></div>\r\n<div class="item"><a class="inverted" href="#">Privacy Policy</a></div>\r\n<div class="item"><a class="inverted" href="#">Terms &amp; Conditions</a></div>\r\n<div class="item"><a class="inverted" href="#">Contacts</a></div>\r\n<div class="item"><a class="inverted" href="#">News</a></div>\r\n</div>\r\n</div>\r\n<div class="columns mobile-100 phone-100 content-right mobile-content-center phone-content-center">\r\n<h3>CONTACT US</h3>\r\n<p>24, Main Street, Toronto<br>\r\nOntario, Canada<br>\r\nPhone: 800 123 3456<br>\r\nFax: 800 123 3456<br>\r\nEmail: <a class="inverted" href="#">info@domain.com</a></p>\r\n</div>\r\n    </div>\r\n  </div>\r\n</div>', '', '', 'Aliquam vitae metus non elit laoreet varius. Pellentesque et enim lorem. Suspendisse potenti. Nam ut iaculis lectus. Ut et leo odio. In euismod lobortis nisi, eu placerat nisi laoreet a.\nCras lobortis lobortis elit, at pellentesque erat vulputate ac. Phasellus in sapien non elit semper pellentesque ut a turpis. Quisque mollis auctor feugiat. Fusce a nisi diam, eu dapibus nibh.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam a justo libero, aliquam auctor felis. Nulla a odio ut magna ultrices vestibulum.\nInteger urna magna, euismod sed pharetra eget, ornare in dolor. Etiam bibendum mi ut nisi facilisis lobortis. Phasellus turpis orci, interdum adipiscing aliquam ut, convallis volutpat tellus. Nunc massa nunc, dapibus eget scelerisque ac, eleifend eget ligula. Maecenas accumsan tortor in quam adipiscing hendrerit. Donec ac risus nec est molestie malesuada ac id risus. In hac habitasse platea dictumst. In quam dui, blandit id interdum id, facilisis a leo.\nNullam fringilla quam pharetra enim interdum accumsan. Phasellus nec euismod quam. Donec tempor accumsan posuere. Phasellus ac metus orci, ac venenatis magna. Suspendisse sit amet odio at enim ultricies pellentesque eget ac risus. Vestibulum eleifend odio ut tellus faucibus malesuada feugiat nisi rhoncus. Proin nec sem ut augue placerat blandit ut ut orci. Cras aliquet venenatis enim, quis rutrum urna sollicitudin vel.', '2010-07-23 16:40:19', 1, 'Web Master', 0, 1);
INSERT INTO `pages` VALUES(8, 'Right Sidebar', 'right-sidebar', 'Right sidebar demo page', 0, 'normal', '0', 0, '', NULL, 'Public', '<div class="wojo-grid">\n  <div class="row">\n    <div class="columns">\n<div class="wojo huge space divider"></div>\n    </div>\n  </div>\n</div>\n<div class="wojo-grid">\n  <div class="row gutters">\n    <div class="columns screen-70 tablet-60 mobile-50 phone-100">\n<h2 class="wojo center aligned header">PAGE WITH RIGHT SIDEBAR\n<p class="sub header">- Built with CMS Pro /Pagebuilder/ -</p>\n</h2>\n<div class="wojo space divider"></div>\n<p>Perhaps you are a new entrepreneur about to launch a business or innovation you have been dreaming about for years. Or maybe you have an established business and things are going well, or maybe even too well. In both instances you are going to need capital - the ''oxygen'' that every business needs to grow and prosper. </p>\n<div class="margin-top"> <img alt="" src="[SITEURL]/uploads/images/demoimage2.jpg">\n<div class="wojo small dimmed text content-center">We know how to help you</div>\n<p class="vertical-margin">So now you are writing your first business plan or touching up the old one in anticipation of raising capital. Capital can only come into a business in one of two ways. Capital that is generated internally through positive cash flow from business operations (e.g., selling stuff), or from external funding sources. The new entrepreneur is limited to only one option - external funding sources. </p>\n</div>\n<h4 class="wojo center aligned header">CONTACT US\n<p class="sub header">- Place contact plugin on any page -</p>\n</h4>\n<div class="wojo large space divider"></div>\n<div class="row gutters">\n<div class="columns">%%contact|plugin|1|0%% </div>\n</div>\n    </div>\n    <div class="columns screen-30 tablet-40 mobile-50 phone-100">\n<div class="wojo plugin fitted primary segment">\n<div class="content-center half-padding">\n<h3>About Us</h3>\n</div>\n<a href="[SITEURL]/uploads/images/services1.jpg" class="lightbox"><img alt="" src="[SITEURL]/uploads/images/services1.jpg"></a>\n<div class="content-center vertical-margin half-padding">\n<p class="padding-bottom">Our business solutions are designed around the real needs of businesses, our information resources, tools and... </p>\n<p class="padding-bottom"><a class="wojo red button" href="[SITEURL]/page/what-is-cms-pro/">learn more</a></p>\n</div>\n</div>\n     %%adblock/wojo-advert|plugin|1|21%%\n    \n\n%%blog/latest|plugin|0|27%%\n\n    \n   \n     </div>\n  </div>\n</div>\n<div style="background-color:#323847;padding:50px 0px 50px 0px;" class="section wojo white text">\n  <div class="wojo-grid">\n    <div class="row gutters">\n<div class="columns mobile-100 phone-100 mobile-content-center phone-content-center">\n<h3> ABOUT <span class="wojo primary text">CMS Pro</span> <i class="icon wojologo"></i></h3>\n<p>Cms pro is a web content management system made for the peoples who don''t have much technical knowledge of HTML or PHP but know how to use a simple notepad with computer keyboard.</p>\n</div>\n<div class="columns mobile-100 phone-100 content-right mobile-content-center phone-content-center">\n<h3>MENU</h3>\n<div class="wojo list">\n<div class="item"><a class="inverted" href="#">About us</a></div>\n<div class="item"><a class="inverted" href="#">Privacy Policy</a></div>\n<div class="item"><a class="inverted" href="#">Terms &amp; Conditions</a></div>\n<div class="item"><a class="inverted" href="#">Contacts</a></div>\n<div class="item"><a class="inverted" href="#">News</a></div>\n</div>\n</div>\n<div class="columns mobile-100 phone-100 content-right mobile-content-center phone-content-center">\n<h3>CONTACT US</h3>\n<p>24, Main Street, Toronto<br>\nOntario, Canada<br>\nPhone: 800 123 3456<br>\nFax: 800 123 3456<br>\nEmail: <a class="inverted" href="#">info@domain.com</a></p>\n</div>\n    </div>\n  </div>\n</div>', '', '', '', '2010-08-10 18:06:58', 1, 'Web Master', 0, 1);
INSERT INTO `pages` VALUES(9, 'Members Only', 'members-only', '', 0, 'normal', '0', 0, '', NULL, 'Registered', '<p><span style="font-weight: bold; font-style: italic;">This page is for Registered users only</span></p>', '', '', '', '2011-05-20 11:28:29', 1, 'Web Master', 0, 1);
INSERT INTO `pages` VALUES(10, 'Membership Only', 'membership-only', '', 0, 'normal', '2,4', 0, '', NULL, 'Membership', '<p><em><strong>This page can be accessed with valid membership only!</strong></em></p>', '', '', '', '2011-05-20 11:28:48', 1, 'Web Master', 0, 1);
INSERT INTO `pages` VALUES(11, 'Event Manager Demo', 'event-calendar-demo', '', 0, 'normal', '0', 0, NULL, NULL, 'Public', '<div class="wojo-grid">\r\n  <div class="row gutters">\r\n    <div class="columns">\r\n<div class="vertical-padding"> %%events|module|0|4%% </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<div style="background-color:#323847;padding:50px 0px 50px 0px;" class="section wojo white text">\r\n  <div class="wojo-grid">\r\n    <div class="row gutters">\r\n<div class="columns mobile-100 phone-100 mobile-content-center phone-content-center">\r\n<h3> ABOUT <span class="wojo primary text">CMS Pro</span> <i class="icon wojologo"></i></h3>\r\n<p>Cms pro is a web content management system made for the peoples who don''t have much technical knowledge of HTML or PHP but know how to use a simple notepad with computer keyboard.</p>\r\n</div>\r\n<div class="columns mobile-100 phone-100 content-right mobile-content-center phone-content-center">\r\n<h3>MENU</h3>\r\n<div class="wojo list">\r\n<div class="item"><a class="inverted" href="#">About us</a></div>\r\n<div class="item"><a class="inverted" href="#">Privacy Policy</a></div>\r\n<div class="item"><a class="inverted" href="#">Terms &amp; Conditions</a></div>\r\n<div class="item"><a class="inverted" href="#">Contacts</a></div>\r\n<div class="item"><a class="inverted" href="#">News</a></div>\r\n</div>\r\n</div>\r\n<div class="columns mobile-100 phone-100 content-right mobile-content-center phone-content-center">\r\n<h3>CONTACT US</h3>\r\n<p>24, Main Street, Toronto<br>\r\nOntario, Canada<br>\r\nPhone: 800 123 3456<br>\r\nFax: 800 123 3456<br>\r\nEmail: <a class="inverted" href="#">info@domain.com</a></p>\r\n</div>\r\n    </div>\r\n  </div>\r\n</div>\r\n', NULL, 'Event calendar', '', '2012-01-02 23:05:43', 1, 'Web Master', 0, 1);
INSERT INTO `pages` VALUES(12, 'Page With Comments', 'page-with-comments', 'Comments Demo', 0, 'normal', '0', 1, '', NULL, 'Public', '<div class="wojo-grid">\r\n  <div class="row">\r\n    <div class="columns">\r\n<div class="wojo huge space divider"></div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<div class="wojo-grid">\r\n  <div class="row">\r\n    <div class="columns">\r\n<h2 class="wojo center aligned header">PAGE WITH DEMO COMMENTS\r\n<p class="sub header">- Built with CMS Pro /Pagebuilder/ -</p>\r\n</h2>\r\n<div class="wojo huge space divider"></div>\r\n<p>Perhaps you are a new entrepreneur about to launch a business or innovation you have been dreaming about for years. Or maybe you have an established business and things are going well, or maybe even too well. In both instances you are going to need capital - the ''oxygen'' that every business needs to grow and prosper.</p>\r\n<div class="wojo space divider"></div>\r\n<div class="row gutters">\r\n<div class="columns"><img alt="" src="[SITEURL]/uploads/images/demoimage2.jpg"></div>\r\n<div class="columns"><img alt="" src="[SITEURL]/uploads/images/demoimage2.jpg"></div>\r\n</div>\r\n<p>So now you are writing your first business plan or touching up the old one in anticipation of raising capital. Capital can only come into a business in one of two ways. Capital that is generated internally through positive cash flow from business operations (e.g., selling stuff), or from external funding sources. The new entrepreneur is limited to only one option - external funding sources. </p>\r\n    </div>\r\n  </div>\r\n</div>', '', '', '', '2012-01-02 23:08:46', 1, 'Web Master', 0, 1);
INSERT INTO `pages` VALUES(13, 'Left Sidebar', 'left-sidebar', 'Left sidebar demo page', 0, 'normal', '0', 0, '', NULL, 'Public', '<div class="wojo-grid">\r\n  <div class="row">\r\n    <div class="columns">\r\n<div class="wojo huge space divider"></div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<div class="wojo-grid">\r\n  <div class="row gutters">\r\n    <div class="columns screen-30 tablet-40 mobile-50 phone-100">\r\n<div class="wojo plugin fitted primary segment">\r\n<div class="content-center half-padding">\r\n<h3>About Us</h3>\r\n</div>\r\n<a href="[SITEURL]/uploads/images/services1.jpg" class="lightbox"><img alt="" src="[SITEURL]/uploads/images/services1.jpg"></a>\r\n<div class="content-center vertical-margin half-padding">\r\n<p class="padding-bottom">Our business solutions are designed around the real needs of businesses, our information resources, tools and... </p>\r\n<p class="padding-bottom"><a class="wojo red button" href="[SITEURL]/page/what-is-cms-pro/">learn more</a></p>\r\n</div>\r\n</div>\r\n%%upevent|plugin|0|16%%\r\n%%adblock/wojo-advert|plugin|1|21%% </div>\r\n    <div class="columns screen-70 tablet-60 mobile-50 phone-100">\r\n<h2 class="wojo center aligned header">PAGE WITH LEFT SIDEBAR\r\n<p class="sub header">- Built with CMS Pro /Pagebuilder/ -</p>\r\n</h2>\r\n<div class="wojo space divider"></div>\r\n<p>Perhaps you are a new entrepreneur about to launch a business or innovation you have been dreaming about for years. Or maybe you have an established business and things are going well, or maybe even too well. In both instances you are going to need capital - the ''oxygen'' that every business needs to grow and prosper.</p>\r\n<div class="margin-top"> <img alt="" src="[SITEURL]/uploads/images/demoimage1.jpg">\r\n<div class="wojo small dimmed text content-center">We know how to help you</div>\r\n<p class="vertical-margin">So now you are writing your first business plan or touching up the old one in anticipation of raising capital. Capital can only come into a business in one of two ways. Capital that is generated internally through positive cash flow from business operations (e.g., selling stuff), or from external funding sources. The new entrepreneur is limited to only one option - external funding sources. </p>\r\n</div>\r\n<h4 class="wojo center aligned header">POLL AND DONATION\r\n<p class="sub header">- Both of these plugins are included -</p>\r\n</h4>\r\n<div class="wojo large space divider"></div>\r\n<div class="row gutters">\r\n<div class="columns tablet-100 mobile-100 phone-100"> %%donation/paypal|plugin|1|13%% </div>\r\n<div class="columns tablet-100 mobile-100 phone-100"> %%poll/install|plugin|1|3%% </div>\r\n</div>\r\n<h4 class="wojo center aligned header">ALL OUR CLIENTS\r\n<p class="sub header">- Built with carousel plugin -</p>\r\n</h4>\r\n<div class="wojo large space divider"></div>\r\n<div class="row gutters">\r\n<div class="columns"> %%carousel/clients|plugin|2|26%% </div>\r\n</div>\r\n    </div>\r\n  </div>\r\n</div>', '', 'testimonials,carousel,plugin', '\n\n\n\nCLIENTS &amp; TESTIMONIALS\n- Create unlimited carousels, with built in carousel plugin -\n\n%%carousel/testimonials|plugin|1|23%%\n\n\n', '2012-01-02 23:08:53', 1, 'Web Master', 0, 1);
INSERT INTO `pages` VALUES(14, 'Video Slider', 'video-slider', NULL, 0, 'normal', '0', 0, NULL, NULL, 'Public', '<p> Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur <span class="wojo info label">This plugin is included in CMS pro v4.0</span> aut perferendis doloribus asperiores repellat accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque. </p> <p> In erat. Pellentesque erat. Mauris vehicula vestibulum justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla pulvinar est. Integer urna. Pellentesque pulvinar dui a magna. Nulla facilisi. Proin imperdiet. Aliquam ornare, metus vitae gravida dignissim, nisi nisl ultricies felis, ac tristique enim pede eget elit. Integer non erat nec turpis sollicitudin malesuada. Vestibulum dapibus. Nulla facilisi. Nulla iaculis, leo sit amet mollis luctus, sapien eros consectetur dolor, eu faucibus elit nibh eu nibh. Maecenas lacus pede, lobortis non, rhoncus id, tristique a, mi. Cras auctor libero vitae sem vestibulum euismod. Nunc fermentum. </p> <p> Aliquam ornare, metus vitae gravida dignissim, nisi nisl ultricies felis, ac tristique enim pede eget elit. Integer non erat nec turpis sollicitudin malesuada. Vestibulum dapibus </p> <blockquote class="pullquote alignright"> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p> </blockquote> <p> Integer fermentum elit in tellus. Integer ligula ipsum, gravida aliquet, fringilla non, interdum eget, ipsum. Praesent id dolor non erat viverra volutpat. Fusce tellus libero, luctus adipiscing, tincidunt vel, egestas vitae, eros. Vestibulum mollis, est id rhoncus volutpat, dolor velit tincidunt neque, vitae pellentesque ante sem eu nisl. eget convallis mauris ante quis magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean et libero. Nam aliquam. Quisque vitae tortor id neque dignissim laoreet. </p><p>Duis eu ante. Integer at sapien. Praesent sed nisl tempor est pulvinar tristique. Maecenas non lorem quis mi laoreet adipiscing. Sed ac arcu. Sed tincidunt libero eu dolor. Cras pharetra posuere eros. Donec ac eros id diam tempor faucibus. Fusce feugiat consequat nulla. Vestibulum tincidunt vulputate ipsum. </p> <h2>Praesent metus velit, imperdiet a aliquam et, imperdiet ac dolor.</h2> <p>Vivamus commodo turpis vitae ligula luctus malesuada. Quisque non turpis ac felis molestie bibendum nec eget sem. Mauris feugiat pretium est, at iaculis est. Integer nec eros velit. Aenean rutrum, sapien non consectetur gravida, lectus velit tristique ligula, vel sagittis est nulla et velit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed porttitor tincidunt urna, vel placerat dui commodo a. Integer placerat arcu et neque sollicitudin vestibulum. Etiam ullamcorper sodales lectus, non condimentum nisi vehicula ut. Fusce pretium nisi purus, vitae blandit velit accumsan non. In ultricies rhoncus nunc, et lobortis erat dapibus in. Ut nec diam non nulla bibendum ornare. Maecenas porta pharetra consequat. Proin pulvinar viverra dictum.</p> <ul class="wojo list"> <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li> <li>Donec scelerisque ante tempus nisi congue porttitor.</li> <li>Morbi eu diam semper, elementum turpis eu, egestas magna.</li> <li>Nulla eget est ut risus molestie varius.</li> </ul>', NULL, '', '', '2012-01-02 23:09:08', 1, 'Web Master', 0, 1);
INSERT INTO `pages` VALUES(15, 'Login Page', 'login', NULL, 1, 'login', '0', 0, NULL, NULL, 'Public', NULL, NULL, '', '', '2014-04-27 18:11:36', 1, 'Web Master', 1, 1);
INSERT INTO `pages` VALUES(16, 'User Registration', 'registration', NULL, 1, 'register', '0', 0, NULL, NULL, 'Public', NULL, NULL, '', '', '2014-04-27 21:22:53', 1, 'Web Master', 1, 1);
INSERT INTO `pages` VALUES(17, 'Account Acctivation', 'activate', '', 1, 'activate', '0', 0, NULL, NULL, 'Public', NULL, NULL, '', '', '2014-04-28 09:08:29', 1, 'Web Master', 1, 1);
INSERT INTO `pages` VALUES(18, 'User Dashboard', 'dashboard', NULL, 1, 'account', '0', 0, NULL, NULL, 'Public', NULL, NULL, '', '', '2014-04-28 10:06:43', 1, 'Web Master', 1, 1);
INSERT INTO `pages` VALUES(19, 'Search Results', 'search', '', 1, 'search', '0', 0, '', NULL, 'Public', NULL, '', '', '', '2014-04-29 19:32:44', 1, 'Web Master', 1, 1);
INSERT INTO `pages` VALUES(20, 'Sitemap', 'sitemap', NULL, 1, 'sitemap', '0', 0, NULL, NULL, 'Public', NULL, NULL, '', '', '2014-05-08 13:00:53', 1, 'Web Master', 1, 1);
INSERT INTO `pages` VALUES(21, 'Slider Manager', 'slider-manager', 'Responsive multiple sliders', 0, 'normal', '0', 0, NULL, NULL, 'Public', '<p> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam a justo libero, aliquam auctor felis. Nulla a odio ut magna ultrices vestibulum. Integer urna magna, euismod sed pharetra eget, ornare in dolor. Etiam bibendum mi ut nisi facilisis lobortis. Phasellus turpis orci, interdum adipiscing aliquam ut, convallis volutpat tellus. </p> <hr> <p> Pellentesque et enim lorem. Suspendisse potenti. Nam ut iaculis lectus. Ut et leo odio. In euismod lobortis nisi, eu placerat nisi laoreet a. Cras lobortis lobortis elit, at pellentesque erat vulputate ac. Phasellus in sapien non elit semper pellentesque ut a turpis. Quisque mollis auctor feugiat. Fusce a nisi diam, eu dapibus nibh. </p><hr> <div class="two columns gutters"> <div class="row"> <h3>What do we do?</h3> <div class="accordion"> <div class="header"> <i class="icon lab"></i> Webdesign </div> <div class="content"> <p> Quisque sagittis consequat elit non scelerisque. Cum sociis natoque et magnis dis montes, nascetur ridiculus mus. Sed sed leo, et risus consequat. </p> </div> <div class="header"> <i class="icon setting"></i> Web Dewelopment </div> <div class="content"> <p> Quisque sagittis consequat elit non scelerisque. Cum sociis natoque et magnis dis montes, nascetur ridiculus mus. Sed sed leo, et risus. </p> </div> <div class="header"> <i class="icon umbrella"></i> Responsivness </div> <div class="content"> <p> Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed leo, et risus. Mauris tincidunt interdum adipiscing. Cum sociis natoque et magnis dis montes, nascetur ridiculus mus.. </p> <p> Phasellus dolor enim, faucibus egestas scelerisque. Cum sociis natoque et magnis dis montes nascetur. </p> </div> <div class="header"> <i class="icon star"></i> Internet Marketing </div> <div class="content"> <p> Quisque sagittis consequat elit non scelerisque. Cum sociis natoque et magnis dis montes, nascetur ridiculus mus. Sed sed leo, et risus. Sed sed leo risus mauris. </p> </div> </div> </div> <div class="row"> <h3>Skills and expertise</h3> <h4 class="wojo info header">Web Design <span class="push-right">92%</span></h4> <div data-percent="92" class="wojo thin striped info progress"> <div class="bar"> </div> </div> <h4 class="wojo purple header">jQuery <span class="push-right">74%</span></h4> <div data-percent="74" class="wojo thin striped purple progress"> <div class="bar"> </div> </div> <h4 class="wojo warning header">PHP<span class="push-right">85%</span></h4> <div data-percent="85" class="wojo thin striped warning progress"> <div class="bar"> </div> </div> <h4 class="wojo success header">SEO Optimisation <span class="push-right">75%</span></h4> <div data-percent="75" class="wojo thin striped success progress"> <div class="bar"> </div> </div> <h4 class="wojo negative header">Marketing &amp; PR <span class="push-right">63%</span></h4> <div data-percent="63" class="wojo thin striped negative progress"> <div class="bar"> </div> </div> </div> </div>', NULL, '', '', '2014-05-27 13:02:13', 1, 'Web Master', 0, 1);
INSERT INTO `pages` VALUES(22, 'Demo F.A.Q', 'demo-faq', 'Browse our help section', 0, 'normal', '0', 1, '', NULL, 'Public', '<div class="wojo big space divider"></div>\r\n<div class="wojo-grid">\r\n  <div class="row gutters">\r\n    <div class="columns"> %%faq|module|24|0%% </div>\r\n  </div>\r\n</div>', '', '', '', '2014-06-02 17:06:27', 1, 'Web Master', 0, 1);
INSERT INTO `pages` VALUES(23, 'Profile', 'profile', 'Public User Profile', 0, 'profile', '0', 0, NULL, NULL, 'Public', NULL, NULL, '', '', '2014-11-14 18:27:25', 1, 'Web Master', 1, 1);
INSERT INTO `pages` VALUES(24, 'Timeline Blog Demo', 'timeline-blog-demo', 'Timline demo and Blog Manager', 0, 'normal', '0', 0, NULL, NULL, 'Public', '<div class="wojo-grid">\r\n  <div class="row gutters">\r\n    <div class="columns"> %%timeline/blog_timeline|module|18|1%% </div>\r\n  </div>\r\n</div>\r\n', NULL, '', '', '2015-01-21 00:43:27', 1, 'Web Master', 0, 1);
INSERT INTO `pages` VALUES(25, 'Timeline Event Demo', 'timeline-event-demo', 'Timline demo and Event Manager', 0, 'normal', '0', 0, NULL, NULL, 'Public', '<div class="wojo-grid">\r\n  <div class="row gutters">\r\n    <div class="columns"> %%timeline/custom_timeline|module|19|2%% </div>\r\n  </div>\r\n</div>\r\n', NULL, '', '', '2015-01-23 01:16:40', 1, 'Web Master', 0, 1);
INSERT INTO `pages` VALUES(27, 'Timeline Portfolio Demo', 'timeline-portfolio-demo', 'Timline demo and Portfolio Module', 0, 'normal', '0', 0, NULL, NULL, 'Public', '<div class="wojo-grid">\r\n  <div class="row gutters">\r\n    <div class="columns"> %%timeline/portfolio_timeline|module|21|4%% </div>\r\n  </div>\r\n</div>\r\n', NULL, '', '', '2015-01-23 18:08:19', 1, 'Web Master', 0, 1);
INSERT INTO `pages` VALUES(26, 'Timeline Rss Demo', 'timeline-rss-demo', 'Timline demo and Rss Feed', 0, 'normal', '0', 0, NULL, NULL, 'Public', '<div class="wojo-grid">\r\n  <div class="row gutters">\r\n    <div class="columns"> %%timeline/rss_timeline|module|20|3%% </div>\r\n  </div>\r\n</div>\r\n', NULL, '', '', '2015-01-22 17:31:30', 1, 'Web Master', 0, 1);
INSERT INTO `pages` VALUES(29, 'Timeline Custom', 'timeline-custom-demo', 'Timeline demo custom', 0, 'normal', '0', 0, NULL, NULL, 'Public', '<div class="wojo-grid">\r\n  <div class="row gutters">\r\n    <div class="columns"> %%timeline/custom_timeline|module|23|6%% </div>\r\n  </div>\r\n</div>\r\n', NULL, '', '', '2015-01-23 19:35:50', 1, 'Web Master', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `txn_id` varchar(50) DEFAULT NULL,
  `membership_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `rate_amount` decimal(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `tax` decimal(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `coupon` decimal(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `total` decimal(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `currency` varchar(4) DEFAULT NULL,
  `pp` varchar(20) NOT NULL DEFAULT 'Stripe',
  `ip` varbinary(16) DEFAULT '000.000.000.000',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_membership` (`membership_id`),
  KEY `idx_user` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

DROP TABLE IF EXISTS `plugins`;
CREATE TABLE IF NOT EXISTS `plugins` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_en` varchar(120) NOT NULL,
  `body_en` text,
  `jscode` text,
  `show_title` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `alt_class` varchar(30) DEFAULT NULL,
  `system` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `cplugin` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `info_en` varchar(150) DEFAULT NULL,
  `plugalias` varchar(50) DEFAULT NULL,
  `hasconfig` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `multi` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `plugin_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `groups` varchar(20) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `icon` varchar(60) DEFAULT NULL,
  `ver` decimal(4,2) NOT NULL DEFAULT '1.00',
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_plugin_id` (`plugin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plugins`
--

INSERT INTO `plugins` VALUES(1, 'Universal Slider', NULL, NULL, 0, NULL, 1, 0, NULL, 'slider', 1, 1, 0, 0, 'slider', '2016-06-18 06:28:53', 'slider/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(2, 'Ajax Poll', NULL, NULL, 0, NULL, 1, 1, NULL, 'poll', 1, 1, 0, 0, 'poll', '2016-06-18 06:30:15', 'poll/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(3, 'How do you find CMS pro! Installation?', NULL, NULL, 0, 'primary', 1, 1, NULL, 'poll/install', 0, 0, 2, 1, 'poll', '2016-06-18 06:31:45', 'poll/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(4, 'What is the best CMS?', NULL, NULL, 0, NULL, 1, 0, NULL, 'poll/cms', 0, 0, 2, 2, 'poll', '2016-06-18 06:36:05', 'poll/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(5, 'Image Slider', NULL, NULL, 0, NULL, 1, 1, NULL, 'slider/master', 0, 0, 1, 1, 'slider', '2016-06-18 06:36:35', 'slider/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(6, 'Carousel Slider', NULL, NULL, 0, NULL, 1, 1, NULL, 'slider', 0, 0, 1, 2, 'slider', '2016-06-18 06:36:56', 'slider/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(7, 'Content Slider', NULL, NULL, 0, NULL, 1, 1, NULL, 'slider', 0, 0, 1, 3, 'slider', '2016-06-18 06:37:15', 'slider/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(8, 'Sync Slider', NULL, NULL, 0, NULL, 1, 1, NULL, 'slider', 0, 0, 1, 4, 'slider', '2016-06-18 07:47:50', 'slider/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(9, 'Rss Feed', NULL, NULL, 0, NULL, 1, 1, NULL, 'rss', 1, 1, 0, 0, 'rss', '2016-09-30 16:58:22', 'rss/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(10, 'CTV Top Stories', NULL, NULL, 0, NULL, 1, 0, NULL, 'rss/ctv', 0, 0, 9, 1, 'rss', '2016-10-01 07:44:52', 'rss/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(11, 'Yahoo Feed', NULL, NULL, 0, NULL, 1, 0, NULL, 'rss/yahoo', 0, 0, 9, 2, 'rss', '2016-10-01 07:46:22', 'rss/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(12, 'Donate', NULL, NULL, 0, NULL, 1, 1, NULL, 'donation', 1, 1, 0, 0, 'donation', '2016-10-02 09:14:27', 'donation/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(13, 'Paypal Donations', 'Help us raise $150 with a matching gift opportunity.', NULL, 1, NULL, 1, 0, NULL, 'donation/paypal', 0, 0, 12, 1, 'donation', '2016-10-02 11:20:02', 'donation/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(14, 'Paypal Donations II', NULL, NULL, 0, NULL, 1, 0, NULL, 'donation/paypal_alt', 0, 0, 12, 2, 'donation', '2016-10-02 11:20:46', 'donation/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(15, 'Latest Twitts', NULL, NULL, 0, NULL, 1, 1, NULL, 'twitts', 1, 0, 0, 0, 'twitts', '2016-10-02 18:31:04', 'twitts/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(16, 'Upcoming Events', NULL, NULL, 1, NULL, 1, 1, NULL, 'upevent', 1, 0, 0, 0, 'upevent', '2016-10-18 15:30:27', 'upevent/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(17, 'Youtube Player', NULL, NULL, 0, NULL, 1, 0, NULL, 'yplayer', 1, 1, 0, 0, 'yplayer', '2016-10-19 13:53:43', 'yplayer/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(18, 'Horizontal Player', NULL, NULL, 0, NULL, 1, 1, NULL, 'yplayer/horizontal', 0, 0, 17, 1, 'yplayer', '2016-10-19 20:14:25', 'yplayer/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(19, 'Vertical Player', NULL, NULL, 0, NULL, 1, 1, NULL, 'yplayer/vertical', 0, 0, 17, 2, 'yplayer', '2016-10-19 20:17:27', 'yplayer/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(20, 'Head Office', NULL, NULL, 0, NULL, 1, 1, NULL, 'gmaps/head-office', 0, 0, 0, 1, 'gmaps', '2016-11-22 16:22:56', 'gmaps/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(21, 'Default Campaign', NULL, '', 0, '', 1, 1, '', 'adblock/wojo-advert', 0, 0, 0, 1, 'adblock', '2016-12-30 19:02:28', 'adblock/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(22, 'Universal Carousel', NULL, NULL, 0, NULL, 1, 0, NULL, 'carousel', 1, 1, 0, 0, 'carousel', '2017-01-11 16:19:47', 'carousel/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(23, 'Testimonials', NULL, NULL, 0, NULL, 1, 1, NULL, 'carousel/testimonials', 0, 0, 22, 1, 'carousel', '2017-01-11 17:55:40', 'carousel/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(24, 'Footer', '<div class="section wojo white text" style="background-color:#323847;padding:50px 0px 20px 0px;">\r\n  <div class="wojo-grid">\r\n    <div class="row gutters">\r\n<div class="columns mobile-100 phone-100 mobile-content-center phone-content-center">\r\n<h3> ABOUT <span class="wojo primary text">CMS Pro</span> <i class="icon wojologo"></i></h3>\r\n<p>Cms pro is a web content management system made for the peoples who don''t have much technical knowledge of HTML or PHP but know how to use a simple notepad with computer keyboard.</p>\r\n</div>\r\n<div class="columns mobile-100 phone-100 content-right mobile-content-center phone-content-center">\r\n<h3>MENU</h3>\r\n<div class="wojo list">\r\n<div class="item"><a href="#" class="inverted">About us</a></div>\r\n<div class="item"><a href="#" class="inverted">Privacy Policy</a></div>\r\n<div class="item"><a href="#" class="inverted">Terms &amp; Conditions</a></div>\r\n<div class="item"><a href="#" class="inverted">Contacts</a></div>\r\n<div class="item"><a href="#" class="inverted">News</a></div>\r\n</div>\r\n</div>\r\n<div class="columns mobile-100 phone-100 content-right mobile-content-center phone-content-center">\r\n<h3>CONTACT US</h3>\r\n<p>24, Main Street, Toronto<br>\r\nOntario, Canada<br>\r\nPhone: 800 123 3456<br>\r\nFax: 800 123 3456<br>\r\nEmail: <a href="#" class="inverted">info@domain.com</a></p>\r\n</div>\r\n    </div>\r\n  </div>\r\n</div>', '', 0, '', 0, 0, '', NULL, 0, 0, 0, 0, NULL, '2017-01-13 18:33:21', NULL, '1.00', 1);
INSERT INTO `plugins` VALUES(25, 'About Us', '<div class="sidebar-module">\r\n  <h4>about us</h4>\r\n  <div class="thumbnail-3 thumbnail-mod-2"><img alt="" src="[SITEURL]/uploads/images/services1.jpg">\r\n    <div class="caption">\r\n<p>Our business solutions are designed around the real needs of businesses, our information resources, tools and... </p>\r\n<a class="wojo red button" href="about.html">learn more</a> </div>\r\n  </div>\r\n</div>', NULL, 0, 'fitted primary', 0, 0, NULL, NULL, 0, 0, 0, 0, NULL, '2017-01-17 02:23:52', NULL, '1.00', 1);
INSERT INTO `plugins` VALUES(26, 'Our Clients', NULL, NULL, 0, NULL, 1, 1, NULL, 'carousel/clients', 0, 0, 22, 2, 'carousel', '2017-01-19 22:14:27', 'carousel/thumb.svg', '1.00', 1);
INSERT INTO `plugins` VALUES(35, 'Newsletter', NULL, NULL, 0, NULL, 1, 1, NULL, 'newsletter', 1, 0, 0, 0, 'newsletter', '2017-05-27 10:00:20', 'newsletter/thumb.svg', '1.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plug_carousel`
--

DROP TABLE IF EXISTS `plug_carousel`;
CREATE TABLE IF NOT EXISTS `plug_carousel` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_en` varchar(100) NOT NULL,
  `body_en` text,
  `dots` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `nav` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `autoplay` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `margin` smallint(4) UNSIGNED NOT NULL DEFAULT '0',
  `loop` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `settings` blob,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plug_carousel`
--

INSERT INTO `plug_carousel` VALUES(1, 'Testimonials', '<div class="row gutters">\n<div class="columns screen-20 tablet-20 mobile-100 phone-100 content-center"><img src="[SITEURL]/uploads/images/partner1.png" alt="" />\n<p class="wojo bold text half-vertical-margin">Retro Press Inc.</p>\n<p><a href="#">www.retropress.corp</a></p>\n</div>\n<div class="columns screen-40 tablet-40 mobile-100 phone-100">\n<p>Our team of specialists is constantly expanding and now we are looking for business consulting experts. If you know what is included in dealing with business management of all kinds - from entrepreneurship, management, business planning, financial analysis, and more, we will be glad to see you at our company.</p>\n<div class="wojo big space divider"></div>\n<p>We are also searching for financial consultants who would like to change the economic and financial state of their countries for the better. Browse our website to find out more about necessary skills and experience for the position of financial consultant at our company. experience for the position of financial consultant at our company.</p>\n</div>\n<div class="columns screen-40 tablet-40 mobile-100 phone-100">\n<div class="wojo primary bg relaxed fluid basic card">\n<div class="content"><img class="left floated wojo small circular image" src="[SITEURL]/uploads/avatars/av6.jpg" />\n<p>Thanks a lot for the quick response. I was really impressed, your solution is excellent! Your competence is justified!</p>\n<div class="wojo primary text bold">Michelle Smith, manager</div>\n</div>\n</div>\n<div class="wojo primary bg relaxed fluid basic card">\n<div class="content"><img class="left floated wojo small circular image" src="[SITEURL]/uploads/avatars/av1.jpg" />\n<p>Thank you for your prompt response and real help. You always have a quick solution to any problem.</p>\n<div class="wojo primary text bold">Timothy Holmes, manager</div>\n</div>\n</div>\n</div>\n</div>\n<div class="row gutters">\n<div class="columns screen-20 tablet-10 mobile-100 phone-100 content-center"><img src="[SITEURL]/uploads/images/partner1.png" alt="" />\n<p class="wojo bold text half-vertical-margin">Retro Press Inc.</p>\n<p><a href="#">www.retropress.corp</a></p>\n</div>\n<div class="columns screen-40 tablet-40 mobile-100 phone-100">\n<p>Our team of specialists is constantly expanding and now we are looking for business consulting experts. If you know what is included in dealing with business management of all kinds - from entrepreneurship, management, business planning, financial analysis, and more, we will be glad to see you at our company.</p>\n<div class="wojo big space divider"></div>\n<p>We are also searching for financial consultants who would like to change the economic and financial state of their countries for the better. Browse our website to find out more about necessary skills and experience for the position of financial consultant at our company. experience for the position of financial consultant at our company.</p>\n</div>\n<div class="columns screen-40 tablet-50 mobile-100 phone-100">\n<div class="wojo primary bg relaxed fluid basic card">\n<div class="content"><img class="left floated wojo small circular image" src="[SITEURL]/uploads/avatars/av6.jpg" />\n<p>Thanks a lot for the quick response. I was really impressed, your solution is excellent! Your competence is justified!</p>\n<div class="wojo primary text bold">Michelle Smith, manager</div>\n</div>\n</div>\n<div class="wojo primary bg relaxed fluid basic card">\n<div class="content"><img class="left floated wojo small circular image" src="[SITEURL]/uploads/avatars/av1.jpg" />\n<p>Thank you for your prompt response and real help. You always have a quick solution to any problem.</p>\n<div class="wojo primary text bold">Timothy Holmes, manager</div>\n</div>\n</div>\n</div>\n</div>\n<div class="row gutters">\n<div class="columns screen-20 tablet-10 mobile-100 phone-100 content-center"><img src="[SITEURL]/uploads/images/partner1.png" alt="" />\n<p class="wojo bold text half-vertical-margin">Retro Press Inc.</p>\n<p><a href="#">www.retropress.corp</a></p>\n</div>\n<div class="columns screen-40 tablet-40 mobile-100 phone-100">\n<p>Our team of specialists is constantly expanding and now we are looking for business consulting experts. If you know what is included in dealing with business management of all kinds - from entrepreneurship, management, business planning, financial analysis, and more, we will be glad to see you at our company.</p>\n<div class="wojo big space divider"></div>\n<p>We are also searching for financial consultants who would like to change the economic and financial state of their countries for the better. Browse our website to find out more about necessary skills and experience for the position of financial consultant at our company. experience for the position of financial consultant at our company.</p>\n</div>\n<div class="columns screen-40 tablet-50 mobile-100 phone-100">\n<div class="wojo primary bg relaxed fluid basic card">\n<div class="content"><img class="left floated wojo small circular image" src="[SITEURL]/uploads/avatars/av6.jpg" />\n<p>Thanks a lot for the quick response. I was really impressed, your solution is excellent! Your competence is justified!</p>\n<div class="wojo primary text bold">Michelle Smith, manager</div>\n</div>\n</div>\n<div class="wojo primary bg relaxed fluid basic card">\n<div class="content"><img class="left floated wojo small circular image" src="[SITEURL]/uploads/avatars/av1.jpg" />\n<p>Thank you for your prompt response and real help. You always have a quick solution to any problem.</p>\n<div class="wojo primary text bold">Timothy Holmes, manager</div>\n</div>\n</div>\n</div>\n</div>', 1, 0, 0, 0, 0, 0x7b22646f7473223a747275652c226e6176223a66616c73652c226175746f706c6179223a66616c73652c226d617267696e223a302c226c6f6f70223a66616c73652c22726573706f6e73697665223a7b2230223a7b226974656d73223a317d2c22373639223a7b226974656d73223a317d2c2231303234223a7b226974656d73223a317d7d7d);
INSERT INTO `plug_carousel` VALUES(2, 'Our Clients', '<div><img src="[SITEURL]/uploads/images/partner2.png" alt="" /></div>\n<div><img src="[SITEURL]/uploads/images/partner3.png" alt="" /></div>\n<div><img src="[SITEURL]/uploads/images/partner4.png" alt="" /></div>\n<div><img src="[SITEURL]/uploads/images/partner5.png" alt="" /></div>\n<div><img src="[SITEURL]/uploads/images/partner6.png" alt="" /></div>\n<div><img src="[SITEURL]/uploads/images/partner2.png" alt="" /></div>\n<div><img src="[SITEURL]/uploads/images/partner3.png" alt="" /></div>\n<div><img src="[SITEURL]/uploads/images/partner4.png" alt="" /></div>\n<div><img src="[SITEURL]/uploads/images/partner5.png" alt="" /></div>\n<div><img src="[SITEURL]/uploads/images/partner6.png" alt="" /></div>\n<div><img src="[SITEURL]/uploads/images/partner2.png" alt="" /></div>\n<div><img src="[SITEURL]/uploads/images/partner3.png" alt="" /></div>\n<div><img src="[SITEURL]/uploads/images/partner4.png" alt="" /></div>\n<div><img src="[SITEURL]/uploads/images/partner5.png" alt="" /></div>\n<div><img src="[SITEURL]/uploads/images/partner6.png" alt="" /></div>', 1, 0, 1, 40, 0, 0x7b22646f7473223a747275652c226e6176223a66616c73652c226175746f706c6179223a747275652c226d617267696e223a34302c226c6f6f70223a747275652c22726573706f6e73697665223a7b2230223a7b226974656d73223a317d2c22373639223a7b226974656d73223a337d2c2231303234223a7b226974656d73223a357d7d7d);

-- --------------------------------------------------------

--
-- Table structure for table `plug_donation`
--

DROP TABLE IF EXISTS `plug_donation`;
CREATE TABLE IF NOT EXISTS `plug_donation` (
  `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT NULL,
  `target_amount` decimal(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `pp_email` varchar(80) NOT NULL,
  `redirect_page` int(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plug_donation`
--

INSERT INTO `plug_donation` VALUES(1, 'Paypa Donations', '150.00', 'webmaster@paypal.com', 1);
INSERT INTO `plug_donation` VALUES(2, 'Paypa Donations II', '2500.00', 'webmaster@paypal.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plug_donation_data`
--

DROP TABLE IF EXISTS `plug_donation_data`;
CREATE TABLE IF NOT EXISTS `plug_donation_data` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `amount` decimal(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `name` varchar(80) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `pp` varchar(50) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plug_donation_data`
--

INSERT INTO `plug_donation_data` VALUES(1, 1, '12.00', 'Timothy Fields', 'jrussell1@ameblo.jp', 'PayPal', '2016-10-02 11:23:40');
INSERT INTO `plug_donation_data` VALUES(2, 1, '15.00', 'Keith Butler', 'kmontgomery8@jigsy.com', 'PayPal', '2016-10-02 11:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `plug_newsletter`
--

DROP TABLE IF EXISTS `plug_newsletter`;
CREATE TABLE IF NOT EXISTS `plug_newsletter` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `plug_poll_options`
--

DROP TABLE IF EXISTS `plug_poll_options`;
CREATE TABLE IF NOT EXISTS `plug_poll_options` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question_id` int(11) UNSIGNED NOT NULL,
  `value` varchar(150) NOT NULL,
  `position` tinyint(2) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_question` (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plug_poll_options`
--

INSERT INTO `plug_poll_options` VALUES(4, 1, 'Hard', 4);
INSERT INTO `plug_poll_options` VALUES(3, 1, 'Easy', 3);
INSERT INTO `plug_poll_options` VALUES(2, 1, 'Very Easy', 2);
INSERT INTO `plug_poll_options` VALUES(1, 1, 'Piece of cake', 1);
INSERT INTO `plug_poll_options` VALUES(5, 2, 'CMS PRO', 1);
INSERT INTO `plug_poll_options` VALUES(6, 2, 'Wordpress', 2);
INSERT INTO `plug_poll_options` VALUES(7, 2, 'Joomla', 3);
INSERT INTO `plug_poll_options` VALUES(8, 2, 'Drupal', 4);

-- --------------------------------------------------------

--
-- Table structure for table `plug_poll_questions`
--

DROP TABLE IF EXISTS `plug_poll_questions`;
CREATE TABLE IF NOT EXISTS `plug_poll_questions` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plug_poll_questions`
--

INSERT INTO `plug_poll_questions` VALUES(1, 'How do you find CMS pro! Installation?', '2010-10-14 03:42:18', 1);
INSERT INTO `plug_poll_questions` VALUES(2, 'What is the best CMS?', '2016-06-16 13:07:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plug_poll_votes`
--

DROP TABLE IF EXISTS `plug_poll_votes`;
CREATE TABLE IF NOT EXISTS `plug_poll_votes` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `option_id` int(11) UNSIGNED NOT NULL,
  `voted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varbinary(16) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_option` (`option_id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plug_poll_votes`
--

INSERT INTO `plug_poll_votes` VALUES(1, 2, '2010-10-15 10:00:55', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(2, 1, '2010-10-15 10:01:27', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(3, 1, '2010-10-15 10:02:04', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(4, 1, '2010-10-15 10:02:13', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(5, 3, '2010-10-15 10:02:16', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(6, 4, '2010-10-15 10:02:21', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(7, 3, '2010-10-15 10:02:24', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(8, 1, '2010-10-15 10:02:27', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(9, 2, '2010-10-15 10:02:31', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(11, 1, '2010-10-15 10:02:38', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(12, 2, '2010-10-15 10:02:43', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(13, 1, '2010-10-15 10:02:46', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(14, 1, '2010-10-15 10:02:50', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(15, 1, '2010-10-15 10:05:26', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(16, 1, '2010-10-15 10:05:29', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(17, 4, '2010-10-15 10:05:33', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(18, 2, '2010-10-15 10:05:36', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(19, 1, '2010-10-15 10:05:40', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(20, 3, '2010-10-15 10:05:46', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(21, 2, '2010-10-15 10:05:49', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(22, 2, '2010-10-15 10:21:37', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(23, 1, '2010-10-15 10:21:53', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(25, 1, '2010-10-15 10:35:27', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(26, 1, '2010-10-15 20:42:05', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(27, 3, '2010-10-15 20:49:42', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(28, 2, '2010-10-15 21:22:00', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(29, 2, '2010-10-15 21:24:51', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(30, 1, '2010-10-15 21:37:21', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(31, 1, '2010-10-15 21:38:48', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(32, 1, '2010-10-15 21:41:30', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(33, 1, '2010-10-15 21:42:21', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(34, 1, '2010-10-16 00:53:42', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(35, 3, '2010-10-16 01:09:14', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(36, 3, '2010-11-25 22:00:27', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(37, 3, '2010-11-29 01:56:07', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(38, 3, '2012-12-23 22:57:05', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(39, 1, '2012-12-23 23:46:26', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(41, 1, '2012-12-27 21:20:01', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(42, 1, '2014-04-21 08:45:03', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(43, 3, '2014-04-21 08:46:53', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(44, 1, '2014-04-21 08:47:38', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(46, 3, '2014-04-24 13:07:37', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(47, 3, '2014-04-24 13:11:36', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(48, 3, '2014-05-20 13:09:13', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(49, 1, '2014-05-20 13:13:01', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(50, 5, '2016-06-17 14:43:10', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(51, 5, '2016-06-17 14:43:10', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(52, 5, '2016-06-17 14:43:11', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(53, 5, '2016-06-17 14:43:11', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(54, 5, '2016-06-17 14:43:11', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(55, 5, '2016-06-17 14:43:11', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(56, 5, '2016-06-17 14:43:12', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(57, 5, '2016-06-17 14:43:12', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(58, 6, '2016-06-17 14:43:36', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(59, 7, '2016-06-17 14:43:37', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(60, 8, '2016-06-17 14:43:38', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(61, 6, '2016-06-17 14:43:54', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(62, 7, '2016-06-17 14:43:55', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(63, 1, '2017-01-18 16:33:31', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(64, 1, '2017-01-18 16:34:07', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(65, 1, '2017-01-18 17:21:46', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(66, 1, '2017-01-18 18:00:36', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(67, 1, '2017-01-18 18:23:35', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(68, 1, '2017-01-18 18:30:55', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(69, 5, '2017-01-18 18:43:26', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(70, 5, '2017-01-18 18:47:00', 0x3132372e302e302e31);
INSERT INTO `plug_poll_votes` VALUES(71, 5, '2017-01-18 18:48:23', 0x3132372e302e302e31);

-- --------------------------------------------------------

--
-- Table structure for table `plug_rss`
--

DROP TABLE IF EXISTS `plug_rss`;
CREATE TABLE IF NOT EXISTS `plug_rss` (
  `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `url` varchar(120) NOT NULL,
  `items` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `show_date` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `show_desc` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `max_words` smallint(4) UNSIGNED NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plug_rss`
--

INSERT INTO `plug_rss` VALUES(1, 'CTV Top Stories', 'http://ctvnews.ca/rss/TopStories', 5, 1, 1, 20);
INSERT INTO `plug_rss` VALUES(2, 'Yahoo Feed', 'https://ca.sports.yahoo.com/nhl/rss.xml', 10, 1, 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `plug_slider`
--

DROP TABLE IF EXISTS `plug_slider`;
CREATE TABLE IF NOT EXISTS `plug_slider` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL,
  `type` varchar(15) DEFAULT NULL,
  `layout` varchar(25) DEFAULT NULL,
  `automaticSlide` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `showProgressBar` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `pauseOnHover` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `slidesTime` smallint(3) UNSIGNED NOT NULL DEFAULT '3000',
  `transition` varchar(40) DEFAULT NULL,
  `slidesEaseIn` smallint(1) UNSIGNED NOT NULL DEFAULT '300',
  `width` smallint(3) UNSIGNED NOT NULL DEFAULT '1094',
  `height` smallint(3) UNSIGNED NOT NULL DEFAULT '500',
  `settings` blob,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plug_slider`
--

INSERT INTO `plug_slider` VALUES(1, 'Image Slider', 'image', 'dots_left', 0, 1, 1, 5000, 'fade', 500, 1094, 500, 0x7b227769647468223a2231303934222c22686569676874223a22353030222c2273686f7750726f6772657373426172223a747275652c226175746f6d61746963536c696465223a66616c73652c2270617573654f6e486f766572223a747275652c22736c6964657354696d65223a2233303030222c22736c6964657345617365496e223a22383030222c227472616e736974696f6e223a2266616465222c226c61796f7574223a22646f74735f6c656674222c227468756d6273223a66616c73652c226172726f7773223a66616c73652c22627574746f6e73223a747275657d);
INSERT INTO `plug_slider` VALUES(2, 'Carousel Slider', 'carousel', 'basic', 1, 1, 1, 3000, 'horizontal', 900, 1094, 500, NULL);
INSERT INTO `plug_slider` VALUES(3, 'Content Slider', 'content', 'dots', 1, 1, 1, 3000, 'horizontal', 900, 1094, 500, NULL);
INSERT INTO `plug_slider` VALUES(4, 'Sync Slider', 'sync', 'thumbs_down', 1, 1, 1, 3000, 'horizontal', 900, 1094, 500, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plug_slider_data`
--

DROP TABLE IF EXISTS `plug_slider_data`;
CREATE TABLE IF NOT EXISTS `plug_slider_data` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL,
  `html_raw` text,
  `html` text,
  `image` varchar(60) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `mode` varchar(2) NOT NULL DEFAULT 'bg',
  `sorting` int(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_parent` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plug_slider_data`
--

INSERT INTO `plug_slider_data` VALUES(1, 1, 'Third', '<div class="uitem" id="item_1" data-type="bg" style="height:500px;position:relative">\n  <div class="uimage" style="width:100%;height:100%;position:absolute;z-index:1;background-size:cover;background-position:center;background-repeat:no-repeat;background-image:url([SITEURL]/uploads/slider/slide1.jpg)">\n    <div class="ucontent" style="position:relative;height:100%">\n<div data-horizontal="387" data-vertical="95" data-height="50" data-width="380" id="edit_1483591174784" class="ws-layer" data-delay="300" data-ease-in="1500" data-in="bounceLeft" data-time="all" data-top="40" data-left="357" data-type="header" style="width: 380px; height: 50px; position: absolute; z-index: 1; left: 357px; top: 40px; opacity: 1; display: block; transform: translateX(0px);">\n<div class="row ws-animate">\n<div class="column"><!--edit from here-->\n  <div data-text="true" style="font-size: 40px;"><span style="color: #ffffff;">WELCOME TO CMS PRO</span></div>\n  <!--edit to here--></div>\n</div>\n</div>\n<div data-horizontal="355" data-vertical="175" data-height="50" data-width="520" id="edit_1483591411285" class="ws-layer" data-delay="800" data-ease-in="1400" data-in="bounceLeft" data-time="all" data-top="105" data-left="277" data-type="header" style="width: 540px; height: 50px; position: absolute; z-index: 10; left: 277px; top: 105px; opacity: 1; display: block; transform: translateX(0px);">\n<div class="row ws-animate">\n<div class="column"><!--edit from here-->\n<div data-text="true" style="font-size: 40px; letter-spacing: 2px;" class="wojo bold text"><span style="color: #ffffff;">WE ARE <span class="wojo primary text">BUSNESS</span> COMPANY</span></div>\n<!--edit to here--></div>\n</div>\n</div>\n<div data-horizontal="226" data-vertical="205" data-height="40" data-width="682" id="edit_1483591612047" class="ws-layer" data-delay="1200" data-ease-in="600" data-in="slideUpBig" data-time="all" data-top="160" data-left="216" data-type="para" style="position: absolute; z-index: 13; left: 216px; top: 160px; opacity: 1; display: block; transform: translateY(0px); height: 40px; width: 662px;">\n<div class="row ws-animate">\n<div class="column"><!--edit from here-->\n  <p style="text-align: center;"><span style="color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp incididunt ut labore <br>\n    et dolore magna aliqua.</span></p>\n  <!--edit to here--></div>\n</div>\n</div>\n\n\n\n\n    <div id="edit_1483661364448" data-delay="800" data-ease-in="1200" data-in="whirl" data-time="all" data-top="266" data-left="483" data-type="button" style="position: absolute; left: 483px; top: 266px; z-index: 23; opacity: 1; display: block; transform: scaleX(1) scaleY(1); transform-origin: 50% 50% 0px;" class="ws-layer"><div class="column"><i style="width: 128px; height: 128px; font-size: 96px; background: rgba(0,0,0,0.2); box-shadow: 0 2px 4px rgba(34,36,38,0.15), 0 1px 1px rgba(34,36,38,0.1); color: #fff; border-radius: 128px;" class="icon  wojologo"></i></div></div></div>\n  </div>\n</div>', '<div data-horizontal="387" data-vertical="95" data-height="50" data-width="380" class="ws-layer" data-delay="300" data-ease-in="1500" data-in="bounceLeft" data-time="all" data-top="40" data-left="357" data-type="header" style="height: 50px; position: absolute; z-index: 1; left: 357px; top: 40px;"><!--edit from here-->\r\n  <div data-text="true" style="font-size: 40px;"><span style="color: #ffffff;">WELCOME TO CMS PRO</span></div>\r\n  <!--edit to here--></div>\r\n<div data-horizontal="355" data-vertical="175" data-height="50" data-width="520" class="ws-layer" data-delay="800" data-ease-in="1400" data-in="bounceLeft" data-time="all" data-top="105" data-left="277" data-type="header" style="height: 50px; position: absolute; z-index: 10; left: 277px; top: 105px;"><!--edit from here-->\r\n  <div data-text="true" style="font-size: 40px; letter-spacing: 2px;" class="wojo bold text"><span style="color: #ffffff;">WE ARE <span class="wojo primary text">BUSNESS</span> COMPANY</span></div>\r\n  <!--edit to here--></div>\r\n<div data-horizontal="226" data-vertical="205" data-height="40" data-width="682" class="ws-layer" data-delay="1200" data-ease-in="600" data-in="slideUpBig" data-time="all" data-top="160" data-left="216" data-type="para" style="position: absolute; z-index: 13; left: 216px; top: 160px; height: 40px;"><!--edit from here-->\r\n  <p style="text-align: center;"><span style="color: #ffffff;">New Universal slider plugin, with unlimited posibilites and animated layers <br>\r\n    video, button and text support.</span></p>\r\n  <!--edit to here--></div>\r\n<div data-delay="800" data-ease-in="1200" data-in="whirl" data-time="all" data-top="266" data-left="483" data-type="button" style="position: absolute; left: 483px; top: 266px; z-index:23;" class="ws-layer"><i style="width: 128px; height: 128px; font-size: 96px; background: rgba(0,0,0,0.2); box-shadow: 0 2px 4px rgba(34,36,38,0.15), 0 1px 1px rgba(34,36,38,0.1); color: #fff; border-radius: 128px;" class="icon  wojologo"></i></div>', 'slider/slide1.jpg', NULL, 'bg', 3);
INSERT INTO `plug_slider_data` VALUES(2, 1, 'Second', '<div class="uitem" id="item_2" data-type="bg" style="height:500px;position:relative">\n  <div class="uimage" style="width:100%;height:100%;position:absolute;z-index:1;background-size:cover;background-position:center;background-repeat:no-repeat;background-image:url([SITEURL]/uploads/slider/slide2.jpg)">\n    <div class="ucontent" style="position:relative;height:100%">\n<div data-horizontal="387" data-vertical="95" data-height="50" data-width="380" id="edit_1483591174780" class="ws-layer" data-delay="300" data-ease-in="1500" data-in="bounceLeft" data-time="all" data-top="40" data-left="12" data-type="header" style="width: 380px; height: 50px; position: absolute; z-index: 1; left: 12px; top: 40px; opacity: 1; display: block; transform: translateX(0px);">\n<div class="row ws-animate">\n<div class="column"><!--edit from here-->\n  <div data-text="true" style="font-size: 40px;"><span style="color: #ffffff;">WELCOME TO CMS PRO</span></div>\n  <!--edit to here--></div>\n</div>\n</div>\n<div data-horizontal="355" data-vertical="175" data-height="50" data-width="520" id="edit_1483591411281" class="ws-layer" data-delay="800" data-ease-in="1400" data-in="bounceLeft" data-time="all" data-top="105" data-left="12" data-type="header" style="width: 540px; height: 50px; position: absolute; z-index: 4; left: 12px; top: 105px; opacity: 1; display: block; transform: translateX(0px);">\n<div class="row ws-animate">\n<div class="column"><!--edit from here-->\n  <div data-text="true" style="font-size: 40px; letter-spacing: 2px;" class="wojo bold text"><span style="color: #ffffff;">WE ARE <span class="wojo primary text">BUSNESS</span> COMPANY</span></div>\n  <!--edit to here--></div>\n</div>\n</div>\n<div data-horizontal="226" data-vertical="205" data-height="40" data-width="682" id="edit_1483591612042" class="ws-layer" data-delay="1200" data-ease-in="600" data-in="slideUpBig" data-time="all" data-top="160" data-left="11" data-type="para" style="position: absolute; z-index: 7; left: 11px; top: 160px; opacity: 1; display: block; transform: translateY(0px); height: 40px; width: 662px;">\n<div class="row ws-animate">\n<div class="column"><!--edit from here-->\n  <p style="text-align: center;"><span style="color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp incididunt ut labore <br>\n    et dolore magna aliqua.</span></p>\n  <!--edit to here--></div>\n</div>\n</div>\n\n\n\n\n    <div id="edit_1483655564163" data-delay="800" data-ease-in="800" data-in="swoop" data-time="all" data-top="250" data-left="497" data-type="icon" class="ws-layer" style="z-index: 19; position: absolute; top: 250px; left: 497px; width: 100px; opacity: 1; display: block; transform-origin: 50% 50% 0px; transform: scaleX(1) scaleY(1) translateX(0px);"><div class="column"><img src="[SITEURL]/uploads/svg/checked.svg" alt="checked.svg"></div></div></div>\n  </div>\n</div>', '<div data-horizontal="387" data-vertical="95" data-height="50" data-width="380" class="ws-layer" data-delay="300" data-ease-in="1500" data-in="bounceLeft" data-time="all" data-top="40" data-left="12" data-type="header" style="height: 50px; position: absolute; z-index: 1; left: 12px; top: 40px;"><!--edit from here-->\r\n  <div data-text="true" style="font-size: 40px;"><span style="color: #ffffff;">WELCOME TO CMS PRO</span></div>\r\n  <!--edit to here--></div>\r\n<div data-horizontal="355" data-vertical="175" data-height="50" data-width="520" class="ws-layer" data-delay="800" data-ease-in="1400" data-in="bounceLeft" data-time="all" data-top="105" data-left="12" data-type="header" style="height: 50px; position: absolute; z-index: 4; left: 12px; top: 105px;"><!--edit from here-->\r\n  <div data-text="true" style="font-size: 40px; letter-spacing: 2px;" class="wojo bold text"><span style="color: #ffffff;">WE ARE <span class="wojo primary text">BUSNESS</span> COMPANY</span></div>\r\n  <!--edit to here--></div>\r\n<div data-horizontal="226" data-vertical="205" data-height="40" data-width="682" class="ws-layer" data-delay="1200" data-ease-in="600" data-in="slideUpBig" data-time="all" data-top="160" data-left="11" data-type="para" style="position: absolute; z-index: 7; left: 11px; top: 160px; height: 40px;"><!--edit from here-->\r\n  <p style="text-align: center;"><span style="color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp incididunt ut labore <br>\r\n    et dolore magna aliqua.</span></p>\r\n  <!--edit to here--></div>\r\n<div data-delay="800" data-ease-in="800" data-in="swoop" data-time="all" data-top="250" data-left="497" data-type="icon" class="ws-layer" style="z-index: 19; position: absolute; top: 250px; left: 497px; width: 100px;"><img src="[SITEURL]/uploads/svg/checked.svg" alt="checked.svg"></div>', 'slider/slide2.jpg', NULL, 'bg', 2);
INSERT INTO `plug_slider_data` VALUES(3, 1, 'First', '<div class="uitem" id="item_3" data-type="bg" style="height:500px;position:relative">\r\n  <div class="uimage" style="width:100%;height:100%;position:absolute;z-index:1;background-size:cover;background-position:center;background-repeat:no-repeat;background-image:url([SITEURL]/uploads/slider/slide3.jpg)">\r\n    <div class="ucontent" style="position:relative;height:100%">\r\n<div data-horizontal="387" data-vertical="95" data-height="50" data-width="380" id="edit_1483591174783" class="ws-layer" data-delay="300" data-ease-in="1500" data-in="bounceLeft" data-time="all" data-top="40" data-left="357" data-type="header" style="width: 380px; height: 50px; position: absolute; z-index: 1; left: 357px; top: 40px; opacity: 1; display: block; transform: translateX(0px);">\r\n<div class="row ws-animate">\r\n<div class="column"><!--edit from here-->\r\n  <div data-text="true" style="font-size: 40px;"><span style="color: #ffffff;">WELCOME TO CMS PRO</span></div>\r\n  <!--edit to here--></div>\r\n</div>\r\n</div>\r\n<div data-horizontal="355" data-vertical="175" data-height="50" data-width="520" id="edit_1483591411283" class="ws-layer" data-delay="800" data-ease-in="1400" data-in="bounceLeft" data-time="all" data-top="105" data-left="277" data-type="header" style="width: 540px; height: 50px; position: absolute; z-index: 4; left: 277px; top: 105px; opacity: 1; display: block; transform: translateX(0px);">\r\n<div class="row ws-animate">\r\n<div class="column"><!--edit from here-->\r\n  <div data-text="true" style="font-size: 40px; letter-spacing: 2px;" class="wojo bold text"><span style="color: #ffffff;">WE ARE <span class="wojo primary text">BUSNESS</span> COMPANY</span></div>\r\n  <!--edit to here--></div>\r\n</div>\r\n</div>\r\n<div data-horizontal="226" data-vertical="205" data-height="40" data-width="682" id="edit_1483591612043" class="ws-layer" data-delay="1200" data-ease-in="600" data-in="slideUpBig" data-time="all" data-top="160" data-left="216" data-type="para" style="position: absolute; z-index: 7; left: 216px; top: 160px; opacity: 1; display: block; transform: translateY(0px); height: 40px; width: 662px;">\r\n<div class="row ws-animate">\r\n<div class="column"><!--edit from here-->\r\n  <p style="text-align: center;"><span style="color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp incididunt ut labore <br>\r\n    et dolore magna aliqua.</span></p>\r\n  <!--edit to here--></div>\r\n</div>\r\n</div>\r\n<div data-horizontal="355" data-vertical="305" data-height="112" data-width="112" id="edit_1483646320473" class="ws-layer" data-delay="500" data-ease-in="400" data-in="perspectiveDown" data-time="all" data-top="230" data-left="436" data-type="para" style="width: 112px; height: 112px; position: absolute; z-index: 10; left: 436px; top: 230px; opacity: 1; display: block; transform-origin: 50% 50% 0px;">\r\n<div class="row ws-animate">\r\n<div class="column"><!--edit from here--> <img src="[SITEURL]/uploads/slider/wlogo1.png" alt=""> <!--edit to here--></div>\r\n</div>\r\n</div>\r\n<div data-horizontal="355" data-vertical="305" data-height="112" data-width="112" id="edit_1483646561053" class="ws-layer" data-delay="800" data-ease-in="700" data-in="perspectiveDown" data-time="all" data-top="230" data-left="548" data-type="para" style="width: 112px; height: 112px; position: absolute; z-index: 13; left: 548px; top: 230px; opacity: 1; display: block; transform-origin: 50% 50% 0px;">\r\n<div class="row ws-animate">\r\n<div class="column"><!--edit from here--> <img src="[SITEURL]/uploads/slider/wlogo2.png" alt=""> <!--edit to here--></div>\r\n</div>\r\n</div>\r\n<div data-horizontal="355" data-vertical="305" data-height="112" data-width="112" id="edit_1483646589323" class="ws-layer" data-delay="1100" data-ease-in="1000" data-in="perspectiveUp" data-time="all" data-top="342" data-left="436" data-type="para" style="width: 112px; height: 112px; position: absolute; z-index: 10; left: 436px; top: 342px; opacity: 1; display: block; transform-origin: 50% 50% 0px;">\r\n<div class="row ws-animate">\r\n<div class="column"><!--edit from here--> <img src="[SITEURL]/uploads/slider/wlogo3.png" alt=""> <!--edit to here--></div>\r\n</div>\r\n</div>\r\n<div data-horizontal="355" data-vertical="305" data-height="112" data-width="112" id="edit_1483646632003" class="ws-layer" data-delay="1400" data-ease-in="1300" data-in="perspectiveUp" data-time="all" data-top="342" data-left="548" data-type="para" style="width: 112px; height: 112px; position: absolute; z-index: 13; left: 548px; top: 342px; opacity: 1; display: block; transform-origin: 50% 50% 0px;">\r\n<div class="row ws-animate">\r\n<div class="column"><!--edit from here--> <img src="[SITEURL]/uploads/slider/wlogo4.png" alt=""> <!--edit to here--></div>\r\n</div>\r\n</div>\r\n    </div>\r\n  </div>\r\n</div>', '<div data-horizontal="387" data-vertical="95" data-height="50" data-width="380" class="ws-layer" data-delay="300" data-ease-in="1500" data-in="bounceLeft" data-time="all" data-top="40" data-left="357" data-type="header" style="height: 50px; position: absolute; z-index: 1; left: 357px; top: 40px;;"><!--edit from here-->\r\n  <div data-text="true" style="font-size: 40px;"><span style="color: #ffffff;">WELCOME TO CMS PRO</span></div>\r\n  <!--edit to here--></div>\r\n<div data-horizontal="355" data-vertical="175" data-height="50" data-width="520" class="ws-layer" data-delay="800" data-ease-in="1400" data-in="bounceLeft" data-time="all" data-top="105" data-left="277" data-type="header" style="height: 50px; position: absolute; z-index: 4; left: 277px; top: 105px;;"><!--edit from here-->\r\n  <div data-text="true" style="font-size: 40px; letter-spacing: 2px;" class="wojo bold text"><span style="color: #ffffff;">WE ARE <span class="wojo primary text">BUSNESS</span> COMPANY</span></div>\r\n  <!--edit to here--></div>\r\n<div data-horizontal="226" data-vertical="205" data-height="40" data-width="682" class="ws-layer" data-delay="1200" data-ease-in="600" data-in="slideUpBig" data-time="all" data-top="160" data-left="216" data-type="para" style="position: absolute; z-index: 7; left: 216px; top: 160px; height: 40px;;"><!--edit from here-->\r\n  <p style="text-align: center;"><span style="color: #ffffff;">New universal slider plugin, with unlimited posibilites, animated layers and multiple sliders per page <br>\r\n    video, button svg images, text and html support..</span></p>\r\n  <!--edit to here--></div>\r\n<div data-horizontal="355" data-vertical="305" data-height="112" data-width="112" class="ws-layer" data-delay="500" data-ease-in="400" data-in="perspectiveDown" data-time="all" data-top="230" data-left="436" data-type="para" style="height: 112px; position: absolute; z-index: 10; left: 436px; top: 230px;;"><!--edit from here--> <img src="[SITEURL]/uploads/slider/wlogo1.png" alt=""> <!--edit to here--></div>\r\n<div data-horizontal="355" data-vertical="305" data-height="112" data-width="112" class="ws-layer" data-delay="800" data-ease-in="700" data-in="perspectiveDown" data-time="all" data-top="230" data-left="548" data-type="para" style="height: 112px; position: absolute; z-index: 13; left: 548px; top: 230px;; "><!--edit from here--> <img src="[SITEURL]/uploads/slider/wlogo2.png" alt=""> <!--edit to here--></div>\r\n<div data-horizontal="355" data-vertical="305" data-height="112" data-width="112" class="ws-layer" data-delay="1100" data-ease-in="1000" data-in="perspectiveUp" data-time="all" data-top="342" data-left="436" data-type="para" style="height: 112px; position: absolute; z-index: 10; left: 436px; top: 342px;;"><!--edit from here--> <img src="[SITEURL]/uploads/slider/wlogo3.png" alt=""> <!--edit to here--></div>\r\n<div data-horizontal="355" data-vertical="305" data-height="112" data-width="112" class="ws-layer" data-delay="1400" data-ease-in="1300" data-in="perspectiveUp" data-time="all" data-top="342" data-left="548" data-type="para" style="height: 112px; position: absolute; z-index: 13; left: 548px; top: 342px;;"><!--edit from here--> <img src="[SITEURL]/uploads/slider/wlogo4.png" alt=""> <!--edit to here--></div>', 'slider/slide3.jpg', NULL, 'bg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plug_yplayer`
--

DROP TABLE IF EXISTS `plug_yplayer`;
CREATE TABLE IF NOT EXISTS `plug_yplayer` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `layout` varchar(10) DEFAULT NULL,
  `config` blob,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plug_yplayer`
--

INSERT INTO `plug_yplayer` VALUES(1, 'Horizontal Player', 'horizontal', 0x7b22706c61796c697374223a66616c73652c226368616e6e656c223a66616c73652c2275736572223a66616c73652c22766964656f73223a2246325546413862745a2d342c49503370487768386b71342c6e3944776f5137485776492c762d3472596630782d46342c326f6e78676d4b543166772c3656704e6b776b53505a6f222c226170695f6b6579223a2259544b4559222c226d61785f726573756c7473223a223530222c22706167696e6174696f6e223a2231222c22636f6e74696e756f7573223a2231222c2273686f775f706c61796c697374223a66616c73652c22706c61796c6973745f74797065223a22686f72697a6f6e74616c222c2273686f775f6368616e6e656c5f696e5f706c61796c697374223a2231222c2273686f775f6368616e6e656c5f696e5f7469746c65223a2231222c226e6f775f706c6179696e675f74657874223a224e6f7720506c6179696e67222c226c6f61645f6d6f72655f74657874223a224c6f6164204d6f7265222c226175746f706c6179223a66616c73652c22666f7263655f6864223a2230222c2273686172655f636f6e74726f6c223a2230222c22636f6c6f7273223a7b22636f6e74726f6c735f6267223a227267626128302c302c302c2e373529222c22627574746f6e73223a2272676261283235352c3235352c3235352c2e3529222c22627574746f6e735f686f766572223a2272676261283235352c3235352c3235352c3129222c22627574746f6e735f616374697665223a2272676261283235352c3235352c3235352c3129222c2274696d655f74657874223a2223464646464646222c226261725f6267223a2272676261283235352c3235352c3235352c2e3529222c22627566666572223a2272676261283235352c3235352c3235352c2e323529222c2266696c6c223a2223464646464646222c22766964656f5f7469746c65223a2223464646464646222c22766964656f5f6368616e6e656c223a2272676261283235352c20302c20302c20302e333529222c22706c61796c6973745f6f7665726c6179223a227267626128302c302c302c2e373529222c22706c61796c6973745f7469746c65223a2223464646464646222c22706c61796c6973745f6368616e6e656c223a2272676261283235352c20302c20302c20302e333529222c227363726f6c6c626172223a2223464646464646222c227363726f6c6c6261725f6267223a2272676261283235352c3235352c3235352c2e323529227d7d);
INSERT INTO `plug_yplayer` VALUES(2, 'Vertical Player', 'vertical', 0x7b22706c61796c697374223a66616c73652c226368616e6e656c223a66616c73652c2275736572223a66616c73652c22766964656f73223a2246325546413862745a2d342c49503370487768386b71342c6e3944776f5137485776492c762d3472596630782d46342c326f6e78676d4b543166772c3656704e6b776b53505a6f222c226170695f6b6579223a2259544b4559222c226d61785f726573756c7473223a223530222c22706167696e6174696f6e223a2231222c22636f6e74696e756f7573223a2231222c2273686f775f706c61796c697374223a66616c73652c22706c61796c6973745f74797065223a22766572746963616c222c2273686f775f6368616e6e656c5f696e5f706c61796c697374223a2231222c2273686f775f6368616e6e656c5f696e5f7469746c65223a2231222c226e6f775f706c6179696e675f74657874223a224e6f7720506c6179696e67222c226c6f61645f6d6f72655f74657874223a224c6f6164204d6f7265222c226175746f706c6179223a66616c73652c22666f7263655f6864223a2230222c2273686172655f636f6e74726f6c223a2230222c22636f6c6f7273223a7b22636f6e74726f6c735f6267223a227267626128302c302c302c2e373529222c22627574746f6e73223a2272676261283235352c3235352c3235352c2e3529222c22627574746f6e735f686f766572223a2272676261283235352c3235352c3235352c3129222c22627574746f6e735f616374697665223a2272676261283235352c3235352c3235352c3129222c2274696d655f74657874223a2223464646464646222c226261725f6267223a2272676261283235352c3235352c3235352c2e3529222c22627566666572223a2272676261283235352c3235352c3235352c2e323529222c2266696c6c223a2223464646464646222c22766964656f5f7469746c65223a2223464646464646222c22766964656f5f6368616e6e656c223a2272676261283235352c20302c20302c20302e333529222c22706c61796c6973745f6f7665726c6179223a227267626128302c302c302c2e373529222c22706c61796c6973745f7469746c65223a2223464646464646222c22706c61796c6973745f6368616e6e656c223a2272676261283235352c20302c20302c20302e333529222c227363726f6c6c626172223a2223464646464646222c227363726f6c6c6261725f6267223a2272676261283235352c3235352c3235352c2e323529227d7d);

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

DROP TABLE IF EXISTS `privileges`;
CREATE TABLE IF NOT EXISTS `privileges` (
  `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(60) DEFAULT NULL,
  `mode` varchar(8) NOT NULL,
  `type` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` VALUES(1, 'manage_users', 'Manage Users', 'Permission to add/edit/delete users', 'manage', 'Users');
INSERT INTO `privileges` VALUES(2, 'manage_files', 'Manage Files', 'Permission to access File Manager', 'manage', 'Files');
INSERT INTO `privileges` VALUES(3, 'manage_pages', 'Manage Pages', 'Permission to Add/edit/delete pages', 'manage', 'Pages');
INSERT INTO `privileges` VALUES(4, 'manage_menus', 'Manage Menus', 'Permission to Add/edit and delete menus', 'manage', 'Menus');
INSERT INTO `privileges` VALUES(5, 'manage_email', 'Manage Email Templates', 'Permission to modify email templates', 'manage', 'Emails');
INSERT INTO `privileges` VALUES(6, 'manage_languages', 'Manage Language Phrases', 'Permission to modify language phrases', 'manage', 'Languages');
INSERT INTO `privileges` VALUES(7, 'manage_backup', 'Manage Database Backups', 'Permission to create backups and restore', 'manage', 'Backups');
INSERT INTO `privileges` VALUES(8, 'manage_memberships', 'Manage Memberships', 'Permission to manage memberships', 'manage', 'Memberships');
INSERT INTO `privileges` VALUES(9, 'edit_user', 'Edit Users', 'Permission to edit user', 'edit', 'Users');
INSERT INTO `privileges` VALUES(10, 'add_user', 'Add User', 'Permission to add users', 'add', 'Users');
INSERT INTO `privileges` VALUES(11, 'delete_user', 'Delete Users', 'Permission to delete users', 'delete', 'Users');
INSERT INTO `privileges` VALUES(12, 'manage_plugins', 'Manage Plugins', 'Permission to Add/Edit and delete user plugins', 'manage', 'Plugins');
INSERT INTO `privileges` VALUES(13, 'manage_fields', 'Manage Custom Fields', 'Permission to Add/Edit and delete custom fields', 'manage', 'Fields');
INSERT INTO `privileges` VALUES(14, 'manage_newsletter', 'Manage Newsletter', 'Permission to send newsletter', 'manage', 'Newsletter');
INSERT INTO `privileges` VALUES(15, 'manage_countries', 'Manage Countries', 'Permission to manage countries', 'manage', 'Countries');
INSERT INTO `privileges` VALUES(16, 'manage_coupons', 'Manage Coupons', 'Permission to Add/Edit and delete coupons', 'manage', 'Coupons');
INSERT INTO `privileges` VALUES(17, 'manage_modules', 'Manage Modules', 'Permission to manage all modules', 'manage', 'Modules');
INSERT INTO `privileges` VALUES(18, 'manage_layout', 'Manage Layouts', 'Permission to access layout manager', 'manage', 'Layout');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` VALUES(1, 'owner', 'badge', 'Site Owner', 'Site Owner is the owner of the site, has all privileges and could not be removed.');
INSERT INTO `roles` VALUES(2, 'staff', 'trophy', 'Staff Member', 'The &#34;Staff&#34; members  is required to assist the Owner, has different privileges and may be created by Site Owner.');
INSERT INTO `roles` VALUES(3, 'editor', 'note', 'Editor', 'The "Editor" is required to assist the Staff Members, has different privileges and may be created by Site Owner.');

-- --------------------------------------------------------

--
-- Table structure for table `role_privileges`
--

DROP TABLE IF EXISTS `role_privileges`;
CREATE TABLE IF NOT EXISTS `role_privileges` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rid` int(6) UNSIGNED NOT NULL DEFAULT '0',
  `pid` int(6) UNSIGNED NOT NULL DEFAULT '0',
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx` (`rid`,`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_privileges`
--

INSERT INTO `role_privileges` VALUES(1, 1, 1, 1);
INSERT INTO `role_privileges` VALUES(2, 2, 1, 1);
INSERT INTO `role_privileges` VALUES(3, 3, 1, 0);
INSERT INTO `role_privileges` VALUES(4, 1, 2, 1);
INSERT INTO `role_privileges` VALUES(5, 2, 2, 1);
INSERT INTO `role_privileges` VALUES(6, 3, 2, 1);
INSERT INTO `role_privileges` VALUES(7, 1, 3, 1);
INSERT INTO `role_privileges` VALUES(8, 2, 3, 1);
INSERT INTO `role_privileges` VALUES(9, 3, 3, 1);
INSERT INTO `role_privileges` VALUES(10, 1, 4, 1);
INSERT INTO `role_privileges` VALUES(11, 2, 4, 1);
INSERT INTO `role_privileges` VALUES(12, 3, 4, 1);
INSERT INTO `role_privileges` VALUES(13, 1, 5, 1);
INSERT INTO `role_privileges` VALUES(14, 2, 5, 1);
INSERT INTO `role_privileges` VALUES(15, 3, 5, 0);
INSERT INTO `role_privileges` VALUES(16, 1, 6, 1);
INSERT INTO `role_privileges` VALUES(17, 2, 6, 1);
INSERT INTO `role_privileges` VALUES(18, 3, 6, 1);
INSERT INTO `role_privileges` VALUES(19, 1, 7, 1);
INSERT INTO `role_privileges` VALUES(20, 2, 7, 1);
INSERT INTO `role_privileges` VALUES(21, 3, 7, 0);
INSERT INTO `role_privileges` VALUES(22, 1, 8, 1);
INSERT INTO `role_privileges` VALUES(23, 2, 8, 1);
INSERT INTO `role_privileges` VALUES(24, 3, 8, 0);
INSERT INTO `role_privileges` VALUES(25, 1, 9, 1);
INSERT INTO `role_privileges` VALUES(26, 2, 9, 1);
INSERT INTO `role_privileges` VALUES(27, 3, 9, 0);
INSERT INTO `role_privileges` VALUES(28, 1, 10, 1);
INSERT INTO `role_privileges` VALUES(29, 2, 10, 1);
INSERT INTO `role_privileges` VALUES(30, 3, 10, 0);
INSERT INTO `role_privileges` VALUES(31, 1, 11, 1);
INSERT INTO `role_privileges` VALUES(32, 2, 11, 1);
INSERT INTO `role_privileges` VALUES(33, 3, 11, 0);
INSERT INTO `role_privileges` VALUES(34, 1, 12, 1);
INSERT INTO `role_privileges` VALUES(35, 2, 12, 1);
INSERT INTO `role_privileges` VALUES(36, 3, 12, 1);
INSERT INTO `role_privileges` VALUES(37, 1, 13, 1);
INSERT INTO `role_privileges` VALUES(38, 2, 13, 1);
INSERT INTO `role_privileges` VALUES(39, 3, 13, 0);
INSERT INTO `role_privileges` VALUES(40, 1, 14, 1);
INSERT INTO `role_privileges` VALUES(41, 2, 14, 1);
INSERT INTO `role_privileges` VALUES(42, 3, 14, 0);
INSERT INTO `role_privileges` VALUES(43, 1, 15, 1);
INSERT INTO `role_privileges` VALUES(44, 2, 15, 1);
INSERT INTO `role_privileges` VALUES(45, 3, 15, 1);
INSERT INTO `role_privileges` VALUES(46, 1, 16, 1);
INSERT INTO `role_privileges` VALUES(47, 2, 16, 1);
INSERT INTO `role_privileges` VALUES(48, 3, 16, 0);
INSERT INTO `role_privileges` VALUES(49, 1, 17, 1);
INSERT INTO `role_privileges` VALUES(50, 2, 17, 1);
INSERT INTO `role_privileges` VALUES(51, 3, 17, 0);
INSERT INTO `role_privileges` VALUES(52, 1, 18, 1);
INSERT INTO `role_privileges` VALUES(53, 2, 18, 1);
INSERT INTO `role_privileges` VALUES(54, 3, 18, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT,
  `site_name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `site_dir` varchar(50) DEFAULT NULL,
  `site_email` varchar(50) NOT NULL,
  `theme` varchar(32) NOT NULL,
  `perpage` tinyint(2) UNSIGNED NOT NULL,
  `backup` varchar(64) NOT NULL,
  `thumb_w` tinyint(3) UNSIGNED NOT NULL,
  `thumb_h` tinyint(3) UNSIGNED NOT NULL,
  `img_w` smallint(3) UNSIGNED NOT NULL,
  `img_h` smallint(3) UNSIGNED NOT NULL,
  `avatar_w` tinyint(2) UNSIGNED NOT NULL,
  `avatar_h` tinyint(2) UNSIGNED NOT NULL,
  `short_date` varchar(20) NOT NULL,
  `long_date` varchar(30) NOT NULL,
  `time_format` varchar(10) DEFAULT NULL,
  `dtz` varchar(120) DEFAULT NULL,
  `locale` varchar(200) DEFAULT NULL,
  `weekstart` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `lang` varchar(2) NOT NULL DEFAULT 'en',
  `lang_list` blob NOT NULL,
  `ploader` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `eucookie` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `offline` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `offline_msg` text,
  `offline_d` date DEFAULT NULL,
  `offline_t` time DEFAULT NULL,
  `offline_info` text,
  `logo` varchar(50) DEFAULT NULL,
  `plogo` varchar(50) DEFAULT NULL,
  `showlang` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `showlogin` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `showsearch` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `showcrumbs` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `currency` varchar(4) DEFAULT NULL,
  `enable_tax` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `file_size` int(4) UNSIGNED NOT NULL DEFAULT '20971520',
  `file_ext` varchar(150) NOT NULL DEFAULT 'png,jpg,jpeg,bmp',
  `reg_verify` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `auto_verify` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `notify_admin` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `flood` int(3) UNSIGNED NOT NULL DEFAULT '3600',
  `attempt` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `logging` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `analytics` text,
  `mailer` enum('PHP','SMTP','SMAIL') DEFAULT NULL,
  `sendmail` varchar(60) DEFAULT NULL,
  `smtp_host` varchar(150) DEFAULT NULL,
  `smtp_user` varchar(50) DEFAULT NULL,
  `smtp_pass` varchar(50) DEFAULT NULL,
  `smtp_port` varchar(3) DEFAULT NULL,
  `is_ssl` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `inv_info` text,
  `inv_note` text,
  `system_slugs` blob,
  `url_slugs` blob,
  `social_media` blob,
  `ytapi` varchar(120) DEFAULT NULL,
  `mapapi` varchar(120) DEFAULT NULL,
  `wojon` decimal(4,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `wojov` decimal(4,2) UNSIGNED NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` VALUES(1, 'o', 'Your Company Name', '', 'site@mail.com', 'master', 12, '24-May-2017_15-36-58.sql', 150, 150, 800, 800, 250, 250, 'dd MMM yyyy', 'MMMM dd, yyyy hh:mm a', 'HH:mm', 'America/Toronto', 'en_CA', 1, 'en', 0x5b7b226964223a312c226e616d65223a22456e676c697368222c2261626272223a22656e222c226c616e67646972223a226c7472222c22636f6c6f72223a2223374143423935222c22617574686f72223a22687474703a5c2f5c2f7777772e776f6a6f736372697074732e636f6d222c22686f6d65223a317d5d, 0, 0, 0, '<p>Our website is under construction, we are working very hard to give you the best experience on our new web site.</p>', '2018-01-31', '05:00:00', '<p>Instructions for offline payments...</p>\n<p>Your bank name etc...</p>', 'logo.svg', 'print_logo.png', 1, 1, 1, 1, 'CAD', 1, 20971520, 'png,jpg,jpeg,bmp,zip,pdf,doc,docx,txt', 1, 1, 1, 1800, 3, 1, '', 'PHP', '/usr/sbin/sendmail -t -i', 'mail.hostname.com', 'yourusername', 'yourpass', '25', 0, '<p><b>ABC Company Pty Ltd</b><br />123 Burke Street, Toronto ON, CANADA<br />Tel : (416) 1234-5678, Fax : (416) 1234-5679, Email : sales@abc-company.com<br />Web Site : www.abc-company.com</p>', '<p>TERMS &amp; CONDITIONS<br />1. Interest may be levied on overdue accounts. <br />2. Goods sold are not returnable or refundable</p>', 0x7b22686f6d65223a5b7b22706167655f74797065223a22686f6d65222c22736c75675f656e223a22686f6d65227d5d2c226e6f726d616c223a5b7b22706167655f74797065223a226e6f726d616c222c22736c75675f656e223a226f75722d636f6e746163742d696e666f227d5d2c226c6f67696e223a5b7b22706167655f74797065223a226c6f67696e222c22736c75675f656e223a226c6f67696e227d5d2c227265676973746572223a5b7b22706167655f74797065223a227265676973746572222c22736c75675f656e223a22726567697374726174696f6e227d5d2c226163746976617465223a5b7b22706167655f74797065223a226163746976617465222c22736c75675f656e223a226163746976617465227d5d2c226163636f756e74223a5b7b22706167655f74797065223a226163636f756e74222c22736c75675f656e223a2264617368626f617264227d5d2c22736561726368223a5b7b22706167655f74797065223a22736561726368222c22736c75675f656e223a22736561726368227d5d2c22736974656d6170223a5b7b22706167655f74797065223a22736974656d6170222c22736c75675f656e223a22736974656d6170227d5d2c2270726f66696c65223a5b7b22706167655f74797065223a2270726f66696c65222c22736c75675f656e223a202270726f66696c65227d5d7d, 0x7b0d0a202020226d6f64646972223a7b0d0a202020202020226469676973686f70223a226469676973686f70222c0d0a20202020202022626c6f67223a22626c6f67222c0d0a20202020202022706f7274666f6c696f223a22706f7274666f6c696f222c0d0a2020202020202267616c6c657279223a2267616c6c657279220d0a2020207d2c0d0a202020227061676564617461223a7b0d0a2020202020202270616765223a2270616765220d0a2020207d2c0d0a202020226d6f64756c65223a7b0d0a202020202020226469676973686f70223a226469676973686f70222c0d0a202020202020226469676973686f702d636174223a2263617465676f7279222c0d0a202020202020226469676973686f702d636865636b6f7574223a22636865636b6f7574222c0d0a20202020202022626c6f67223a22626c6f67222c0d0a20202020202022626c6f672d636174223a2263617465676f7279222c0d0a20202020202022626c6f672d736561726368223a22736561726368222c0d0a20202020202022626c6f672d61726368697665223a2261726368697665222c0d0a20202020202022626c6f672d617574686f72223a22617574686f72222c0d0a20202020202022626c6f672d746167223a22746167222c0d0a20202020202022706f7274666f6c696f223a22706f7274666f6c696f222c0d0a20202020202022706f7274666f6c696f2d636174223a2263617465676f7279222c0d0a2020202020202267616c6c657279223a2267616c6c657279222c0d0a2020202020202267616c6c6572792d616c62756d223a22616c62756d220d0a2020207d0d0a7d, 0x7b2266616365626f6f6b223a2266616365626f6f6b5f70616765222c2274776974746572223a22747769747465725f70616765227d, '', '', '1.00', '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

DROP TABLE IF EXISTS `stats`;
CREATE TABLE IF NOT EXISTS `stats` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `day` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pageviews` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `uniquevisitors` int(11) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trash`
--

DROP TABLE IF EXISTS `trash`;
CREATE TABLE IF NOT EXISTS `trash` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent` varchar(15) DEFAULT NULL,
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `type` varchar(15) DEFAULT NULL,
  `dataset` blob,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `email` varchar(60) NOT NULL,
  `membership_id` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `mem_expire` datetime DEFAULT NULL,
  `trial_used` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `memused` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `salt` varchar(25) NOT NULL,
  `hash` varchar(70) NOT NULL,
  `token` varchar(40) NOT NULL DEFAULT '0',
  `userlevel` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `type` varchar(10) NOT NULL DEFAULT 'member',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastlogin` datetime DEFAULT NULL,
  `lastip` varbinary(16) DEFAULT '000.000.000.000',
  `avatar` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `country` varchar(4) DEFAULT NULL,
  `notify` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `access` text,
  `notes` tinytext,
  `info` tinytext,
  `fb_link` varchar(100) DEFAULT NULL,
  `tw_link` varchar(100) DEFAULT NULL,
  `gp_link` varchar(100) DEFAULT NULL,
  `newsletter` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `stripe_cus` varchar(100) DEFAULT NULL,
  `modaccess` varchar(150) DEFAULT NULL,
  `plugaccess` varchar(150) DEFAULT NULL,
  `active` enum('y','n','t','b') NOT NULL DEFAULT 'n',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_memberships`
--

DROP TABLE IF EXISTS `user_memberships`;
CREATE TABLE IF NOT EXISTS `user_memberships` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tid` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `uid` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `mid` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `activated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `expire` timestamp NULL DEFAULT NULL,
  `recurring` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0 = expired, 1 = active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
