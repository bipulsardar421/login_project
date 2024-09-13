<?php include "./include_bootstrap/main-contents-header.php" ?>
<?php
session_start();
$employees = isset($_SESSION['fname']) ? $_SESSION['fname'] : [];
?>
<nav class="navbar navbar-expand-sm bg-body-tertiary nav-bar-color" style="position: fixed; top: 0; width: 100%;"
    id="mainNavContainer">

    <div class="container-fluid">
        <div class="row w-100 justify-content-between">

            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

            <div class="col d-flex align-items-center">
                <img src="https://cdn.kekastatic.net/shared/branding/logo/keka-logo-light.svg" alt="KEKA">
            </div>

            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


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
                            style="display: none; opacity: 0; position: fixed; top: 1rem; left: 50%; transform: translate(-50%, 0); z-index: 1050; transition: all 0.3s ease-in-out; max-height: 70vh; width: 50%;">
                            <div class="card-header" style="position: sticky; top: 0; z-index: 100; background: #fff;">
                                <input id="nav-search" type="text" class="form-control"
                                    placeholder="Type your query..." />
                            </div>
                            <div class="card-body" style="max-height: 50vh; overflow-y: auto;" id="search-results">

                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

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
                        <li><a class="dropdown-item" href="#" dest="#logOut-nav" data-value="No" id="logOut"><i
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

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



