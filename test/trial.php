<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Select Component</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
       
    </style>
</head>

<body>
    <div class="container d-flex flex-column align-items-center mt-4">
        <div class="col-md-6">
            <div class="box">
                <div class="card">
                    <div class="card-header autocomplete-container">
                        <div id="selected-users" class="mb-2">
                            <!-- Selected users will be appended here -->
                        </div>
                        <input class="form-control" type="text" id="search-leave-request"
                            placeholder="Search Employee...">
                    </div>
                    <div class="card-body d-none" id="search-result-leave"
                        style="height:190px; overflow-x:hidden; overflow-y:auto;">
                        <!-- Results will be populated here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

   <script src='../js/request-leave.js'></script>
</body>

</html>