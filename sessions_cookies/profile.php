<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        :root {
            --bg: #f4f7fb;
            --card: #ffffff;
            --text: #1f2937;
            --muted: #6b7280;
            --border: #e5e7eb;
            --danger: #dc2626;
            --danger-hover: #b91c1c;
            --shadow: 0 12px 30px rgba(15, 23, 42, 0.1);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #eef2ff 0%, var(--bg) 60%);
            color: var(--text);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 24px;
        }

        .card {
            width: 100%;
            max-width: 560px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: var(--shadow);
            padding: 28px;
            text-align: center;
        }

        h1 {
            margin: 0 0 14px;
            font-size: 30px;
            line-height: 1.3;
        }

        form {
            margin-top: 22px;
        }

        input[type="submit"] {
            border: none;
            border-radius: 8px;
            padding: 10px 18px;
            font-size: 14px;
            font-weight: 700;
            color: #fff;
            background: var(--danger);
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        input[type="submit"]:hover {
            background: var(--danger-hover);
        }

        input[type="submit"]:active {
            transform: translateY(1px);
        }
    </style>
</head>
<body>
<div class="card">
    <?php
        echo "<h1> Only authenticated users can login to this page </h1>";

        # to access $_SESSION
        session_start();
        var_dump($_SESSION);

        if(isset($_SESSION['login']) and $_SESSION['login']==true){
            echo"<h1> Welcome to user profile  </h1>";
            echo $_SESSION['email'];
        }
        else{
            echo "<h1> You must login first  </h1>";
            header("Location: login_form.php");
        }
    ?>

    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
</div>
</body>
</html>