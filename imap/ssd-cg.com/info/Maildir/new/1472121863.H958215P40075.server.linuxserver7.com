Return-path: <3Tcu-VwgTBKIPQ-TGRNaCEEQWPVU.IQQING.EQOKPHQUUF-EI.EQO@scoutcamp.bounces.google.com>
Envelope-to: info@ssd-cg.com
Delivery-date: Thu, 25 Aug 2016 15:14:23 +0430
Received: from mail-ua0-f197.google.com ([209.85.217.197])
	by server.linuxserver7.com with esmtps (TLSv1.2:ECDHE-RSA-AES128-GCM-SHA256:128)
	(Exim 4.86)
	(envelope-from <3Tcu-VwgTBKIPQ-TGRNaCEEQWPVU.IQQING.EQOKPHQUUF-EI.EQO@scoutcamp.bounces.google.com>)
	id 1bcs90-000APe-Q1
	for info@ssd-cg.com; Thu, 25 Aug 2016 15:14:23 +0430
Received: by mail-ua0-f197.google.com with SMTP id 65so85349715uay.1
        for <info@ssd-cg.com>; Thu, 25 Aug 2016 03:41:20 -0700 (PDT)
DKIM-Signature: v=1; a=rsa-sha256; c=relaxed/relaxed;
        d=google.com; s=20120113;
        h=mime-version:reply-to:feedback-id:date:message-id:subject:from:to;
        bh=wRuacyvO4LbSmbv4BC7ZKjtQvJQRqrvPNWW4gTSxaeI=;
        b=JENIKbXE7UuhQ7Sb6gx2/B4k1XX6T1wz9Axlo8UVM5GnFJPEzhA3TunIFGpnq7evov
         LQx+PqLTLfWv2ffmaFKEof9Ubs2zd9nDefXqB8RKLrQSZiFVq33Q4q8Uw8UnM+AacIXf
         IF32/NQAEwhZPovPgCmrkJM/egtR11THik283strlaLM+HBJhi35XxUzpqNtxPuA2me0
         UNMxpWU4RsH3v7Q61OIuf2jNPaT5amB7y6tTI2AeMd4DTQPmE/8JVzLuQPh31yDnrhdh
         nLWmis9KsjVjtEKSwYPEVB0SCDBKlh6lRfCKSOTdKTNdOuRLwNlSlA+IJbh+lvzuja/6
         pv5Q==
X-Google-DKIM-Signature: v=1; a=rsa-sha256; c=relaxed/relaxed;
        d=1e100.net; s=20130820;
        h=x-gm-message-state:mime-version:reply-to:feedback-id:date
         :message-id:subject:from:to;
        bh=wRuacyvO4LbSmbv4BC7ZKjtQvJQRqrvPNWW4gTSxaeI=;
        b=j8/10z067au2w818ErC9SfNf8URK9Q5HRaU4AGS7Bw6ibkGflY3bLHzEimN9KYdl/k
         xgavJ48mhcbwxNrcJIhOjd+YDJYSxKqfV8sWHJph9dHSPxkwlzxT8LHBfROXGZbOXn0J
         EowW9x6XsJ/uYvOOp46jTCtSpVkf5zg+8Gs4Z/+Y70zsXUmvDUdjjaWAcYSMS7hfxWJU
         G0yamrhIZ6Asxr5AVt9oGuFlsLYHUIYRMKGCL3F7BwM1hVpUkz/tN45h8dSNrYjfabqQ
         zAYDT38PBLlBehWReBk3TaB6v5JFZ7QK56OsaB3BNyeN40VzBtHH2Rlf7iAJD0cvF3H5
         a3UQ==
X-Gm-Message-State: AE9vXwNc14kVJYY0GFKlNJHcqsncESvN/jSMxxBjGASs0y6XNBE+F0mRl8rihbt9Oxekm80=
MIME-Version: 1.0
X-Received: by 10.129.46.68 with SMTP id u65mr6456039ywu.283.1472121677778;
 Thu, 25 Aug 2016 03:41:17 -0700 (PDT)
Reply-To: Google <no-reply@accounts.google.com>
X-Google-Id: SP#5018150466748416
Feedback-ID: 91-RECOVERY-anexp:rmd-control:account-notifier
Date: Thu, 25 Aug 2016 10:41:12 +0000 (UTC)
X-Account-Notification-Type: 91-RECOVERY-anexp:rmd-control
Message-ID: <b6d7947d26afc446.1472121676971.100054930.10009979.en.f62f3691b6434e3c@google.com>
Subject: New sign-in from iPhone
From: Google <no-reply@accounts.google.com>
To: info@ssd-cg.com
Content-Type: multipart/alternative; boundary=001a11407f9eab8faa053ae309fc

