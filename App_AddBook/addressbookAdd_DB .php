<?php
//Connecting to MYSQL Database. DB_Name: 'Address_Book.DB'
$dsn = 'mysql:dbname=Address_Book;host=127.0.0.1';
$user = 'root';
$password = 'MYSQLp@ssword';

$pdo = new PDO($dsn, $user, $password);

// function sql($pdo,$firstName,$lastName ,$email){// Function for inputing intial Data in the DB
//     $sql_add= ' INSERT INTO People(`firstName`,`lastName`,`email`) VALUES (:fName, :lName, :eName);';
//     $stmt= $pdo->prepare($sql_add);
//     $stmt->execute([
//         ':fName'=> $firstName ,
//         ':lName'=> $lastName,
//         ":eName"=> $email
//     ]);
    
//     $pdo= null;
//     $stmt = null;
    
//     }

// $statement = $pdo->prepare('SELECT COUNT(*) FROM Players WHERE firstName LIKE :fName');

// $statement->execute(['fName' => '%osib%']);
// $results = $statement->fetchAll();

// print_r($results);

// $numerRows = $pdo->exec('INSERT INTO Players (`firstName`, `lastName`) VALUES ( "Osibanjo", "Gbenga");');
// print_r($numerRows);
// echo "\n";

// $statement->execute(['fName' => 'osi']);
// $results2 = $statement->fetchAll();
// print_r($results2);


// $sts = $pdo->prepare('SELECT * FROM Players WHERE firstName LIKE :fName OR lastName LIKE :lName');
// $sts->execute(
//     [
//         'fName' => '%'.$search.'%',
//         'lName' => '%'.$lastName.'%',
//     ]
// );

// foreach($sts->fetchAll() as $recordNumber => $player) 
// {
//     printf("%d Player: -name- %s, -lastname- %s \n\n", $recordNumber, $player['firstName'], $player['lastName']);

// }
