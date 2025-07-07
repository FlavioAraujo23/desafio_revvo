<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio Revvo</title>
    <link rel="stylesheet" href="assets/css/footer.css">
</head>

<body>
    <footer>
        <section class="wrapper-footer d-flex">
            <div class="footer-column d-flex">
                <img src="./images/Logo_footer_leo.png" alt="Logo Leo" width="120" height="60">
                <p class="text">Lorem ipsum dolor sit amet. A neque commodi eos cumque consequuntur ad aperiam autem rem
                    inventore minus cum cumque sunt et culpa voluptas. </p>
            </div>
            <div class="d-flex info-section">
                <div class="footer-column">
                    <h2 class="footer-title">// Contato</h2>
                    <p class="text-info">(21) 98765-3434</p>
                    <p class="text-info">contato@leolearning.com</p>
                </div>

                <div class="footer-column d-flex">
                    <h2 class="footer-title">// Redes sociais</h2>
                    <div class="socials d-flex">
                        <a href="" class="d-flex"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="" class="d-flex"><i class="fa-brands fa-youtube"></i></a>
                        <a href="" class="d-flex"><i class="fa-brands fa-pinterest-p"></i></a>
                    </div>

                </div>
            </div>
        </section>
        <section class="copy">
            <p>Copyright <?= date("Y") ?> - All right reserved</p>
        </section>
    </footer>
</body>

</html>