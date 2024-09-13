function togglePasswordType(id, toggleId) {
  const passwordField = document.getElementById(id);
  const logoField = document.getElementById(toggleId);
  const type =
    passwordField.getAttribute("type") === "password" ? "text" : "password";
  passwordField.setAttribute("type", type);
  logoField.classList.toggle("fa-eye");
  logoField.classList.toggle("fa-eye-slash");
}

$("#loginForm").on("submit", function (event) {
  event.preventDefault();

  var email = $("#email_to_login").val();
  var pwd = $("#pwd").val();
  toggleSpinner("start");
  $.ajax({
    type: "POST",
    url: "./db-connection/login.php",
    data: {
      email: email,
      pwd: pwd,
    },
    dataType: "json",
    success: function (response) {
      sessionStorage.setItem('aboutUser', JSON.stringify(response));
      toggleSpinner("stop");
      if (response.status === "success") {
        showToast(response.message, "success");
        setTimeout(() => {
          window.location.href = "./db-connection/" + response.redirect_url;
        }, 1000);
      } else {
        showToast(response.message, "danger");
      }
    },
    error: function (xhr, status, error) {
      toggleSpinner("stop");
      alert("An error occurred: " + error);
    },
  });
});
