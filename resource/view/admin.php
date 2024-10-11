<?php

use App\Core\Database;
use App\Controllers\PostController;
use App\Models\Posts;

require_once __DIR__ . '/../../vendor/autoload.php';

$database = new Database();
$dbConnection = $database->connect();
$postsModel = new Posts($dbConnection);

// Pagination logic
$limit = 2; // kung gano karami madidisplay 
$totalPosts = $postsModel->getTotalPosts(); //kung ilan laman ng database (galing sa SELECT COUNT sa Posts model)
$totalPages = ceil($totalPosts / $limit);  //laman ng database ngayon is lima divide sa limit tapos i ceceil or round up
//   5       round up     5         2    (5/2 = 2.5 tas round up magiging 3... bale 3 pages sya with tig dalawang content)
// Get the current page from the URL, default to 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, min($page, $totalPages)); //max is 1 page, minumum is yung total ng pages para di mag bug

$offset = ($page - 1) * $limit; // Calculate the offset

// Fetch posts for the current page
$posts = $postsModel->getPosts($limit, $offset);

?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/adminstyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Aoboshi+One&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- header nav-bar -->
<header>
  <nav class="navbar">
    <img src="/image/logo1.png" alt="logo" class="logo">
    <div class="nav-container">
      <ul class="nav-link">
        <li><a href="#home">HOME</a></li>
        <li><a href="">OUR CATS</a></li>
        <li><a href="">ABOUT</a></li>
        <li><a href="">FAQs</a></li>
        <button class="login-btn">Login</button>
      </ul>
    </div>
  </nav>
</header>

<div class="container">
    <div class="background-card">
        <div class="header">
            <div class="image-placeholder">
                <img src="profile-image.jpg" alt="Admin Profile">
                <h2>ADMIN</h2>
            </div>
        </div>

        <div class="left-text-container">
            <button class="calendar-button">
                <img src="calendar.png" alt="Calendar" class="calendar-icon">
            </button>
            <div class="left-text">APPROVAL</div>
        </div>

        <div class="approval-card">
            <div class="approval-header">
                <h3>ADOPTER</h3>
                <h3>APPLICATION</h3>
            </div>

            <div class="header-separator"></div>

            <!-- Display each post -->
            <?php foreach ($posts as $post): ?>
                <div class="approval-item-container">
                    <!-- Adopter Info on the left -->
                    <div class="adopter-info">  
                        <div class="profile-placeholder"></div>
                        <p class="username"><?php echo htmlspecialchars($post['name']); ?></p>
                    </div>

                    <!-- Approval Item -->
                    <div class="approval-item">
                        <div class="application-info">
                            <div class="cat-profile">
                            <img src="<?php echo htmlspecialchars($post['picture']); ?>" alt="Cat Image">
                                <div class="cat-details">
                                    <p><?php echo htmlspecialchars($post['cat_name']); ?></p>
                                    <p><?php echo htmlspecialchars($post['location']); ?></p>
                                </div>
                            </div>
                            <div class="actions">

                        <!-- Approval form -->
                        <form action="/updateApproval" method="POST">
                        <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($post['id']); ?>">

                        <!-- Approve button -->
                        <button type="submit" name="action" value="approve" class="approve-button">
                            <i class="fas fa-check"></i>
                        </button>

                        <!-- Deny button -->
                        <button type="submit" name="action" value="deny" class="deny-button">
                            <i class="fas fa-times"></i>
                        </button>
                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Pagination Buttons -->
            <div class="pagination">
                <!--halimbawang nasa page 2 ka,mag miminus 1 para maging page 1 or para mabalik sa page-->
                <?php if ($page > 1): ?>
                    <a href="?page=<?php echo $page - 1; ?>" class="prev-button">Prev</a>
                <?php endif; ?>

                <?php if ($page < $totalPages): ?>
                    <a href="?page=<?php echo $page + 1; ?>" class="next-button">Next</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Footer Section -->
<div class="footer">
    <div class="footer-container">
       <div class="footer-section other-section">
         <h3></h3>
         <p></p>
         <ul class="social-media2">
          <li><a href="#"><img src="pin.png" alt="pin"></a></li>
          <li><a href="#"><img src="call.png" alt="call"></a></li>
          <li><a href="#"><img src="email.png" alt="email"></a></li>
      </ul>
       </div>
  
        <div class="footer-section about-company">
            <h3>About the Company</h3>
            <p>Lorem ipsum dolor sit amet...</p>
            <!-- Social Media Icons -->
            <ul class="social-media">
                <li><a href="#"><img src="facebook.png" alt="Facebook"></a></li>
                <li><a href="#"><img src="messenger.png" alt="messenger"></a></li>
            </ul>
        </div>
    </div>
  
    <div class="footer-bottom-container">
         <div class="footer-bottom">
            <p>&copy; All rights reserved.</p>
          </div>
  
      <div class="footer-bottom-name">
        <p>Cat Free Adoption & Rescue Philippines</p>
      </div>
    </div>
  </div>

</body>
</html>
