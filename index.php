<link href="FrontEnd/assets/vendor/aos/aos.css" rel="stylesheet">
<link href="FrontEnd/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="FrontEnd/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="FrontEnd/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="FrontEnd/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="FrontEnd/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="FrontEnd/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="FrontEnd/assets/css/style.css" rel="stylesheet">

<?php

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];
$urlParts = parse_url($requestUri);
$path = $urlParts['path'];
switch ($path) {
  case '/raovat/':
    include __DIR__ . '/FrontEnd/Views/Homes/index.php';
    break;
  case '/raovat/home':
    include __DIR__ . '/BackEnd/Controllers/HomeController.php';
    break;
  case '/raovat/post':
    include __DIR__ . '/BackEnd/Controllers/PostController.php';
    break;
  case '/raovat/UserController':
    include __DIR__ . '/BackEnd/Controllers/UserController.php';
    break;
  default:
    include 'pages/404.php';
    break;
}

?>
<script src="FrontEnd/assets/vendor/aos/aos.js"></script>
<script src="FrontEnd/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="FrontEnd/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="FrontEnd/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="FrontEnd/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="FrontEnd/assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="FrontEnd/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="FrontEnd/assets/js/main.js"></script>