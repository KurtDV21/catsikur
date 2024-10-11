<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/profile2style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Creation</title>
</head>
<body>
    
<header>
  <nav class="navbar">
    <img src="/image/logo1.png" alt="logo" class="logo">
    <div class="nav-container">
      <ul class="nav-link">
        <li><a href="#home">HOME</a></li>
        <li><a href="">OUR CATS</a></li>
        <li><a href="">ABOUT</a></li>
        <li><a href="">FAQs</a></li>
        <li><button class="login-btn" onclick="location.href='/loginto'">Login</button></li>     
      </ul>
    </div>
  </nav>
</header>

<div class="wrapper">
    <span class="icon-close"><ion-icon name="close"></ion-icon></span>
    <div class="form-box login">
      <h2>Profile</h2>

      <form action="/process-profile2" method="POST" enctype="multipart/form-data">
        <!-- Hidden input to pass the user_id -->
        <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>">
        
        <div class="profile-placeholder">
            <img src="https://via.placeholder.com/150" id="photo" alt="Profile Picture" class="profile-img">
            <input type="file" id="profileUpload" name="profile_image" style="display: none;" accept="image/*"> 
        </div>

        <div class="input-box">
          <span class="icon"><ion-icon name="people"></ion-icon></span>
          <input type="text" id="fullname" name="fullname" required>
          <label for="fullname">Fullname</label>
        </div>

        <div class="input-box">
          <span class="icon"><ion-icon name="call"></ion-icon></span>
          <input type="tel" id="phone_number" name="phone_number" required>
          <label for="phone_number">Phone number</label>
        </div>

        <div class="input-box">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <input type="text" id="city" name="city" required>
          <label for="city">City</label>
        </div>

        <button type="submit" class="btn"><b>Continue</b></button>
      </form>
    </div>
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="/js/profile2.js"></script>
</body>
</html>
