<!DOCTYPE html>
<html>
	<head>
		<title>Hours Page</title>
		<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/library/header.php"); ?>
        <noscript>
            <meta http-equiv="refresh" content="5">
        </noscript>
	</head>
	<body style="" onload="loadTable()">
		<?php include($_SERVER['DOCUMENT_ROOT'] . "/secure/navigationBar.php"); ?>


	<div style="text-align:center;">
		<h1>
			<font color="red">
				Dulles Robotics Club Hours Page<br/>
			</font>
			<font color = "">
				How long have you spent in robotics?
			</font>
		</h1>
		<p style="">This page automatically updates every 2 seconds.</p>
		<noscript>
		    <h1 style="color: yellow">This page works better with javascript enabled</h1>
				<h3>But Kenneth the Genius has programmed the web page to accomodate your anti Javascript stance</h3>
		</noscript>

	<div class="container container-fluid" id="tableContainer"><!--Begin Container -->

	</div> <!--close table container-->
	    <script>

	        function loadTable(){
	            $("#tableContainer").load("newTable.php");
	            console.log("Table loaded");
	        }
	        window.setInterval(function(){loadTable()},2000);
	    </script>



	</div>

</html>