<div class="main-container"
    style="position: fixed; top: 56px; width: 100%; height: calc(100vh - 56px); overflow-y: auto;"
    id="tabPaneMainContainer">
    <div class="sidebar nav flex-column me-3 nav-underline" id="v-pills-tab" role="tablist" aria-orientation="vertical">

        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



        <!-- Home Section  -->
        <button type="button" class="btn btn-secondary" id="v-pills-home-tab" data-bs-toggle="pill"
            data-bs-target="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
            <div class="row justify-content-center position-relative" id="mainHomeButtonInTheDashboard">
                <i class="fa fa-home"></i>
                <span class="font-size" id="label_side_bar_icon">Home</span>
            </div>

        </button>

        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



        <!-- Profile Section -->
        <div class="btn-group dropend">
            <button type="button" class="btn btn-secondary" id="v-pills-profile-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                aria-selected="false">
                <div class="row justify-items-center" id="mainProfileButtonInTheDashboard">
                    <i class="fas fa-user-circle"></i>
                    <span class="font-size" id="label_side_bar_icon">Me</span>
                </div>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" performance-me>Leave</a></li>
                <li><a class="dropdown-item" href="#" data-value="No">Attendance</a></li>
                <li><a class="dropdown-item" href="#" data-value="No">Performance</a></li>
                <li><a class="dropdown-item" href="#" data-value="No">Expenses & Travel</a></li>
                <li><a class="dropdown-item" href="#" data-value="No">Help Desk</a></li>
                <li><a class="dropdown-item" href="#" data-value="No">Apps</a></li>

            </ul>
        </div>

        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



        <!-- Message Section -->
        <button type="button" class="btn btn-secondary" id="v-pills-messages-tab" data-bs-toggle="pill"
            data-bs-target="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
            <div class="row justify-items-center" id="mainMessageButtonInTheDashboard">
                <i class="fa fa-commenting-o"></i>
                <span class="font-size" id="label_side_bar_icon">Inbox</span>
            </div>
        </button>

        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



        <!-- Team Section -->
        <div class="btn-group dropend">
            <button type="button" class="btn btn-secondary" id="v-pills-team-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-team" type="button" role="tab" aria-controls="v-pills-team"
                aria-selected="false">
                <div class="row justify-items-center" onclick="populateEmployeeDetails()"
                    id="mainTeamButtonInTheDashboard">
                    <i class="fa fa-group"></i>
                    <span class="font-size" id="label_side_bar_icon">My Team</span>
                </div>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" id="emp-summary">Summary</a></li>

            </ul>
        </div>

        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



        <!-- Finance Section -->
        <div class="btn-group dropend">
            <button type="button" class="btn btn-secondary" id="v-pills-finance-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-finance" type="button" role="tab" aria-controls="v-pills-finance"
                aria-selected="false">
                <div class="row justify-items-center" id="mainFinanceButtonInTheDashboard">
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

        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



        <!-- Organization Section -->
        <div class="btn-group dropend">
            <button type="button" class="btn btn-secondary" id="v-pills-org-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-org" type="button" role="tab" aria-controls="v-pills-org"
                aria-selected="false">
                <div class="row justify-items-center" id="mainOrganizationButtonInTheDashboard">
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

        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



        <!-- Performance Section -->
        <div class="btn-group dropend">
            <button type="button" class="btn btn-secondary" id="v-pills-performance-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-performance" type="button" role="tab" aria-controls="v-pills-performance"
                aria-selected="false">
                <div class="row justify-items-center" id="mainPerformanceButtonInTheDashboard">
                    <i class="fa fa-bar-chart"></i>
                    <span class="font-size" id="label_side_bar_icon">Performance</span>
                </div>
            </button>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" data-value="No">Objective</a></li>

            </ul>
        </div>
    </div>

    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



    <div class="tab-content z-3" style="flex: 1;overflow-y: auto;background: transparent;" id="mainTabContent">

        <div class="tab-pane fade " style="height: 100vh;" id="v-pills-home" role="tabpanel"
            aria-labelledby="v-pills-home-tab" tabindex="0" custom-bs="bs-bs">
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
                    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                    <div class="col-md-6 mb-4">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-secondary"
                                style="width:8rem">Organization</button>
                            <button type="button" class="btn btn-outline-secondary" style="width:8rem">Dept</button>
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

        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



        <div class="tab-pane fade" style="height: 100vh;" id="v-pills-profile" role="tabpanel"
            aria-labelledby="v-pills-profile-tab" tabindex="0" custom-bs="bs-bs">
            <nav class="nav nav-underline p-2">
                <a class="nav-link active" id="leave-me-tab" data-bs-toggle="tab" data-bs-target="#leave-me"
                    type="button" role="tab" aria-controls="leave-me" aria-selected="true"
                    style="color: black; display: flex; align-items: center; position: relative;">Leave</a>
                <a class="nav-link" id="attendance-me-tab" data-bs-toggle="tab" data-bs-target="#attendance-me"
                    type="button" role="tab" aria-controls="attendance-me" aria-selected="true"
                    style="color: black; display: flex; align-items: center; position: relative;">Attendance</a>
                <a class="nav-link" id="performance-me-tab" data-bs-toggle="tab" data-bs-target="#performance-me"
                    type="button" role="tab" aria-controls="performance-me" aria-selected="true"
                    style="color: black; display: flex; align-items: center; position: relative;">Performance</a>
                <a class="nav-link" id="ent-me-tab" data-bs-toggle="tab" data-bs-target="#ent-me" type="button"
                    role="tab" aria-controls="ent-me" aria-selected="true"
                    style="color: black; display: flex; align-items: center; position: relative;">Expenses & Travel</a>
                <a class="nav-link" id="help-me-tab" data-bs-toggle="tab" data-bs-target="#help-me" type="button"
                    role="tab" aria-controls="help-me" aria-selected="true"
                    style="color: black; display: flex; align-items: center; position: relative;">Help Desk</a>
                <a class="nav-link" id="app-me-tab" data-bs-toggle="tab" data-bs-target="#app-me" type="button"
                    role="tab" aria-controls="app-me" aria-selected="true"
                    style="color: black; display: flex; align-items: center; position: relative;">Apps</a>
            </nav>
            <hr style="padding: 0; margin: 0; margin-right: 1%;">

            <div class="tab-content">
                <div class="tab-pane active" id="leave-me" role="tabpanel" aria-labelledby="leave-me-tab" tabindex="0">
                    <div class="d-flex justify-content-between"
                        style="padding: 0; margin: 0; margin-top: 5px; margin-right: 1%;">
                        <div class="card" style="flex: 1; margin-right: 1%;">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <img src="https://cdn.kekastatic.net/shared/assets/images/background/elephant.png"
                                        alt="logo.png" style="width:100px; height:100px">

                                    <div class="d-flex flex-column ms-3">
                                        <p>Hurray! No pending leave requests</p>
                                        <p>Request leave on the right!</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card" style="width:30%">
                            <div class="card-body">
                                <!-- request leave -->
                                <div class="col d-flex">
                                    <div style="display:block; width: 100%;">
                                        <button class="btn btn-primary btn-sm mb-2" type="button"
                                            data-bs-toggle="offcanvas" data-bs-target="#requestLeave"
                                            aria-controls="requestLeave" id="requestLeaveBtn" style="width:fit-content">
                                            Request Leave
                                        </button>
                                        <!-- compensatory leave -->
                                        <a href="#" class="d-block w-100" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Request Credit for Compensatory Off
                                        </a>
                                        <a href="#" class="d-block w-100" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Leave Policy Explanation
                                        </a>
                                    </div>
                                </div>

                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="attendance-me" role="tabpanel" aria-labelledby="attendance-me-tab"
                    tabindex="0">
                    <!-- attendance main container -->
                    <div class="d-flex" style="padding: 0; margin: 0; margin-top: 5px; margin-right: 1%;">
                        <!-- First Card -->
                        <div class="card" style="flex: 1; margin-right: 1%;">
                            <div class="card-header">
                                ATTENDANCE STATS
                            </div>
                            <div class="card-body">
                                Card Content 1
                            </div>
                        </div>
                        <!-- Second Card -->
                        <div class="card" style="flex: 1; margin-right: 1%;">
                            <div class="card-header">
                                TIMINGS
                            </div>
                            <div class="card-body">
                                Card Content 2
                            </div>
                        </div>
                        <!-- Third Card -->
                        <div class="card" style="flex: 1;">
                            <div class="card-header">
                                <div class="d-flex flex-column align-items-start">
                                    <span>ACTIONS</span>
                                    <div id="status" class="w-100"></div>
                                </div>
                            </div>

                            <div class="card-body" id="punchin-box">
                                <div class="d-flex flex-row mb-3">
                                    <div class="d-flex flex-column align-items-start mb-3 mr-4">
                                        <div class="mb-2">
                                            <label class="border" id="live-time"
                                                style="padding:2px; padding-top: 0;padding-bottom: 0"></label>
                                        </div>
                                        <div class="text-muted small">
                                            <span id="date_live"></span>
                                        </div>
                                        &nbsp;
                                        &nbsp;&nbsp;
                                        <div class="mb-3" id="total_hrs_dashboard">
                                            <p class="mb-1"><strong>Total Hours</strong></p>
                                            <p class="mb-0 small" id="effective_hrs_dashboard"></p>
                                            <p class="mb-0 small" id="gross_hrs_dashboard"></p>
                                        </div>
                                    </div>
                                    &nbsp;
                                    &nbsp;&nbsp;
                                    <div class="d-flex flex-column align-items-start">
                                        <button class="btn btn-primary" id="punchin_button"
                                            onclick="handleAttendance()">Web Clock-in</button>
                                        <p class="text-body-secondary mb-4" style="padding: 0;" hidden
                                            id="time_since_login"><label></label></p>
                                        <a href="#" class="d-block mb-1 text-primary"
                                            style="padding: 0; margin: 0;">Work From Home</a>
                                        <a href="#" class="d-block text-primary" style="padding: 0; margin: 0;">Partial
                                            Day</a>
                                    </div>
                                    &nbsp;
                                    &nbsp;&nbsp;

                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="card mt-3" style="flex: 1; margin-right: 1%;">
                        <div class="d-flex align-items-center" id="table-main-nav">
                            <div class="p-2 flex-grow-1" id="timeLine_table_header">
                                last 30 days
                            </div>
                            <div class="btn-group p-2" role="group" aria-label="Basic radio toggle button group">

                                <input type="radio" class="btn-check" name="btnradio" id="last_thirty_days"
                                    autocomplete="off" checked>
                                <label class="btn btn-outline-secondary" for="last_thirty_days">30 Days</label>

                                <input type="radio" class="btn-check" name="btnradio" id="radio_1" autocomplete="off">
                                <label class="btn btn-outline-secondary" for="radio_1"></label>

                                <input type="radio" class="btn-check" name="btnradio" id="radio_2" autocomplete="off">
                                <label class="btn btn-outline-secondary" for="radio_2"></label>

                                <input type="radio" class="btn-check" name="btnradio" id="radio_3" autocomplete="off">
                                <label class="btn btn-outline-secondary" for="radio_3"></label>

                                <input type="radio" class="btn-check" name="btnradio" id="radio_4" autocomplete="off">
                                <label class="btn btn-outline-secondary" for="radio_4"></label>

                                <input type="radio" class="btn-check" name="btnradio" id="radio_5" autocomplete="off">
                                <label class="btn btn-outline-secondary" for="radio_5"></label>

                                <input type="radio" class="btn-check" name="btnradio" id="radio_6" autocomplete="off">
                                <label class="btn btn-outline-secondary" for="radio_6"></label>

                            </div>
                        </div>
                        <div class="card-body" id="attendanceTableContainer">

                        </div>
                    </div>

                </div>

                <div class="tab-pane" id="performance-me" role="tabpanel" aria-labelledby="performance-me-tab"
                    tabindex="0">per
                </div>
                <div class="tab-pane" id="ent-me" role="tabpanel" aria-labelledby="ent-me-tab" tabindex="0">e and t
                </div>
                <div class="tab-pane" id="help-me" role="tabpanel" aria-labelledby="help-me-tab" tabindex="0">help
                </div>
                <div class="tab-pane" id="app-me" role="tabpanel" aria-labelledby="app-me-tab" tabindex="0">app
                </div>
                <!-- </div> -->
            </div>
        </div>

        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



        <div class="tab-pane fade" style="height: 100vh;" id="v-pills-messages" role="tabpanel"
            aria-labelledby="v-pills-messages-tab" tabindex="0" custom-bs="bs-bs">
            <nav class="nav nav-underline p-2">
                <a class="nav-link active" id="take-action-message-tab" data-bs-toggle="tab"
                    data-bs-target="#take-action-message" type="button" role="tab" aria-controls="take-action-message"
                    aria-selected="true"
                    style="color: black; display: flex; align-items: center; position: relative;">Take Action</a>
                <a class="nav-link" id="notification-message-tab" data-bs-toggle="tab"
                    data-bs-target="#notification-message" type="button" role="tab" aria-controls="notification-message"
                    aria-selected="true" style="color: black; display: flex; align-items: center; position: relative;">
                    Notification
                </a>

                <a class="nav-link" id="archive-message-tab" data-bs-toggle="tab" data-bs-target="#archive-message"
                    type="button" role="tab" aria-controls="archive-message" aria-selected="true"
                    style="color: black;">Archive</a>
            </nav>
            <hr style="padding: 0; margin: 0; margin-right: 1%;">
            <div class="tab-content">
                <div class="tab-pane active" id="take-action-message" role="tabpanel"
                    aria-labelledby="take-action-message-tab" tabindex="0">
                    <div class="row form-group " style="padding: 0; margin: 0; margin-top: 5px; margin-right: 1%;">
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
                <div class="tab-pane" id="notification-message" role="tabpanel"
                    aria-labelledby="notification-message-tab" tabindex="0">
                    <div class="row form-group " style="padding: 0; margin: 0; margin-top: 5px; margin-right: 1%;">
                        <div class="col-md-2 p-0">
                            <div class="card">
                                <div class="card-body">Notification Label</div>
                            </div>
                        </div>
                        <div class="col-md-10 p-0">
                            <div class="card">
                                <div class="card-body">Notification Data</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="archive-message" role="tabpanel" aria-labelledby="archive-message-tab"
                    tabindex="0">
                    <div class="row form-group " style="padding: 0; margin: 0; margin-top: 5px; margin-right: 1%;">
                        <div class="col-md-2 p-0">
                            <div class="card">
                                <div class="card-body">Archive Label</div>
                            </div>
                        </div>
                        <div class="col-md-10 p-0">
                            <div class="card">
                                <div class="card-body">Archive Data</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



        <div class="tab-pane fade" style="height: 100vh;" id="v-pills-team" role="tabpanel"
            aria-labelledby="v-pills-team-tab" tabindex="0" custom-bs="bs-bs">
            <nav class="nav nav-underline p-2">
                <a class="nav-link active" id="summary-team-tab" data-bs-toggle="tab" data-bs-target="#summary-team"
                    type="button" role="tab" aria-controls="summary-team" aria-selected="true"
                    style="color: black; display: flex; align-items: center; position: relative;">
                    Summary</a>
            </nav>
            <hr style="padding: 0; margin: 0; margin-right: 1%;">
            &nbsp;
            <div class="tab-content" style="padding: 0; margin: 0; margin-right: 1%;">
                <div class="tab-pane active" id="summary-team" role="tabpanel" aria-labelledby="summary-team-tab"
                    tabindex="0">

                    <div class="row d-flex flex-wrap justify-content-start" id="employee-cards">
                    </div>

                </div>
            </div>
        </div>

        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



        <div class="tab-pane fade" style="height: 100vh;" id="v-pills-finance" role="tabpanel"
            style="color: black; display: flex; align-items: center; position: relative;"
            aria-labelledby="v-pills-finance-tab" tabindex="0" custom-bs="bs-bs">
            <nav class="nav nav-underline p-2">
                <a class="nav-link active" id="summary-finance-tab" data-bs-toggle="tab"
                    data-bs-target="#summary-finance" type="button" role="tab" aria-controls="summary-finance"
                    aria-selected="true"
                    style="color: black; display: flex; align-items: center; position: relative;">Summary</a>
                <a class="nav-link" id="my-pay-finance-tab" data-bs-toggle="tab" data-bs-target="#my-pay-finance"
                    type="button" role="tab" aria-controls="my-pay-finance" aria-selected="true"
                    style="color: black; display: flex; align-items: center; position: relative;">My Pay</a>
                <a class="nav-link" id="manage-tax-finance-tab" data-bs-toggle="tab"
                    data-bs-target="#manage-tax-finance" type="button" role="tab" aria-controls="manage-tax-finance"
                    aria-selected="true"
                    style="color: black; display: flex; align-items: center; position: relative;">Manage Tax</a>
            </nav>
            <hr style="padding: 0; margin: 0; margin-right: 1%;">
            <div class="tab-content">
                <div class="tab-pane active" id="summary-finance" role="tabpanel" aria-labelledby="summary-finance-tab"
                    tabindex="0">
                    <div class="row form-group " style="padding: 0; margin: 0; margin-top: 5px; margin-right: 1%;">
                        <div class="col-md-2 p-0">
                            <div class="card">
                                <div class="card-body">Finance Summary</div>
                            </div>
                        </div>
                        <div class="col-md-10 p-0">
                            <div class="card">
                                <div class="card-body">Finance Data</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="my-pay-finance" role="tabpanel" aria-labelledby="my-pay-finance-tab"
                    tabindex="0">
                    <div class="row form-group " style="padding: 0; margin: 0; margin-top: 5px; margin-right: 1%;">
                        <div class="col-md-2 p-0">
                            <div class="card">
                                <div class="card-body">My Pay Label</div>
                            </div>
                        </div>
                        <div class="col-md-10 p-0">
                            <div class="card">
                                <div class="card-body">My Pay Data</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="manage-tax-finance" role="tabpanel" aria-labelledby="manage-tax-finance-tab"
                    tabindex="0">
                    <div class="row form-group " style="padding: 0; margin: 0; margin-top: 5px; margin-right: 1%;">
                        <div class="col-md-2 p-0">
                            <div class="card">
                                <div class="card-body">Manage Tax Label</div>
                            </div>
                        </div>
                        <div class="col-md-10 p-0">
                            <div class="card">
                                <div class="card-body">Manage Data</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



        <div class="tab-pane fade" style="height: 100vh;" id="v-pills-org" role="tabpanel"
            aria-labelledby="v-pills-org-tab" tabindex="0" custom-bs="bs-bs">
            <nav class="nav nav-underline p-2">
                <a class="nav-link active" id="employees-org-tab" data-bs-toggle="tab" data-bs-target="#employees-org"
                    type="button" role="tab" aria-controls="employees-org" aria-selected="true"
                    style="color: black; display: flex; align-items: center; position: relative;">Employees</a>
                <a class="nav-link" id="documents-org-tab" data-bs-toggle="tab" data-bs-target="#documents-org"
                    type="button" role="tab" aria-controls="documents-org" aria-selected="true"
                    style="color: black; display: flex; align-items: center; position: relative;">
                    Documents
                </a>

                <a class="nav-link" id="engage-org-tab" data-bs-toggle="tab" data-bs-target="#engage-org" type="button"
                    role="tab" aria-controls="engage-org" aria-selected="true" style="color: black;">Engage</a>
            </nav>
            <hr style="padding: 0; margin: 0; margin-right: 1%;">
            <div class="tab-content">
                <div class="tab-pane active" id="employees-org" role="tabpanel" aria-labelledby="employees-org-tab"
                    tabindex="0">
                    <div class="row form-group " style="padding: 0; margin: 0; margin-top: 5px; margin-right: 1%;">
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
                <div class="tab-pane" id="documents-org" role="tabpanel" aria-labelledby="documents-org-tab"
                    tabindex="0">
                    <div class="row form-group " style="padding: 0; margin: 0; margin-top: 5px; margin-right: 1%;">
                        <div class="col-md-2 p-0">
                            <div class="card">
                                <div class="card-body">Notification Label</div>
                            </div>
                        </div>
                        <div class="col-md-10 p-0">
                            <div class="card">
                                <div class="card-body">Notification Data</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="engage-org" role="tabpanel" aria-labelledby="engage-org-tab" tabindex="0">
                    <div class="row form-group " style="padding: 0; margin: 0; margin-top: 5px; margin-right: 1%;">
                        <div class="col-md-2 p-0">
                            <div class="card">
                                <div class="card-body">Archive Label</div>
                            </div>
                        </div>
                        <div class="col-md-10 p-0">
                            <div class="card">
                                <div class="card-body">Archive Data</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



        <div class="tab-pane fade " style="height: 100vh;" id="v-pills-performance" role="tabpanel"
            aria-labelledby="v-pills-performance-tab" tabindex="0" custom-bs="bs-bs">
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


        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->




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

        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



        <!-- THis section handles the clicks from the employees-card -->
        <div class="tab-pane fade " id="employees-nav" role="tabpanel" aria-labelledby="v-pills-performance-tab"
            tabindex="0">
            <div class="row mt-4" id="employee-detail-cards"
                style="padding: 0; margin: 0; margin-top: 5px; margin-right: 1%;">
            </div>
        </div>

        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


        <!-- table data display -->

        <div class="tab-pane fade " id="employees-summary-nav" role="tabpanel" aria-labelledby="v-pills-performance-tab"
            tabindex="0">
            <div class="row" style="padding: 0; margin: 0; margin-top: 25px; margin-right: 1%;">
                <div class="z-3" id="status"></div>

                <div class="col-md-12">
                    <div class="card mb-5">

                        <div class="card-body vh-100" style="overflow-y: auto;">
                            <form>
                                <div class="d-grid d-md-flex justify-content-md-end">
                                    <button type="button" class="btn btn-primary col-md-4 m-1" data-bs-toggle="modal"
                                        data-bs-target="#addEmp">
                                        Add New Employee
                                    </button>
                                </div>
                                <table border="1" class="table table-hover border border-success p-2 mb-2">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th style="padding: 10px;">Sl No</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Department</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="employeeTableBody">
                                        <!-- Employees will be populated here dynamically using jQuery -->
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- //////////////////////////////////////////////////////////////////////////////// -->
<!-- tab contents ends here -->


