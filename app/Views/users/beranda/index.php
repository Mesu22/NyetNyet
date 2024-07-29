<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Nyet Nyet</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

 
  <link href="<?= base_url('assets'); ?>//vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets'); ?>//vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('assets'); ?>//vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url('assets'); ?>//vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?= base_url('assets'); ?>//vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">



  
  <link href="<?= base_url('assets'); ?>//css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header fixed-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">mesab520@Gmail.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>087839995711</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
          <!-- <img src="<?= base_url('assets'); ?>//img/logo.png" alt=""> -->
          <h1 class="sitename">Nyet Nyet</h1>
        </a>

        <nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="#hero" class="active">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#portfolio">Menu Favorite</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>

      </div>

    </div>

  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <?php foreach ($heroSections as $heroSection): ?>
            <img src="<?= base_url('uploads/hero/' . $heroSection['image']); ?>" alt="<?= $heroSection['title']; ?>" data-aos="fade-in">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row justify-content-start">
                    <div class="col-lg-8">
                        <h2><?= $heroSection['title']; ?></h2>
                        <a href="https://wa.me/<?= $heroSection['whatsapp_number']; ?>?text=<?= urlencode($heroSection['whatsapp_message']); ?>" class="btn-get-started">Order Sekarang</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span>About Us<br></span>
        <h2>About Us<br></h2>
      </div><!-- End Section Title -->

      <div class="container">
    <div class="row gy-4 align-items-center">
        <?php foreach ($about as $aboutSection): ?>
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                <div class="img-container">
                    <img src="<?= base_url('uploads/about/' . $aboutSection['image']); ?>" class="img-fluid rounded-3 shadow-lg" alt="<?= esc($aboutSection['title']); ?>">
                </div>
            </div>
            <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <div class="content">
                    <h2 class="display-4 mb-4 text-danger"><?= esc($aboutSection['title']); ?></h2>
                    <p class="lead fst-italic mb-4 text-danger">
                        <?= esc($aboutSection['description']); ?>
                    </p>
                    <ul class="list-unstyled mb-0">
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>




    </section>
    <!-- /About Section -->
    <section id="paket" class="paket section">
    <div class="container">
        <div class="container section-title" data-aos="fade-up">
            <span>Paket Spesial<br></span>
            <h2>Paket Spesial<br></h2>
        </div>
        <?php foreach ($paket as $paket): ?>
            <div class="paket-item">
                <h3><?= $paket['nama'] ?></h3>
                <p class="paket-description"><?= $paket['deskripsi'] ?></p>
                <div class="paket-details">
                    <p><strong>Harga:</strong> Rp <?= number_format($paket['harga'], 0, ',', '.') ?>,- per paket</p>
                    <p><strong>Isi Paket:</strong></p>
                    <ul>
                        <?php foreach (explode("\n", $paket['isi_paket']) as $item): ?>
                            <li><?= trim($item) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>


    <!-- Clients Section -->
    <section id="clients" class="clients section light-background">
    <div class="container">
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
                            "slidesPerView": 6,
                            "spaceBetween": 120
                        }
                    }
                }
            </script>
            <div class="swiper-wrapper align-items-center">
                <?php foreach ($clients as $client): ?>
                    <div class="swiper-slide">
                        <img src="<?= base_url('uploads/clients/' . $client['image']) ?>" class="img-fluid" alt="<?= $client['name'] ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>


    <!-- Services Section -->
    <section id="services" class="services section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <span>Services</span>
        <h2>Services</h2>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-4">
            <?php foreach ($services as $service): ?>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <a href="#" class="stretched-link">
                            <h3><?= $service['title'] ?></h3>
                        </a>
                        <p><?= $service['description'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section><!-- /Services Section --><!-- /Services Section -->


    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <span>Menu Favorit</span>
    <h2>Menu Favorit</h2>
  </div><!-- End Section Title -->

  <div class="container my-5">
    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

        <ul class="portfolio-filters isotope-filters list-inline text-center" data-aos="fade-up" data-aos-delay="100">
            <li class="list-inline-item" data-filter="*" class="filter-active">All</li>
            <li class="list-inline-item" data-filter=".filter-makanan">Makanan</li>
            <li class="list-inline-item" data-filter=".filter-minuman">Minuman</li>
            <li class="list-inline-item" data-filter=".filter-sayur">Sayur</li>
        </ul><!-- End Portfolio Filters -->

        <div class="row gy-4 isotope-container">
            <?php foreach ($portfolios as $menu) : ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-<?= strtolower($menu['category']); ?>">
                    <div class="portfolio-wrap">
                        <?php $img_path = base_url('assets/img/Menu/' . $menu['image']); ?>
                        <img src="<?= $img_path ?>" class="img-fluid" alt="<?= $menu['title'] ?>">
                        <div class="portfolio-info">
                            <h4><?= $menu['title'] ?></h4>
                            <div class="portfolio-links">
                                <a href="<?= $img_path ?>" data-gallery="portfolio-gallery" class="portfolio-lightbox" title="<?= $menu['title'] ?>"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div><!-- End Portfolio Container -->
    </div>
</div>
<section>
  
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/isotope/3.0.6/isotope.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.0.9/js/glightbox.min.js"></script>
<section>
  
</section>
<script>
    $(document).ready(function() {
        var $portfolioContainer = $('.isotope-container').isotope({
            itemSelector: '.portfolio-item',
            layoutMode: 'masonry'
        });

        $('.portfolio-filters li').on('click', function() {
            $('.portfolio-filters li').removeClass('filter-active');
            $(this).addClass('filter-active');
            var filterValue = $(this).attr('data-filter');
            $portfolioContainer.isotope({ filter: filterValue });
        });

        AOS.init();
        const lightbox = GLightbox({
            selector: '.portfolio-lightbox'
        });
    });
</script>




</section><!-- /Portfolio Section -->


    </section><!-- /Team Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span>Contact</span>
        <h2>Contact</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4">

<!-- Alamat -->
<div class="row gy-4">
    <?php if (isset($contactInfo) && is_array($contactInfo) && !empty($contactInfo)): ?>
        <?php foreach ($contactInfo as $contact): ?>
            <?php switch ($contact['type']):
                case 'address': ?>
                    <div class="col-lg-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center bg-white p-4 rounded shadow-sm" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt text-danger fs-3"></i>
                            <h3 class="mt-3">Alamat</h3>
                            <p class="mb-0"><?= esc($contact['value']) ?></p>
                        </div>
                    </div>
                    <?php break; ?>
                <?php case 'phone': ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center bg-white p-4 rounded shadow-sm" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone text-danger fs-3"></i>
                            <h3 class="mt-3">Nomor Telepon</h3>
                            <p class="mb-0"><?= esc($contact['value']) ?></p>
                        </div>
                    </div>
                    <?php break; ?>
                <?php case 'email': ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center bg-white p-4 rounded shadow-sm" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope text-danger fs-3"></i>
                            <h3 class="mt-3">Email</h3>
                            <p class="mb-0"><?= esc($contact['value']) ?></p>
                        </div>
                    </div>
                    <?php break; ?>
            <?php endswitch; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12">
            <p class="text-center">Informasi kontak tidak tersedia saat ini.</p>
        </div>
    <?php endif; ?>
</div>


    <div class="row gy-4 mt-4">
        <!-- Google Maps -->
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="bg-white p-4 rounded shadow-sm">
                <h3 class="text-center mb-4">Lokasi Kami</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15810.53399312024!2d110.3796438!3d-7.8285585!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a57079c1f3723%3A0xd228c4735a198c96!2sNyet-Nyet!5e0!3m2!1sid!2sid!4v1719911627405!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div><!-- End Google Maps -->

        <!-- Form Kontak -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#contactForm').on('submit', function(e) {
                    e.preventDefault();
                    $('.loading').show();
                    $('.error-message').hide();
                    $('.sent-message').hide();

                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: $(this).serialize(),
                        dataType: 'json',
                        success: function(response) {
                            $('.loading').hide();
                            if (response.status === 'success') {
                                $('.sent-message').show().text(response.message);
                                $('#contactForm')[0].reset();
                            } else {
                                $('.error-message').show().text(response.message);
                            }
                        },
                        error: function() {
                            $('.loading').hide();
                            $('.error-message').show().text('An error occurred. Please try again.');
                        }
                    });
                });
            });
        </script>

    </div>
