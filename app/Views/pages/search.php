<?= $this->extend('layouts/template') ;?>
<?= $this->section('head') ;?>
<style>
  .results .card {
    width: 130px;
    background-color: var(--secondary) !important;
    border-radius: 5px;
    overflow: hidden;
  }
  .results .card img {
    width: 100%;
    aspect-ratio: 3/4;
  }
  @media only screen and (max-width: 576px) {
    .results .card {
      width: 45%;
    }
  }
</style>
<?= $this->endSection() ;?>

<?= $this->section('content') ;?>
<div class="container-fluid">
  <div class="text-success bg-success bg-opacity-10 p-2 px-3 m-3 rounded" style="border: 1px solid">obtained <span class="total-result">0</span> movies from keyword "<?= $query; ?>"</div>
  <div class="d-flex flex-wrap gap-1 justify-content-center results"></div>
</div>

<?= $this->endSection() ;?>

<?= $this->section('script') ;?>
<script>
  let totPages, curPage, totRsults;
  const results = document.querySelector(".results");
  $.ajax({
    type: "get",
    url: `${API_URL}search/movie?api_key=${API_KEY}&query=<?= $query; ?>`,
    success: function (resp) {
      curPage = resp.page;
      totPages = resp.total_pages;
      totResults = resp.total_results;
      $(".total-result");
      resp = resp.results;
      resp.forEach((movie) => {
        const elem = document.createElement("div");
        elem.classList.add("card", "p-0");

        elem.innerHTML = `
          <img src="${"https://image.tmdb.org/t/p/w500/" + movie.poster_path}" loading="lazy" alt="${movie.title}" />
          <div class="card-body py-1 px-2 bg-dark">
            <h6 class="m-0" style="height:2.5em;overflow:hidden">${movie.title}</h6>
          </div>`;
        results.appendChild(elem);
      });
    },
  });
</script>
<?= $this->endSection() ;?>
