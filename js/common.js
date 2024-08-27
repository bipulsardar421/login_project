// inside
$(document).ready(function () {
  // global variables
  let imgFile;

  $("#tabPaneMainContainer").scrollTop(0);
  init("oninit");
  google.charts.load("current", { packages: ["corechart"] });
  google.charts.setOnLoadCallback(drawChart);

  var windowWidth = $(window).width();
  if (windowWidth < 720) {
    $("span#label_side_bar_icon").hide();
  }

  $('button[data-bs-toggle="pill"]').on({
    click: function () {
      init("ngDestroy");
      if ($(this).data("bs-target") == "#v-pills-home") {
        $("#v-pills-home").addClass("show active");
      }
    },
  });
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  // handling the dropdown navigation
  var currentDestination = null;
  $("a.dropdown-item").on({
    click: function () {
      if (currentDestination) {
        $(currentDestination).removeClass("show active");
      }
      init("ngDestroy");
      const dest = $(this).attr("dest");
      $(dest).addClass("show active");
      currentDestination = dest;
    },
  });
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  // log out
  $("#logOut").click(function () {
    sessionStorage.clear();
    localStorage.clear();
    window.location.href = "./index.php";
  });

  $("#nav-search").on("input", function () {
    var searchValue = $(this).val();
    if (searchValue) {
      $.ajax({
        url: "./db-connection/search.php",
        type: "POST",
        data: { search: searchValue },
        success: function (response) {
          var data = JSON.parse(response);
          $("#search-results").empty();

          if (data.length > 0) {
            var resultsHtml = "<ul class='list-group'>";
            data.forEach(function (item) {
              resultsHtml +=
                `<li class='list-group-item'>` +
                `<a href='#' class='dropdown-item card-details' data-user-id="${item.user_id}" onClick="cardClick(${item.user_id})" >` +
                `<strong>Name:</strong> ${item.fname} ${item.lname}<br>` +
                `<strong>Department:</strong> ${item.dept}` +
                `</a>` +
                `</li>`;
            });
            resultsHtml += "</ul>";

            $("#search-results").html(resultsHtml);
          } else {
            $("#search-results").html("<p>No results found.</p>");
          }
        },
        error: function (xhr, status, error) {
          console.error("Search failed:", error);
          $("#search-results").html(
            "<p>An error occurred while searching.</p>"
          );
        },
      });
    } else {
      $("#search-results").empty();
    }
  });
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  // Click event for showing and hiding the card
  $(document).on("click", ".card-details", function (event) {
    event.preventDefault();

    var card = document.getElementById("search_card");
    var button = document.getElementById("search_btn");
    ////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////
    // Hide card and show the button
    card.classList.remove("expand");
    button.classList.remove("collapse");
  });
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  // Button click event to show the search card
  $("#search_btn").on("click", function () {
    var button = this;
    var card = document.getElementById("search_card");
    var input = document.getElementById("nav-search");

    button.classList.add("collapse");

    setTimeout(function () {
      card.classList.add("expand");
      input.focus();
    }, 300);
  });
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  // Handle clicks outside the card and button to hide the card and show the button
  document.addEventListener("click", function (event) {
    var button = document.getElementById("search_btn");
    var card = document.getElementById("search_card");

    if (!card.contains(event.target) && !button.contains(event.target)) {
      $("#nav-search").empty();
      card.classList.remove("expand");
      button.classList.remove("collapse");
    }
  });
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  // to handle click from the employee cards

  $("#employee-cards").on("click", ".card", function () {
    const userId = $(this).find(".user_id").val();
    cardClick(userId);
  });
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  // this is to handle emp summary nav
  $("#emp-summary").on("click", function () {
    init("ngDestroy");
    refreshTheSession();
    $("#employees-summary-nav").addClass("show active");
  });
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  // add employee details
  $(document).ready(function () {
    $("#emp_details_add_btn").on("click", function (e) {
      e.preventDefault();

      var formData = {
        fname: $("#fname").val(),
        lname: $("#lname").val(),
        email: $("#email").val(),
        phone_no: $("#phone_no").val(),
        dept: $("#dept").val(),
      };
      toggleSpinner("start");
      $.ajax({
        type: "POST",
        url: "./db-connection/add-employee.php",
        data: formData,
        dataType: "json",
        success: function (response) {
          toggleSpinner("stop");
          if (response.success) {
            alertFunction(response.message, "success");
            refreshTheSession();
            $("#emp_details_add_form").find("input").val("");
            addlInformation(response.user_id);
            $("#addEmp").find(".btn-close").click();
          } else {
            appendAlert(response.message, "danger");
          }
        },
        error: function (xhr, status, error) {
          console.error("AJAX Error:", status, error);
        },
      });
    });
  });
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  // editing employee details
  $("#edit-employee-form").on("submit", function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    toggleSpinner("start");
    $.ajax({
      url: "./db-connection/edit-employee.php",
      type: "POST",
      data: formData,
      dataType: "json",
      success: function (response) {
        toggleSpinner("stop");
        if (response.success) {
          alertFunction(response.message, "success");
          $("#editEmp").find(".btn-close").click();
        } else {
          alertFunction(response.message, "danger");
        }
      },
      error: function (xhr, status, error) {
        alertFunction(error, "danger");
      },
    });
  });
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  // manipulating success page
  $("#editBtnSuccess").click(function () {});
  // $("#editEmp").on("shown.bs.modal", function () {
  //   console.log("open");
  //   $("#mainNavContainer").css("z-index", "");
  // });
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  // setting z-index for edit employee
  $("#editEmp").on("hidden.bs.modal", function () {
    $("#mainNavContainer").css("z-index", "1070");
  });

  if (!$("#editEmp").hasClass("show")) {
  } else if ($("#editEmp").hasClass("show")) {
    $("#mainNavContainer").css("z-index", "");
  }
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  // delete employee logic
  $("#deleteButton").on("click", function (e) {
    e.preventDefault();
    $("#mainNavContainer").css("z-index", "1070");

    // $("#deleteConfirmationModal").css("z-index", "1070");
    // $("#deleteConfirmationModal").modal("show");
  });
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  // handle the delete confirm button
  $("#deleteClose").click(function () {
    $("#mainNavContainer").css("z-index", "1070");
  });
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  // handle additional employee information
  var dropdownItems = document.querySelectorAll(
    "#multiStepForm .dropdown-item"
  );

  dropdownItems.forEach(function (item) {
    item.addEventListener("click", function (event) {
      console.log("clicked");
      event.preventDefault();
      var value = this.dataset.value;
      var inputGroup = this.closest(".input-group");
      var dropdownToggle = inputGroup.querySelector(".dropdown-toggle");
      var hiddenInput = inputGroup.querySelector('input[type="hidden"]');

      dropdownToggle.textContent = value;
      hiddenInput.value = value;
      if (!hiddenInput.name) {
        console.error("Hidden input does not have a 'name' attribute.");
      }
    });
  });
  // profile pic
  const uploadBox = document.getElementById("uploadBox");
  const fileInput = document.getElementById("fileInput");
  const browseBtn = document.getElementById("browseBtn");
  browseBtn.addEventListener("click", (event) => {
    event.preventDefault();
    fileInput.click();
  });
  fileInput.addEventListener("change", handleFileSelect);
  uploadBox.addEventListener("dragover", (event) => {
    event.preventDefault();
    uploadBox.classList.add("drop-active");
  });

  uploadBox.addEventListener("dragleave", () => {
    uploadBox.classList.remove("drop-active");
  });

  uploadBox.addEventListener("drop", (event) => {
    event.preventDefault();
    uploadBox.classList.remove("drop-active");
    if (event.dataTransfer.files.length) {
      handleFileSelect({ target: { files: event.dataTransfer.files } });
    }
  });

  function handleFileSelect(event) {
    const file = event.target.files[0];
    if (file && file.type.startsWith("image/")) {
      const reader = new FileReader();
      reader.onload = function (e) {
        const previewImage = document.createElement("img");
        previewImage.src = e.target.result;
        previewImage.classList.add("preview");
        previewImage.style.width = "100px";
        previewImage.style.height = "100px";
        previewImage.style.objectFit = "cover";

        const removeButton = document.createElement("button");
        removeButton.textContent = "Remove";
        removeButton.classList.add("remove-btn");
        removeButton.addEventListener("click", () => {
          resetUploadBox();
        });
        uploadBox.innerHTML = "";
        uploadBox.appendChild(previewImage);
        uploadBox.appendChild(removeButton);
      };
      reader.readAsDataURL(file);
    }
  }

  function resetUploadBox() {
    imgFile = "";
    uploadBox.innerHTML = `
          <div class="upload-icon">
              <img src="assets/icons/upload.svg" alt="Upload Icon">
          </div>
          <p>Drop your image here, or <a href="#" id="browseBtn">browse</a></p>
          <p>Supports: JPG, JPEG and PNG</p>
          <input type="file" id="fileInput" style="display: none;" accept="image/*">
      `;
    document.getElementById("browseBtn").addEventListener("click", (event) => {
      event.preventDefault();
      document.getElementById("fileInput").click();
    });
    document
      .getElementById("fileInput")
      .addEventListener("change", handleFileSelect);
  }
  $("#fileInput").on("change", function (e) {
    imgFile = e.target.files[0];
  });
  // handle addl information emp submit click

  document
    .getElementById("multiStepForm")
    .addEventListener("submit", function (e) {
      e.preventDefault();
      var formData = {};
      $("#multiStepForm")
        .find("input, select, textarea")
        .each(function () {
          var inputName = $(this).attr("name");
          var inputValue = $(this).val();

          formData[inputName] = inputValue;
        });
      $.ajax({
        url: "./m.php",
        type: "POST",
        data: JSON.stringify(formData),
        contentType: "application/json",
        success: function (response) {
          console.log("Data successfully sent:", response);
          var ImgformData = new FormData();
          ImgformData.append("image", imgFile);
          ImgformData.append("user_id", $("#user_id_additional").val());
          $.ajax({
            url: "./db-connection/emp-image-db-model.php",
            type: "POST",
            data: ImgformData,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "json",
            success: function (response) {
              if (response.status === "success") {
                alertFunction(response.message, "success");
                refreshTheSession();
                $("#employeeModal").modal("hide");
                $("#multiStepForm")[0].reset();
                $("#employees-summary-nav").addClass("show active");
              } else {
                alert(response.message);
              }
            },
            error: function (xhr, status, error) {
              alert("An error occurred while uploading the image.");
            },
          });
        },
        error: function (xhr, status, error) {
          console.error("Error sending data:", error);
        },
      });
    });
});
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
// outside
function closeEmployee() {
  init("ngDestroy");
  refreshTheSession();
  $("#v-pills-team").addClass("show active");
}
function init(what) {
  if (what == "oninit") {
    $("#v-pills-home").addClass("show active");
  } else if (what == "ngDestroy") {
    var activeTabPane = $(".tab-pane.show.active");
    activeTabPane.removeClass("show active");
  } else {
    $("#v-pills-home").removeClass("show active");
  }
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
// pie chart and bar graph logic
function drawChart() {
  const dataBar = google.visualization.arrayToDataTable([
    ["Year", "Git Contribution"],
    [2001, 70],
    [2002, 80],
    [2003, 80],
    [2004, 90],
    [2005, 90],
    [2006, 90],
    [2007, 50],
    [2008, 60],
    [2009, 70],
    [2010, 60],
    [2011, 40],
  ]);
  const dataPie = google.visualization.arrayToDataTable([
    ["Year", "Git Contribution"],

    ["2007", 50],
    ["2008", 60],
    ["2009", 70],
    ["2010", 60],
    ["2011", 40],
  ]);
  const optionsBar = {
    title: "Performance review for last 10 years",
    hAxis: { title: "Years" },
    vAxis: { title: "Git Contribution" },
    legend: "none",
  };
  const optionsPie = {
    title: "Performance review for last 5 years",
  };
  const chart = new google.visualization.LineChart(
    document.getElementById("barChart")
  );
  const pie = new google.visualization.PieChart(
    document.getElementById("pieChart")
  );

  chart.draw(dataBar, optionsBar);
  pie.draw(dataPie, optionsPie);
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
// route configuration not completed
function route(where) {
  console.log(where);
  console.log(`#${where}`);
  init("ngDestroy");
  if (where && $(`#${where}`).length) {
    $(`#${where}`).addClass("show active");
  } else {
    console.error("Invalid target or element not found for routing.");
  }
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
// session refresh
let employee = [];
let user_id = "";
function refreshTheSession() {
  $("#tabPaneMainContainer").scrollTop(0);
  toggleSpinner("start");
  $.ajax({
    url: "./db-connection/team-details.php",
    type: "GET",
    dataType: "json",
    success: function (data) {
      toggleSpinner("stop");
      if (Array.isArray(data) && data.length > 0) {
        const employees = data.map((employee, index) => ({
          sl_no: index + 1,
          user_id: employee.user_id,
          fname: employee.fname,
          lname: employee.lname,
          email: employee.email,
          phone_no: employee.phone_no,
          dept: employee.dept,
        }));
        employee = employees;
        renderEmployeeTable(employees);
      } else {
        console.log("No employees found.");
      }
    },
    error: function (xhr, status, error) {
      console.error("Failed to fetch employee data:", error);
    },
  });
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
// render employee table
function renderEmployeeTable(employees) {
  let employeeTableBody = $("#employeeTableBody");
  employeeTableBody.empty();

  employees.forEach((employee, index) => {
    employeeTableBody.append(`
                  <tr style="text-align: center;">
                      <td>${index + 1}</td>
                      <td>${employee.fname}</td>
                      <td>${employee.lname}</td>
                      <td>${employee.email}</td>
                      <td>${employee.phone_no}</td>
                      <td>${employee.dept}</td>
                      <td>
                       <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                          data-bs-target="#editEmp"
                          style="background-color: transparent; border: none; color: red; cursor: pointer;"
                          id="editBtnSuccess"
                          onclick="empDetails(${employee.user_id})">
                          <i class="fas fa-pencil-alt"></i>
                      </button>                      
                      </td>
                      <td>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" id="deleteButton" onClick="setId(${
                        employee.user_id
                      })"><i class="fa fa-trash"></i></button>
                      </td>
                  </tr>
              `);
  });
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
// setting user_id
function setId(id) {
  $("#mainNavContainer").css("z-index", "");
  if (id !== undefined) {
    $("#deleteConfirmationModal").css("z-index", "1070");
    user_id = id;
  } else {
    deleteEmployee(parseInt(user_id));
  }
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
// emp details to edit
function empDetails(id) {
  $("#mainNavContainer").css("z-index", "");
  const employeeData = employee.find((emp) => emp.user_id === id.toString());
  $("#editEmp #fname").val(employeeData.fname);
  $("#editEmp #lname").val(employeeData.lname);
  $("#editEmp #email").val(employeeData.email);
  $("#editEmp #phone_no").val(employeeData.phone_no);
  $("#editEmp #dept").val(employeeData.dept);
  $('#editEmp input[name="user_id"]').val(employeeData.user_id);
  $("#editEmp").modal("show");
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
// Delete employee
function deleteEmployee(id) {
  $.ajax({
    url: "./db-connection/delete-employee.php",
    type: "POST",
    data: { user_id: id },
    success: function (response) {
      alertFunction(response.message, "success");
      refreshTheSession();
      setTimeout(() => {
        $("#deleteConfirmationModal").find("#deleteClose").click();
      }, 100);
    },
    error: function (xhr, status, error) {
      alertFunction(error, "danger");
      console.error("Error during deletion:", error);
    },
  });
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
// Add employee form submission
$("#addEmpForm").on("submit", function (e) {
  e.preventDefault();
  const newEmployee = {
    user_id: employees.length + 1,
    fname: $("#addFname").val(),
    lname: $("#addLname").val(),
    email: $("#addEmail").val(),
    phone_no: $("#addPhone").val(),
    dept: $("#addDept").val(),
  };
  employees.push(newEmployee);
  renderEmployeeTable();
  $("#addEmpModal").modal("hide");
});
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
// Edit employee form submission
$("#editEmpForm").on("submit", function (e) {
  e.preventDefault();
  const id = $("#editEmpId").val();
  const updatedEmployee = {
    user_id: parseInt(id),
    fname: $("#editFname").val(),
    lname: $("#editLname").val(),
    email: $("#editEmail").val(),
    phone_no: $("#editPhone").val(),
    dept: $("#editDept").val(),
  };
  employees = employees.map((emp) =>
    emp.user_id === parseInt(id) ? updatedEmployee : emp
  );
  renderEmployeeTable();
  $("#editEmpModal").modal("hide");
});
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
// Show Add Employee Modal
$("#addEmpBtn").on("click", function () {
  $("#addEmpModal").modal("show");
});
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
// alert function
function alertFunction(message, type) {
  const alertPlaceholder = document.getElementById("status");
  const wrapper = document.createElement("div");
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible fade show" role="alert">`,
    `   <div>${message}</div>`,
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
    "</div>",
  ].join("");
  alertPlaceholder.append(wrapper);
  setTimeout(() => {
    wrapper.remove();
  }, 5000);
}

function toggleSpinner(action) {
  const content = document.querySelector(".content");
  let spinnerOverlay = document.getElementById("spinnerOverlay");

  if (action === "start") {
    if (!spinnerOverlay) {
      spinnerOverlay = document.createElement("div");
      spinnerOverlay.id = "spinnerOverlay";
      spinnerOverlay.classList.add("spinner-overlay");
      spinnerOverlay.innerHTML = `
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      `;
      document.body.appendChild(spinnerOverlay);
      const style = document.createElement("style");
      style.textContent = `
        .spinner-overlay {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
          background: rgba(1, 1, 1, 0.8);
          z-index: 1070;
        }
        .blurred {
          filter: blur(5px);
        }
      `;
      document.head.appendChild(style);
    }

    spinnerOverlay.style.display = "flex";
    if (content) {
      content.classList.add("blurred");
    }
  } else if (action === "stop") {
    if (spinnerOverlay) {
      spinnerOverlay.style.display = "none";
      if (content) {
        content.classList.remove("blurred");
      }
    }
  }
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
// call only from emp cards
function cardClick(userId) {
  if (!userId) {
    console.error("No user ID provided.");
    return;
  }
  init("ngDestroy");
  $("#employees-nav").addClass("show active");
  const formData = new FormData();
  formData.append("user_id", parseInt(userId));
  fetch("./db-connection/get-employee-details.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((data) => {
      const employee = data;
      const employeeCards = document.getElementById("employee-detail-cards");
      const cardDiv = document.createElement("div");
      cardDiv.className = "employee-profile-card";
      let url = employee.url
        ? employee.url
        : "./assets/fallback_image/profile.jpg";

      employeeCards.innerHTML = "";
      cardDiv.innerHTML = `
      <div class="card h-100">
        <div class="card-header d-flex justify-content-end">
          <button class="btn btn-transparent" onClick="closeEmployee()">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <div class="card-body">
          <div class="d-flex align-items-center">
            <img src="db-connection/images/emp_images/${url}" alt="Employee Photo" class="me-3" style="width: 80px; height: 80px;"
              onerror="this.onerror=null;this.src='./assets/fallback_image/profile.jpg';">              
            <div>
              <h5 class="card-title mb-1" style="font-size: 1.3rem;">
                ${employee.fname} ${employee.lname} 
                <span class="badge bg-success ms-2">IN</span>
              </h5>
              <p>
                ${employee.dept} | <a href="mailto:${employee.email}" class="text-decoration-none">${employee.email}</a> | 
                ${employee.phone_no} | 
                ${employee.city}, ${employee.country}
              </p>
            </div>
          </div>
          <hr class="my-4">
          <div class="d-flex justify-content-start">
            <p class="mb-1 mx-2"><strong>Business Unit:</strong> ${employee.dept}</p>
            <p class="mb-1 mx-2"><strong>Department:</strong> ${employee.dept}</p>
            <p class="mb-1 mx-2"><strong>Location:</strong> ${employee.city}</p>
            <p class="mb-1 mx-2"><strong>Country:</strong> ${employee.country}</p>
          </div>

        </div>
      </div>
    `;

      employeeCards.appendChild(cardDiv);
    })
    .catch((error) => console.error("Error fetching data:", error));
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////

// additional employee details
function addlInformation(id) {
  $("#employeeModal").modal("show");
  $("#employeeModal").css("z-index", "1070");
  $("#mainNavContainer").css("z-index", "");
  $("#user_id_additional").val(id);
}

// addl emp next and prev click
function nextStep(step) {
  // Handle Form Steps
  const currentStep = document.querySelector(".step.active");
  const nextStep = document.querySelector(`.step[data-step="${step}"]`);

  currentStep.classList.remove("active");
  currentStep.classList.add("hidden");

  nextStep.classList.remove("hidden");
  nextStep.classList.add("active");

  // Handle Stepper Indicator
  const currentStepItem = document.querySelector(
    `.step-item[data-step="${step - 1}"]`
  );
  const nextStepItem = document.querySelector(
    `.step-item[data-step="${step}"]`
  );

  if (currentStepItem) {
    currentStepItem.classList.remove("active");
    currentStepItem.classList.add("complete");
  }

  if (nextStepItem) {
    nextStepItem.classList.add("active");
  }
}

function prevStep(step) {
  // Handle Form Steps
  const currentStep = document.querySelector(".step.active");
  const prevStep = document.querySelector(`.step[data-step="${step}"]`);

  currentStep.classList.remove("active");
  currentStep.classList.add("hidden");

  prevStep.classList.remove("hidden");
  prevStep.classList.add("active");

  // Handle Stepper Indicator
  const currentStepItem = document.querySelector(
    `.step-item[data-step="${step + 1}"]`
  );
  const prevStepItem = document.querySelector(
    `.step-item[data-step="${step}"]`
  );

  if (currentStepItem) {
    currentStepItem.classList.remove("active");
  }

  if (prevStepItem) {
    prevStepItem.classList.remove("complete");
    prevStepItem.classList.add("active");
  }
}

// image upload
document.addEventListener("DOMContentLoaded", () => {});

////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
// get current emp
function populateEmployeeDetails() {
  fetch("./db-connection/team-details.php")
    .then((response) => response.json())
    .then((data) => {
      const employeeCards = document.getElementById("employee-cards");
      employeeCards.innerHTML = "";

      if (data.length === 0) {
        const noUsersFoundDiv = document.createElement("div");
        noUsersFoundDiv.className = "col-12 text-center mt-4";
        noUsersFoundDiv.innerHTML = `
          <p class="text-muted" style="font-size: 1.2rem;">No users found</p>
        `;
        employeeCards.appendChild(noUsersFoundDiv);
      } else {
        data.forEach((employee) => {
          let url = employee.url
            ? employee.url
            : "./assets/fallback_image/profile.jpg";
          const cardDiv = document.createElement("div");
          cardDiv.className = "col-sm-3 mb-4";
          cardDiv.innerHTML = `
            <div class="card h-100" id="list-card">
              <div class="card-body" style="font-size: 0.9rem;">
                <div class="d-flex align-items-center mb-3">
                  <img src="db-connection/images/emp_images/${url}" alt="Employee Photo" class="rounded-circle me-3" style="width: 60px; height: 60px;"
                    onerror="this.onerror=null;this.src='./assets/fallback_image/profile.jpg';">
                  <h5 class="card-title mb-0" style="font-size: 1.1rem;">${employee.fname} ${employee.lname}</h5>
                </div>
                <input type="hidden" class="user_id" name="user_id" value="${employee.user_id}">
                <p class="card-text" style="font-size: 0.85rem;"><strong>Position:</strong> ${employee.dept}</p>
                <p class="card-text" style="font-size: 0.85rem;"><strong>Department:</strong> ${employee.dept}</p>
                <p class="card-text" style="font-size: 0.85rem;"><strong>Location:</strong> ${employee.city}, ${employee.country}</p>
                <p class="card-text" style="font-size: 0.85rem;"><strong>Email:</strong> <a href="mailto:${employee.email}">${employee.email}</a></p>
              </div>
            </div>
          `;
          employeeCards.appendChild(cardDiv);
        });
      }
    })
    .catch((error) => console.error("Error fetching data:", error));
}
