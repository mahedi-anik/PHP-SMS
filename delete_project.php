<?php
include "config.php";
$id = $_GET["id"];
$sql = "DELETE FROM `projectidea` WHERE projectideaid = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: project.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}