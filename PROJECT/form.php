<!DOCTYPE html>
<head>
	
	<style type="text/css">
        .error {
            border:2px solid red;
        }
    </style>
</head>

<body>
<script type="text/javascript">

function test(e){
	//<link rel="stylesheet" type="text/css" href="myCSS.css" />      //for CSS Modification (*after head Tag)
	//a=document.form.nm.value;
	a=document.forms[0].elements[0].value;
	msg=document.getElementById("m");
	l1=document.getElementById("fn").value;
	a1=document.forms[0].elements[1].value;
	msg1=document.getElementById("n");
	l2=document.getElementById("ln").value;
	
	if (e.getAttribute("name")=="firstname")
	{
		if(l1.length>0 && l1.length<25 && e.getAttribute("type")=="text"){
		
			msg.innerHTML="Valid";
			msg.style.color="green";
			//document.frm.submit();
			//alert("too short");
		}
		else{
			msg.innerHTML="X Invalid";
			msg.style.color="red";
		}
		
	}
	else if(e.getAttribute("name")=="lastname"){
		
		if(l2.length>0 && l2.length<15 && e.getAttribute("type")=="text")
		{
		
			msg1.innerHTML="Valid";
			msg1.style.color="green";
			//document.frm.submit();
			//alert("too short");
		}
		else{
			msg1.innerHTML="X Invalid";
			msg1.style.color="red";
		}
		
		}
		else
		{
			alert("nothing");
		}
	
	
	//alert(document.frm.ps.value);
}

function test1(e1){
	
	a2 = document.forms[0].elements[3].value;
	msg2 = document.getElementById("o");
	l = document.getElementById("c").value;
	
	if (l.length > 10) {
		
		msg2.innerHTML="X";
		msg2.style.color="red";
	
	}
	else if (l.length < 10 && l.length!="") {
		
		msg2.innerHTML="too Short";
		msg2.style.color="red";
		//document.frm.submit();
		//alert("too short");
	}
	else if (l.length == 10 )
	{
		msg2.innerHTML="OK";
		msg2.style.color="green";
	}
	else
	{
		msg2.innerHTML="X";
		msg2.style.color="red";
	}
	//alert(document.frm.ps.value);
	
}
function checkMail(e) {
	a3 = document.forms[0].elements[4].value;
	msg3 = document.getElementById("p");
    var x = document.getElementById("e").value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        msg3.innerHTML="X";
		msg3.style.color="red";
    }
	else{
		msg3.innerHTML="OK";
		msg3.style.color="green";
	}
	
}

function checkPass(e)
{
	a4 = document.forms[0].elements[5].value;
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
				
				msg4.style.borderColor="red";
			}
			else if (str.length > 50) {
				msg4.innerHTML = "too Long";
				msg4.style.color="red";
			}/*
			else if (str.search(/\d/) == -1) {
				msg4.innerHTML = "No num";
				msg4.style.color="red";
			}
			else if (str.search(/[a-zA-Z]/) == -1) {
				msg4.innerHTML = "No Letter";
				msg4.style.color="red";
			}*/
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

function ConfPass(e1)
{
	a5 = document.forms[0].elements[6].value;
	msg5 = document.getElementById("cc1");
	conf11 = document.getElementById("c11").value;
	if( pass11  === conf11 )
		{
			msg5.innerHTML = "Matched!";
			msg5.style.color="green";
		}
	else
		{
			msg5.innerHTML = "Not Matched!";
			msg5.style.Color="red";
		}
	
}

/*function test(v){
	alert(v.innerHTML);
}*/
function showHint() {
	str=document.getElementById('u11').value;
	//document.getElementById("spinner").style.visibility= "visible";
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			resp=JSON.parse(xmlhttp.responseText);
			msg="";
			
			//msg=msg+" Sorry the user name is taken";
			for(i=0;i<resp.length;i++){
				msg=msg+" It is taken.Try another one.";
			}
			//msg=msg+"Type Uname";
			/*s=resp.length;
			if(s == ""){
				msg=msg+"Type Uname";
			}*/
			

			//msg=msg+" It is taken";
			//alert(msg);
			document.getElementById("txtHint").innerHTML = msg;
		}
		
	};
	var url="unamedb.php?Uname="+str;
	//alert(url);
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}


</script>
<h1> Registration Form </h1>
<label style="color:green;"> Anytime, anywhere you're welcome! </label></br>
<label style="color:green;"> Feel free to give a try :) </label></br></br>
<form action="myPhp.php" method="$_REQUEST">
	<label style="color:blue;"> First Name:    </label> 
	   <input type="text" onkeydown="test(this)" id="fn" name="firstname"/>  <label id="m"></label>
	</br>	</br>	
	<label style="color:blue;"> Last Name:     </label>
	<input type="text" onkeydown="test(this)" id="ln" name="lastname"/><label id="n"></label>
	</br></br>
	
	<label style="color:blue;"> Email: </label>
	<input type="text" onkeydown="checkMail(this)" id="e" name="email"><label id="p"></label>
	</br></br>
	<label style="color:blue;"> Username: </label>
	<input type="text" name="un"  id="u11" onkeyup="showHint()" > <label id="uu1"></label>
	<p id="txtHint"></p>
	</br></br>
	<label style="color:blue;"> Password: </label>
	<input type="password" name="Pass1" onkeyup="checkPass(this)" id="p11" > <label id="pp1"></label>
	</br></br>
	<label style="color:blue;"> Confirm Password: </label>
	<input type="password" name="confpass"  id="c11" > <label id="cc1"></label>
	</br></br>
	<input type="submit" value="Submit">
</form>


<br> <br> <br>

</body>
