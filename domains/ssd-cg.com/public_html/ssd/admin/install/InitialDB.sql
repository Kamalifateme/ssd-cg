-- phpMyAdmin SQL Dump
-- version 4.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 20, 2014 at 09:19 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `freelance`
--

-- --------------------------------------------------------

--
-- Table structure for table `fx_account_details`
--

CREATE TABLE IF NOT EXISTS `fx_account_details` (
`id` bigint(20) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(160) DEFAULT NULL,
  `company` varchar(150) NOT NULL,
  `city` varchar(40) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `address` varchar(64) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `vat` varchar(32) NOT NULL,
  `language` varchar(40) DEFAULT 'english',
  `avatar` varchar(32) NOT NULL DEFAULT 'default_avatar.jpg'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fx_account_details`
--

INSERT INTO `fx_account_details` (`id`, `user_id`, `fullname`, `company`, `city`, `country`, `address`, `phone`, `vat`, `language`, `avatar`) VALUES
(1, 1, '-', '-', NULL, NULL, '', '', '', 'english', 'default_avatar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fx_activities`
--

CREATE TABLE IF NOT EXISTS `fx_activities` (
`activity_id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `module` varchar(32) CHARACTER SET latin1 NOT NULL,
  `module_field_id` int(11) NOT NULL,
  `activity` varchar(255) CHARACTER SET latin1 NOT NULL,
  `activity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `icon` varchar(32) CHARACTER SET latin1 DEFAULT 'fa-coffee',
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_assign_projects`
--

CREATE TABLE IF NOT EXISTS `fx_assign_projects` (
`a_id` int(11) NOT NULL,
  `assigned_user` int(11) NOT NULL,
  `project_assigned` int(11) NOT NULL,
  `assign_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_assign_tasks`
--

CREATE TABLE IF NOT EXISTS `fx_assign_tasks` (
`a_id` int(11) NOT NULL,
  `assigned_user` int(11) NOT NULL,
  `project_assigned` int(11) NOT NULL,
  `task_assigned` int(11) NOT NULL,
  `assign_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_bugs`
--

CREATE TABLE IF NOT EXISTS `fx_bugs` (
`bug_id` int(11) NOT NULL,
  `issue_ref` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `reporter` int(11) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `bug_status` enum('Unconfirmed','Confirmed','In Progress','Resolved','Verified') CHARACTER SET latin1 NOT NULL DEFAULT 'Unconfirmed',
  `priority` varchar(100) CHARACTER SET latin1 NOT NULL,
  `bug_description` text CHARACTER SET latin1 NOT NULL,
  `reported_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` varchar(64) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_bug_comments`
--

CREATE TABLE IF NOT EXISTS `fx_bug_comments` (
`c_id` int(11) NOT NULL,
  `bug_id` int(11) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `comment` text CHARACTER SET latin1 NOT NULL,
  `date_commented` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_bug_files`
--

CREATE TABLE IF NOT EXISTS `fx_bug_files` (
`file_id` int(11) NOT NULL,
  `bug` int(11) NOT NULL,
  `file_name` text CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_captcha`
--

CREATE TABLE IF NOT EXISTS `fx_captcha` (
`captcha_id` bigint(13) unsigned NOT NULL,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `word` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fx_captcha`
--

INSERT INTO `fx_captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(1, 1413789321, '::1', 'pIBDR2Zl');

-- --------------------------------------------------------

--
-- Table structure for table `fx_comments`
--

CREATE TABLE IF NOT EXISTS `fx_comments` (
`comment_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `message` text CHARACTER SET latin1 NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_comment_replies`
--

CREATE TABLE IF NOT EXISTS `fx_comment_replies` (
`reply_id` int(11) NOT NULL,
  `parent_comment` int(11) NOT NULL,
  `reply_msg` text CHARACTER SET latin1 NOT NULL,
  `replied_by` int(11) NOT NULL,
  `del` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_companies`
--

CREATE TABLE IF NOT EXISTS `fx_companies` (
`co_id` int(11) NOT NULL,
  `company_ref` int(32) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `primary_contact` varchar(10) NOT NULL DEFAULT '-',
  `company_email` varchar(64) NOT NULL,
  `company_website` varchar(255) NOT NULL,
  `company_phone` varchar(64) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(255) NOT NULL,
  `VAT` varchar(64) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_config`
--

CREATE TABLE IF NOT EXISTS `fx_config` (
  `config_key` varchar(255) CHARACTER SET latin1 NOT NULL,
  `value` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fx_config`
--

INSERT INTO `fx_config` (`config_key`, `value`) VALUES
('allowed_files', 'gif|jpg|png|pdf|doc|txt|docx|xls|zip|rar'),
('base_url', '%BaseURL%'),
('company_address', '4146 Golden Hickory Woods'),
('company_city', 'Glass Hill,Cancun'),
('company_country', 'South Africa'),
('company_domain', '%BaseURL%'),
('company_email', '%CompanyEmail%'),
('company_logo', 'logo.png'),
('company_name', 'Gitbench Inc.'),
('company_phone', '+123 456 789'),
('contact_person', 'John Doe'),
('cron_key', '34WI2L12L87I1A65M90M9A42N41D08A26I'),
('decimal_separator', ','),
('default_currency', 'USD'),
('default_currency_symbol', '$'),
('default_tax', '0'),
('default_terms', 'Thank you for your business. Please process this invoice within the due date.'),
('demo_mode', 'FALSE'),
('developer', 'ig63Yd/+yuA8127gEyTz9TY4pnoeKq8dtocVP44+BJvtlRp8Vqcetwjk51dhSB6Rx8aVIKOPfUmNyKGWK7C/gg=='),
('email_estimate_message', 'Hi {CLIENT}<br>\r\nThanks for your business inquiry. <br>\r\n\r\nThe estimate EST {REF} is attached with this email. <br>\r\nEstimate Overview:<br>\r\nEstimate # : EST {REF}<br>\r\nAmount: {CURRENCY} {AMOUNT}<br>\r\n \r\nYou can view the estimate online at:<br>\r\n{LINK}<br>\r\n\r\nBest Regards,<br>\r\n{COMPANY}'),
('email_invoice_message', 'Hello {CLIENT}<br>\r\nHere is the invoice of {CURRENCY} {AMOUNT}<br>\r\nYou can view the invoice online at:<br>\r\n\r\n{LINK}<br>\r\n\r\n\r\nBest Regards,<br>\r\n\r\n{COMPANY}'),
('file_max_size', '8000'),
('invoice_logo', 'invoice_logo.png'),
('language', 'english'),
('paypal_cancel_url', 'paypal/cancel'),
('paypal_email', '%CompanyEmail%'),
('paypal_ipn_url', 'paypal/t_ipn/ipn'),
('paypal_live', 'TRUE'),
('paypal_success_url', 'paypal/success'),
('protocol', 'mail'),
('reminder_message', 'Hello {CLIENT}<br>\r\nThis is a friendly reminder to pay your invoice of {CURRENCY} {AMOUNT}<br>\r\n\r\nYou can view the invoice online at:<br>\r\n\r\n{LINK}<br>\r\n\r\n\r\nBest Regards,<br>\r\n\r\n{COMPANY}'),
('reset_key', '34WI2L12L87I1A65M90M9A42N41D08A26I'),
('sidebar_theme', 'black'),
('site_author', 'William M.'),
('site_desc', 'Freelancer Office is a Web based PHP application for Freelancers - buy it on Codecanyon'),
('smtp_host', ''),
('smtp_pass', 'yHMhW2M211+RnGhRORE40R7RA1neupFwE1ybIfX7s3WYtir/CBeUXOeeaGFiPYK6GByCA0ynePV9ubMKv2k0GQ=='),
('smtp_port', '25'),
('smtp_user', ''),
('thousand_separator', '.'),
('use_postmark', 'FALSE'),
('webmaster_email', '%CompanyEmail%'),
('website_name', 'Freelancer Office');

-- --------------------------------------------------------

--
-- Table structure for table `fx_countries`
--

CREATE TABLE IF NOT EXISTS `fx_countries` (
`id` int(6) NOT NULL,
  `value` varchar(250) CHARACTER SET latin1 NOT NULL DEFAULT ''
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=243 ;

--
-- Dumping data for table `fx_countries`
--

INSERT INTO `fx_countries` (`id`, `value`) VALUES
(1, 'Afghanistan'),
(2, 'Aringland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean territory'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo'),
(52, ' Democratic Republic'),
(53, 'Cook Islands'),
(54, 'Costa Rica'),
(55, 'Ivory Coast (Ivory Coast)'),
(56, 'Croatia (Hrvatska)'),
(57, 'Cuba'),
(58, 'Cyprus'),
(59, 'Czech Republic'),
(60, 'Denmark'),
(61, 'Djibouti'),
(62, 'Dominica'),
(63, 'Dominican Republic'),
(64, 'East Timor'),
(65, 'Ecuador'),
(66, 'Egypt'),
(67, 'El Salvador'),
(68, 'Equatorial Guinea'),
(69, 'Eritrea'),
(70, 'Estonia'),
(71, 'Ethiopia'),
(72, 'Falkland Islands'),
(73, 'Faroe Islands'),
(74, 'Fiji'),
(75, 'Finland'),
(76, 'France'),
(77, 'French Guiana'),
(78, 'French Polynesia'),
(79, 'French Southern Territories'),
(80, 'Gabon'),
(81, 'Gambia'),
(82, 'Georgia'),
(83, 'Germany'),
(84, 'Ghana'),
(85, 'Gibraltar'),
(86, 'Greece'),
(87, 'Greenland'),
(88, 'Grenada'),
(89, 'Guadeloupe'),
(90, 'Guam'),
(91, 'Guatemala'),
(92, 'Guinea'),
(93, 'Guinea-Bissau'),
(94, 'Guyana'),
(95, 'Haiti'),
(96, 'Heard and McDonald Islands'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Israel'),
(107, 'Italy'),
(108, 'Jamaica'),
(109, 'Japan'),
(110, 'Jordan'),
(111, 'Kazakhstan'),
(112, 'Kenya'),
(113, 'Kiribati'),
(114, 'Korea (north)'),
(115, 'Korea (south)'),
(116, 'Kuwait'),
(117, 'Kyrgyzstan'),
(118, 'Lao People''s Democratic Republic'),
(119, 'Latvia'),
(120, 'Lebanon'),
(121, 'Lesotho'),
(122, 'Liberia'),
(123, 'Libyan Arab Jamahiriya'),
(124, 'Liechtenstein'),
(125, 'Lithuania'),
(126, 'Luxembourg'),
(127, 'Macao'),
(128, 'Macedonia'),
(129, 'Madagascar'),
(130, 'Malawi'),
(131, 'Malaysia'),
(132, 'Maldives'),
(133, 'Mali'),
(134, 'Malta'),
(135, 'Marshall Islands'),
(136, 'Martinique'),
(137, 'Mauritania'),
(138, 'Mauritius'),
(139, 'Mayotte'),
(140, 'Mexico'),
(141, 'Micronesia'),
(142, 'Moldova'),
(143, 'Monaco'),
(144, 'Mongolia'),
(145, 'Montserrat'),
(146, 'Morocco'),
(147, 'Mozambique'),
(148, 'Myanmar'),
(149, 'Namibia'),
(150, 'Nauru'),
(151, 'Nepal'),
(152, 'Netherlands'),
(153, 'Netherlands Antilles'),
(154, 'New Caledonia'),
(155, 'New Zealand'),
(156, 'Nicaragua'),
(157, 'Niger'),
(158, 'Nigeria'),
(159, 'Niue'),
(160, 'Norfolk Island'),
(161, 'Northern Mariana Islands'),
(162, 'Norway'),
(163, 'Oman'),
(164, 'Pakistan'),
(165, 'Palau'),
(166, 'Palestinian Territories'),
(167, 'Panama'),
(168, 'Papua New Guinea'),
(169, 'Paraguay'),
(170, 'Peru'),
(171, 'Philippines'),
(172, 'Pitcairn'),
(173, 'Poland'),
(174, 'Portugal'),
(175, 'Puerto Rico'),
(176, 'Qatar'),
(177, 'Runion'),
(178, 'Romania'),
(179, 'Russian Federation'),
(180, 'Rwanda'),
(181, 'Saint Helena'),
(182, 'Saint Kitts and Nevis'),
(183, 'Saint Lucia'),
(184, 'Saint Pierre and Miquelon'),
(185, 'Saint Vincent and the Grenadines'),
(186, 'Samoa'),
(187, 'San Marino'),
(188, 'Sao Tome and Principe'),
(189, 'Saudi Arabia'),
(190, 'Senegal'),
(191, 'Serbia and Montenegro'),
(192, 'Seychelles'),
(193, 'Sierra Leone'),
(194, 'Singapore'),
(195, 'Slovakia'),
(196, 'Slovenia'),
(197, 'Solomon Islands'),
(198, 'Somalia'),
(199, 'South Africa'),
(200, 'South Georgia and the South Sandwich Islands'),
(201, 'Spain'),
(202, 'Sri Lanka'),
(203, 'Sudan'),
(204, 'Suriname'),
(205, 'Svalbard and Jan Mayen Islands'),
(206, 'Swaziland'),
(207, 'Sweden'),
(208, 'Switzerland'),
(209, 'Syria'),
(210, 'Taiwan'),
(211, 'Tajikistan'),
(212, 'Tanzania'),
(213, 'Thailand'),
(214, 'Togo'),
(215, 'Tokelau'),
(216, 'Tonga'),
(217, 'Trinidad and Tobago'),
(218, 'Tunisia'),
(219, 'Turkey'),
(220, 'Turkmenistan'),
(221, 'Turks and Caicos Islands'),
(222, 'Tuvalu'),
(223, 'Uganda'),
(224, 'Ukraine'),
(225, 'United Arab Emirates'),
(226, 'United Kingdom'),
(227, 'United States of America'),
(228, 'Uruguay'),
(229, 'Uzbekistan'),
(230, 'Vanuatu'),
(231, 'Vatican City'),
(232, 'Venezuela'),
(233, 'Vietnam'),
(234, 'Virgin Islands (British)'),
(235, 'Virgin Islands (US)'),
(236, 'Wallis and Futuna Islands'),
(237, 'Western Sahara'),
(238, 'Yemen'),
(239, 'Zaire'),
(240, 'Zambia'),
(241, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `fx_estimates`
--

CREATE TABLE IF NOT EXISTS `fx_estimates` (
`est_id` int(11) NOT NULL,
  `reference_no` varchar(32) CHARACTER SET latin1 NOT NULL,
  `client` varchar(64) CHARACTER SET latin1 NOT NULL,
  `due_date` varchar(40) CHARACTER SET latin1 NOT NULL,
  `notes` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'Looking forward for your business.',
  `tax` int(11) NOT NULL DEFAULT '0',
  `status` enum('Accepted','Declined','Pending') CHARACTER SET latin1 NOT NULL DEFAULT 'Pending',
  `date_sent` varchar(64) CHARACTER SET latin1 NOT NULL,
  `est_deleted` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `date_saved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `emailed` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `invoiced` enum('Yes','No') CHARACTER SET latin1 DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_estimate_items`
--

CREATE TABLE IF NOT EXISTS `fx_estimate_items` (
`item_id` int(11) NOT NULL,
  `estimate_id` int(11) NOT NULL,
  `item_desc` varchar(200) CHARACTER SET latin1 NOT NULL,
  `unit_cost` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_cost` float NOT NULL,
  `date_saved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_files`
--

CREATE TABLE IF NOT EXISTS `fx_files` (
`file_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `file_name` text CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_invoices`
--

CREATE TABLE IF NOT EXISTS `fx_invoices` (
`inv_id` int(11) NOT NULL,
  `reference_no` varchar(32) CHARACTER SET latin1 NOT NULL,
  `client` varchar(64) CHARACTER SET latin1 NOT NULL,
  `due_date` varchar(40) CHARACTER SET latin1 NOT NULL,
  `notes` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'A finance charge of 1.5% will be made on unpaid balances after due day.Thank you for your business.',
  `allow_paypal` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'Yes',
  `tax` int(11) NOT NULL DEFAULT '0',
  `recurring` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `r_freq` int(11) NOT NULL DEFAULT '31',
  `currency` varchar(32) CHARACTER SET latin1 NOT NULL DEFAULT 'USD',
  `status` enum('Unpaid','Paid') CHARACTER SET latin1 NOT NULL DEFAULT 'Unpaid',
  `archived` int(11) NOT NULL DEFAULT '0',
  `date_sent` varchar(64) CHARACTER SET latin1 NOT NULL,
  `inv_deleted` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `date_saved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `emailed` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_ipn_log`
--

CREATE TABLE IF NOT EXISTS `fx_ipn_log` (
`id` int(11) NOT NULL,
  `listener_name` varchar(3) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Either IPN or API',
  `transaction_type` varchar(16) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The type of call being made to the listener',
  `transaction_id` varchar(19) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The unique transaction ID generated by PayPal',
  `status` varchar(16) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The status of the call',
  `message` varchar(512) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Explanation of the call status',
  `ipn_data_hash` varchar(32) CHARACTER SET latin1 DEFAULT NULL COMMENT 'MD5 hash of the IPN post data',
  `detail` text CHARACTER SET latin1 COMMENT 'Detail text (potentially JSON) on this call',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_ipn_orders`
--

CREATE TABLE IF NOT EXISTS `fx_ipn_orders` (
`id` int(11) NOT NULL,
  `notify_version` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'IPN Version Number',
  `verify_sign` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Encrypted string used to verify the authenticityof the tansaction',
  `test_ipn` int(11) DEFAULT NULL,
  `protection_eligibility` varchar(24) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Which type of seller protection the buyer is protected by',
  `charset` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Character set used by PayPal',
  `btn_id` varchar(40) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The PayPal buy button clicked',
  `address_city` varchar(40) CHARACTER SET latin1 DEFAULT NULL COMMENT 'City of customers address',
  `address_country` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Country of customers address',
  `address_country_code` varchar(2) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Two character ISO 3166 country code',
  `address_name` varchar(128) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Name used with address (included when customer provides a Gift address)',
  `address_state` varchar(40) CHARACTER SET latin1 DEFAULT NULL COMMENT 'State of customer address',
  `address_status` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'confirmed/unconfirmed',
  `address_street` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s street address',
  `address_zip` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Zip code of customer''s address',
  `first_name` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s first name',
  `last_name` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s last name',
  `payer_business_name` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s company name, if customer represents a business',
  `payer_email` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s primary email address. Use this email to provide any credits',
  `payer_id` varchar(13) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Unique customer ID.',
  `payer_status` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'verified/unverified',
  `contact_phone` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s telephone number.',
  `residence_country` varchar(2) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Two-Character ISO 3166 country code',
  `business` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Email address or account ID of the payment recipient (that is, the merchant). Equivalent to the values of receiver_email (If payment is sent to primary account) and business set in the Website Payment HTML.',
  `receiver_email` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Primary email address of the payment recipient (that is, the merchant). If the payment is sent to a non-primary email address on your PayPal account, the receiver_email is still your primary email.',
  `receiver_id` varchar(13) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Unique account ID of the payment recipient (i.e., the merchant). This is the same as the recipients referral ID.',
  `custom` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Custom value as passed by you, the merchant. These are pass-through variables that are never presented to your customer.',
  `invoice` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Pass through variable you can use to identify your invoice number for this purchase. If omitted, no variable is passed back.',
  `memo` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Memo as entered by your customer in PayPal Website Payments note field.',
  `tax` decimal(10,2) DEFAULT NULL COMMENT 'Amount of tax charged on payment',
  `auth_id` varchar(19) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Authorization identification number',
  `auth_exp` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Authorization expiration date and time, in the following format: HH:MM:SS DD Mmm YY, YYYY PST',
  `auth_amount` int(11) DEFAULT NULL COMMENT 'Authorization amount',
  `auth_status` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Status of authorization',
  `num_cart_items` int(11) DEFAULT NULL COMMENT 'If this is a PayPal shopping cart transaction, number of items in the cart',
  `parent_txn_id` varchar(19) CHARACTER SET latin1 DEFAULT NULL COMMENT 'In the case of a refund, reversal, or cancelled reversal, this variable contains the txn_id of the original transaction, while txn_id contains a new ID for the new transaction.',
  `payment_date` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Time/date stamp generated by PayPal, in the following format: HH:MM:SS DD Mmm YY, YYYY PST',
  `payment_status` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Payment status of the payment',
  `payment_type` varchar(10) CHARACTER SET latin1 DEFAULT NULL COMMENT 'echeck/instant',
  `pending_reason` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'This variable is only set if payment_status=pending',
  `reason_code` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'This variable is only set if payment_status=reversed',
  `remaining_settle` int(11) DEFAULT NULL COMMENT 'Remaining amount that can be captured with Authorization and Capture',
  `shipping_method` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The name of a shipping method from the shipping calculations section of the merchants account profile. The buyer selected the named shipping method for this transaction',
  `shipping` decimal(10,2) DEFAULT NULL COMMENT 'Shipping charges associated with this transaction. Format unsigned, no currency symbol, two decimal places',
  `transaction_entity` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Authorization and capture transaction entity',
  `txn_id` varchar(19) CHARACTER SET latin1 DEFAULT NULL COMMENT 'A unique transaction ID generated by PayPal',
  `txn_type` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'cart/express_checkout/send-money/virtual-terminal/web-accept',
  `exchange_rate` decimal(10,2) DEFAULT NULL COMMENT 'Exchange rate used if a currency conversion occured',
  `mc_currency` varchar(3) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Three character country code. For payment IPN notifications, this is the currency of the payment, for non-payment subscription IPN notifications, this is the currency of the subscription.',
  `mc_fee` decimal(10,2) DEFAULT NULL COMMENT 'Transaction fee associated with the payment, mc_gross minus mc_fee equals the amount deposited into the receiver_email account. Equivalent to payment_fee for USD payments. If this amount is negative, it signifies a refund or reversal, and either ofthose p',
  `mc_gross` decimal(10,2) DEFAULT NULL COMMENT 'Full amount of the customer''s payment',
  `mc_handling` decimal(10,2) DEFAULT NULL COMMENT 'Total handling charge associated with the transaction',
  `mc_shipping` decimal(10,2) DEFAULT NULL COMMENT 'Total shipping amount associated with the transaction',
  `payment_fee` decimal(10,2) DEFAULT NULL COMMENT 'USD transaction fee associated with the payment',
  `payment_gross` decimal(10,2) DEFAULT NULL COMMENT 'Full USD amount of the customers payment transaction, before payment_fee is subtracted',
  `settle_amount` decimal(10,2) DEFAULT NULL COMMENT 'Amount that is deposited into the account''s primary balance after a currency conversion',
  `settle_currency` varchar(3) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Currency of settle amount. Three digit currency code',
  `auction_buyer_id` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The customer''s auction ID.',
  `auction_closing_date` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The auction''s close date. In the format: HH:MM:SS DD Mmm YY, YYYY PSD',
  `auction_multi_item` int(11) DEFAULT NULL COMMENT 'The number of items purchased in multi-item auction payments',
  `for_auction` varchar(10) CHARACTER SET latin1 DEFAULT NULL COMMENT 'This is an auction payment - payments made using Pay for eBay Items or Smart Logos - as well as send money/money request payments with the type eBay items or Auction Goods(non-eBay)',
  `subscr_date` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Start date or cancellation date depending on whether txn_type is subcr_signup or subscr_cancel',
  `subscr_effective` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Date when a subscription modification becomes effective',
  `period1` varchar(10) CHARACTER SET latin1 DEFAULT NULL COMMENT '(Optional) Trial subscription interval in days, weeks, months, years (example a 4 day interval is 4 D',
  `period2` varchar(10) CHARACTER SET latin1 DEFAULT NULL COMMENT '(Optional) Trial period',
  `period3` varchar(10) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Regular subscription interval in days, weeks, months, years',
  `amount1` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for Trial period 1 for USD',
  `amount2` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for Trial period 2 for USD',
  `amount3` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for regular subscription  period 1 for USD',
  `mc_amount1` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for trial period 1 regardless of currency',
  `mc_amount2` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for trial period 2 regardless of currency',
  `mc_amount3` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for regular subscription period regardless of currency',
  `recurring` varchar(1) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Indicates whether rate recurs (1 is yes, blank is no)',
  `reattempt` varchar(1) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Indicates whether reattempts should occur on payment failure (1 is yes, blank is no)',
  `retry_at` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Date PayPal will retry a failed subscription payment',
  `recur_times` int(11) DEFAULT NULL COMMENT 'The number of payment installations that will occur at the regular rate',
  `username` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT '(Optional) Username generated by PayPal and given to subscriber to access the subscription',
  `password` varchar(24) CHARACTER SET latin1 DEFAULT NULL COMMENT '(Optional) Password generated by PayPal and given to subscriber to access the subscription (Encrypted)',
  `subscr_id` varchar(19) CHARACTER SET latin1 DEFAULT NULL COMMENT 'ID generated by PayPal for the subscriber',
  `case_id` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Case identification number',
  `case_type` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'complaint/chargeback',
  `case_creation_date` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Date/Time the case was registered',
  `order_status` enum('PAID','WAITING','REJECTED') CHARACTER SET latin1 DEFAULT NULL COMMENT 'Additional variable to make payment_status more actionable',
  `discount` decimal(10,2) DEFAULT NULL COMMENT 'Additional variable to record the discount made on the order',
  `shipping_discount` decimal(10,2) DEFAULT NULL COMMENT 'Record the discount made on the shipping',
  `ipn_track_id` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Internal tracking variable added in April 2011',
  `transaction_subject` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Describes the product for a button-based purchase',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_ipn_order_items`
--

CREATE TABLE IF NOT EXISTS `fx_ipn_order_items` (
`id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `item_name` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Item name as passed by you, the merchant. Or, if not passed by you, as entered by your customer. If this is a shopping cart transaction, Paypal will append the number of the item (e.g., item_name_1,item_name_2, and so forth).',
  `item_number` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Pass-through variable for you to track purchases. It will get passed back to you at the completion of the payment. If omitted, no variable will be passed back to you.',
  `quantity` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Quantity as entered by your customer or as passed by you, the merchant. If this is a shopping cart transaction, PayPal appends the number of the item (e.g., quantity1,quantity2).',
  `mc_gross` decimal(10,2) DEFAULT NULL COMMENT 'Full amount of the customer''s payment',
  `mc_handling` decimal(10,2) DEFAULT NULL COMMENT 'Total handling charge associated with the transaction',
  `mc_shipping` decimal(10,2) DEFAULT NULL COMMENT 'Total shipping amount associated with the transaction',
  `tax` decimal(10,2) DEFAULT NULL COMMENT 'Amount of tax charged on payment',
  `cost_per_item` decimal(10,2) DEFAULT NULL COMMENT 'Cost of an individual item',
  `option_name_1` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 1 name as requested by you',
  `option_selection_1` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 1 choice as entered by your customer',
  `option_name_2` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 2 name as requested by you',
  `option_selection_2` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 2 choice as entered by your customer',
  `option_name_3` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 3 name as requested by you',
  `option_selection_3` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 3 choice as entered by your customer',
  `option_name_4` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 4 name as requested by you',
  `option_selection_4` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 4 choice as entered by your customer',
  `option_name_5` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 5 name as requested by you',
  `option_selection_5` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 5 choice as entered by your customer',
  `option_name_6` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 6 name as requested by you',
  `option_selection_6` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 6 choice as entered by your customer',
  `option_name_7` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 7 name as requested by you',
  `option_selection_7` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 7 choice as entered by your customer',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_items`
--

CREATE TABLE IF NOT EXISTS `fx_items` (
`item_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `item_desc` varchar(200) CHARACTER SET latin1 NOT NULL,
  `unit_cost` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_cost` float NOT NULL,
  `date_saved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_items_saved`
--

CREATE TABLE IF NOT EXISTS `fx_items_saved` (
`item_id` int(11) NOT NULL,
  `item_desc` varchar(200) CHARACTER SET latin1 NOT NULL,
  `unit_cost` int(11) NOT NULL,
  `deleted` enum('Yes','No') CHARACTER SET latin1 DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_login_attempts`
--

CREATE TABLE IF NOT EXISTS `fx_login_attempts` (
`id` int(11) NOT NULL,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_messages`
--

CREATE TABLE IF NOT EXISTS `fx_messages` (
`msg_id` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `message` text CHARACTER SET latin1 NOT NULL,
  `status` enum('Read','Unread') CHARACTER SET latin1 NOT NULL DEFAULT 'Unread',
  `attached_file` varchar(100) CHARACTER SET latin1 NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_payments`
--

CREATE TABLE IF NOT EXISTS `fx_payments` (
`p_id` int(11) NOT NULL,
  `invoice` int(11) NOT NULL,
  `paid_by` int(11) NOT NULL,
  `payer_email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `payment_method` varchar(64) CHARACTER SET latin1 NOT NULL,
  `amount` float NOT NULL,
  `trans_id` varchar(64) CHARACTER SET latin1 NOT NULL,
  `notes` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `month_paid` varchar(32) CHARACTER SET latin1 NOT NULL,
  `year_paid` varchar(32) CHARACTER SET latin1 NOT NULL,
  `inv_deleted` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_payment_methods`
--

CREATE TABLE IF NOT EXISTS `fx_payment_methods` (
`method_id` int(11) NOT NULL,
  `method_name` varchar(64) CHARACTER SET latin1 NOT NULL DEFAULT 'Paypal'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fx_payment_methods`
--

INSERT INTO `fx_payment_methods` (`method_id`, `method_name`) VALUES
(1, 'Paypal'),
(2, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `fx_projects`
--

CREATE TABLE IF NOT EXISTS `fx_projects` (
`project_id` int(11) NOT NULL,
  `project_code` varchar(32) CHARACTER SET latin1 NOT NULL,
  `project_title` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'Project Title',
  `client` int(11) NOT NULL,
  `start_date` varchar(32) CHARACTER SET latin1 NOT NULL,
  `due_date` varchar(40) CHARACTER SET latin1 NOT NULL,
  `fixed_rate` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `hourly_rate` float NOT NULL,
  `fixed_price` float NOT NULL,
  `progress` int(11) NOT NULL,
  `notes` text CHARACTER SET latin1 NOT NULL,
  `assign_to` varchar(255) NOT NULL,
  `status` enum('On Hold','Active','Done') CHARACTER SET latin1 NOT NULL DEFAULT 'Active',
  `timer` enum('On','Off') CHARACTER SET latin1 NOT NULL DEFAULT 'Off',
  `timer_start` int(11) NOT NULL,
  `time_logged` int(11) NOT NULL,
  `proj_deleted` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `auto_progress` enum('TRUE','FALSE') CHARACTER SET latin1 NOT NULL DEFAULT 'FALSE',
  `estimate_hours` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_project_timer`
--

CREATE TABLE IF NOT EXISTS `fx_project_timer` (
`timer_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `start_time` varchar(64) CHARACTER SET latin1 NOT NULL,
  `end_time` varchar(64) CHARACTER SET latin1 NOT NULL,
  `date_timed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_roles`
--

CREATE TABLE IF NOT EXISTS `fx_roles` (
`r_id` int(11) NOT NULL,
  `role` varchar(64) CHARACTER SET latin1 NOT NULL,
  `default` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `fx_roles`
--

INSERT INTO `fx_roles` (`r_id`, `role`, `default`) VALUES
(1, 'admin', 1),
(2, 'client', 2),
(3, 'collaborator', 3);

-- --------------------------------------------------------

--
-- Table structure for table `fx_saved_tasks`
--

CREATE TABLE IF NOT EXISTS `fx_saved_tasks` (
`template_id` int(11) NOT NULL,
  `task_name` varchar(64) CHARACTER SET latin1 NOT NULL,
  `task_desc` varchar(255) CHARACTER SET latin1 NOT NULL,
  `visible` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'Yes',
  `estimate_hours` float NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `saved_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_tasks`
--

CREATE TABLE IF NOT EXISTS `fx_tasks` (
`t_id` int(11) NOT NULL,
  `task_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `project` int(11) NOT NULL,
  `assigned_to` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `visible` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'Yes',
  `task_progress` int(11) NOT NULL DEFAULT '0',
  `timer_status` enum('On','Off') CHARACTER SET latin1 NOT NULL DEFAULT 'Off',
  `start_time` int(11) NOT NULL,
  `estimated_hours` int(11) NOT NULL,
  `logged_time` int(11) NOT NULL DEFAULT '0',
  `auto_progress` enum('TRUE','FALSE') CHARACTER SET latin1 NOT NULL DEFAULT 'FALSE',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_tasks_timer`
--

CREATE TABLE IF NOT EXISTS `fx_tasks_timer` (
`timer_id` int(11) NOT NULL,
  `task` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `start_time` varchar(64) CHARACTER SET latin1 NOT NULL,
  `end_time` varchar(64) CHARACTER SET latin1 NOT NULL,
  `date_timed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_un_sessions`
--

CREATE TABLE IF NOT EXISTS `fx_un_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `fx_un_sessions`
--

INSERT INTO `fx_un_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('eccd3f8f66095aa6decddeb97566ef5d', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0', 1413789313, 'a:7:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"1";s:8:"username";s:5:"admin";s:7:"role_id";s:1:"1";s:6:"status";s:1:"1";s:14:"requested_page";s:31:"http://localhost/devfo/messages";s:13:"previous_page";s:31:"http://localhost/devfo/messages";}');

-- --------------------------------------------------------

--
-- Table structure for table `fx_users`
--

CREATE TABLE IF NOT EXISTS `fx_users` (
`id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fx_users`
--

INSERT INTO `fx_users` (`id`, `username`, `password`, `email`, `role_id`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'admin', '$P$BG0UyYkDFv4MgN.48F8fgUlInRX5qM/', 'wm@gitbench.com', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, '::1', '2014-10-20 09:18:24', '2014-10-20 09:17:58', '2014-10-20 07:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `fx_user_autologin`
--

CREATE TABLE IF NOT EXISTS `fx_user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fx_account_details`
--
ALTER TABLE `fx_account_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_activities`
--
ALTER TABLE `fx_activities`
 ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `fx_assign_projects`
--
ALTER TABLE `fx_assign_projects`
 ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `fx_assign_tasks`
--
ALTER TABLE `fx_assign_tasks`
 ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `fx_bugs`
--
ALTER TABLE `fx_bugs`
 ADD PRIMARY KEY (`bug_id`), ADD UNIQUE KEY `issue_ref` (`issue_ref`);

--
-- Indexes for table `fx_bug_comments`
--
ALTER TABLE `fx_bug_comments`
 ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `fx_bug_files`
--
ALTER TABLE `fx_bug_files`
 ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `fx_captcha`
--
ALTER TABLE `fx_captcha`
 ADD PRIMARY KEY (`captcha_id`), ADD KEY `word` (`word`);

--
-- Indexes for table `fx_comments`
--
ALTER TABLE `fx_comments`
 ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `fx_comment_replies`
--
ALTER TABLE `fx_comment_replies`
 ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `fx_companies`
--
ALTER TABLE `fx_companies`
 ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `fx_config`
--
ALTER TABLE `fx_config`
 ADD PRIMARY KEY (`config_key`);

--
-- Indexes for table `fx_countries`
--
ALTER TABLE `fx_countries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_estimates`
--
ALTER TABLE `fx_estimates`
 ADD PRIMARY KEY (`est_id`), ADD UNIQUE KEY `reference_no` (`reference_no`);

--
-- Indexes for table `fx_estimate_items`
--
ALTER TABLE `fx_estimate_items`
 ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `fx_files`
--
ALTER TABLE `fx_files`
 ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `fx_invoices`
--
ALTER TABLE `fx_invoices`
 ADD PRIMARY KEY (`inv_id`), ADD UNIQUE KEY `reference_no` (`reference_no`);

--
-- Indexes for table `fx_ipn_log`
--
ALTER TABLE `fx_ipn_log`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_ipn_orders`
--
ALTER TABLE `fx_ipn_orders`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UniqueTransactionID` (`txn_id`);

--
-- Indexes for table `fx_ipn_order_items`
--
ALTER TABLE `fx_ipn_order_items`
 ADD PRIMARY KEY (`id`), ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `fx_items`
--
ALTER TABLE `fx_items`
 ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `fx_items_saved`
--
ALTER TABLE `fx_items_saved`
 ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `fx_login_attempts`
--
ALTER TABLE `fx_login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_messages`
--
ALTER TABLE `fx_messages`
 ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `fx_payments`
--
ALTER TABLE `fx_payments`
 ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `fx_payment_methods`
--
ALTER TABLE `fx_payment_methods`
 ADD PRIMARY KEY (`method_id`);

--
-- Indexes for table `fx_projects`
--
ALTER TABLE `fx_projects`
 ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `fx_project_timer`
--
ALTER TABLE `fx_project_timer`
 ADD PRIMARY KEY (`timer_id`);

--
-- Indexes for table `fx_roles`
--
ALTER TABLE `fx_roles`
 ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `fx_saved_tasks`
--
ALTER TABLE `fx_saved_tasks`
 ADD PRIMARY KEY (`template_id`);

--
-- Indexes for table `fx_tasks`
--
ALTER TABLE `fx_tasks`
 ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `fx_tasks_timer`
--
ALTER TABLE `fx_tasks_timer`
 ADD PRIMARY KEY (`timer_id`);

--
-- Indexes for table `fx_un_sessions`
--
ALTER TABLE `fx_un_sessions`
 ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `fx_users`
--
ALTER TABLE `fx_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `fx_user_autologin`
--
ALTER TABLE `fx_user_autologin`
 ADD PRIMARY KEY (`key_id`,`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fx_account_details`
--
ALTER TABLE `fx_account_details`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fx_activities`
--
ALTER TABLE `fx_activities`
MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_assign_projects`
--
ALTER TABLE `fx_assign_projects`
MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_assign_tasks`
--
ALTER TABLE `fx_assign_tasks`
MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_bugs`
--
ALTER TABLE `fx_bugs`
MODIFY `bug_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_bug_comments`
--
ALTER TABLE `fx_bug_comments`
MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_bug_files`
--
ALTER TABLE `fx_bug_files`
MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_captcha`
--
ALTER TABLE `fx_captcha`
MODIFY `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fx_comments`
--
ALTER TABLE `fx_comments`
MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_comment_replies`
--
ALTER TABLE `fx_comment_replies`
MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_companies`
--
ALTER TABLE `fx_companies`
MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_countries`
--
ALTER TABLE `fx_countries`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=243;
--
-- AUTO_INCREMENT for table `fx_estimates`
--
ALTER TABLE `fx_estimates`
MODIFY `est_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_estimate_items`
--
ALTER TABLE `fx_estimate_items`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_files`
--
ALTER TABLE `fx_files`
MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_invoices`
--
ALTER TABLE `fx_invoices`
MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_ipn_log`
--
ALTER TABLE `fx_ipn_log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_ipn_orders`
--
ALTER TABLE `fx_ipn_orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_ipn_order_items`
--
ALTER TABLE `fx_ipn_order_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_items`
--
ALTER TABLE `fx_items`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_items_saved`
--
ALTER TABLE `fx_items_saved`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_login_attempts`
--
ALTER TABLE `fx_login_attempts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_messages`
--
ALTER TABLE `fx_messages`
MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_payments`
--
ALTER TABLE `fx_payments`
MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_payment_methods`
--
ALTER TABLE `fx_payment_methods`
MODIFY `method_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fx_projects`
--
ALTER TABLE `fx_projects`
MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_project_timer`
--
ALTER TABLE `fx_project_timer`
MODIFY `timer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_roles`
--
ALTER TABLE `fx_roles`
MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fx_saved_tasks`
--
ALTER TABLE `fx_saved_tasks`
MODIFY `template_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_tasks`
--
ALTER TABLE `fx_tasks`
MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_tasks_timer`
--
ALTER TABLE `fx_tasks_timer`
MODIFY `timer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_users`
--
ALTER TABLE `fx_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
