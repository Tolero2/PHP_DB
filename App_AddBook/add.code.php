<?php
// if ($_SERVER['REQUEST_METHOD']=='GET'){
//     return;
// }

$firstName = filter_input(INPUT_POST, 'first-name');//htmlspecialchars('first-name'));// ,htmlspecialchars(string 'first-name'));
$lastName = filter_input(INPUT_POST, 'last-name');//htmlspecialchars('last-name')); //, htmlspecialchars(string 'last-name'));
$email = filter_input(INPUT_POST, 'email');//htmlspecialchars('email'));//, htmlspecialchars('string'));

if (strlen($email) === 0){
    $email= NULL;
    
}
require ('./addressbookEdit_DB.php'); // the file with the MYSQL AddressBook DB connection query
// the addSql method from class SQL under Addressbook_DB.php

$sql= new sql('',$firstName,$lastName ,$email);
$sql->addSql();
// foreach($filters as $key=>$name){
//     echo (filter_id($name) ."    ".$name."\n");
// }
//print_r ($filters);


//header("location: index.php"); //This is how you set the redirect location for after your php sript runs



?>
<!DOCTYPE html>
<html>
    <body>
       <pre> <h2><p style="text-align: center">THANK YOU FOR SUBMITTING YOUR CONTACT INFO </p></h2>
             <em><p style="text-align: center">YOU CAN ADD A NEW CONTACT LIST BY CLICKING THE RETURN BUTTON BELOW <br>
    <button > <a href= "/PHP_DB/App_AddBook/add.php" style="text-align: center">Return</a></button></p></em> 
    <em><p style="text-align: center">YOU CAN ALSO VIEW THE CONTACT LIST BY CLICKING THE RECORDS BUTTON BELOW <br>
    <button > <a href= "/PHP_DB/App_AddBook/" style="text-align: center">Records</a></button></p></em> 
       </pre>
    </body>
</html>