--001a11407f9eab8faa053ae309fc
Content-Type: text/plain; charset=UTF-8; format=flowed; delsp=yes
Content-Transfer-Encoding: base64

TmV3IHNpZ24taW4gZnJvbSBpUGhvbmUNCg0KDQoNCllvdSByZWNlaXZlZCB0aGlzIG1lc3NhZ2Ug
YmVjYXVzZSBpbmZvQHNzZC1jZy5jb20gaXMgbGlzdGVkIGFzIHRoZSByZWNvdmVyeQ0KZW1haWwg
Zm9yIHNzZC5jZy55YXpkQGdtYWlsLmNvbS4gSWYgc3NkLmNnLnlhemRAZ21haWwuY29tIGlzIG5v
dCB5b3VyDQpHb29nbGUgQWNjb3VudCwgY2xpY2sgaGVyZSB0byBkaXNjb25uZWN0DQo8aHR0cHM6
Ly9hY2NvdW50cy5nb29nbGUuY29tL0FjY291bnREaXNhdm93P2FkdD1BT1g4a2lwaVJaYVJZUHBj
YnM1WXNEM0o0WFcyY09EcHo0alppSDUtU0Uxby1vSFRYWFhBQWNtR1RPTT4NCmZyb20gdGhhdCBh
Y2NvdW50IGFuZCBzdG9wIHJlY2VpdmluZyBlbWFpbHMuDQoNCg0KDQpIaSBTU0QsDQpZb3VyIEdv
b2dsZSBBY2NvdW50IHNzZC5jZy55YXpkQGdtYWlsLmNvbSB3YXMganVzdCB1c2VkIHRvIHNpZ24g
aW4gb24gaVBob25lDQouDQoNClNTRCBjZw0Kc3NkLmNnLnlhemRAZ21haWwuY29tDQoNCmlQaG9u
ZQ0KVGh1cnNkYXksIEF1Z3VzdCAyNSwgMjAxNiAzOjExIFBNIChJcmFuIERheWxpZ2h0IFRpbWUp
DQpJcmFuKipEb24ndCByZWNvZ25pemUgdGhpcyBhY3Rpdml0eT8qDQpSZXZpZXcgeW91ciByZWNl
bnRseSB1c2VkIGRldmljZXMNCjxodHRwczovL2FjY291bnRzLmdvb2dsZS5jb20vQWNjb3VudENo
b29zZXI/RW1haWw9c3NkLmNnLnlhemRAZ21haWwuY29tJmNvbnRpbnVlPWh0dHBzOi8vc2VjdXJp
dHkuZ29vZ2xlLmNvbS9zZXR0aW5ncy9zZWN1cml0eS9hY3Rpdml0eS9udC8xNDcyMTIxNjcyMDAw
P3JmbiUzRDkxJTI2cmZuYyUzRDElMjZhc2FlJTNEMiUyNmFuZXhwJTNEcm1kLWNvbnRyb2w+DQpu
b3cuDQoNCldoeSBhcmUgd2Ugc2VuZGluZyB0aGlzPyBXZSB0YWtlIHNlY3VyaXR5IHZlcnkgc2Vy
aW91c2x5IGFuZCB3ZSB3YW50IHRvDQprZWVwIHlvdSBpbiB0aGUgbG9vcCBvbiBpbXBvcnRhbnQg
YWN0aW9ucyBpbiB5b3VyIGFjY291bnQuDQpXZSB3ZXJlIHVuYWJsZSB0byBkZXRlcm1pbmUgd2hl
dGhlciB5b3UgaGF2ZSB1c2VkIHRoaXMgYnJvd3NlciBvciBkZXZpY2UNCndpdGggeW91ciBhY2Nv
dW50IGJlZm9yZS4gVGhpcyBjYW4gaGFwcGVuIHdoZW4geW91IHNpZ24gaW4gZm9yIHRoZSBmaXJz
dA0KdGltZSBvbiBhIG5ldyBjb21wdXRlciwgcGhvbmUgb3IgYnJvd3Nlciwgd2hlbiB5b3UgdXNl
IHlvdXIgYnJvd3NlcidzDQppbmNvZ25pdG8gb3IgcHJpdmF0ZSBicm93c2luZyBtb2RlIG9yIGNs
ZWFyIHlvdXIgY29va2llcywgb3Igd2hlbiBzb21lYm9keQ0KZWxzZSBpcyBhY2Nlc3NpbmcgeW91
ciBhY2NvdW50Lg0KDQpCZXN0LA0KVGhlIEdvb2dsZSBBY2NvdW50cyB0ZWFtDQoNCg0KDQoqVGhl
IGxvY2F0aW9uIGlzIGFwcHJveGltYXRlIGFuZCBkZXRlcm1pbmVkIGJ5IHRoZSBJUCBhZGRyZXNz
IGl0IHdhcyBjb21pbmcNCmZyb20uDQoNClRoaXMgZW1haWwgY2FuJ3QgcmVjZWl2ZSByZXBsaWVz
LiBUbyBnaXZlIHVzIGZlZWRiYWNrIG9uIHRoaXMgYWxlcnQsIGNsaWNrDQpoZXJlDQo8aHR0cHM6
Ly9zdXBwb3J0Lmdvb2dsZS5jb20vYWNjb3VudHMvY29udGFjdC9kZXZpY2VfYWxlcnRfZmVlZGJh
Y2s/aGw9ZW4+Lg0KRm9yIG1vcmUgaW5mb3JtYXRpb24sIHZpc2l0IHRoZSBHb29nbGUgQWNjb3Vu
dHMgSGVscCBDZW50ZXINCjxodHRwczovL3N1cHBvcnQuZ29vZ2xlLmNvbS9hY2NvdW50cy9hbnN3
ZXIvMjczMzIwMz4uDQoNCg0KDQpZb3UgcmVjZWl2ZWQgdGhpcyBtYW5kYXRvcnkgZW1haWwgc2Vy
dmljZSBhbm5vdW5jZW1lbnQgdG8gdXBkYXRlIHlvdSBhYm91dA0KaW1wb3J0YW50IGNoYW5nZXMg
dG8geW91ciBHb29nbGUgcHJvZHVjdCBvciBhY2NvdW50Lg0KwqkgMjAxNiBHb29nbGUgSW5jLiwg
MTYwMCBBbXBoaXRoZWF0cmUgUGFya3dheSwgTW91bnRhaW4gVmlldywgQ0EgOTQwNDMsIFVTQQ0K
--001a11407f9eab8faa053ae309fc
Content-Type: text/html; charset=UTF-8
Content-Transfer-Encoding: quoted-printable

