<?= $this->extend('layouts/template') ;?>
<?= $this->section('head') ;?>
<!-- CODE HERE -->
<style>
  .header {
    position: relative;
    display: flex;
    padding: 1rem;
    gap: 1rem;
    aspect-ratio: 16/9;
  }
  .header::before {
    content: "";
    display: block;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: -1;
    opacity: 0.3;
    background: var(--bg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
  .movie-poster {
    height: 100%;
    border-radius: 10px;
    aspect-ratio: 2/3;
  }
</style>
<?= $this->endSection() ;?>
<?= $this->section('content') ;?>
<!-- CODE HERE -->
<div class="header bg-opacity-25" style="--bg: gray">
  <img class="movie-poster placeholder placeholder-wave" />
  <div class="flex-grow-1">
    <h4 class="text-warning movie-title">
      <span class="placeholder-wave placeholder col-12"></span>
      <span class="placeholder-wave placeholder col-8"></span>
    </h4>
    <p class="movie-tagline">
      <span class="placeholder-wave placeholder col-12"></span>
      <span class="placeholder-wave placeholder col-12"></span>
      <span class="placeholder-wave placeholder col-12"></span>
      <span class="placeholder-wave placeholder col-5"></span>
    </p>
  </div>
</div>

<div class="container-fluid">
  <h5 class="mt-3 text-warning">Overview :</h5>
  <p class="movie-overview">
    <span class="placeholder placeholder-wave col-12"></span>
    <span class="placeholder placeholder-wave col-12"></span>
    <span class="placeholder placeholder-wave col-12"></span>
    <span class="placeholder placeholder-wave col-12"></span>
    <span class="placeholder placeholder-wave col-12"></span>
    <span class="placeholder placeholder-wave col-7"></span>
  </p>
</div>
<?= $this->endSection() ;?>

<?= $this->section('script') ;?>
<!-- CODE HERE -->
<script>
  function setHeader() {
    fetch(`${API_URL}movie/<?= $id; ?>?api_key=${API_KEY}`)
      .then((e) => e.json())
      .then((resp) => {
        console.log(resp);
        document.querySelector(".header").innerHTML = `
            <img class="movie-poster" src="https://image.tmdb.org/t/p/w500${resp.poster_path}" alt="" />
            <div>
              <h4 class="text-warning movie-title mb-3">${resp.title}</h4>
              <h6 class="m-0">Release:</h6>
              <div class="mb-1">
                ${resp.release_date}
              </div>
              <h6 class="m-0">Genres:</h6>
              <div class="d-flex flex-wrap movie-genres">
              </div>
            </div>`;
        let genres = "";
        resp.genres.forEach((genre) => {
          genres += ` <a href="#" class="text-decoration-none me-2">${genre.name},</a>`;
        });
        document.querySelector(".header").style = `--bg: url(https://image.tmdb.org/t/p/w500${resp.backdrop_path})`;
        document.querySelector(".movie-genres").innerHTML = genres;
        document.querySelector(".movie-overview").innerHTML = resp.overview;
      });
  }
  setHeader();
</script>
<?= $this->endSection() ;?>
