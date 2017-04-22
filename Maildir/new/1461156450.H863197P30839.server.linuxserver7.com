Return-path: <>
Envelope-to: ussdc531@server.linuxserver7.com
Delivery-date: Wed, 20 Apr 2016 17:17:30 +0430
Received: from mail by server.linuxserver7.com with local (Exim 4.86)
	id 1asrXW-00081L-Oz
	for ussdc531@server.linuxserver7.com; Wed, 20 Apr 2016 17:17:30 +0430
X-Failed-Recipients: cameron.wood@op.pl
Auto-Submitted: auto-replied
From: Mail Delivery System <Mailer-Daemon@server.linuxserver7.com>
To: ussdc531@server.linuxserver7.com
Content-Type: multipart/report; report-type=delivery-status; boundary=1461156450-eximdsn-1667487833
MIME-Version: 1.0
Subject: Mail delivery failed: returning message to sender
Message-Id: <E1asrXW-00081L-Oz@server.linuxserver7.com>
Date: Wed, 20 Apr 2016 17:17:30 +0430

--1461156450-eximdsn-1667487833
Content-type: text/plain; charset=us-ascii

This message was created automatically by mail delivery software.

A message that you sent could not be delivered to one or more of its
recipients. This is a permanent error. The following address(es) failed:

  cameron.wood@op.pl
    host mx.poczta.onet.pl [213.180.147.146]
    SMTP error from remote mail server after RCPT TO:<cameron.wood@op.pl>:
    554 5.7.1 <cameron.wood@op.pl>: Recipient address rejected:
    Spf check: fail

--1461156450-eximdsn-1667487833
Content-type: message/delivery-status

Reporting-MTA: dns; server.linuxserver7.com

Action: failed
Final-Recipient: rfc822;cameron.wood@op.pl
Status: 5.0.0
Remote-MTA: dns; mx.poczta.onet.pl
Diagnostic-Code: smtp; 554 5.7.1 <cameron.wood@op.pl>: Recipient address rejected: Spf check: fail

--1461156450-eximdsn-1667487833
Content-type: message/rfc822

Return-path: <ussdc531@server.linuxserver7.com>
Received: from ussdc531 by server.linuxserver7.com with local (Exim 4.86)
	(envelope-from <ussdc531@server.linuxserver7.com>)
	id 1asrXT-0007zM-JH
	for cameron.wood@op.pl; Wed, 20 Apr 2016 17:17:27 +0430
To: cameron.wood@op.pl
Subject: =?utf-8?B?2YXYtNiu2LXYp9iqINit2LPYp9ioINqp2KfYsdio2LHbjCDYqNix2KfbjCBS?=  =?utf-8?B?b2JpbiBXYWtlaHVyc3Qg2K/YsSBTU0Qg2q/YsdmI2Ycg2YXYtNin?=  =?utf-8?B?2YjYsdin2YY=?=
X-PHP-Originating-Script: 1067:phpmailer.php
Date: Wed, 20 Apr 2016 12:47:27 +0000
From: "*www.ssd-cg.com*" <info@ssd-cg.com>
Reply-To: "*www.ssd-cg.com*" <info@ssd-cg.com>
Message-ID: <7e7b8c818613957e0431300115af5766@ssd-cg.com>
X-Priority: 3
X-Mailer: PHPMailer 5.2.1 (http://code.google.com/a/apache-extras.org/p/phpmailer/)
MIME-Version: 1.0
Content-Transfer-Encoding: 8bit
Content-Type: text/plain; charset="utf-8"
Sender:  <ussdc531@server.linuxserver7.com>

سلام Robin Wakehurst عزیز،

از اینکه در وب سایت SSD گروه مشاوران ثبت نام نموده اید متشکریم. حساب کاربری شما ایجاد شده است و تنها می باید توسط خود شما فعال گردد
To  شما با کلیک بر روی لینک زیر میتوانید حساب کاربری خود را فعال نمایید و یا میتوانید این آدرس را در آدرس بار مرورگرتان وارد نمایید
http://ssd-cg.com/index.php?option=com_users&task=registration.activate&token=70d613e62f130346ac7f4c9a39f9e064 

 پس از فعال سازی شما میتوانید به حساب کاربری خود با رمز و نام کاربری که در ادامه میاید به وب سایت  http://ssd-cg.com/ وارد شوید 

 نام کاربری و رمز عبور شما

نام کاربری : robinwakehurst13
رمز ورود : shuvWW1r


--1461156450-eximdsn-1667487833--