<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->




<!-- Add Emp-->
<div class="modal fade mt-5 " id="addEmp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="position: fixed; top: 0; width: 100%; z-index: 1070;">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between align-items-center">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Fill the employee details:</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="col-md-12">
                <div id="status" class="mt-3">
                </div>
            </div>
            <form id="emp_details_add_form">
                <div class="modal-body">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">First Name</span>
                        <input class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm" type="text" id="fname" name="fname"
                            placeholder="First Name" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Last Name</span>
                        <input class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm" type="text" id="lname" name="lname"
                            placeholder="Last Name" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
                        <input class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm" type="email" id="email" name="email"
                            placeholder="Email" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Phone Number</span>
                        <input class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm" type="text" id="phone_no" name="phone_no"
                            placeholder="Phone Number" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Department</span>
                        <input class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm" type="text" id="dept" name="dept"
                            placeholder="Department" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="emp_details_add_btn">Add
                        Employees</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


<!-- eidt emp -->

<div class="modal fade" style="position: fixed; top: 0; width: 100%; z-index: 1070;" id="editEmp" tabindex="-1"
    aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between align-items-center">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Fill the employee details:</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="col-md-12">
                <div id="status" class="mt-3">
                </div>
            </div>
            <div class="modal-body">
                <form id="edit-employee-form">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">First Name</span>
                        <input class="form-control" type="text" id="fname" name="fname" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Last Name</span>
                        <input class="form-control" type="text" id="lname" name="lname" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
                        <input class="form-control" type="email" id="email" name="email" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Phone Number</span>
                        <input class="form-control" type="text" id="phone_no" name="phone_no" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Department</span>
                        <input class="form-control" type="text" id="dept" name="dept" required>
                    </div>
                    <input type="hidden" id="user_id" name="user_id">
                    <div class="sign_btn d-flex justify-content-end gap-3">
                        <!-- <button type="submit" class="btn btn-primary">Update Employee</button> -->
                        <button type="submit" class="btn btn-success"
                            onclick="editAddlInformation(document.getElementById('user_id').value)">Next</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



