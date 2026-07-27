<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jamithm
 */

?>

</div><!-- #page -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

      <div class="footer-top">
        <div class="container">
          <div class="row">

            <div class="col-lg-3 col-md-6 footer-contact">
              <h3>&lt;/&gt; JMERCADO</h3>
              <p>
                CR 46 3D 53 Villa Yaneth<br> 
                Valledupar, Cesar<br>
                Colombia <br><br>
                <strong>Celular:</strong> +57 313 8076 287<br>
                <strong>Email:</strong> mercadojamith@gmail.com<br>
              </p>
            </div>

            <div class="col-lg-2 col-md-6 footer-links">
              <h4>Enlaces de Interes</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Inicio</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Sobre mi</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Servicios</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Terminos de servicios</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Politicas de privacidad</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Mis Servicios</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Desarrollo Web</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Desarrollo de Wordpress</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Desarrollo de Tienda</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Desarrollo Movil</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Alogamiento Web</a></li>
              </ul>
            </div>

            <div class="col-lg-4 col-md-6 footer-newsletter">
              <h4>Unete a nuestro Newsletter</h4>
              <p>Si quieres recibir información de las novedades suscribete</p>
              <form action="" method="post">
                <input type="email" name="email"><input type="submit" value="Subscribe">
              </form>
            </div>

          </div>
        </div>
      </div>

      <div class="container">

        <div class="copyright-wrap d-md-flex py-4">
          <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
              &copy; Copyright <strong><span>JMERCADO</span></strong>. All Rights Reserved - <?= date('Y') ?>
            </div>
            <div class="credits">
              Diseñado por <a href="<?= bloginfo('url') ?>">&lt;/&gt; JMERCADO</a>
            </div>
          </div>
          <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
        </div>

      </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!--<div id="overlay">
      <div class="spinner">
        <div class="ring"></div>
        <div class="ring"></div>
        <div class="ring"></div>
        <span>Loading...</span>
      </div>
    </div>-->

    <!--<script src="https://unpkg.com/typed.js@2.0.15/dist/typed.umd.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <!-- Vendor JS Files -->
    <script src="<?= bloginfo('template_url') ?>/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= bloginfo('template_url') ?>/assets/vendor/aos/aos.js"></script>
    <script src="<?= bloginfo('template_url') ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= bloginfo('template_url') ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= bloginfo('template_url') ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= bloginfo('template_url') ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= bloginfo('template_url') ?>/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= bloginfo('template_url') ?>/assets/js/main.js"></script>

<?php wp_footer(); ?>

</body>
</html>
