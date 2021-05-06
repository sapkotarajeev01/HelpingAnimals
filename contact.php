<?php


$name = $_POST['name'];
echo $name;




$email = $_POST['email'];
echo $email;

$phone = $_POST['phone'];
echo $phone;



$country = $_POST['country'];
echo $country;

$message = $_POST['message'];
echo $message;



	try{
		
    $connection_string = 'mysql:host=localhost:3306;dbname=db_rsapkota_I505';
    $db_user = 'rsapkota_I505';
    $db_pwd = 'pfD$2021';
		
    $conn_pdo2 = new PDO($connection_string,$db_user,$db_pwd);
    $conn_pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
    //echo "conencted to database successfully"."</br>";
   
    $sqlqry2="INSERT INTO contact(u_name,u_email,u_phone,u_country,u_message) VALUES(:u_n,:u_e,:u_p,:u_c,:u_m)";
		
		
        $statement2 = $conn_pdo2->prepare($sqlqry2);
        //echo "after prepare"."</br>";
        $statement2->bindvalue(':u_n', $name);
        $statement2->bindvalue(':u_e', $email);
		$statement2->bindvalue(':u_p', $phone);
        $statement2->bindvalue(':u_c',$country);
		$statement2->bindvalue(':u_m',$message);
		
		
         //echo "after bind"."</br>";
          
	$count= $statement2->execute();
		
		header("location: thankyouc.php");
         // echo "after exec"."</br>";
        //echo "<br><hr>";	
     //echo "New Records:  ".$count." Successfully inserted into DonateUser table";  
      //echo "<br><hr>";
     
 
	$conn_pdo2=null;
	
    }

catch (PDOException $e){
    die($e->getMessage());
}
?>