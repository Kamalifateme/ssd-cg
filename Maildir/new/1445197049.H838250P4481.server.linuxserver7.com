Return-path: <>
Envelope-to: ussdc531@server.linuxserver7.com
Delivery-date: Sun, 18 Oct 2015 23:07:29 +0330
Received: from cp1.th.serverbkk.com ([27.254.140.250])
	by server.linuxserver7.com with esmtps (TLSv1.2:ECDHE-RSA-AES256-GCM-SHA384:256)
	(Exim 4.86)
	id 1Zntlp-00019u-Bv
	for ussdc531@server.linuxserver7.com; Sun, 18 Oct 2015 23:07:29 +0330
Received: from mailnull by cp1.th.serverbkk.com with local (Exim 4.86)
	id 1ZntiF-000mLX-Tp
	for ussdc531@server.linuxserver7.com; Mon, 19 Oct 2015 02:33:54 +0700
X-Failed-Recipients: admin@menherbalenhancement.com
Auto-Submitted: auto-replied
From: Mail Delivery System <Mailer-Daemon@cp1.th.serverbkk.com>
To: ussdc531@server.linuxserver7.com
Content-Type: multipart/report; report-type=delivery-status; boundary=1445196827-eximdsn-1071684337
MIME-Version: 1.0
Subject: Mail delivery failed: returning message to sender
Message-Id: <E1ZntiF-000mLX-Tp@cp1.th.serverbkk.com>
Date: Mon, 19 Oct 2015 02:33:47 +0700
X-OutGoing-Spam-Status: No, score=0.0
X-AntiAbuse: This header was added to track abuse, please include it with any abuse report
X-AntiAbuse: Primary Hostname - cp1.th.serverbkk.com
X-AntiAbuse: Original Domain - server.linuxserver7.com
X-AntiAbuse: Originator/Caller UID/GID - [47 12] / [47 12]
X-AntiAbuse: Sender Address Domain - 
X-Get-Message-Sender-Via: cp1.th.serverbkk.com: sender_ident via received_protocol == local: mailnull/primary_hostname/system user
X-Authenticated-Sender: cp1.th.serverbkk.com: mailnull
X-Source: 
X-Source-Args: 
X-Source-Dir: 

--1445196827-eximdsn-1071684337
Content-type: text/plain; charset=us-ascii

This message was created automatically by mail delivery software.

A message that you sent could not be delivered to one or more of its
recipients. This is a permanent error. The following address(es) failed:

  admin@menherbalenhancement.com
    (generated from elmaaikc3590@menherbalenhancement.com)
    mailbox is full: retry timeout exceeded

--1445196827-eximdsn-1071684337
Content-type: message/delivery-status

Reporting-MTA: dns; cp1.th.serverbkk.com

Action: failed
Final-Recipient: rfc822;admin@menherbalenhancement.com
Status: 5.0.0

--1445196827-eximdsn-1071684337
Content-type: message/rfc822

Return-path: <ussdc531@server.linuxserver7.com>
Received: from server.linuxserver7.com ([79.175.168.10]:51459)
	by cp1.th.serverbkk.com with esmtps (TLSv1.2:DHE-RSA-AES256-GCM-SHA384:256)
	(Exim 4.86)
	(envelope-from <ussdc531@server.linuxserver7.com>)
	id 1Znthn-000lvg-25
	for elmaaikc3590@menherbalenhancement.com; Mon, 19 Oct 2015 02:33:28 +0700
Received: from ussdc531 by server.linuxserver7.com with local (Exim 4.86)
	(envelope-from <ussdc531@server.linuxserver7.com>)
	id 1Zntjo-0000tL-0q
	for elmaaikc3590@menherbalenhancement.com; Sun, 18 Oct 2015 23:05:24 +0330
To: elmaaikc3590@menherbalenhancement.com
Subject: =?utf-8?B?2YXYtNiu2LXYp9iqINit2LPYp9ioINqp2KfYsdio2LHbjCDYqNix2KfbjCBF?=  =?utf-8?B?bG1hIExhZGQg2K/YsSBTU0Qg2q/YsdmI2Ycg2YXYtNin2YjYsdin2YY=?=
X-PHP-Originating-Script: 1067:phpmailer.php
Date: Sun, 18 Oct 2015 19:35:24 +0000
From: "*www.ssd-cg.com*" <info@ssd-cg.com>
Reply-To: "*www.ssd-cg.com*" <info@ssd-cg.com>
Message-ID: <60c5046f6da48305509a8bb0555d13b3@ssd-cg.com>
X-Priority: 3
X-Mailer: PHPMailer 5.2.1 (http://code.google.com/a/apache-extras.org/p/phpmailer/)
MIME-Version: 1.0
Content-Transfer-Encoding: 8bit
Content-Type: text/plain; charset="utf-8"
Sender:  <ussdc531@server.linuxserver7.com>
X-Spam-Status: No, score=-1.9
X-Spam-Score: -18
X-Spam-Bar: -
X-Ham-Report: Spam detection software, running on the system "cp1.th.serverbkk.com",
 has NOT identified this incoming email as spam.  The original
 message has been attached to this so you can view it or label
 similar future email.  If you have any questions, see
 root\@localhost for details.
 
 Content preview:  سلام Elma Ladd عزیز، از اینکه در وب سایت
    SSD گروه مشاوران ثبت نام نموده اید متشکریم.
    حساب کاربری شما ایجاد شده است و تنها می باید
    توسط خود شما فعال گردد To شما با کلیک بر روی
    لینک زیر میتوانید حساب کاربری خود را فعال
    نمایید و یا میتوانید این آدرس را در آدرس
   بار مرورگرتان وارد نمایید http://ssd-cg.com/index.php?option=com_users&task=registration.activate&token=04b9029a518d024b66ead9cd28a2048b
    [...] 
 
 Content analysis details:   (-1.9 points, 5.0 required)
 
  pts rule name              description
 ---- ---------------------- --------------------------------------------------
  0.0 URIBL_BLOCKED          ADMINISTRATOR NOTICE: The query to URIBL was blocked.
                             See
                             http://wiki.apache.org/spamassassin/DnsBlocklists#dnsbl-block
                              for more information.
                             [URIs: ssd-cg.com]
 -0.0 SPF_HELO_PASS          SPF: HELO matches SPF record
  0.0 HEADER_FROM_DIFFERENT_DOMAINS From and EnvelopeFrom 2nd level mail
                             domains are different
 -0.0 T_RP_MATCHES_RCVD      Envelope sender domain matches handover relay
                             domain
 -0.0 SPF_PASS               SPF: sender matches SPF record
 -1.9 BAYES_00               BODY: Bayes spam probability is 0 to 1%
                             [score: 0.0000]
X-Spam-Flag: NO

سلام Elma Ladd عزیز،

از اینکه در وب سایت SSD گروه مشاوران ثبت نام نموده اید متشکریم. حساب کاربری شما ایجاد شده است و تنها می باید توسط خود شما فعال گردد
To  شما با کلیک بر روی لینک زیر میتوانید حساب کاربری خود را فعال نمایید و یا میتوانید این آدرس را در آدرس بار مرورگرتان وارد نمایید
http://ssd-cg.com/index.php?option=com_users&task=registration.activate&token=04b9029a518d024b66ead9cd28a2048b 

 پس از فعال سازی شما میتوانید به حساب کاربری خود با رمز و نام کاربری که در ادامه میاید به وب سایت  http://ssd-cg.com/ وارد شوید 

 نام کاربری و رمز عبور شما

نام کاربری : elmaladd666117776
رمز ورود : XLhsH5Ji


--1445196827-eximdsn-1071684337--
