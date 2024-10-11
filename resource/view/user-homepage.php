<?php
use App\Core\Database;
use App\Models\User;
use App\Controllers\UserController;
use App\Models\Posts;
use App\Controllers\PostController;

require_once __DIR__ . '/../../vendor/autoload.php';

session_start();

$database = new Database();
$dbConnection = $database->connect();
$userModel = new User($dbConnection);
$userController = new UserController($userModel);

$postModel = new Posts($dbConnection);
$postController = new PostController($postModel);

// Fetch approved posts
$approvedPosts = $postController->showApprovedPosts();

if (isset($_SESSION['user_id'])) {
  $userId = $_SESSION['user_id']; 
  $user = $userModel->findUserById($userId); 
  $name = $user['name'] ?? ''; 
} else {
  $name = ''; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/user.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Aoboshi+One&display=swap">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Homepage</title>
</head>
<body>
  <!-- header nav-bar -->
  <header>
    <nav class="navbar">
      <img src="/image/logo1.png" alt="logo" class="logo">
      <div class="nav-container">
        <div class="hamburger" onclick="toggleMenu(this)">
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
        </div>
        <ul class="nav-link">
          <li><a href="#home">HOME</a></li>
          <li><a href="#ourcat">OUR CATS</a></li>
          <li><a href="#">ABOUT</a></li>
          <li><a href="#">FAQs</a></li>
          <li><label><?php echo htmlspecialchars($name); ?></label></li>
        </ul> 
      </div>
    </nav>
  </header>

  <!-- body -->
  <!-- HOME SECTION -->
  <section id="home">
    <div class="main">
      <h1 class="text1">Find Your Purr-fect<br> Companion: Adopt<br> a Cat Today!</h1>
    </div>
    <div class="adopt-btn-container">
      <button class="adopt-btn button">ADOPT NOW!</button>
    </div>
  </section>

  <!-- DROPDOWN BUTTONS -->
  <section id="dropbtn">
    <div class="dropdowns">
      <!-- First Dropdown -->
      <div class="dropdown">
        <button class="dropbtn">
          <span class="button-text"><b> COLOR </b></span> 
          <span class="arrow-down"><ion-icon name="chevron-down"></ion-icon></span>
          <span class="paint"><ion-icon name="color-palette-outline"></ion-icon></span>
        </button>
        <div class="dropdown-content">
          <a href="#">Category 1</a>
          <a href="#">Category 2</a>
          <a href="#">Category 3</a>
        </div>
      </div>

      <!-- Second Dropdown -->
      <div class="dropdown">
        <button class="dropbtn">
          <span class="button-text"><b>GENDER</b></span>
          <span class="arrow-down-1"><ion-icon name="chevron-down"></ion-icon></span>
          <span class="gender"><ion-icon name="male-female-outline"></ion-icon></span>
        </button>
        <div class="dropdown-content">
          <a href="#">Item 1</a>
          <a href="#">Item 2</a>
          <a href="#">Item 3</a>
        </div>
      </div>
    </div>
       
    <div class="add-container">
      <li>
        <button class="addbtn" onclick="location.href='/add-post?user_id=<?php echo htmlspecialchars($userId); ?>'"> Add Post </button>
      </li>
    </div>    
  </section>

  <!-- OUR CATS SECTION -->
  <h1 class="avail"><b>AVAILABLE CATS</b></h1>
  <section id="ourcat">
    <?php foreach ($approvedPosts as $post): ?>
      <div class="cat-container">
        <a href="/cat-  details?post_id=<?php echo urlencode($post['id']); ?>"> 
          <div class="cat-wrapper">
            <div class="cat-card">
              <img src="<?php echo htmlspecialchars($post['picture']); ?>" alt="Cat Image">
              <h2><?php echo htmlspecialchars($post['cat_name']); ?></h2>
              <p>Age: <?php echo htmlspecialchars($post['age']); ?> years</p>
              <p>Location: <?php echo htmlspecialchars($post['location']); ?></p>
            </div>
            <button class="adopt-btn1">Adopt Me</button>
          </div>
        </a>
      </div>
    <?php endforeach; ?>
  </section>

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
        <img src="/image/facebook.png" alt="" class="fb-icon">
      </div>
      <div class="mess">
        <img src="/image/messenger.png" alt="" class="mess-icon">
      </div>
    </div>

    <div class="details-container">
      <div class="details">
        <div class="place">
          <img src="/image/place.png" alt="" class="place-icon">
          <p>ASDWQDASDASDASDASDASDASDASD</p>
        </div>
        <div class="phone">
          <img src="/image/phone.png" alt="" class="phone-icon">
          <p>ASDWQDASDASDASDASDASDASDASD</p>
        </div>
        <div class="email">
          <img src="/image/email.png" alt="" class="email-icon">
          <p>ASDWQDASDASDASDASDASDASDASD</p>
        </div>
      </div>
    </div>

    <!-- Left Bottom Text -->
    <div class="footer-left-text">
      <p>Cat Free Adoption & Rescue Philippines</p>
    </div>
  </footer>

  <script src="/resource/js/package.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
