<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, height=device-height">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= lang('landing_title'); ?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?= $favicon; ?>">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url($non_frameworks_dir . '/bootstrap_NA/css/bootstrap.min.css'); ?>">

    <!-- Custom fonts for this template -->
    <link href="<?= base_url($non_frameworks_dir . '/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url($non_frameworks_dir . '/simple-line-icons/css/simple-line-icons.css'); ?>">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="<?= base_url($non_frameworks_dir . '/device-mockups/device-mockups.min.css'); ?>">

    <!-- Custom styles for this template -->
    <link href="<?= base_url($non_frameworks_dir . '/css/new-age.min.css'); ?>" rel="stylesheet">

</head>

<body id="page-top">
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="<?= base_url(); ?>"><img src="<?= base_url($img_dir . '/NYLogo.png');?>" style="max-width:200px"></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <?= lang('menu'); ?> &nbsp
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#home"><?= lang('menu_home') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#about-us"><?= lang('menu_about_us') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#features"><?= lang('menu_features') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact"><?= lang('menu_contact') ?></a>
                    </li>
                    <?php if($admin_link) : ?>
                    <li class="nav-item">
                        <a class="btn btn-outline" href="<?= base_url('/admin/dashboard') ?>" role="button"><?= lang('menu_admin') ?></a> &nbsp
                    </li>
                    <?php endif; ?>
                    <?php if($user_link) : ?>
                    <li class="nav-item">
                        <a class="btn btn-outline" href="<?= base_url('/userdashboard') ?>" role="button"><?= 'Dashboard' ?></a> &nbsp
                    </li>
                    <?php endif; ?>

                    <?php if($logout_link) : ?>
                    <li class="nav-item">
                        <a class="btn btn-outline" href="<?= base_url('/auth/logout') ?>" role="button"><?= lang('menu_logout') ?></a>
                    </li>
                    <?php else : ?>
                    <li class="nav-item">
                        <a class="btn btn-outline" href="<?= base_url('/login') ?>" role="button"><?= lang('menu_login') ?></a> &nbsp
                    </li>                     
                    <li class="nav-item">
                        <a class="btn btn-outline" href="<?= base_url('/register') ?>" role="button"><?= lang('menu_register') ?></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead">
        <div class="container h-100" id="home">
            <div class="row h-100">
                <div class="col-lg-6 my-auto">
                    <div class="container-fluid">
                        <img src='<?= base_url($img_dir . '/Logo-Dashboard.png');?>' style="max-width: 100%">                        
                    </div>
                </div>
                <div class="col-lg-6 my-auto">
                    <div class="header-content mx-auto">
                        <h1 class="mb-5"><?= lang('header_heading') ?></h1>
                        <a href="<?= base_url('/register') ?>" class="btn btn-outline btn-xl js-scroll-trigger"><?= lang('header_button') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="about-us" id="about-us">
        <div class="jumbotron jumbotron-fluid text-center">            
            <div class="container">
                <div class="overlay"></div>
                <h1 class="display-4"><?= lang('about_us_heading');?></h1>
                <p class="text-muted"><?= lang('about_us_subheading') ?></p>
                <hr class="hr-au">
                <p class="text-muted"><?= lang('about_us_text_muted') ?></p>
            </div>            
        </div>
        <div class="container">            
            <div class="row">
                <div class="col-lg-5">
                    <img src="<?= base_url($img_dir . "/au-1.jpg") ?>" alt="Radio In FM Menerima Penghargaan" class="img-thumbnail">
                </div>
                <div class="col-lg-7">
                    <p>Radio In FM adalah salah satu radio di Kabupaten Kebumen yang berada pada frekuensi 95.00 FM. Radio In FM berada di bawah pengelolaan Bidang Informasi dan Komunikasi Publik, dan diawasi langsung oleh Dinas Komunikasi dan Informatika Kabupaten Kebumen.</p>
                    <p>Jangkauan atau radius pancaran Radio In FM mencakup radius 50 km secara efektif, meliputi Kebumen, Gombong, Prembun, Kutoarjo, Kutowinangun, Purworejo, Banyumas, Banjarnegara, Wonosobo serta Wadaslintang.</p>
                </div>
                <div class="col-lg-7">
                    <p>Berdasarkan statistik terakhir yang dihimpun, pendengar Radio In FM bisa diklasifikasikan ke beberapa kelas. Berdasarkan jenis kelamin, ada 45% pendengar pria dan 55% pendengar wanita.</p>
                    <p>Sementara berdasarkan usia, 30% pendengar ada pada angka usia 12 hingga 19 tahun, 30% pada usia 20 hingga 29 tahun dan 40% nya adalah pendengar dengan usia 30 tahun keatas. Kurang lebih 500.000 orang mendengarkan siaran Radio In FM tiap harinya.</p>
                </div>
                <div class="col-lg-5">
                    <img src="<?= base_url($img_dir . "/au-2.jpg") ?>" alt="Radio In FM Menerima Penghargaan" class="img-thumbnail">
                </div>
                <div class="col-lg-5">                    
                    <img src="<?= base_url($img_dir . "/au-3.jpg") ?>" alt="Radio In FM Menerima Penghargaan" class="img-thumbnail">
                </div>
                <div class="col-lg-7">
                    <p>Selain melayani masyarakat lewat hiburan, kami juga berusaha mengabdi pada masyarakat dengan membuka jasa pengiklanan. Dengan total mencapai 500.000 pendengar tiap harinya, memperkenalkan produk anda kepada khalayak umum, bukan lagi suatu impian.</p>
                    <p>Dengan kru yang professional dan telah banyak menerima penghargaan dari Komisi Penyiaran Daerah Jawa Tengah, kami yakin bahwa kami mampu memberikan pelayanan terbaik kepada anda.</p>
                </div>
                <div class="col-lg-7">
                    <p>Memperkenalkan, "Ngiklan-Yuh". Suatu portal sistem pendaftaran iklan, dimana anda mampu mendaftarkan segala jenis usaha anda untuk diiklankan di Radio In FM. </p>
                    <p>Tidak perlu terburu-buru untuk mdatang ke kantor kami, cukup lewat aplikasi ini anda sudah mampu mendaftarkan iklan anda kepada kami. Dengan harga paket yang bersaing, ekonomis, dan fitur nego yang dapat anda pilih, beriklan tidak pernah semudah ini.</p>
                    <p>Tunggu apa lagi, segera daftarkan diri anda. Daftarkan iklan anda, tunggu costumer service kami menyetujui iklan anda, maka anda sudah selangkah lebih maju untuk membuat kontrak pengiklanan.</p>
                    <p>Ngiklan Yuh - Ngiklan Pancen Gampang</p>
                </div>
                <div class="col-lg-5">
                    <img src='<?= base_url($img_dir . '/Logo-Dashboard.png');?>' alt="Logo Ngiklan Yuh">
                </div>
            </div>
        </div>
    </section>

    <section class="features" id="features">
        <div class="container">
            <div class="section-heading text-center">
                <h2><?= lang('features_heading') ?></h2>
                <p class="text-muted"><?= lang('features_subheading') ?></p>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-4 my-auto">
                    <div class="device-container">
                        <div class="device-mockup iphone6_plus portrait white">
                            <div class="device">
                                <div class="screen">
                                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                    <img src="<?= base_url($img_dir . '/demo-screen-1.jpg');?>" class="img-fluid" alt="">
                                </div>
                                <div class="button">
                                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 my-auto">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="feature-item">
                                    <i class="icon-screen-smartphone text-primary"></i>
                                    <h3><?= lang('features_1') ?></h3>
                                    <p class="text-muted"><?= lang('features_1_sub') ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="feature-item">
                                    <i class="icon-briefcase text-primary"></i>
                                    <h3><?= lang('features_2') ?></h3>
                                    <p class="text-muted"><?= lang('features_2_sub') ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="feature-item">
                                    <i class="icon-docs text-primary"></i>
                                    <h3><?= lang('features_3') ?></h3>
                                    <p class="text-muted"><?= lang('features_3_sub') ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="feature-item">
                                    <i class="icon-bubbles text-primary"></i>
                                    <h3><?= lang('features_4') ?></h3>
                                    <p class="text-muted"><?= lang('features_4_sub') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   

    <section class="cta">
        <div class="cta-content">
            <div class="container">
                <h2><?= lang('cta_heading') ?></h2>
                <a href="<?= base_url('/ajukaniklan') ?>" class="btn btn-outline btn-xl js-scroll-trigger"><?= lang('cta_button') ?></a>
            </div>
        </div>
        <div class="overlay"></div>
    </section>

    <section class="contact bg-primary" id="contact">
        <div class="container">            
            <h2><i class="fas fa-heart"></i><?= lang('contact_heading') ?><i class="fas fa-heart"></i></h2>            
            <ul class="list-inline list-social">
                <li class="list-inline-item social-twitter">
                    <a href="https://twitter.com/infmkebumen" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="list-inline-item social-facebook" tagert="_blank">
                    <a href="https://facebook.com/infmkebumen">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="list-inline-item social-instagram">
                    <a href="https://www.instagram.com/infmkebumen/" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
                <li class="list-inline-item social-google-plus">
                    <a href="#">
                        <i class="fab fa-google-plus-g"></i>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <footer>
        <div class="container">
            <p><?= lang('footer_copyright') ?></p>
            <p><?= lang('footer_2') ?></p>
            <p><?= lang('footer_3') ?></p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url($non_frameworks_dir . '/jquery/jquery.min.js'); ?>"></script>
    
    <script src="<?= base_url($non_frameworks_dir . '/bootstrap_NA/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Plugin JavaScript -->
    <script src="<?= base_url($non_frameworks_dir . '/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for this template -->
    <script src="<?= base_url($non_frameworks_dir . '/js/new-age.min.js'); ?>"></script>

</body>

</html>