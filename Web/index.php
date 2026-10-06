<?php
session_save_path('./');
session_start();

// SQLite 데이터베이스 연결
try {
    $db = new SQLite3('cat_homepage.db');
} catch (Exception $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the entered username and password
    $enteredUsername = $_POST["username"];
    $enteredPassword = $_POST["password"];

    // Query to check user credentials
    $query = "SELECT * FROM users WHERE username='{$enteredUsername}' AND password='{$enteredPassword}' ";
    $result = $db->query($query);
    $row = $result->fetchArray();

    // Check if the entered credentials are valid
    if ($row) {
        // Redirect to the login success page
        $login_user = $row["username"];
        $_SESSION["user"] = $login_user;
        header("Location: page-{$login_user}.php");
        exit();
    } else {
        // Invalid credentials, you might want to display an error message
        $errorMessage = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRAPE 고양이 웹 - 로그인</title>
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
            align-items: center;
            font-family: "Nanum Gothic", "Noto Sans KR", "Apple SD Gothic Neo", sans-serif;
            background: linear-gradient(160deg, #fff5f8 0%, #ffe4ec 100%);
            color: #5a4a50;
        }

        header {
            width: 100%;
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
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-bottom: 48px;
        }

        .welcome {
            margin-top: 32px;
            padding: 0 20px;
            text-align: center;
        }

        .welcome h2 {
            font-size: 18px;
            font-weight: 800;
            color: #c97b93;
            margin-bottom: 6px;
        }

        .welcome p {
            font-size: 14px;
            color: #b89aa4;
        }

        /* 로그인 카드 */
        form {
            position: relative;
            width: calc(100% - 40px);
            max-width: 380px;
            margin: 80px 20px 0;
            padding: 48px 36px 36px;
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 12px 40px rgba(240, 160, 185, 0.25);
        }

        /* 카드 위 고양이 귀 */
        form::before,
        form::after {
            content: "";
            position: absolute;
            top: -26px;
            border-left: 30px solid transparent;
            border-right: 30px solid transparent;
            border-bottom: 44px solid #ffffff;
        }

        form::before {
            left: 40px;
            transform: rotate(-18deg);
        }

        form::after {
            right: 40px;
            transform: rotate(18deg);
        }

        form h2 {
            font-size: 28px;
            font-weight: 800;
            letter-spacing: 1px;
            color: #f08fab;
            text-align: center;
            margin-bottom: 28px;
        }

        /* 로그인 실패 메시지 */
        .error {
            margin-bottom: 20px;
            padding: 12px 16px;
            font-size: 14px;
            color: #d9506f;
            background: #fff0f4;
            border: 2px dashed #ffc2d3;
            border-radius: 12px;
            text-align: center;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #c97b93;
            margin-bottom: 6px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 13px 16px;
            margin-bottom: 18px;
            font-size: 15px;
            color: #5a4a50;
            background: #fff8fa;
            border: 2px solid #ffdbe6;
            border-radius: 12px;
            outline: none;
            transition: border-color 0.2s, background 0.2s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #f5a3bb;
            background: #ffffff;
        }

        input[type="submit"] {
            width: 100%;
            margin-top: 6px;
            padding: 14px;
            font-size: 16px;
            font-weight: 700;
            color: #ffffff;
            background: #f5a3bb;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
        }

        input[type="submit"]:hover {
            background: #f08fab;
        }

        input[type="submit"]:active {
            transform: scale(0.98);
        }

        footer {
            width: 100%;
            margin-top: auto;
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
        <form method="post">

            <?php
            // Display error message if any
            if (isset($errorMessage)) {
                echo '<p class="error">' . $errorMessage . '</p>';
            }
            ?>
            <h2>Login</h2>

            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <input type="submit" value="Login">
        </form>

        <section class="welcome">
            <h2>Welcome to Your Website hello</h2>
            <p>This is a sample content for your website.</p>
        </section>
    </main>

    <footer>
        <p>&copy; This is Cat Webpage. All rights reserved.</p>
    </footer>

</body>
</html>
