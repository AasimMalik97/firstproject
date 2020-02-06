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
$num = $_POST["id"];
$type = $_POST["type"];
$name = $_POST["name"];
$sql= "SELECT id, type, name FROM favorite";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($row["id"]==$num){
        header("Location:http://localhost/html/show.php");
        echo "string";
        exit;
      }
    }
  }
$sql2 ="INSERT INTO favorite(id, type, name) VALUES ($num,'$type','$name')";
$result2 = $conn->query($sql2);
header("Location:http://localhost/html/show.php");
echo "string";
exit;
?>

</body>
</html>
