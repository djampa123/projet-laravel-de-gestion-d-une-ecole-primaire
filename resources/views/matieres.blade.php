<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Matières</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <style>
        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
        }

        .nav-link {
            padding: 10px 15px;
            color: #333;
        }

        .nav-link.active {
            background-color: #007bff;
            color: white;
        }

        .nav-link:hover {
            background-color: #e9ecef;
        }

        main {
            padding: 20px;
        }

        .h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="/list">
                                <i class="fas fa-list"></i> Liste des Matières
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('matieres.create') }}">
                                <i class="fas fa-plus"></i> Ajouter une matière
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Gestion des Matières</h1>
                </div>
                <section id="hero" class="hero section dark-background">

<div class="container">
  <div class="row gy-4">
    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
      <h1>GESTION D'UNE ECOLE PRIMAIRE</h1>
      <p>UNIPROG SCHOOL</p>
      <div class="d-flex">
        
       
      </div>
    </div>
    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
      <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
    </div>
  </div>
</div>

</section><!-- /Hero Section -->

<!-- Clients Section -->
<section id="clients" class="clients section light-background">

<div class="container" data-aos="zoom-in">

  <div class="swiper init-swiper">
    <script type="application/json" class="swiper-config">
      {
        "loop": true,
        "speed": 600,
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": "auto",
        "pagination": {
          "el": ".swiper-pagination",
          "type": "bullets",
          "clickable": true
        },
        "breakpoints": {
          "320": {
            "slidesPerView": 2,
            "spaceBetween": 40
          },
          "480": {
            "slidesPerView": 3,
            "spaceBetween": 60
          },
          "640": {
            "slidesPerView": 4,
            "spaceBetween": 80
          },
          "992": {
            "slidesPerView": 5,
            "spaceBetween": 120
          },
          "1200": {
            "slidesPerView": 6,
            "spaceBetween": 120
          }
        }
      }
    </script>
                
            </main>
        </div>
    </div>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>