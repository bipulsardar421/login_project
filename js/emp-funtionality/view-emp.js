function cardClick(userId) {
  if (!userId) {
    console.error("No user ID provided.");
    return;
  }
  init("ngDestroy");
  $("#employees-nav").addClass("show active");
  const formData = new FormData();
  formData.append("user_id", parseInt(userId));
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
      cardDiv.className = "employee-profile-card p-0";
      let url = employee.url
        ? employee.url
        : "./assets/fallback_image/profile.jpg";

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
              <img src="db-connection/images/emp_images/${url}" alt="Employee Photo" class="me-3" style="width: 80px; height: 80px;"
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
}

function closeEmployee() {
  init("ngDestroy");
  refreshTheSession();
  $("#v-pills-team").addClass("show active");
}


function populateEmployeeDetails() {
  fetch("./db-connection/team-details.php")
    .then((response) => response.json())
    .then((data) => {
      const employeeCards = document.getElementById("employee-cards");
      employeeCards.innerHTML = "";

      if (data.length === 0) {
        const noUsersFoundDiv = document.createElement("div");
        noUsersFoundDiv.className = "col-12 text-center mt-4";
        noUsersFoundDiv.innerHTML = `
            <p class="text-muted" style="font-size: 1.2rem;">No users found</p>
          `;
        employeeCards.appendChild(noUsersFoundDiv);
      } else {
        data.forEach((employee) => {
          let url = employee.url
            ? employee.url
            : "./assets/fallback_image/profile.jpg";
          const cardDiv = document.createElement("div");
          cardDiv.className = "col-sm-3 mb-4";
          cardDiv.innerHTML = `
              <div class="card h-100" id="list-card">
                <div class="card-body" style="font-size: 0.9rem;">
                  <div class="d-flex align-items-center mb-3">
                    <img src="db-connection/images/emp_images/${url}" alt="Employee Photo" class="rounded-circle me-3" style="width: 60px; height: 60px;"
                      onerror="this.onerror=null;this.src='./assets/fallback_image/profile.jpg';">
                    <h5 class="card-title mb-0" style="font-size: 1.1rem;">${employee.fname} ${employee.lname}</h5>
                  </div>
                  <input type="hidden" class="user_id" name="user_id" value="${employee.user_id}">
                  <p class="card-text" style="font-size: 0.85rem;"><strong>Position:</strong> ${employee.dept}</p>
                  <p class="card-text" style="font-size: 0.85rem;"><strong>Department:</strong> ${employee.dept}</p>
                  <p class="card-text" style="font-size: 0.85rem;"><strong>Location:</strong> ${employee.city}, ${employee.country}</p>
                  <p class="card-text" style="font-size: 0.85rem;"><strong>Email:</strong> <a href="mailto:${employee.email}">${employee.email}</a></p>
                </div>
              </div>
            `;
          employeeCards.appendChild(cardDiv);
        });
      }
    })
    .catch((error) => console.error("Error fetching data:", error));
}

$("#employee-cards").on("click", ".card", function () {
  const userId = $(this).find(".user_id").val();
  cardClick(userId);
});

function renderEmployeeTable(employees) {
  let employeeTableBody = $("#employeeTableBody");
  employeeTableBody.empty();

  employees.forEach((employee, index) => {
    employeeTableBody.append(`
                    <tr style="text-align: center;">
                        <td>${index + 1}</td>
                        <td>${employee.fname}</td>
                        <td>${employee.lname}</td>
                        <td>${employee.email}</td>
                        <td>${employee.phone_no}</td>
                        <td>${employee.dept}</td>
                        <td>
                         <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editEmp"
                            style="background-color: transparent; border: none; color: red; cursor: pointer;"
                            id="editBtnSuccess"
                            onclick="empDetails(${employee.user_id})">
                            <i class="fas fa-pencil-alt"></i>
                        </button>                      
                        </td>
                        <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" id="deleteButton" onClick="setId(${
                          employee.user_id
                        })"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                `);
  });
}

function setId(id) {
  $("#mainNavContainer").css("z-index", "");
  if (id !== undefined) {
    $("#deleteConfirmationModal").css("z-index", "1070");
    user_id = id;
  } else {
    deleteEmployee(parseInt(user_id));
  }
}
