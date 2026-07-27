<?php
	/**
	 * The main template file
	 *
	 * This is the most generic template file in a WordPress theme
	 * and one of the two required files for a theme (the other being style.css).
	 * It is used to display a page when nothing more specific matches a query.
	 * E.g., it puts together the home page when no home.php file exists.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package jamithm
	 */

	$home = home();
	$listAllBlogs = listAllBlogs();
	$listAllPortfolios = listAllPortfolios();
	$listAllCategoriesPortfolio = listAllCategoriesPortfolio();

	get_header();

?>


	<!-- ======= Hero Section ======= -->
	<section id="hero" class="d-flex align-items-center">
		<div class="container-fluid" data-aos="fade-up">
			<div class="row justify-content-center">
				<div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
					<h1>Ing. Jamith Mercado</h1>
					<h2>Full Stack Developer Web & Mobile</h2>
					<br>
					<div>
						<div class="social-links text-md-left pt-3 pt-md-0">
							<?php foreach($home['banners'][0]['redes_sociales'] as $keySocial => $valueSocial) { ?>
								<a href="<?= $valueSocial['enlace']; ?>" class="<?= $valueSocial['titulo']; ?>"><i class="<?= $valueSocial['icono']; ?>"></i></a>
							<?php } ?>
						</div>
						<a href="#portfolio" class="btn-get-started scrollto">Conoce mi portfolio</a></div>
					</div>
					<div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
					<img src="<?= bloginfo('template_url') ?>/assets/img/hero-img.png" class="img-fluid animated" alt="">
				</div>
			</div>
		</di>
	</section><!-- End Hero -->
	
	<!-- ======= About Section ======= -->
	<section id="about" class="about">
    	<div class="container">
			<div class="row">	
				<div class="col-lg-6 pt-4 pt-lg-0 order-1 order-lg-2 content" data-aos="fade-right">
					<h2><?= $home['titulo_sobre_mi']; ?></h2>
					<p><?= $home['sub_titulo_sobre_mi']; ?></p>
					<?= $home['contenido_sobre_mi']; ?>
					<!--<ul>
						<li><i class="bi bi-check-circle"></i> Ingeniero en Informática.</li>
						<li><i class="bi bi-check-circle"></i> 10 Años de experiencia en el desarrollo web.</li>
						<li><i class="bi bi-check-circle"></i> 5 Años en el desarrollo movil.</li>
						<li><i class="bi bi-check-circle"></i> Backend - Desarrollo a la medida.</li>
						<li><i class="bi bi-check-circle"></i> Frontend - Desarrollo a la medida.</li>
						<li><i class="bi bi-check-circle"></i> Implementación de Web services y API.</li>
						<li><i class="bi bi-check-circle"></i> Proactivo y creatividad 100%.</li>
					</ul>-->
          			<br><br>
					<a target="_blank" href="https://www.linkedin.com/in/jamith-mercado/" class="read-more">Descargar CV</a>
				</div>
				<br><br>
				<div class="col-lg-6 order-1 order-lg-2 about-img" data-aos="zoom-in" data-aos-delay="150">
					<img loading="lazy" src="<?= $home['imagen_sobre_mi']; ?>" alt="<?= $home['imagen_sobre_mi']; ?>">
				</div>

			</div>
		</div>
  	</section><!-- End About Section -->

	<!-- ======= Services Section ======= -->
	<section id="services" class="services section-bg">
      	<div class="container" data-aos="fade-up">
			<div class="section-title">
				<h2><?= $home['titulo_servicio']; ?></h2>
				<p><?= $home['sub_titulo_servicio']; ?></p>
			</div>
			<div class="row gy-4">
				<?php foreach ($home['servicios'] as $key => $value) { ?>
					<div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
						<div class="icon-box iconbox-blue">
						<div class="icon">
							<svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
							<path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
							</svg>
							<i class='<?= $value['icono']; ?>'></i>
						</div>
						<h4><?= $value['titulo']; ?></h4>
						<p><?= $value['sub_titulo']; ?></p>
						</div>
					</div>
				<?php } ?>
			</div>
      	</div>
    </section><!-- End Services Section -->

	<!-- ======= Portfolio Section ======= -->
	<section id="portfolio" class="portfolio">
      	<div class="container" data-aos="zoom-in" data-aos-delay="150">
			<div class="section-title">
				<h2><?= $home['titulo_portafolio']; ?></h2>
				<p><?= $home['sub_titulo_portafolio']; ?></p>
			</div>
        	<div class="row">
				<div class="col-lg-12 d-flex justify-content-center">
					<ul id="portfolio-flters">
						<li data-filter="*" class="filter-active">Todos</li>
						<?php foreach ($listAllCategoriesPortfolio as $key => $value) { ?>
							<li data-filter=".filter-<?= $value['slug']; ?>"><?= $value['name']; ?></li>
						<?php } ?>
					</ul>
				</div>
        	</div>
			<div class="row portfolio-container">
				<?php foreach ($listAllPortfolios as $key => $value) { ?>
					<div class="col-lg-4 col-md-6 portfolio-item filter-<?= $value['class_categories']; ?>">
						<div class="portfolio-wrap">
							<img loading="lazy" src="<?= $value['image']; ?>" class="img-fluid" alt="<?= $value['image']; ?>">
							<div class="portfolio-info">
								<h4><?= $value['title']; ?></h4>
								<p><?= $value['title']; ?></p>
							</div>
							<div class="portfolio-links">
								<a href="<?= $value['image']; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?= $value['title']; ?>"><i class="bx bx-plus"></i></a>
								<a target="_blank" href="<?= $value['link_page']; ?>" title="Más Detalle"><i class="bx bx-link"></i></a>
							</div>
						</div>
					</div>
				<?php } ?> 
        	</div>
      	</div>
    </section><!-- End Portfolio Section -->

	<!-- ======= Skill Section =======-->
	<section id="skill">
		<div class="section-title" data-aos="zoom-in" data-aos-delay="150">
		  <h2><?= $home['titulo_habilidad']; ?></h2>
		  <p><?= $home['sub_titulo_habilidad']; ?></p>
		</div>
		<div class="container" data-aos="zoom-in" data-aos-delay="150">
		  <div class="row">
			  <?php foreach ($home['habilidades'] as $key => $value) { ?>
				<div class="col-12 col-lg-6">
					<div class="progress-title">
					  <h3><?= $value['titulo']; ?></h3>
					  <div class="progress">
						<div class="progress-bar" style="width: <?= $value['porcentaje']; ?>; background:#0ef" >
						  <div class="progress-value">
							<?= $value['porcentaje']; ?>
						  </div>
						</div>
					  </div>
					</div>
				</div>
			<?php } ?>
		  </div>
		</div>
	</section><!-- End Skill Section -->

	<!-- ======= Blog Section ======= -->
	<section id="blog" class="section">
      <div class="container">
        <div class="section-title">
          <h2><?= $home['titulo_blog']; ?></h2>
          <p><?= $home['sub_titulo_blog']; ?></p>
        </div>
        <div class="row align-items-stretch retro-layout">
          <div class="col-md-4">
            <a href="<?= $listAllBlogs[0]['link']; ?>" class="h-entry mb-30 v-height gradient">
              <div class="featured-img" style="background-image: url('<?= $listAllBlogs[0]['image'] ?>');"></div>
              <div class="text">
                <span class="date"><?= $listAllBlogs[0]['date'] ?></span>
                <h2><?= $listAllBlogs[0]['title'] ?></h2>
              </div>
            </a>
            <a href="<?= $listAllBlogs[1]['link']; ?>" class="h-entry v-height gradient">
              <div class="featured-img" style="background-image: url('<?= $listAllBlogs[1]['image'] ?>');"></div>
              <div class="text">
                <span class="date"><?= $listAllBlogs[1]['date'] ?></span>
                <h2><?= $listAllBlogs[1]['title'] ?></h2>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="<?= $listAllBlogs[2]['link']; ?>" class="h-entry img-5 h-100 gradient">
              <div class="featured-img" style="background-image: url('<?= $listAllBlogs[2]['image'] ?>');"></div>
              <div class="text">
                <span class="date"><?= $listAllBlogs[2]['date'] ?></span>
                <h2><?= $listAllBlogs[2]['title'] ?></h2>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="<?= $listAllBlogs[3]['link']; ?>" class="h-entry mb-30 v-height gradient">
              <div class="featured-img" style="background-image: url('<?= $listAllBlogs[3]['image'] ?>');"></div>
              <div class="text">
                <span class="date"><?= $listAllBlogs[3]['date'] ?></span>
                <h2><?= $listAllBlogs[3]['title'] ?></h2>
              </div>
            </a>
            <a href="<?= $listAllBlogs[4]['link']; ?>" class="h-entry v-height gradient">
              <div class="featured-img" style="background-image: url('<?= $listAllBlogs[4]['image'] ?>');"></div>
              <div class="text">
                <span class="date"><?= $listAllBlogs[4]['date'] ?></span>
                <h2><?= $listAllBlogs[4]['title'] ?></h2>
              </div>
            </a>
          </div>

        </div>
      </div>
    </section><!-- End Blog Section -->

	<!-- ======= Contact Section ======= -->
	<section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2><?= $home['titulo_contacto']; ?></h2>
          <p><?= $home['sub_titulo_contacto']; ?></p>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Dirección</h3>
              <p><?= $home['direccion_contacto']; ?></p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email</h3>
              <p><?= $home['email_contacto']; ?></p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Llamanos</h3>
              <p><?= $home['telefono_contacto']; ?></p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 ">
            <!--<iframe class="mb-4 mb-lg-0" src="<?= $home['mapa_contacto']; ?>" frameborder="0" style="border:1px solid #0ef; box-shadow: 1px 1px 20px #012298f7; border-radius: 20px; width: 100%; height: 380px;" allowfullscreen></iframe>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254508.51141489705!2d-74.082599028052!3d4.756031001339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9bfd2da6cb29%3A0x239d635520a33914!2zQm9nb3TDoQ!5e0!3m2!1ses-419!2sco!4v1718405982676!5m2!1ses-419!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
            <div id="map"></div>
          </div>
          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Ingrese su nombre" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Ingrese el asunto" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Ingrese su mensaje" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Cargando</div>
                <div class="error-message"></div>
                <div class="sent-message">Su mensaje fue enviado. Gracias pornto nos pondremos en contacto.</div>
              </div>
              <div class="text-center"><button type="submit">Enviar mensaje</button></div>
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->
    
	<script type="text/javascript"> 

		function initMap()
		{
			var coordenadas = {lat: 4.756031001339, lng: -74.082599028052};
			var mapa = new google.maps.Map(
				document.getElementById('map'),{ 
					zoom: 4, 
					center: coordenadas
				}
			);
			var marker = new google.maps.Marker({
				position: coordenadas, map: mapa
			});
		}

	</script>

	<script src="https://maps.google.com/maps/api/js?key=AIzaSyDtwyo-LlAuw9Yco22QG5oSWQP7U-gJP04&callback=initMap" async defer></script> 

<?php
get_footer();
