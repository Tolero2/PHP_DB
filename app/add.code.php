<?php
// if ($_SERVER['REQUEST_METHOD']=='GET'){
//     return;
// }

$firstName = filter_input(INPUT_POST,'first-name');// ,htmlspecialchars(string 'first-name'));
$lastName = filter_input(INPUT_POST,'last-name');//, htmlspecialchars(string 'last-name'));
$email = filter_input(INPUT_POST,'email');//, htmlspecialchars('string'));

if (strlen($email) === 0){
    $email= NULL;
    
}
include ('AddressBook_DB.php');
$sql_add= ' INSERT INTO People(`firstName`,`lastName`,`email`) VALUES (:fName, :lName, :eName);';
$stmt= $pdo->prepare($sql_add);
$stmt->execute([
    ':fName'=> $firstName ,
    ':lName'=> $lastName,
    ":eName"=> $email
]);

$sql_add= NULL;
$stmt = NULL;




// foreach($filters as $key=>$name){
//     echo (filter_id($name) ."    ".$name."\n");
// }

//print_r ($filters);