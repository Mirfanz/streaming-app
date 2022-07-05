<?= $this->extend('layouts/template') ;?>
<?= $this->section('head') ;?>
<style>
  .carousel-swiper {
    padding-top: 10px;
    overflow: visible;
    max-width: 500px;
    aspect-ratio: 2/1;
  }
  .carousel-swiper .swiper-slide {
    background-color: var(--secondary);
    border-radius: 0.75rem;
    padding: 0.5rem;
    gap: 0.5rem;
    display: flex;
  }
  .carousel-swiper .swiper-slide img {
    height: 100%;
    aspect-ratio: 3/4;
    border-radius: 5px;
  }
  .carousel-swiper :where(.slide-next, .slide-prev):disabled {
    /* color: black; */
    opacity: 0.25;
  }
  .carousel-swiper :where(.slide-next, .slide-prev) {
    position: absolute;
    top: 50%;
    font-size: larger;
    width: 2rem;
    aspect-ratio: 1/1;
    margin-top: -1rem;
    z-index: 10;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    color: blueviolet;
    background: none;
    border: none;
  }
  .carousel-swiper .slide-prev {
    left: 0;
  }
  .carousel-swiper .slide-next {
    right: 0;
  }

  /* ================================ */
  .latest-swiper .swiper-slide {
    width: 7.5rem;
    background-color: var(--secondary) !important;
    border-radius: 5px;
    overflow: hidden;
  }
  .latest-swiper .swiper-slide img {
    width: 100%;
    aspect-ratio: 3/4;
  }
</style>
<?= $this->endSection() ;?>

<?= $this->section('content'); ?>
<div class="container-fluid">
  <div class="swiper carousel-swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="/assets/img/quotes.png" alt="" />
        <div>
          <h3 class="m-0 text-warning">Naruto Shipuden</h3>
        </div>
      </div>
      <div class="swiper-slide">
        <img src="/assets/img/20220627_115201.png" alt="" />
        <div>
          <h3 class="m-0 text-warning">Boruto: Naruto Next Generation</h3>
        </div>
      </div>
      <div class="swiper-slide">
        <img src="/assets/img/quotes.png" alt="" />
        <div>
          <h3 class="m-0 text-warning">Naruto Shipuden</h3>
        </div>
      </div>
      <div class="swiper-slide">
        <img src="/assets/img/20220627_115201.png" alt="" />
        <div>
          <h3 class="m-0 text-warning">Boruto: Naruto Next Generation</h3>
        </div>
      </div>
    </div>
    <button class="slide-next"><i class="bx bxs-chevrons-right"></i></button>
    <button class="slide-prev"><i class="bx bxs-chevrons-left"></i></button>
  </div>

  <div class="my-3">
    <div class="d-flex">
      <h4>Latest Update</h4>
      <a href="#" class="ms-auto">show all</a>
    </div>
    <div class="swiper latest-swiper">
      <div class="swiper-wrapper">
        <?php for($i = 0 ; $i < 10; $i++): ?>
        <div class="swiper-slide card">
          <img src="/assets/img/quotes.png" alt="" />
          <div class="card-body py-1 px-2 bg-dark">
            <h6 class="m-0">Naruto Shippuden</h6>
          </div>
        </div>
        <?php endfor; ?>
      </div>
    </div>
  </div>

  <div class="my-3">
    <div class="d-flex">
      <h4>Most Popular</h4>
      <a href="#" class="ms-auto">show all</a>
    </div>
    <div class="swiper latest-swiper">
      <div class="swiper-wrapper">
        <?php for($i = 0 ; $i < 10; $i++): ?>
        <div class="swiper-slide card">
          <img src="/assets/img/quotes.png" alt="" />
          <div class="card-body py-1 px-2 bg-dark">
            <h6 class="m-0">Naruto Shippuden</h6>
          </div>
        </div>
        <?php endfor; ?>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script') ;?>
<script>
  const swiperCarousel = new Swiper(".carousel-swiper", {
    spaceBetween: 15,
    slidesPerView: 1,
    autoplay: true,
    navigation: {
      nextEl: ".carousel-swiper .slide-next",
      prevEl: ".carousel-swiper .slide-prev",
    },
  });
  const swiperLatest = new Swiper(".swiper.latest-swiper", {
    spaceBetween: 15,
    slidesPerView: "auto",
    freeMode: true,
  });
</script>
<?= $this->endSection() ;?>
