<?php
    // 1. Create a database connection
  $dbhost = "ftp.parcomajella.altervista.org";
  $dbuser = "parcomajella";
  $dbpass = "capeculo0";
  $dbname = "my_parcomajella";
  $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  $connection->set_charset("utf8");
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " .
         mysqli_connect_error() .
         " (" . mysqli_connect_errno() . ")"
    );
  }

  $id = $_GET['id'];
  $query="SELECT ANIMALE.NOME, ANIMALE.ID FROM PERCORSOANIMALE, ANIMALE WHERE PERCORSOANIMALE.PERCORSO={$id} AND ANIMALE.ID=PERCORSOANIMALE.ANIMALE";


  $myArray = array();
  if ($result = $connection->query($query)) {

    while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
  }


  // 5. Close database connection
  mysqli_close($connection);
?>
