<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>403 | Access Denied</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            margin: 0;
            background-color: #f4f6fb;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, sans-serif;
            color: #0a2540;
        }

        .container {
            text-align: center;
        }

        .error-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .error-number {
            font-size: 120px;
            font-weight: 800;
            color: #0a2540;
        }

        .gear-yellow {
            width: 110px;
            height: 110px;
            background: #facc15;
            border-radius: 50%;
            position: relative;
        }

        .gear-blue {
            width: 110px;
            height: 110px;
            background: #4f8f8b;
            border-radius: 50%;
            position: relative;
        }

        .message {
            font-size: 18px;
            margin-top: 10px;
            color: #0a2540;
        }

        .sub-message {
            font-size: 14px;
            color: #6b7280;
            margin-top: 8px;
        }

        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 10px 22px;
            background-color: #0a2540;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: #facc15;
            color: #0a2540;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="error-wrapper">
            <div class="error-number">4</div>

            <!-- Lock Icon -->
            <div class="gear-yellow" style="display:flex;justify-content:center;align-items:center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                    viewBox="0 0 16 16" color="#0a2540">
                    <path
                        d="M8 1a4 4 0 0 0-4 4v3h-.5A1.5 1.5 0 0 0 2 9.5v5A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-5A1.5 1.5 0 0 0 12.5 8H12V5a4 4 0 0 0-4-4zm-2 4a2 2 0 1 1 4 0v3H6V5z" />
                </svg>
            </div>         

            <div class="error-number">3</div>
        </div>


        <div class="message">
            دسترسی غیرمجاز
        </div>
        <div class="sub-message">
            شما اجازه دسترسی به این صفحه را ندارید
        </div>

    </div>

</body>

</html>
