<?php

// echo 'this is text';


$dsn = 'mysql:dbname=Nfl;host=127.0.0.1';
$user = 'root';
$password = 'MYSQLp@ssword';

$pdo = new PDO($dsn, $user, $password);

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



$search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
$lastName = filter_input(INPUT_GET, 'last', FILTER_SANITIZE_SPECIAL_CHARS);

$sts = $pdo->prepare('SELECT * FROM Players WHERE firstName LIKE :fName OR lastName LIKE :lName');
$sts->execute(
    [
        'fName' => '%'.$search.'%',
        'lName' => '%'.$lastName.'%',
    ]
);

foreach($sts->fetchAll() as $recordNumber => $player) 
{
    printf("%d Player: -name- %s, -lastname- %s \n\n", $recordNumber, $player['firstName'], $player['lastName']);

}
