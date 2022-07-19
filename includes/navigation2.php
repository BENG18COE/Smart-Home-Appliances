<div class="wrapper">
    <!--start top header-->
    <header class="top-header">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-icon fs-3">
                <i class="bi bi-list"></i>
            </div>

            <div class="top-navbar-right ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item dropdown dropdown-user-setting">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                            <div class="user-setting d-flex align-items-center">
                                <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" class="user-img" alt="">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="" class="rounded-circle" width="54" height="54">

                                        <div class="ms-3">
                                            <h6 class="mb-0 dropdown-user-name"><?php echo $username; ?></h6>
                                            <small class="mb-0 dropdown-user-designation text-secondary"></small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item" href="./">
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <i class="bi bi-speedometer"></i>
                                        </div>
                                        <div class="ms-3">
                                            <span>Dashboard</span>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="profile.php">
                                    <div class="d-flex align-items-center">
                                        <div class=""><i class="bi bi-person-fill"></i></div>
                                        <div class="ms-3"><span>Profile</span></div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="logout.php">
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <i class="bi bi-lock-fill"></i>
                                        </div>
                                        <div class="ms-3">
                                            <span id="logout">Logout</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!--end top header-->

    <!--start sidebar -->
    <aside class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <a href="./">
                    <h4 class="logo-text">Chauka Smart Home</h4>
                </a>
            </div>
            <!-- <div>
        <a href="../admin">
          <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </a>
      </div> -->


            <div class="toggle-icon ms-auto">
                <i class="bi bi-list"></i>
            </div>
        </div>

        <!--navigation-->
        <ul class="metismenu" id="menu">
            <li>
                <a href="./">
                    <div class="parent-icon"><i class="bi bi-house-fill"></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>

            <li class="menu-label">System</li>
            <li style="border-bottom: 1px solid;"></li>
            <li>
                <a href="./report.php">
                    <div class="parent-icon"><i class="bi bi-chat-left-text-fill"></i></i>
                    </div>
                    <div class="menu-title">Water Report</div>
                </a>
            </li>

            <li>
                <a href="./profile.php">
                    <div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
                    </div>
                    <div class="menu-title">User Profile</div>
                </a>
            </li>

            <li>
                <a href="https://wa.me/255763754183" target="_blank">
                    <div class="parent-icon"><i class="bi bi-telephone-fill"></i>
                    </div>
                    <div class="menu-title">Support</div>
                </a>
            </li>
        </ul>
        <!--end navigation-->
    </aside>
    <!--end sidebar -->


    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->

</div>