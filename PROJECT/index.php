<html>
<head>
<script>



function test(v){
	alert(v.innerHTML);
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
				msg=msg+"FName: "+resp[i].FName+"<br><br>";
			}
			//alert(msg);
			document.getElementById("txtHint").innerHTML = msg;
		}
		
	};
	var url="jsondb.php?FName="+str;
	//alert(url);
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
	//if (f=0){echo valid;}
	//else{echo invalid;}
}
</script>
</head>
<body>

<p><b>Start typing a name in the input field below:</b></p>
Type a Parameter : <input type="text" id="mytext" onkeyup="showHint()">
<p><span id="txtHint"></span></p>
<br/>
<input type="button" value="show" onclick="showHint()">
</body>
</html>