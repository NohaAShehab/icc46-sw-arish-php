<?php
# dsn ?? data source name
$dsn = 'mysql:dbname=iti_arish;host=127.0.0.1;port=3306;'; #port number
$user = 'arish';
$password = 'Iti123456789_';
# we will use the pdo to connect to the database
try {
    $db = new PDO($dsn, $user, $password);
//    var_dump($db);
    # write queries ---> save data ....
    $select_query = "SELECT * FROM `students`";
    # ask the db object to prepare query
    $stmt = $db->prepare($select_query);
    $stmt->execute();
    # then I need to fetch the data
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
//    echo "<pre>";
//    var_dump($rows);
}catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
/***
 *
 *
 * on mysql server
 * there is default use with name root and password is empty
 *
 * I've connected to the root?
 * create database ... --> create database arish;
 * then create new user?
 *
 * create user 'arish'@'[localhost](http://localhost)' identified by 'Iti123456789_';
 *
 * after that I gave this user the privileges ?
 * grant all privileges on *.* to 'arish'@'[localhost](http://localhost)';
 * flush the privileges;
 *
 *
 *   rofida
 *
 *
 * use arish;
 *
 * create table students(id int auto_increment primary key, name varchar(100), image varchar(200), email varchar(100) unique);
 *
insert into students(name, email) values('ahmed', '[ahmed@gmail.com](mailto:ahmed@gmail.com)'), ('noha', '[noha@gmail.com](mailto:noha@gmail.com)'), ('test', '[test@gmail.com](mailto:test@gmail.com)');
 *
 *
 *
 *
 */
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

    <div class="table-wrap">
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>Image</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row){
                echo "<tr>";
                echo "<td> {$row['id']}</td>";
                echo "<td> {$row['name']}</td>";
                echo "<td> {$row['email']}</td>";
                echo "<td>  <img src='images/{$row['image']}' width='100' height='100'> </td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>