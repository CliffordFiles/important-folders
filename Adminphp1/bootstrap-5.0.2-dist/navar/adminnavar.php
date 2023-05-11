<div class="fixed-top">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand me-2" href="adminhome.php">
                <img class="logo" style="height: 65px; width: 130px; margin-right: 100px;" src="img/admin-removebg-preview.png" loading="lazy">
            </a>

            <!-- Toggle button -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#micon">
                    <span><i class="bi bi-list"></i></span>
                </button>
            </div>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="micon">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-4">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" id="adminhomelink" href="manageproduct.php">MANAGE PRODUCT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" id="managecustomerLink" href="managecustomer.php">MANAGE CUSTOMER</a>
                    </li>
                    <li class="nav-item" style="margin-right: 100px;">
                        <a class="nav-link" aria-current="page" id="searchLink" href="admincustomerorder.php">CUSTOMER ORDER</a>
                    </li>
                    <li class="nav-item">
                    <div class="d-flex align-items-center ms-auto me-4">
                    <a href="index.php">
                        <button type="button" class="btn btn-success me-3" style="border-radius: 10px;">
                            Log-Out  <i class="bi bi-box-arrow-in-right"></i>
                        </button>
                    </a>
                </div>
                    </li>
                </ul>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
</div>
