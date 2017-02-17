<?php

include 'properties.php';

if( isset($_POST["latitude"]) && isset($_POST["longitude"]) && isset($_POST["radius"]) ){
  
  $conn = db2_connect( $database , $username , $password );

  if( $conn ){
          
          $latitude = $_POST['latitude'];
          $longitude = $_POST['longitude'];
          $radius = $_POST['radius'];

          $restaurantsArray = array();         
          
          $sql = "select NAME1, STREET, CITY, STATE, ZIP, LONG, LAT from OWNER.RESTAURANT where db2gse.st_distance( loc, db2gse.ST_POINT(".$longitude.", ".$latitude.", 1) , 'STATUTE MILE') < ".$radius."  ";

          $stmt = db2_prepare($conn, $sql);
            if ($stmt) {
                        $result = db2_execute($stmt);
                  if (!$result) {db2_stmt_errormsg($stmt);}
      
        while ($row = db2_fetch_array($stmt)) {
         
          $rowEntry = array(
            'name'=> $row[0], 
            'street' => $row[1], 
            'City' => $row[2],
            'state' => $row[3], 
            'zip' => $row[4],
            'long' => $row[5],
            'lat' => $row[6] );
            array_push( $restaurantsArray, $rowEntry );
        }
         
         $restaurantsArray = json_encode($restaurantsArray);
         echo $restaurantsArray;
      }
   } else { db2_stmt_errormsg($stmt); }
       db2_close($conn);
  }
  else{
    http_response_code(400);
  }

?>