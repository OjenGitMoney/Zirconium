<?php

include 'properties.php';

if(isset($_GET)){
   
  $conn = db2_connect( $database , $username , $password );

  if( $conn ){
         
          $sql = "select * from OWNER.SCHOOL";
          $stmt = db2_prepare($conn, $sql);
            if ($stmt) {
                        $result = db2_execute($stmt);
        if (!$result) {db2_stmt_errormsg($stmt);}

      $schoolsArray = array();
      while ($row = db2_fetch_array($stmt)) {
         
          $rowEntry = array(
            'name'=> $row[0], 
            'street' => $row[2], 
            'City' => $row[3],
            'state' => $row[4], 
            'zip' => $row[5],
            'long' => $row[7],
            'lat' => $row[8] );
            array_push($schoolsArray, $rowEntry);
        }
         
         $schoolsArray = json_encode($schoolsArray);
         echo $schoolsArray;
      }
   } else { db2_stmt_errormsg($stmt); }
       db2_close($conn);
  }
  else{
    http_response_code(404);
  }

?>