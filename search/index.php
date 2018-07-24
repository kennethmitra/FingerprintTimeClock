<!DOCTYPE html>
  <html>
    <head>
      <title>Search Attendance</title>
      <?php include($_SERVER['DOCUMENT_ROOT'] . "/faviconStylesheets.php"); ?>
      <!-- Bootstrap - Latest compiled and minified CSS -->
        		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<?php include_once("analyticstracking.php") ?>

    </head>
    <body>
      <?php include($_SERVER['DOCUMENT_ROOT'] . "/navigationBar.php"); ?>
      <div class="jumbotron jumbotron-fluid" style="margin:2.5% 5% 2.5% 5%">
        <div class="container">
          <h1 class="display-4">Attendance Search</h1>

            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Query: </span>
                </div>
                <input type="text" id="searchBar" onchange="getResults()" value="<?php echo date('Y-m-d') ?>">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group" style="margin:2% 0% 2% 0%">
                <div class="input-group-prepend">
                  <span class="input-group-text">Mode</span>
                </div>
                <select id="mode" name="mode">
                  <option value="Date Search">Date Search</option>
                  <option value="Name Search">Name Search</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group" style="margin:2% 0% 2% 0%">
                <div class="input-group-prepend">
                  <span class="input-group-text">Team</span>
                </div>
                <select id="team" name="team">
                  <option value="V">Varsity</option>
                  <option value="JV">Junior Varsity</option>
                </select>
                <p style="margin-left:1%;">*Team is only applicable in Date search mode*</p>
              </div>
              <input type="button" value="Search" onclick="getResults()">
            </div>
            <p>"Date Search" returns a comma separated list of people who signed in on a given day | Date Example: <?php echo date('Y-m-d') ?> </p>
            <p>"Name Search" searches for a match within Student Name, Date, or Sign in Status | Name Examples: "Kenneth Mitra" or "SIGN_IN" </p>

      </div>

    </div>

      <div class="jumbotron jumbotron-fluid" style="margin:2.5% 5% 2.5% 5%">

        <div class="container" style="padding:0%">
          <h1 class="display-6">Results</h1>
          <div id="alertSpace" style="margin:1% 2% 0% 2%"></div>
          <div id="results">
            <textarea style="width:100%;margin:0%;height:5em" rows="3"></textarea>
          </div>
        </div>
      </div>
    </body>
    <script>
        function getResults(){
          console.log($("#mode").val());
          if($("#mode").val() === "Name Search"){
            console.log("Get Loose Results");
            txt = $("#searchBar").val();
            $("#results").load("attendanceLooseSearch.php",{query: txt});
            $("#alertSpace").html("<div class='alert alert-success' role='alert'>Results Loaded</div>");
          }else if ($("#mode").val() === "Date Search") {
            console.log("Get Date Results");
            t = $("#team").val();
            console.log("Team: " + t);
            txt = $("#searchBar").val();
            $("#results").load("attendanceDateSearch.php",{query: txt,team:t});
            $("#alertSpace").html("<div class='alert alert-success' role='alert'>Results Loaded</div>");
          }else{
            $("#alertSpace").html("<div class='alert alert-danger' role='alert'>Error: Something went wrong</div>");
          }
        }
    </script>
  </html>