<html lang=3D"en"><head><meta name=3D"format-detection" content=3D"date=3Dn=
o"><meta name=3D"format-detection" content=3D"email=3Dno"></head><body styl=
e=3D"margin: 0; padding: 0;" bgcolor=3D"#FFFFFF"><table width=3D"100%" heig=
ht=3D"100%" style=3D"min-width: 348px;" border=3D"0" cellspacing=3D"0" cell=
padding=3D"0"><tr height=3D"32px"></tr><tr align=3D"center"><td width=3D"32=
px"></td><td><table border=3D"0" cellspacing=3D"0" cellpadding=3D"0" style=
=3D"max-width: 600px;"><tr><td><table width=3D"100%" border=3D"0" cellspaci=
ng=3D"0" cellpadding=3D"0"><tr><td align=3D"left"><img width=3D"92" height=
=3D"32" src=3D"https://www.gstatic.com/accountalerts/email/googlelogo_color=
_188x64dp.png" style=3D"display: block; width: 92px; height: 32px;"></td><t=
d align=3D"right"><img width=3D"32" height=3D"32" style=3D"display: block; =
width: 32px; height: 32px;" src=3D"https://www.gstatic.com/accountalerts/em=
ail/keyhole.png"></td></tr></table></td></tr><tr height=3D"16"></tr><tr><td=
><table bgcolor=3D"#4184F3" width=3D"100%" border=3D"0" cellspacing=3D"0" c=
ellpadding=3D"0" style=3D"min-width: 332px; max-width: 600px; border: 1px s=
olid #E0E0E0; border-bottom: 0; border-top-left-radius: 3px; border-top-rig=
ht-radius: 3px;"><tr><td height=3D"72px" colspan=3D"3"></td></tr><tr><td wi=
dth=3D"32px"></td><td style=3D"font-family: Roboto-Regular,Helvetica,Arial,=
sans-serif; font-size: 24px; color: #FFFFFF; line-height: 1.25;">New sign-i=
n from iPhone</td><td width=3D"32px"></td></tr><tr><td height=3D"18px" cols=
pan=3D"3"></td></tr></table></td></tr><tr><td><table bgcolor=3D"#FFFFFF" wi=
dth=3D"100%" border=3D"0" cellspacing=3D"0" cellpadding=3D"0" style=3D"min-=
width: 332px; max-width: 600px; border: 1px solid #F0F0F0; border-top: 0;">=
<tr><td height=3D"18px" colspan=3D"3"></td></tr><tr><td width=3D"32px"></td=
><td style=3D"font-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-=
size: 13px; color: #202020; line-height: 1.5;">You received this message be=
cause <a>info@ssd-cg.com</a> is listed as the recovery email for <a>ssd.cg.=
yazd@gmail.com</a>. If <a>ssd.cg.yazd@gmail.com</a> is not your Google Acco=
unt, <a href=3D"https://www.google.com/appserve/mkt/p/Y7dOnleeQjPMx1sUn9VX3=
bb7SScrJ_TmSgLa0dWFYfhJXjIfDQJkK3dNp_6ckIlqUbhpMp3u1GqOeUF7J1xfvFeplnM2cCNU=
sns8NorP1oil7l1aB80ULFD9wicq2YnTlG4B969PmiOiw9l0v2bvDlkVY1_qQf9T9Apq7qMMEUZ=
A0fo=3D" style=3D"text-decoration: none; color: #4285F4;" target=3D"_blank"=
>click here to disconnect</a> from that account and stop receiving emails.<=
/td><td width=3D"10px"></td></tr><tr><td height=3D"18px" colspan=3D"3"></td=
></tr></table></td></tr><tr><td><table bgcolor=3D"#FAFAFA" width=3D"100%" b=
order=3D"0" cellspacing=3D"0" cellpadding=3D"0" style=3D"min-width: 332px; =
max-width: 600px; border: 1px solid #F0F0F0; border-bottom: 1px solid #C0C0=
C0; border-top: 0; border-bottom-left-radius: 3px; border-bottom-right-radi=
us: 3px;"><tr height=3D"16px"><td width=3D"32px" rowspan=3D"3"></td><td></t=
d><td width=3D"32px" rowspan=3D"3"></td></tr><tr><td><table style=3D"min-wi=
dth: 300px;" border=3D"0" cellspacing=3D"0" cellpadding=3D"0"><tr><td style=
=3D"font-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-size: 13px=
; color: #202020; line-height: 1.5;">Hi SSD,</td></tr><tr><td style=3D"font=
-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-size: 13px; color:=
 #202020; line-height: 1.5;">Your Google Account ssd.cg.yazd@gmail.com was =
