$(document).ready(function () {
  init("oninit");

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

  // $("#nav-search").on("input", function () {
  //   var searchValue = $(this).val();
  //   $.ajax({
  //     url: "../login_projects/db-connection/search.php",
  //     type: "POST",
  //     data: { search: searchValue },
  //     success: function (response) {
  //       var data = JSON.parse(response);
  //       console.log("Search Results:", data);
  //     },
  //     error: function (xhr, status, error) {
  //       console.error("Search failed:", error);
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
  $("div#employee-cards").on("mouseleave", ".employee-card", function () {
    $(this).css("cursor", "default");
  });

  $("div#employee-cards").on("click", ".employee-card", function () {
    console.log("Card clicked:", $(this).data("id"));
  });

});

function init(what) {
  if (what == "oninit") {
    $("#v-pills-home").addClass("show active");
  } else {
    $("#v-pills-home").removeClass("show active");
  }

  console.log("Initialization logic for static elements");
}
