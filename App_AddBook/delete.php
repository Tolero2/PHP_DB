<?php require('./delete.code.php'); ?>
<!DOCTYPE html>
<html>
    <head>

        <title>

        </title>
    </head>
    <body>
        <?php if ($model == null): // to check if the value of the recId is a valid INT
            echo "NOT FOUND"; 
             ?>
      <?php  else:
        ?>
        
        <p>
        <table>
            <thead>
                <tr>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>EMAIL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <?php echo $model['FIRST NAME'] ?></td>
                    <td> <?php echo $model['LAST NAME'] ?></td>
                    <td> <?php echo $model['email'] ?></td>
                </tr>
            </tbody>
        </table>
      </p>
      <!-- <input type="text" value="<!?php echo $model['FIRST NAME'] ?>" -->

        <h3> DELETE THIS RECORDS?</h3>
        <form method="post" action="./delete.code.php" >
        <pre><p>
        <input type="hidden" name="personId" value="<?= $model['id']?>">
        <button name="del" type="submit" value="yesDel" class="btn btn-danger" >YES</button>      <button name="Del" type="submit" value="noDel" class="btn btn-primary">NO</button></p></pre>
        </form>
        <?php endif; ?>
    </body>
</html>