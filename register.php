<?php include_once 'helpers/helper.php'; ?>
<link rel="stylesheet" href="assets/css/login.css">

<?php subview('header.php'); ?>


<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] === 'invalidemail') {
        echo '<script>alert("Invalid email")</script>';
    } else if ($_GET['error'] === 'pwdnotmatch') {
        echo '<script>alert("Passwords do not match")</script>';
    } else if ($_GET['error'] === 'sqlerror') {
        echo "<script>alert('Database error')</script>";
    } else if ($_GET['error'] === 'usernameexists') {
        echo "<script>alert('Username already exists')</script>";
    } else if ($_GET['error'] === 'emailexists') {
        echo "<script>alert('Email already exists')</script>";
    }
}
?>
<link rel="stylesheet" href="assets/css/form.css">
<style>
    .login-container {
        position: relative;
        width: 35rem;
    }
    main{
        background-color: #1a1a2e;
    }
    h1{
        color: #fff;
    
    }
    .illustration{
        transform: translate(5rem,10rem) scaleX(-1);
    }
</style>
<main>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <img src="assets/images/undraw_fingerprint_login_re_t71l.svg" alt="illustration" class="illustration" />
                <h1 class="opacity">PASSENGER REGISTRATION</h1>
                <form method="POST" action="includes/register.inc.php">
                    <input type="text" placeholder="USERNAME / EMAIL" name="username" id="username" required />
                    <input type="text" placeholder="E-MAIL" name="email_id" id="email_id" required />
                    <input type="password" placeholder="PASSWORD" name="password" id="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter,
                                and at least 8 or more characters" />
                    <input type="password" placeholder="CONFIRM PASSWORD" name="password_repeat" id="password_repeat" required />
                    <button name="signup_submit" type="submit" class="opacity">REGISTR</button>
                </form>
                <div class="register-forget opacity">
                    <a href="register.php">REGISTER</a>
                    <a href="reset-pwd.php" id="reset-pass">FORGOT PASSWORD</a>
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>
    <?php subview('footer.php'); ?>
    <script>
        $(document).ready(function() {
            $('.input-group input').focus(function() {
                me = $(this);
                $("label[for='" + me.attr('id') + "']").addClass("animate-label");
            });
            $('.input-group input').blur(function() {
                me = $(this);
                if (me.val() == "") {
                    $("label[for='" + me.attr('id') + "']").removeClass("animate-label");
                }
            });
            // $('#test-form').submit(function(e){
            //   e.preventDefault() ;
            //   alert("Thank you") ;
            // })
        });
    </script>

</main>