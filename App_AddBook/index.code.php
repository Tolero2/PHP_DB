<?php
//This file serves as a 
//Connecting to MYSQL Database. DB_Name: 'Address_Book.DB'
$dsn = 'mysql:dbname=Address_Book;host=127.0.0.1';
$user = 'root';
$password = 'MYSQLp@ssword';

$pdo = new PDO($dsn, $user, $password);

$query= $pdo->query('SELECT `idPeople` AS `id`,`firstName` as `FIRST NAME`, `lastName` as `LAST NAME` , `email` FROM `People` ORDER BY `lastName`');
$model= $query->fetchAll(); // fetches all the query data and store them in Array of array set of values under model of the MVC


// this is for optimization of query engine to break the connection from  the server
$pdo=null;
$query=null;
 