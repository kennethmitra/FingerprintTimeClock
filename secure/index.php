<!DOCTYPE html>
<html>
	<head>
		<title>Hours Page</title>
		<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/library/header.php"); ?>
        <noscript>
            <meta http-equiv="refresh" content="5">
        </noscript>
	</head>
	<body style="background-color: black" onload="loadTable()">
		<?php include($_SERVER['DOCUMENT_ROOT'] . "/secure/navigationBar.php"); ?>


	<div style="text-align:center;">
		<h1>
			<font color="red">
				Dulles Robotics Club Hours Page<br/>
				<!--TEMPORARILY OFFLINE; CHECK BACK SOON-->
			</font>
			<font color = "white">
				How long have you spent in robotics?
			</font>
		</h1>
		<p style="color: white">This page automatically updates every 2 seconds.</p>
		<noscript>
		    <h1 style="color: yellow">This page works better with javascript enabled</h1>
				<h3>But Kenneth the Genius has programmed the web page to accomodate your anti Javascript stance</h3>
		</noscript>

	<div id="tableContainer"><!--Begin Container -->

	</div> <!--close table container-->
	    <script>

	        function loadTable(){
	            $("#tableContainer").load("returnTable.php");
	            console.log("Table loaded");
	        }
	        window.setInterval(function(){loadTable()},2000);
	    </script>



	</div>

</html>
