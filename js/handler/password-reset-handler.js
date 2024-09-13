$(document).ready(function () {
  $("#updatePasswordButton").click(function () {
    // Validate passwords
    var newPassword = $("#newPassword").val();
    var confirmPassword = $("#confirmPassword").val();

    if (newPassword !== confirmPassword) {
      $("#responseMessage").html(
        '<div class="alert alert-danger">Passwords do not match!</div>'
      );
      return;
    }
    var formData = {
      email: $("#email").val(),
      newPassword: newPassword,
    };
    console.log(formData);
    $.ajax({
      type: "POST",
      url: "../db-connection/reset-db-model.php",
      data: formData,
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          $("#responseMessage").html(
            '<div class="alert alert-success">' + response.message + "</div>"
          );
          setTimeout(function () {
            window.location.href = response.redirect;
          }, 2000);
        } else {
          $("#responseMessage").html(
            '<div class="alert alert-danger">' + response.message + "</div>"
          );
        }
      },
      error: function (xhr, status, error) {
        $("#responseMessage").html(
          '<div class="alert alert-danger">An error occurred: ' +
            error +
            "</div>"
        );
      },
    });
  });
});
