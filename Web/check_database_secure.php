<?php

    $db = new SQLite3('cat_homepage.db');

    $enteredUsername = "babo'--";
    $enteredPassword = "asdf";

    $query = "SELECT * FROM users WHERE username = :username AND password = :password";

    $stmt = $db->prepare($query);

    $stmt->bindValue(':username', $enteredUsername, SQLITE3_TEXT);
    $stmt->bindValue(':password', $enteredPassword, SQLITE3_TEXT);

    $result = $stmt->execute();
    $row = $result->fetchArray();

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRAPE 고양이 웹 - DB 확인 (Secure)</title>
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
            padding: 18px 28px;
            text-align: center;
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(240, 160, 185, 0.18);
        }

        header h1 {
            font-size: 24px;
            font-weight: 800;
            color: #f08fab;
        }

        header h1::before {
            content: "🐱 ";
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
            max-width: 560px;
            padding: 48px 36px 36px;
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 12px 40px rgba(240, 160, 185, 0.25);
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

        .card h2 {
            font-size: 24px;
            font-weight: 800;
            color: #f08fab;
            text-align: center;
            margin-bottom: 24px;
        }

        .label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #c97b93;
            margin-bottom: 6px;
        }

        .query {
            padding: 13px 16px;
            margin-bottom: 18px;
            font-family: Consolas, "Courier New", monospace;
            font-size: 14px;
            word-break: break-all;
            background: #fff8fa;
            border: 2px solid #ffdbe6;
            border-radius: 12px;
        }

        .info {
            list-style: none;
            margin-bottom: 18px;
        }

        .info li {
            display: flex;
            justify-content: space-between;
            padding: 12px 18px;
            margin-bottom: 10px;
            font-size: 15px;
            background: #fff8fa;
            border: 2px solid #ffdbe6;
            border-radius: 14px;
        }

        .info li span:first-child {
            font-weight: 700;
            color: #c97b93;
        }

        .result {
            padding: 12px 16px;
            font-size: 15px;
            font-weight: 700;
            text-align: center;
            border-radius: 12px;
        }

        .result.found {
            color: #ffffff;
            background: #f5a3bb;
        }

        .result.not-found {
            color: #d9506f;
            background: #fff0f4;
            border: 2px dashed #ffc2d3;
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

    <header>
        <h1>GRAPE 고양이 웹</h1>
    </header>

    <main>
        <div class="card">
            <h2>DB Check (Secure)</h2>

            <span class="label">your query :</span>
            <p class="query"><?php echo htmlspecialchars($query); ?></p>

            <ul class="info">
                <li><span>row</span><span><?php echo $row ? 'Array' : '(empty)'; ?></span></li>
                <li><span>row['username']</span><span><?php echo $row ? $row['username'] : ''; ?></span></li>
                <li><span>row['password']</span><span><?php echo $row ? $row['password'] : ''; ?></span></li>
            </ul>

            <?php
            if ($row) {
                echo "<p class=\"result found\">this is on database : $enteredUsername/$enteredPassword</p>";
            } else {
                echo "<p class=\"result not-found\">not in database : $enteredUsername/$enteredPassword</p>";
            }
            ?>
        </div>
    </main>

    <footer>
        <p>&copy; This is Cat Webpage. All rights reserved.</p>
    </footer>

</body>
</html>
