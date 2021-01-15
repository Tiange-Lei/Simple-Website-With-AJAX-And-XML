<?php 
 session_start();
 $arr=$_SESSION['cart'];
 $name = $_REQUEST['customer_name'];
 $email = $_REQUEST['customer_email'];
 foreach($arr as $a ){
 	$car_name.="car model: ".$a['name']."\ncar price for single day: ".$a['price']."\nrent days: ".$a['days']."\n\n";
 	$total+=$a['price']*$a['days'];
 }
 if (isset($email)&&$email!=="") {
 	$to= $email;
	$address = $email;
	$customer_name=$name;
	$subject = "Order confirmation";
	$message = "Hello, ".$customer_name.", your order has been confirmed.\n Details are as below:\n\n".$car_name."\n Total price: ".$total."\n\n\n Best regards\nUTS RENT";
	$from = "smtp.it.uts.edu.au";
	$headers = "From:".$from;
	mail($to,$subject,$message,$headers);
	echo "1";
	session_destroy();
 }else{
 	echo "2";
 }











 ?>