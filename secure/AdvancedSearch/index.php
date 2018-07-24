<!DOCTYPE html>
  <html>
    <head>
      <title>Search Attendance</title>

      <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/library/header.php"); ?>

    </head>
    <body>
      <?php include($_SERVER['DOCUMENT_ROOT'] . "/secure/navigationBar.php"); ?>

      <div class="jumbotron jumbotron-fluid" style="margin:2.5% 5% 2.5% 5%">
        <div class="container">
          <h1 class="display-4">Advanced Search</h1>
          <p> Select Student and enter date</p>

            <div class="form-group">
              <div class="input-group" style="margin:2% 0% 2% 0%">
                <div class="input-group-prepend">
                  <span class="input-group-text">Student</span>
                </div>
                <!--Begin Student Selector-->
                <select id="student_selector" name="student_selector" style="">
                  <?php
                    require("secretSettings.php");
                    $conn = null;
                    try{
                        $conn = new PDO("mysql:host=$SERVERNAME;dbname=$DBNAME", $USERNAME, $PASSWORD);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    }catch(PDOException $e)
                    {
                        echo "\nConnection aborted: " . $e->getMessage();
                        exit;
                    }
                    $getData = $conn->prepare("SELECT First_Name,Last_Name,ID FROM Student_Info ORDER BY First_Name;");
                    $getData->execute();
                    $data = $getData->fetchAll();
                  //  echo print_r($data,true);
                    foreach ($data as $person) {
                      echo "<option value='" . $person['ID'] . "'>" . $person['First_Name'] . " " . $person['Last_Name'] . "</option>";
                    }
                  ?>
                </select>
                <!-- End Student Selector-->
              </div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Date</span>
                </div>
                <input type="text" id="searchBar" onchange="getResults()" value="<?php echo date('Y-m-d') ?>">
                <input type="button" value="Search" onclick="getResults()">
              </div>
            </div>
            <p>Returns log of fingerprint scans for the requested time period along with the total time logged | Date Example: <?php echo date('Y-m-d') ?>  or <?php echo date('Y-m') ?> </p>


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
      <script>
          function getResults(){
            id = $("#student_selector").val();
            date = $("#searchBar").val();
            console.log("Selected Student Finger ID: " + $("#student_selector").val());
            console.log("Date: " + date);
            $("#results").load("advancedSearchAction.php",{s_id:id,s_date:date});
          }
      </script>
    </body>

  </html>
