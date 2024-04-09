<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FlyFun . Online Flight Booking</title>
    <link rel="icon" href="../assets/images/airtic.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/44f557ccce.js"></script>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Online Flight Booking</title>
    <link rel="icon" href="../assets/images/brand.png" type="image/x-icon">

</head>

<style>
    :root {
        --primary-color: #3d5cb8;
        --text-dark: #0f172a;
        --text-light: #64748b;
        --white: #ffffff;
        --extra-light: #f1f5f9;
        --max-width: 1200px;
    }


    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background-color: #f1f5f9;
        width: 8px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #3d5cb8;
        border-radius: 8px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: #555;
    }

    nav {
        background-color: var(--white);
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        padding: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }


    .nav__links {
        list-style: none;
        display: flex;
        gap: 2rem;
    }

    .link a {
        font-weight: 700;
        font-size: large;
        color: var(--text-light);
        text-decoration: none;
        transition: 0.3s;
    }

    .nav__logo {
        font-size: 1.5rem;
        font-weight: 600;
        color: black;
        text-decoration: none;
    }

    .link a:hover {
        color: var(--text-dark);
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .user-info h5 {
        color: var(--text-light);
        margin: 0;
    }

    .logout-form {
        padding: 0.75rem 1.5rem;
        outline: none;
        border: none;
        font-size: 1rem;
        font-weight: 500;
        color: white;
        background-color: var(--primary-color);
        border-radius: 2rem;
        cursor: pointer;
        transition: 0.3s;
        text-decoration: none;
    }

    .logout-form:hover {
        background-color: var(--primary-color-dark);
    }

    .dropdown {
        position: relative;
        margin-right: 70px;
    }

    .dropdown-toggle {
        color: var(--text-light);
        text-decoration: none;
        cursor: pointer;
        font-weight: bold;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1;
        display: none;
        flex-direction: column;
        padding: 8px 0;
        background-color: var(--white);
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        animation: fadeIn 0.3s ease-in-out;
    }

    .dropdown:hover .dropdown-menu {
        display: flex;
    }

    .dropdown-item {
        color: var(--text-dark);
        font-weight: bold;
        padding: 8px 16px;
        transition: background-color 0.3s;
        text-decoration: none;
    }

    .dropdown-item:hover {
        background-color: var(--extra-light);
    }

    .register-button {
        padding: 0.75rem 1.5rem;
        outline: none;
        border: none;
        font-size: 1rem;
        font-weight: 500;
        color: var(--white);
        background-color: var(--primary-color);
        border-radius: 2rem;
        cursor: pointer;
        transition: 0.3s;
        text-decoration: none;
    }

    .register-button:hover {
        background-color: var(--primary-color-dark);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<body>
    <nav>
        <div class="nav__links">
            <div class="link nav__logo">
                <a href="index.php">
                    <h4>FlyFun Airline</h4>
                </a>
            </div>
            <div class="link">
                <a href="index.php">
                    <h5>Home</h5>
                </a>
            </div>
            <?php if (isset($_SESSION['userId'])) { ?>
                <div class="link">
                    <a href="my_flights.php">
                        <h5>My Flights</h5>
                    </a>
                </div>
                <div class="link">
                    <a href="ticket.php">
                        <h5>Tickets</h5>
                    </a>
                </div>
            <?php } ?>
            <div class="link">
                <a href="feedback.php">
                    <h5>Feedback</h5>
                </a>
            </div>
        </div>

        <div class="user-info">
            <?php if (isset($_SESSION['userId'])) { ?>
                <h5><i class="fa fa-user"></i> <?= $_SESSION['userUid'] ?></h5>
                <form action="includes/logout.inc.php" method="POST">
                    <button type="submit" class="logout-form">
                        <h5>Logout</h5>
                    </button>
                </form>
            <?php } else { ?>

                <a class="register-button" href="register.php">Register</a>
                <div class="dropdown">
                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton" href="#" aria-haspopup="true" aria-expanded="false">
                        <b>Login</b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="login.php?type=passenger">Passenger</a>
                        <a class="dropdown-item" href="admin/login.php?type=admin">Administrator</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </nav>