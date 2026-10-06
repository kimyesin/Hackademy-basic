<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRAPE 고양이 웹 - 접근 불가</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: "Nanum Gothic", "Noto Sans KR", "Apple SD Gothic Neo", sans-serif;
            background: linear-gradient(160deg, #fff5f8 0%, #ffe4ec 100%);
            color: #5a4a50;
        }

        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px 20px;
        }

        .card {
            position: relative;
            width: 100%;
            max-width: 420px;
            padding: 48px 36px 36px;
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 12px 40px rgba(240, 160, 185, 0.25);
            text-align: center;
        }

        /* 카드 위 고양이 귀 */
        .card::before,
        .card::after {
            content: "";
            position: absolute;
            top: -26px;
            border-left: 30px solid transparent;
            border-right: 30px solid transparent;
            border-bottom: 44px solid #ffffff;
        }

        .card::before {
            left: 44px;
            transform: rotate(-18deg);
        }

        .card::after {
            right: 44px;
            transform: rotate(18deg);
        }

        .goback-img {
            display: block;
            max-width: 100%;
            max-height: 240px;
            margin: 0 auto 28px;
            border: 6px solid #ffdbe6;
            border-radius: 18px;
        }

        h1 {
            font-size: 22px;
            font-weight: 800;
            line-height: 1.5;
            color: #f08fab;
            margin-bottom: 28px;
        }

        .back {
            display: inline-block;
            padding: 12px 28px;
            font-size: 15px;
            font-weight: 700;
            color: #ffffff;
            text-decoration: none;
            background: #f5a3bb;
            border-radius: 999px;
            transition: background 0.2s;
        }

        .back:hover {
            background: #f08fab;
        }

        .paws {
            margin-top: 20px;
            font-size: 14px;
            letter-spacing: 8px;
            color: #ffd0de;
        }

        footer {
            padding: 16px;
            font-size: 13px;
            color: #b89aa4;
            text-align: center;
            background: #ffffff;
        }
    </style>
</head>
<body>

    <main>
        <div class="card">
            <h1>잘못된 접근입니다.<br>Invalid Access. go back.</h1>
            <img class="goback-img" src="https://i.kym-cdn.com/photos/images/original/001/592/177/28c.png" alt="꺼지셈">
            <a href="index.php" class="back">로그인하러 가기</a>
            <div class="paws">🐾 🐾 🐾</div>
        </div>
    </main>

    <footer>
        <p>&copy; This is Cat Webpage. All rights reserved.</p>
    </footer>

</body>
</html>
