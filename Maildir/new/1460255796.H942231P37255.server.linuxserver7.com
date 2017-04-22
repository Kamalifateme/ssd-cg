Return-path: <>
Envelope-to: ussdc531@server.linuxserver7.com
Delivery-date: Sun, 10 Apr 2016 07:06:36 +0430
Received: from mail by server.linuxserver7.com with local (Exim 4.86)
	id 1ap5Eq-0009gM-Rb
	for ussdc531@server.linuxserver7.com; Sun, 10 Apr 2016 07:06:36 +0430
X-Failed-Recipients: rdsjdd@tlen.pl
Auto-Submitted: auto-replied
From: Mail Delivery System <Mailer-Daemon@server.linuxserver7.com>
To: ussdc531@server.linuxserver7.com
Content-Type: multipart/report; report-type=delivery-status; boundary=1460255796-eximdsn-1176837708
MIME-Version: 1.0
Subject: Mail delivery failed: returning message to sender
Message-Id: <E1ap5Eq-0009gM-Rb@server.linuxserver7.com>
Date: Sun, 10 Apr 2016 07:06:36 +0430

--1460255796-eximdsn-1176837708
Content-type: text/plain; charset=us-ascii

This message was created automatically by mail delivery software.

A message that you sent could not be delivered to one or more of its
recipients. This is a permanent error. The following address(es) failed:

  rdsjdd@tlen.pl
    host mx5.o2.pl [193.17.41.45]
    SMTP error from remote mail server after MAIL FROM:<ussdc531@server.linuxserver7.com> SIZE=2868:
    550 Bad SPF records for [server.linuxserver7.com:79.175.168.10], see http://spf.pobox.com/

--1460255796-eximdsn-1176837708
Content-type: message/delivery-status

Reporting-MTA: dns; server.linuxserver7.com

Action: failed
Final-Recipient: rfc822;rdsjdd@tlen.pl
Status: 5.0.0
Remote-MTA: dns; mx5.o2.pl
Diagnostic-Code: smtp; 550 Bad SPF records for [server.linuxserver7.com:79.175.168.10], see http://spf.pobox.com/

--1460255796-eximdsn-1176837708
Content-type: message/rfc822

Return-path: <ussdc531@server.linuxserver7.com>
Received: from ussdc531 by server.linuxserver7.com with local (Exim 4.86)
	(envelope-from <ussdc531@server.linuxserver7.com>)
	id 1ap5ES-0008xM-05
	for rdsjdd@tlen.pl; Sun, 10 Apr 2016 07:06:12 +0430
To: rdsjdd@tlen.pl
Subject: =?utf-8?B?2YXYtNiu2LXYp9iqINit2LPYp9ioINqp2KfYsdio2LHbjCDYqNix2KfbjCBF?=  =?utf-8?B?bHZlcmEgRml0emdpYmJvbnMg2K/YsSBTU0Qg2q/YsdmI2Ycg?=  =?utf-8?B?2YXYtNin2YjYsdin2YY=?=
X-PHP-Originating-Script: 1067:phpmailer.php
Date: Sun, 10 Apr 2016 02:36:11 +0000
From: "*www.ssd-cg.com*" <info@ssd-cg.com>
Reply-To: "*www.ssd-cg.com*" <info@ssd-cg.com>
Message-ID: <55aab9da0b79357e0ded7bbf38e065e6@ssd-cg.com>
X-Priority: 3
X-Mailer: PHPMailer 5.2.1 (http://code.google.com/a/apache-extras.org/p/phpmailer/)
MIME-Version: 1.0
Content-Transfer-Encoding: 8bit
Content-Type: text/plain; charset="utf-8"
Sender:  <ussdc531@server.linuxserver7.com>

سلام Elvera Fitzgibbons عزیز،

از اینکه در وب سایت SSD گروه مشاوران ثبت نام نموده اید متشکریم. حساب کاربری شما ایجاد شده است و تنها می باید توسط خود شما فعال گردد
To  شما با کلیک بر روی لینک زیر میتوانید حساب کاربری خود را فعال نمایید و یا میتوانید این آدرس را در آدرس بار مرورگرتان وارد نمایید
http://ssd-cg.com/index.php?option=com_users&task=registration.activate&token=91e902ff56d71b0f51c82e81ba01f20b 

 پس از فعال سازی شما میتوانید به حساب کاربری خود با رمز و نام کاربری که در ادامه میاید به وب سایت  http://ssd-cg.com/ وارد شوید 

 نام کاربری و رمز عبور شما

نام کاربری : elverafitzgibbons3
رمز ورود : 0DqiqDRV2b


--1460255796-eximdsn-1176837708--
