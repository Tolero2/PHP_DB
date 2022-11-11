<?php
require ('AddressBook.DB.php'); // The file with the MYSQL AddressBook DB connection query

$query= $pdo->query('SELECT `idPeople` AS `id`,`firstName` as `FIRST NAME`, `lastName` as `LAST NAME` , `email` FROM `People` ORDER BY `lastName`' );
$model= $query->fetchAll();


// this is for optimization of query engine to break the connection from  the server
$pdo=null;
$query=null;
 