<?php
session_save_path('./');
session_start();

$loginSuccess = false;
if (isset($_SESSION['user']) && $_SESSION['user'] == 'grape') {
    $loginSuccess = true;
} else {
    header("Location: goback.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>grape cat web</title>

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

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 28px;
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(240, 160, 185, 0.18);
        }

        header h1 {
            font-size: 22px;
            font-weight: 800;
            color: #f08fab;
        }

        .logout {
            padding: 9px 18px;
            font-size: 14px;
            font-weight: 700;
            color: #f08fab;
            text-decoration: none;
            background: #fff0f4;
            border: 2px solid #ffdbe6;
            border-radius: 999px;
            transition: background 0.2s, color 0.2s;
        }

        .logout:hover {
            color: #ffffff;
            background: #f5a3bb;
            border-color: #f5a3bb;
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

        .greeting {
            font-size: 20px;
            font-weight: 800;
            line-height: 1.5;
            color: #c97b93;
            margin-bottom: 28px;
        }

        .greeting span {
            color: #f08fab;
        }

        .cat-photo {
            width: 180px;
            height: 180px;
            margin: 0 auto 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 96px;
            background: #fff0f4;
            border: 6px solid #ffdbe6;
            border-radius: 50%;
            animation: bounce 2.4s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .cat-name {
            display: inline-block;
            padding: 6px 16px;
            margin-bottom: 28px;
            font-size: 15px;
            font-weight: 700;
            color: #ffffff;
            background: #f5a3bb;
            border-radius: 999px;
        }

        .info {
            list-style: none;
            text-align: left;
        }

        .info li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 18px;
            margin-bottom: 10px;
            font-size: 15px;
            background: #fff8fa;
            border: 2px solid #ffdbe6;
            border-radius: 14px;
        }

        .info .label {
            font-weight: 700;
            color: #c97b93;
        }

        .info .value {
            color: #5a4a50;
            letter-spacing: 0.5px;
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

        .cat-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .success {
            display: inline-block;
            padding: 5px 14px;
            margin-bottom: 14px;
            font-size: 13px;
            font-weight: 700;
            color: #f08fab;
            background: #fff0f4;
            border-radius: 999px;
        }
    </style>
</head>
<body>

    <header>
        <h1>🐱 개인 페이지</h1>
        <a href="logout.php" class="logout">Logout</a>
    </header>

    <main>
        <div class="card">
            <?php if ($loginSuccess) echo '<p class="success">login success!</p>'; ?>
            <h2 class="greeting">안녕하세요<br><span>grape 의 개인페이지</span>입니다.</h2>

            <div class="cat-photo"><img src="https://img.segye.com/content/image/2017/08/30/20170830515039.jpg" alt="포도 사진"></div>
            <h3 class="cat-name">&lt;나의 사진&gt;</h3>

            <ul class="info">
                <li>
                    <span class="label">📞 전화번호</span>
                    <span class="value">010-XXXX-XXXX</span>
                </li>
                <li>
                    <span class="label">💳 계좌번호</span>
                    <span class="value">고양이은행 MMM-MMM-MMM</span>
                </li>
            </ul>

            <div class="paws">🐾 🐾 🐾</div>
        </div>
    </main>

    <footer>
        <p>&copy; This is Cat Webpage. All rights reserved.</p>
    </footer>

</body>
</html>
