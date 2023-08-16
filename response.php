<?php
@include 'config.php';
if (!empty($_POST["id"])) {
    $id = $_POST['id'];
    $query = "SELECT users.name,users.id,section.sectionid from enrollments LEFT JOIN users on enrollments.studentid=users.id LEFT JOIN section on enrollments.sectionid=section.sectionid where enrollments.sectionid=$id";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo '<option value="">Select Student</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }
    }
}
