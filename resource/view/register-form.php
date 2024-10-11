<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/register.css">
    <script src="https://cdn.jsdelivr.net/npm/just-validate@latest/dist/just-validate.production.min.js"></script>
    <script src="/js/validation.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<header>
  <nav class="navbar">
    <img src="/image/logo1.png" alt="logo" class="logo">

    <div class="nav-container"> <!-- New div to contain nav links -->
      <ul class="nav-link">
        <li><a href="#home">HOME</a></li>
        <li><a href="">OUR CATS</a></li>
        <li><a href="">ABOUT</a></li>
        <li><a href="">FAQs</a></li>
        <button class="login-btn"> <a href="/loginto">Login</a></button>
      </ul>
    </div>
  </nav>
</header>


<div class="wrapper">
    

<span class="icon-close"><ion-icon name="close"></ion-icon></span>
    <div class="form-box register">
      <h2>Register</h2>
      <form id="signup"action="/process-signup" method="post">

        <div class="input-box">
          <span class="icon"><ion-icon name="people"></ion-icon></span>
          <input name="name" id="name" type="user" required>
          <label for="name">Username</label>
        </div>

        <div class="input-box">
          <span class="icon"><ion-icon name="people"></ion-icon></span>
          <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "")?>" required>
          <label for="email">Email</label>
        </div>

        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
          <input name="password" id="password" type="password" required>
          <label for="password">Password</label>
        </div>

       <div class="remember-forgot">
          <label><a href="admin-login.php" class="admin-account"><b>ADMIN ACCOUNT</b></a></label>
          <a href="#" class="forgot"><b>FORGOT PASSWORD?</b></a>
        </div>
        <button type="submit" class="btn" onclick="location.href='/process-signup'"><b>Register</b></button>

        <div class="login-register">
          <p >Already have an account? <a href="/loginto" class="register-link"><b>Login</b></a></p>
        </div>
      </form>
    </div>



    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    

</body>
</html>