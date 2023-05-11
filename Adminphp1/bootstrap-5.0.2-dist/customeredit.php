<?php
   require_once('dbconn.php');
   try {
      $sql = "SELECT * FROM registration WHERE regID = :ad_regID";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':ad_regID', $_GET['regID'], PDO::PARAM_INT);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
   } catch(PDOException $e) {
      echo "ERROR: ".$e->getMessage();
   }
   $conn = null;
?>

   <!DOCTYPE html>
   <html>

   <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
      <link rel="stylesheet" href="login/adminlogin.css">
      <title>Admin User Edit</title>
   </head>

<body><br>

<div class="container">
  <div class="row mx-auto">
    <a href="managecustomer.php">
    <button type="button" class="btn btn-primary" style="width: 200px;"><i class="bi bi-backspace-fill" style="padding-right: 10px;"></i>Back to Menu</button>
    </a>
  </div>
</div>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6 p-4" style="border: 2px solid green; width: 600px;"> 
      <h2 style="text-align: center; font-weight: bold; font-size: 25px;">UPDATE USER'S INFORMATION</h2><br>
      <p style="font-size: 25px; font-family: Times New Roman;"><strong>User Name:</strong> <?php echo $row['firstname'] . ' ' . $row['lastname']; ?></p>
      <form action="admincustomeredit.php" method="get">
        <div class="mb-3">
               <input style="width: 95%; background: white; margin-bottom: 20px;" type="hidden" name="regID" size="20"
               value="<?php echo $row['regID']; ?>" readonly>
        </div>

        <div class="mb-3">
               <label for="newfirstname">New Firstname:</label>
               <input style="width: 95%; background: white; margin-bottom: 20px;" type="text" name="newfirstname" size="20"
                value="<?php echo $row['firstname'];?>">
        </div>

        <div class="mb-3">
               <label for="newlastname">New Lastname:</label>
               <input style="width: 95%; background: white; margin-bottom: 20px;" type="text" name="newlastname" size="20"
               value="<?php echo $row['lastname'];?>">
        </div>

        <div class="mb-3">
               <label for="newemail">New Email:</label>
               <input onInput="checkEmail()" style="width: 95%; background: white; margin-bottom: 20px;" type="email" name="newemail" size="20"
               id="email" value="<?php echo $row['email'];?>">
               <p id="check-email"></p>
        </div>

        <div class="mb-3">
               <label for="newusername">New Username:</label>
               <input onInput="checkUsername()" style="width: 95%; background: white; margin-bottom: 20px;" type="text" name="newusername" size="20"
               id="username" value="<?php echo $row['username'];?>">
               <p id="check-username"></p>
        </div>

        <div class="mb-3">
               <label for="newaddress">Adress:</label>
               <input style="width: 95%; background: white; margin-bottom: 20px;" type="text" name="newaddress" size="20"
               value="<?php echo $row['address'];?>">
        </div>

        <div class="mb-3">
          <label for="newmobilenumber">Mobile Number:</label>
          <input style="width: 95%; background: white; margin-bottom: 20px;" type="text" name="newmobilenumber" size="20"
                id="newmobilenumber" value="<?php echo $row['mobilenumber'];?>" pattern="09\d{9}" maxlength="11" required oninput="checkMobileNumber()">
              <p id="check-mobile-number"></p>
        </div>

          <script>
          //JavaScript code
          function checkMobileNumber() {
            const input = document.getElementById("newmobilenumber");
            const message = document.getElementById("check-mobile-number");
            const valid = input.checkValidity();
            if (valid) {
              const xhr = new XMLHttpRequest();
              const url = "admincustomeravailability.php?mobilenumber=" + input.value;
              xhr.open("GET", url, true);
              xhr.onload = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                  if (xhr.responseText === "already_used") {
                    message.innerHTML = "<span style='color:red'>Mobile number already in use.</span>";
                  } else {
                    message.innerHTML = "<span style='color:green'>Valid mobile number.</span>";
                  }
                }
              };
              xhr.send();
            } else {
              message.innerHTML = "<span style='color:red'>Mobile number must start with 09 and have 11 digits.</span>";
            }
          }
          </script>

        <div class="mb-3">
            <label for="userstatus">User Status</label>
             <select style="width: 95%; background: white; margin-bottom: 20px;" name="userstatus">
            <option value="active"<?php if ($row['userstatus'] == 'active') echo ' selected="selected"'; ?>>Active</option>
             <option value="inactive"<?php if ($row['userstatus'] == 'inactive') echo ' selected="selected"'; ?>>Inactive</option>
            <option value="Blocked"<?php if ($row['userstatus'] == 'pending') echo ' selected="selected"'; ?>>Blocked</option>
             </select>
        </div><br>

        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>

      </form>
    </div>
  </div><br><br>
</div>
<?php
      include('admininsert.php')
 ?>
</body>
</html>