just used to sign in on <span style=3D"white-space:nowrap;">iPhone</span>.<=
table border=3D"0" cellspacing=3D"0" cellpadding=3D"0" style=3D"margin-top:=
 48px; margin-bottom: 48px;"><tr valign=3D"middle"><td width=3D"32px"></td>=
<td align=3D"center"><img src=3D"https://www.gstatic.com/accountalerts/emai=
l/anonymous_profile_photo.png" width=3D"48px" height=3D"48px" style=3D"widt=
h: 48px; height: 48px; display: block; border-radius: 50%;"></td><td width=
=3D"16px"></td><td style=3D"line-height: 1.2;"><span style=3D"font-family: =
Roboto-Regular,Helvetica,Arial,sans-serif;font-size: 20px; color: #202020;"=
>SSD cg</span><br><span style=3D"font-family: Roboto-Regular,Helvetica,Aria=
l,sans-serif;font-size: 13px; color: #727272;">ssd.cg.yazd@gmail.com</span>=
</td></tr><tr valign=3D"middle"><td width=3D"32px" height=3D"24px"></td><td=
 align=3D"center" height=3D"24px"><img src=3D"https://www.gstatic.com/accou=
ntalerts/email/down_arrow.png" width=3D"4px" height=3D"10px" style=3D"width=
: 4px; height: 10px; display: block; "></td></tr><tr valign=3D"top"><td wid=
th=3D"32px"></td><td align=3D"center"><img src=3D"https://www.gstatic.com/a=
ccountalerts/devices/iphone_wallpaper_big.png" width=3D"48px" height=3D"48p=
x" style=3D"width: 48px; height: 48px; display: block; "></td><td width=3D"=
16px"></td><td style=3D"line-height: 1.2;"><span style=3D"font-family: Robo=
to-Regular,Helvetica,Arial,sans-serif; font-size: 16px; color: #202020;">iP=
hone</span><br><span style=3D"font-family: Roboto-Regular,Helvetica,Arial,s=
ans-serif; font-size: 13px; color: #727272;">Thursday, August 25, 2016 3:11=
 PM (Iran Daylight Time)<br>Iran*</span></td></tr></table><b>Don&#39;t reco=
