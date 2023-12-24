<header id="header" class="fixed-top " style="background-color: #37517e">
  <div class="container d-flex align-items-center">
    <!-- Button trigger modal -->
    <h1 class="logo me-auto"><a href="/raovat/">RaoVat</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar">
      <?php


      if (isset($_SESSION["USER_LOGED"])) {
        $user = $_SESSION["USER_LOGED"];
        if ($user['roleId'] == 2) {
          ?>
          <ul>
            <li><a class="nav-link scrollto active" href="#hero" style="color: white;">
                <?php echo $user['name']; ?>
              </a></li>
            <li><a class="getstarted scrollto" href="/raovat/user?logout=<?php echo $user['id']; ?>" style="color: white;">
                Đăng
                xuất
              </a></li>

          </ul>;
        <?php } else {
          ?>
          <ul>
            <li><a class="nav-link scrollto " href="/raovat/home">Quản lý bài đăng</a></li>
            <li><a class="nav-link scrollto" href="/raovat/managePostType">Quản lý danh mục</a></li>
            <li><a class="nav-link scrollto" href="/raovat/manageUser">Quản lý người dùng</a></li>
            <li><a class="nav-link scrollto " href="#hero" style="color: white;">
                <strong>
                  <?php echo $user['name']; ?>
                </strong>
              </a></li>
            <li><a class="getstarted scrollto" href="/raovat/user?logout=<?php echo $user['id']; ?>">Đăng xuất</a></li>
          </ul>
          <?php
        }
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