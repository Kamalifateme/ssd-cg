-- --------------------------------------------------------

--
-- Table structure for table `fx_account_details`
ALTER TABLE fx_account_details
  ADD allowed_modules text NOT NULL
    AFTER avatar,
    ADD department varchar(32) NULL
    AFTER avatar;


-- --------------------------------------------------------

--
-- Table structure for table `fx_api_keys`
--

CREATE TABLE IF NOT EXISTS `fx_api_keys` (
`id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `api_key` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text COLLATE utf8_unicode_ci,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fx_api_keys`
--

INSERT INTO `fx_api_keys` (`id`, `user`, `api_key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'freelancer', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fx_api_logs`
--

CREATE TABLE IF NOT EXISTS `fx_api_logs` (
`id` int(11) NOT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `method` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `params` text COLLATE utf8_unicode_ci,
  `api_key` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

ALTER TABLE fx_bugs
  ADD issue_title varchar(255) NOT NULL
    AFTER bug_status,
  ADD reproducibility varchar(255) NULL
    AFTER bug_status,
ADD severity varchar(100) NULL
    AFTER bug_status;

UPDATE fx_roles
SET role='staff' WHERE r_id = 3; 


DELETE FROM fx_config WHERE config_key = 'stripe_private_key';
DELETE FROM fx_config WHERE config_key = 'stripe_public_key';

INSERT INTO `fx_config` (`config_key`, `value`) VALUES
('allow_client_registration', 'TRUE'),
('automatic_email_on_recur', 'TRUE'),
('button_color', 'info'),
('client_create_project', 'TRUE'),
('date_format', '%b %d, %Y'),
('display_invoice_badge', 'TRUE'),
('email_account_details', 'TRUE'),
('email_staff_tickets', 'TRUE'),
('estimate_color', '#FB6B5B'),
('increment_invoice_number', 'TRUE'),
('invoices_due_after', '30'),
('invoice_color', '#53B567'),
('invoice_language', 'en'),
('show_login_image', 'TRUE'),
('stripe_private_key', 'sk_test_tV5LwTRLk8yYcM94iMONLdFf'),
('stripe_public_key', 'pk_test_8t8Ck9sDuSRa2vps1KJlnjTT'),
('notify_bug_assignment', 'TRUE'),
('notify_bug_comments', 'TRUE'),
('notify_project_assignments', 'TRUE'),
('notify_project_comments', 'TRUE'),
('notify_project_files', 'TRUE'),
('notify_task_assignments', 'TRUE');




-- --------------------------------------------------------

--
-- Table structure for table `fx_departments`
--

CREATE TABLE IF NOT EXISTS `fx_departments` (
`deptid` int(10) NOT NULL,
  `deptname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `depthidden` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_email_templates`
--

CREATE TABLE IF NOT EXISTS `fx_email_templates` (
`template_id` int(11) NOT NULL,
  `email_group` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `template_body` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `fx_email_templates`
--

INSERT INTO `fx_email_templates` (`template_id`, `email_group`, `template_body`) VALUES
(1, 'registration', '<h3>Welcome to {SITE_NAME}!</h3>\r\n<p>Thanks for joining {SITE_NAME}. We listed your sign in details below, make sure you keep them safe.<br>To open your {SITE_NAME} homepage, please follow this link:</p>\r\n <big><b><a href="{SITE_URL}">{SITE_NAME} Account!</a></b></big><p>Link doesn''t work? Copy the following link to your browser address bar:</p>\r\n <a href="{SITE_URL}">{SITE_URL}</a><br>Your username: {USERNAME}<br>Your email address: {EMAIL}<br>Your password: {PASSWORD}<br>Have fun!<br>The {SITE_NAME} Team'),
(2, 'forgot_password', '<h3>Create a new password</h3><p>Forgot your password, huh? No big deal.<br>To create a new password, just follow this link:<br><br><big><b><a href="{PASS_KEY_URL}">Create a new password</a></b></big><br>Link doesn''t work? Copy the following link to your browser address bar:<br><a href="{PASS_KEY_URL}">{PASS_KEY_URL}</a><br><br><br>You received this email, because it was requested by a <a href="{SITE_URL}">{SITE_NAME}</a> user. </p><p>This is part of the procedure to create a new password on the system. If you DID NOT request a new password then please ignore this email and your password will remain the same.</p><br>Thank you,<br>The {SITE_NAME} Team'),
(3, 'change_email', '<h3>Your new email address on {SITE_NAME}</h3>\r\n<p>You have changed your email address for {SITE_NAME}.<br>\r\nFollow this link to confirm your new email address:<br>\r\n<big><b><a href="{NEW_EMAIL_KEY_URL}">Confirm your new email</a></b></big></p><br>\r\nLink doesn''t work? Copy the following link to your browser address bar:<br>\r\n<a href="{NEW_EMAIL_KEY_URL}">{NEW_EMAIL_KEY_URL}</a>\r\n<br><br>Your email address: {NEW_EMAIL}<br><br>\r\nYou received this email, because it was requested by a <a href="{SITE_URL}">{SITE_NAME}</a> user. If you have received this by mistake, please DO NOT click the confirmation link, and simply delete this email. After a short time, the request will be removed from the system.<br>\r\nThank you,<br>\r\nThe {SITE_NAME} Team'),
(4, 'activate_account', '<h3>Welcome to {SITE_NAME}!</h3><p>Thanks for joining {SITE_NAME}. We listed your sign in details below, make sure you keep them safe.</p>To verify your email address, please follow this link:<br><big><b><a href="{ACTIVATE_URL}">Finish your registration...</a></b></big><br>Link doesn''t work? Copy the following link to your browser address bar:<br><a href="{ACTIVATE_URL}">{ACTIVATE_URL}</a><br><br>Please verify your email within {ACTIVATION_PERIOD} hours, otherwise your registration will become invalid and you will have to register again.<br><br><br>Your username: {USERNAME}<br>Your email address: {EMAIL}<br>Your password: {PASSWORD}<br><br>Have fun!<br>The {SITE_NAME} Team'),
(5, 'reset_password', '<h3>Your new password on {SITE_NAME}</h3><p>You have changed your password.<br>Please, keep it in your records so you don''t forget it.<br></p>Your username: {USERNAME}<br>Your email address: {EMAIL}<br>Your new password: {NEW_PASSWORD}<br><br>Thank you,<br>The {SITE_NAME} Team'),
(6, 'bug_assigned', '<h3>New Bug Assigned</h3>\r\n<p>Hi there,</p>\r\n<p>A new bug ( {ISSUE_TITLE} ) has been assigned to you by {ASSIGNED_BY} in project {PROJECT_TITLE}. </p>\r\n<p>You can view this bug by logging in to the portal using the link below.</p>\r\n--------------------------<br><big><b><a href="{SITE_URL}">My Account</a></b></big><br><br>Regards<br>The {SITE_NAME} Team'),
(7, 'bug_status', '<h3>Bug status changed</h3>\r\n<p>Hi there,</p>\r\n<p>Bug {ISSUE_TITLE} has been marked as {STATUS} by {MARKED_BY}. </p>\r\n<p>You can view this bug by logging in to the portal using the link below.</p>\r\n--------------------------<br><big><b><a href="{BUG_URL}">My Account</a></b></big><br>Regards<br>The {SITE_NAME} Team'),
(8, 'bug_comment', '<p>Hi there,</p>\r\n\r\n<p>A new comment has been posted by {POSTED_BY} to bug {ISSUE_TITLE}. </p>\r\n\r\n<p>You can view the comment using the link below.</p>\r\n\r\n----------------------------------------------------------<br>\r\n<big><b><a href="{COMMENT_URL}">View Comment</a></b></big><br>\r\nRegards<br>\r\nThe {SITE_NAME} Team'),
(9, 'bug_file', '<p>Hi there, </p><p>A new file has been uploaded by {UPLOADED_BY} to issue {ISSUE_TITLE}. </p><p>You can view the bug using the link below.</p>--------------------------<br><big><b><a href="{BUG_URL}">View Bug</a></b></big><br>Regards<br>The {SITE_NAME} Team'),
(10, 'bug_reported', '<p>Hi there,<p><p>A new bug ({ISSUE_TITLE}) has been reported by {ADDED_BY}. </p><p>You can view the Bug using the Dashboard Page.</p>--------------------------<br><big><b><a href="{BUG_URL}">View Bug</a></b></big><br>Regards<br>The {SITE_NAME} Team'),
(11, 'project_file', '<p>Hi there,</p><p>A new file has been uploaded by {UPLOADED_BY} to project {PROJECT_TITLE}. </p><p>You can view the Project using the link below.</p>--------------------------<br><big><b><a href="{PROJECT_URL}">View Project</a></b></big><br><br>Regards<br>The {SITE_NAME} Team'),
(12, 'project_complete', '<p>Hi {CLIENT_NAME}</p>\r\n\r\n<p>Project : {PROJECT_TITLE} - {PROJECT_CODE} has been completed. </p>\r\n\r\n<p>You can view the project by logging into your portal Account.</p>\r\n<big><b><a href="{PROJECT_URL}">View Project</a></b></big><br><br>\r\n--------------------------<br>\r\nProject Overview:<br>\r\nHours Logged # :  {PROJECT_HOURS} hours<br>\r\nProject Cost : {PROJECT_COST}<br>\r\nRegards<br>\r\nThe {SITE_NAME} Team'),
(13, 'project_comment', '<p>Hi there,</p><p>A new comment has been posted by {POSTED_BY} to project {PROJECT_TITLE}. </p><p>You can view the comment using the link below.</p>-----------------------------------------------------------------------<br><big><b><a href="{COMMENT_URL}">View Comment</a></b></big><br><br>Regards<br>The {SITE_NAME} Team'),
(14, 'task_assigned', '<p>Hi there,</p>\r\n<p>A new task ( {TASK_NAME} ) has been assigned to you by {ASSIGNED_BY} in project {PROJECT_TITLE}. </p>\r\n<p>You can view this task by logging in to the portal using the link below.</p>\r\n-----------------------------------<br>\r\n<big><b><a href="{PROJECT_URL}">View Task</a></b></big><br><br>\r\nRegards<br>\r\nThe {SITE_NAME} Team'),
(15, 'project_assigned', '<p>Hi there,</p><p>A new project ( {PROJECT_TITLE} ) has been assigned to you by {ASSIGNED_BY}.</p><p>You can view this project by logging in to the portal using the link below.</p>-----------------------------------<br><big><b><a href="{PROJECT_URL}">View Project</a></b></big><br><br>Regards<br>The {SITE_NAME} Team'),
(16, 'payment_email', '<p>Dear Customer</p>\r\n<p>We have received your payment of {INVOICE_CURRENCY} {PAID_AMOUNT}. </p>\r\n<p>Thank you for your Payment and business. We look forward to working with you again.</p>\r\n--------------------------<br>\r\nRegards<br>\r\nThe {SITE_NAME} Team'),
(17, 'invoice_message', '<p>Hello {CLIENT}<br></p><p>Here is the invoice of {CURRENCY} {AMOUNT}<br>You can view the invoice online at:<br><big><b><a href="{INVOICE_LINK}">View Invoice</a></b></big><br><br>Best Regards,<br>The {SITE_NAME} Team</p>'),
(18, 'invoice_reminder', '<p>Hello {CLIENT}</p><br><p>This is a friendly reminder to pay your invoice of {CURRENCY} {AMOUNT}<br>You can view the invoice online at:<br><big><b><a href="{INVOICE_LINK}">View Invoice</a></b></big><br><br>Best Regards,<br>The {SITE_NAME} Team</p>'),
(19, 'message_received', '<p>Hi {RECIPIENT},</p><p>You have received a message from {SENDER}. </p>------------------------------------------------------------------<br><blockquote>{MESSAGE}</blockquote><big><b><a href="{SITE_URL}">Go to Account</a></b></big><br><br>Regards<br>The {SITE_NAME} Team'),
(20, 'estimate_email', '        <p>Hi {CLIENT}</p>\r\n<p>Thanks for your business inquiry. </p>\r\nThe estimate {ESTIMATE_REF} is attached with this email. <br> \r\nEstimate Overview:<br> \r\nEstimate # : {ESTIMATE_REF}<br> \r\nAmount: {CURRENCY} {AMOUNT}<br> <br>\r\n\r\nYou can view the estimate online at:<br> \r\n<big><b><a href="{ESTIMATE_LINK}">View Estimate</a></b></big><br><br>  \r\nBest Regards,<br> \r\nThe {SITE_NAME} Team'),
(21, 'ticket_staff_email', '        <h3>Ticket Created</h3>\r\n\r\n<p>Ticket #{TICKET_CODE} has been created by the client.</p>\r\n\r\n<p>You may view the ticket by clicking on the following link <br><br>  Client Email : {REPORTER_EMAIL}<br><br> \r\n<big><b><a href="{TICKET_LINK}">View Ticket</a></b></big> <br><br>\r\n\r\nRegards<br><br>\r\n{SITE_NAME}</p>'),
(22, 'ticket_client_email', '<p>Hello {CLIENT_EMAIL},<br><br></p><p>Your ticket has been opened with us.<br><br>Ticket #{TICKET_CODE}<br>Status : Open<br><br>Click on the below link to see the ticket details and post additional comments.<br><br><big><b><a href="{TICKET_LINK}">View Ticket</a></b></big><br><br>Regards<br><br>{SITE_NAME} Team<br></p>'),
(23, 'ticket_reply_email', '<p>Hi,<br></p><p>A new response has been added to Ticket #{TICKET_CODE}<br><br> Ticket : #{TICKET_CODE} <br>Status : {TICKET_STATUS} <br><br></p>To see the response and post additional comments, click on the link below.<br><br>         <big><b><a href="{TICKET_LINK}">View Reply</a> </b></big><br><br>          Note: Do not reply to this email as this email is not monitored.<br><br>     Regards<br>{SITE_NAME} Team<br>'),
(24, 'ticket_closed_email', 'Hi {REPORTER_EMAIL}<br><br>Ticket #{TICKET_CODE} has been closed by {STAFF_USERNAME} <br><br>          Ticket : #{TICKET_CODE} <br>     \r\nStatus : {TICKET_STATUS}<br><br>\r\nReplies : {NO_OF_REPLIES}<br><br>          \r\nTo see the responses or open the ticket, click on the link below.<br><br>          <big><b><a href="{TICKET_LINK}">View Ticket</a></b></big> <br><br>          Note: Do not reply to this email as this email is not monitored.<br><br>    \r\nRegards<br>\r\n{SITE_NAME} Team');




ALTER TABLE fx_estimates
  ADD currency varchar(32) NOT NULL
    AFTER due_date,
  ADD discount float NULL
    AFTER due_date;


-- --------------------------------------------------------

--
-- Table structure for table `fx_fields`
--

CREATE TABLE IF NOT EXISTS `fx_fields` (
`id` int(10) NOT NULL,
  `deptid` int(10) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uniqid` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;



ALTER TABLE fx_invoices
  MODIFY tax float NOT NULL;

  ALTER TABLE fx_invoices
  MODIFY notes text NOT NULL;

  ALTER TABLE fx_estimates
  MODIFY tax float NOT NULL;

ALTER TABLE fx_invoices
  ADD discount varchar(32) NOT NULL
    AFTER tax,
ADD recur_start_date varchar(32) NOT NULL
    AFTER r_freq,
ADD recur_end_date varchar(32) NOT NULL
    AFTER r_freq,
ADD recur_frequency varchar(32) NOT NULL
    AFTER r_freq,
ADD recur_next_date varchar(32) NOT NULL
    AFTER r_freq,
ADD show_client enum('Yes','No') NOT NULL DEFAULT 'Yes'
    AFTER r_freq,
ADD viewed enum('Yes','No') NOT NULL DEFAULT 'No'
    AFTER r_freq;


ALTER TABLE fx_items
  ADD item_name varchar(255) NOT NULL
    AFTER invoice_id;

    ALTER TABLE fx_estimate_items
  ADD item_name varchar(255) NOT NULL
    AFTER estimate_id;

ALTER TABLE fx_items
  MODIFY quantity varchar(32) NOT NULL;

ALTER TABLE fx_items_saved
  ADD item_name varchar(200) NOT NULL
    AFTER item_id;

-- --------------------------------------------------------

--
-- Table structure for table `fx_milestones`
--

CREATE TABLE IF NOT EXISTS `fx_milestones` (
`id` int(11) NOT NULL,
  `milestone_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `project` int(11) NOT NULL,
  `start_date` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `due_date` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


ALTER TABLE fx_payments
  ADD payment_date varchar(32) NOT NULL
    AFTER notes;

TRUNCATE TABLE `fx_payment_methods`;

INSERT INTO `fx_payment_methods` (`method_id`, `method_name`) VALUES
(1, 'Online'),
(2, 'Cash'),
(3, 'Bank Deposit'),
(5, 'Cheque');


-- --------------------------------------------------------

--
-- Table structure for table `fx_permissions`
--

CREATE TABLE IF NOT EXISTS `fx_permissions` (
`permission_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive','deleted') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `fx_permissions`
--

INSERT INTO `fx_permissions` (`permission_id`, `name`, `description`, `status`) VALUES
(1, 'view_all_invoices', 'Allow user access to view all invoices', 'active'),
(2, 'edit_all_invoices', 'Allow user access to edit all invoices', 'active'),
(3, 'add_invoices', 'Allow user access to add invoices', 'active'),
(4, 'delete_invoices', 'Allow user access to delete invoice', 'active'),
(5, 'pay_invoice_offline', 'Allow user access to make offline Invoice Payments', 'active'),
(6, 'view_payments', 'Allow user access to view own payments', 'active'),
(7, 'email_invoices', 'Allow user access to email invoices', 'active'),
(8, 'send_email_reminders', 'Allow user access to send invoice reminders', 'active'),
(9, 'add_estimates', 'Allow user access to add estimates', 'active'),
(10, 'edit_estimates', 'Allow user access to edit all estimates', 'active'),
(11, 'view_all_estimates', 'Allow user access to view all estimates', 'active'),
(12, 'delete_estimates', 'Allow user access to delete estimates', 'active'),
(17, 'view_all_projects', 'Allow user access to view all projects', 'active'),
(18, 'view_project_cost', 'Allow user access to view project cost', 'active'),
(19, 'add_projects', 'Allow user access to add projects', 'active'),
(20, 'edit_all_projects', 'Allow user access to edit projects', 'active'),
(21, 'view_all_projects', 'Allow user access to view all projects', 'active'),
(22, 'delete_projects', 'Allow user access to delete projects', 'active'),
(23, 'edit_settings', 'Allow user access to edit all settings', 'active'),
(25, 'view_project_clients', 'Allow staff to view project''s clients', 'active'),
(26, 'view_project_notes', 'Allow staff to view project notes', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `fx_priorities`
--

CREATE TABLE IF NOT EXISTS `fx_priorities` (
  `priority` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fx_priorities`
--

INSERT INTO `fx_priorities` (`priority`) VALUES
('Low'),
('Medium'),
('High');



ALTER TABLE fx_projects
  ADD timer_started_by int(11) NOT NULL
    AFTER timer,
  ADD description text NOT NULL
    AFTER project_title,
ADD settings text NOT NULL
    AFTER estimate_hours;


-- --------------------------------------------------------

--
-- Table structure for table `fx_project_settings`
--

CREATE TABLE IF NOT EXISTS `fx_project_settings` (
`id` int(11) NOT NULL,
  `setting` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `fx_project_settings`
--

INSERT INTO `fx_project_settings` (`id`, `setting`, `description`) VALUES
(1, 'show_team_members', 'Allow client to view team members'),
(2, 'show_milestones', 'Allow client to view project milestones'),
(5, 'show_project_tasks', 'Allow client to view project tasks'),
(6, 'show_project_files', 'Allow client to view project files'),
(7, 'show_timesheets', 'Allow clients to view project timesheets'),
(8, 'show_project_bugs', 'Allow client to view project bugs'),
(9, 'show_project_history', 'Allow client to view project history'),
(10, 'show_project_calendar', 'Allow clients to view project calendars'),
(11, 'show_project_comments', 'Allow clients to view project comments');


ALTER TABLE fx_project_timer
  ADD user int(11) NOT NULL
    AFTER project;

-- --------------------------------------------------------

--
-- Table structure for table `fx_status`
--

CREATE TABLE IF NOT EXISTS `fx_status` (
`id` int(11) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `fx_status`
--

INSERT INTO `fx_status` (`id`, `status`) VALUES
(1, 'answered'),
(2, 'closed'),
(3, 'open'),
(5, 'in progress');


ALTER TABLE fx_tasks
  ADD milestone int(11) NOT NULL
    AFTER visible,
ADD timer_started_by int(11) NOT NULL
    AFTER timer_status,
ADD due_date varchar(32) NOT NULL
    AFTER auto_progress;

ALTER TABLE fx_tasks_timer
  ADD user int(11) NOT NULL
    AFTER end_time;



-- --------------------------------------------------------

--
-- Table structure for table `fx_task_files`
--

CREATE TABLE IF NOT EXISTS `fx_task_files` (
`file_id` int(11) NOT NULL,
  `task` int(11) DEFAULT NULL,
  `file_name` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `file_ext` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `original_name` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `file_status` enum('unconfirmed','confirmed','in_progress','done','verified') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unconfirmed',
  `uploaded_by` int(11) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_ticketreplies`
--

CREATE TABLE IF NOT EXISTS `fx_ticketreplies` (
`id` int(10) NOT NULL,
  `ticketid` int(10) NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `replier` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `replierid` int(10) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fx_tickets`
--

CREATE TABLE IF NOT EXISTS `fx_tickets` (
`id` int(10) NOT NULL,
  `ticket_code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `reporter` int(10) NOT NULL,
  `priority` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional` text COLLATE utf8_unicode_ci,
  `attachment` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;




--
-- Indexes for dumped tables
--

--
-- Indexes for table `fx_api_keys`
--
ALTER TABLE `fx_api_keys`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `fx_api_logs`
--
ALTER TABLE `fx_api_logs`
 ADD PRIMARY KEY (`id`);
--
-- Indexes for table `fx_departments`
--
ALTER TABLE `fx_departments`
 ADD PRIMARY KEY (`deptid`);

--
-- Indexes for table `fx_email_templates`
--
ALTER TABLE `fx_email_templates`
 ADD PRIMARY KEY (`template_id`);

--
-- Indexes for table `fx_fields`
--
ALTER TABLE `fx_fields`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_milestones`
--
ALTER TABLE `fx_milestones`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_permissions`
--
ALTER TABLE `fx_permissions`
 ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `fx_project_settings`
--
ALTER TABLE `fx_project_settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_status`
--
ALTER TABLE `fx_status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_task_files`
--
ALTER TABLE `fx_task_files`
 ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `fx_ticketreplies`
--
ALTER TABLE `fx_ticketreplies`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_tickets`
--
ALTER TABLE `fx_tickets`
 ADD PRIMARY KEY (`id`);



--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fx_api_keys`
--
ALTER TABLE `fx_api_keys`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fx_api_logs`
--
ALTER TABLE `fx_api_logs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_departments`
--
ALTER TABLE `fx_departments`
MODIFY `deptid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_email_templates`
--
ALTER TABLE `fx_email_templates`
MODIFY `template_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `fx_fields`
--
ALTER TABLE `fx_fields`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_milestones`
--
ALTER TABLE `fx_milestones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_payment_methods`
--
ALTER TABLE `fx_payment_methods`
MODIFY `method_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fx_permissions`
--
ALTER TABLE `fx_permissions`
MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `fx_project_settings`
--
ALTER TABLE `fx_project_settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `fx_status`
--
ALTER TABLE `fx_status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fx_task_files`
--
ALTER TABLE `fx_task_files`
MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_ticketreplies`
--
ALTER TABLE `fx_ticketreplies`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fx_tickets`
--
ALTER TABLE `fx_tickets`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;



ALTER TABLE fx_account_details CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_activities CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_assign_projects CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_assign_tasks CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_bugs CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_bug_comments CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_bug_files CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_comments CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_comment_replies CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_companies CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_departments CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_estimates CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_estimate_items CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_fields CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_files CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_invoices CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_items CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_items_saved CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_messages CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_milestones CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_payments CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_projects CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_saved_tasks CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_tasks CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_tasks_timer CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_task_files CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_ticketreplies CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_tickets CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE fx_users CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;