gnize this activity?</b><br>Review your <a href=3D"https://www.google.com/a=
ppserve/mkt/p/1CAUb9mcPJihE9PwhnmnOqePCeMxxK8QAPMWwi24ODJ6y06F95q8zsZge9OHH=
wpf6PMrldOoQ7PCCYXoohUwF1kJ9ClVzps-NxiA06UDAiSJtbNBAJ3bSaZMbq_FzpWuX6CnelBu=
KAOtiTQ43EsSB2LHPJOS8KDSz12DVuwnbEB2XioAzQKhESL0mQ_onK5gjRj3B8W_2_oj0XIzCLH=
WdHyM7Fs0evwZmOE8jwQvmc_oz-xOTqgC-qCVk3LQO3mEWqN5LI3LgJ2ckcCyvMCMovGr2QIZwA=
kjuxztmSQxCsh8FxcL3oxLoX0eUea7" style=3D"text-decoration: none; color: #428=
5F4;" target=3D"_blank">recently used devices</a> now.<br><br>Why are we se=
nding this? We take security very seriously and we want to keep you in the =
loop on important actions in your account.<br>We were unable to determine w=
hether you have used this browser or device with your account before. This =
can happen when you sign in for the first time on a new computer, phone or =
browser, when you use your browser&#39;s incognito or private browsing mode=
 or clear your cookies, or when somebody else is accessing your account.</t=
d></tr><tr height=3D"32px"></tr><tr><td style=3D"font-family: Roboto-Regula=
r,Helvetica,Arial,sans-serif; font-size: 13px; color: #202020; line-height:=
 1.5;">Best,<br>The Google Accounts team</td></tr><tr height=3D"16px"></tr>=
<tr><td><table style=3D"font-family: Roboto-Regular,Helvetica,Arial,sans-se=
rif; font-size: 12px; color: #B9B9B9; line-height: 1.5;"><tr><td>*The locat=
ion is approximate and determined by the IP address it was coming from.<br>=
</td></tr><tr><td>This email can&#39;t receive replies. To give us feedback=
 on this alert, <a href=3D"https://www.google.com/appserve/mkt/p/QGV0FKkHV-=
klm4tQxvhJiymocguilt11UMBFHU572ybwlAucYmveKMiv4HjRkuC3uf-BbmyHzsvK-ejRQozMI=
wcCpJLJeA08vzrgAH3zKdpr3Opz6syksFgLsXsrHqbCBw=3D=3D" style=3D"text-decorati=
on: none; color: #4285F4;" target=3D"_blank">click here</a>.<br>For more in=
formation, visit the <a href=3D"https://www.google.com/appserve/mkt/p/TVbvJ=
DIGuCjg3bQeXPV36c2G-10pR5ww3VKITtudmrf-BzCe9bNHgm43MiQ1CY3YitvWIQxLdkzTvZFe=
KW1MC5xhXcay5dkl" style=3D"text-decoration: none; color: #4285F4;" target=
=3D"_blank">Google Accounts Help Center</a>.</td></tr></table></td></tr></t=
able></td></tr><tr height=3D"32px"></tr></table></td></tr><tr height=3D"16"=
></tr><tr><td style=3D"max-width: 600px; font-family: Roboto-Regular,Helvet=
ica,Arial,sans-serif; font-size: 10px; color: #BCBCBC; line-height: 1.5;"><=
tr><td><table style=3D"font-family: Roboto-Regular,Helvetica,Arial,sans-ser=
if; font-size: 10px; color: #666666; line-height: 18px; padding-bottom: 10p=
x"><tr><td>You received this mandatory email service announcement to update=
 you about important changes to your Google product or account.</td></tr><t=
r><td><div style=3D"direction: ltr; text-align: left">=C2=A9 2016 Google In=
c., 1600 Amphitheatre Parkway, Mountain View, CA 94043, USA</div></td></tr>=
</table></td></tr></td></tr></table></td><td width=3D"32px"></td></tr><tr h=
eight=3D"32px"></tr></table><img height=3D"1" width=3D"3" src=3D"https://ww=
w.google.com/appserve/mkt/img/1pFtOrp5rP7xMe4DgI_FpXhttt0=3D.gif"></body></=
html>
--001a11407f9eab8faa053ae309fc--
