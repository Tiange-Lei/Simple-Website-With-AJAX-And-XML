<!DOCTYPE html>
<html>
<head>
	<title>Reservation</title>
</head>
<body>
	<style type="text/css">
		*{margin:0;
		padding: 0}
		.button{ margin-left: 550px }
		td,tr{text-align: center;}
		#days{
			width: 50px;
		}
		table{margin: auto}
		header{height: 62px;
				background-color: #0066cc}
		header,main{min-width: 1280px;

		}
		#title{text-align: center;
				padding-top: 10px;
				color: white;
				font-size: 22px;}
	</style>
	<header>
	<div id="title">Car Rental Center</div>
	</header>
	<main>
	<div style="text-align: center; font-size:20px">Car Reservation</div>
	<table id="table">
		<tr>
			<th width="200px">
				Thumbnail
			</th >
			<th width="250px">
				Vehicle
			</th>
			<th width="120px">
				Price per day
			</th>
			<th width="120px">
				Rental days
			</th>
			<th width="100px">
				action
			</th>
		</tr>
<?php
	session_start();
	$arr = $_SESSION['cart'];
	if (isset($arr)) {
	foreach($arr as $a ){
?>
	<tr>
		<td>
			<img src="images/<?php echo $a['pic']?>.jpg" style="width: 200px ;height:150px">
		</td>
		<td>
			<?php echo $a['name'];?>
		</td>
		<td>
			<?php echo $a['price'];?>
		</td>
		<td>
			<form action="#" method="POST">
			<input id='days' type="number" name="car_day" value="<?php echo $a['days'];?>" onchange="update(this.form.car_day.value,this.form.car_names.value)">
			<input type="hidden" name="car_names" value="<?php echo $a['name'];?>">
			</form>
		</td>
		<td>
			<form action="#" method="POST">
			<input type="hidden" name="delete_name" value="<?php echo $a['name']?>">	
			<input type="submit" value='delete' onclick="check(this.form.delete_name.value)">
			</form>
		</td>
	</tr>
<?php } ?>
	<tr>
		<td colspan="5">
			<input type="button" value="proceeding to CheckOut" onclick="checkcars()" class="button">
			<input type="button" name="button" value="back" onclick="location='A2.html'">
		</td>
	</tr>
	</table>
<?php }else{ ?>
	<tr>
		<td colspan="5" rowspan="3" style="height: 100px; color: red">Nothing is here </td>
	</tr>
	<tr>
		<td colspan="5"></td>
	</tr>
	<tr>
		<td colspan="5"></td>
	</tr>
	<tr>
		<td colspan="5">
			<input type="button" value="proceeding to CheckOut" onclick="checkcars()" class="button">
			<input type="button" name="button" value="back" onclick="location='A2.html'" >
		</td>
	</tr>
	</table>
<?php }?>
	</main>
<script type="text/javascript">
	function check(delete_name){
		var ajax3 = new XMLHttpRequest();
		ajax3.open('GET','shoppingcart.php?delete_name='+delete_name,true);
		ajax3.send(null);
		ajax3.onreadystatechange=function result(){
			}
		}
	function update(car_day,car_names){
		var ajax4 = new XMLHttpRequest();
		ajax4.open('GET','shoppingcart.php?car_names='+car_names+'&car_day='+car_day,true);
		ajax4.send(null);
		if (car_day<=0) {
			alert("Please check the days you input!")
		}
		ajax4.onreadystatechange=function result2(){
	
			}
		}
	function checkcars(){
		var ajax5 = new XMLHttpRequest();
		ajax5.open('GET','shoppingcart2.php',true);
		ajax5.send(null);
		ajax5.onreadystatechange=function result2(){
			if(ajax5.readyState ==4 && ajax5.status == 200){
			if (ajax5.responseText ==3) {
				alert("No car has been reserved.");
				window.location.href="A2.html";
			}else{
				window.location.href="checkout.php";
			}
			}
			}
		}

</script>
</body>
</html>
