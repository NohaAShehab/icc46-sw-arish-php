<?php


ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

// add all the common functionalities . styles --->

// use bootstrap in all pages

// wirte bootstrap cdn links ??

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>';

echo "<div class='container'> <pre>";

function generateTitle($title, $color = 'black', $size = 1)
{
    echo "<hr>";
    echo "<h{$size} style='color:{$color}' class='text-center'> {$title} </h{$size}>";
}

function generate_inner_title($title, $color = 'black', $size = 3)
{
    echo "<h{$size} style='color:{$color}' class='text-center'> {$title} </h{$size}>";
}


function drawlines()
{

    echo str_repeat("<br>", 10);
}

function brk()
{
    echo "<br>";
}


function table_styles(){
    echo "
    <style>
        .users-table {
            width: 100%;
            max-width: 900px;
            margin: 20px auto;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            font-family: Arial, sans-serif;
        }
        .users-table thead {
            background: linear-gradient(90deg, #2563eb, #1d4ed8);
            color: #ffffff;
        }
        .users-table th,
        .users-table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        .users-table tbody tr:nth-child(even) {
            background-color: #f8fafc;
        }
        .users-table tbody tr:hover {
            background-color: #eef2ff;
            transition: background-color 0.2s ease;
        }
        .action-btn {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 8px;
            color: #ffffff;
            font-size: 14px;
            text-decoration: none;
            font-weight: 600;
            transition: opacity 0.2s ease, transform 0.2s ease;
        }
        .action-btn:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }
        .btn-show {
            background-color: #2563eb;
        }
        .btn-edit {
            background-color: #f59e0b;
        }
        .btn-delete {
            background-color: #dc2626;
        }
    </style>
    ";
}


function draw_table($headers, $data){
    table_styles();
    echo "<table class='users-table'> ";
    echo "<thead> <tr>";
    foreach($headers as $header){
        echo "<th>$header</th>";
    }
    echo "<td>Show</td><td>Edit</td><td>Delete</td></tr></thead>";


    foreach($data as $row){
        echo "<tr>";
        foreach($row as $col){
            echo "<td>$col</td>";
        }
        echo "<td><a class='action-btn btn-show' href=''>Show</a></td>
              <td><a class='action-btn btn-edit' href=''>Edit</a></td>
              <td><a class='action-btn btn-delete' href=''>Delete</a></td></tr>";
    }

    echo "</table>";
}
