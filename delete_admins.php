<?php
include "config.php";
$id = $_GET["id"];
$sql = "DELETE FROM `admins` WHERE adminid = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: admins.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}