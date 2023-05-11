<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drink Delight: Admin Operation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="navardesign/admindesign.css">
    <link rel="stylesheet" href="navardesign/tabledesign.css">
    <script defer src="active_link.js"></script>

</head>
<body>
      <?php
        include('navar/adminnavar.php')
        
      ?>
<br><br><br><br><br>
<center><h1 style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: 35px; color: green;">DASHBOARD </h1></center>
  <br>

  
  <?php
require('dbconn.php');

$stmt = $conn->prepare("SELECT COUNT(*) as count FROM registration");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $result['count'];
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
      <div class="card">
        <div class="card-body text-center">
          <h6 class="card-subtitle mb-2 text-muted"><i class="bi bi-person" style="color:green; font-size: 30px;"></i>USERS</h6>
          <?php echo $count; ?>
        </div>
      </div>
    </div>

    <?php
    require('dbconn.php');

    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM beverage");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $result['count'];
    ?>

    <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
      <div class="card">
        <div class="card-body text-center">
          <h6 class="card-subtitle mb-2 text-muted"><i class="bi bi-archive-fill" style="color:green; font-size: 30px;"></i> PRODUCTS</h6>
          <?php echo $count; ?>
        </div>
      </div>
    </div>

    <?php
    require('dbconn.php');

    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM usertransaction");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $result['count'];
    ?>

    <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
      <div class="card">
        <div class="card-body text-center">
          <h6 class="card-subtitle mb-2 text-muted"><i class="bi bi-basket" style="color:green; font-size: 30px;"></i> ORDERS</h6>
          <?php echo $count; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<br><br>

    

  
<div class="container">
<h1 style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: 30px; color: green; margin-bottom: 20px;">USERS </h1>
  <div class="row">
    <section class="intro">
      <div class="bg-image h-100" style="background-color: #f5f7fa;">
        <div class="mask d-flex align-items-center h-100">
          <div class="container">
            <div class="row justify-content-center">
              <div class="table-responsive">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body p-0">
                      <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 490px">
                        <a href="managecustomer.php" style="text-decoration: none; color: black;font-weight:normal;">
                          <table class="table table-striped mb-0">
                            <thead style="background-color: #002d72;">
                              <tr>
                                <center>
                                  <th class="text-center" scope="col">First Name</th>
                                  <th class="text-center" scope="col">Lastname</th>
                                  <th class="text-center" scope="col">Email</th>
                                  <th class="text-center" scope="col">Username</th>
                                  <th class="text-center" scope="col">Address</th>
                                  <th class="text-center" scope="col">Mobile Number</th>
                                  <th class="text-center" scope="col">Status</th>
                                </center>
                              </th> 
                            </thead>
                            <tbody>
                              <?php
                              require_once('dbconn.php');
                              try{
                                  $stmt = $conn->prepare("SELECT * FROM registration");
                                  $stmt->execute();
                                  foreach ($stmt->fetchAll() as $row)
                                  {
                                      $status_color = '';
                                      if ($row['userstatus'] == 'Active') {
                                          $status_color = '#008000'; // green
                                      } elseif ($row['userstatus'] == 'blocked') {
                                          $status_color = '#000000'; // black
                                      } elseif ($row['userstatus'] == 'Inactive') {
                                          $status_color = '#FF0000'; // red
                                      }
                              ?>
                              <tbody>
                                <tr>
                                  <td class="text-center"> <?php echo $row['firstname']; ?></td>
                                  <td class="text-center"> <?php echo $row['lastname']; ?></td>
                                  <td class="text-center"> <?php echo $row['email']; ?></td>
                                  <td class="text-center"> <?php echo $row['username']; ?></td>
                                  <td class="text-center"> <?php echo $row['address']; ?></td>
                                  <td class="text-center"> <?php echo $row['mobilenumber']; ?></td>
                                  <td class="text-center">
                                      <span style="color: <?php echo $status_color; ?>; font-weight: bold;"><?php echo $row['userstatus']; ?></span>
                                  </td>
                                </tr>
                              </tbody>
                              <?php
                                  }
                                } catch(PDOException $e) {
                                  echo "ERROR: ". $e->getMessage();
                                }
                                $conn = null;
                              ?>
                          </table>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<br><br>

