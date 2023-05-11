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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="navardesign/admindesign.css">
    <script defer src="active_link.js"></script>

</head>
<body>

<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem; box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.2);">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="img/adminlogo.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                  <form action="back_login.php" method="post">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0" style="font-family: Times New Roman, Times, serif; margin-left: 120px;"><i class="bi bi-person-fill-lock">  </i>Admin Login</span>
                  </div><br>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px; font-family: Times New Roman, Times, serif;">Sign into your account:</h5>

                  <div class="form-outline mb-4">
                    <input name="username" type="text" id="form2Example17" class="form-control form-control-lg" placeholder="Username" style="letter-spacing: 1px; font-family: Times New Roman, Times, serif; font-size: 18px; border-radius: 10px;" required/>
                  </div>

                  <div class="form-outline mb-4">
                  <input name="password" type="password" id="form2Example27" class="form-control form-control-lg"  placeholder="Password" style="letter-spacing: 1px; font-family: Times New Roman, Times, serif; font-size: 18px; border-radius: 10px;" required/>
                  </div><br>
                  <div class="pt-1 mb-4">
                    <center>
                    <button class="btn btn-success btn-lg btn-block" name="login" type="submit" style="letter-spacing: 1px; font-family: Times New Roman, Times, serif;  border-radius: 10px;">Login <i class="bi bi-door-open"></i></button>
                    </button>
                    </center>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>