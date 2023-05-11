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
<br><br><br><br><br><br>

<div class="container">
  <div class="row">
    <button type="button" class="btn btn-primary" style="width: 200px; margin-left: 40px;" onclick="location.href='addproduct.php';">
      <i class="bi bi-plus-circle" style="padding-right: 10px;"></i>Add New Product
    </button>
  </div><br>
</div>

<div class="container">
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
                      <div class="table-responsive" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px;">
                        <table class="table table-striped mb-0">
                          <thead style="background-color: #002d72;">
                            <tr>
                              <center>
                                <th class="text-center" scope="col">Product</th>
                                <th class="text-center" scope="col">Name</th>
                                <th class="text-center" scope="col">Description</th>
                                <th class="text-center" scope="col">Price</th>
                                <th class="text-center" scope="col">Category</th>
                                <th class="text-center" scope="col">Values</th>
                              </center>
                            </tr> 
                          </thead>
                          <tbody>
                            <?php
                            require_once('dbconn.php');
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
                              <td class="text-center">

                                <a href="productedit.php?bevID=<?php echo $row['bevID']; ?>" style="margin-right: 20px;">
                                    <i class="bi bi-pencil-square" style="font-size: 24px;"></i>
                                </a>
                                <a href="#" onclick="showConfirmation('<?php echo $row['bevID']; ?>')">
                                    <i class="bi bi-trash-fill" style="font-size: 24px; color: red;"></i>
                                  </a>

                                  <script>
                                  function showConfirmation(bevID) {
                                    Swal.fire({
                                      title: 'Are you sure?',
                                      text: 'You are about to delete this record!',
                                      icon: 'warning',
                                      showCancelButton: true,
                                      confirmButtonText: 'Yes, delete it!',
                                      cancelButtonText: 'No, cancel',
                                    }).then((result) => {
                                      if (result.isConfirmed) {
                                        window.location.href = 'adminproductdelete.php?bevID=' + bevID + '&confirm_delete=yes';
                                      }
                                    })
                                  }
                                  </script>
                                </td>
                            </tr>
                            <?php
                              }
                            } catch(PDOException $e) {
                              echo "ERROR: " . $e->getMessage();
                            }
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
</div>
</body>
</html>