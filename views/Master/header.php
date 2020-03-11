<html>
<head>
    <title>Fitness Tracker</title>
    <link href="../../styles/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<header>
    <h1>
        <img src="../../img/logo.png" alt="Logo">
        Fitness Tracker
    </h1>
    <nav class="navbar" data-spy="affix" data-offset-top="197">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Fitness Tracker</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="#">
                        <span class="glyphicon glyphicon-home"></span>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="../../img/exerciseIcon.png" alt="Workout Logo">
                        Workouts
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="../../img/mealsIcon.png" alt="Meals Logo">
                        Meals
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="../../img/eventsCalendarIcon.png" alt="Events Logo">
                        Events
                    </a>
                </li>
                <li>
                    <a href="../Route/List.php">
                        <img src="../../img/routePlannerLogo.png" alt="Route Planner Logo">
                        Routes
                    </a>
                </li>
            </ul>

            <?php
            //Different view of the right navbar for user logged in or not

            //if there is a id value then the user is logged in
            //When the user is signed in
            if (isset($_POST['id'])) {
                echo "
                <ul class=\"nav navbar-nav navbar-right\">
                    <li>
                        <a href=\"#\">
                            <img src=\"../../img/logo.png\" alt=\"Find a Bro Logo\">
                            Find A BRO
                        </a>
                    </li>
                    <li class=\"dropdown\">
                        <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                            <img src=\"../../img/accountIcon.png\" alt=\"Account Logo\">
                            Account Name
                        </a>
                        <ul class=\"dropdown-menu\">
                            <li><a href=\"#\">Account Details</a></li>
                            <li><a href=\"#\">My Planner</a></li>
                            <li><a href=\"#\">Log my workouts</a></li>
                            <li><a href=\"#\">Log my meals</a></li>
                            <li><a href=\"#\">Goals</a></li>
                            <li><a href=\"#\">Log out</a></li>
                        </ul>
                    </li>
                </ul>
                ";
            }
            //When the user is not signed in
            else {
                echo "
                <ul class='nav navbar-nav navbar-right'>
                    <li><a href='#'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
                    <li><a href='#'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
                </ul>
                ";
            }
            ?>

        </div>
    </nav>
</header>
<body>