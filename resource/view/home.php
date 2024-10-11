

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Aoboshi+One&display=swap">
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
      <div class="hamburger" onclick="toggleMenu(this)">
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
      </div>

      <ul class="nav-link">
        <li><a href="#home">HOME</a></li>
        <li><a href="#ourcat">OUR CATS</a></li>
        <li><a href="">ABOUT</a></li>
        <li><a href="">FAQs</a></li>
        <li><button class="login-btn" onclick="location.href='/loginto'">Login</button></li>     </ul>
    </div>
  </nav>
</header>

 
  </div>
</div>

<!-- body -->


      <!-- HOME SECTION -->
        <section id="home">
          <div class="main">
            <h1 class="text1">Find Your Purr-fect<br> Companion: Adopt<br> a Cat Today!</h1>
          </div>


          <div class="adopt-btn-container">
            <button class="adopt-btn1">ADOPT NOW!</button>
            </div>
        </section>




          <!-- DROPDOWN BUTTONS -->
           <section id="dropbtn">
           <div class="dropdowns">
           
    <!-- First Dropdown -->
    <div class="dropdown">
    <button class="dropbtn">
        <span class="button-text"><b> COLOR </b></span> <!-- Added a span for text -->
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
            <button class="dropbtn"><span class="button-text"><b>GENDER</b></span>
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
      <button class="addbtn" onclick="location.href='/add-post'"> Add Post </button>
      </div>
              
           </section>

          <!-- OUR CATS SECTION -->
          <h1 class="avail"><b>AVAILABLE CATS</b></h1>
<section id="ourcat" class="ourcat">
 
  <div class="cat-container">
      <section id="cat"></section>
      <div class="cat-wrapper">
        <div class="cat-card">
           <img src="/image/haru.jpg" alt="HARU" class="cat-image">
              <h2>HARU</h2>
              <p>HELLU PU IM HARU-DESU</p>
        </div>
        <button class="adopt-btn1" id="adoptBtn1">Adopt Me</button>
      </div>

      <div class="cat-wrapper">
        <div class="cat-card">
            <img src="/image/haru.jpg" alt="HARU" class="cat-image">
            <h2>HARU</h2>
            <p>HELLU PU IM HARU-DESU</p>
          </div>
          <button class="adopt-btn1" id="adoptBtn2">Adopt Me</button>
      </div>

    <div class="cat-wrapper">
      <div class="cat-card">
          <img src="/image/haru.jpg" alt="HARU" class="cat-image">
          <h2>HARU</h2>
          <p>HELLU PU IM HARU-DESU</p>
      </div>
      <button class="adopt-btn1" id="adoptBtn3">Adopt Me</button>
    </div>

    <div class="cat-wrapper">
      <div class="cat-card">
          <img src="/image/haru.jpg" alt="HARU" class="cat-image">
          <h2>HARU</h2>
          <p>HELLU PU IM HARU-DESU</p>
      </div>
      <button class="adopt-btn1" id="adoptBtn4">Adopt Me</button>
      </div>

      <div class="cat-wrapper">
          <div class="cat-card">
            <img src="/image/haru.jpg" alt="HARU" class="cat-image">
            <h2>HARU</h2>
            <p>HELLU PU IM HARU-DESU</p>
          </div>
          <button class="adopt-btn1" id="adoptBtn5">Adopt Me</button>
      </div>

      <div class="cat-wrapper">
          <div class="cat-card">
            <img src="/image/haru.jpg" alt="HARU" class="cat-image">
            <h2>HARU</h2>
            <p>HELLU PU IM HARU-DESU</p>
          </div>
          <button class="adopt-btn1" id="adoptBtn6">Adopt Me</button>
      </div>

      <div class="cat-wrapper">
        <div class="cat-card">
          <img src="/image/haru.jpg" alt="HARU" class="cat-image">
          <h2>HARU</h2>
          <p>HELLU PU IM HARU-DESU</p>
        </div>
        <button class="adopt-btn1" id="adoptBtn7">Adopt Me</button>
      </div>

      <div class="cat-wrapper">
        <div class="cat-card">
          <img src="/image/haru.jpg" alt="HARU" class="cat-image">
          <h2>HARU</h2>
          <p>HELLU PU IM HARU-DESU</p>
        </div>
        <button class="adopt-btn1" id="adoptBtn8">Adopt Me</button>
      </div>

      <div class="cat-wrapper">
        <div class="cat-card">
          <img src="/image/haru.jpg" alt="HARU" class="cat-image">
          <h2>HARU</h2>
          <p>HELLU PU IM HARU-DESU</p>
        </div>
        <button class="adopt-btn1" id="adoptBtn9">Adopt Me</button>
      </div>

            
          


        
    </div>
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
  </div>
</footer>




<script src="/js/package.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>