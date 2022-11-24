<?php
require('addressbookEdit_DB.php');


if($_SERVER['REQUEST_METHOD']=='GET')
{
   $idGet= filter_input(INPUT_GET, 'recId', FILTER_VALIDATE_INT);
    
   if (!$idGet){
    $model = null;
    return;
   }
   else{
    $getSql= new sql($idGet, null,null,null);//object instantiation... all construct values have to be filled even if the only one value is needed for the function to run is less.
    $model= $getSql->getSql();
    return $model;
}
}

else{
$idPost= filter_input(INPUT_POST, 'personId', FILTER_VALIDATE_INT);
$yesDel = filter_input(INPUT_POST,'del');
// $noDelete = filter_input(INPUT_POST, 'noDelete', htmlspecialchars('noDelete'));

//you have to change the form to contain array values instead of separated value because then we can use if statm
if($yesDel== "yesDel"){
    $delSql= new sql($idPost, null, null, null);
    $delSql->delSql();

  
}
else{

 include('./index.php');
   

}

}

header("location: ./index.php");