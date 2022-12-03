<?php
require('addressbook_dbClass.php');


if($_SERVER['REQUEST_METHOD']=='GET')
{
   $idGet= filter_input(INPUT_GET, 'recId', FILTER_VALIDATE_INT);
    
   if (!$idGet){
    $model = null;
    return;
   }
   else{
    $Sql= new sql($idGet, null,null,null);//object instantiation... all construct values have to be filled even if the only one value is needed for the function to run is less.
    $model= $Sql->getSql();
    return $model;
}
}

else{
$idPost= filter_input(INPUT_POST, 'personId', FILTER_VALIDATE_INT);
$Del = filter_input(INPUT_POST,'del');
// $noDelete = filter_input(INPUT_POST, 'noDelete', htmlspecialchars('noDelete'));

//you have to change the form to contain array values instead of separated value because then we can use if statm
if($Del== "yesDel"){
    $Sql= new sql($idPost, null,null,null);
    $Sql->delSql();

  
}
else{

    header("location: ./index.php");
   

}

}

header("location: ./index.php");