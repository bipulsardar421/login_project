$("#submitBtn").on("click", function () {
  var formData = $("#signupForm").serialize();
  $.ajax({
    url: "./db-connection/db.php",
    type: "POST",
    data: formData,
    dataType: "json",
    success: function (response) {
      if (response.status === "ok") {
        showToast(response.message, "success");
        setTimeout(() => {
          $('#createNew button[aria-label="Close"]').click();
        }, 1000);
      } else {
        showToast(response.message, "danger");
      }
    },
    error: function (xhr, status, error) {
      console.error("AJAX Error: ", status, error);
      alert("An error occurred while processing your request.");
    },
  });
});
