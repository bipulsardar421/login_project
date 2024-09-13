// inside

$(document).ready(function () {
  $("#tabPaneMainContainer").scrollTop(0);
  init("oninit");
  updateTime();

  var windowWidth = $(window).width();
  if (windowWidth < 720) {
    $("span#label_side_bar_icon").hide();
  }

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

  // log out
  $("#logOut").click(function () {
    sessionStorage.clear();
    localStorage.clear();
    window.location.href = "./index.php";
  });

  // this is to handle emp summary nav

  $("#emp-summary").on("click", function () {
    init("ngDestroy");
    refreshTheSession();
    $("#employees-summary-nav").addClass("show active");
  });

  $("#requestLeaveBtn").on("click", function () {
    console.log("clicked off cna");
    $("#mainNavContainer").css("z-index", "");
    $("#tabPaneMainContainer").css("z-index", "");
    $("#requestLeave").css("z-index", "1070");
    const bsOffcanvas = new bootstrap.Offcanvas("#requestLeave");
    bsOffcanvas.show();
  });
  $("#requestLeave .btn-close").on("click", function () {
    $("#mainNavContainer").css("z-index", "1071");
    $("#tabPaneMainContainer").css("z-index", "1070");
    setTimeout(() => {
      $("#requestLeave").css("z-index", "");
      const bsOffcanvas = new bootstrap.Offcanvas("#requestLeave");
      bsOffcanvas.dispose();
    }, 1000);
  });

});

// outside
function init(what) {
  if (what == "oninit") {
    $("#v-pills-home").addClass("show active");
  } else if (what == "ngDestroy") {
    var activeTabPane = $(".tab-pane.show.active");
    activeTabPane.removeClass("show active");
  } else {
    $("#v-pills-home").removeClass("show active");
  }
}

// route configuration
var path = {};
$('#tabPaneMainContainer button[role="tab"]')
  .not('#mainTabContent button[role="tab"]')
  .each(function () {
    path[$(this).attr("id")] = $(this).attr("data-bs-target");
  });

$('#tabPaneMainContainer button[role="tab"]')
  .not('#mainTabContent button[role="tab"]')
  .on("click", function () {
    route(this.id, path[this.id]);
  });

function route(what, where) {
  var activeTabPane = $("#mainTabContent .show.active");
  activeTabPane.removeClass("show active");
  init("ngDestroy");
  $(where).addClass("show active");
  console.log("route");
  console.log(activeTabPane.attr("id"));
}

// Show Add Employee Modal
$("#addEmpBtn").on("click", function () {
  $("#addEmpModal").modal("show");
});
