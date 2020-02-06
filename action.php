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
$sql= "SELECT username, password FROM localuser";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($_GET["userid"]==$row["username"]){
        if($_GET["password"]==$row["password"]){
          header("Location:http://localhost/html/show.php");
          exit;
        }
        else{
          echo "Please check your username or password.";
        }
      }
      else{
        echo "Please check your username or password.";
      }
    }
}
?>
</body>
</html>
