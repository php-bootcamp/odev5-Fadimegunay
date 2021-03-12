<?php
    include('connect.php');
    include('functions.php');

    include('product.php');
    include('category.php');
    include('export.php');
    include('import.php');

    if(!empty($_GET['do']) && isset($_GET['do']) && $_GET['do'] != "")
    {
        $func = $_GET['do'];
        $func($pdo);
    }