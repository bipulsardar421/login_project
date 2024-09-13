$("#editEmp").on("hidden.bs.modal", function () {
  $("#mainNavContainer").css("z-index", "1070");
});

if (!$("#editEmp").hasClass("show")) {
} else if ($("#editEmp").hasClass("show")) {
  $("#mainNavContainer").css("z-index", "");
}

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
async function editAddlInformation(id) {
  $("#editEmp").modal("hide");
  console.log(id);
  const employeeData = await getAdditionalDetails(id);
  console.log(employeeData);
  $("#multiStepForm #user_id_additional").val(employeeData.user_id);
  $("#multiStepForm #genderInput").val(employeeData.gender);
  $("#multiStepForm #gender").text(employeeData.gender);
  $("#multiStepForm #dob").val(employeeData.dob);
  $("#multiStepForm #marStatusInput").val(employeeData.maritial_status);
  $("#multiStepForm #marStatus").text(employeeData.maritial_status);

  $("#multiStepForm #handicappedInput").val(
    employeeData.physically_handicapped
  );
  $("#multiStepForm #handicapped").text(employeeData.physically_handicapped);

  $("#multiStepForm #blood").val(employeeData.blood_group);
  $("#multiStepForm #nation").val(employeeData.nationality);
  $("#multiStepForm #pnumber").val(employeeData.personal_mobile_number);
  $("#multiStepForm #pEmail").val(employeeData.personal_email);
  $("#multiStepForm #rNumber").val(employeeData.residence_number);
  $("#multiStepForm #eduType").val(employeeData.eduType);
  $("#multiStepForm #edu").text(employeeData.eduType);

  $("#multiStepForm #branch").val(employeeData.branch);
  $("#multiStepForm #marks").val(employeeData.cgpa);
  $("#multiStepForm #yop").val(employeeData.yop);
  $("#multiStepForm #yoj").val(employeeData.yoj);
  $("#multiStepForm #addType").val(employeeData.addrType);
  $("#multiStepForm #addressType").text(employeeData.addrType);

  $("#multiStepForm #address").val(employeeData.address);
  $("#multiStepForm #city").val(employeeData.city);
  $("#multiStepForm #country").val(employeeData.country);
  $("#multiStepForm #pincode").val(employeeData.post_code);
  if (employeeData.url) {
    manipulateTheImageDiv(employeeData.url);
  }
  $("#employeeModal").modal("show");
  $("#employeeModal").css("z-index", "1070");
  $("#mainNavContainer").css("z-index", "0");
}
$("#edit-employee-form").on("submit", function (e) {
  e.preventDefault();
  var formData = $(this).serialize();
  console.log("aaaaaa");
});

function addFirstLevelOfEmployeeData(formData) {
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
}

function getAdditionalDetails(user_id) {
  var form = new FormData();
  form.append("user_id", user_id);

  var settings = {
    url: "http://localhost/login_projects/db-connection/get-employee-details.php",
    method: "POST",
    processData: false,
    mimeType: "multipart/form-data",
    contentType: false,
    data: form,
  };

  return new Promise(function (resolve, reject) {
    $.ajax(settings)
      .done(function (response) {
        console.log(response);
        resolve(JSON.parse(response));
      })
      .fail(function (jqXHR, textStatus, errorThrown) {
        reject(errorThrown);
      });
  });
}

function manipulateTheImageDiv(isThereAnyThing) {
  const uploadBoxElement = $("#multiStepForm .upload-container");
  uploadBoxElement.html("");
  if (!isThereAnyThing) {
    uploadBoxElement.append(`
      <div class="upload-box" id="uploadBox">
        <div class="upload-icon">
          <img src="assets/icons/upload.svg" alt="Upload Icon">
        </div>
        <p>Drop your image here, or <a href="#" id="browseBtn">browse</a></p>
        <p>Supports: JPG, JPEG and PNG</p>
        <input type="file" id="fileInput" style="display: none;" name="image" accept="image/*">
      </div>
    `);
    setupUploadBoxEvents();
  } else {
    uploadBoxElement.append(`
      <div class="upload-box" id="uploadBox">
        <div class="uploaded-image">
          <img src="db-connection/images/emp_images/${isThereAnyThing}" alt="Uploaded Image" style="max-width: 100%; height: auto;">
        </div>
      </div>
      <div class="d-flex justify-content-end">
        <button class="btn btn-danger" onclick="removeImage()">Remove</button>
      </div>
    `);
  }
}
function setupUploadBoxEvents() {
  const uploadBox = $("#uploadBox");
  const fileInput = $("#fileInput");
  $("#browseBtn").on("click", function (e) {
    e.preventDefault();
    fileInput.click();
  });
  fileInput.on("change", function () {
    const file = this.files[0];
    if (file) {
      handleFileUpload(file);
    }
  });
  uploadBox.on("dragover", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).addClass("dragover");
  });

  uploadBox.on("dragleave", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).removeClass("dragover");
  });

  uploadBox.on("drop", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).removeClass("dragover");

    const file = e.originalEvent.dataTransfer.files[0];
    if (file) {
      handleFileSelect(file);
    }
  });
}

function handleFileUpload(file) {
  const reader = new FileReader();
  reader.onload = function (e) {
    $("#uploadBox").html(
      `<img src="${e.target.result}" alt="Uploaded Image" style="max-width: 100%; height: auto;">
      <div class="d-flex justify-content-end">
        <button class="btn btn-danger" onclick="removeImage()">Remove</button>
      </div>`
    );
  };
  reader.readAsDataURL(file);
}

function removeImage() {
  manipulateTheImageDiv(null);
}

function removeImage() {
  console.log("Remove image clicked");
  manipulateTheImageDiv(null);
}
