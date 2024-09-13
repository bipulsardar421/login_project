$("#search-leave-request").on("input", function () {
  var searchValue = $(this).val();
  if (searchValue) {
    $.ajax({
      url: "http://localhost/login_projects/db-connection/search.php",
      type: "POST",
      data: { search: searchValue },
      success: function (response) {
        var data = JSON.parse(response);
        $("#search-result-leave").empty();

        if (data && data.length > 0) {
          var resultsHtml = "<ul class='list-group'>";
          data.forEach(function (item) {
            resultsHtml +=
              `<li class='list-group-item search-result-item' data-user-id="${item.user_id}" data-name="${item.fname} ${item.lname}" data-src="http://localhost/login_projects/db-connection/images/emp_images/${item.url}">` +
              `<img src="http://localhost/login_projects/db-connection/images/emp_images/${item.url}" alt="Avatar" style="width:30px; height:30px">` +
              `</strong> ${item.fname} ${item.lname} | ` +
              `${item.dept}` +
              `</li>`;
          });
          resultsHtml += "</ul>";

          $("#search-result-leave").html(resultsHtml);
          $("#search-result-leave").removeClass("d-none");
        } else {
          $("#search-result-leave").html("<p>No results found.</p>");
          $("#search-result-leave").removeClass("d-none");
        }
      },
      error: function (xhr, status, error) {
        console.error("Search failed:", error);
        $("#search-result-leave").html(
          "<p>An error occurred while searching.</p>"
        );
        $("#search-result-leave").removeClass("d-none");
      },
    });
  } else {
    $("#search-result-leave").empty();
    $("#search-result-leave").addClass("d-none");
  }
});
$(document).on("click", ".search-result-item", function () {
  var userId = $(this).data("user-id");
  var name = $(this).data("name");
  var url = $(this).data("src");
  var selectedHtml = `<div class="selected-item">
        <img src="${url}" alt="Avatar">${name}
        <span class="remove-item">&times;</span>
    </div>`;
  $("#selected-users").append(selectedHtml);
  $("#search-leave-request").val("");
  $("#search-result-leave").empty().addClass("d-none");
});
$(document).on("click", ".remove-item", function () {
  $(this).parent().remove();
});
