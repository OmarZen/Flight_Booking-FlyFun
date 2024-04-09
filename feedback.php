<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php');    ?>
<link rel="stylesheet" href="assets/css/login.css">
<style>
  .hear_about{
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 30px;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
    color: #333;
    outline: none;
  
  }

</style>
<main>
  <?php
  if (isset($_GET['error'])) {
    if ($_GET['error'] === 'invalidemail') {
      echo '<script>alert("Invalid email")</script>';
    } else if ($_GET['error'] === 'sqlerror') {
      echo "<script>alert('Database error')</script>";
    } else if ($_GET['error'] === 'success') {
      echo "<script>alert('Thank you for your Feedback')</script>";
    }
  }
  ?>

  <section class="container">
    <div class="login-container">
      <div class="form-container">
        <img src="assets/images/undraw_fingerprint_login_re_t71l.svg" alt="illustration" class="illustration" />
        <h1 class="opacity">FEEDBACK</h1>
        <form method="POST" action="includes/feedback.inc.php">
          <input type="text" placeholder="EMAIL" name="email" id="user_id" required />
          <textarea class="form-control" placeholder="What was your first impression
            when you entered the website?" id="exampleFormControlTextarea1" name="1" rows="3" required></textarea>

          <select class="hear_about" id="hear_about" required>
            <option selected disabled>How did you first hear about us?</option>
            <option>Search Engine</option>
            <option>Social Media</option>
            <option>Friend/Relative</option>
            <option>Word of Mouth</option>
            <option>Television</option>
            <option>Other</option>
          </select>
          <textarea class="form-control" placeholder="Is there anything missing on this page?" id="exampleFormControlTextarea1" name="3" rows="3" required></textarea>

          <div class="row">
            <div class="rating ml-3">
              <label>
                <input type="radio" name="stars" value="1" required />
                <span class="icon">★</span>
              </label>
              <label>
                <input type="radio" name="stars" value="2" required />
                <span class="icon">★</span>
                <span class="icon">★</span>
              </label>
              <label>
                <input type="radio" name="stars" value="3" required />
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
              </label>
              <label>
                <input type="radio" name="stars" value="4" required />
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
              </label>
              <label>
                <input type="radio" name="stars" value="5" required />
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
              </label>
            </div>
          </div>

          <button name="feed_but" type="submit" class="opacity">Submit</button>
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