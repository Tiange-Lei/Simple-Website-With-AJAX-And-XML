<?php
session_start();
$arr = $_SESSION['cart'];
$car_name=$_REQUEST['car_name'];
$car_price=$_REQUEST['car_price'];
$car_pic = $_REQUEST['car_pic'];
$_SESSION['cart']=$arr;
if (is_array($arr)&&isset($car_name)) {
	if (array_key_exists($car_name, $arr)) {
		echo "1";
	}elseif(isset($car_name)){
		$arr[$car_name]= array('name' =>$car_name,'price' => $car_price,'pic'=>$car_pic, 'days'=>1);
		echo "2";
	}
}elseif(isset($car_name)) {
		$arr[$car_name]= array('name' =>$car_name,'price' => $car_price,'pic'=>$car_pic, 'days'=>1);
		echo "2";
}


if (isset($_REQUEST['delete_name'])){
	$deleteName = $_REQUEST['delete_name'];
	$arr = $_SESSION['cart'];
	unset($arr[$deleteName]);
}

$_SESSION['cart']= $arr;

if (isset($_REQUEST['car_names'])&&isset($_REQUEST['car_day'])) {
		foreach ($arr as $key => $value) {
		if ($value['name']==$_REQUEST['car_names']) {
			$_SESSION['cart'][$key]['days']=$_REQUEST['car_day'];
		}
	}
}
if (empty($arr)) {
	session_destroy();
}


?>
