<!DOCTYPE html>
<html lang="en">


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link href="./styles/body-color.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    .step-content {
        display: none;
    }

    .step-content.active {
        display: block;
    }

    .btn-container {
        margin-top: 20px;
    }
</style>
</head>

<body class="body-color">
    <!-- Trigger button -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#employeeModal">
        Launch Employee Form
    </button>

    <!-- Modal -->
    <div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="btn-container float-start">
                        <button type="button" class="btn btn-secondary" id="prevBtn" style="display:none;">
                            Previous
                        </button>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <h2>Additional Employee Details: </h2>
                                    <form id="multiStepForm">
                                        <input type="hidden" name="user_id" id="user_id_additional" value="5">
                                        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                                            <!-- Nav Tabs -->
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                                    href="#step1" role="tab" aria-controls="pills-home"
                                                    aria-selected="true">Step 1</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                                    href="#step2" role="tab" aria-controls="pills-profile"
                                                    aria-selected="false">Step 2</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                                    href="#step3" role="tab" aria-controls="pills-contact"
                                                    aria-selected="false">Step 3</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                                    href="#step4" role="tab" aria-controls="pills-contact"
                                                    aria-selected="false">Step 4</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="step1" role="tabpanel"
                                                aria-labelledby="pills-home-tab">
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-sm">Gender</span>
                                                    <button
                                                        class="form-control btn btn-outline-secondary dropdown-toggle"
                                                        style="border-color:#dee2e6" type="button" id="gender"
                                                        data-bs-toggle="dropdown" aria-expanded="true">
                                                        Select an option
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li><a class="dropdown-item" href="#" data-value="Male">Male</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#"
                                                                data-value="Female">Female</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#"
                                                                data-value="Prefer Not To Say!">Prefer Not To Say!</a>
                                                        </li>
                                                    </ul>
                                                    <input type="hidden" name="gender" id="genderInput">
                                                </div>
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Date of
                                                        Birth</span>
                                                    <input class="form-control" aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-sm" type="text" id="dob"
                                                        name="dob" placeholder="Date of Birth" required>
                                                </div>
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Marital
                                                        Status</span>
                                                    <button
                                                        class="form-control btn btn-outline-secondary dropdown-toggle"
                                                        style="border-color:#dee2e6" type="button" id="marStatus"
                                                        data-bs-toggle="dropdown" aria-expanded="true">
                                                        Select an option
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li><a class="dropdown-item" href="#"
                                                                data-value="Married">Married</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#"
                                                                data-value="Unmarried">Unmarried</a></li>
                                                        <li><a class="dropdown-item" href="#"
                                                                data-value="Single">Single</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#"
                                                                data-value="Divorced">Divorced</a>
                                                        </li>
                                                    </ul>
                                                    <input type="hidden" name="marStatus" id="marStatusInput">
                                                </div>
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Is
                                                        Physically
                                                        Handicapped?</span>
                                                    <button
                                                        class="form-control btn btn-outline-secondary dropdown-toggle"
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
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Blood
                                                        Group</span>
                                                    <input class="form-control" aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-sm" type="text" id="blood"
                                                        name="blood" placeholder="Blood Group" required>
                                                </div>
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-sm">Nationality</span>
                                                    <input class="form-control" aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-sm" type="text" id="nation"
                                                        name="nation" placeholder="Nationality" required>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="step2" role="tabpanel"
                                                aria-labelledby="pills-profile-tab">
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Personal
                                                        Number</span>
                                                    <input class="form-control" aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-sm" type="text" id="pnumber"
                                                        name="pnumber" placeholder="Personal Number" required>
                                                </div>
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Personal
                                                        Email</span>
                                                    <input class="form-control" aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-sm" type="text" id="pEmail"
                                                        name="pEmail" placeholder="Personal Email" required>
                                                </div>
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Residential
                                                        Number</span>
                                                    <input class="form-control" aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-sm" type="text" id="rNumber"
                                                        name="rNumber" placeholder="Residential Number" required>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="step3" role="tabpanel"
                                                aria-labelledby="pills-contact-tab">
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Type of
                                                        Education</span>
                                                    <button
                                                        class="form-control btn btn-outline-secondary dropdown-toggle"
                                                        style="border-color:#dee2e6" type="button" id="edu"
                                                        data-bs-toggle="dropdown" aria-expanded="true">
                                                        Select an option
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li><a class="dropdown-item" href="#"
                                                                data-value="Full Time">Full
                                                                Time</a></li>
                                                        <li><a class="dropdown-item" href="#"
                                                                data-value="Distant">Distant</a>
                                                        </li>
                                                    </ul>
                                                    <input type="hidden" name="eduType" id="eduType">
                                                </div>
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-sm">Branch</span>
                                                    <input class="form-control" aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-sm" type="text" id="branch"
                                                        name="branch" placeholder="Branch" required>
                                                </div>
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">CGPA or
                                                        Percentage</span>
                                                    <input class="form-control" aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-sm" type="text" id="marks"
                                                        name="marks" placeholder="CGPA or Percentage" required>
                                                </div>
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Year of
                                                        Passing</span>
                                                    <input class="form-control" aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-sm" type="text" id="yop"
                                                        name="yop" placeholder="Year of Passing" required>
                                                </div>
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Year of
                                                        Joining</span>
                                                    <input class="form-control" aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-sm" type="text" id="yoj"
                                                        name="yoj" placeholder="Year of Joining" required>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="step4" role="tabpanel"
                                                aria-labelledby="pills-contact-tab">
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Type of
                                                        Address</span>
                                                    <button
                                                        class="form-control btn btn-outline-secondary dropdown-toggle"
                                                        style="border-color:#dee2e6" type="button" id="edu"
                                                        data-bs-toggle="dropdown" aria-expanded="true">
                                                        Select an option
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li><a class="dropdown-item" href="#"
                                                                data-value="Permanent">Permanent</a></li>
                                                        <li><a class="dropdown-item" href="#"
                                                                data-value="Residential">Residential</a>
                                                        </li>
                                                    </ul>
                                                    <input type="hidden" name="addType" id="addType">
                                                </div>
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-sm">Address</span>
                                                    <input class="form-control" aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-sm" type="text" id="address"
                                                        name="address" placeholder="Address" required>
                                                </div>
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">City</span>
                                                    <input class="form-control" aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-sm" type="text" id="city"
                                                        name="city" placeholder="City" required>
                                                </div>
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-sm">Country</span>
                                                    <input class="form-control" aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-sm" type="text" id="country"
                                                        name="country" placeholder="Country" required>
                                                </div>
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Pin
                                                        Code</span>
                                                    <input class="form-control" aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-sm" type="text" id="pincode"
                                                        name="pincode" placeholder="Pin Code" required>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="card-footer text-center">
                        <div class="btn-container float-end">
                            <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var dropdownItems = document.querySelectorAll('.dropdown-item');
            dropdownItems.forEach(function (item) {
                item.addEventListener('click', function (event) {
                    event.preventDefault();
                    var value = this.dataset.value;
                    var inputGroup = this.closest('.input-group');
                    var dropdownToggle = inputGroup.querySelector('.dropdown-toggle');
                    var hiddenInput = inputGroup.querySelector('input[type="hidden"]');
                    dropdownToggle.textContent = value;
                    hiddenInput.value = value;
                    if (!hiddenInput.name) {
                        console.error("Hidden input does not have a 'name' attribute.");
                    }
                });
            });
            var currentTab = 0;
            var tabs = document.querySelectorAll('.nav-pills .nav-link');
            var totalTabs = tabs.length;
            var prevBtn = document.getElementById('prevBtn');
            var nextBtn = document.getElementById('nextBtn');
            var form = document.getElementById('multiStepForm');

            function showTab(tabIndex) {
                tabs.forEach(function (tab, index) {
                    tab.classList.toggle('active', index === tabIndex);
                });
                document.querySelectorAll('.tab-pane').forEach(function (pane, index) {
                    pane.classList.toggle('show', index === tabIndex);
                    pane.classList.toggle('active', index === tabIndex);
                });
                prevBtn.style.display = tabIndex > 0 ? 'inline-block' : 'none';
                nextBtn.textContent = tabIndex === totalTabs - 1 ? 'Submit' : 'Next';
            }
            nextBtn.addEventListener('click', function (event) {
                if (currentTab < totalTabs - 1) {
                    currentTab++;
                    showTab(currentTab);
                } else {
                    event.preventDefault();
                    var formData = {};
                    $('#multiStepForm').find('input, select, textarea').each(function () {
                        var inputName = $(this).attr('name');
                        var inputValue = $(this).val();

                        formData[inputName] = inputValue;
                    });
                    console.log(JSON.stringify(formData, null, 2));
                }
            });

            prevBtn.addEventListener('click', function () {
                if (currentTab > 0) {
                    currentTab--;
                    showTab(currentTab);
                }
            });
            showTab(currentTab);
        });


    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>