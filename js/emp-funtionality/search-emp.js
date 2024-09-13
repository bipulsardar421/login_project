$("#nav-search").on("input", function () {
  var searchValue = $(this).val();
  if (searchValue) {
    $.ajax({
      url: "./db-connection/search.php",
      type: "POST",
      data: { search: searchValue },
      success: function (response) {
        var data = JSON.parse(response);
        $("#search-results").empty();

        if (data.length > 0) {
          var resultsHtml = "<ul class='list-group'>";
          data.forEach(function (item) {
            resultsHtml +=
              `<li class='list-group-item'>` +
              `<a href='#' class='dropdown-item card-details' data-user-id="${item.user_id}" onClick="cardClick(${item.user_id})" >` +
              `<strong>Name:</strong> ${item.fname} ${item.lname}<br>` +
              `<strong>Department:</strong> ${item.dept}` +
              `</a>` +
              `</li>`;
          });
          resultsHtml += "</ul>";

          $("#search-results").html(resultsHtml);
        } else {
          $("#search-results").html("<p>No results found.</p>");
        }
      },
      error: function (xhr, status, error) {
        console.error("Search failed:", error);
        $("#search-results").html("<p>An error occurred while searching.</p>");
      },
    });
  } else {
    $("#search-results").empty();
  }
});

$("#search_btn").on("click", function () {
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

$(document).on("click", ".card-details", function (event) {
  event.preventDefault();
  var card = document.getElementById("search_card");
  var button = document.getElementById("search_btn");
  card.classList.remove("expand");
  button.classList.remove("collapse");
});
