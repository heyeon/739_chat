function showFriendList()
{
}



function noname()
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	//xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	//xmlhttp.send("fname=Henry&lname=Ford");
	
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("chatTexts").innerHTML+= "\n" + xmlhttp.responseText;
				//document.write("<p> "+ xmlhttp.responseText+" </p>");
			}
	}
	xmlhttp.open("POST", "ajax.php", true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("name=a");
}