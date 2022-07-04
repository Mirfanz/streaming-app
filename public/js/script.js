const toastContainer = document.querySelector(".toast-container");
function showToast(data = {}) {
  if (!data.body) return;
  const elem = document.createElement("div");
  elem.classList.add("toast");
  elem.setAttribute("role", "alert");
  elem.ariaLive = "assertive";
  elem.ariaAtomic = "true";
  elem.innerHTML = `
  <div class="toast-header">
    <img src="${data.icon ? data.icon : "/favicon.ico"}" class="rounded me-2" style="height:1em"/>
    <strong class="me-auto">${data.title ? data.title : APP_NAME}</strong>
    <small class="text-muted">${data.subtitle ? data.subtitle : ""}</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">${data.body ? data.body : "pesan"}</div>
  `;
  toastContainer.appendChild(elem);
  const toast = new bootstrap.Toast(elem);
  elem.addEventListener("hidden.bs.toast", () => elem.remove());
  toast.show();
}

function errFitur() {
  swal({
    icon: "warning",
    title: "Maafin Aku!",
    text: "Fitur belum jadi, sabar ya  .>_<.",
    button: false,
  });
}

// ===========================================================================================================

if (navigator.connection)
  navigator.connection.onchange = () => {
    if (navigator.onLine) showToast({ body: "Anda kembali <strong>Online</strong> ." });
    else showToast({ body: "Anda sedang Offline" });
  };

// ===========================================================================================================

(function () {
  let oldY = 0;
  const navbar = document.querySelector("nav.navbar");
  const btnToTop = document.querySelector(".btn-to-top");
  document.body.onscroll = (e) => {
    const newY = $(e.target).scrollTop();
    if (newY > oldY) navbar.classList.add("hide");
    else navbar.classList.remove("hide");
    if (newY > window.innerHeight / 2) btnToTop.classList.add("show");
    else btnToTop.classList.remove("show");
    oldY = newY;
  };
})();

(function () {
  const navSearch = new bootstrap.Collapse("#navsearch");
  const inpSearch = document.querySelector(".input-search");
  const btnSearch = document.querySelector(".btn-search");
  inpSearch.onfocus = callback;
  inpSearch.oninput = callback;
  function callback(e) {
    if (inpSearch.value !== "") {
      btnSearch.setAttribute("type", "submit");
      btnSearch.classList.replace("text-light", "text-primary");
    } else {
      btnSearch.setAttribute("type", "button");
      btnSearch.classList.replace("text-primary", "text-light");
    }
  }
  btnSearch.onclick = (e) => {
    if (btnSearch.getAttribute("type") !== "submit") {
      navSearch.toggle();
    }
  };
  navSearch.addEventListener("collapse.bs.shown", () => {
    inpSearch.focus();
  });
})();
