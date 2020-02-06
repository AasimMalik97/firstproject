<html>
<body>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <style>
    #infoform{
      padding: 5%;
    }
    .container{
      margin-top: 5%;
      margin-left: 20%;
    }
    #add-but{
      display: flex;
      margin-left: 35%;
    }
    hr{
      margin-right: 22%;
      margin-top: -4%;
    }
    h5{
      margin-right: 10px;
    }
  </style>
  <div class="container">
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
  $sql= "SELECT id, type, name FROM favorite";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $number = $row["id"];
          $type = $row["type"];
          $name = $row["name"];
          echo "<div class='row'>";
          echo "<br> <div class='col-2'> Id: : ". $row["id"]. "</div> <div class='col-2'>  Type : ". $row["type"]. "</div> <div class='col-2'> Name : " . $row["name"]."</div>";
          echo "<div class='col-2'><form action='delete.php' method='get'>
                <input type='hidden' name='delete' value=".$row["id"].">
                <input type='submit' class='btn btn-danger'   value='Delete'>
                </form></div>";
          echo "<div class='col-2'><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#update-model'>
                Update
                </button> </div>
                <div class='container'>

                <div id='update-model' class='modal fade' role='dialog' >
                <div class='modal-dialog'>
                  <div class='modal-content' id='infoform'>
                    <div class='model-header'>
                    <h4 class='modal-title form-text text-muted'> Please add new information here. </h4>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    </div>
                    <div class='model-body'>
                      <form action='update.php' method='post'>
                      <label> Id: ".$row["id"]."</label>
                      <input type='hidden' name='id' value=".$row["id"].">
                      <br>
                      <label> Type: </label>
                      <input type='text' name='type' class='form-control' Value=".$row["type"]." required><br>
                      <label> Name: </label>
                      <input type='text' name='name' class='form-control' Value=".$row["name"]." required><br>
                      <input type='submit' class='btn btn-info' value='Submit'><br>
                  </form>
                </div>
                </div>
              </div>
              </div>
              </div>
              </div>
              <hr>";
      }
  } else {
      echo "0 results";
  }

  $conn->close();
  ?>
</div>
<div id="add-but">
  <p><h5> For adding new Information: </h5></p>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-model">
  Add
</button>
</div>
<div class="container">
  <div id="add-model" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content" id='infoform'>
      <div class="model-header">
        <h4 class="modal-title form-text text-muted"> Please add new information here. </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="model-body">
        <form action="add.php" method="post">
          <label> Id: </label>
          <input type="number" name="id" class="form-control" placeholder="Id" required><br>
          <label> Type: </label>
          <input type="text" name="type" class="form-control" placeholder="Type" required><br>
          <label> Name: </label>
          <input type="text" name="name" class="form-control" placeholder="Name" required><br>
          <input type="submit" class="btn btn-info" value="Submit"><br>
        </form>
      </div>
      </div>
    </div>
    </div>
  </div>
  </div>
</div>

</body>
</html>
