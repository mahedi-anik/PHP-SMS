<?php
include "config.php";
$id = $_GET["id"];
$sql = "DELETE FROM `department` WHERE departmentid = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: department.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}