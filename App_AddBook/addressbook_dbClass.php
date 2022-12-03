<?php
// //Connecting to MYSQL Database. DB_Name: 'Address_Book.DB'
// $dsn = 'mysql:dbname=Address_Book;host=127.0.0.1';
// $user = 'root';
// $password = 'MYSQLp@ssword';

// $pdo = new PDO($dsn, $user, $password);





class sql {

    public $pdo;
    public static $model;
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
public static function connector(){ //USING STATIC FUNCTION FOR DIRECT CALLING ON OTHER METHODS
    //Connecting to MYSQL Database. DB_Name: 'Address_Book.DB'
$dsn = 'mysql:dbname=Address_Book;host=127.0.0.1';
$user = 'root';
$password = 'MYSQLp@ssword';

$pdo = new PDO($dsn, $user, $password);
return $pdo;

}

function addSql(){// Function for inputing intial Data in the DB
    $pdo=self::connector ();
    $sql_add= ' INSERT INTO people(`firstName`,`lastName`,`email`) VALUES (:fName, :lName, :eName);';
    $this->stmt= $pdo->prepare($sql_add);
    $this->stmt->execute([
        ':fName'=> $this->firstName ,
        ':lName'=> $this->lastName,
        ":eName"=> $this->email
    ]);
    
    $pdo=null;
    $this->stmt = null;

    
}

public function getSql(){ // function for updating the database
    $pdo=self::connector ();
        $sqlGet= ('SELECT `idPeople` AS `id`,`firstName` as `FIRST NAME`, `lastName` as `LAST NAME` , `email` FROM `People` WHERE `idPeople` = :id;');
        $this->stmt= $pdo->prepare($sqlGet);
        $this->stmt->execute([
            ':id'=> $this->id
        ]);
         $model = ($this->stmt)->fetch();
         $pdo= null;
         $this->stmt=null;
         return $model;
        

      
}

public function editSql(){ // function for updating the records in the database by key(id)
    $pdo=self::connector ();
        $sqlEdit= ' UPDATE `Address_Book`.`People`
        SET `firstName` = :fName,`lastName`= :lName,`email` = :eName
        WHERE `idPeople`= :id;';
        $this->stmt= $pdo->prepare($sqlEdit);
        $this->stmt->execute([
            ':fName'=> $this->firstName,
            ':lName'=> $this->lastName,
            ":eName"=> $this->email,
            ':id'=> $this->id
        ]);
        $pdo= null;
        $this->stmt = null;
    
}

public function delSql(){
    $pdo=self::connector ();

    $sql_delete= ('DELETE FROM `People` WHERE `idPeople` = :id ');
    $this->stmt = $pdo -> prepare($sql_delete);
    $this->stmt->execute(
        [':id' => $this->id]
    );
    $pdo= null;
    $this->stmt= null;

}

Public function _fetchAll(){
    $pdo=self::connector ();
   
  $sql=  ('SELECT `idPeople` AS `id`,`firstName` as `FIRST NAME`, `lastName` as `LAST NAME` , `email` FROM `People` ORDER BY `lastName`');
    $this->stmt = $pdo->query($sql);
    // $sql= $this->pdo->query('SELECT `idPeople` AS `id`,`firstName` as `FIRST NAME`, `lastName` as `LAST NAME` , `email` FROM `People` ORDER BY `lastName`');
$model= $this->stmt->fetchAll(); // fetches all the query data and store them in Array of array set of values under model of the MVC


// this is for optimization of query engine to break the connection from  the server
$pdo=null;
$this->stmt=null;
 return $model;
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
