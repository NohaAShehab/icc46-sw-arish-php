<?php

    # this page shouldn't be opened if the user already logged_in ??

    # 1- start session
    session_start();

    if(isset($_SESSION['login']) and $_SESSION['login'] === true){
//        echo "<h1>User already logged in  </h1>";
        header("Location: profile.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        :root {
            --bg: #f3f6ff;
            --card: #ffffff;
            --text: #1f2937;
            --muted: #6b7280;
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --border: #d1d5db;
            --focus: #818cf8;
            --error-bg: #fef2f2;
            --error-border: #fecaca;
            --error-text: #b91c1c;
            --success-bg: #ecfdf3;
            --success-border: #bbf7d0;
            --success-text: #166534;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #eef2ff 0%, var(--bg) 65%);
            color: var(--text);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .card {
            width: 100%;
            max-width: 430px;
            background: var(--card);
            border-radius: 14px;
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08);
            padding: 28px;
        }

        h1 {
            margin: 0 0 6px;
            text-align: center;
            font-size: 28px;
        }

        .subtitle {
            margin: 0 0 22px;
            text-align: center;
            color: var(--muted);
            font-size: 14px;
        }

        .alert {
            border-radius: 10px;
            padding: 10px 12px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 14px;
        }

        .alert-error {
            background: var(--error-bg);
            border: 1px solid var(--error-border);
            color: var(--error-text);
        }

        .alert-success {
            background: var(--success-bg);
            border: 1px solid var(--success-border);
            color: var(--success-text);
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: 700;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus {
            outline: none;
            border-color: var(--focus);
            box-shadow: 0 0 0 3px rgba(129, 140, 248, 0.2);
        }

        .btn {
            width: 100%;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 15px;
            font-weight: 700;
            color: #fff;
            background: var(--primary);
            cursor: pointer;
            transition: background-color 0.2s, transform 0.1s;
        }

        .btn:hover {
            background: var(--primary-hover);
        }

        .btn:active {
            transform: translateY(1px);
        }
    </style>
</head>
<body>
<div class="card">
    <h1>Login</h1>
    <p class="subtitle">Sign in to continue to your profile</p>

    <?php if ($error !== '') { ?>
        <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
    <?php } ?>

    <?php if (!empty($errors)) { ?>
        <div class="alert alert-error">
            <?php foreach ($errors as $err) { ?>
                <div>- <?php echo htmlspecialchars((string) $err); ?></div>
            <?php } ?>
        </div>
    <?php } ?>

    <?php if ($success !== '') { ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
    <?php } ?>

    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="<?php echo htmlspecialchars($oldEmail); ?>"
                placeholder="example@mail.com"
                required
            >
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter your password"
                required
            >
        </div>

        <button class="btn" type="submit">Login</button>
    </form>
</div>
</body>
</html>