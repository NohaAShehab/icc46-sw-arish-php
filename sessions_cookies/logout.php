<?php

session_start();

session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        :root {
            --bg: #f4f7fb;
            --card: #ffffff;
            --text: #1f2937;
            --muted: #6b7280;
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --border: #e5e7eb;
            --shadow: 0 12px 30px rgba(15, 23, 42, 0.1);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 24px;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #eef2ff 0%, var(--bg) 60%);
            color: var(--text);
        }

        .card {
            width: 100%;
            max-width: 460px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: var(--shadow);
            padding: 30px;
            text-align: center;
        }

        h1 {
            margin: 0 0 10px;
            font-size: 30px;
        }

        p {
            margin: 0 0 24px;
            color: var(--muted);
            font-size: 15px;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            padding: 11px 18px;
            font-size: 14px;
            font-weight: 700;
            color: #fff;
            background: var(--primary);
            transition: background-color 0.2s ease, transform 0.1s ease;
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
        <h1>Logged Out</h1>
        <p>You have logged out successfully.</p>
        <a class="btn" href="login_form.php">Back to Login</a>
    </div>
</body>
</html>
