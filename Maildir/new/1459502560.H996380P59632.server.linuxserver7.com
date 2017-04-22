Return-path: <>
Envelope-to: ussdc531@server.linuxserver7.com
Delivery-date: Fri, 01 Apr 2016 13:52:40 +0430
Received: from mail by server.linuxserver7.com with local (Exim 4.86)
	id 1alvHs-000FVa-TI
	for ussdc531@server.linuxserver7.com; Fri, 01 Apr 2016 13:52:40 +0430
X-Failed-Recipients: poczta@blogownik.co.pl
Auto-Submitted: auto-replied
From: Mail Delivery System <Mailer-Daemon@server.linuxserver7.com>
To: ussdc531@server.linuxserver7.com
Content-Type: multipart/report; report-type=delivery-status; boundary=1459502560-eximdsn-1562015411
MIME-Version: 1.0
Subject: Mail delivery failed: returning message to sender
Message-Id: <E1alvHs-000FVa-TI@server.linuxserver7.com>
Date: Fri, 01 Apr 2016 13:52:40 +0430

--1459502560-eximdsn-1562015411
Content-type: text/plain; charset=us-ascii

This message was created automatically by mail delivery software.

A message that you sent could not be delivered to one or more of its
recipients. This is a permanent error. The following address(es) failed:

  poczta@blogownik.co.pl
    host mail.blogownik.co.pl [185.38.249.11]
    SMTP error from remote mail server after MAIL FROM:<ussdc531@server.linuxserver7.com> SIZE=2883:
    550-SPF: 79.175.168.10 is not allowed to send mail from
    550-server.linuxserver7.com: Please see http://www.openspf.org/Why?id=ussdc531%40server.linuxserver7.com&ip=79.175.168.10&receiver=roman.hostinghouse.pl
    550 : Reason: mechanism

--1459502560-eximdsn-1562015411
Content-type: message/delivery-status

Reporting-MTA: dns; server.linuxserver7.com

Action: failed
Final-Recipient: rfc822;poczta@blogownik.co.pl
Status: 5.0.0
Remote-MTA: dns; mail.blogownik.co.pl
Diagnostic-Code: smtp; 550-SPF: 79.175.168.10 is not allowed to send mail from
 550-server.linuxserver7.com: Please see http://www.openspf.org/Why?id=ussdc531%40server.linuxserver7.com&ip=79.175.168.10&receiver=roman.hostinghouse.pl
 550 : Reason: mechanism

--1459502560-eximdsn-1562015411
Content-type: message/rfc822

Return-path: <ussdc531@server.linuxserver7.com>
Received: from ussdc531 by server.linuxserver7.com with local (Exim 4.86)
	(envelope-from <ussdc531@server.linuxserver7.com>)
	id 1alvHp-000FSt-T7
	for poczta@blogownik.co.pl; Fri, 01 Apr 2016 13:52:37 +0430
To: poczta@blogownik.co.pl
Subject: =?utf-8?B?2YXYtNiu2LXYp9iqINit2LPYp9ioINqp2KfYsdio2LHbjCDYqNix2KfbjCBF?=  =?utf-8?B?dHRvcmUgMzUgU2tlZ25lc3Mg2K/YsSBTU0Qg2q/YsdmI2Ycg?=  =?utf-8?B?2YXYtNin2YjYsdin2YY=?=
X-PHP-Originating-Script: 1067:phpmailer.php
Date: Fri, 1 Apr 2016 09:22:37 +0000
From: "*www.ssd-cg.com*" <info@ssd-cg.com>
Reply-To: "*www.ssd-cg.com*" <info@ssd-cg.com>
Message-ID: <67500a6136550c28aa8eb4b7b754ee26@ssd-cg.com>
X-Priority: 3
X-Mailer: PHPMailer 5.2.1 (http://code.google.com/a/apache-extras.org/p/phpmailer/)
MIME-Version: 1.0
Content-Transfer-Encoding: 8bit
Content-Type: text/plain; charset="utf-8"
Sender:  <ussdc531@server.linuxserver7.com>

سلام Ettore 35 Skegness عزیز،

از اینکه در وب سایت SSD گروه مشاوران ثبت نام نموده اید متشکریم. حساب کاربری شما ایجاد شده است و تنها می باید توسط خود شما فعال گردد
To  شما با کلیک بر روی لینک زیر میتوانید حساب کاربری خود را فعال نمایید و یا میتوانید این آدرس را در آدرس بار مرورگرتان وارد نمایید
http://ssd-cg.com/index.php?option=com_users&task=registration.activate&token=9183d99a9b3de970c415fb8d24cf650c 

 پس از فعال سازی شما میتوانید به حساب کاربری خود با رمز و نام کاربری که در ادامه میاید به وب سایت  http://ssd-cg.com/ وارد شوید 

 نام کاربری و رمز عبور شما

نام کاربری : kamillaskowski78
رمز ورود : Laskowski87!


--1459502560-eximdsn-1562015411--
