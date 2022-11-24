<?php require ('./edit.code.php');?>
<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Person</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php 
if($model == null):
    echo "NOT FOUND";
?>
<?php else:?>
<h3 style="text-align:center"> UPDATE YOUR INFO</h3>
    <div class="container">
        <form method="POST" action="./edit.code.php"> 
            <div class="form-group">
            <input type="hidden" name="person-id" value="<?= $model["id"]?>">
                <label for="first-name">First Name</label>
                <input  type="text" 
                    id="first-name" 
                    name="first-name" 
                    class="form-control
                    "
                    value='<?= $model["FIRST NAME"] ?>'>
            </div>
            <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" 
                    id="last-name" 
                    name="last-name" 
                    class="form-control"
                    value="<?php echo $model['LAST NAME'] ?>">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" 
                    id="email" 
                    name="email" 
                    class="form-control"
                    value="<?php echo $model['email'] ?>">
            </div>

            <button type="submit" class="btn btn-primary"> SAVE</button>  
        </form>
    </div>
    <?php  endif; ?>
</body>
</html>
<!?PHP include (); ?>
