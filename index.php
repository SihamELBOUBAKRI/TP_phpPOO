<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
 $host='localhost';
 $db='test';
 $user='root';
 $password='';
 
 class Connexion {
    public $pdo;
    public function __construct($host , $db , $user , $password) {
        
        
        try{
            $dsn="mysql:host=$host;dbname=$db";
            $this->pdo = new PDO($dsn , $user , $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
            echo "connected";
           }
           catch(PDOException $e){
               echo "failed" . $e-> getMessage();
           }
    }

    public function CountTable ($rqt){
        $qu = $this->pdo-> query($rqt);
        return $qu->fetchColumn();
    }

 }

 $ex1=new Connexion($host , $db , $user , $password);
 $n = $ex1->CountTable('SELECT count(*) FROM user');
 echo "<br>" .$n ."rows";


?>
    
</body>
</html>