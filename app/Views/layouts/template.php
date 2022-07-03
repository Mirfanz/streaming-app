<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= base_url('/vendor/boxicons/css/boxicons.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('/vendor/bootstrap/dist/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('/vendor/swiperjs/swiper.css'); ?>" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="<?= base_url('/css/style.css'); ?>" />
    <link rel="shortcut icon" href="<?= base_url('favicon.ico'); ?>" type="image/x-icon">
    <?= $this->renderSection('head') ;?>
    <title><?= $title; ?></title>
  </head>

  <body>
    <!-- <script>if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {document.querySelector(".body").style = "height:" + window.innerHeight + "px;";}</script> -->
    <?php
    if(session()->getFlashdata('success')!=null) echo '
    <script>
      swal({title:"Berhasil!", text:"'.session()->getFlashdata("success").'", icon:"success"});
    </script>
    '; if(session()->getFlashdata('warning')!=null) echo '
    <script>
      swal({title:"Peringatan!", text:"'.session()->getFlashdata("warning").'", icon:"warning"});
    </script>
    '; if(session()->getFlashdata('error')!=null) echo '
    <script>
      swal({title:"Kesalahan!",text:"'.session()->getFlashdata("error").'", icon:"error"});
    </script>
    '; ?>
    <!-- <div class="bg-dark text-white text-center">Lorem ipsum dolor sit amet.</div> -->
    <nav class="navbar  navbar-expand-md bg-white shadow-sm sticky-top">
      <div class="container nav-container">
        <a class="navbar-brand d-flex" href="#">
          <img class="ratio-same" style="max-height: 2rem;" src="<?= base_url('/favicon.ico'); ?>" alt="">
          <span style="transform: translateX(-5px);"><?= 'anDev'; ?></span>
        </a>
        <div class="d-flex gap-2 order-md-1 ms-md-2 fs-5">
          <a class="d-md-none d-block btn-search collapsed" href="#navsearch" data-bs-toggle="collapse" aria-controls="navsearch">
            <i class="bx bx-search-alt bx-border"></i>
          </a>
          <a href="#navoffcanvas" data-bs-toggle="offcanvas" aria-controls="navoffcanvas" aria-expanded="false">
            <i class="bx bx-menu-alt-right bx-border"></i>
          </a>
        </div>
        <div class="collapse navbar-collapse pt-2 py-md-0 justify-content-center" id="navsearch" aria-expanded="true">
          <form class="d-flex form-search" action="<?= base_url('/product/search'); ?>" role="search">
            <input type="search" class="form-control" name="key" required placeholder="Cari produk" value="<?= isset($key)?$key:''; ?>" />
            <button class="visually-hidden" type="submit"></button>
          </form>
        </div>
        <ul class="navbar-nav gap-1">
          <li class="nav-item">
            <a class="nav-link <?= $page==='beranda'? 'active': ''; ?>" href="<?= base_url(); ?>">
              <i class="bx <?= $page==='beranda'? 'bxs-home-alt-2': 'bx-home'; ?>"></i>
              <span class="text"> Beranda</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $page==='produk'? 'active': ''; ?>" href="<?= base_url('/product'); ?>">
              <i class="bx bx<?= $page==='produk'? 's': ''; ?>-shopping-bag"></i>
              <span class="text"> Produk</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $page==='favorite'? 'active': ''; ?>" href="<?= base_url('/user/favorite'); ?>">
              <i class="bx bx<?= $page==='favorite'? 's': ''; ?>-heart"></i>
              <span class="text"> Suka</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $page==='keranjang'? 'active': ''; ?>" href="<?= base_url('/user/carts'); ?>">
              <i class="bx bx<?= $page==='keranjang'? 's': ''; ?>-cart"></i>
              <span class="text"> Troli</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $page==='saya'? 'active': ''; ?>" href="<?= base_url('/user'); ?>">
              <i class="bx bx<?= $page==='saya'? 's': ''; ?>-user"></i>
              <span class="text"> Akun</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="navoffcanvas" aria-labelledby="offcanvasTopLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasTopLabel"><?= APP_NAME; ?></h5>
        <button type="button" class="btn-close" data-bs-target="#offcanvas1" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body pt-0 overflow-visible">
        <div class="d-flex flex-column gap-2">
          <a class="d-flex gap-2 align-items-center text-decoration-none text-dark" href="<?= logged_in()? base_url('/'.user()->toArray()['username'].'/user'):base_url('/login'); ?>">
            <i class="bx bx-store" style="color: orangered"></i>
            <span>Lihat toko saya</span>
            <i class="ms-auto bx bx-chevron-right"></i>
          </a>
          <a class="d-flex gap-2 align-items-center text-decoration-none text-dark" href="<?= base_url('/user/edit'); ?>">
            <i class="bx bx-edit" style="color: royalblue"></i>
            <span>Edit profil</span>
            <i class="ms-auto bx bx-chevron-right"></i>
          </a>
          <a class="d-flex gap-2 align-items-center text-decoration-none text-dark" href="<?= base_url('/product/posting'); ?>">
            <i class="bx bx-shopping-bag" style="color: blueviolet"></i>
            <span>Posting produk</span>
            <i class="ms-auto bx bx-chevron-right"></i>
          </a>
          <a class="d-flex gap-2 align-items-center text-decoration-none text-dark" href="<?= base_url('/user/carts'); ?>">
            <i class="bx bx-cart" style="color: orange"></i>
            <span>Lihat keranjang</span>
            <i class="ms-auto bx bx-chevron-right"></i>
          </a>
          <a class="d-flex gap-2 align-items-center text-decoration-none text-dark" href="<?= base_url('/user/favorite'); ?>">
            <i class="bx bx-heart" style="color: deeppink"></i>
            <span>Lihat produk disukai</span>
            <i class="ms-auto bx bx-chevron-right"></i>
          </a>
          <?php if(logged_in()): ?>
          <a class="d-flex gap-2 align-items-center text-decoration-none text-dark" href="<?= base_url('/forgot'); ?>">
            <i class="bx bx-lock" style="color: royalblue"></i>
            <span>Ubah password</span>
            <i class="ms-auto bx bx-chevron-right"></i>
          </a>
          <a class="btn btn-warning mt-3" href="<?= base_url('/logout'); ?>" id="btnLogout">Keluar</a>
          <?php else: ?>
          <a class="btn btn-outline-warning mt-3" href="<?= base_url('/register'); ?>">Daftar</a>
          <a class="btn btn-warning" href="<?= base_url('/login'); ?>">Masuk</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?= $this->renderSection('content') ;?>
    <div class="container position-fixed bg-black bottom-0 end-0 start-0" style="z-index: 10000;overflow:visible !important;">
      <a href="#" class="btn-to-top"><i class="bx bxs-arrow-to-top"></i></a>
    </div>
    <div class="toast-container position-fixed bottom-0 end-0 pb-3 px-3">
    </div>

    <script src="<?= base_url('/vendor/swiperjs/swiper.js'); ?>"></script>
    <script src="<?= base_url('/vendor/sweetalert/sweetalert.js'); ?>"></script>
    <script src="<?= base_url('/vendor/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('/vendor/jquery/jquery.js'); ?>"></script>
    <script src="<?= base_url('/js/script.js'); ?>"></script>

    <?= $this->renderSection('script') ;?>
  </body>
</html>
