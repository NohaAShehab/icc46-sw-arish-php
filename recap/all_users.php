<?php


require_once "file_operations.php";


$users = get_data("users.txt");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <style>
        :root {
            --bg: #f4f7fb;
            --card: #ffffff;
            --text: #1f2937;
            --muted: #6b7280;
            --border: #e5e7eb;
            --shadow: 0 10px 24px rgba(15, 23, 42, 0.08);
            --primary: #4f46e5;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #eef2ff 0%, var(--bg) 60%);
            color: var(--text);
            min-height: 100vh;
            padding: 28px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        h1 {
            margin: 0 0 8px;
            text-align: center;
            font-size: 30px;
        }

        .subtitle {
            margin: 0 0 26px;
            text-align: center;
            color: var(--muted);
        }

        .top-actions {
            display: flex;
            justify-content: center;
            margin-bottom: 22px;
        }

        .register-btn {
            display: inline-block;
            text-decoration: none;
            background: var(--primary);
            color: #fff;
            padding: 11px 18px;
            border-radius: 8px;
            font-weight: 700;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        .register-btn:hover {
            background: #4338ca;
        }

        .register-btn:active {
            transform: translateY(1px);
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 18px;
        }

        .user-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .user-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.12);
        }

        .avatar-wrap {
            height: 190px;
            background: #eef2ff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
        }

        .card-body {
            padding: 14px 16px 16px;
        }

        .row {
            margin: 7px 0;
            font-size: 14px;
            line-height: 1.4;
        }

        .label {
            color: var(--muted);
            font-weight: 700;
            margin-right: 6px;
        }

        .id-chip {
            display: inline-block;
            margin-bottom: 8px;
            background: #ede9fe;
            color: var(--primary);
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .empty {
            text-align: center;
            color: var(--muted);
            background: #fff;
            border: 1px dashed var(--border);
            border-radius: 12px;
            padding: 24px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>All Users</h1>
    <p class="subtitle">Browse users or add a new one</p>
    <div class="top-actions">
        <a class="register-btn" href="register.php">+ Register New User</a>
    </div>
    
    <?php if (empty($users)) { ?>
        <div class="empty">No users found.</div>
    <?php } else { ?>
        <div class="cards">
            <?php foreach ($users as $user) { ?>
                <div class="user-card">
                    <div class="avatar-wrap">
                        <img class="avatar" src="images/<?php echo htmlspecialchars($user[4]); ?>" alt="User image">
                    </div>
                    <div class="card-body">
                        <span class="id-chip">ID: <?php echo htmlspecialchars($user[0]); ?></span>
                        <div class="row"><span class="label">Name:</span><?php echo htmlspecialchars($user[1]); ?></div>
                        <div class="row"><span class="label">Email:</span><?php echo htmlspecialchars($user[2]); ?></div>
                        <div class="row"><span class="label">Password:</span><?php echo htmlspecialchars($user[3]); ?></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>
</body>
</html>
