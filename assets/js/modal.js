document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".open-modal").forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const id = this.dataset.target;
      const modal = document.getElementById(id);

      if (modal) {
        modal.style.display = "flex";
      } else {
        console.error(" Modal com ID '" + id + "' não encontrado.");
      }
    });
  });

  document.querySelectorAll(".close-modal").forEach((btn) => {
    btn.addEventListener("click", function () {
      const id = this.dataset.target;
      document.getElementById(id).style.display = "none";
    });
  });
});

document.addEventListener("click", function (e) {
  if (e.target.classList.contains("modal")) {
    e.target.style.display = "none";
  }
});
