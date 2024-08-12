<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Team Details</h1>
        <div class="row" id="employee-cards">
            <!-- Employee cards will be injected here -->
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch('./src/team-details.php')
                .then(response => response.json())
                .then(data => {
                    const employeeCards = document.getElementById('employee-cards');
                    data.forEach(employee => {
                        const cardDiv = document.createElement('div');
                        cardDiv.className = 'col-md-4 mb-4';
                        cardDiv.innerHTML = `
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src=${employee.url} alt="Employee Photo" class="rounded-circle me-3" style="width: 60px; height: 60px;">
                                        <h5 class="card-title mb-0">${employee.fname} ${employee.lname}</h5>
                                    </div>
                                    <p class="card-text">Position: ${employee.dept}</p>
                                    <p class="card-text">Department: ${employee.dept}</p>
                                    <p class="card-text">Location: ${employee.city}, ${employee.country}</p>
                                    <p class="card-text">Email: <a href="mailto:${employee.email}">${employee.email}</a></p>
                                </div>
                            </div>
                        `;
                        employeeCards.appendChild(cardDiv);
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        });
    </script>
</body>

</html>