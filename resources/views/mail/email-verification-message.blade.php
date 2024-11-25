<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi E-mail</title>
    <style>
        /* Resetting basic styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7fafc; /* Light gray background */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .app {
            width: 100%;
            min-height: 100vh;
            background-color: #f7fafc;
            padding: 20px;
        }

        .mail__wrapper {
            max-width: 500px;
            width: 100%;
            margin: 0 auto;
        }

        .mail__content {
            background-color: white;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .content__header {
            text-align: center;
            border-bottom: 2px solid #eaeaea;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .content__header .text-blue { /* Changed class name and added color */
            color: #173F84; /* Blue color for POLARIS */
            font-size: 0.875rem;
            font-weight: bold;
        }

        .content__header h1 {
            font-size: 2rem;
            color: #333;
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .content__body {
            padding: 20px 0;
            border-bottom: 2px solid #eaeaea;
            text-align: center;
        }

        .content__body p {
            color: #4a5568;
            font-size: 1rem;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .content__body a {
            background-color: #FF7600; /* Orange color for the button */
            color: white;
            font-size: 1rem;
            font-weight: bold;
            padding: 15px;
            width: 100%;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .content__footer {
            margin-top: 30px;
            text-align: center;
        }

        .content__footer h3 {
            font-size: 1.125rem;
            color: #333;
            margin-bottom: 10px;
        }

        .content__footer p {
            color: #718096;
        }

        .mail__meta {
            margin-top: 30px;
            text-align: center;
            font-size: 0.875rem;
            color: #4a5568;
        }

        .meta__social {
            margin: 10px 0;
        }

        .meta__social a {
            background-color: #333;
            color: white;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            margin-right: 10px;
            text-decoration: none;
        }

        .meta__social a:hover {
            background-color: #2d3748;
        }

        .meta__help {
            margin-top: 20px;
        }

        .meta__help a {
            color: #3182ce;
            text-decoration: none;
        }

        .meta__help a:hover {
            text-decoration: underline;
        }

        /* Mobile responsiveness */
        @media (max-width: 600px) {
            .content__header h1 {
                font-size: 1.5rem;
            }

            .content__body a {
                padding: 12px;
            }

            .content__footer h3 {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <div class="app">

        <div class="mail__wrapper">

            <div class="mail__content">

                <!-- Header -->
                <div class="content__header">
                    <div class="text-blue">POLARIS</div> <!-- Changed class to text-blue -->
                    <h1><center>Konfirmasi E-mail</center></h1>
                </div>

                <!-- Body -->
                <div class="content__body">
                    <p>
                        Halo, <br><br> Terima kasih telah mendaftar di Polaris! Kami sangat senang Anda bergabung. Untuk melanjutkan, mohon konfirmasi e-mail Anda dengan mengklik tombol di bawah ini.
                    </p>
                    <!-- Email Confirmation Link -->
                    <a href="{{ $url }}">Konfirmasi E-mail</a>
                    <p class="text-sm">
                        <br>Semangat Selalu!<br> Tim Polaris
                    </p>
                </div>

                <!-- Footer -->
                <div class="content__footer">
                    <h3>Terima kasih telah menggunakan Polaris!</h3>
                </div>

            </div>

        </div>

    </div>

</body>
</html>
