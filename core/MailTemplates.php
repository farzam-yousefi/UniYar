<?php

class MailTemplates
{
    public static function adminReply(
        string $fullName,
        string $message
    ): string {

        $fullName = htmlspecialchars(
            $fullName,
            ENT_QUOTES,
            'UTF-8'
        );

        $message = nl2br(
            htmlspecialchars(
                $message,
                ENT_QUOTES,
                'UTF-8'
            )
        );

        return <<<HTML
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پاسخ UniYar</title>
</head>

<body style="
    margin:0;
    padding:0;
    background-color:#f4f7fa;
    font-family:Tahoma, Arial, sans-serif;
    direction:rtl;
">

<table
    width="100%"
    cellpadding="0"
    cellspacing="0"
    border="0"
    style="background-color:#f4f7fa; padding:30px 15px;"
>
    <tr>
        <td align="center">

            <table
                width="600"
                cellpadding="0"
                cellspacing="0"
                border="0"
                style="
                    max-width:600px;
                    width:100%;
                    background:#ffffff;
                    border-radius:16px;
                    overflow:hidden;
                "
            >

                <!-- Header -->
                <tr>
                    <td style="
                        background:#17335C;
                        padding:25px 30px;
                        text-align:center;
                    ">

                        <div style="
                            color:#ffffff;
                            font-size:26px;
                            font-weight:bold;
                        ">
                            UniYar
                        </div>

                        <div style="
                            color:#dce7f5;
                            font-size:13px;
                            margin-top:8px;
                        ">
                            همراه آموزشی شما
                        </div>

                    </td>
                </tr>


                <!-- Content -->
                <tr>
                    <td style="
                        padding:35px 30px;
                        color:#333333;
                        line-height:2;
                    ">

                        <p style="
                            margin:0 0 20px;
                            font-size:16px;
                        ">
                            سلام {$fullName} عزیز،
                        </p>

                        <p style="
                            margin:0 0 20px;
                            font-size:15px;
                        ">
                            پاسخ درخواست شما توسط تیم UniYar ارسال شده است:
                        </p>


                        <!-- Message -->
                        <div style="
                            background:#f5f8fb;
                            border-right:4px solid #0EA47A;
                            padding:18px 20px;
                            margin:25px 0;
                            border-radius:8px;
                            color:#333333;
                            font-size:15px;
                            line-height:2;
                        ">
                            {$message}
                        </div>


                        <p style="
                            margin:25px 0 0;
                            font-size:14px;
                            color:#666666;
                        ">
                            در صورت داشتن سؤال یا نیاز به راهنمایی بیشتر،
                            می‌توانید با ما در ارتباط باشید.
                        </p>

                    </td>
                </tr>


                <!-- Footer -->
                <tr>
                    <td style="
                        background:#f5f7fa;
                        padding:20px 30px;
                        text-align:center;
                        color:#777777;
                        font-size:12px;
                        line-height:1.8;
                    ">

                        <div>
                            UniYar
                        </div>

                        <div>
                            هر درخواست، یک راه حل تخصصی
                        </div>

                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
HTML;
    }
}