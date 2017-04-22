#
# TABLE STRUCTURE FOR: fx_account_details
#

DROP TABLE IF EXISTS fx_account_details;

CREATE TABLE `fx_account_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(160) DEFAULT NULL,
  `company` varchar(150) NOT NULL,
  `city` varchar(40) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `address` varchar(64) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `vat` varchar(32) NOT NULL,
  `language` varchar(40) DEFAULT 'english',
  `avatar` varchar(32) NOT NULL DEFAULT 'default_avatar.jpg',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

INSERT INTO fx_account_details (`id`, `user_id`, `fullname`, `company`, `city`, `country`, `address`, `phone`, `vat`, `language`, `avatar`) VALUES (1, 1, 'پیام غلامرضایی', '-', '', 'Iran', '', '', '', 'english', 'USER-ADMIN-AVATAR.jpg');
INSERT INTO fx_account_details (`id`, `user_id`, `fullname`, `company`, `city`, `country`, `address`, `phone`, `vat`, `language`, `avatar`) VALUES (2, 2, 'alu', '-', NULL, NULL, '', '', '', 'english', 'default_avatar.jpg');
INSERT INTO fx_account_details (`id`, `user_id`, `fullname`, `company`, `city`, `country`, `address`, `phone`, `vat`, `language`, `avatar`) VALUES (3, 3, '-', '-', NULL, NULL, '', '', '', 'english', 'default_avatar.jpg');
INSERT INTO fx_account_details (`id`, `user_id`, `fullname`, `company`, `city`, `country`, `address`, `phone`, `vat`, `language`, `avatar`) VALUES (4, 4, '-', '-', NULL, NULL, '', '', '', 'english', 'default_avatar.jpg');
INSERT INTO fx_account_details (`id`, `user_id`, `fullname`, `company`, `city`, `country`, `address`, `phone`, `vat`, `language`, `avatar`) VALUES (5, 5, '-', '-', NULL, NULL, '', '', '', 'english', 'default_avatar.jpg');
INSERT INTO fx_account_details (`id`, `user_id`, `fullname`, `company`, `city`, `country`, `address`, `phone`, `vat`, `language`, `avatar`) VALUES (6, 6, '-', '-', NULL, NULL, '', '', '', 'english', 'default_avatar.jpg');
INSERT INTO fx_account_details (`id`, `user_id`, `fullname`, `company`, `city`, `country`, `address`, `phone`, `vat`, `language`, `avatar`) VALUES (7, 7, '-', '-', NULL, NULL, '', '', '', 'english', 'default_avatar.jpg');


#
# TABLE STRUCTURE FOR: fx_activities
#

DROP TABLE IF EXISTS fx_activities;

CREATE TABLE `fx_activities` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `module` varchar(32) CHARACTER SET latin1 NOT NULL,
  `module_field_id` int(11) NOT NULL,
  `activity` varchar(255) CHARACTER SET latin1 NOT NULL,
  `activity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `icon` varchar(32) CHARACTER SET latin1 DEFAULT 'fa-coffee',
  `deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`activity_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO fx_activities (`activity_id`, `user`, `module`, `module_field_id`, `activity`, `activity_date`, `icon`, `deleted`) VALUES (1, 1, 'Clients', 1, 'Added a new company ghg', '2015-02-19 09:32:49', 'fa-user', 0);
INSERT INTO fx_activities (`activity_id`, `user`, `module`, `module_field_id`, `activity`, `activity_date`, `icon`, `deleted`) VALUES (2, 1, 'Users', 1, 'Updated System User : ', '2015-04-15 14:01:47', 'fa-edit', 0);


#
# TABLE STRUCTURE FOR: fx_alephpa
#

DROP TABLE IF EXISTS fx_alephpa;

CREATE TABLE `fx_alephpa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO fx_alephpa (`id`, `type`, `saved_by`) VALUES (1, 'ب', 1);
INSERT INTO fx_alephpa (`id`, `type`, `saved_by`) VALUES (2, 'L', 1);
INSERT INTO fx_alephpa (`id`, `type`, `saved_by`) VALUES (3, 'M', 1);


#
# TABLE STRUCTURE FOR: fx_assign_projects
#

DROP TABLE IF EXISTS fx_assign_projects;

CREATE TABLE `fx_assign_projects` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `assigned_user` int(11) NOT NULL,
  `project_assigned` int(11) NOT NULL,
  `assign_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fx_assign_tasks
#

DROP TABLE IF EXISTS fx_assign_tasks;

CREATE TABLE `fx_assign_tasks` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `assigned_user` int(11) NOT NULL,
  `project_assigned` int(11) NOT NULL,
  `task_assigned` int(11) NOT NULL,
  `assign_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fx_blog
#

DROP TABLE IF EXISTS fx_blog;

CREATE TABLE `fx_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `title_sub` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `des` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `date_a` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `nev` varchar(120) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `viwe` int(11) NOT NULL,
  `rating` float NOT NULL,
  `total_rating` float NOT NULL,
  `total_rates` int(11) NOT NULL,
  `ip_address` longtext CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `url` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `saved_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=137 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO fx_blog (`id`, `title`, `title_sub`, `des`, `date_a`, `nev`, `image`, `viwe`, `rating`, `total_rating`, `total_rates`, `ip_address`, `url`, `saved_by`) VALUES (136, 'موضوع', '26', '<p>توضیخات</p>', 'سه شنبه,۲۶ اسفند ۱۳۹۳', 'nev', 'http://localhost../file/91275.jpg', 0, '0', '0', 0, '', 'addreess', 1);
INSERT INTO fx_blog (`id`, `title`, `title_sub`, `des`, `date_a`, `nev`, `image`, `viwe`, `rating`, `total_rating`, `total_rates`, `ip_address`, `url`, `saved_by`) VALUES (135, 'سفارشی کردن گوگل مپ', '26', '<p style=\"text-align: justify;\"><span style=\"font-size: 14pt;\">یک سرویس جالب گوگل این است که شما می توانید بر روی نقشه های گوگل تنظیمات سفارشی(رنگ تم) انجام دهید و آن را در وبسایت و یا نرم افزار خود بکار گیرید.در این پست با چند خط ساده تم مربوط به نقشه گوگل مپ را تغییر خواهیم داد.</span></p>', 'سه شنبه,۲۶ اسفند ۱۳۹۳', 'nevisandeh', 'http://localhost../file/93466.jpg', 0, '0', '0', 0, '', 'addreess', 1);


#
# TABLE STRUCTURE FOR: fx_bug_comments
#

DROP TABLE IF EXISTS fx_bug_comments;

CREATE TABLE `fx_bug_comments` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `bug_id` int(11) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `comment` text CHARACTER SET latin1 NOT NULL,
  `date_commented` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fx_bug_files
#

DROP TABLE IF EXISTS fx_bug_files;

CREATE TABLE `fx_bug_files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `bug` int(11) NOT NULL,
  `file_name` text CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fx_bugs
#

DROP TABLE IF EXISTS fx_bugs;

