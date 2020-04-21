<!DOCTYPE html>
<html>
<head>
	<title>Subscribe to RSS</title>
	<link rel = "icon" href = "index.jpeg" type = "image/x-icon"> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style type="text/css">

	</style>
</head>
<body>
	<nav class="navbar navbar-default" style="background-color: #2B60DE">
		<div class="container-fluid" id="navigation">
			<div class="navbar-header">
				<a class="navbar-brand" href="#" style="color: white"><b>BLUE BUS</b></a>
			</div>
			<ul class="nav navbar-nav" style="position: relative;left: 50%;">
				<li><a href="http://localhost/WT2/rss_feeds.php"style="color: white">RSS Feed</a></li>
				<li><a href="http://localhost/WT2/history.php"style="color: white">Previous Bookings</a></li>
				<li><a href="http://localhost/WT2/tickets.php"style="color: white">View Tickets</a></li>
				<li class="active"><label href="" onclick="sign_out()" style="position: relative;top: 15px;cursor: pointer;">Sign out</label></li>
			</ul>
		</div>
	</nav>
	<img src="blue.png" alt="all INDIA travels">
	<div class="big-container" style="position: relative;margin-left: 30%;border: 2px solid black;padding: 20px;width: 50%;">
		<span><h1>Subscribe to famous Bus Travels</h1></span><br>
		<h1>  </h1>
		<div >
			<img src="srs1.png" alt="all INDIA travels">
		<input class="airline" type="checkbox" name="company" value="indigo"><span><h2>SRS Travels</h2></span><br>
	</div>
		<h1>  </h1>
		<div >
			<img src="vrl.png" alt="all INDIA travels">
		<input class="airline" type="checkbox" name="company" value="jet_airways"><span><h2>VRL</h2></span><br>
	</div>
		<h1>  </h1>
		<div >
			<img src="ksrtc.png" alt="all INDIA travels">
		<input class="airline" type="checkbox" name="company" value="air_india"><span><h2>KSRTC</h2></span><br>
	</div>
		<h1>  </h1>
		<button id="Subscribe" onclick="subscribe()"><h3>Subscribe!</h3></button>
		<h1>  </h1>
	</div>

	<div id="success" style="display: none;position: absolute;border: 2px solid black;left: 40%;top: 40%;background-color: #90EE90;">
		<span id="close" style="cursor: pointer;position: relative;left: 85%;"><u>Close</u></span>
		<div style="padding: 50px;">Subscribed successfully.</div>
	</div>

</body>
<script type="text/javascript">

	var close = document.getElementById('close');
	close.onclick = function (e) {
		var parent = e.target.parentElement.parentElement;
		console.log(parent);
		parent.style.display = 'none';
	}
	function show_success()
	{
		var success = document.getElementById('success');
		success.style.display = 'block';
	}

	function subscribe()
	{
		var checked = []
		var inputs = document.getElementsByClassName('airline');
		for(var i = 0;i<inputs.length;i++)
		{
			if(inputs[i].checked == true)
				checked.push(inputs[i].value);
		}

		var data = checked;
		var myJSON = JSON.stringify(data);
		console.log(myJSON);

		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function()
		{
			if(xhr.readyState == 4 && xhr.status == 200)
			{
				console.log(xhr.responseText);
				show_success();
			}
		};
		xhr.open("POST", "http://localhost:5500/subscribe", true);
		xhr.setRequestHeader("Content-Type","application/json");
		xhr.send(myJSON);
	}

	function sign_out()
	{
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function()
		{
			if(xhr.readyState == 4 && xhr.status == 200)
			{
				console.log("Signed out is : ",xhr.responseText);
				window.location.href = "http://localhost/WT2/sign_in.php";
			}
		};
		xhr.open("GET", "http://localhost:5500/sign_out", true);
		xhr.send();
	}

</script>
</html>