<!-- delete confirmation modal -->
<div class="modal fade mt-3" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                Are you sure you want to delete this record?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="deleteClose" data-bs-dismiss="modal"
                    aria-label="Close">Cancel</button>
                <button id="deleteEmp" class="btn btn-danger" onclick="setId()">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



<!-- addl information -->
<div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <section class="section">
                    <div class="container">
                        <!-- Stepper Progress -->
                        <div class="stepper">
                            <div class="step-item" data-step="1">
                                <div class="step-marker">1</div>
                            </div>
                            <div class="step-item" data-step="2">
                                <div class="step-marker">2</div>
                            </div>
                            <div class="step-item" data-step="3">
                                <div class="step-marker">3</div>
                            </div>
                            <div class="step-item" data-step="4">
                                <div class="step-marker">4</div>
                            </div>
                            <div class="step-item" data-step="4">
                                <div class="step-marker">5</div>
                            </div>
                        </div>

                        <!-- Form Steps -->
                        <form id="multiStepForm">
                            <input type="hidden" name="user_id" id="user_id_additional" value="">
                            <!-- Step 1 -->
                            <div class="step active" data-step="1">
                                <h2 class="title">Basic Details</h2>
                                <div class="field">
                                    <div class="input-group input-group-sm mb-3 dropdown-center">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Gender</span>
                                        <button class="form-control btn btn-outline-secondary dropdown-toggle"
                                            style="border-color:#dee2e6" type="button" id="gender"
                                            data-bs-toggle="dropdown" aria-expanded="true">
                                            Select an option
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="#" data-value="Male">Male</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#" data-value="Female">Female</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#" data-value="Prefer Not To Say!">Prefer
                                                    Not To Say!</a>
                                            </li>
                                        </ul>
                                        <input type="hidden" name="gender" id="genderInput">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Date of
                                            Birth</span>
                                        <input class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" type="text" id="dob" name="dob"
                                            placeholder="Date of Birth" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="input-group input-group-sm mb-3 dropdown-center">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Marital
                                            Status</span>
                                        <button class="form-control btn btn-outline-secondary dropdown-toggle"
                                            style="border-color:#dee2e6" type="button" id="marStatus"
                                            data-bs-toggle="dropdown" aria-expanded="true">
                                            Select an option
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="#" data-value="Married">Married</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#" data-value="Unmarried">Unmarried</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#" data-value="Single">Single</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#" data-value="Divorced">Divorced</a>
                                            </li>
                                        </ul>
                                        <input type="hidden" name="marStatus" id="marStatusInput">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="input-group input-group-sm mb-3 dropdown-center">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Is
                                            Physically
                                            Handicapped?</span>
                                        <button class="form-control btn btn-outline-secondary dropdown-toggle"
                                            style="border-color:#dee2e6" type="button" id="handicapped"
                                            data-bs-toggle="dropdown" aria-expanded="true">
                                            Select an option
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="#" data-value="Yes">Yes</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#" data-value="No">No</a>
                                            </li>
                                        </ul>
                                        <input type="hidden" name="handicapped" id="handicappedInput">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Blood
                                            Group</span>
                                        <input class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" type="text" id="blood" name="blood"
                                            placeholder="Blood Group" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Nationality</span>
                                        <input class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" type="text" id="nation"
                                            name="nation" placeholder="Nationality" required>
                                    </div>
                                </div>
                                <button type="button" class="button is-link" onclick="nextStep(2)">Next</button>
                            </div>

                            <!-- Step 2 -->
                            <div class="step hidden" data-step="2">
                                <h2 class="title">Contact Details</h2>
                                <div class="field">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Personal
                                            Number</span>
                                        <input class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" type="text" id="pnumber"
                                            name="pnumber" placeholder="Personal Number" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Personal
                                            Email</span>
                                        <input class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" type="text" id="pEmail"
                                            name="pEmail" placeholder="Personal Email" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Residential
                                            Number</span>
                                        <input class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" type="text" id="rNumber"
                                            name="rNumber" placeholder="Residential Number" required>
                                    </div>
                                </div>
                                <button type="button" class="button is-link is-light"
                                    onclick="prevStep(1)">Back</button>
                                <button type="button" class="button is-link" onclick="nextStep(3)">Next</button>
                            </div>

                            <!-- Step 3 -->
                            <div class="step hidden" data-step="3">
                                <h2 class="title">Education</h2>
                                <div class="field">
                                    <div class="input-group input-group-sm mb-3 dropdown-center">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Type of
                                            Education</span>
                                        <button class="form-control btn btn-outline-secondary dropdown-toggle"
                                            style="border-color:#dee2e6" type="button" id="edu"
                                            data-bs-toggle="dropdown" aria-expanded="true">
                                            Select an option
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="#" data-value="Full Time">Full
                                                    Time</a></li>
                                            <li><a class="dropdown-item" href="#" data-value="Distant">Distant</a>
                                            </li>
                                        </ul>
                                        <input type="hidden" name="eduType" id="eduType">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Branch</span>
                                        <input class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" type="text" id="branch"
                                            name="branch" placeholder="Branch" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">CGPA or
                                            Percentage</span>
                                        <input class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" type="text" id="marks" name="marks"
                                            placeholder="CGPA or Percentage" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Year of
                                            Passing</span>
                                        <input class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" type="text" id="yop" name="yop"
                                            placeholder="Year of Passing" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Year of
                                            Joining</span>
                                        <input class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" type="text" id="yoj" name="yoj"
                                            placeholder="Year of Joining" required>
                                    </div>
                                </div>
                                <button type="button" class="button is-link is-light"
                                    onclick="prevStep(2)">Back</button>
                                <button type="button" class="button is-link" onclick="nextStep(4)">Next</button>
                            </div>
                            <!-- Step 4 -->
                            <div class="step hidden" data-step="4">
                                <h2 class="title">Address</h2>
                                <div class="field">
                                    <div class="input-group input-group-sm mb-3 dropdown-center">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Type of
                                            Address</span>
                                        <button class="form-control btn btn-outline-secondary dropdown-toggle"
                                            style="border-color:#dee2e6" type="button" id="addressType"
                                            data-bs-toggle="dropdown" aria-expanded="true">
                                            Select an option
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="#" data-value="Permanent">Permanent</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"
                                                    data-value="Residential">Residential</a>
                                            </li>
                                        </ul>
                                        <input type="hidden" name="addType" id="addType">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Address</span>
                                        <input class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" type="text" id="address"
                                            name="address" placeholder="Address" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">City</span>
                                        <input class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" type="text" id="city" name="city"
                                            placeholder="City" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Country</span>
                                        <input class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" type="text" id="country"
                                            name="country" placeholder="Country" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Pin
                                            Code</span>
                                        <input class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" type="text" id="pincode"
                                            name="pincode" placeholder="Pin Code" required>
                                    </div>
                                </div>
                                <button type="button" class="button is-link is-light"
                                    onclick="prevStep(3)">Back</button>
                                <button type="button" class="button is-link" onclick="nextStep(5)">Next</button>
                            </div>
                            <!-- Step 5 -->
                            <div class="step hidden" data-step="5">
                                <h2 class="title">Profile Picture</h2>
                                <div class="field">
                                    <div class="upload-container">
                                        <div class="upload-box" id="uploadBox">
                                            <div class="upload-icon">
                                                <img src="assets/icons/upload.svg" alt="Upload Icon">
                                            </div>
                                            <p>Drop your image here, or <a href="#" id="browseBtn">browse</a>
                                            </p>
                                            <p>Supports: JPG, JPEG and PNG</p>
                                            <input type="file" id="fileInput" style="display: none;" name="image"
                                                accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="button is-link is-light"
                                    onclick="prevStep(4)">Back</button>
                                <button type="submit" class="button is-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



