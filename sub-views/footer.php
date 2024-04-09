<footer class="footer">
  <div class="section__container footer__container">
    <div class="footer__col">
      <h3>FlyFun</h3>
      <p>
        Where Excellence Takes Flight. With a strong commitment to customer
        satisfaction and a passion for air travel, Flivan Airlines offers
        exceptional service and seamless journeys.
      </p>
      <p>
        From friendly smiles to state-of-the-art aircraft, we connect the
        world, ensuring safe, comfortable, and unforgettable experiences.
      </p>
    </div>
    <div class="footer__col">
      <h4>INFORMATION</h4>
      <p>Home</p>
      <p>About</p>
      <p>Offers</p>
      <p>Seats</p>
      <p>Destinations</p>
    </div>
    <div class="footer__col">
      <h4>CONTACT</h4>
      <p>Support</p>
      <p>Media</p>
      <p>Socials</p>
    </div>
  </div>
  <div class="section__container footer__bar">
    <p>Copyright © 2023 FlyFun. All rights reserved. Web Task</p>
    <p class="text-light text-center">&copy; <?php echo date('Y') ?></p>
    <div class="socials">
      <span><i class="ri-facebook-fill"></i></span>
      <span><i class="ri-twitter-fill"></i></span>
      <span><i class="ri-instagram-line"></i></span>
      <span><i class="ri-youtube-fill"></i></span>
    </div>
  </div>
</footer>
</body>
<script
      src="https://code.jquery.com/jquery-3.5.1.js"
      integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
      crossorigin="anonymous"></script>     
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>

<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap");

  :root {
    --primary-color: #3d5cb8;
    --primary-color-dark: #334c99;
    --text-dark: #0f172a;
    --text-light: #64748b;
    --extra-light: #f1f5f9;
    --white: #ffffff;
    --max-width: 1200px;
  }

  body {
    font-family: "Poppins", sans-serif;
  }

  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }

  .section__container {
  max-width: var(--max-width);
  margin: auto;
  padding: 5rem 1rem;
}

.section__header {
  font-size: 2.5rem;
  font-weight: 600;
  line-height: 3rem;
  color: var(--text-dark);
}
  .btn {
    padding: 0.75rem 2rem;
    outline: none;
    border: none;
    font-size: 1rem;
    font-weight: 500;
    color: var(--white);
    background-color: var(--primary-color);
    border-radius: 2rem;
    cursor: pointer;
    transition: 0.3s;
  }

  .btn:hover {
    background-color: var(--primary-color-dark);
  }

  a {
    text-decoration: none;
  }

  .footer {
    background-color: var(--primary-color);
    color: var(--white);
  }

  .footer__container {
    display: grid;
    grid-template-columns: 2fr repeat(2, 1fr);
    gap: 5rem;
  }

  .footer__col h3 {
    font-size: 1.5rem;
    font-weight: 500;
    color: var(--white);
    margin-bottom: 1rem;
  }

  .footer__col h4 {
    font-size: 1.2rem;
    font-weight: 500;
    color: var(--white);
    margin-bottom: 1rem;
  }

  .footer__col p {
    color: var(--extra-light);
    margin-bottom: 1rem;
    cursor: pointer;
    transition: 0.3s;
  }

  .footer__col p:hover {
    color: var(--white);
  }

  .footer__bar {
    padding: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    border-top: 1px solid var(--extra-light);
  }

  .footer__bar p {
    font-size: 0.9rem;
    color: var(--extra-light);
  }

  .socials {
    display: flex;
    align-items: center;
    gap: 1rem;
  }

  .socials span {
    font-size: 1.2rem;
    color: var(--extra-light);
  }

  @media (width < 900px) {
    .footer__container {
      gap: 2rem;
    }
  }

  @media (width < 600px) {
    .footer__container {
      grid-template-columns: 1fr;
    }

    .footer__bar {
      flex-direction: column;
      text-align: center;
    }
  }
</style>