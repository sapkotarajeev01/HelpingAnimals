<?php


$cname = $_POST['cname'];
echo $cname;


$cnum = $_POST['cnum'];
echo $cnum;

$cexp = $_POST['cexp'];
echo $cexp;

$code = $_POST['code'];
echo $code;





	try{
		
    $connection_string = 'mysql:host=localhost:3306;dbname=db_rsapkota_I505';
    $db_user = 'rsapkota_I505';
    $db_pwd = 'pfD$2021';
		
    $conn_pdo2 = new PDO($connection_string,$db_user,$db_pwd);
    $conn_pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
    //echo "conencted to database successfully"."</br>";
   
		$cnum_md5 = md5($cnum);
		$cexp_md5 = md5($cexp);
		$code_md5 = md5($code);
		
    $sqlqry2="INSERT INTO paymentinfo(c_name,c_num,c_exp,c_ode) VALUES(:c_n,:c_m,:c_e,:c_o)";
		
		
        $statement2 = $conn_pdo2->prepare($sqlqry2);
        //echo "after prepare"."</br>";
        $statement2->bindvalue(':c_n', $cname);
        $statement2->bindvalue(':c_m', $cnum_md5);
        $statement2->bindvalue(':c_e',$cexp_md5);
		$statement2->bindvalue(':c_o',$code_md5);
		
		
		
         //echo "after bind"."</br>";
          
	$count= $statement2->execute();
		header("location: thankyou.php");
         // echo "after exec"."</br>";
        //echo "<br><hr>";	
     //echo "New Records:  ".$count." Successfully inserted into paymentinfo table";  
      //echo "<br><hr>";
     
 
	$conn_pdo2=null;
	
    }

catch (PDOException $e){
    die($e->getMessage());
}
?>