<!-- request leave offcanvas -->
<div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="requestLeave"
    aria-labelledby="requestLeaveLabel" style="background: rgb(255,242,242);
background: linear-gradient(0deg, rgba(255,242,242,1) 0%, rgba(255,242,242,1) 100%);">
    <!-- header -->
    <div class="offcanvas-header">
        <h1 class="offcanvas-title" id="requestLeaveLabel">Request Leave</h1>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <!-- header -->

    <!-- //////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////////////////////////////////////// -->

    <!-- body -->
    <div class="offcanvas-body">
        <div class="box d-flex justify-content-center align-items-center">
            <div class="col">
                <input class="form-control" type="date" id="fromDate">
                <label>To</label>
                <input class="form-control" type="date" id="toDate">
            </div>
        </div>
        <!-- //////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////// -->

        <div class="box">
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Select type of leave you want to apply</option>
                <option value="1">Casual Leave</option>
                <option value="2">Breavement Leave</option>
                <option value="3">Comp Off</option>
                <option value="4">Marriage Leaves</option>
                <option value="5">Sick Leave</option>
                <option value="6">Unpaid Leave</option>

            </select>
        </div>
        <!-- //////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////// -->

        <div class="box">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                <label for="floatingTextarea">Note</label>
            </div>

        </div>
        <!-- //////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////// -->

        <div class="card">
            <div class="card-header autocomplete-container d-block">
                <div id="selected-users" class="mb-2">
                </div>
                <input class="form-control" type="text" id="search-leave-request" placeholder="Search Employee...">
            </div>
            <div class="card-body d-none" id="search-result-leave"
                style="height:190px; overflow-x:hidden; overflow-y:auto;">
            </div>
        </div>
        <!-- //////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////////////////////////////////////// -->

    </div>
    <!-- body -->
    <!-- /////////////////////////////////////////////////////////////////// -->
    <div class="offcanvas-footer mb-4">
        <div class="d-block float-end">
            <button class="btn btn-danger">Cancel</button>
            <button class="btn btn-success">Request Leave</button>

        </div>
    </div>

</div>

</div>
<?php include "./include_bootstrap/main-contents-footer.php"; ?>