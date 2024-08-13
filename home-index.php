<?php include "./include_bootstrap/main-contents-header.php" ?>
<?php
session_start();
$employees = isset($_SESSION['fname']) ? $_SESSION['fname'] : [];
?>
<nav class="navbar navbar-expand-sm bg-body-tertiary nav-bar-color"
    style="position: fixed; top: 0; width: 100%; z-index: 1070;">
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

<div class="main-container"
    style="position: fixed; top: 56px; width: 100%; height: calc(100vh - 56px); overflow-y: auto;">
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

    <div class="tab-content z-3" style="">

        <div class="tab-pane fade " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
            <div class="container mt-3">
                <div class="row" id="home-content">
                    <div class="col-md-3 mb-4">
                        Quick Access
                        <div class="card mt-4">
                            <div class="card-body" style="font-size: 0.9rem; height:4.5rem">
                                <div class="d-flex align-items-center mb-3">
                                    On Leave Today
                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-body" style="font-size: 0.9rem; height:4.5rem">
                                <div class="d-flex align-items-center mb-3">
                                    Holiday
                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-body" style="font-size: 0.9rem; height:4.5rem">
                                <div class="d-flex align-items-center mb-3">
                                    Working Remotely
                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-body" style="font-size: 0.9rem; height:4.5rem">
                                <div class="d-flex align-items-center mb-3">
                                    Leave Balance
                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-body" style="font-size: 0.9rem; height:4.5rem">
                                <div class="d-flex align-items-center mb-3">
                                    Quick Links
                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-body" style="font-size: 0.9rem; height:4.5rem">
                                <div class="d-flex align-items-center mb-3">
                                    Feedback Received
                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-body" style="font-size: 0.9rem; height:4.5rem">
                                <div class="d-flex align-items-center mb-3">
                                    Login Time
                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-body" style="font-size: 0.9rem; height:4.5rem">
                                <div class="d-flex align-items-center mb-3">
                                    Inbox
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-secondary"
                                style="width:8rem">Organization</button>
                            <button type="button" class="btn btn-outline-secondary"
                                style="width:8rem">your_dept</button>
                        </div>
                        <div class="card mt-4">
                            <ul class="nav nav-underline mx-4" id="myTab" role="tablist" style="color: grey;">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home-tab-pane" type="button" role="tab"
                                        aria-controls="home-tab-pane" aria-selected="true">Announcements</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile-tab-pane" type="button" role="tab"
                                        aria-controls="profile-tab-pane" aria-selected="false">Birthdays</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#contact-tab-pane" type="button" role="tab"
                                        aria-controls="contact-tab-pane" aria-selected="false">Work
                                        Aniversaries</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="new-tab" data-bs-toggle="tab"
                                        data-bs-target="#new-tab-pane" type="button" role="tab"
                                        aria-controls="new-tab-pane" aria-selected="false">New Joinies</button>
                                </li>
                            </ul>

                            <div class="card-body" id="home-card-body" style="font-size: 0.9rem; height: 7rem;">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                            aria-labelledby="home-tab" tabindex="0">
                                            <div class="input-group" style="height:5rem">
                                                <textarea class="form-control" aria-label="With textarea"
                                                    placeholder="Anouncements"></textarea>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                            aria-labelledby="profile-tab" tabindex="0">
                                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                                aria-labelledby="home-tab" tabindex="0">
                                                <div class="input-group" style="height:5rem">
                                                    <textarea class="form-control" aria-label="With textarea"
                                                        placeholder="Birthday"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel"
                                            aria-labelledby="contact-tab" tabindex="0">
                                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                                aria-labelledby="home-tab" tabindex="0">
                                                <div class="input-group" style="height:5rem">
                                                    <textarea class="form-control" aria-label="With textarea"
                                                        placeholder="Work Aniversaries"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="new-tab-pane" role="tabpanel"
                                            aria-labelledby="new-tab" tabindex="0">
                                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                                aria-labelledby="home-tab" tabindex="0">
                                                <div class="input-group" style="height:5rem">
                                                    <textarea class="form-control" aria-label="With textarea"
                                                        placeholder="New Joinies"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card mt-4">
                            <div class="card-body" id="home-card-body" style="font-size: 0.9rem; height: 7rem;">
                                <div class="d-flex align-items-center mb-3">
                                    This is Announcements Demo
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
            tabindex="0">
            <div class="container ms-4 mt-3">
                <div class="card">
                    <nav class="nav nav-underline p-2">
                        <a class="nav-link active" aria-current="page" href="#" style="color: black;">Leave</a>
                        <a class="nav-link" href="#" style="color: black;">Attendance</a>
                        <a class="nav-link" href="#" style="color: black;">Performance</a>
                        <a class="nav-link" href="#" style="color: black;">Expenses & Travel</a>
                        <a class="nav-link" href="#" style="color: black;">Help Desk</a>
                        <a class="nav-link" href="#" style="color: black;">Apps</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"
            tabindex="0">
            <div class="container mt-3">
                <div class="row form-group">
                    <div class="col-md-2 p-0">
                        <div class="card">
                            <div class="card-body">Message Label</div>
                        </div>
                    </div>
                    <div class="col-md-10 p-0">
                        <div class="card">
                            <div class="card-body">Message Data</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="v-pills-team" role="tabpanel" aria-labelledby="v-pills-team-tab" tabindex="0">
            <?php include './list.php'; ?>
        </div>
        <div class="tab-pane fade" id="v-pills-finance" role="tabpanel" aria-labelledby="v-pills-finance-tab"
            tabindex="0">
            <div class="container ms-4 mt-3">
                <div class="card">
                    <nav class="nav nav-underline p-2">
                        <a class="nav-link active" aria-current="page" href="#" style="color: black;">Summary</a>
                        <a class="nav-link" href="#" style="color: black;">My Pay</a>
                        <a class="nav-link" href="#" style="color: black;">Manage Tax</a>

                    </nav>
                </div>
            </div>


        </div>
        <div class="tab-pane fade" id="v-pills-org" role="tabpanel" aria-labelledby="v-pills-org-tab" tabindex="0">
            <div class="container ms-4 mt-3">
                <div class="card">
                    <nav class="nav nav-underline p-2">
                        <a class="nav-link active" aria-current="page" href="#" style="color: black;">Employees</a>
                        <a class="nav-link" href="#" style="color: black;">Documents</a>
                        <a class="nav-link" href="#" style="color: black;">Engage</a>

                    </nav>
                </div>
            </div>

        </div>
        <div class="tab-pane fade " id="v-pills-performance" role="tabpanel" aria-labelledby="v-pills-performance-tab"
            tabindex="0">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card d-flex align-items-center justify-content-center" style="height: 100%;">
                            <div id="barChart" style="max-width: 100%; max-height: 100%; display: flex;"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card d-flex align-items-center justify-content-center" style="height: 100%;">
                            <div id="pieChart" style="max-width: 100%; max-height: 100%; display: flex;"></div>
                        </div>
                    </div>
                </div>
            </div>
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

        <!-- THis section handles the clicks from the employees-card -->
        <div class="tab-pane fade " id="employees-nav" role="tabpanel" aria-labelledby="v-pills-performance-tab"
            tabindex="0">
            <div class="container mt-3">
                <div class="row" id="employee-detail-cards">
                </div>

            </div>
        </div>
    </div>
</div>





<?php include "./include_bootstrap/main-contents-footer.php";