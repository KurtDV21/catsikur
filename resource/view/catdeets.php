<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/catdeets.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
// Include the PostController
use App\Core\Database;
use App\Models\Posts;
use App\Controllers\PostController;

require_once __DIR__ . '/../../vendor/autoload.php';

$database = new Database();
$dbConnection = $database->connect();
$postModel = new Posts($dbConnection);
$postController = new PostController($postModel);
$post = $postController->showSelectedPosts(); // Get selected cat post

if ($post): // If a valid post is found
?>

    <!-- HEADER -->
    <header>
  <nav class="navbar">
     <img src="image/logo1.png" alt="logo" class="logo">

    <div class="nav-container">
   
      <!-- Hamburger Icon -->
      <div class="hamburger" onclick="toggleMenu()">
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
      </div>

      <ul class="nav-link" id="nav-list">
        <li><a href="#home">HOME</a></li>
        <li><a href="#cats">OUR CATS</a></li>
        <li><a href="about.php">ABOUT</a></li>
        <li><a href="about.php">FAQs</a></li>
        <button onclick="visitPage()" class="login-btn">Login</button>
      </ul>
    </div>
  </nav>
</header>

<section>
  <div class="parent-container">
    <div class="cat-container"> 
      <div class="cat-image">
        <img src="<?php echo htmlspecialchars($post['picture']); ?>" alt="Cat Image">
      </div>
      <div class="cat-info">
        <h2>Meet <?php echo htmlspecialchars($post['cat_name']); ?></h2>
        <div class="cat-details">
          <p><strong>Age:</strong> <?php echo htmlspecialchars($post['age']); ?> Months</p>
          <p><strong>Gender:</strong> <?php echo htmlspecialchars($post['gender']); ?></p>
          <p><strong>Color:</strong> <?php echo htmlspecialchars($post['color']); ?></p>
          <button class="inquire-btn">Inquire</button>
        </div>
      </div>
    </div>
  </div>
</section>

<section>

<div class="details-wrapper">
    <h2>More Details about Cat:</h2>
    <div class="cat-details-container">
        <div class="cat-detail-box">CAT DETAILS</div>
        <div class="cat-detail-box">CAT DETAILS</div>
        <div class="cat-detail-box">CAT DETAILS</div>
    </div>
</div>
</section>

<?php
else:
    echo "<p>Cat details not found!</p>";
endif;
?>
</body>


<footer class="footer">
        <div class="footer-container">
    <!-- About Section -->
    <div class="footer-about">
        <h3>ABOUT COMPANY</h3>
        <div class="para">
        <p>Lorem ipsum dolor sit amet. Ex officiis molestias et sapiente<br> doloremque et dolores doloribus est animi maiores. Ut fugiat <br> molestiae nam quia earum qui aliquid aliquid ab corrupti officiis. Et<br> temporibus quia 33 incidunt adipisci ea deleniti vero 33<br> reprehenderit repellat.</p>
        </div>
      
       
    </div>
 <!-- Social Media Section -->
    <div class="fb">
      <img src="facebook.png" alt="" class="fb-icon">
    </div>

    <div class="mess">
      <img src="messenger.png" alt="" class="mess-icon">
    </div>

   

</div>
 
<div class="details-container">
<div class="details">
<div class="place">
    <img src="place.png" alt="" class="place-icon">
    <p>ASDWQDASDASDASDASDASDASDASD</p>

  </div>

  <div class="phone">
    <img src="phone.png" alt="" class="phone-icon">
    <p>ASDWQDASDASDASDASDASDASDASD</p>

  </div>

  <div class="email">
    <img src="email.png" alt="" class="email-icon">
    <p>ASDWQDASDASDASDASDASDASDASD</p>

  </div>
  </div>
  </div>


  



    <!-- Left Bottom Text -->
    <div class="footer-left-text">
      <p>Cat Free Adoption & Rescue Philippines</p>
    </div>
  </div>
  
  
</footer>
</html>