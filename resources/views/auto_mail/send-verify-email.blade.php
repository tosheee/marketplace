<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<head></head>
<body style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #eaeaea; font-family: 'myriad pro', 'helvetica neue', 'helvetica', arial, sans-serif; margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; min-width: 100%; padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; width: 100%" bgcolor="#eaeaea">
<style type="text/css">
    a:hover { text-decoration: underline !important; }
    ></style>
<!--[if (gte mso 9)|(IE)]>
<table width="540" align="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td>
<![endif]-->
<div style="background-color: #eaeaea">
    <table align="center" cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%">

        <tr>
            <td width="100%" colspan="2"  align="center" valign="top" style="background-color: #CBD9E5; border-collapse: collapse; padding-bottom: 20px; padding-left: 10px; padding-right: 0px; padding-top: 20px">
                <div>
                    <a href="" style="color: #006699; text-decoration: none">
                        <img src="" width="188" style="-ms-interpolation-mode: bicubic; border-bottom-style: none; border-left-style: none; border-right-style: none; border-top-style: none; outline: none; text-decoration: none"></a>
                </div>
            </td>
        </tr>


        <tr>
            <td colspan="2" style="background-color: #ffffff; border-bottom-style: none; border-collapse: collapse; border-left-style: none; border-right-style: none; border-top-style: none; color: #333; font-family: 'myriad pro', 'helvetica neue', 'helvetica', arial, sans-serif; font-size: 14px; line-height: 1.5em; padding-bottom: 30px; padding-left: 30px; padding-right: 30px; padding-top: 40px; text-align: left; word-wrap: break-word" align="left" bgcolor="#ffffff">
                <h1>Hello, {{ $user->name }}</h1>

                <p style="margin-bottom: 1em; margin-left: 0; margin-right: 0; margin-top: 0">
                    Thanks for joining.
                    We're really excited to have you on board!
                    Before you get started, we'd appreciate if you'd take a moment to click the link below and verify your email:</p>

                <p style="margin-bottom: 1em; margin-left: 0; margin-right: 0; margin-top: 0">
                    <a href="{{ route('sendEmailDone', ["email" => $user->email, "verifyToken" => $user->verifyToken])}}" style="-webkit-text-size-adjust: none; background-color: #fec600; border-radius: 3px; color: #000000; display: inline-block; font-family: 'myriad pro','helvetica neue','helvetica',arial,sans-serif; font-size: 12px; font-weight: bold; letter-spacing: 1px; line-height: 40px; text-align: center; text-decoration: none; text-transform: uppercase; width: 220px">
                        Verify Email Address
                    </a>
                </p>

                <p style="margin-bottom: 1em; margin-left: 0; margin-right: 0; margin-top: 0">
                    or copy and paste url address to address bar {{ route('sendEmailDone', ["email" => $user->email, "verifyToken" => $user->verifyToken])}}
                </p>

                <p style="margin-bottom: 1em; margin-left: 0; margin-right: 0; margin-top: 0">
                    Feel free to reach out if you have any questions or if there's anything we can help with!
                </p>

                <p style="margin-bottom: 1em; margin-left: 0; margin-right: 0; margin-top: 0"></p>

                <p style="margin-bottom: 1em; margin-left: 0; margin-right: 0; margin-top: 0">Thanks!<br>
                    Team Marketplace
                </p>
            </td>
        </tr>

        <tr>
            <td colspan="2" align="center" style="border-collapse: collapse; border-top-color: #dcdcdc; border-top-style: solid; border-top-width: 1px; padding-bottom: 20px; padding-left: 10px; padding-right: 0px; padding-top: 20px">
                <p style="color: #999; font-family: 'myriad pro','helvetica neue','helvetica',arial,sans-serif; font-size: 12px; margin-bottom: .5em; margin-left: 0; margin-right: 0; margin-top: 0">Follow <a href="#" target="_blank" style="color: #666; text-decoration: none"></a></p>
                <p style="color: #999; font-family: 'myriad pro','helvetica neue','helvetica',arial,sans-serif; font-size: 12px; margin-bottom: .5em; margin-left: 0; margin-right: 0; margin-top: 0">&copy; Marketplace 2018</p>
            </td>
        </tr>

    </table>
</div>
<!--[if (gte mso 9)|(IE)]>
</td>
</tr>
</table>
<![endif]-->
<img src='' alt='' />
<img src="" alt="" width="1" height="1" border="0" style="height:1px !important;width:1px !important;border-width:0 !important;margin-top:0 !important;margin-bottom:0 !important;margin-right:0 !important;margin-left:0 !important;padding-top:0 !important;padding-bottom:0 !important;padding-right:0 !important;padding-left:0 !important;"/>
</body>
</html>

