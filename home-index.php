<?php include "./include_bootstrap/main-contents-header.php" ?>
<?php
session_start();
$employees = isset($_SESSION['fname']) ? $_SESSION['fname'] : [];
?>
<nav class="navbar navbar-expand-sm bg-body-tertiary nav-bar-color">
    <div class="container-fluid">
        <div class="row w-100 justify-content-between">
            <div class="col d-flex align-items-center">
                <img src="https://cdn.kekastatic.net/shared/branding/logo/keka-logo-light.svg" alt="KEKA">
            </div>
            <div class="col d-flex justify-content-center">
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <form class="d-flex w-100" role="search" id="search_form">
                        <button type="button" class="btn rounded-pill border border-2 border-white w-100"
                            id="search_btn">
                            <div class="col">
                                <span class="d-flex justify-content-between align-items-center fw-normal fs-6">
                                    Search any action or ask for help&nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </button>
                        <div id="search_card" class="card"
                            style="display: none;opacity: 0;position: absolute;top: 200%;left: 50%;transform: translate(-50%, -50%);z-index: 1050; transition: all 0.3s ease-in-out;max-height: 70vh; width: 80%;">
                            <div class="card-header" style="position: sticky;top: 0;z-index: 100;background: #fff;">
                                <input id="nav-search" type="text" class="form-control"
                                    placeholder="Type your query..." />
                            </div>

                            <div class="card-body" style="max-height: 50vh; overflow-y: auto;" id="search-results">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col d-flex justify-content-end align-items-center z-3">
                <div class="btn-group dropStart">
                    <button type="button" class="btn btn-transparent">
                        <div class="justify-items-center">
                            <span class="font-size"
                                id="label_side_bar_icon"><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?>&nbsp;&nbsp;<svg
                                    xmlns="http://www.w3.org/2000/svg" width="9" height="9" fill="currentColor"
                                    class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                </svg></span>
                        </div>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" dest="#profile-nav" data-value="Yes"> <i
                                    class="fas fa-user-circle"></i>&nbsp;&nbsp;Profile</a></li>
                        <li><a class="dropdown-item" href="#" dest="#resetPwd-nav" data-value="No"> <i
                                    class="fas fa-key"></i>&nbsp;&nbsp;Change
                                Password</a></li>
                        <li><a class="dropdown-item" href="#" dest="#logOut-nav" data-value="No"><i
                                    class="fas fa-sign-out"></i>&nbsp;&nbsp;Log
                                Out</a></li>
                    </ul>
                </div>


                <div class="ms-3">
                    <div class="circle">
                        <img src="https://letsenhance.io/static/8f5e523ee6b2479e26ecc91b9c25261e/1015f/MainAfter.jpg"
                            alt="Sample Image" class="img-fluid rounded-circle" style="width: 40px; height: 40px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="main-container">
    <div class="sidebar nav flex-column me-3 nav-underline" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <!-- Home Section  -->
        <button type="button" class="btn btn-secondary" id="v-pills-home-tab" data-bs-toggle="pill"
            data-bs-target="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
            <div class="row justify-items-center">
                <i class="fa fa-home"></i>
                <span class="font-size" id="label_side_bar_icon">Home</span>
            </div>
        </button>

        <!-- Profile Section -->
        <div class="btn-group dropend">
            <button type="button" class="btn btn-secondary" id="v-pills-profile-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                aria-selected="false">
                <div class="row justify-items-center">
                    <i class="fas fa-user-circle"></i>
                    <span class="font-size" id="label_side_bar_icon">Me</span>
                </div>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" data-value="Yes">Leave</a></li>
                <li><a class="dropdown-item" href="#" data-value="No">Attendance</a></li>
                <li><a class="dropdown-item" href="#" data-value="No">Performance</a></li>
                <li><a class="dropdown-item" href="#" data-value="No">Expenses & Travel</a></li>
                <li><a class="dropdown-item" href="#" data-value="No">Help Desk</a></li>
                <li><a class="dropdown-item" href="#" data-value="No">Apps</a></li>

            </ul>
        </div>

        <!-- Message Section -->
        <button type="button" class="btn btn-secondary" id="v-pills-messages-tab" data-bs-toggle="pill"
            data-bs-target="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
            <div class="row justify-items-center">
                <i class="fa fa-commenting-o"></i>
                <span class="font-size" id="label_side_bar_icon">Inbox</span>
            </div>
        </button>
        <!-- Team Section -->
        <div class="btn-group dropend">
            <button type="button" class="btn btn-secondary" id="v-pills-team-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-team" type="button" role="tab" aria-controls="v-pills-team"
                aria-selected="false">
                <div class="row justify-items-center">
                    <i class="fa fa-group"></i>
                    <span class="font-size" id="label_side_bar_icon">My Team</span>
                </div>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" data-value="No">Summary</a></li>

            </ul>
        </div>
        <!-- Finance Section -->
        <div class="btn-group dropend">
            <button type="button" class="btn btn-secondary" id="v-pills-finance-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-finance" type="button" role="tab" aria-controls="v-pills-finance"
                aria-selected="false">
                <div class="row justify-items-center">
                    <i class="fa fa-rupee fa-lg"></i>
                    <span class="font-size" id="label_side_bar_icon">My Finances</span>
                </div>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" data-value="No">Summary</a></li>
                <li><a class="dropdown-item" href="#" data-value="No">My Pay</a></li>
                <li><a class="dropdown-item" href="#" data-value="No">Manage Tax</a></li>

            </ul>
        </div>
        <!-- Organization Section -->
        <div class="btn-group dropend">
            <button type="button" class="btn btn-secondary" id="v-pills-org-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-org" type="button" role="tab" aria-controls="v-pills-org"
                aria-selected="false">
                <div class="row justify-items-center">
                    <i class="material-icons">location_city</i>
                    <span class="font-size" id="label_side_bar_icon">Org</span>
                </div>
            </button>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" data-value="No">Employees</a></li>
                <li><a class="dropdown-item" href="#" data-value="No">Documents</a></li>
                <li><a class="dropdown-item" href="#" data-value="No">Engage</a></li>

            </ul>
        </div>
        <!-- Performance Section -->
        <div class="btn-group dropend">
            <button type="button" class="btn btn-secondary" id="v-pills-performance-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-performance" type="button" role="tab" aria-controls="v-pills-performance"
                aria-selected="false">
                <div class="row justify-items-center">
                    <i class="fa fa-bar-chart"></i>
                    <span class="font-size" id="label_side_bar_icon">Performance</span>
                </div>
            </button>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" data-value="No">Objective</a></li>

            </ul>
        </div>
    </div>

    <div class="tab-content z-3">

        <div class="tab-pane fade " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
            a
        </div>
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
            tabindex="0">
            b

        </div>
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"
            tabindex="0">
            c
        </div>
        <div class="tab-pane fade" id="v-pills-team" role="tabpanel" aria-labelledby="v-pills-team-tab" tabindex="0">
            <?php include './list.php'; ?>
        </div>
        <div class="tab-pane fade" id="v-pills-finance" role="tabpanel" aria-labelledby="v-pills-finance-tab"
            tabindex="0">
            e


        </div>
        <div class="tab-pane fade" id="v-pills-org" role="tabpanel" aria-labelledby="v-pills-org-tab" tabindex="0">
            f

        </div>
        <div class="tab-pane fade " id="v-pills-performance" role="tabpanel" aria-labelledby="v-pills-performance-tab"
            tabindex="0">

            g

        </div>



        <!-- keeping all the redirection from the dropdown buttons -->

        <div class="tab-pane fade " id="profile-nav" role="tabpanel" aria-labelledby="v-pills-performance-tab"
            tabindex="0">
            Bipul
        </div>
        <div class="tab-pane fade " id="resetPwd-nav" role="tabpanel" aria-labelledby="v-pills-performance-tab"
            tabindex="0">

            Sardar
        </div>
        <div class="tab-pane fade " id="logOut-nav" role="tabpanel" aria-labelledby="v-pills-performance-tab"
            tabindex="0">
            Bipul Sardar
        </div>
    </div>
</div>





<?php include "./include_bootstrap/main-contents-footer.php";