</div>

<style>
    .info-item {
        text-align: center;
    }
    .info-item i {
        font-size: 3rem;
    }
    .info-item h3 {
        font-size: 1.5rem;
        margin-top: 15px;
    }
    .info-item p {
        font-size: 1rem;
        color: #6c757d;
    }
    .bg-white {
        background-color: #ffffff;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
</style>


    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer position-relative dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6">
          <div class="footer-about">
            <a href="index.html" class="logo sitename">Nyet Nyet</a>
            <div class="footer-contact pt-3">
              <p>Jl. Ki Ageng Pemanahan Ruko Wirosaban Indah No.33, Sorosutan, Kec. Umbulharjo, Kota Yogyakarta,</p>
              <p>Daerah Istimewa Yogyakarta, 55162</p>
              <p class="mt-3"><strong>Phone:</strong> <span>087839995711</span></p>
              <p><strong>Email:</strong> <span>mesab520@Gmail.com</span></p>
            </div>
            <div class="social-links d-flex mt-4">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets'); ?>//vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets'); ?>//vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url('assets'); ?>//vendor/aos/aos.js"></script>
  <script src="<?= base_url('assets'); ?>//vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url('assets'); ?>//vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url('assets'); ?>//vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="<?= base_url('assets'); ?>//vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="<?= base_url('assets'); ?>//js/main.js"></script>
  

</body>


</html>