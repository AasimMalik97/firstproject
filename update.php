<html>
<body>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="username";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$number = $_POST["id"];
$type = $_POST["type"];
$name = $_POST["name"];
$sql= "UPDATE `favorite` SET `type`='$type',`name`='$name' WHERE id=$number";
$result = $conn->query($sql);
header("Location:http://localhost/html/show.php");
exit;
?>
Done
</body>
</html>
