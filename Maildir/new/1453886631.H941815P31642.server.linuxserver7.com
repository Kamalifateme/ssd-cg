Return-path: <>
Envelope-to: ussdc531@server.linuxserver7.com
Delivery-date: Wed, 27 Jan 2016 12:53:51 +0330
Received: from mail by server.linuxserver7.com with local (Exim 4.86)
	id 1aOMKN-0008EI-TC
	for ussdc531@server.linuxserver7.com; Wed, 27 Jan 2016 12:53:51 +0330
X-Failed-Recipients: admin@4kstream.org
Auto-Submitted: auto-replied
From: Mail Delivery System <Mailer-Daemon@server.linuxserver7.com>
To: ussdc531@server.linuxserver7.com
Content-Type: multipart/report; report-type=delivery-status; boundary=1453886631-eximdsn-1999883225
MIME-Version: 1.0
Subject: Mail delivery failed: returning message to sender
Message-Id: <E1aOMKN-0008EI-TC@server.linuxserver7.com>
Date: Wed, 27 Jan 2016 12:53:51 +0330

--1453886631-eximdsn-1999883225
Content-type: text/plain; charset=us-ascii

This message was created automatically by mail delivery software.

A message that you sent could not be delivered to one or more of its
recipients. This is a permanent error. The following address(es) failed:

  admin@4kstream.org
    host mail.4kstream.org [192.185.66.125]
    SMTP error from remote mail server after RCPT TO:<admin@4kstream.org>:
    550-"JunkMail rejected - server.linuxserver7.com [79.175.168.10]:38229 is in an
    550-RBL on rbl.websitewelcome.com, see Blocked - see
    550 http://cbl.abuseat.org/lookup.cgi?ip=79.175.168.10"

--1453886631-eximdsn-1999883225
Content-type: message/delivery-status

Reporting-MTA: dns; server.linuxserver7.com

Action: failed
Final-Recipient: rfc822;admin@4kstream.org
Status: 5.0.0
Remote-MTA: dns; mail.4kstream.org
Diagnostic-Code: smtp; 550-"JunkMail rejected - server.linuxserver7.com [79.175.168.10]:38229 is in an
 550-RBL on rbl.websitewelcome.com, see Blocked - see
 550 http://cbl.abuseat.org/lookup.cgi?ip=79.175.168.10"

--1453886631-eximdsn-1999883225
Content-type: message/rfc822

Return-path: <ussdc531@server.linuxserver7.com>
Received: from ussdc531 by server.linuxserver7.com with local (Exim 4.86)
	(envelope-from <ussdc531@server.linuxserver7.com>)
	id 1aOMKI-0008Cd-SU
	for admin@4kstream.org; Wed, 27 Jan 2016 12:53:46 +0330
To: admin@4kstream.org
Subject: =?utf-8?B?2YXYtNiu2LXYp9iqINit2LPYp9ioINqp2KfYsdio2LHbjCDYqNix2KfbjCBK?=  =?utf-8?B?YXNvbiBTcGVhcm1hbiDYr9ixIFNTRCDar9ix2YjZhyDZhdi02KfZiA==?=  =?utf-8?B?2LHYp9mG?=
X-PHP-Originating-Script: 1067:phpmailer.php
Date: Wed, 27 Jan 2016 09:23:46 +0000
From: "*www.ssd-cg.com*" <info@ssd-cg.com>
Reply-To: "*www.ssd-cg.com*" <info@ssd-cg.com>
Message-ID: <8cbb019b4beb3f56cfe8b37599f75b20@ssd-cg.com>
X-Priority: 3
X-Mailer: PHPMailer 5.2.1 (http://code.google.com/a/apache-extras.org/p/phpmailer/)
MIME-Version: 1.0
Content-Transfer-Encoding: 8bit
Content-Type: text/plain; charset="utf-8"
Sender:  <ussdc531@server.linuxserver7.com>

سلام Jason Spearman عزیز،

از اینکه در وب سایت SSD گروه مشاوران ثبت نام نموده اید متشکریم. حساب کاربری شما ایجاد شده است و تنها می باید توسط خود شما فعال گردد
To  شما با کلیک بر روی لینک زیر میتوانید حساب کاربری خود را فعال نمایید و یا میتوانید این آدرس را در آدرس بار مرورگرتان وارد نمایید
http://ssd-cg.com/index.php?option=com_users&task=registration.activate&token=04f2161f1f3bd25bebfa59f0c5492f09 

 پس از فعال سازی شما میتوانید به حساب کاربری خود با رمز و نام کاربری که در ادامه میاید به وب سایت  http://ssd-cg.com/ وارد شوید 

 نام کاربری و رمز عبور شما

نام کاربری : jason3673406979
رمز ورود : a3YGLyT3


--1453886631-eximdsn-1999883225--
