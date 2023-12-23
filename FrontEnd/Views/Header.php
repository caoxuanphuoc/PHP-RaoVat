<header id="header" class="fixed-top " style="background-color: #37517e">
  <div class="container d-flex align-items-center">
    <!-- Button trigger modal -->
    <h1 class="logo me-auto"><a href="/raovat/">RaoVat</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar">
      <?php

      //    session_start();
      if (isset($_SESSION["USER_LOGED"])) {
        $user = $_SESSION["USER_LOGED"];
        ?>
        <ul>
          <li><a class="nav-link scrollto active" href="#hero" style="color: white;">
              <?php echo $user['name']; ?>
            </a></li>
          <li><a class="nav-link scrollto active" href="/raovat/UserController?logout=<?php echo $user['id']; ?>"
              style="color: white;"> Đăng
              xuất
            </a></li>

        </ul>;
        <!-- 
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" data-bs-toggle="modal" data-bs-target="#loginModal">Get Started</a></li>
        </ul>
         -->
        <?php
      } else { ?>
        <ul>
          <li><a class="getstarted " href="/raovat?login=true">Đăng nhập</a></li>
        </ul>
        <?php
      }
      ?>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->