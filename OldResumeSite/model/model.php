<?php

function getConnection() {
		$dsn = 'mysql:host=localhost;dbname=userlocation';
                $username = 'jdelawrence';
                $password = 'Paint123';
                try {
                     $db = new PDO($dsn, $username, $password);//
                     
                } catch (PDOException $e) {
                        $errorMessage = $e->getMessage();
                        include '../view/errorPage.php';
                        die;}
                return $db;
             }
         //function that connects to the database and fills an array with values from
           //the database
function allTheCities(){        
                try {
			$db = getConnection();
			$query = "select * from city";
                         mysql_query ("set character_set_client='utf8'"); 
                        mysql_query ("set character_set_results='utf8'"); 

                        mysql_query ("set collation_connection='utf8_general_ci'"); 
			$statement = $db->prepare($query);
			$statement->execute();
			$results = $statement->fetchAll();
			$statement->closeCursor();
			return $results;           
		} catch (PDOException $e) {
			$errorMessage = $e->getMessage();
			include '../view/errorPage.php';
			die;
		}    

}
function getLocationM(){
    try{
    $db = getConnection();
    $query = "select * from simpleuserlocation";
    $statement = $db->prepare($query);
			$statement->execute();
			$results = $statement->fetchAll();
			$statement->closeCursor();
			return $results;           
		} catch (PDOException $e) {
			$errorMessage = $e->getMessage();
			include '../view/errorPage.php';
			die;
		}    
    
    
}
?>
             
