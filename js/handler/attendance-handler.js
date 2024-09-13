$(document).ready(function () {
  $("#attendance-me-tab").on("click", function () {
    getStatus();
    setInterval(updateTime, 1000);
    $("#date_live").text(getFormattedDate("details"));
  });
});
var aboutUser;
var login_time_global = "";

function getStatus() {
  settingGlobalVariable();
  toggleSpinner("start");
  var settings = {
    url: "./db-connection/attendance.php?getStatus",
    method: "POST",
    timeout: 0,
    headers: {
      "Content-Type": "application/json",
    },
    data: JSON.stringify({
      user_id: aboutUser.data.sl_no,
      today_date: getFormattedDate("simple"),
    }),
  };

  $.ajax(settings).done(function (response) {
    toggleSpinner("stop");
    if (response.status === "success" && response.data) {
      if (response.data.is_login == 1) {
        login_time_global = response.data.login_time;
        $("#punchin_button").removeClass("btn-primary").addClass("btn-danger");
        $("#punchin_button").text("Web Clock-out");
        getDetailsFromApi(JSON.stringify(prepareDate("30 Days")));
      } else {
        $("#punchin_button").removeClass("btn-danger").addClass("btn-primary");
        $("#punchin_button").text("Web Clock-in");
        getDetailsFromApi(JSON.stringify(prepareDate("30 Days")));
      }
    } else {
      console.log(
        "Error or invalid response:",
        response.message || "Unknown error"
      );
    }
  });
}

function clock_in() {
  settingGlobalVariable();

  var settings = {
    url: "./db-connection/attendance.php?login",
    method: "POST",
    timeout: 0,
    headers: {
      "Content-Type": "application/json",
    },
    data: JSON.stringify({
      user_id: aboutUser.data.sl_no,
      login_time: getTime(),
      today_date: getFormattedDate("simple"),
    }),
    success: function (response) {
      if (response.status === "success") {
        getStatus();
      } else {
        alertFunction("Already Logged Out, try on next date!!", "danger");
        getStatus();
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error("Clock-in AJAX error: " + textStatus, errorThrown);
    },
  };

  $.ajax(settings);
}

function clock_out() {
  settingGlobalVariable();

  var settings = {
    url: "./db-connection/attendance.php?logout",
    method: "POST",
    timeout: 0,
    headers: {
      "Content-Type": "application/json",
    },
    data: JSON.stringify({
      user_id: aboutUser.data.sl_no,
      logout_time: getTime(),
      today_date: getFormattedDate("simple"),
    }),
    success: function (response) {
      if (response.status === "success") {
        login_time_global = "";
        getStatus();
      } else {
        alertFunction("Something went wrong !!", "danger");
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error("Clock-out AJAX error: " + textStatus, errorThrown);
    },
  };

  $.ajax(settings);
}

function handleAttendance() {
  if ($("#punchin_button").hasClass("btn-primary")) {
    clock_in();
  } else {
    clock_out();
  }
}

// setting global variable

function settingGlobalVariable() {
  aboutUser = JSON.parse(sessionStorage.getItem("aboutUser"));
}

// this is to update time
function updateTime() {
  const timeElement = document.getElementById("live-time");
  if (timeElement) {
    dashboardTimeSetter(login_time_global);
    timeElement.textContent = getTime("for the dashboard");
  } else {
    console.error("Element with ID 'live-time' not found.");
  }
}

function getTime(display) {
  if (display) {
    const date = new Date();
    let hours = date.getHours();
    const minutes = String(date.getMinutes()).padStart(2, "0");
    const seconds = String(date.getSeconds()).padStart(2, "0");
    const ampm = hours >= 12 ? "PM" : "AM";
    hours = hours % 12;
    hours = hours ? hours : 12;
    const formattedTime = `${String(hours).padStart(
      2,
      "0"
    )}:${minutes}:${seconds} ${ampm}`;
    return formattedTime;
  } else {
    const date = new Date();
    const hours = String(date.getHours()).padStart(2, "0");
    const minutes = String(date.getMinutes()).padStart(2, "0");
    const seconds = String(date.getSeconds()).padStart(2, "0");
    const formattedTime = `${hours}:${minutes}:${seconds}`;
    return formattedTime;
  }
}

function getFormattedDate(format) {
  const now = new Date();
  const days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
  const months = [
    "Jan",
    "Feb",
    "Mar",
    "Apr",
    "May",
    "Jun",
    "Jul",
    "Aug",
    "Sept",
    "Oct",
    "Nov",
    "Dec",
  ];
  if (format === "details") {
    let dayName = days[now.getDay()];
    let day = now.getDate().toString().padStart(2, "0");
    let month = months[now.getMonth()];
    let year = now.getFullYear();
    return `${dayName} ${day}, ${month} ${year}`;
  } else if (format === "simple") {
    let year = now.getFullYear();
    let month = (now.getMonth() + 1).toString().padStart(2, "0");
    let day = now.getDate().toString().padStart(2, "0");
    return `${year}-${month}-${day}`;
  } else {
    return "Invalid format";
  }
}

function dashboardTimeSetter(res) {
  var currentTime = getTime();
  var loginTime = new Date(`1970-01-01T${res}Z`);
  if (isNaN(loginTime.getTime())) {
    document.getElementById("effective_hrs_dashboard").innerHTML =
      "Effective Hours: 00:00:00";
    return;
  }
  var currentTimeObj = new Date(`1970-01-01T${currentTime}Z`);
  var diffInMs = currentTimeObj - loginTime;
  var hours = Math.floor(diffInMs / (1000 * 60 * 60));
  var minutes = Math.floor((diffInMs % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((diffInMs % (1000 * 60)) / 1000);
  document.getElementById(
    "effective_hrs_dashboard"
  ).innerHTML = `Effective Hours: ${hours}h ${minutes}m ${seconds}s`;
}
