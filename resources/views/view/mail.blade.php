<head>
    <title>Rating Reminder</title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width" name="viewport">
    <style>
        @font-face {
            font-family: 'Postmates Std';
            font-weight: 600;
            font-style: normal;
            src: local('Postmates Std Bold'),
            url(https://s3-us-west-1.amazonaws.com/buyer-static.postmates.com/assets/email/postmates-std-bold.woff) format('woff');
        }

        @font-face {
            font-family: 'Postmates Std';
            font-weight: 500;
            font-style: normal;
            src: local('Postmates Std Medium'),
            url(https://s3-us-west-1.amazonaws.com/buyer-static.postmates.com/assets/email/postmates-std-medium.woff) format('woff');
        }

        @font-face {
            font-family: 'Postmates Std';
            font-weight: 400;
            font-style: normal;
            src: local('Postmates Std Regular'),
            url(https://s3-us-west-1.amazonaws.com/buyer-static.postmates.com/assets/email/postmates-std-regular.woff) format('woff');
        }
    </style>
    <style media="screen and (max-width: 680px)">
        @media screen and (max-width: 680px) {
            .page-center {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }

            .footer-center {
                padding-left: 20px !important;
                padding-right: 20px !important;
            }
        }
    </style>
</head>
<body style="background-color: #f4f4f5;">
<table cellpadding="0" cellspacing="0" style="width: 100%; height: 100%; background-color: #f4f4f5;
		text-align: center;">
    <tbody>
    <tr>
        <td style="text-align: center;">
            <table align="center" cellpadding="0" cellspacing="0" id="body" style="background-color: #fff;
						width: 100%; max-width: 680px; height: 100%;">
                <tbody>
                <tr>
                    <td>
                        <table align="center" cellpadding="0" cellspacing="0" class="page-center" style="text-align: left;
										padding-bottom: 88px; width: 100%; padding-left: 120px; padding-right: 120px;">
                            <tbody>
                            <tr>
                                <td style="padding-top: 24px;">
                                    <img src="{{ url('/public/images/friendzone.png') }}" style="width: 206px;">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding-top: 72px; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;
													-webkit-text-size-adjust: 100%; color: #000000; font-family: 'Postmates Std', 'Helvetica', -apple-system,
													BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans',
													'Helvetica Neue', sans-serif; font-size: 48px; font-smoothing: always; font-style: normal; font-weight: 600;
													letter-spacing: -2.6px; line-height: 52px; mso-line-height-rule: exactly;
													text-decoration: none;">Zresetuj hasło
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding-top: 16px; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: 100%; color: #454545; font-family: 'Postmates Std', 'Helvetica', -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans',
													'Helvetica Neue', sans-serif; font-size: 20px; font-smoothing: always; font-style: normal; font-weight: 600;
													letter-spacing: 0px; line-height: 26px; mso-line-height-rule: exactly;
													text-decoration: none;">Token:<br> {{ $binToken }}
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 48px; padding-bottom: 48px;">
                                    <table border-collapse="collapse" style="width: 100%">
                                        <tbody>
                                        <tr>
                                            <td style="width: 100%; height: 2px; max-height: 2px; background-color: #d9dbe0;"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="-ms-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;
													-webkit-text-size-adjust: 100%; color: #9095a2; font-family: 'Postmates Std', 'Helvetica', -apple-system,
													BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans',
													'Helvetica Neue', sans-serif; font-size: 16px; font-smoothing: always; font-style: normal; font-weight: 400;
													letter-spacing: -0.18px; line-height: 24px; mso-line-height-rule: exactly; text-decoration: none;
													vertical-align: top; width: 100%;">
                                    Otrzymujesz tę wiadomość e-mail, ponieważ poprosiłeś/aś o zresetowanie hasła do
                                    swojego konta FriendZone.heroku.com
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 24px; -ms-text-size-adjust: 100%; -ms-text-size-adjust: 100%;
													-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: 100%; color: #9095a2;
													font-family: 'Postmates Std', 'Helvetica', -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen',
													'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif; font-size: 16px;
													font-smoothing: always; font-style: normal; font-weight: 400; letter-spacing: -0.18px; line-height: 24px;
													mso-line-height-rule: exactly; text-decoration: none; vertical-align: top; width: 100%;">
                                    Kliknij poniższy przycisk aby zresetować hasło.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a data-click-track-id="37" href="{{ $url }}" style="margin-top: 36px;
														-ms-text-size-adjust: 100%;
														-ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;
														-webkit-text-size-adjust: 100%; color: #ffffff;
														font-family: 'Postmates Std', 'Helvetica', -apple-system, BlinkMacSystemFont,
														'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans',
														'Helvetica Neue', sans-serif; font-size: 12px;
														font-smoothing: always; font-style: normal; font-weight: 600; letter-spacing: 0.7px;
														line-height: 48px;
														mso-line-height-rule: exactly; text-decoration: none; vertical-align: top; width:
														220px; background-color: #00cc99;
														border-radius: 28px; display: block; text-align: center; text-transform: uppercase"
                                       target="_blank">
                                        Zresetuj hasło
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 24px; -ms-text-size-adjust: 100%; -ms-text-size-adjust: 100%;
													-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: 100%; color: #9095a2;
													font-family: 'Postmates Std', 'Helvetica', -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen',
													'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif; font-size: 12px;
													font-smoothing: always; font-style: normal; font-weight: 400; letter-spacing: -0.18px; line-height: 24px;
													mso-line-height-rule: exactly; text-decoration: none; vertical-align: top; width: 100%;">
                                    Kopiowalny link:<br>
                                    {{ $url }}
                                    <br> Ten link wygaśnie po 24h
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 24px; -ms-text-size-adjust: 100%; -ms-text-size-adjust: 100%;
													-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: 100%; color: #9095a2;
													font-family: 'Postmates Std', 'Helvetica', -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen',
													'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif; font-size: 12px;
													font-smoothing: always; font-style: normal; font-weight: 400; letter-spacing: -0.18px; line-height: 24px;
													mso-line-height-rule: exactly; text-decoration: none; vertical-align: top; width: 100%;">
                                    Jeżeli to nie ty prosiłeś/aś o zmianę hasła, możesz zignorować link lub dać nam znać
                                    na e-mail admin@friendzoneapp.heroku.com.
                                    Twoje hasło nie zmieni się dopóki nie wprowadzisz nowego hasła.
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <table align="center" cellpadding="0" cellspacing="0" id="footer2" style="background-color: #000;
						width: 100%; max-width: 680px; height: 100%;">
                <tbody>
                <tr>
                    <td>
                        <table align="center" cellpadding="0" cellspacing="0" class="footer-center" style=" text-align: left;
										width: 100%; padding-left: 120px; padding-right: 120px;">
                            <tbody>
                            <tr>
                                <td colspan="2" style="padding-top: 72px; padding-bottom: 24px; width: 100%;">
                                    <img src="{{ url('/public/images/friendzone.png') }}"
                                         style="width: 124px; height: 45px">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding-top: 24px; padding-bottom: 48px;">
                                    <table cellpadding="0" cellspacing="0" style="width: 100%">
                                        <tbody>
                                        <tr>
                                            <td style="width: 100%; height: 1px; max-height: 1px; background-color: #EAECF2; opacity: 0.19"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="-ms-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;
													-webkit-text-size-adjust: 100%; color: #9095A2; font-family: 'Postmates Std', 'Helvetica', -apple-system,
													BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans',
													'Helvetica Neue', sans-serif; font-size: 15px; font-smoothing: always; font-style: normal; font-weight: 400;
													letter-spacing: 0; line-height: 24px; mso-line-height-rule: exactly; text-decoration: none; vertical-align: top;
													width: 100%;">
                                    Jeśli masz jakieś pytania bądź wątpliwość, służymy pomocą. Skontaktuj się z nami na
                                    adress e-mail admin@friendzoneapp.heroku.com
                                </td>
                            </tr>
                            <tr>
                                <td style="height: 72px;"></td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>
