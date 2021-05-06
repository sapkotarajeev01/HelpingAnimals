<?php


$fname = $_POST['fname'];
echo $fname;


$lname = $_POST['lname'];
echo $lname;

$email = $_POST['email'];
echo $email;

$amount = $_POST['amount'];
echo $amount;

$street = $_POST['street'];
echo $street;

$city = $_POST['city'];
echo $city;


$state = $_POST['state'];
echo $state;

$zip = $_POST['zip'];
echo $zip;



	try{
		
    $connection_string = 'mysql:host=localhost:3306;dbname=db_rsapkota_I505';
    $db_user = 'rsapkota_I505';
    $db_pwd = 'pfD$2021';
		
    $conn_pdo2 = new PDO($connection_string,$db_user,$db_pwd);
    $conn_pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
    //echo "conencted to database successfully"."</br>";
   
    $sqlqry2="INSERT INTO DonateUser(UFirst_Name,ULast_Name,UEmail,UAddress_Street,UAddress_City,UAddress_State,UAddress_Zip,Donate_Amount) VALUES(:u_f,:u_l,:u_e,:u_s,:u_c,:u_st,:u_z,:u_a)";
		
		
        $statement2 = $conn_pdo2->prepare($sqlqry2);
        //echo "after prepare"."</br>";
        $statement2->bindvalue(':u_f', $fname);
        $statement2->bindvalue(':u_l', $lname);
        $statement2->bindvalue(':u_e',$email);
		$statement2->bindvalue(':u_s',$street);
		$statement2->bindvalue(':u_c',$city);
		$statement2->bindvalue(':u_st',$state);
		$statement2->bindvalue(':u_z',$zip);
		$statement2->bindvalue(':u_a',$amount);
		
		
         //echo "after bind"."</br>";
          
	$count= $statement2->execute();
		
		header("location: Paymentdesign.php");
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