<?php
// //Connecting to MYSQL Database. DB_Name: 'Address_Book.DB'
// $dsn = 'mysql:dbname=Address_Book;host=127.0.0.1';
// $user = 'root';
// $password = 'MYSQLp@ssword';

// $pdo = new PDO($dsn, $user, $password);





class sql {

    public $pdo;
    public $model;
    protected $stmt;
    protected $id;
    protected $firstName;
    protected $lastName;
    protected $email;

     /**
     */
function __construct($id,$firstName,$lastName ,$email) { 
    
        $this->id=$id;
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        $this->email=$email;
}
public function connector(){
    //Connecting to MYSQL Database. DB_Name: 'Address_Book.DB'
$dsn = 'mysql:dbname=Address_Book;host=127.0.0.1';
$user = 'root';
$password = 'MYSQLp@ssword';

$pdo = new PDO($dsn, $user, $password);
return $this->pdo= ($pdo);

}

function addSql(){// Function for inputing intial Data in the DB
    $this->connector ();
    $sql_add= ' INSERT INTO People(`firstName`,`lastName`,`email`) VALUES (:fName, :lName, :eName);';
    $this->stmt= $this->pdo->prepare($sql_add);
    $this->stmt->execute([
        ':fName'=> $this->firstName ,
        ':lName'=> $this->lastName,
        ":eName"=> $this->email
    ]);
    
    $this->pdo= null;
    $this->stmt = null;

    
}

public function getSql(){ // function for updating the database
        $this->connector ();
        $sqlGet= ('SELECT `idPeople` AS `id`,`firstName` as `FIRST NAME`, `lastName` as `LAST NAME` , `email` FROM `People` WHERE `idPeople` = :id;');
        $this->stmt= $this->pdo->prepare($sqlGet);
        $this->stmt->execute([
            ':id'=> $this->id
        ]);
         $this->model = ($this->stmt)->fetch();
         $this->pdo= null;
         $this->stmt=null;
         return $this->model;
        

      
}

public function editSql(){ // function for updating the records in the database by key(id)
        $this->connector ();
        $sqlEdit= ' UPDATE `Address_Book`.`People`
        SET `firstName` = :fName,`lastName`= :lName,`email` = :eName
        WHERE `idPeople`= :id;';
        $this->stmt= $this->pdo->prepare($sqlEdit);
        $this->stmt->execute([
            ':fName'=> $this->firstName,
            ':lName'=> $this->lastName,
            ":eName"=> $this->email,
            ':id'=> $this->id
        ]);
        $this->pdo= null;
        $this->stmt = null;
    
}

public function delSql(){
    $this->connector ();

    $sql_delete= ('DELETE FROM `People` WHERE `idPeople` = :id ');
    $this->stmt = $this->pdo -> prepare($sql_delete);
    $this->stmt->execute(
        [':id' => $this->id]
    );
    $this->pdo= null;
    $this->stmt= null;

}

}
    

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
