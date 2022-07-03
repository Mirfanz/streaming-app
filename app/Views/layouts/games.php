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
    <link rel="stylesheet" href="<?= base_url('/css/games/style.css'); ?>" />
    <link rel="shortcut icon" href="<?= base_url('favicon.ico'); ?>" type="image/x-icon">
    <?= $this->renderSection('head') ;?>
    <script src="<?= base_url('/vendor/sweetalert/sweetalert.js'); ?>"></script>
    <title><?= $title; ?></title>
  </head>

  <body>
    <?php
    if(session()->getFlashdata('success')) echo '
    <script>
      swal({ title: "Berhasil!", text: "'.session()->getFlashdata('success').'", icon: "success" });
    </script>
    '; if(session()->getFlashdata('warning')) echo '
    <script>
      swal({ title: "Peringatan!", text: "'.session()->getFlashdata('warning').'", icon: "warning" });
    </script>
    '; if(session()->getFlashdata('error')) echo '
    <script>
      swal({ title: "Kesalahan!", text: "'.session()->getFlashdata('error').'", icon: "error" });
    </script>
    '; ?>
    <!-- <div class="bg-dark text-white text-center">Lorem ipsum dolor sit amet.</div> -->
    <nav class="navbar navbar-expand-md bg-white shadow-sm sticky-top">
      <div class="container nav-container">
        <a class="navbar-brand me-2"><?= isset($game)?$game:APP_NAME; ?></a>
        <button class="text-small d-flex bg-transparent border-0" data-bs-toggle="popover" title="Cara Bermain" data-bs-content="sddfgfgf gfdgjjfsmdf smfvjs">
          <i class="bx bx-question-mark rounded-circle" style="border: 1px solid"></i>
        </button>
        <div class="d-flex gap-2 align-items-center ms-auto">
          <a class="btn btn-sm btn-outline-primary" href="<?= base_url(); ?>"><i class="bx bx-home-alt"></i> Home</a>
          <a class="btn btn-sm btn-primary" href="#leaderboard" data-bs-toggle="modal" aria-controls="leaderboard" aria-expanded="false" id="btnLeaderboard"> leaderboard </a>
        </div>
      </div>
    </nav>
    <!-- <button class="btn btn-success" data-bs-target="#modalLocation" data-bs-toggle="modal">sdsdsd</button> -->
    <div class="modal fade" id="leaderboard" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header sticky-top bg-light">
            <h5 class="offcanvas-title d-flex" id="offcanvasTopLabel"><i class="bx text-warning me-2 bxs-trophy my-auto"></i>Leaderboard</h5>
            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
          </div>
          <div class="modal-body p-0"><?= $this->renderSection('leaderboard') ;?></div>
        </div>
      </div>
    </div>
    <?= $this->renderSection('content') ;?>
    <div class="container position-fixed bg-black bottom-0 end-0 start-0" style="z-index: 10000; overflow: visible !important">
      <a href="#" class="btn-to-top"><i class="bx bxs-arrow-to-top"></i></a>
    </div>

    <script src="<?= base_url('/vendor/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('/vendor/jquery/jquery.js'); ?>"></script>
    <script src="<?= base_url('/js/games/script.js'); ?>"></script>
    <?= $this->renderSection('script') ;?>
  </body>
</html>
