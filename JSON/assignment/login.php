
<head>

<body>
<script type="text/javascript">

function test(e){
	//a=document.form.nm.value;
	a=document.forms[0].elements[0].value;
	msg=document.getElementById("m");
	l1=document.getElementById("fn").value;
		
	if (e.getAttribute("name")=="email")
	{
		if(l1.length>0 && l1.length<25 && e.getAttribute("type")=="text"){
		
			msg.innerHTML="Valid";
			msg.style.borderColor="green";
			//document.frm.submit();
			//alert("too short");
		}
		else{
			msg.innerHTML="X Invalid";
			msg.style.color="red";
		}
		
	}
	
	else
	{
		alert("nothing");
	}
	//alert(document.frm.ps.value);
}
function checkPass(e)
{
	a4 = document.forms[0].elements[1].value;
	msg4 = document.getElementById("pp1");
	pass11 = document.getElementById("p11").value;
	if (pass11.value !="")
		{
			msg4.innerHTML = "Weak";
			msg4.style.color="yellow";
			var str = document.getElementById("p11").value;
			if (str.length < 8) 
			{
				msg4.innerHTML = "Min 8 Char";
				msg4.style.color="red";
			}
			else if (str.length > 50) {
				msg4.innerHTML = "too Long";
				msg4.style.color="red";
			}
			else if (str.search(/\d/) == -1) {
				msg4.innerHTML = "No num";
				msg4.style.color="red";
			}
			else if (str.search(/[a-zA-Z]/) == -1) {
				msg4.innerHTML = "No Letter";
				msg4.style.color="red";
			}
			else
			{
				msg4.innerHTML = "Okay";
				msg4.style.color="Green";
			}
		}
	else
		{
			msg4.innerHTML = "XXXXXXX";
			msg4.style.color="red";
		}
}
function showHint() {
	//f=0;
	//a4 = document.forms[0].elements[1].value;
	//msg4 = document.getElementById("textHint");
	str=document.getElementById('mytext').value;
	//document.getElementById("spinner").style.visibility= "visible";
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			resp=JSON.parse(xmlhttp.responseText);
			msg="";
			for(i=0;i<resp.length;i++){
				msg=" Ok <br>";
				
			}
			//alert(msg);
			document.getElementById("txtHint").innerHTML = msg;
		}
		
	};
	var url="jsondb.php?User=&Pass="+str;
	//alert(url);
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
	//if (f=0){echo valid;}
	//else{echo invalid;}
}
</script>


<img src="untitled.jpg" alt="StuGeek" style="width:1080px;height:100px;"></br></br>
<div style="text-align:center;"><h1 style="color:green;"> Login </h1>
<form action="" method="post">
	<div style="text-align:center;"><label style="color:blue;"> First Name:    </label> 
	<div style="text-align:center;"><input type="text" onkeydown="showhint()" id="fn" name="firstname"/>  <label id="m"></label>
	</br>	</br>	
	
	<div style="text-align:center;"><label style="color:blue;"> Password: </label>
	<div style="text-align:center;"><input type="password" name="Pass1" onkeyup="showhint()" id="p11" > <label id="pp1"></label>
	</br></br>
	</br></br>
	<input type="submit" value="Submit">
</form>


<br> <br> <br>

</body>
</head>