CREATE TABLE `fx_bugs` (
  `bug_id` int(11) NOT NULL AUTO_INCREMENT,
  `issue_ref` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `reporter` int(11) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `bug_status` enum('Unconfirmed','Confirmed','In Progress','Resolved','Verified') CHARACTER SET latin1 NOT NULL DEFAULT 'Unconfirmed',
  `priority` varchar(100) CHARACTER SET latin1 NOT NULL,
  `bug_description` text CHARACTER SET latin1 NOT NULL,
  `reported_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` varchar(64) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`bug_id`),
  UNIQUE KEY `issue_ref` (`issue_ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fx_captcha
#

DROP TABLE IF EXISTS fx_captcha;

CREATE TABLE `fx_captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `word` varchar(20) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8;

INSERT INTO fx_captcha (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES (116, 1429159508, '127.0.0.1', 'GELp8vjk');
INSERT INTO fx_captcha (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES (117, 1429159981, '127.0.0.1', 'k1Ik4SbW');
INSERT INTO fx_captcha (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES (118, 1429160063, '127.0.0.1', 'p0AhPp7o');


#
# TABLE STRUCTURE FOR: fx_city
#

DROP TABLE IF EXISTS fx_city;

CREATE TABLE `fx_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `saved_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO fx_city (`id`, `city`, `saved_by`) VALUES (1, 'یزد', 1);


#
# TABLE STRUCTURE FOR: fx_comment_replies
#

DROP TABLE IF EXISTS fx_comment_replies;

CREATE TABLE `fx_comment_replies` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_comment` int(11) NOT NULL,
  `reply_msg` text CHARACTER SET latin1 NOT NULL,
  `replied_by` int(11) NOT NULL,
  `del` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fx_comments
#

DROP TABLE IF EXISTS fx_comments;

CREATE TABLE `fx_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `message` text CHARACTER SET latin1 NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fx_companies
#

DROP TABLE IF EXISTS fx_companies;

CREATE TABLE `fx_companies` (
  `co_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO fx_companies (`co_id`, `company_ref`, `company_name`, `primary_contact`, `company_email`, `company_website`, `company_phone`, `company_address`, `city`, `country`, `VAT`, `date_added`) VALUES (1, 9713767, 'ghg', '-', 'h@fd.ch', '', '44', 'fgfg', '', 'South Africa', '', '2015-02-19 09:32:49');


#
# TABLE STRUCTURE FOR: fx_config
#

DROP TABLE IF EXISTS fx_config;

CREATE TABLE `fx_config` (
  `config_key` varchar(255) CHARACTER SET latin1 NOT NULL,
  `value` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`config_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO fx_config (`config_key`, `value`) VALUES ('allowed_files', 'gif|jpg|png|pdf|doc|txt|docx|xls|zip|rar');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('base_url', 'http://localhost/FreelancerOffice-v1.5.6/');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('company_address', '4146 Golden Hickory Wodddods');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('company_city', 'یزد');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('company_country', 'South Africa');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('company_domain', '?seURL%');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('company_email', 'uniqueweb.ir@gmail.com');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('company_logo', 'logo.png');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('company_name', 'اطلاعات دارویی پادرا');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('company_phone', '333');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('contact_person', 'John Doe');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('cron_key', '34WI2L12L87I1A65M90M9A42N41D08A26I');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('decimal_separator', ',');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('default_currency', 'USD');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('default_currency_symbol', '$');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('default_tax', '0');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('default_terms', 'Thank you for your business. Please process this invoice within the due date.');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('demo_mode', 'FALSE');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('developer', 'ig63Yd/+yuA8127gEyTz9TY4pnoeKq8dtocVP44+BJvtlRp8Vqcetwjk51dhSB6Rx8aVIKOPfUmNyKGWK7C/gg==');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('email_estimate_message', 'Hi {CLIENT}<br>\r\nThanks for your business inquiry. <br>\r\n\r\nThe estimate EST {REF} is attached with this email. <br>\r\nEstimate Overview:<br>\r\nEstimate # : EST {REF}<br>\r\nAmount: {CURRENCY} {AMOUNT}<br>\r\n \r\nYou can view the estimate online at:<br>\r\n{LINK}<br>\r\n\r\nBest Regards,<br>\r\n{COMPANY}');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('email_invoice_message', 'Hello {CLIENT}<br>\r\nHere is the invoice of {CURRENCY} {AMOUNT}<br>\r\nYou can view the invoice online at:<br>\r\n\r\n{LINK}<br>\r\n\r\n\r\nBest Regards,<br>\r\n\r\n{COMPANY}');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('file_max_size', '9000');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('invoice_logo', 'invoice_logo.png');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('language', 'czech');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('paypal_cancel_url', 'paypal/cancel');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('paypal_email', '%CompanyEmail%');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('paypal_ipn_url', 'paypal/t_ipn/ipn');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('paypal_live', 'TRUE');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('paypal_success_url', 'paypal/success');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('protocol', 'mail');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('reminder_message', 'Hello {CLIENT}<br>\r\nThis is a friendly reminder to pay your invoice of {CURRENCY} {AMOUNT}<br>\r\n\r\nYou can view the invoice online at:<br>\r\n\r\n{LINK}<br>\r\n\r\n\r\nBest Regards,<br>\r\n\r\n{COMPANY}');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('reset_key', '34WI2L12L87I1A65M90M9A42N41D08A26I');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('sidebar_theme', 'black');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('site_author', 'William M.');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('site_desc', 'Freelancer Office is a Web based PHP application for Freelancers - buy it on Codecanyon');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('smtp_host', '');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('smtp_pass', 'yHMhW2M211+RnGhRORE40R7RA1neupFwE1ybIfX7s3WYtir/CBeUXOeeaGFiPYK6GByCA0ynePV9ubMKv2k0GQ==');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('smtp_port', '25');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('smtp_user', '');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('thousand_separator', '.');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('use_postmark', 'FALSE');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('webmaster_email', '%CompanyEmail%');
INSERT INTO fx_config (`config_key`, `value`) VALUES ('website_name', 'Freelancer Office');


#
# TABLE STRUCTURE FOR: fx_contacts
#

DROP TABLE IF EXISTS fx_contacts;

CREATE TABLE `fx_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `phone` varchar(14) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `date` varchar(16) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO fx_contacts (`id`, `name`, `phone`, `email`, `description`, `date`) VALUES (1, 'علی قربانی', '09135389662', 'unique@web.ir', 'ورزشگاه غدیر اهواز', '1393/01/02');
INSERT INTO fx_contacts (`id`, `name`, `phone`, `email`, `description`, `date`) VALUES (2, 'ییی', 'sd', 'sd', 'sd', '1393/01/02');


#
# TABLE STRUCTURE FOR: fx_countries
#

DROP TABLE IF EXISTS fx_countries;

CREATE TABLE `fx_countries` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `value` varchar(250) CHARACTER SET latin1 NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=243 DEFAULT CHARSET=utf8;

INSERT INTO fx_countries (`id`, `value`) VALUES (1, 'Afghanistan');
INSERT INTO fx_countries (`id`, `value`) VALUES (2, 'Aringland Islands');
INSERT INTO fx_countries (`id`, `value`) VALUES (3, '??');
INSERT INTO fx_countries (`id`, `value`) VALUES (4, 'Algeria');
INSERT INTO fx_countries (`id`, `value`) VALUES (5, 'American Samoa');
INSERT INTO fx_countries (`id`, `value`) VALUES (6, 'Andorra');
INSERT INTO fx_countries (`id`, `value`) VALUES (7, 'Angola');
INSERT INTO fx_countries (`id`, `value`) VALUES (8, 'Anguilla');
INSERT INTO fx_countries (`id`, `value`) VALUES (9, 'Antarctica');
INSERT INTO fx_countries (`id`, `value`) VALUES (10, 'Antigua and Barbuda');
INSERT INTO fx_countries (`id`, `value`) VALUES (11, 'Argentina');
INSERT INTO fx_countries (`id`, `value`) VALUES (12, 'Armenia');
INSERT INTO fx_countries (`id`, `value`) VALUES (13, 'Aruba');
INSERT INTO fx_countries (`id`, `value`) VALUES (14, 'Australia');
INSERT INTO fx_countries (`id`, `value`) VALUES (15, 'Austria');
INSERT INTO fx_countries (`id`, `value`) VALUES (16, 'Azerbaijan');
INSERT INTO fx_countries (`id`, `value`) VALUES (17, 'Bahamas');
INSERT INTO fx_countries (`id`, `value`) VALUES (18, 'Bahrain');
INSERT INTO fx_countries (`id`, `value`) VALUES (19, 'Bangladesh');
INSERT INTO fx_countries (`id`, `value`) VALUES (20, 'Barbados');
INSERT INTO fx_countries (`id`, `value`) VALUES (21, 'Belarus');
INSERT INTO fx_countries (`id`, `value`) VALUES (22, 'Belgium');
INSERT INTO fx_countries (`id`, `value`) VALUES (23, 'Belize');
INSERT INTO fx_countries (`id`, `value`) VALUES (24, 'Benin');
INSERT INTO fx_countries (`id`, `value`) VALUES (25, 'Bermuda');
INSERT INTO fx_countries (`id`, `value`) VALUES (26, 'Bhutan');
INSERT INTO fx_countries (`id`, `value`) VALUES (27, 'Bolivia');
INSERT INTO fx_countries (`id`, `value`) VALUES (28, 'Bosnia and Herzegovina');
INSERT INTO fx_countries (`id`, `value`) VALUES (29, 'Botswana');
INSERT INTO fx_countries (`id`, `value`) VALUES (30, 'Bouvet Island');
INSERT INTO fx_countries (`id`, `value`) VALUES (31, 'Brazil');
INSERT INTO fx_countries (`id`, `value`) VALUES (32, 'British Indian Ocean territory');
INSERT INTO fx_countries (`id`, `value`) VALUES (33, 'Brunei Darussalam');
INSERT INTO fx_countries (`id`, `value`) VALUES (34, 'Bulgaria');
INSERT INTO fx_countries (`id`, `value`) VALUES (35, 'Burkina Faso');
INSERT INTO fx_countries (`id`, `value`) VALUES (36, 'Burundi');
INSERT INTO fx_countries (`id`, `value`) VALUES (37, 'Cambodia');
INSERT INTO fx_countries (`id`, `value`) VALUES (38, 'Cameroon');
INSERT INTO fx_countries (`id`, `value`) VALUES (39, 'Canada');
INSERT INTO fx_countries (`id`, `value`) VALUES (40, 'Cape Verde');
INSERT INTO fx_countries (`id`, `value`) VALUES (41, 'Cayman Islands');
INSERT INTO fx_countries (`id`, `value`) VALUES (42, 'Central African Republic');
INSERT INTO fx_countries (`id`, `value`) VALUES (43, 'Chad');
INSERT INTO fx_countries (`id`, `value`) VALUES (44, 'Chile');
INSERT INTO fx_countries (`id`, `value`) VALUES (45, 'China');
INSERT INTO fx_countries (`id`, `value`) VALUES (46, 'Christmas Island');
INSERT INTO fx_countries (`id`, `value`) VALUES (47, 'Cocos (Keeling) Islands');
INSERT INTO fx_countries (`id`, `value`) VALUES (48, 'Colombia');
INSERT INTO fx_countries (`id`, `value`) VALUES (49, 'Comoros');
INSERT INTO fx_countries (`id`, `value`) VALUES (50, 'Congo');
INSERT INTO fx_countries (`id`, `value`) VALUES (51, 'Congo');
INSERT INTO fx_countries (`id`, `value`) VALUES (52, ' Democratic Republic');
INSERT INTO fx_countries (`id`, `value`) VALUES (53, 'Cook Islands');
INSERT INTO fx_countries (`id`, `value`) VALUES (54, 'Costa Rica');
INSERT INTO fx_countries (`id`, `value`) VALUES (55, 'Ivory Coast (Ivory Coast)');
INSERT INTO fx_countries (`id`, `value`) VALUES (56, 'Croatia (Hrvatska)');
INSERT INTO fx_countries (`id`, `value`) VALUES (57, 'Cuba');
INSERT INTO fx_countries (`id`, `value`) VALUES (58, 'Cyprus');
INSERT INTO fx_countries (`id`, `value`) VALUES (59, 'Czech Republic');
INSERT INTO fx_countries (`id`, `value`) VALUES (60, 'Denmark');
INSERT INTO fx_countries (`id`, `value`) VALUES (61, 'Djibouti');
INSERT INTO fx_countries (`id`, `value`) VALUES (62, 'Dominica');
INSERT INTO fx_countries (`id`, `value`) VALUES (63, 'Dominican Republic');
INSERT INTO fx_countries (`id`, `value`) VALUES (64, 'East Timor');
INSERT INTO fx_countries (`id`, `value`) VALUES (65, 'Ecuador');
INSERT INTO fx_countries (`id`, `value`) VALUES (66, 'Egypt');
INSERT INTO fx_countries (`id`, `value`) VALUES (67, 'El Salvador');
INSERT INTO fx_countries (`id`, `value`) VALUES (68, 'Equatorial Guinea');
INSERT INTO fx_countries (`id`, `value`) VALUES (69, 'Eritrea');
INSERT INTO fx_countries (`id`, `value`) VALUES (70, 'Estonia');
INSERT INTO fx_countries (`id`, `value`) VALUES (71, 'Ethiopia');
INSERT INTO fx_countries (`id`, `value`) VALUES (72, 'Falkland Islands');
INSERT INTO fx_countries (`id`, `value`) VALUES (73, 'Faroe Islands');
INSERT INTO fx_countries (`id`, `value`) VALUES (74, 'Fiji');
INSERT INTO fx_countries (`id`, `value`) VALUES (75, 'Finland');
INSERT INTO fx_countries (`id`, `value`) VALUES (76, 'France');
INSERT INTO fx_countries (`id`, `value`) VALUES (77, 'French Guiana');
INSERT INTO fx_countries (`id`, `value`) VALUES (78, 'French Polynesia');
INSERT INTO fx_countries (`id`, `value`) VALUES (79, 'French Southern Territories');
INSERT INTO fx_countries (`id`, `value`) VALUES (80, 'Gabon');
INSERT INTO fx_countries (`id`, `value`) VALUES (81, 'Gambia');
INSERT INTO fx_countries (`id`, `value`) VALUES (82, 'Georgia');
INSERT INTO fx_countries (`id`, `value`) VALUES (83, 'Germany');
INSERT INTO fx_countries (`id`, `value`) VALUES (84, 'Ghana');
INSERT INTO fx_countries (`id`, `value`) VALUES (85, 'Gibraltar');
INSERT INTO fx_countries (`id`, `value`) VALUES (86, 'Greece');
INSERT INTO fx_countries (`id`, `value`) VALUES (87, 'Greenland');
INSERT INTO fx_countries (`id`, `value`) VALUES (88, 'Grenada');
INSERT INTO fx_countries (`id`, `value`) VALUES (89, 'Guadeloupe');
INSERT INTO fx_countries (`id`, `value`) VALUES (90, 'Guam');
INSERT INTO fx_countries (`id`, `value`) VALUES (91, 'Guatemala');
INSERT INTO fx_countries (`id`, `value`) VALUES (92, 'Guinea');
INSERT INTO fx_countries (`id`, `value`) VALUES (93, 'Guinea-Bissau');
INSERT INTO fx_countries (`id`, `value`) VALUES (94, 'Guyana');
INSERT INTO fx_countries (`id`, `value`) VALUES (95, 'Haiti');
INSERT INTO fx_countries (`id`, `value`) VALUES (96, 'Heard and McDonald Islands');
INSERT INTO fx_countries (`id`, `value`) VALUES (97, 'Honduras');
INSERT INTO fx_countries (`id`, `value`) VALUES (98, 'Hong Kong');
INSERT INTO fx_countries (`id`, `value`) VALUES (99, 'Hungary');
INSERT INTO fx_countries (`id`, `value`) VALUES (100, 'Iceland');
INSERT INTO fx_countries (`id`, `value`) VALUES (101, 'India');
INSERT INTO fx_countries (`id`, `value`) VALUES (102, 'Indonesia');
INSERT INTO fx_countries (`id`, `value`) VALUES (103, 'Iran');
INSERT INTO fx_countries (`id`, `value`) VALUES (104, 'Iraq');
INSERT INTO fx_countries (`id`, `value`) VALUES (105, 'Ireland');
INSERT INTO fx_countries (`id`, `value`) VALUES (106, 'Israel');
INSERT INTO fx_countries (`id`, `value`) VALUES (107, 'Italy');
INSERT INTO fx_countries (`id`, `value`) VALUES (108, 'Jamaica');
INSERT INTO fx_countries (`id`, `value`) VALUES (109, 'Japan');
INSERT INTO fx_countries (`id`, `value`) VALUES (110, 'Jordan');
INSERT INTO fx_countries (`id`, `value`) VALUES (111, 'Kazakhstan');
INSERT INTO fx_countries (`id`, `value`) VALUES (112, 'Kenya');
INSERT INTO fx_countries (`id`, `value`) VALUES (113, 'Kiribati');
INSERT INTO fx_countries (`id`, `value`) VALUES (114, 'Korea (north)');
INSERT INTO fx_countries (`id`, `value`) VALUES (115, 'Korea (south)');
INSERT INTO fx_countries (`id`, `value`) VALUES (116, 'Kuwait');
INSERT INTO fx_countries (`id`, `value`) VALUES (117, 'Kyrgyzstan');
INSERT INTO fx_countries (`id`, `value`) VALUES (118, 'Lao People\'s Democratic Republic');
INSERT INTO fx_countries (`id`, `value`) VALUES (119, 'Latvia');
INSERT INTO fx_countries (`id`, `value`) VALUES (120, 'Lebanon');
INSERT INTO fx_countries (`id`, `value`) VALUES (121, 'Lesotho');
INSERT INTO fx_countries (`id`, `value`) VALUES (122, 'Liberia');
INSERT INTO fx_countries (`id`, `value`) VALUES (123, 'Libyan Arab Jamahiriya');
INSERT INTO fx_countries (`id`, `value`) VALUES (124, 'Liechtenstein');
INSERT INTO fx_countries (`id`, `value`) VALUES (125, 'Lithuania');
INSERT INTO fx_countries (`id`, `value`) VALUES (126, 'Luxembourg');
INSERT INTO fx_countries (`id`, `value`) VALUES (127, 'Macao');
INSERT INTO fx_countries (`id`, `value`) VALUES (128, 'Macedonia');
INSERT INTO fx_countries (`id`, `value`) VALUES (129, 'Madagascar');
INSERT INTO fx_countries (`id`, `value`) VALUES (130, 'Malawi');
INSERT INTO fx_countries (`id`, `value`) VALUES (131, 'Malaysia');
INSERT INTO fx_countries (`id`, `value`) VALUES (132, 'Maldives');
INSERT INTO fx_countries (`id`, `value`) VALUES (133, 'Mali');
INSERT INTO fx_countries (`id`, `value`) VALUES (134, 'Malta');
INSERT INTO fx_countries (`id`, `value`) VALUES (135, 'Marshall Islands');
INSERT INTO fx_countries (`id`, `value`) VALUES (136, 'Martinique');
INSERT INTO fx_countries (`id`, `value`) VALUES (137, 'Mauritania');
INSERT INTO fx_countries (`id`, `value`) VALUES (138, 'Mauritius');
INSERT INTO fx_countries (`id`, `value`) VALUES (139, 'Mayotte');
INSERT INTO fx_countries (`id`, `value`) VALUES (140, 'Mexico');
INSERT INTO fx_countries (`id`, `value`) VALUES (141, 'Micronesia');
INSERT INTO fx_countries (`id`, `value`) VALUES (142, 'Moldova');
INSERT INTO fx_countries (`id`, `value`) VALUES (143, 'Monaco');
INSERT INTO fx_countries (`id`, `value`) VALUES (144, 'Mongolia');
INSERT INTO fx_countries (`id`, `value`) VALUES (145, 'Montserrat');
INSERT INTO fx_countries (`id`, `value`) VALUES (146, 'Morocco');
INSERT INTO fx_countries (`id`, `value`) VALUES (147, 'Mozambique');
INSERT INTO fx_countries (`id`, `value`) VALUES (148, 'Myanmar');
INSERT INTO fx_countries (`id`, `value`) VALUES (149, 'Namibia');
INSERT INTO fx_countries (`id`, `value`) VALUES (150, 'Nauru');
INSERT INTO fx_countries (`id`, `value`) VALUES (151, 'Nepal');
INSERT INTO fx_countries (`id`, `value`) VALUES (152, 'Netherlands');
INSERT INTO fx_countries (`id`, `value`) VALUES (153, 'Netherlands Antilles');
INSERT INTO fx_countries (`id`, `value`) VALUES (154, 'New Caledonia');
INSERT INTO fx_countries (`id`, `value`) VALUES (155, 'New Zealand');
INSERT INTO fx_countries (`id`, `value`) VALUES (156, 'Nicaragua');
INSERT INTO fx_countries (`id`, `value`) VALUES (157, 'Niger');
INSERT INTO fx_countries (`id`, `value`) VALUES (158, 'Nigeria');
INSERT INTO fx_countries (`id`, `value`) VALUES (159, 'Niue');
INSERT INTO fx_countries (`id`, `value`) VALUES (160, 'Norfolk Island');
INSERT INTO fx_countries (`id`, `value`) VALUES (161, 'Northern Mariana Islands');
INSERT INTO fx_countries (`id`, `value`) VALUES (162, 'Norway');
INSERT INTO fx_countries (`id`, `value`) VALUES (163, 'Oman');
INSERT INTO fx_countries (`id`, `value`) VALUES (164, 'Pakistan');
INSERT INTO fx_countries (`id`, `value`) VALUES (165, 'Palau');
INSERT INTO fx_countries (`id`, `value`) VALUES (166, 'Palestinian Territories');
INSERT INTO fx_countries (`id`, `value`) VALUES (167, 'Panama');
INSERT INTO fx_countries (`id`, `value`) VALUES (168, 'Papua New Guinea');
INSERT INTO fx_countries (`id`, `value`) VALUES (169, 'Paraguay');
INSERT INTO fx_countries (`id`, `value`) VALUES (170, 'Peru');
INSERT INTO fx_countries (`id`, `value`) VALUES (171, 'Philippines');
INSERT INTO fx_countries (`id`, `value`) VALUES (172, 'Pitcairn');
INSERT INTO fx_countries (`id`, `value`) VALUES (173, 'Poland');
INSERT INTO fx_countries (`id`, `value`) VALUES (174, 'Portugal');
INSERT INTO fx_countries (`id`, `value`) VALUES (175, 'Puerto Rico');
INSERT INTO fx_countries (`id`, `value`) VALUES (176, 'Qatar');
INSERT INTO fx_countries (`id`, `value`) VALUES (177, 'Runion');
INSERT INTO fx_countries (`id`, `value`) VALUES (178, 'Romania');
INSERT INTO fx_countries (`id`, `value`) VALUES (179, 'Russian Federation');
INSERT INTO fx_countries (`id`, `value`) VALUES (180, 'Rwanda');
INSERT INTO fx_countries (`id`, `value`) VALUES (181, 'Saint Helena');
INSERT INTO fx_countries (`id`, `value`) VALUES (182, 'Saint Kitts and Nevis');
INSERT INTO fx_countries (`id`, `value`) VALUES (183, 'Saint Lucia');
INSERT INTO fx_countries (`id`, `value`) VALUES (184, 'Saint Pierre and Miquelon');
INSERT INTO fx_countries (`id`, `value`) VALUES (185, 'Saint Vincent and the Grenadines');
INSERT INTO fx_countries (`id`, `value`) VALUES (186, 'Samoa');
INSERT INTO fx_countries (`id`, `value`) VALUES (187, 'San Marino');
INSERT INTO fx_countries (`id`, `value`) VALUES (188, 'Sao Tome and Principe');
INSERT INTO fx_countries (`id`, `value`) VALUES (189, 'Saudi Arabia');
INSERT INTO fx_countries (`id`, `value`) VALUES (190, 'Senegal');
INSERT INTO fx_countries (`id`, `value`) VALUES (191, 'Serbia and Montenegro');
INSERT INTO fx_countries (`id`, `value`) VALUES (192, 'Seychelles');
INSERT INTO fx_countries (`id`, `value`) VALUES (193, 'Sierra Leone');
INSERT INTO fx_countries (`id`, `value`) VALUES (194, 'Singapore');
INSERT INTO fx_countries (`id`, `value`) VALUES (195, 'Slovakia');
INSERT INTO fx_countries (`id`, `value`) VALUES (196, 'Slovenia');
INSERT INTO fx_countries (`id`, `value`) VALUES (197, 'Solomon Islands');
INSERT INTO fx_countries (`id`, `value`) VALUES (198, 'Somalia');
INSERT INTO fx_countries (`id`, `value`) VALUES (199, 'South Africa');
INSERT INTO fx_countries (`id`, `value`) VALUES (200, 'South Georgia and the South Sandwich Islands');
INSERT INTO fx_countries (`id`, `value`) VALUES (201, 'Spain');
INSERT INTO fx_countries (`id`, `value`) VALUES (202, 'Sri Lanka');
INSERT INTO fx_countries (`id`, `value`) VALUES (203, 'Sudan');
INSERT INTO fx_countries (`id`, `value`) VALUES (204, 'Suriname');
INSERT INTO fx_countries (`id`, `value`) VALUES (205, 'Svalbard and Jan Mayen Islands');
INSERT INTO fx_countries (`id`, `value`) VALUES (206, 'Swaziland');
INSERT INTO fx_countries (`id`, `value`) VALUES (207, 'Sweden');
INSERT INTO fx_countries (`id`, `value`) VALUES (208, 'Switzerland');
INSERT INTO fx_countries (`id`, `value`) VALUES (209, 'Syria');
INSERT INTO fx_countries (`id`, `value`) VALUES (210, 'Taiwan');
INSERT INTO fx_countries (`id`, `value`) VALUES (211, 'Tajikistan');
INSERT INTO fx_countries (`id`, `value`) VALUES (212, 'Tanzania');
INSERT INTO fx_countries (`id`, `value`) VALUES (213, 'Thailand');
INSERT INTO fx_countries (`id`, `value`) VALUES (214, 'Togo');
INSERT INTO fx_countries (`id`, `value`) VALUES (215, 'Tokelau');
INSERT INTO fx_countries (`id`, `value`) VALUES (216, 'Tonga');
INSERT INTO fx_countries (`id`, `value`) VALUES (217, 'Trinidad and Tobago');
INSERT INTO fx_countries (`id`, `value`) VALUES (218, 'Tunisia');
INSERT INTO fx_countries (`id`, `value`) VALUES (219, 'Turkey');
INSERT INTO fx_countries (`id`, `value`) VALUES (220, 'Turkmenistan');
INSERT INTO fx_countries (`id`, `value`) VALUES (221, 'Turks and Caicos Islands');
INSERT INTO fx_countries (`id`, `value`) VALUES (222, 'Tuvalu');
INSERT INTO fx_countries (`id`, `value`) VALUES (223, 'Uganda');
INSERT INTO fx_countries (`id`, `value`) VALUES (224, 'Ukraine');
INSERT INTO fx_countries (`id`, `value`) VALUES (225, 'United Arab Emirates');
INSERT INTO fx_countries (`id`, `value`) VALUES (226, 'United Kingdom');
INSERT INTO fx_countries (`id`, `value`) VALUES (227, 'United States of America');
INSERT INTO fx_countries (`id`, `value`) VALUES (228, 'Uruguay');
INSERT INTO fx_countries (`id`, `value`) VALUES (229, 'Uzbekistan');
INSERT INTO fx_countries (`id`, `value`) VALUES (230, 'Vanuatu');
INSERT INTO fx_countries (`id`, `value`) VALUES (231, 'Vatican City');
INSERT INTO fx_countries (`id`, `value`) VALUES (232, 'Venezuela');
INSERT INTO fx_countries (`id`, `value`) VALUES (233, 'Vietnam');
INSERT INTO fx_countries (`id`, `value`) VALUES (234, 'Virgin Islands (British)');
INSERT INTO fx_countries (`id`, `value`) VALUES (235, 'Virgin Islands (US)');
INSERT INTO fx_countries (`id`, `value`) VALUES (236, 'Wallis and Futuna Islands');
INSERT INTO fx_countries (`id`, `value`) VALUES (237, 'Western Sahara');
INSERT INTO fx_countries (`id`, `value`) VALUES (238, 'Yemen');
INSERT INTO fx_countries (`id`, `value`) VALUES (239, 'Zaire');
INSERT INTO fx_countries (`id`, `value`) VALUES (240, 'Zambia');
INSERT INTO fx_countries (`id`, `value`) VALUES (241, 'Zimbabwe');


#
# TABLE STRUCTURE FOR: fx_drug
#

DROP TABLE IF EXISTS fx_drug;

CREATE TABLE `fx_drug` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `face` int(11) NOT NULL,
  `alephpa` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  `url` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO fx_drug (`id`, `name`, `description`, `face`, `alephpa`, `group`, `url`, `saved_by`) VALUES (2, 'سیتالوپرام', '<p>ddd</p>', 4, 2, 1, 'hjjhjh', 1);


#
# TABLE STRUCTURE FOR: fx_email_templates
#

DROP TABLE IF EXISTS fx_email_templates;

CREATE TABLE `fx_email_templates` (
  `template_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_group` text NOT NULL,
  `template_body` text NOT NULL,
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

INSERT INTO fx_email_templates (`template_id`, `email_group`, `template_body`) VALUES (25, 'project_updated', '<div style=\"background-color:#E8E8E8; margin:0px; padding:55px 20px 40px 20px; font-family:Open Sans, Helvetica, sans-serif; font-size:12px; color:#535353;\"><div style=\"text-align:center; font-size:24px; font-weight:bold; color:#535353;\">Project updated</div><div style=\"border-radius: 5px 5px 5px 5px; padding:20px; margin-top:45px; background-color:#FFFFFF; font-family:Open Sans, Helvetica, sans-serif; font-size:13px;\"><p>Hi there,</p><p>{PROJECT_TITLE} ) has been updated by {ASSIGNED_BY}.</p><p>You can view this project by logging in to the portal using the link below.</p>-----------------------------------<br><big><b><a href=\"{PROJECT_URL}\">View Project</a></b></big><br><br>Regards<br>The {SITE_NAME} Team</div></div>');
INSERT INTO fx_email_templates (`template_id`, `email_group`, `template_body`) VALUES (26, 'task_updated', '<div style=\"background-color:#E8E8E8; margin:0px; padding:55px 20px 40px 20px; font-family:Open Sans, Helvetica, sans-serif; font-size:12px; color:#535353;\"><div style=\"text-align:center; font-size:24px; font-weight:bold; color:#535353;\">Task updated</div><div style=\"border-radius: 5px 5px 5px 5px; padding:20px; margin-top:45px; background-color:#FFFFFF; font-family:Open Sans, Helvetica, sans-serif; font-size:13px;\"><p>Hi there,</p><p>{TASK_NAME} in {PROJECT_TITLE} has been updated by {ASSIGNED_BY}.</p><p>You can view this project by logging in to the portal using the link below.</p>-----------------------------------<br><big><b><a href=\"{PROJECT_URL}\">View Project</a></b></big><br><br>Regards<br>The {SITE_NAME} Team</div></div>');


#
# TABLE STRUCTURE FOR: fx_estimate_items
#

DROP TABLE IF EXISTS fx_estimate_items;

CREATE TABLE `fx_estimate_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `estimate_id` int(11) NOT NULL,
  `item_desc` varchar(200) CHARACTER SET latin1 NOT NULL,
  `unit_cost` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_cost` float NOT NULL,
  `date_saved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fx_estimates
#

DROP TABLE IF EXISTS fx_estimates;

CREATE TABLE `fx_estimates` (
  `est_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `invoiced` enum('Yes','No') CHARACTER SET latin1 DEFAULT 'No',
  PRIMARY KEY (`est_id`),
  UNIQUE KEY `reference_no` (`reference_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fx_events
#

DROP TABLE IF EXISTS fx_events;

CREATE TABLE `fx_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `start_date` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `end_date` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `time_start` varchar(13) COLLATE utf8_persian_ci NOT NULL,
  `time_end` varchar(13) COLLATE utf8_persian_ci NOT NULL,
  `color` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `saved_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO fx_events (`id`, `title`, `description`, `start_date`, `end_date`, `time_start`, `time_end`, `color`, `saved_by`) VALUES (7, 'افجه‌ای از هیات مدیره استقلال برکنار شد', 'بعد از هديه جنجالي آقاي سخنگو به استقلالي ها که با اعتراض هاي بازيکنان همراه بود او از هيات مديره استقلال کنار گذاشته شد.', '2015-03-08', '2015-03-09', '02:30', '02:30', '#1bbc9b', 1);


#
# TABLE STRUCTURE FOR: fx_face
#

DROP TABLE IF EXISTS fx_face;

CREATE TABLE `fx_face` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO fx_face (`id`, `type`, `saved_by`) VALUES (1, 'شربت', 1);
INSERT INTO fx_face (`id`, `type`, `saved_by`) VALUES (4, 'قرص', 1);


#
# TABLE STRUCTURE FOR: fx_files
#

DROP TABLE IF EXISTS fx_files;

CREATE TABLE `fx_files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) NOT NULL,
  `file_name` text CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fx_group
#

DROP TABLE IF EXISTS fx_group;

CREATE TABLE `fx_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO fx_group (`id`, `type`, `saved_by`) VALUES (1, 'شیمی درمانی', 1);
INSERT INTO fx_group (`id`, `type`, `saved_by`) VALUES (2, 'آنتی بیوتیک', 1);


#
# TABLE STRUCTURE FOR: fx_hospital
#

DROP TABLE IF EXISTS fx_hospital;

CREATE TABLE `fx_hospital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `city` int(11) NOT NULL,
  `description` longtext COLLATE utf8_persian_ci NOT NULL,
  `url` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` int(11) NOT NULL,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO fx_hospital (`id`, `name`, `city`, `description`, `url`, `saved_by`, `image`) VALUES (1, 'شهید رهنمون', 1, '<p>ییددددددددتاا</p>', 'ddd', 1, 'http://localhost/file/91275.jpg');
INSERT INTO fx_hospital (`id`, `name`, `city`, `description`, `url`, `saved_by`, `image`) VALUES (2, 'ddd', 1, '<p>ffff</p>', 'dddd', 1, 'http://localhost/file/93466.jpg');


#
# TABLE STRUCTURE FOR: fx_introduction
#

DROP TABLE IF EXISTS fx_introduction;

CREATE TABLE `fx_introduction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext COLLATE utf8_persian_ci NOT NULL,
  `saved_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO fx_introduction (`id`, `description`, `saved_by`) VALUES (6, '<p style=\"text-align: justify;\"><span style=\"font-size: 14pt; font-family: BYekan, Arial, Helvetica, sans-serif;\">در این چند سال گذشته ظرفیت هارد دیسک ها به شدت افزایش پیدا کرده است ، امروزه ما در خانه خود هارد دیسک هایی را استفاده می کنیم که ظرفیت های ۲ ترابایت ، ۳ ترابایت حتی ۴ ترابایت را دارند. طبیعی llکه طی مدت زمان کمی شاهد عرضه هارد دیسک هایی با ظرفیت های بیشتر از ۵ ترابایت برای مصارف خانگی خواهیم بود. خوب تا اینجای کار هیچ مشکلی نیست ، هیچکس از وجود ظرفیت اضافه روی هارد دیسک مشکلی احساس نمی کند ، اما چه نکته مهمی در خصوص استفاده از این هارد دیسک های ظرفیت بالا وجود دارد ؟</span></p>', 1);


#
# TABLE STRUCTURE FOR: fx_invoices
#

DROP TABLE IF EXISTS fx_invoices;

CREATE TABLE `fx_invoices` (
  `inv_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `emailed` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  PRIMARY KEY (`inv_id`),
  UNIQUE KEY `reference_no` (`reference_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fx_ipn_log
#

DROP TABLE IF EXISTS fx_ipn_log;

CREATE TABLE `fx_ipn_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listener_name` varchar(3) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Either IPN or API',
  `transaction_type` varchar(16) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The type of call being made to the listener',
  `transaction_id` varchar(19) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The unique transaction ID generated by PayPal',
  `status` varchar(16) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The status of the call',
  `message` varchar(512) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Explanation of the call status',
  `ipn_data_hash` varchar(32) CHARACTER SET latin1 DEFAULT NULL COMMENT 'MD5 hash of the IPN post data',
  `detail` text CHARACTER SET latin1 COMMENT 'Detail text (potentially JSON) on this call',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fx_ipn_order_items
#

DROP TABLE IF EXISTS fx_ipn_order_items;

CREATE TABLE `fx_ipn_order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fx_ipn_orders
#

DROP TABLE IF EXISTS fx_ipn_orders;

CREATE TABLE `fx_ipn_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UniqueTransactionID` (`txn_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fx_items
#

DROP TABLE IF EXISTS fx_items;

CREATE TABLE `fx_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `item_desc` varchar(200) CHARACTER SET latin1 NOT NULL,
  `unit_cost` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_cost` float NOT NULL,
  `date_saved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fx_items_saved
#

DROP TABLE IF EXISTS fx_items_saved;

CREATE TABLE `fx_items_saved` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_desc` varchar(200) CHARACTER SET latin1 NOT NULL,
  `unit_cost` int(11) NOT NULL,
  `deleted` enum('Yes','No') CHARACTER SET latin1 DEFAULT 'No',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO fx_items_saved (`item_id`, `item_desc`, `unit_cost`, `deleted`) VALUES (2, 'gh', 0, 'No');


#
# TABLE STRUCTURE FOR: fx_login_attempts
#

DROP TABLE IF EXISTS fx_login_attempts;

CREATE TABLE `fx_login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO fx_login_attempts (`id`, `ip_address`, `login`, `time`) VALUES (15, '127.0.0.1', 'sqqq', '2015-04-15 15:45:15');
INSERT INTO fx_login_attempts (`id`, `ip_address`, `login`, `time`) VALUES (17, '127.0.0.1', 'dddd', '2015-04-15 15:45:25');
INSERT INTO fx_login_attempts (`id`, `ip_address`, `login`, `time`) VALUES (18, '127.0.0.1', 'dddd', '2015-04-15 15:45:42');
INSERT INTO fx_login_attempts (`id`, `ip_address`, `login`, `time`) VALUES (19, '127.0.0.1', 'dddd', '2015-04-15 15:47:06');
INSERT INTO fx_login_attempts (`id`, `ip_address`, `login`, `time`) VALUES (20, '127.0.0.1', 'dddd', '2015-04-15 15:48:24');
INSERT INTO fx_login_attempts (`id`, `ip_address`, `login`, `time`) VALUES (21, '127.0.0.1', 'dddd', '2015-04-15 15:48:32');
INSERT INTO fx_login_attempts (`id`, `ip_address`, `login`, `time`) VALUES (22, '127.0.0.1', 'dddd', '2015-04-15 15:48:47');
INSERT INTO fx_login_attempts (`id`, `ip_address`, `login`, `time`) VALUES (23, '127.0.0.1', 'dddd', '2015-04-15 15:55:46');
INSERT INTO fx_login_attempts (`id`, `ip_address`, `login`, `time`) VALUES (24, '127.0.0.1', 'dddd', '2015-04-15 15:55:54');
INSERT INTO fx_login_attempts (`id`, `ip_address`, `login`, `time`) VALUES (25, '127.0.0.1', 'dddd', '2015-04-15 15:57:08');
INSERT INTO fx_login_attempts (`id`, `ip_address`, `login`, `time`) VALUES (26, '127.0.0.1', 'dddd', '2015-04-15 15:57:18');


#
# TABLE STRUCTURE FOR: fx_messages
#

DROP TABLE IF EXISTS fx_messages;

CREATE TABLE `fx_messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_to` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `message` text CHARACTER SET latin1 NOT NULL,
  `status` enum('Read','Unread') CHARACTER SET latin1 NOT NULL DEFAULT 'Unread',
  `attached_file` varchar(100) CHARACTER SET latin1 NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO fx_messages (`msg_id`, `user_to`, `user_from`, `message`, `status`, `attached_file`, `date_received`, `deleted`) VALUES (1, 1, 1, 'ggg', 'Read', '', '2015-02-21 15:56:19', 'No');
INSERT INTO fx_messages (`msg_id`, `user_to`, `user_from`, `message`, `status`, `attached_file`, `date_received`, `deleted`) VALUES (2, 1, 1, 'sdfgsdf', 'Unread', '', '2015-02-28 15:23:11', 'No');
INSERT INTO fx_messages (`msg_id`, `user_to`, `user_from`, `message`, `status`, `attached_file`, `date_received`, `deleted`) VALUES (3, 1, 1, 'sdfgsdf', 'Unread', '', '2015-02-28 15:23:14', 'No');
INSERT INTO fx_messages (`msg_id`, `user_to`, `user_from`, `message`, `status`, `attached_file`, `date_received`, `deleted`) VALUES (4, 2, 1, 'dfgvdv', 'Unread', '', '2015-02-28 15:23:27', 'No');


#
# TABLE STRUCTURE FOR: fx_payment_methods
#

DROP TABLE IF EXISTS fx_payment_methods;

CREATE TABLE `fx_payment_methods` (
  `method_id` int(11) NOT NULL AUTO_INCREMENT,
  `method_name` varchar(64) CHARACTER SET latin1 NOT NULL DEFAULT 'Paypal',
  PRIMARY KEY (`method_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO fx_payment_methods (`method_id`, `method_name`) VALUES (1, 'Paypal');
INSERT INTO fx_payment_methods (`method_id`, `method_name`) VALUES (2, 'Cash');


#
# TABLE STRUCTURE FOR: fx_payments
#

DROP TABLE IF EXISTS fx_payments;

CREATE TABLE `fx_payments` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `inv_deleted` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fx_project_timer
#

DROP TABLE IF EXISTS fx_project_timer;

CREATE TABLE `fx_project_timer` (
  `timer_id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) NOT NULL,
  `start_time` varchar(64) CHARACTER SET latin1 NOT NULL,
  `end_time` varchar(64) CHARACTER SET latin1 NOT NULL,
  `date_timed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`timer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fx_projects
#

DROP TABLE IF EXISTS fx_projects;

CREATE TABLE `fx_projects` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fx_roles
#

DROP TABLE IF EXISTS fx_roles;

CREATE TABLE `fx_roles` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(64) CHARACTER SET latin1 NOT NULL,
  `default` int(11) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO fx_roles (`r_id`, `role`, `default`) VALUES (1, 'admin', 1);
INSERT INTO fx_roles (`r_id`, `role`, `default`) VALUES (2, 'client', 2);
INSERT INTO fx_roles (`r_id`, `role`, `default`) VALUES (3, 'collaborator', 3);


#
# TABLE STRUCTURE FOR: fx_saved_tasks
#

DROP TABLE IF EXISTS fx_saved_tasks;

CREATE TABLE `fx_saved_tasks` (
  `template_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(64) CHARACTER SET latin1 NOT NULL,
  `task_desc` varchar(255) CHARACTER SET latin1 NOT NULL,
  `visible` enum('Yes','No') CHARACTER SET latin1 NOT NULL DEFAULT 'Yes',
  `estimate_hours` float NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `saved_by` int(11) NOT NULL,
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO fx_saved_tasks (`template_id`, `task_name`, `task_desc`, `visible`, `estimate_hours`, `added`, `saved_by`) VALUES (1, 'df', 'Description', 'Yes', '3', '2015-02-18 15:20:37', 1);
INSERT INTO fx_saved_tasks (`template_id`, `task_name`, `task_desc`, `visible`, `estimate_hours`, `added`, `saved_by`) VALUES (2, 'erf', 'Descriptionsdf', 'Yes', '0', '2015-02-21 12:46:35', 1);
INSERT INTO fx_saved_tasks (`template_id`, `task_name`, `task_desc`, `visible`, `estimate_hours`, `added`, `saved_by`) VALUES (3, 'dfdf', 'Descriptiondfdf', 'Yes', '0', '2015-02-21 12:46:41', 1);


#
# TABLE STRUCTURE FOR: fx_slider
#

DROP TABLE IF EXISTS fx_slider;

CREATE TABLE `fx_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slider` text COLLATE utf8_persian_ci NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO fx_slider (`id`, `slider`, `title`, `saved_by`) VALUES (2, 'http://localhost/file/91275.jpg', 'sssss', 1);


#
# TABLE STRUCTURE FOR: fx_tasks
#

DROP TABLE IF EXISTS fx_tasks;

CREATE TABLE `fx_tasks` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `added_by` int(11) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fx_tasks_timer
#

DROP TABLE IF EXISTS fx_tasks_timer;

CREATE TABLE `fx_tasks_timer` (
  `timer_id` int(11) NOT NULL AUTO_INCREMENT,
  `task` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `start_time` varchar(64) CHARACTER SET latin1 NOT NULL,
  `end_time` varchar(64) CHARACTER SET latin1 NOT NULL,
  `date_timed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`timer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fx_title
#

DROP TABLE IF EXISTS fx_title;

CREATE TABLE `fx_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `des` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `url` text COLLATE utf8_persian_ci NOT NULL,
  `saved_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO fx_title (`id`, `des`, `url`, `saved_by`) VALUES (24, 'واگذاری', 'vagozaris', 1);
INSERT INTO fx_title (`id`, `des`, `url`, `saved_by`) VALUES (26, 'یزدی', 'yazf', 1);


#
# TABLE STRUCTURE FOR: fx_un_sessions
#

DROP TABLE IF EXISTS fx_un_sessions;

CREATE TABLE `fx_un_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO fx_un_sessions (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES ('9a75474673ed64cb1f6e1eda35a4aab7', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36', 1429170481, 'a:8:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";s:1:\"1\";s:8:\"username\";s:5:\"admin\";s:7:\"role_id\";s:1:\"1\";s:6:\"status\";s:1:\"1\";s:14:\"requested_page\";s:58:\"http://localhost/FreelancerOffice-v1.5.6/settings/database\";s:13:\"previous_page\";s:49:\"http://localhost/FreelancerOffice-v1.5.6/settings\";s:4:\"lang\";s:5:\"czech\";}');


#
# TABLE STRUCTURE FOR: fx_user_autologin
#

DROP TABLE IF EXISTS fx_user_autologin;

CREATE TABLE `fx_user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

#
# TABLE STRUCTURE FOR: fx_users
#

DROP TABLE IF EXISTS fx_users;

CREATE TABLE `fx_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO fx_users (`id`, `username`, `password`, `email`, `role_id`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES (1, 'admin', '$P$BG0UyYkDFv4MgN.48F8fgUlInRX5qM/', 'wm@gitbench.com', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2015-04-16 04:54:40', '2014-10-20 09:17:58', '2015-04-16 09:24:40');
INSERT INTO fx_users (`id`, `username`, `password`, `email`, `role_id`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES (2, 'unique', '$P$B.bPfiSbt70bJfYryCvmXeDmSwOVVg/', 'uniqueweb.ir@gmail.com', 2, 1, 0, NULL, '9c8ed2b58cf7d47b303f0a6c27c33445', '2015-04-16 04:54:11', NULL, NULL, '127.0.0.1', '2015-04-15 11:34:28', '2015-02-28 11:23:03', '2015-04-16 09:24:11');
INSERT INTO fx_users (`id`, `username`, `password`, `email`, `role_id`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES (3, 'unique.rayaneh@yahoo', '$P$Bo4c2jyJdEK.gl2iSc8DQY.RgQr8TV0', 'uniquewebr.ir@gmail.com', 2, 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2015-04-15 03:34:15', '2015-04-15 08:04:15');
INSERT INTO fx_users (`id`, `username`, `password`, `email`, `role_id`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES (4, 'rezaali', '$P$BGl79oPBVOI4cPYdM5tCNUgWxHSqTO0', 'uniqueweddb.ir@gmail.com', 2, 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2015-04-16 03:49:56', '2015-04-16 08:19:56');
INSERT INTO fx_users (`id`, `username`, `password`, `email`, `role_id`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES (5, 'uuuuuuuuu', '$P$Behk8VsQkrDmH5Qn6AiVqfoOhT.wls/', 'uniquewebjjjjr.ir@gmail.com', 2, 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2015-04-16 04:17:25', '2015-04-16 08:47:25');
INSERT INTO fx_users (`id`, `username`, `password`, `email`, `role_id`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES (6, 'eeeuuuuuuuuu', '$P$Bo0tXYJ89x5sAkfbAO/8s2ghhM0O8N/', 'uniqueweffbjjjjr.ir@gmail.com', 2, 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2015-04-16 04:20:03', '2015-04-16 08:50:03');
INSERT INTO fx_users (`id`, `username`, `password`, `email`, `role_id`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES (7, 'fffffff', '$P$Bn.eTgO9amcuxtXGJT2OY/VPtvf6zp/', 'uniqueweb.ir@gmgail.com', 2, 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2015-04-16 04:54:27', '2015-04-16 04:45:36', '2015-04-16 09:24:27');


