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
?>

<?php
@include 'config.php';
if (!empty($_POST["sessionid"])) {
    $sessionid = $_POST['sessionid'];
    $query = "SELECT concat(sectionname,'-',departmentname) as sectionname,sectionid from section left join department on section.departmentid=department.departmentid  where section.sessionid=$sessionid";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo '<option value="">Select Section</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['sectionid'] . '">' . $row['sectionname'] . '</option>';
        }
    }
}
?>
<?php
@include 'config.php';
if (!empty($_POST["sectionid"])) {
    $sectionid = $_POST['sectionid'];
    $query = "select name,id from users where sectionid=$sectionid";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo '<option value="">Select Student</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }
    }
}
?>
<?php
@include 'config.php';
if (!empty($_POST["ssessionid"])) {
    $ssessionid = $_POST['ssessionid'];
    $query = "SELECT course,offer.courseid from offer left join course on offer.courseid=course.courseid left join session on offer.sessionid=session.sessionid where offer.sessionid=$ssessionid";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo '<option value="">Select Course</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['courseid'] . '">' . $row['course'] . '</option>';
        }
    }
}
?>
<?php
@include 'config.php';
if (!empty($_POST["courseid"])) {
    $courseid = $_POST['courseid'];
    $query = "SELECT name,id FROM enrollments left join users on enrollments.studentid=users.id Left join session on enrollments.sessionid=session.sessionid where session.courseid=$courseid";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo '<option value="">Select Course</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }
    }
}
?>

