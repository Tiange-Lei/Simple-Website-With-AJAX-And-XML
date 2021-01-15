<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
</head>
<style type="text/css">
		*{margin:0;
		padding: 0}
		header{height: 62px;
				background-color: #0066cc}
				#title{text-align: center;
				padding-top: 10px;
				color: white;
				font-size: 22px;}
		header,main{min-width: 1280px;

		}
		#table{border: 1px solid black;
				text-align: center;
				border-collapse: collapse;
				margin:auto;
				margin-top: 5px;}
		span{color: red}
		.input{
			width: 250px;
		}
		#checkbox{ border:1px solid black;
			width: 500px;
			margin: auto;
			margin-top: 2px;
			text-align: left;
			margin-top: 10px;
		}
		#input1{margin-left: 190px}

</style>
<body>
	<header>
	<div id="title">Car Rental Center</div>
	</header>
	<main>
<?php 
session_start();
$arr = $_SESSION['cart'];
?>

	<table id="table" border="1">
		<tr>
			<th colspan="4" style="background-color: #4fa4ff">Reservation</th>
		</tr>
		<tr>
			<th width="250px">
				Vehicle
			</th>
			<th width="120px">
				Price per day
			</th>
			<th width="120px">
				Rental days
			</th>
			<th width="120px">
				price
			</th>
		</tr> 
<?php
if(isset($arr)){

		foreach($arr as $a ){
					$total+=$a['price']*$a['days'];
?>
	<tr>
		<td>
			<?php echo $a['name'];?>
		</td>
		<td>
			<?php echo $a['price'];?>
		</td>
		<td>
			<?php echo $a['days']?>
		</td>
		<td>
			<?php echo $sum= $a['price']*$a['days']?>
		</td>
	</tr>
<?php }?>
		<tr>
			<td>total</td>
			<td colspan="3"><?php echo $total ?></td>
		</tr>
	</table>
<?php }?>
 	<table id="checkbox">
 		<form action="#" method="post">
 		<tr>
 			<td colspan="2" style="text-align: center;border-bottom: 1px solid black">Check Out Form</td>
 		</tr>
 		<tr>
 			<td>
 				First Name<span>*</span>:
 			</td>
 			<td>
 				<input type="text" name="firstname" id="firstname" class="input">
 			</td>
 		</tr>
  		<tr>
 			<td>
 				Last Name<span>*</span>:
 			</td>
 			<td>
 				<input type="text" name="lastname" id="lastname" class="input">
 			</td>
 		</tr>
  		<tr>
 			<td>
 				Address<span>*</span>:
 			</td>
 			<td>
 				<input type="text" name="address" id="address" class="input">
 			</td>
 		</tr>
 		<tr>
 			<td>
 				Post code<span>*</span>:
 			</td>
 			<td>
 				<input type="text" name="postCode" id="postCode" class="input">
 			</td>
 		</tr>
   		<tr>
 			<td>
 				Suburb<span>*</span>:
 			</td>
 			<td>
 				<input type="text" name="suburb" id="suburb" class="input">
 			</td>
 		</tr>
   		<tr>
 			<td>
 				State<span>*</span>:
 			</td>
 			<td>
 				<select size="1" class="input" name="state" id="state">
 				<option></option>
 				<option>AUSTRALIA CAPITAL TERRITORY</option>
 				<option>NORTHERN TERRITORY</option>
 				<option>WEST AUSTRALIA</option>
 				<option>TASMANIA</option>
 				<option>VICTORIA</option>
 				<option>NEW SOUTH WALES</option>
 				<option>QUEENSLAND</option>
 				<option>SOUTH AUSTRALIA</option>
 				</select>
 			</td>
 		</tr>
   		<tr>
 			<td>
 				Country<span>*</span>:
 			</td>
 			<td>
 				<input type="text" name="country" id="country" class="input">
 			</td>
 		</tr>
    	<tr>
 			<td>
 				Email<span>*</span>:
 			</td>
 			<td>
 				<input type="text" name="email" id="email" class="input">
 			</td>
 		</tr>
 		<tr>
 			<td>
 				Payment<span>*</span>:
 			</td>
 			<td>
 				<select size="1" class="input" name="payment" id="payment">
 				<option></option>
 				<option>VISA</option>
 				<option>MASTERCARD</option>
 				<option>PAYPAL</option>
 				</select>
 			</td>
 		</tr>
 		<tr>
 			<td colspan="2">
 				<input id='input1'type="submit" name="submit" value="booking" onclick="return sendmail(this.form.firstname.value,this.form.email.value)">
 				<input id='input2'type="button" name="button" value="back" onclick="location='reserve.php'">
 			</td>
 		</tr>
 	</form>
 	</table>
 	<div style="text-align: center;"> You are required to pay $<?php echo $total ?></div>
 </main>

<script type="text/javascript">
 	function sendmail(firstname,customer_email){
 		var customer_email = document.getElementById('email').value;
 		if (document.getElementById('firstname').value =="") {
 			alert('Please enter your firstname');
 			return false;
 		}else if (document.getElementById('lastname').value =="") {
 			alert('Please enter your lastname');
 			return false;
 		}else if (document.getElementById('address').value =="") {
 			alert('Please enter your address');
 			return false;
 		}else if (document.getElementById('postCode').value =="") {
 			alert('Please enter your post code');
 			return false;
 		}else if (document.getElementById('suburb').value =="") {
 			alert('Please enter your suburb');
 			return false;
 		}else if (document.getElementById('state').value =="") {
 			alert('Please choose your state');
 			return false;
 		}else if (document.getElementById('email').value =="") {
 			alert('Please enter your email');
 			return false;
 		}else if (document.getElementById('payment').value =="") {
 			alert('Please choose your payment');
 			return false;
 		}else if (customer_email.split("@").length ==1 || customer_email.split(".").length==1){
 			alert("wrong email address");
 			return false;
 		}
 		var ajax3 = new XMLHttpRequest();
		ajax3.open('GET','email.php?customer_email='+customer_email+'&customer_name='+firstname, true);
		ajax3.send(null);
		window.event.returnValue = false;
		ajax3.onreadystatechange=function result(){
			if(ajax3.readyState ==4 && ajax3.status == 200){
				var result=ajax3.responseText;
				if (result=="1") {
				alert("Your order has been completed, please check your mailbox for more information!");
				self.location='A2.html';
			}else{
				alert('Cannot connect to the internet');
			}
			}
		}
	}



 </script>
</body>
</html>

