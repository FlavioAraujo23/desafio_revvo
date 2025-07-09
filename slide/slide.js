let slideAtual = 0;
const slides = document.querySelectorAll(".slide");
const sliderWrapper = document.getElementById("sliderWrapper");
const bullets = document.querySelectorAll(".bullet");

function atualizaSlider() {
  if (!slides[0]) return;
  const slideWidth = slides[0].offsetWidth;

  sliderWrapper.style.transform = `translateX(-${slideAtual * slideWidth}px)`;

  bullets.forEach((bullet, i) => {
    bullet.classList.toggle("ativo", i === slideAtual);
  });
}

function trocaSlide(direcao) {
  if (direcao === "next" && slideAtual < slides.length - 1) {
    slideAtual++;
  } else if (direcao === "prev" && slideAtual > 0) {
    slideAtual--;
  }
  atualizaSlider();
}

function vaParaOSlide(index) {
  slideAtual = index;
  atualizaSlider();
}

window.addEventListener("load", () => {
  atualizaSlider();
  window.addEventListener("resize", atualizaSlider); // Recalcular ao mudar o tamanho de tela
});