<div class="container">
<h1 style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: 30px; color: green; margin-bottom: 20px;">BEVERAGE </h1>
  <div class="row">
    <section class="intro">
    <div class="bg-image h-100" style="background-color: #f5f7fa;">
    <div class="mask d-flex align-items-center h-100">
      <div class="container">
        <div class="row justify-content-center">
        <div class="table-responsive">
          <div class="col-12">
            <div class="card">
              <div class="card-body p-0">
                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 490px">
                <a href="manageproduct.php" style="text-decoration: none; color: black;font-weight:normal;">
                  <table class="table table-striped mb-0">
                    <thead style="background-color: #002d72;">
                            <tr>
                              <center>
                              <th class="text-center" scope="col">Product</th>
                                <th class="text-center" scope="col">Name</th>
                                <th class="text-center" scope="col">Description</th>
                                <th class="text-center" scope="col">Price</th>
                                <th class="text-center" scope="col">Category</th>
                              </center>
                            </tr> 
                          </thead>
                          <tbody>
                          <?php
                            require('dbconn.php');
                            try {
                              $stmt = $conn->prepare("SELECT * FROM beverage");
                              $stmt->execute();
                              foreach ($stmt->fetchAll() as $row) {
                            ?>
                              <tr>
                              <td>

                                <?php
                                  // output the image as data URI
                                  $img_data = base64_encode($row['bevimg']);
                                  $img_type = 'image/jpeg'; // replace with the appropriate image type
                                ?>

                                <img src="data:<?php echo $img_type; ?>;base64,<?php echo $img_data; ?>" width="200" height="200">

                              </td>
                              <td class="text-center"><?php echo $row['bevtitle']; ?></td>
                              <td class="text-center"><?php echo $row['bevdesc']; ?></td>
                              <td class="text-center"><?php echo $row['bevprice']; ?></td>
                              <td class="text-center"><?php echo $row['bevcategory']; ?></td>
                            </tr>
                              </tbody>
                              <?php
                              }
                            } catch(PDOException $e) {
                              echo "ERROR: " . $e->getMessage();
                            }
                            $conn = null;
                            ?>
                        </table>
                          </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<br><br>

<div class="container">
<h1 style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: 30px; color: green; margin-bottom: 20px;">CUSTOMER ORDER HISTORY </h1>
    <div class="row">
    <section class="intro">
    <div class="bg-image h-100" style="background-color: #f5f7fa;">
    <div class="mask d-flex align-items-center h-100">
      <div class="container">
        <div class="row justify-content-center">
        <div class="table-responsive">
          <div class="col-12">
            <div class="card">
              <div class="card-body p-0">
                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 490px">
                <a href="admincustomerorder.php" style="text-decoration: none; color: black;font-weight:normal;">
                  <table class="table table-striped mb-0">
                    <thead style="background-color: #002d72;">
                            <tr>
                              <center>
                              <th class="text-center">Order Date</th>
                              <th class="text-center">Order Tranx ID</th>
                              <th class="text-center">Order Total</th>
                              <th class="text-center">Status</th>  
                              </center>
                            </tr> 
                          </thead>
                          <tbody>
                          <?php
                            require('dbconn.php');
                            try {
                              $stmt = $conn->prepare("SELECT * FROM usertransaction");
                              $stmt->execute();
                              foreach ($stmt->fetchAll() as $row) {

                                $status_color = '';
                                if ($row['orderstatus'] == 'On Progress') {
                                    $status_color = 'orange';
                                } elseif ($row['orderstatus'] == 'cancelled') {
                                    $status_color = 'red';
                                } elseif ($row['orderstatus'] == 'Delivered') {
                                    $status_color = 'Blue'; 
                                } elseif ($row['orderstatus'] == 'Pending') {
                                  $status_color = 'Green'; 
                                }

                            ?>
                              <tr>
                          <td class="text-center"><?php echo $row['uorderdate']; ?></td>
                          <td class="text-center"><?php echo $row['utransac_id']; ?></td>
                          <td class="text-center"><?php echo $row['uordertotal']; ?></td>
                         <td class="text-center">
                                      <span style="color: <?php echo $status_color; ?>; font-weight: bold;"><?php echo $row['orderstatus']; ?></span>
                                  </td>
                        </tr>
                              </tbody>
                              <?php
                              }
                            } catch(PDOException $e) {
                              echo "ERROR: " . $e->getMessage();
                            }
                            $conn = null;
                            ?>
                        </table>
                          </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div><br><br><br>
</body>
</html>