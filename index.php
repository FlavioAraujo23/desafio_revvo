<?php

require "./db/database.php";
require "./includes/modal.php";


$toast = isset($_COOKIE['toast']) ? json_decode($_COOKIE['toast'], true) : null;
setcookie('toast', '', time() - 3600, '/'); // limpa o cookie
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Desafio Revvo</title>
  <link rel="stylesheet" href="assets/css/styles.css">

  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

</head>

<body>
  <?php include "includes/header.php" ?>
  <?php include "./slides/slide.php" ?>
  <?php include "./cursos/curso.php" ?>
  <?php include "includes/footer.php" ?>
  <script src="./assets/js/modal.js"></script>
  <?php

  $content = '
      <div class="container-modal">
        <img src="/images/modal_image.png" />
        <div class="info-modal">
          <h2>EGESTAS TORTOR VULPUTATE</h2>
          <p>
            Lorem ipsum dolor sit amet. Non dolores molestias et dolore internos nam magni impedit ut labore ratione At iste consequatur! Vel eligendi minus ut eligendi minus et consequatur officiis non repellat ipsum
          </p>
          <a href="#">Acessar</a>
        </div>
      </div>
    ';
  renderModal('welcomeModal', $content);
  ?>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script>
    const toast = <?php echo json_encode($toast, JSON_UNESCAPED_UNICODE); ?>;
    if (toast && toast.text) {
      Toastify({
        text: toast.text,
        duration: toast.duration || 4000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: toast.type === "error" ? "#dc3545" : "#01A02A",
        stopOnFocus: true
      }).showToast();
    }
  </script>
</body>

</html>