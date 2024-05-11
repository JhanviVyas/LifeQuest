<?php
  session_start();

  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
  {
    header("location: index.php");
    exit;
  }
  else
  {
    require 'includes/config.php';
  }

?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
  <title>LifeQuest Alliance | Dashboard</title>

	 

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


  <style>
	.col-wh{
		color:white;
	}
  </style>
</head>

<body>

    <?php require 'includes/header.php';
    ?>
      <div class="container-fluid">

          <div class="row">
            <?php require 'includes/leftbar.php';?>
       

            <div class="col" style="margin-top:62px;">
              <h2 class="pt-3">Dashboard</h2>
              <hr>


              <?php 
                $sql = "SELECT * FROM `thebloodgroup`";
                $result = mysqli_query($conn , $sql);
                $row = mysqli_num_rows($result);
              ?>
              <div class="row">
                <div class="col-sm-6">
                  <div class="card text-center">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row;?></h5>
                      <p class="card-text">LISTED BLOOD GROUPS</p>
                      <a href="manage-blood-group.php" class="btn btn-success d-grid">FULL DETAIL</a>
                    </div>
                  </div>
                </div>


                <?php 
                  $sql = "SELECT * FROM `theblooddonors`";
                  $result = mysqli_query($conn , $sql);
                  $row = mysqli_num_rows($result);
                ?>
                <div class="col-sm-6 pb-3">
                  <div class="card text-center">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row; ?></h5>
                      <p class="card-text">REGISTERED DONORS LIST</p>
                      <a href="donor-list.php" class="btn btn-warning d-grid">FULL DETAIL</a>
                    </div>
                  </div>
                </div>


                <?php 
                  $sql = "SELECT * FROM `thecontactusquery`";
                  $result = mysqli_query($conn , $sql);
                  $row = mysqli_num_rows($result);
                ?>
                <div class="col-sm-6">
                  <div class="card text-center">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row; ?></h5>
                      <p class="card-text">TOTAL QUERIES</p>
                      <a href="manage-query.php" class="btn btn-info d-grid">FULL DETAIL</a>
                    </div>
                  </div>
                </div>


                <?php 
                  $sql = "SELECT * FROM `thebloodrequirer`";
                  $result = mysqli_query($conn , $sql);
                  $row = mysqli_num_rows($result);
                ?>
                <div class="col-sm-6">
                  <div class="card text-center">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row; ?></h5>
                      <p class="card-text">TOTAL BLOOD REQUEST RECEIVED</p>
                      <a href="total-request-received.php" class="btn btn-danger d-grid ">FULL DETAIL</a>
                    </div>
                  </div>
                </div>

                
              </div>
            </div>
          </div>
      </div>
         

  </body>

</html>