<?php

require_once "../backend/db.inc.php";

$id = $_GET['id'];

$sql = "delete from usuario where id_usuario = '$id';";

if ($conn->query($sql)) {
      echo "Record deleted successfully";
      header("location:users.php");
   } else {
      echo "Error deleting record: " . mysqli_error($conn);
   }