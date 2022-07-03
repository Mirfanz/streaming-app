<style>
  #modalDetail .swiper {
    max-width: 80%;
    width: 80vmin;
    overflow: visible;
  }
  #modalDetail .swiper-slide {
    position: unset;
    width: 100%;
    aspect-ratio: 1/1;
    transition: 500ms;
  }
  #modalDetail .swiper-slide img {
    width: 100%;
    aspect-ratio: 1/1;
    border-radius: 15px;
  }
  #modalDetail .swiper-slide-active {
    transform: scale(1.1) !important;
  }
  #modalDetail .swiper-pagination {
    bottom: -1rem !important;
  }
</style>
<div class="modal fade" data-brg-id="3" data-likes="45" data-username="" id="modalDetail" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
    <div class="modal-content" style="height: 100vh !important;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="bodyDetail" style="overflow-x: hidden">
        <section class="text-center text-shadow-2" id="data" data-id="58">
          <div class="py-2 fs-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
          <div class="text-primary pb-4 fw-bolder">Rp<span class="fs-2">150000</span></div>
          <div class="swiper my-3 my-sm-4 my-lg-5">
            <div class="swiper-wrapper" id="swiperDetail">
              <?php for ($i=0; $i < 7; $i++):?>
              <div class="swiper-slide">
                <img class="shadow-lg" src="/assets/img/thumbnail/wp2665733.jpg" alt="" />
              </div>
              <?php endfor; ?>
            </div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="text-center">
            <small>
              <span>43</span>
              dilihat |
              <span id="countLikes">32</span>
              suka | 25 Mei 2022
            </small>
          </div>
        </section>
        <section class="px-2 my-3 py-1 d-flex gap-2 align-items-center" style="border: 0 solid lightgrey; border-bottom-width: 1px; border-top-width: 1px">
          <img class="rounded-circle shadow-sm" style="width: 3rem; aspect-ratio: 1/1" src="/assets/img/profile/no-photo.jpg" alt="" />
          <div class="text-truncate">
            <div class="fw-bold">Muhammad Irfan</div>
            <small class="opacity-50">Lorem ipsum dolor sit amet.</small>
          </div>
          <a class="btn btn-sm btn-outline-primary ms-auto" href="/manusia/user">kunjungi</a>
        </section>
        <section class="description">
          <h2 class="text-center">DESKRIPSI PRODUK</h2>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. A nemo corporis porro libero quia est nobis alias asperiores ea pariatur nisi debitis fugit quidem eligendi ducimus quos, veritatis animi voluptatum! Et, non officia
            vitae aspernatur possimus officiis enim accusamus nihil neque adipisci commodi, cumque quidem, facilis repellendus amet? Possimus deleniti fuga enim asperiores porro explicabo, mollitia maxime expedita minus perspiciatis labore
            quaerat tenetur illo aut dolores at quibusdam unde aperiam! Consectetur est expedita impedit autem, inventore illum delectus perferendis ut nam ipsam? Vero rerum reprehenderit deserunt, saepe odio ab amet voluptate ratione omnis
            commodi placeat! Perferendis similique cumque provident laboriosam.
          </p>
        </section>
      </div>
      <div class="modal-footer py-1">
        <button class="btn bg-transparent btn-light" id="btnLike" data-count=""><i class="bx bx-heart"></i></button>
        <button class="btn bg-transparent btn-light" id="btnAddCart"><i class="bx bx-cart-add"></i></button>
        <button class="btn btn-primary flex-grow-1">Beli Sekarang</button>
        <button class="btn bg-transparent btn-light" id="btnShare"><i class="bx bx-share-alt"></i></button>
      </div>
    </div>
  </div>
</div>