<?php

use CodeIgniter\Database\BaseUtils;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= base_url('/library/boxicons/css/boxicons.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('/library/bootstrap/dist/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('/library/swiperjs/swiper.css'); ?>" />

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap"> -->
    <link rel="stylesheet" href="<?= base_url('/css/style.css'); ?>" />
    <link rel="shortcut icon" href="<?= base_url('favicon.ico'); ?>" type="image/x-icon" />
    <?= $this->
    renderSection('head') ;?>
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

    <nav class="navbar navbar-expand-md navbar-dark shadow-sm sticky-top">
      <div class="container-fluid nav-container">
        <a class="navbar-brand d-flex" href="#">
          <img class="ratio-same" style="max-height: 2rem" src="<?= base_url('/favicon.ico'); ?>" alt="" />
          <span>FanDev</span>
        </a>
        <!-- <div class="d-flex gap-2 order-md-1 ms-md-2 fs-5">
          <a class="d-md-none d-block btn-search collapsed" href="#navsearch" data-bs-toggle="collapse" aria-controls="navsearch">
            <i class="bx bx-search-alt"></i>
          </a>
        </div> -->
        <form class="d-flex gap-1 align-items-center nav-search" action="<?= base_url('/search'); ?>" role="search">
          <div class="collapse collapse-horizontal" id="navsearch">
            <input type="text" class="bg-transparent text-light border-0 input-search" style="outline: none" name="query" required placeholder="Cari Film" value="<?= isset($key)?$key:''; ?>" />
          </div>
          <button class="text-light bg-transparent border-0 btn-search" type="button"><i class="bx bx-search-alt"></i></button>
        </form>
        <ul class="navbar-nav gap-1">
          <li class="nav-item">
            <a class="nav-link <?= $page==='home'? 'active': ''; ?>" href="<?= base_url(); ?>">
              <i class="bx bxs-home"></i>
              <span class="text">Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $page==='search'? 'active': ''; ?>" href="<?= base_url('/search'); ?>">
              <i class="bx bxs-search"></i>
              <span class="text">Search</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $page==='trending'? 'active': ''; ?>" href="<?= base_url(); ?>">
              <i class="bx bxs-trophy"></i>
              <span class="text">Trending</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $page==='user'? 'active': ''; ?>" href="<?= base_url(); ?>">
              <i class="bx bxs-user"></i>
              <span class="text">User</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <?= $this->renderSection('content') ;?>

    <div class="container position-fixed bg-black bottom-0 end-0 start-0" style="z-index: 10000; overflow: visible !important">
      <a href="#" class="btn-to-top"><i class="bx bxs-arrow-to-top"></i></a>
    </div>
    <div class="toast-container position-fixed bottom-0 end-0 pb-3 px-3"></div>

    <script src="<?= base_url('/library/swiperjs/swiper.js'); ?>"></script>
    <script src="<?= base_url('/library/sweetalert/sweetalert.js'); ?>"></script>
    <script src="<?= base_url('/library/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('/library/jquery/jquery.js'); ?>"></script>
    <script src="<?= base_url('/js/script.js'); ?>"></script>

    <?= $this->renderSection('script') ;?>
  </body>
</html>
