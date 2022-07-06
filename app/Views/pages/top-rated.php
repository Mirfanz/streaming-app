<?= $this->extend('layouts/template') ;?>
<?= $this->section('head') ;?>
<style>
  .results .card {
    width: 130px;
    background-color: var(--secondary) !important;
    border-radius: 5px;
    overflow: hidden;
    text-decoration: none;
  }
  .results .card img {
    width: 100%;
    aspect-ratio: 3/4;
  }
  @media only screen and (max-width: 576px) {
    .results .card {
      width: calc(50% - 0.5rem);
    }
  }
</style>
<?= $this->endSection() ;?>
<?= $this->section('content') ;?>
<div class="container-fluid pt-2">
  <div class="d-flex flex-wrap gap-1 justify-content-center results">
    <?php for($i = 0 ; $i < 10; $i++): ?>
    <div class="card p-0">
      <img class="placeholder placeholder-wave" />
      <div class="card-body py-1 px-2 bg-dark placeholder placeholder-wave">
        <h6 class="m-0">
          <span class="placeholder-glow placeholder col-12"></span>
          <span class="placeholder-glow placeholder col-8"></span>
        </h6>
      </div>
    </div>
    <?php endfor; ?>
  </div>
  <div class="d-flex justify-content-center my-3">
    <button class="btn btn-primary mx-auto btn-load-more">Load More</button>
  </div>
</div>
<?= $this->endSection() ;?>
<?= $this->section('script') ;?>
<script>
  let totPages,
    curPage = 0,
    totRsults;
  const results = document.querySelector(".results");
  const btnLoadMore = document.querySelector(".btn-load-more");
  function getResult(e) {
    $.ajax({
      type: "get",
      url: `${API_URL}movie/top_rated?api_key=${API_KEY}&query=<?= $query; ?>&page=${curPage + 1}`,
      success: function (resp) {
        console.log(resp);
        curPage = resp.page;
        totPages = resp.total_pages;
        totResults = resp.total_results;
        if (curPage === 1) results.innerHTML = "";
        $(".total-result");
        resp = resp.results;
        resp.forEach((movie) => {
          const elem = document.createElement("a");
          elem.classList.add("card", "p-0");
          elem.href = `<?= base_url("/detail-movie"); ?>/${movie.id}`;
          elem.innerHTML = `
          <img src="${"https://image.tmdb.org/t/p/w500/" + movie.poster_path}" loading="lazy" alt="${movie.title}" />
          <div class="card-body py-1 px-2 bg-dark">
            <h6 class="m-0" style="height:2.5em;overflow:hidden">${movie.title}</h6>
          </div>`;
          results.appendChild(elem);
        });
        if (curPage >= totPages) return btnLoadMore.remove();
      },
    });
  }
  getResult();
  btnLoadMore.onclick = getResult;
</script>
<?= $this->endSection() ;?>
