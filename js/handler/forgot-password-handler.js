document
  .getElementById("forgotPwdForm")
  .addEventListener("submit", function (event) {
    console.log("click");
    event.preventDefault();

    const email = document.getElementById("email_to_reset").value;
    toggleSpinner("start");

    const formData = new FormData();
    formData.append("email", email);

    fetch("./db-connection/forgotpwd-db-model.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.status === "success") {
          toggleSpinner("stop");
          document.getElementById("otp_email").value = email;
          const otpModal = new bootstrap.Modal(document.getElementById("otp"));
          otpModal.show();
        } else {
          toggleSpinner("stop");
          alert(data.message);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("An error occurred. Please try again.");
      });
  });

//   verify otp

$("#verifyOtpButton").click(function () {
  var formData = {
    email: $("#otp_email").val(),
    otp: $("#otpText").val(),
    otpVerify: true,
  };
  $.ajax({
    type: "POST",
    url: "./db-connection/otp-matching.php",
    data: formData,
    dataType: "json",
    success: function (response) {
      if (response.status === "success") {
        $("#otpResponse").html(
          '<div class="alert alert-success">' + response.message + "</div>"
        );
        window.location.href = response.redirect;
      } else {
        $("#otpResponse").html(
          '<div class="alert alert-danger">' + response.message + "</div>"
        );
      }
    },
    error: function (xhr, status, error) {
      $("#otpResponse").html(
        '<div class="alert alert-danger">An error occurred: ' + error + "</div>"
      );
    },
  });
});

// reset password
function redirectToSignIn() {
  window.location.href = "../index.php";
}

function validatePasswords() {
  var newPassword = document.getElementById("newPassword").value;
  var confirmPassword = document.getElementById("confirmPassword").value;

  if (newPassword !== confirmPassword) {
    alert("Passwords do not match!");
    return false;
  }
  return true;
}

