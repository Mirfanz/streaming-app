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
    /* padding: 0.5rem; */
    gap: 0.5rem;
    display: flex;
    overflow: hidden;
  }
  .carousel-swiper .swiper-slide img {
    height: 100%;
    width: 100%;
    /* aspect-ratio: 3/4; */
    /* border-radius: 5px; */
  }
  .carousel-swiper :where(.slide-next, .slide-prev):disabled {
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
    border-radius: 50%;
    background: rgba(0, 0, 0, 0.75);
    border: none;
  }
  .carousel-swiper .slide-prev {
    left: 0.5rem;
  }
  .carousel-swiper .slide-next {
    right: 0.5rem;
  }

  /* ================================ */
  .h-swiper .swiper-slide {
    width: 130px;
    background-color: var(--secondary) !important;
    border-radius: 5px;
    overflow: hidden;
  }
  .h-swiper .swiper-slide img {
    width: 100%;
    aspect-ratio: 3/4;
  }
</style>
<?= $this->endSection() ;?>

<?= $this->section('content'); ?>
<div class="container-fluid overflow-hidden">
  <div class="swiper carousel-swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="/assets/img/glass_movie.jpg" alt="" />
      </div>
      <div class="swiper-slide">
        <img src="/assets/img/inception_movie.jpg" alt="" />
      </div>
      <div class="swiper-slide">
        <img src="https://image.tmdb.org/t/p/w500/wcKFYIiVDvRURrzglV9kGu7fpfY.jpg" alt="" />
      </div>
      <div class="swiper-slide">
        <img src="https://image.tmdb.org/t/p/w500/egoyMDLqCxzjnSrWOz50uLlJWmD.jpg" alt="" />
      </div>
      <div class="swiper-slide">
        <img src="https://image.tmdb.org/t/p/w500/vjnLXptqdxnpNJer5fWgj2OIGhL.jpg" alt="" />
      </div>
      <div class="swiper-slide">
        <img src="https://image.tmdb.org/t/p/w500/pFwvHAFyPEqtvJEoutPuobLwrNj.jpg" alt="" />
      </div>
    </div>
    <div class="swiper-pagination swiper-pagination-fraction"></div>
    <button class="slide-next"><i class="bx bxs-chevrons-right"></i></button>
    <button class="slide-prev"><i class="bx bxs-chevrons-left"></i></button>
  </div>

  <div class="my-3">
    <div class="d-flex">
      <h4>Most Popular</h4>
      <a href="#" class="ms-auto">show all</a>
    </div>
    <div class="swiper h-swiper">
      <div class="swiper-wrapper popular">
        <?php for($i = 0 ; $i < 10; $i++): ?>
        <div class="swiper-slide card">
          <img class="placeholder placeholder-wave" />
          <div class="card-body py-1 px-2 bg-dark placeholder placeholder-wave">
            <h6 class="m-0 placeholder placeholder-wave col-12"></h6>
          </div>
        </div>
        <?php endfor; ?>
      </div>
    </div>
  </div>
  <div class="my-3">
    <div class="d-flex">
      <h4>Upcoming</h4>
      <a href="#" class="ms-auto">show all</a>
    </div>
    <div class="swiper h-swiper">
      <div class="swiper-wrapper upcoming">
        <?php for($i = 0 ; $i < 10; $i++): ?>
        <div class="swiper-slide card">
          <img class="placeholder placeholder-wave" />
          <div class="card-body py-1 px-2 bg-dark placeholder placeholder-wave">
            <h6 class="m-0 placeholder placeholder-wave col-12"></h6>
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
  // swal({
  //   title: "Pengumuman",
  //   text: "Produk ini menggunakan API TMDB tetapi tidak didukung atau disertifikasi oleh TMDB.",
  //   closeOnClickOutside: false,
  // });

  $.ajax({
    type: "get",
    url: `${API_URL}movie/popular?api_key=${API_KEY}&language=id-ID`,
    success: function (resp) {
      let movies = "";
      resp = resp.results;
      for (let i = 0; i < resp.length; i++) {
        if (i > 9) break;
        movies += `
        <div class="swiper-slide card">
          <img src="${"https://image.tmdb.org/t/p/w500/" + resp[i].poster_path}" loading="lazy" alt="${resp[i].title}" />
          <div class="card-body py-1 px-2 bg-dark">
            <h6 class="m-0" style="height:2.5em;overflow:hidden">${resp[i].title}</h6>
          </div>
        </div>`;
      }
      document.querySelector(".popular").innerHTML = movies;
    },
  });
  $.ajax({
    type: "get",
    url: `${API_URL}movie/upcoming?api_key=${API_KEY}&page=1&language=id-ID`,
    success: function (resp) {
      let movies = "";
      resp = resp.results;
      for (let i = 0; i < resp.length; i++) {
        if (i > 9) break;
        movies += `
        <div class="swiper-slide card">
          <img src="${"https://image.tmdb.org/t/p/w500/" + resp[i].poster_path}" loading="lazy" alt="${resp[i].title}" />
          <div class="card-body py-1 px-2 bg-dark">
            <h6 class="m-0" style="height:2.5em;overflow:hidden">${resp[i].title}</h6>
          </div>
        </div>`;
      }
      document.querySelector(".upcoming").innerHTML = movies;
    },
  });
  $.ajax({
    type: "get",
    url: `${API_URL}genre/movie/list?api_key=${API_KEY}`,
    success: function (response) {
      console.log(response);
    },
  });
  const swiperCarousel = new Swiper(".carousel-swiper", {
    spaceBetween: 15,
    slidesPerView: 1,
    autoplay: true,
    navigation: {
      nextEl: ".carousel-swiper .slide-next",
      prevEl: ".carousel-swiper .slide-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      // dynamicBullets: true,
    },
  });
  const swiperLatest = new Swiper(".swiper.h-swiper", {
    spaceBetween: 10,
    slidesPerView: "auto",
    freeMode: true,
  });
</script>
<?= $this->endSection() ;?>
