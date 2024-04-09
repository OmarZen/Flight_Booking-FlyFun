<?php include_once 'helpers/helper.php'; ?>

<?php subview('header.php'); ?>
<link rel="stylesheet" href="assets/css/login.css">
<?php
if (isset($_GET['pwd'])) {
  if ($_GET['pwd'] == 'updated') {
    echo "<script>alert('Your password has been reset!!');</script>";
  }
}
?>
<?php
if (isset($_GET['error'])) {
  if ($_GET['error'] === 'invalidcred') {
    echo '<script>alert("Invalid Credentials")</script>';
  } else if ($_GET['error'] === 'wrongpwd') {
    echo '<script>alert("Wrong Password")</script>';
  } else if ($_GET['error'] === 'sqlerror') {
    echo "<script>alert('Database error')</script>";
  }
}
if (isset($_COOKIE['Uname']) && isset($_COOKIE['Upwd'])) {
  require 'helpers/init_conn_db.php';
  $email_id = $_POST['user_id'];
  $password = $_POST['user_pass'];
  $sql = 'SELECT * FROM Users WHERE username=? OR email=?;';
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('Location: views/login.php?error=sqlerror');
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, 'ss', $_COOKIE['Uname'], $_COOKIE['Uname']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
      $pwd_check = password_verify($_COOKIE['Upwd'], $row['password']);
      if ($pwd_check == false) {
        setcookie('Uname', '', time() - 3600);
        setcookie('Upwd', '', time() - 3600);
        header('Location: views/login.php?error=wrongpwd');
        exit();
      } else if ($pwd_check == true) {
        session_start();
        $_SESSION['userId'] = $row['user_id'];
        $_SESSION['userUid'] = $row['username'];
        $_SESSION['userMail'] = $row['email'];
        header('Location: views/index.php?login=success');
        exit();
      } else {
        header('Location: views/login.php?error=invalidcred');
        exit();
      }
    }
    header('Location: views/login.php?error=invalidcred');
    exit();
  }
  header('Location: views/login.php?error=invalidcred');
  exit();
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
?>

<main>
  <section class="container">
    <div class="login-container">
      <div class="circle circle-one"></div>
      <div class="form-container">
        <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustration" />
        <h1 class="opacity">LOGIN</h1>
        <form method="POST" action="includes/login.inc.php">
          <input type="text" placeholder="USERNAME / EMAIL" name="user_id" id="user_id" required />
          <input type="password" placeholder="PASSWORD" name="user_pass" id="user_pass" required />
          <button name="login_but" type="submit" class="opacity">LOGIN</button>
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
</body>
</html>