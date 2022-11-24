<?php require 'index.code.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Name Record List</title>
</head>
<body>
   <table class="table">
    <thead>
        <tr>
            <th> LAST NAME FIRST NAME</th>
            <th> Email</th>
            <th></th>

        </tr>
    </thead>
    <tbody>
        <?php foreach($model as $records):
       ?>
       <tr>
        <td>
            <a href="edit.php?recId=<?=$records["id"]?>">
            <?= $records['LAST NAME'];?>,<?= $records['FIRST NAME']; ?>
            
            </a>
        </td>

        <td><?= $records['email']; ?>
        </td>
        <td>
                <a href="delete.php?recId=<?= $records["id"]?>" class="btn btn-danger">DELETE</a>
        </td>
       </tr>
         <?php endforeach; ?>  

    </tbody>
   </table>
</body>
</html>