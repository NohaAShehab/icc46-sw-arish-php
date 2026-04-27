<?php

    if(count($_GET)> 0) {
//        var_dump($_GET);

        if(isset($_GET['errors'])){
            $errors = json_decode($_GET['errors'], true);
//            var_dump($errors);
        }

        if(isset($_GET['data'])){
            $data = json_decode($_GET['data'], true);
//            var_dump($data);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        :root {
            --bg: #f4f7fb;
            --card: #ffffff;
            --text: #1f2937;
            --muted: #6b7280;
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --border: #d1d5db;
            --focus: #818cf8;
            --error: #b91c1c;
            --error-bg: #fef2f2;
            --error-border: #fecaca;
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
            max-width: 460px;
            background: var(--card);
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            padding: 28px;
        }

        h1 {
            margin: 0 0 8px;
            font-size: 28px;
            text-align: center;
        }

        .subtitle {
            margin: 0 0 22px;
            text-align: center;
            color: var(--muted);
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .field-error {
            display: block;
            margin-top: 8px;
            color: var(--error);
            font-size: 13px;
            font-weight: 600;
            background: var(--error-bg);
            border: 1px solid var(--error-border);
            border-radius: 8px;
            padding: 8px 10px;
        }

        .input-error {
            border-color: #fca5a5;
            background: #fff8f8;
        }

        .input-error:focus {
            border-color: #ef4444;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.18);
        }

        .error-summary {
            margin: 0 0 18px;
            background: var(--error-bg);
            border: 1px solid var(--error-border);
            border-left: 4px solid #ef4444;
            color: var(--error);
            padding: 12px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 700;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: 600;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.2s, box-shadow 0.2s;
            background-color: #fff;
        }

        input:focus {
            outline: none;
            border-color: var(--focus);
            box-shadow: 0 0 0 3px rgba(129, 140, 248, 0.2);
        }

        input[type="file"] {
            padding: 8px;
        }

        button {
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

        button:hover {
            background: var(--primary-hover);
        }

        button:active {
            transform: translateY(1px);
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Registration Form</h1>
        <p class="subtitle">Create your account by filling the details below</p>
        <?php if (!empty($errors)) { ?>
            <div class="error-summary">Please fix the highlighted fields before submitting.</div>
        <?php } ?>

        <form action="save.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="number" id="id" name="id"
                    class="<?php echo isset($errors['id']) ? 'input-error' : ''; ?>"
                    value="<?php echo isset($data['id']) ? htmlspecialchars($data['id']) : ''; ?>"
                >
                <?php if (isset($errors['id'])) { ?>
                    <span class="field-error"><?php echo htmlspecialchars($errors['id']); ?></span>
                <?php } ?>

            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name"
                       class="<?php echo isset($errors['name']) ? 'input-error' : ''; ?>"
                       value="<?php echo isset($data['name']) ? htmlspecialchars($data['name']) : ''; ?>"
                >
                <?php if (isset($errors['name'])) { ?>
                    <span class="field-error"><?php echo htmlspecialchars($errors['name']); ?></span>
                <?php } ?>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email"
                       class="<?php echo isset($errors['email']) ? 'input-error' : ''; ?>"
                       value="<?php echo isset($data['email']) ? htmlspecialchars($data['email']) : ''; ?>"
                >
                <?php if (isset($errors['email'])) { ?>
                    <span class="field-error"><?php echo htmlspecialchars($errors['email']); ?></span>
                <?php } ?>

            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="<?php echo isset($errors['password']) ? 'input-error' : ''; ?>">
                <?php if (isset($errors['password'])) { ?>
                    <span class="field-error"><?php echo htmlspecialchars($errors['password']); ?></span>
                <?php } ?>

            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" accept="image/*" class="<?php echo isset($errors['image']) ? 'input-error' : ''; ?>">
                <?php if (isset($errors['image'])) { ?>
                    <span class="field-error"><?php echo htmlspecialchars($errors['image']); ?></span>
                <?php } ?>

            </div>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>