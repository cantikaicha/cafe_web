<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Menu Pesanan</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="services-page">
    <header id="header" class="header d-flex align-items-center light-background sticky-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

            <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">CS CAFE</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="pesan.php" class="active">Daftar Menu</a></li>
                    <li><a href="resume.php">Pemesanan</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="portfolio.html">Portfolio</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="header-social-links">
                <a href="https://www.tiktok.com/@bemineaja?is_from_webapp=1&sender_device=pc" class="tiktok"><i
                        class="bi bi-tiktok"></i></a>
                <a href="https://www.instagram.com/slshabillaaputrii_?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                    class="instagram"><i class="bi bi-instagram"></i></a>
            </div>

        </div>
    </header>

    <main class="main">

        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Makanan & Minuman</h2>
                <p>Pilihan yang Pastinya Mengenyangkan dan Pas di Kantong</p>
            </div><!-- End Section Title -->
            <!-- Filter Kategori -->

            <form method="GET" action="pesan.php">
                <label for="kategori">Pilih Kategori:</label>
                <select name="kategori" onchange="this.form.submit()">
                    <option value="">-- Semua Menu --</option>
                    <option value="Makanan" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Makanan') ? 'selected' : '' ?>>Makanan</option>
                    <option value="Minuman" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Minuman') ? 'selected' : '' ?>>Minuman</option>
                </select>
            </form>
            <?php
            include 'db.php'; // koneksi database
            
            $kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
            $nama_menu = isset($_GET['nama_menu']) ? $_GET['nama_menu'] : '';
            $harga = isset($_GET['harga']) ? $_GET['harga'] : '';
            $deskripsi = isset($_GET['deskripsi']) ? $_GET['deskripsi'] : '';
            $sql = "SELECT * FROM menu";

            if (!empty($kategori)) {
                $sql .= " WHERE kategori = '$kategori'";
            }

            $result = $conn->query($sql);
            ?>


            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item item-cyan position-relative">
                            <div class="menu-grid">
                                <?php while ($menu = $result->fetch_assoc()): ?>
                                    <div class="menu-card">
                                        <img src="assets/img/<?php echo $menu['gambar']; ?>" alt="<?php echo $menu['nama_menu']; ?>">
                                        <h4><?php echo $menu['nama_menu']; ?></h4>
                                        <p><?php echo $menu['deskripsi']; ?></p>
                                        <strong>Rp <?php echo number_format($menu['harga'], 0, ',', '.'); ?></strong>
                                        <form method="POST" action="keranjang.php">
                                            <input type="hidden" name="id_menu" value="<?php echo $menu['id_menu']; ?>">
                                            <input type="number" name="jumlah" value="1" min="1">
                                            <button type="submit" name="tambah">+ Tambah ke Keranjang</button>
                                        </form>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div><!-- End Service Item -->
                    </div>
                </div>
            </div>

            

        </section><!-- /Services Section -->

    </main>

    <footer id="footer" class="footer light-background">

        <div class="container">
            <div class="copyright text-center ">
                <p>© <strong class="px-1 sitename">CS CAFE</strong> <span>Enjoy Your Life<br></span></p>
            </div>
            <div class="social-links d-flex justify-content-center">
                <a href=""><i class="bi bi-tiktok"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>