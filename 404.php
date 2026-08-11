<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>صفحه پیدا نشد | UniYar</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;

            font-family:
                Tahoma,
                Arial,
                sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #f8fbff 0%,
                    #eef7f6 100%
                );

            color: #1f2937;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 30px;
        }


        .error-page {
            width: 100%;
            max-width: 850px;

            text-align: center;
        }


        /* =========================
           404 NUMBER
        ========================= */

        .error-number {
            font-size: clamp(120px, 22vw, 220px);

            line-height: 0.9;

            font-weight: 900;

            letter-spacing: -10px;

            color: #0d6efd;

            text-shadow:
                8px 8px 0 rgba(25, 135, 84, 0.12);

            user-select: none;
        }


        .error-number span {
            color: #198754;
        }


        /* =========================
           ICON
        ========================= */

        .error-icon {
            width: 82px;
            height: 82px;

            margin: 30px auto 22px;

            border-radius: 50%;

            background: rgba(25, 135, 84, 0.1);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 38px;

            color: #198754;
        }


        /* =========================
           CONTENT
        ========================= */

        h1 {
            font-size: clamp(24px, 4vw, 36px);

            font-weight: 800;

            margin-bottom: 14px;

            color: #172554;
        }


        .description {
            max-width: 580px;

            margin: 0 auto 30px;

            color: #64748b;

            font-size: 16px;

            line-height: 2;

        }


        /* =========================
           BUTTONS
        ========================= */

        .actions {
            display: flex;

            justify-content: center;

            align-items: center;

            gap: 12px;

            flex-wrap: wrap;
        }


        .btn {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-width: 150px;

            padding: 12px 24px;

            border-radius: 10px;

            text-decoration: none;

            font-size: 15px;

            font-weight: 700;

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }


        .btn-primary {
            background: #0d6efd;

            color: #fff;

            box-shadow:
                0 8px 20px rgba(13, 110, 253, 0.2);
        }


        .btn-primary:hover {
            background: #0b5ed7;

            transform: translateY(-2px);

            box-shadow:
                0 12px 25px rgba(13, 110, 253, 0.25);
        }


        .btn-secondary {
            background: #fff;

            color: #198754;

            border: 1px solid #dce9e4;
        }


        .btn-secondary:hover {
            background: #f0f8f5;

            transform: translateY(-2px);
        }


        /* =========================
           BRAND
        ========================= */

        .brand {
            margin-top: 55px;

            font-size: 20px;

            font-weight: 800;

            letter-spacing: 0;
        }


        .brand .uni {
            color: #ffffff;

            background: #0d6efd;

            padding: 4px 8px;

            border-radius: 6px;
        }


        .brand .yar {
            color: #198754;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 576px) {

            body {
                padding: 20px;
            }

            .error-number {
                letter-spacing: -5px;
            }

            .description {
                font-size: 14px;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                max-width: 280px;
            }

            .brand {
                margin-top: 40px;
            }
        }

    </style>

</head>


<body>

<main class="error-page">

    <div class="error-number">
        4<span>0</span>4
    </div>


    <div class="error-icon">
        ?
    </div>


    <h1>
        صفحه مورد نظر پیدا نشد
    </h1>


    <p class="description">
        متأسفیم، صفحه‌ای که به دنبال آن هستید وجود ندارد
        یا ممکن است آدرس آن تغییر کرده باشد.
        می‌توانید به صفحه اصلی برگردید و مسیر خود را ادامه دهید.
    </p>


    <div class="actions">

        <a href="/UniYar/admin/dashboard"
           class="btn btn-primary">
            بازگشت به داشبورد
        </a>


        <a href="/UniYar/"
           class="btn btn-secondary">
            صفحه اصلی
        </a>

    </div>


    <div class="brand">

        <span class="uni">Uni</span><span class="yar">Yar</span>

    </div>

</main>

</body>

</html>