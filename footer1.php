<!-- Start of Footer  section
        ============================================= -->
<footer class="footer_short theme_crypto padding-t-2 margin-t-10 mt-5">
    <div class="container">
        <div class="row justify-content-md-center text-center">
            <div class="col-md-8">
                <a class="logo c-white" href="index.php">
                    <img src="assets/img/applogoblanco.webp" alt="Dental APP Solutions">
                </a>
                <div class="social--media">
                    <a target="_blank" rel="nofollow" href="https://www.instagram.com/amodosoluciones/" class="btn so-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a target="_blank" rel="nofollow" href="https://twitter.com/amodosoluciones?lang=es" class="btn so-link">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a target="_blank" rel="nofollow" href="https://www.facebook.com/AmodoSoluciones/" class="btn so-link">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
                <div class="other--links">
                    <a href="avisolegal.php">Aviso Legal</a>
                    <a href="protecciondatos.php">Protección de Datos</a>
                    <a href="cookies.php">Cookies</a>
                </div>
                <div class="copyright">
                    <p>
                        © 2021 Dental APP Solutions Todos los derechos reservados
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
</section>
<button data-href="#moove_gdpr_cookie_modal" id="moove_gdpr_save_popup_settings_button" style="display: block; bottom: 20px; left: 20px;" class=" gdpr-floating-button-custom-position">
    <span class="moove_gdpr_icon"><span class="gdpr-icon moovegdpr-advanced"></span></span>
    <span id="configopen" class="moove_gdpr_text">Cambiar la configuración de las cookies</span>
</button>
<!-- End of Footer  section
        ============================================= -->
<?php
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$url = $protocol . $_SERVER['HTTP_HOST'];
$urls = "https://appdental.es/";
$urls_local = "http://localhost:8072/landing-appdental-kitdigital";
?>

<!-- JS library -->
<script src="./assets/js/jquery.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script src="./assets/js/jquery.fancybox.min.js"></script>
<script src="./assets/js/owl.min.js"></script>
<script src="./assets/js/script.min.js"></script>
<script src="./assets/js/jquery.ihavecookies.min.js"></script>
<script src="https://www.googletagmanager.com/gtag/js?id=G-CSEN6LDY2V"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="./sweetalert/dist/sweetalert.min.js"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
</script>
<script type="text/javascript">
    $("#contact_formpresupuesto").submit(function() {

        let $this = $(this);
        if ($this[0][0].value === '' || $this[0][1].value === '' || $this[0][2].value === '') {
            swal("Error", "Por favor rellene los campos marcados", "error");

        } else {
            console.log($this.serialize());
            $.ajax({
                url: 'server/send.php',
                type: "post",
                data: $this.serialize(),
                dataType: 'json',
                beforeSend: function() {
                    swal({
                        title: "Enviando...",
                        text: "Por favor Espera",
                        imageUrl: "./img/logocolor-min.webp",
                        closeOnClickOutside: false,
                        closeOnEsc: false
                    });
                },
                complete: function() {
                    loading = document.querySelector('.loading');
                    loading.classList.remove('show');
                    loading.remove();
                },
                success: function(data, textStatus, jqXHR) {
                    if (data.status == true) {
                        swal("Enviado", data.data, "success");
                        $this[0].reset();
                    } else {
                        swal("Fallo", data.data, "error");
                    }
                }
            })
        }
        return false;
    });
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script>
    function comprobarCookies() {
        if ($.fn.ihavecookies.preference('analiticas') === true) {
            var po = document.createElement('script');
            po.src = 'https://www.googletagmanager.com/gtag/js?id=G-CSEN6LDY2V';
            $('head').append(po);
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-CSEN6LDY2V');
        }
    }
    var options = {
        title: 'Aceptar cookies y política de privacidadd',
        message: 'Este sitio web utiliza cookies para brindarle la mejor experiencia de navegación.Utilizamos cookies propias y de terceros para mejorar nuestros servicios y mostrarle publicidad relacionada con sus preferencias mediante el análisis de sus hábitos de navegación. Puede obtener más información, o bien cambiar su configuración aquí.',
        delay: 600,
        expires: 1,
        link: '/cookies.php',
        onAccept: function() {
            comprobarCookies();
        },
        uncheckBoxes: false,
        acceptBtnLabel: 'Acepto Cookies',
        moreInfoLabel: 'Más información',
        cookieTypesTitle: 'Seleccione las cookies que desea aceptar',
        advancedBtnLabel: 'Escoge Cookies',
        fixedCookieTypeLabel: 'Cookies funcionales',
        fixedCookieTypeDesc: 'Las cookies funcionales son estrictamente necesarias para proporcionar los servicios de la tienda, así como para su correcto funcionamiento, por ello no es posible rechazar su uso. Permiten al usuario la navegación a través de nuestra web y la utilización de las diferentes opciones o servicios que existen en ella.',
        cookieTypes: [{
                type: 'Cookies analíticas',
                value: 'analiticas',
                description: 'Recopilan información sobre la experiencia de navegación del usuario en la tienda, normalmente de forma anónima, aunque en ocasiones también permiten identificar de manera única e inequívoca al usuario con el fin de obtener informes sobre los intereses de los usuarios en los productos o servicios que ofrece la tienda.'
            },
            {
                type: 'Cookies publicitarias',
                value: 'publicitarias',
                description: 'Son aquellas que recaban información sobre los anuncios mostrados a los usuarios del sitio web. Pueden ser de anónimas, si solo recopilan información sobre los espacios publicitarios mostrados sin identificar al usuario o, personalizadas, si recopilan información personal del usuario de la tienda por parte de un tercero, para la personalización de dichos espacios publicitarios.'
            },
            {
                type: 'Cookies de rendimiento',
                value: 'rendimiento',
                description: 'Se usan para mejorar la experiencia de navegación y optimizar el funcionamiento de la tienda.'
            },
        ],
    }

    if (document.addEventListener) {
        window.addEventListener('load', comprobarCookies(), false);
        $('body').ihavecookies(options);
    }

    $(document).ready(function() {
        comprobarCookies();
        $('#ihavecookiesBtn').on('click', function() {
            $('body').ihavecookies(options, 'reinit');
        });

        $('#configopen').on('click', function() {
            $('body').ihavecookies(options, 'reinit');
        });
    });
</script>

</body>

</html>