<?php
    $host = "localhost";
    $dbname = "products";
    $dsn = "mysql:host=".$host.";dbname=".$dbname.";charset=utf8";
    $user = "root";
    $password = "";
    try{
        session_start();
        $pdo = new PDO($dsn,$user,$password,[  
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
    }catch(Extension $e){ 
        echo $e;
    }
