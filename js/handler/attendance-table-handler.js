$(document).ready(function () {
  updateMonthsInTheTable();
  getDetailsFromApi(JSON.stringify(prepareDate("30 Days")));
  $('input[type="radio"]').on("click", function () {
    var associatedLabel = $('label[for="' + $(this).attr("id") + '"]');
    getDetailsFromApi(JSON.stringify(prepareDate(associatedLabel.text())));
  });
});

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

function updateMonthsInTheTable() {
  const currentDate = new Date();
  console.log(currentDate);
  let currentMonthIndex = currentDate.getMonth();
  for (let i = 0; i < 6; i++) {
    let monthIndex = (currentMonthIndex - i + 12) % 12;
    let label = $(`label[for="radio_${i + 1}"]`);
    label.text(months[monthIndex]);
  }
}
function prepareDate(yeah_data) {
  const start_date = getFormattedDate("simple");
  if (yeah_data == "30 Days") {
    const [year, month, day] = start_date.split("-").map(Number);
    const currentDate = new Date(year, month - 1, day);
    currentDate.setDate(currentDate.getDate() - 30);
    const formattedDate = `${currentDate.getFullYear()}-${(
      currentDate.getMonth() + 1
    )
      .toString()
      .padStart(2, "0")}-${currentDate.getDate().toString().padStart(2, "0")}`;
    return preparePayload({ start_date: formattedDate, end_date: start_date });
  } else {
    const month = months.indexOf(`${yeah_data}`) + 1;
    const currentYear = new Date().getFullYear();
    const startDate = new Date(currentYear, month - 1, 1);
    const endDate = new Date(currentYear, month, 0);
    const formattedStartDate = `${startDate.getFullYear()}-${(
      startDate.getMonth() + 1
    )
      .toString()
      .padStart(2, "0")}-${startDate.getDate().toString().padStart(2, "0")}`;
    const formattedEndDate = `${endDate.getFullYear()}-${(
      endDate.getMonth() + 1
    )
      .toString()
      .padStart(2, "0")}-${endDate.getDate().toString().padStart(2, "0")}`;
    return preparePayload({
      start_date: formattedStartDate,
      end_date: formattedEndDate,
    });
  }
}

function preparePayload(yeah_data) {
  const aboutUser = JSON.parse(sessionStorage.getItem("aboutUser"));
  return {
    user_id: aboutUser.data.sl_no,
    date_range: `${yeah_data.start_date} to ${yeah_data.end_date}`,
  };
}

// api
function getDetailsFromApi(yeah_data) {
  toggleSpinner("start");
  var settings = {
    url: "./db-connection/attendance.php?loginhistory",
    method: "POST",
    timeout: 0,
    headers: {
      "Content-Type": "application/json",
    },
    data: yeah_data,
  };

  $.ajax(settings).done(function (response) {
    toggleSpinner("stop");
    createAttendanceTable(response);
  });
}

function createAttendanceTable(response) {
  var data =
    typeof response === "string" ? JSON.parse(response).data : response.data;
  var table = `<table class="table table-light">
                      <thead>
                          <tr>
                              <th scope="col">Date</th>
                              <th scope="col">Effective Hours</th>
                              <th scope="col">Arrival</th>
                              <th scope="col">Log Out</th>
                              <th scope="col"></th>
                          </tr>
                      </thead>
                      <tbody>`;
  if (!data || data.length === 0) {
    table += `<tr><td colspan="5" class="text-center">No record found</td></tr>`;
  } else {
    data.forEach(function (record, index) {
      var loginTime = new Date(`1970-01-01T${record.login_time}Z`);
      var logoutTime = record.logout_time
        ? new Date(`1970-01-01T${record.logout_time}Z`)
        : null;
      var effectiveHours = logoutTime
        ? ((logoutTime - loginTime) / (1000 * 60 * 60)).toFixed(2)
        : NaN;
      table += `<tr>
                      <th scope="row">${record.today_date}</th>
                      <td>${
                        !isNaN(effectiveHours)
                          ? effectiveHours + " hrs"
                          : "Not Logged Out"
                      }</td>
                      <td>${record.login_time}</td>
                      <td>${
                        record.logout_time ? record.logout_time : "N/A"
                      }</td>
                      <td></td>
                    </tr>`;
    });
  }
  table += `</tbody></table>`;
  document.getElementById("attendanceTableContainer").innerHTML = table;
}
