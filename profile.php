<?php include_once 'helpers/helper.php'; ?>

<link rel="stylesheet" href="assets/css/login.css">

<?php subview('header.php'); ?>



<link rel="stylesheet" href="assets/css/profile.css">

<!-- 
    create 6-	Passenger profile (Home)
    a.	Name 
    b.	Email 
    c.	Image
    d.	Tel
    e.	List of completed flights
    f.	Current flights
    g.	Profile 
    h.	Search a flight 

 -->

<main>
    <section class="container">
        <div class="profile-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <img src="assets/images//background.jpg" alt="profile_photo" class="profile_photo" />
                <?php if (isset($_SESSION['userId'])) { ?>
                    <h1 class="opacity"><i class="fa fa-user"></i> <?= $_SESSION['userUid'] ?></h1>

                <?php } ?>
                <!-- Add email according to the login session -->
                <label for="email_id">Email:</label>
                <div class="user_email_box">
                    <!-- 'SELECT email FROM users WHERE username='.$_SESSION['userId']; -->
                    <?php
                    require 'helpers/init_conn_db.php';
                    $userId = $_SESSION['userId'];
                    $sql = 'SELECT email FROM Users WHERE user_id=' . $userId;
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '<div>' . $row['email'] . '</div>';
                    ?>
                </div>

                <!-- Add list of List of completed flights -->
                <label for="completed_flights">Completed Flights:</label>
                <div class="completed_flights_box">
                    <?php
                    require 'helpers/init_conn_db.php';
                    $userId = $_SESSION['userId'];
                    $sql = 'SELECT * FROM Ticket WHERE user_id=' . $userId;
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<';
                        echo '<div>' . $row['flight_id'] . '</div>';
                    }
                    ?>
                </div>
                <div class="circle circle-two"></div>
            </div>
    </section>
</main>

<?php subview('footer.php'); ?>