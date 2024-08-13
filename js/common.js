$(document).ready(function () {
  init("oninit");

  google.charts.load("current", { packages: ["corechart"] });
  google.charts.setOnLoadCallback(drawChart);

  var windowWidth = $(window).width();
  console.log(windowWidth);
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
  // $("#nav-search").on("input", function () {
  //   var searchValue = $(this).val();

  //   $.ajax({
  //     url: "../login_projects/db-connection/search.php",
  //     type: "POST",
  //     data: { search: searchValue },
  //     success: function (response) {
  //       var data = JSON.parse(response);

  //       $("#search-results").empty();
  //       if (data.length > 0) {
  //         var resultsHtml = "<ul class='list-group'>";
  //         data.forEach(function (item) {
  //           resultsHtml +=
  //             "<li class='list-group-item'><a href='#' class='dropdown-item'";
  //           resultsHtml +=
  //             "<strong>Name:</strong> " +
  //             item.fname +
  //             " " +
  //             item.lname +
  //             "<br>";
  //           resultsHtml += "<strong>Department:</strong> " + item.dept + "<br>";
  //           resultsHtml += "</a></li>";
  //         });
  //         resultsHtml += "</ul>";

  //         $("#search-results").html(resultsHtml);
  //       } else {
  //         $("#search-results").html("<p>No results found.</p>");
  //       }
  //     },
  //     error: function (xhr, status, error) {
  //       console.error("Search failed:", error);
  //       $("#search-results").html("<p>An error occurred while searching.</p>");
  //     },
  //   });
  // });

  document.getElementById("search_btn").addEventListener("click", function () {
    var button = this;
    var card = document.getElementById("search_card");
    var input = document.getElementById("nav-search");
    button.classList.add("collapse");

    setTimeout(function () {
      card.classList.add("expand");
      input.focus();
    }, 300);
  });
  document.addEventListener("click", function (event) {
    var button = document.getElementById("search_btn");
    var card = document.getElementById("search_card");

    if (!card.contains(event.target) && !button.contains(event.target)) {
      $("#nav-search").empty();
      card.classList.remove("expand");
      button.classList.remove("collapse");
    }
  });

  // to handle click from the employee cards

  $("#employee-cards").on("click", ".card", function () {
    const userId = $(this).find(".user_id").val();
    init("ngDestroy");
    $("#employees-nav").addClass("show active");
    const formData = new FormData();
    formData.append("user_id", userId);

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
        let url = employee.url ? employee.url : './assets/fallback_image/profile.jpg';
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
              <img src="${url}" alt="Employee Photo" class="me-3" style="width: 80px; height: 80px;"
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
  });
  // this is to handle emp summary nav
  $("#emp-summary").on("click", function () {
    init("ngDestroy");
    $("#employees-summary-nav").addClass("show active");
  })

  $(document).ready(function () {
    $('#emp_details_add_btn').on('click', function (e) {
      e.preventDefault();

      var formData = {
        fname: $('#fname').val(),
        lname: $('#lname').val(),
        email: $('#email').val(),
        phone_no: $('#phone_no').val(),
        dept: $('#dept').val()
      };

      $.ajax({
        type: 'POST',
        url: './db-connection/add-employee.php',
        data: formData,
        dataType: 'json',
        success: function (response) {
          console.log(response);
          if (response.success) {
            appendAlert(response.message, 'danger');
            // $('#addEmp').modal('hide');
          } else {
            alert(response.message);
          }
        },
        error: function (xhr, status, error) {
          console.error('AJAX Error:', status, error);
        }
      });
    });
  });


  const alertPlaceholder = document.getElementById('status')
  const appendAlert = (message, type) => {
    const wrapper = document.createElement('div')
    wrapper.innerHTML = [
      `<div class="alert alert-${type} alert-dismissible" role="alert">`,
      `   <div>${message}</div>`,
      '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
      '</div>'
    ].join('')

    alertPlaceholder.append(wrapper)
  }

  const alertTrigger = document.getElementById('liveAlertBtn')
  if (alertTrigger) {
    alertTrigger.addEventListener('click', () => {
      appendAlert('Nice, you triggered this alert message!', 'success')
    })
  }
});


// outside
function closeEmployee() {
  init("ngDestroy");
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

  console.log("Initialization logic for static elements");
}

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
