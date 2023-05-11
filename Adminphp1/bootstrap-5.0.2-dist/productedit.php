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
    <script defer src="active_link.js"></script>


</head>
<body>
    <?php require_once('dbconn.php'); ?>
    <?php
      // Get the beverage ID from the URL
      $bevID = $_GET['bevID'];

      // Retrieve the existing beverage data from the database
      $stmt = $conn->prepare("SELECT * FROM beverage WHERE bevID = ?");
      $stmt->execute([$bevID]);
      $row = $stmt->fetch();
    ?>
    <br><br>

<div class="container">
  <div class="row mx-auto">
    <a href="manageproduct.php">
    <button type="button" class="btn btn-primary" style="width: 200px;"><i class="bi bi-backspace-fill" style="padding-right: 10px;"></i>Back to Menu</button>
    </a>
  </div>
</div>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6 p-4" style="border: 2px solid green;"> 
      <h2 style="text-align: center; font-weight: bold">Edit Beverage</h2><br>
      <h3 style="font-size: 25px; font-family: Times New Roman;"><strong>Product Name:</strong> <?php echo $row['bevtitle'] ?></h3><br>
      <form action="adminproductedit.php?bevID=<?php echo $bevID; ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="bevtitle" class="form-label">Title</label>
          <input type="text" id="bevtitle" name="bevtitle" value="<?php echo $row['bevtitle']; ?>" class="form-control">
        </div>
        <div class="mb-3">
          <label for="bevdesc" class="form-label">Description</label>
          <textarea id="bevdesc" name="bevdesc" class="form-control" placeholder="50 words description"><?php echo $row['bevdesc']; ?></textarea>
        </div>
        <div class="mb-3">
          <label for="bevprice" class="form-label">Price</label>
          <input type="number" id="bevprice" name="bevprice" value="<?php echo $row['bevprice']; ?>" class="form-control">
        </div>
        <div class="mb-3">
          <label for="bevcategory" class="form-label">Category</label>
          <select id="bevcategory" name="bevcategory" class="form-control">
            <option value="liquor" <?php if ($row['bevcategory'] == 'liquor') echo 'selected'; ?>>Liquor</option>
            <option value="juice" <?php if ($row['bevcategory'] == 'juice') echo 'selected'; ?>>Juice</option>
            <option value="softdrinks" <?php if ($row['bevcategory'] == 'softdrink') echo 'selected'; ?>>Softdrink</option>
          </select>
        </div>
        <div class="mb-3">
        <?php
            $img_data = base64_encode($row['bevimg']);
            $img_type = 'image/jpeg';
        ?>
          <label for="product_image">Image:</label><br>
          <center>
          <img src="data:<?php echo $img_type; ?>;base64,<?php echo $img_data; ?>" width="250" height="250">
          </center>
        </div>
        <div class="mb-3">
          <label for="bevimg" class="form-label">New Image</label>
          <input type="file" id="bevimg" name="bevimg" class="form-control">
        </div><br>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div><br><br>
</div>
  </body>
</html>
