<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media (max-width: 767.98px) {
            .card-body {
                font-size: 0.8rem;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row" id="employee-cards">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch('./db-connection/team-details.php')
                .then(response => response.json())
                .then(data => {
                    const employeeCards = document.getElementById('employee-cards');
                    data.forEach(employee => {
                        console.log(employee.user_id);
                        const cardDiv = document.createElement('div');
                        cardDiv.className = 'col-sm-3 mb-4';
                        cardDiv.innerHTML = `
                            
                            <div class="card h-100" id="list-card">
                                <div class="card-body" style="font-size: 0.9rem;">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src=${employee.url} alt="Employee Photo" class="rounded-circle me-3" style="width: 60px; height: 60px;">
                                        <h5 class="card-title mb-0" style="font-size: 1.1rem;">${employee.fname} ${employee.lname}</h5>
                                    </div>
                                    <input type="hidden" class="user_id" name="user_id" value="${employee.user_id}">
                                    <p class="card-text" style="font-size: 0.85rem;">Position: ${employee.dept}</p>
                                    <p class="card-text" style="font-size: 0.85rem;">Department: ${employee.dept}</p>
                                    <p class="card-text" style="font-size: 0.85rem;">Location: ${employee.city}, ${employee.country}</p>
                                    <p class="card-text" style="font-size: 0.85rem;">Email: <a href="mailto:${employee.email}">${employee.email}</a></p>
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