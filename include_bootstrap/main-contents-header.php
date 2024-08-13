
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
       

        .nav-bar-color {
            background: rgb(131, 58, 180);
            background: linear-gradient(90deg, rgba(131, 58, 180, 0.46262254901960786) 0%, rgba(191, 253, 29, 0.21052170868347342) 52%, rgba(252, 176, 69, 0.22452731092436973) 100%);
        }

        .circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #ddd;
        }

        .circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .main-container {
            display: flex;
            height: 100vh;
            flex-direction: row;
            background: rgb(255, 200, 224);
            background: radial-gradient(circle, rgba(255, 200, 224, 1) 0%, rgba(147, 171, 199, 1) 100%);
        }

        .sidebar {
            width: 7%;
            background: #6c757d
        }

        .sidebar .btn {
            width: 100%;
        }

        .sidebar .btn-group {
            width: 100%;
        }

        .tab-content {
            flex: 1;
            overflow-y: auto;
            background: transparent;
        }

        .font-size {
            font-size: 0.8rem;
        }

        .tab-pane {
            height: 100vh;
        }

        .btn-group.dropend:hover .dropdown-menu {
            display: block;
            position: absolute;
            top: 0;
            left: 100%;
            margin-top: 0;
            margin-left: 0.125rem;

        }

        .btn-group.dropStart:hover .dropdown-menu {
            display: block;
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 0;
            margin-left: 0.125rem;
            background: rgb(255, 255, 255);
            background: linear-gradient(0deg, rgba(255, 255, 255, 1) 5%, rgba(180, 206, 207, 1) 100%);
            font-size: 0.7rem;

        }


        .btn-group.dropStart .dropdown-toggle::after {
            display: none;
        }



        .btn-group.dropend .dropdown-toggle::after {
            display: none;
        }

        /*  */
        /* .card {
            display: none;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1050;
            transition: all 0.3s ease-in-out;
        } */

        .expand {
            display: block !important;
            opacity: 1 !important;
            max-height: 1000px;
        }

        .btn-disappear {
            transition: all 0.3s ease-in-out;
        }

        #myTab .nav-link {
            color: grey !important;
        }

        #myTab .nav-link.active {
            color: black !important;
        }



        #home-card-body .card-body {
            font-size: 0.9rem;
            height: auto;
            overflow: visible;
        }
    </style>

</head>

<body style=" background: rgb(255, 200, 224);
    background: radial-gradient(circle, rgba(255, 200, 224, 1) 0%, rgba(147, 171, 199, 1) 100%);">