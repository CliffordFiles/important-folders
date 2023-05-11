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
    <link rel="stylesheet" href="navardesign/admindesign.css">
    <link rel="stylesheet" href="navardesign/tabledesign.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script defer src="active_link.js"></script>

</head>
<body>
    
<!-- For Navar -->
    <?php
        include('navar/adminnavar.php')
    ?>
      <br><br><br><br><br>  

      <div class = "container">
        <div class ="row">
        <h5 style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: 30px; color: green; margin-left:10px; margin-bottom: 20px;">Cusotmers Order History <i class="bi bi-chevron-double-right"></i> Order Details</h5>
            <div class="d-flex justify-content-end">
                <a href="admincustomerorder.php">
                <button type="button" class="btn btn-outline-primary" style="border-radius: 10px; width: 250px; font-size: 18px;">Back to Customer Orders</button>
                </a>
            </div>
        </div>
      </div><br>

<?php
require_once('dbconn.php');
$utransac_id = isset($_GET['utransac_id']) ? $_GET['utransac_id'] : null;
$stmt = $conn->prepare("SELECT *
FROM registration
JOIN usertransaction ON registration.regID = usertransaction.regID
JOIN orderdetails ON usertransaction.utransac_id = orderdetails.utransac_id
WHERE usertransaction.utransac_id = :utransac_id");
$stmt->bindParam(':utransac_id', $utransac_id);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container" style="background-color: white; border-radius: 10px; box-shadow: 0px 0px 10px 0px rgba(0,128,0,0.2);">
    <div class="row">
    <?php 
$processed_ids = array();
foreach ($results as $row) {
    $utransac_id = $row['utransac_id'];
    if (in_array($utransac_id, $processed_ids)) {
        continue; 
    }
    $processed_ids[] = $utransac_id;
    ?>
        <div class="col-12 col-md-8 col-lg-6 mb-6">
            <div class="card" style="margin-top: 60px; margin-bottom: 10px; border: none; background-color: inherit;">
                <div class="card-body">
                    <p class="card-title" style="font-family: Times New Roman, Times, serif; font-size: 22px;">Customer: <strong><?php echo $row['firstname'] ?></strong></p> 
                    <p class="card-text" style="font-family: Times New Roman, Times, serif; font-size: 22px;">Email: <strong><?php echo $row['email'] ?></strong></p>
                    <p class="card-text" style="font-family: Times New Roman, Times, serif; font-size: 22px;">Username: <strong><?php echo $row['username'] ?></strong></p> 
                    <p class="card-text" style="font-family: Times New Roman, Times, serif; font-size: 22px;">Address: <strong><?php echo $row['address'] ?></strong></p> 
                    <p class="card-text" style="font-family: Times New Roman, Times, serif; font-size: 22px;">Mobile Number: <strong><?php echo $row['mobilenumber'] ?></strong></p>          
                </div>
            </div>
        </div>


<div class="col-12 col-md-8 col-lg-6 mb-6">
    <div class="card" style=" margin-bottom: 10px; border: none; background-color: inherit;">
            <div class="card-body">

              <form id="update-form" action="adminorderstatusedit.php?utransac_id=<?php echo $row['utransac_id']; ?>&amp;orderstatus=1" method="GET">
                  <div style="display: flex; justify-content: flex-end; align-items: center;">
                      <input type="hidden" name="utransac_id" value="<?php echo $row['utransac_id']; ?>">
                      <select name="orderstatus" style="font-weight: bold; color: blue; font-size: 25px; text-transform: uppercase; text-align: center; margin-right: 20px; border-radius: 10px;  ">
                          <option value="<?php echo $row['orderstatus']; ?>" selected><?php echo $row['orderstatus']; ?></option>
                          <option style="color: black; font-weight: bold; text-transform: capitalize; font-size: 22px;" value="Pending"<?php if ($row['orderstatus'] == 'Pending') echo ' selected="selected"'; ?>>Pending</option>
                          <option style="color: black; font-weight: bold; text-transform: capitalize; font-size: 22px;" value="On Progress"<?php if ($row['orderstatus'] == 'On Progress') echo ' selected="selected"'; ?>>On Progress</option>
                          <option style="color: black; font-weight: bold; text-transform: capitalize; font-size: 22px;" value="cancelled"<?php if ($row['orderstatus'] == 'cancelled') echo ' selected="selected"'; ?>>Cancelled</option>
                          <option style="color: black; font-weight: bold; text-transform: capitalize; font-size: 22px;" value="Delivered"<?php if ($row['orderstatus'] == 'Delivered') echo ' selected="selected"'; ?>>Delivered</option>
                      </select>
                      <button type="submit" class="btn btn-outline-primary" style="border-radius: 10px;">Update</button>
                  </div>
              </form>

              <script>
                const form = document.getElementById('update-form');
                const button = form.querySelector('button[type="submit"]');
                button.addEventListener('click', (event) => {
                  event.preventDefault();
                  swal({
                    title: "Update Successfully",
                    text: "Order Status is Updated!",
                    icon: "success",
                    button: "Okay",
                  }).then(() => {
                    form.submit();
                  });
                });
              </script>

                <p class="card-text" style="font-family: Times New Roman, Times, serif; font-size: 22px;">Order ID: <strong><?php echo $row['utransac_id'] ?></strong></p>
                <p class="card-text" style="font-family: Times New Roman, Times, serif; font-size: 22px;">Order Date: <strong><?php echo $row['uorderdate'] ?></strong></p>  
                <p class="card-text" style="font-family: Times New Roman, Times, serif; font-size: 22px;">Expected Delivery Date: <strong><?php echo $row['uorderdeli'] ?></strong></p>
                <p class="card-text" style="font-family: Times New Roman, Times, serif; font-size: 22px;">Order Total: <strong>$</strong><strong><?php echo $row['uordertotal'] ?></strong></p>                   
            </div>
        </div>
    </div>
    <?php } ?>
</div>
</div><br><br>

<div class="container">
  <section class="intro">
    <div class="bg-image h-100" style="background-color: #f5f7fa;">
      <div class="mask d-flex align-items-center h-100">
        <div class="container">
          <div class="table-responsive">
            <div class="card">
              <div class="card-body p-0">
                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px;">
                  <table class="table table-striped mb-0">
                    <thead style="background-color: #002d72;">
                      <tr>
                        <th class="text-center">Product ID</th>
                        <th class="text-center">Product Image</th>
                        <th class="text-center">Product Name</th>
                        <th class="text-center">Quantity</th>  
                        <th class="text-center">Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                 try {
                     $stmt = $conn->prepare("SELECT * FROM orderdetails WHERE utransac_id = :utransac_id");
                     $stmt->bindParam(':utransac_id', $utransac_id);
                     $stmt->execute();
                 
                     // loop through the results
                     foreach ($stmt->fetchAll() as $row) {
                         ?>
                         <tr>
                             <td class="text-center"><?php echo $row['udetails_id']; ?></td>
                             <td class="text-center"><?php
                                 $img_data = base64_encode($row['udetailimg']);
                                 $img_type = 'image/jpeg'; 
                                 ?>
                                 <img src="data:<?php echo $img_type; ?>;base64,<?php echo $img_data; ?>" width="150" height="150"></td>
                             <td class="text-center"><?php echo $row['udetailtitle']; ?></td>
                             <td class="text-center"><?php echo $row['udetailquantity']; ?></td>
                             <td class="text-center"><?php echo $row['udetailprice']; ?></td>
                         </tr>
                         <?php
                     }
                 } catch(PDOException $e) {
                     echo "ERROR: " . $e->getMessage();
                 }
                 
                 // close the database connection
                 $conn = null;
                 
                    ?>

                     </tbody>     
                        </table>
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
