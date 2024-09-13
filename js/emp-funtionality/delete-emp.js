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

$("#deleteButton").on("click", function (e) {
  e.preventDefault();
  $("#mainNavContainer").css("z-index", "1070");
});

$("#deleteClose").click(function () {
  $("#mainNavContainer").css("z-index", "1070");
});
