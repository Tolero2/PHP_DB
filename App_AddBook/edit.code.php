<?php
require('addressbookEdit_DB.php');


 //Use get request to query DB using the key id linked  to the record in qureied to the view(html)
if ($_SERVER['REQUEST_METHOD']== 'GET'){// if the request is a GET ie. the initial call to pull data from the database, then the id input will be sanitized and used to query the db for the specific data 
    $idGet= filter_input(INPUT_GET,'recId', FILTER_VALIDATE_INT);


    if(!$idGet ){

        $model=NULL;
        return $model;
    }else{
    $sqlclass= new sql($idGet,null,null,null);
    $model = $sqlclass->getSql();
    return $model;
    }
}
//using post to update the DB with the specific id that was printed as a hidden input on html
else{ // else, if it is a post request ie, the data is sent to the database to update it, the the form inputs will be anitized and the post function(edit) will be used to update the data batabase where the unique key is valid
    $idPost= filter_input(INPUT_POST,'person-id', FILTER_VALIDATE_INT);
    $firstName = filter_input(INPUT_POST, htmlspecialchars('first-name'));
    $lastName = filter_input(INPUT_POST, htmlspecialchars('last-name'));
    $email = filter_input(INPUT_POST, htmlspecialchars('email'));

if (strlen($email) === 0){ //sets email value to null in DB if no email is inputed 
    $email= NULL;
    
}

$sqlclass= new sql($idPost,$firstName,$lastName ,$email);
$sqlclass->editSql();
}

header("location: ./index.php");

// //header('location:index.php');
// function check(){
//     $id=4;
// $sqlclass= new sql($id,'','' ,'');
// $model = $sqlclass->getSql();
// return $model;
// }

// print_r(check());