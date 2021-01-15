window.onload = initAll;
function initAll(){
		var ajax = new XMLHttpRequest();
		ajax.onreadystatechange=function setArray(){
				if(ajax.readyState ==4 && ajax.status == 200){
					var car = ajax.responseXML.getElementsByTagName('car');
					var opt = ajax.responseXML.getElementsByTagName('options');
					for (var k=0; k<car.length;k++){
					var car_model = car[k].childNodes[5].childNodes[0].nodeValue;
					var car_brand = car[k].childNodes[3].childNodes[0].nodeValue;
					var car_year = car[k].childNodes[7].childNodes[0].nodeValue; 
					var status = car[k].childNodes[1].childNodes[0].nodeValue;
					var car_price = car[k].childNodes[15].childNodes[0].nodeValue; 
					document.getElementById('main').innerHTML+="<div class='product'><form action='cart.php' method='POST' target='hideIframe'><div id='picture'><img class='pic' src='images/"+car_model+".jpg'></div><div class='name'></div><div class='des'></div><div class='hidden'></div><div class='hidden2'></div><div class='hidden3'></div><div class='status'></div><div class='input'></div></form></div>";
					document.getElementsByClassName('name')[k].innerHTML="<div>"+car_brand+"-"+car_model+"-"+car_year+"</div>";
					document.getElementsByClassName('hidden')[k].innerHTML="<input type='hidden' name='car_name' value='"+car_brand+"-"+car_model+"-"+car_year+"'>";
					document.getElementsByClassName('input')[k].innerHTML="<input type='submit' value='Add to cart' onclick='return check(this.form.status.value, this.form.car_name.value, this.form.car_pic.value, this.form.car_price.value)'>";
					document.getElementsByClassName('status')[k].innerHTML="<input type='hidden' class='sta' value='"+status+"' name='status'>";
					document.getElementsByClassName('hidden2')[k].innerHTML="<input type='hidden' name='car_price' value='"+car_price+"'>";
					document.getElementsByClassName('hidden3')[k].innerHTML="<input type='hidden' name='car_pic' value='"+car_model+"'>";
					var att =car[k].childNodes;
					var h = att.length;
					var f = h/2;
						for (var i=5; i<f; i++){
							var j=i*2-1;
							document.getElementsByClassName('des')[k].innerHTML+="<div>"+opt[0].childNodes[j].childNodes[0].nodeValue+":&nbsp"+car[k].childNodes[j].childNodes[0].nodeValue+"</div>";	
						}
					}
				}
		}
		ajax.open('GET', 'cars.xml',true);
		ajax.send(null);
}
function check(status, car_name, car_pic,car_price){
		if (status=="N") {
		alert("Sorry, this car is unvailable right now! Try another one please");
		return false;
		}else{

		var ajax2 = new XMLHttpRequest();
		ajax2.open('GET', 'shoppingcart.php?car_name='+car_name+'&car_pic='+car_pic+'&car_price='+car_price,true);
		ajax2.send(null);
		ajax2.onreadystatechange=function result(){
			if(ajax2.readyState ==4 && ajax2.status == 200){
				var result=ajax2.responseText;
				if (result=='2') {
				alert('succeed');
			}
				if(result=='1'){
				alert('This car is already in your reservation!')
				}
			}
		}
	}

	
	}	

