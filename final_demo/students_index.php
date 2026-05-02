<?php
 require_once 'db_operations.php';

 $rows = select_all_students();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Students</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet"/>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #F7F6F3;
            min-height: 100vh;
            padding: 2.5rem 1.5rem;
            color: #2C2C2A;
        }

        body::before {
            content: '';
            position: fixed; inset: 0;
            background:
                    radial-gradient(ellipse 55% 45% at 5% 10%, rgba(127,119,221,0.11) 0%, transparent 65%),
                    radial-gradient(ellipse 40% 50% at 95% 90%, rgba(29,158,117,0.07) 0%, transparent 65%);
            pointer-events: none; z-index: 0;
        }

        .container {
            position: relative; z-index: 1;
            max-width: 860px;
            margin: 0 auto;
        }

        h1 {
            font-size: 26px;
            font-weight: 600;
            color: #2C2C2A;
            margin-bottom: 1.5rem;
            padding-bottom: .75rem;
            border-bottom: 2px solid #CECBF6;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        h1::before {
            content: '';
            display: inline-block;
            width: 10px; height: 10px;
            border-radius: 50%;
            background: #534AB7;
            flex-shrink: 0;
        }

        .table-wrap {
            background: #fff;
            border-radius: 16px;
            border: 1px solid #EDECEA;
            box-shadow: 0 2px 8px rgba(44,44,42,0.05), 0 12px 40px rgba(83,74,183,0.08);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead tr {
            background: linear-gradient(135deg, #534AB7 0%, #3C3489 100%);
        }

        thead th {
            padding: 14px 20px;
            text-align: left;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .07em;
            color: rgba(255,255,255,0.85);
        }

        thead th:first-child { border-radius: 0; }

        tbody tr {
            border-bottom: 1px solid #F0EFE8;
            transition: background 0.15s;
        }

        tbody tr:last-child { border-bottom: none; }

        tbody tr:hover { background: #EEEDFE; }

        tbody td {
            padding: 14px 20px;
            font-size: 14px;
            color: #2C2C2A;
            vertical-align: middle;
        }

        tbody td:first-child {
            font-size: 13px;
            font-weight: 600;
            color: #534AB7;
            width: 60px;
        }

        tbody td:nth-child(2) {
            font-weight: 500;
        }

        tbody td:nth-child(3) {
            color: #5F5E5A;
            font-size: 13px;
        }

        tbody td img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #CECBF6;
            display: block;
        }
    </style>
</head>
<body>
<div class="container">

    <h1> Get data from Database </h1>
    <a href="form.php">Add new Student </a>

    <div class="table-wrap">
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>Image</th>
                <th> Delete </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row){
                echo "<tr>";
                echo "<td> {$row['id']}</td>";
                echo "<td> {$row['name']}</td>";
                echo "<td> {$row['email']}</td>";
                echo "<td>  <img src='images/{$row['image']}' width='100' height='100'> </td>";
                echo "<td><form action='delete.php' method='post'>
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <input type='hidden' name='image' value='{$row['image']}'>
                        <input type='submit'  value='Delete'>
                    </form></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
