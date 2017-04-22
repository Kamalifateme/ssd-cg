Return-path: <>
Envelope-to: ussdc531@server.linuxserver7.com
Delivery-date: Mon, 25 Apr 2016 02:56:26 +0430
Received: from mail by server.linuxserver7.com with local (Exim 4.86)
	id 1auSTy-000793-Fy
	for ussdc531@server.linuxserver7.com; Mon, 25 Apr 2016 02:56:26 +0430
X-Failed-Recipients: zn5@llaen.net
Auto-Submitted: auto-replied
From: Mail Delivery System <Mailer-Daemon@server.linuxserver7.com>
To: ussdc531@server.linuxserver7.com
Content-Type: multipart/report; report-type=delivery-status; boundary=1461536786-eximdsn-1464271097
MIME-Version: 1.0
Subject: Mail delivery failed: returning message to sender
Message-Id: <E1auSTy-000793-Fy@server.linuxserver7.com>
Date: Mon, 25 Apr 2016 02:56:26 +0430

--1461536786-eximdsn-1464271097
Content-type: text/plain; charset=us-ascii

This message was created automatically by mail delivery software.

A message that you sent could not be delivered to one or more of its
recipients. This is a permanent error. The following address(es) failed:

  zn5@llaen.net
    host llaen.net [188.165.16.236]
    SMTP error from remote mail server after MAIL FROM:<ussdc531@server.linuxserver7.com> SIZE=2855:
    550-SPF: 79.175.168.10 is not allowed to send mail from
    550-server.linuxserver7.com: Please see http://www.openspf.org/Why?id=ussdc531%40server.linuxserver7.com&ip=79.175.168.10&receiver=cloud.noodly.pl
    550 : Reason: mechanism

--1461536786-eximdsn-1464271097
Content-type: message/delivery-status

Reporting-MTA: dns; server.linuxserver7.com

Action: failed
Final-Recipient: rfc822;zn5@llaen.net
Status: 5.0.0
Remote-MTA: dns; llaen.net
Diagnostic-Code: smtp; 550-SPF: 79.175.168.10 is not allowed to send mail from
 550-server.linuxserver7.com: Please see http://www.openspf.org/Why?id=ussdc531%40server.linuxserver7.com&ip=79.175.168.10&receiver=cloud.noodly.pl
 550 : Reason: mechanism

--1461536786-eximdsn-1464271097
Content-type: message/rfc822

Return-path: <ussdc531@server.linuxserver7.com>
Received: from ussdc531 by server.linuxserver7.com with local (Exim 4.86)
	(envelope-from <ussdc531@server.linuxserver7.com>)
	id 1auSTp-00076E-1y
	for zn5@llaen.net; Mon, 25 Apr 2016 02:56:17 +0430
To: zn5@llaen.net
Subject: =?utf-8?B?2YXYtNiu2LXYp9iqINit2LPYp9ioINqp2KfYsdio2LHbjCDYqNix2KfbjCBO?=  =?utf-8?B?aWdlbCBDbGV2ZW5nZXIg2K/YsSBTU0Qg2q/YsdmI2Ycg2YXYtNin?=  =?utf-8?B?2YjYsdin2YY=?=
X-PHP-Originating-Script: 1067:phpmailer.php
Date: Sun, 24 Apr 2016 22:26:17 +0000
From: "*www.ssd-cg.com*" <info@ssd-cg.com>
Reply-To: "*www.ssd-cg.com*" <info@ssd-cg.com>
Message-ID: <a9a6663225d7821bf64c680263024c5c@ssd-cg.com>
X-Priority: 3
X-Mailer: PHPMailer 5.2.1 (http://code.google.com/a/apache-extras.org/p/phpmailer/)
MIME-Version: 1.0
Content-Transfer-Encoding: 8bit
Content-Type: text/plain; charset="utf-8"
Sender:  <ussdc531@server.linuxserver7.com>

سلام Nigel Clevenger عزیز،

از اینکه در وب سایت SSD گروه مشاوران ثبت نام نموده اید متشکریم. حساب کاربری شما ایجاد شده است و تنها می باید توسط خود شما فعال گردد
To  شما با کلیک بر روی لینک زیر میتوانید حساب کاربری خود را فعال نمایید و یا میتوانید این آدرس را در آدرس بار مرورگرتان وارد نمایید
http://ssd-cg.com/index.php?option=com_users&task=registration.activate&token=c6dd4282cf225f237b95a188b80010b1 

 پس از فعال سازی شما میتوانید به حساب کاربری خود با رمز و نام کاربری که در ادامه میاید به وب سایت  http://ssd-cg.com/ وارد شوید 

 نام کاربری و رمز عبور شما

نام کاربری : nigelclevenger7
رمز ورود : ya8W63WCV


--1461536786-eximdsn-1464271097--
