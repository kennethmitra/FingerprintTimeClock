<?php
  $id = $_POST['s_id'];
  $date = $_POST['s_date'];

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

  $getData = $conn->prepare("SELECT Status,timeScanned FROM log WHERE ID = :query1 AND timeScanned LIKE :query2;");
  $getData->execute($arrayName = array(':query1' => $id,':query2' => "%".$date."%"));
  $data = $getData->fetchAll();
  //echo print_r($data,true);
  $total = 0;
  $difference = 0;
  $iteration = 1;
  $difString = "";
  foreach ($data as $result) {
    $difference = 0;
    if($result['Status'] == "SIGN_IN"){
      $difString = "";
      $lastScanTime = strtotime($result['timeScanned']);
    }elseif($result['Status'] == "SIGN_OUT"){
      $currentTime = strtotime($result['timeScanned']);
      $difference = $currentTime - $lastScanTime;
      $difference = $difference/3600;
      $difference = round($difference,3);
      if($difference > 20){
        $difference = 0;
      }
      $total = $total + $difference;
      $difString = "";
      if($difference > 0){
        $difString = "\t|\t" . $difference;
      }

    }
    echo "<br>" . $result['Status'] . "\t|\t" . $result['timeScanned'] . $difString;
  }
  echo "<hr />";
  echo "Total Hours for " . $date .  ": " . $total;

  if($iteration == 1){
    $lastScanTime = strtotime($result['timeScanned']);
  }else {
    $currentTime = strtotime($result['timeScanned']);

    $lastScanTime = $currentTime;
    $total = $total + $difference/3600;
  }
  $iteration++;



 ?>
