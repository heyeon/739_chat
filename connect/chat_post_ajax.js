
			var handle;
			
			function scrollBox()
			{
				$("chatTexts").scrollTop(200); // this was an attempt to make the chatText textarea autoscroll but something is missing. May be you can have a look.
			}
			
			function submitChat()
			{
				if ($('#inputTextArea').val() != "")
				{
					$.post("ajax.php", {newMessage:$('#inputTextArea').val(),sender:$("#handle").html()}, 
						function(data)
						{
							$("#inputTextArea").val("");
							scrollBox();
						}
					);
				}
			}
			
			
			
			function update()
			{
				$.post("ajax.php", {chat:$('#inputTextArea').val(),sender:$("#handle").html()}, 
				function(data)
					{
						if (data != "")
						{
							var messages = data.split("<br>");
							var numNewMessages = messages.length;
							for (i = 0; i < numNewMessages-1; i++)
							{
								$("#chatTexts").val($("#chatTexts").val()+ "\n"+messages[i]);
							}
						}
						
					}
				); 
				
				$.post("ajax.php", {friendList:"friendList"}, 
				function(data)
					{
						var frndList = data.split("<br>");
						$('#friendList').empty();
						var length = frndList.length;
						for (i = 0; i < length-1; i++)
						{
							var row = $("<tr><td>" + frndList[i] +"</td><td> <img src = 'img/online.png' width='10px' height='10px' /></td></tr>");
							$('#friendList').append(row);
						}
					}
				); 
				setTimeout('update()', 1000);
			}
			function checkUserName()
			{	
				if (!$("#handle").val())
				{
					$("#error2").text("");
				}
				else
				{
					$.post("ajax.php", {handle:$("#handle").val()}, 
					function(data)
						{
							if (data == "false")
							{
								$("#error2").text("User name not available");
							}
						}		
					);
				}				
			}
			
			$(document).ready
			(
				function()
				{$("#error").text("");
					update();
					$("#loginForm").validate({ 
					rules: { 
						loginHandle: "required",
						loginPassword: "required"
					}}); 
					$("#signup").validate({ 
						rules: { 
						fname: "required",
						lname: "required",
						email: {
							required: true, 
							email: true 
					},
					handle: "required",
					passwd: "required"
					}}); 
	     
				});
		</script>
