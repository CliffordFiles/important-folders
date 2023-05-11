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
    <br><br>
<div class="container">
  <div class="row mx-auto">
    <a href="manageproduct.php">
    <button type="button" class="btn btn-primary" style="width: 200px;"><i class="bi bi-backspace-fill" style="padding-right: 10px;"></i>Back to Menu</button>
    </a>
  </div>
  <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6 p-4" style="border: 2px solid green;"> 
      <h2 style="text-align: center; font-weight: bold">Add New Product</h2><br>
      <form action="adminaddproduct.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="newbevtitle" class="form-label">Title</label>
          <input type="text" id="newbevtitle" name="newbevtitle" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="newbevdesc" class="form-label">Description</label>
          <textarea id="newbevdesc" name="newbevdesc" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
          <label for="newbevprice" class="form-label">Price</label>
          <input type="number" id="newbevprice" name="newbevprice" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="newbevcategory" class="form-label">Category</label>
            <select id="newbevcategory" name="newbevcategory" class="form-control" required>
                <option value="softdrinks">softdrinks</option>
                <option value="juice">juice</option>
                <option value="liquor">liquor</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="mb-3">
          <label for="newbevimg" class="form-label">Image</label>
          <input type="file" id="newbevimg" name="newbevimg" class="form-control" required>
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Add Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
  </body>
</html>
