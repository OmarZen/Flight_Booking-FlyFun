<?php include_once 'header.php'; ?>
<?php
if (isset($_GET['pwd'])) {
  if ($_GET['pwd'] == 'updated') {
    echo "<script>alert('Your password has been reset!!');</script>";
  }
}
?>
<link rel="stylesheet" href="../assets/css/login.css">
<main>
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
  ?>
  <div class="container mt-0">
    <div class="row">
      <?php
      if (isset($_GET['error'])) {
        if ($_GET['error'] === 'destless') {
          echo "<script>alert('Dest. date/time is less than src.');</script>";
        } else if ($_GET['error'] === 'sqlerr') {
          echo "<script>alert('Database error');</script>";
        }
      }
      ?>

      <section class="container">
        <div class="login-container">
          <div class="circle circle-one"></div>
          <div class="form-container">
            <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustration" />
            <h1 class="opacity">ADMIN LOGIN</h1>
            <form method="POST" action="../includes/admin/login.inc.php">
              <input type="text" placeholder="USERNAME / EMAIL" name="user_id" id="user_id" required />
              <input type="password" placeholder="PASSWORD" name="user_pass" id="user_pass" required />
              <button name="login_but" type="submit" class="opacity">LOGIN</button>
            </form>
          </div>
          <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
      </section>
    </div>
  </div>
</main>

<?php include_once 'footer.php'; ?>

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