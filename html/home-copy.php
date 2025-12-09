<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Header</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Science+Gothic:wght@100..900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="header.css" />
  </head>

  <style>
    .hero {
      height: 80vh;
      display: flex;
      justify-content: space-around;
      align-items: center;
      width: 100%;
      height: 100%;
      margin-top: 80px;
      box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
    }
    .hero-content {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      width: 50%;
      height: 25vh;
      background-color: rgba(141, 133, 250, 0.2);
      gap: 1rem;
      backdrop-filter: blur(5px);
    }
    .hero-content h1,
    p,
    button {
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: "Science Gothic", sans-serif;
    }
    .hero-content button{
      border-radius: 10px;
      border-width: 1px;
    }
    .hero-content button > a{
      text-decoration: none;
    }
    .hero-image{
      background-color: gray;
      width: 50%;
      height: 25vh;
    }
    .hero-image img {
      object-fit: cover;
      width: 100%;
      height: 100%;
    }
    .features{
      padding: 5rem 0;
      background-color: #f4f4f4;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .features h2{
      font-family: "Science Gothic", sans-serif;
      font-size: 2rem;
      margin-bottom: 3rem;
      color: #333;
    }
    .features-container{
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 2rem;
      width: 90%;
      max-width: 1200px;
    }
    .card{
      padding: 2rem;
      border-radius: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      flex: 1 1 250px;
      text-align: center;
      transition: transform 0.3s ease;
    }
    /* 3. The Hover Effect: Makes the card float when touched */
.card:hover {
  transform: translateY(-10px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

/* 4. The Text Styles */
.card h3 {
  font-family: "Science Gothic", sans-serif;
  font-size: 1.5rem;
  margin-bottom: 1rem;
  color: #444;
}

.card p {
  font-family: sans-serif;
  color: #666;
}

  </style>

  <body>
    <header>
      <div>
        <img src="php logo.png" alt="phplogo" />
        <h4>PHP prac</h4>
      </div>
      <ul>
        <li><a class="active" href="home-copy.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </header>

   <main>
      
      <div class="hero">
        <div class="hero-image">
          <img src="php logo.png" alt="php" />
        </div>
        <div class="hero-content">
          <h1>Welcome to PHP Hero</h1>
          <p>Learn to code today</p>
          <button><a href="login-page.php">Get Started</a></button>
        </div>
      </div>

      <section class="features">
        
        <h2>Why Choose Us?</h2>
         <div class="features-container">
          <div class="card">
            <h3>Fast</h3>
            <p>Our code runs at lightning speed.</p>
          </div>

          <div class="card">
            <h3>Secure</h3>
            <p>We use the best security practices.</p>
          </div>

          <div class="card">
            <h3>Reliable</h3>
            <p>Uptime you can count on.</p>
          </div>
        </div>
      </section>

    </main>

    <footer>
      <p>Made By Me This is PHP Login</p>
    </footer>
  </body>
</html>



<?php 


?>