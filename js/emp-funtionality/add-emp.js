let employee = [];
let user_id = "";

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

function addlInformation(id) {
  $("#employeeModal").modal("show");
  $("#employeeModal").css("z-index", "1070");
  $("#mainNavContainer").css("z-index", "");
  $("#user_id_additional").val(id);
}



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
