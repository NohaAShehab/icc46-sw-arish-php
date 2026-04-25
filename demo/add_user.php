<?php
require_once('../utils.php');
generateTitle("Add User", "Blue");
?>

<style>
    :root {
        --primary: #2563eb;
        --primary-dark: #1d4ed8;
        --text-main: #0f172a;
        --text-soft: #64748b;
        --border: #dbe3ef;
        --card-bg: #ffffff;
    }

    body {
        margin: 0;
        font-family: "Segoe UI", Tahoma, Arial, sans-serif;
        background:
            radial-gradient(circle at top right, #dbeafe 0%, transparent 42%),
            radial-gradient(circle at bottom left, #e0e7ff 0%, transparent 38%),
            #f8fafc;
    }

    .form-container {
        max-width: 460px;
        margin: 34px auto;
        padding: 28px;
        border-radius: 18px;
        background: var(--card-bg);
        border: 1px solid #e2e8f0;
        box-shadow: 0 16px 40px rgba(15, 23, 42, 0.12);
    }

    .form-title {
        margin: 0;
        text-align: center;
        color: var(--text-main);
        font-size: 26px;
        letter-spacing: 0.2px;
    }

    .form-subtitle {
        margin: 8px 0 22px;
        text-align: center;
        color: var(--text-soft);
        font-size: 14px;
    }

    .form-group {
        margin-bottom: 16px;
    }

    .form-group label {
        display: block;
        margin-bottom: 7px;
        color: #1e293b;
        font-weight: 700;
        font-size: 14px;
    }

    .form-group input {
        width: 100%;
        box-sizing: border-box;
        padding: 12px 13px;
        border: 1px solid var(--border);
        border-radius: 10px;
        font-size: 15px;
        color: #0f172a;
        background: #f8fafc;
        outline: none;
        transition: border-color 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
    }

    .form-group input::placeholder {
        color: #94a3b8;
    }

    .form-group input:focus {
        border-color: var(--primary);
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
    }

    .submit-btn {
        width: 100%;
        margin-top: 8px;
        padding: 13px;
        border: none;
        border-radius: 10px;
        background: linear-gradient(90deg, var(--primary), var(--primary-dark));
        color: #ffffff;
        font-size: 16px;
        font-weight: 700;
        letter-spacing: 0.3px;
        cursor: pointer;
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.35);
        transition: transform 0.2s ease, box-shadow 0.2s ease, filter 0.2s ease;
    }

    .submit-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 12px 24px rgba(37, 99, 235, 0.35);
        filter: brightness(1.02);
    }

    .submit-btn:active {
        transform: translateY(0);
    }
</style>

<div class="form-container">
    <h2 class="form-title">Add New User</h2>
    <p class="form-subtitle">Enter the user information below</p>
    <form action="save_user.php" method="post">
        <div class="form-group">
            <label for="id">ID</label>
            <input type="number" id="id" name="id" placeholder="Enter user ID" min="1" >
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter full name" >
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" >
        </div>

        <button class="submit-btn" type="submit">Save User</button>
    </form>
</div>
