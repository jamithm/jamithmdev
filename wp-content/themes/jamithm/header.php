<?php
	/**
	 * The header for our theme
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package jamithm
	 */

	$home = home();

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<!-- Favicons -->
	<link href="assets/img/favicon.png" rel="icon">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!-- Vendor CSS Files -->
	<link href="<?= bloginfo('template_url') ?>/assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="<?= bloginfo('template_url') ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= bloginfo('template_url') ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="<?= bloginfo('template_url') ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="<?= bloginfo('template_url') ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="<?= bloginfo('template_url') ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= bloginfo('template_url') ?>/assets/css/main.css">

    <!--<script type="text/javascript">
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "knx0ynbx2j");
    </script>-->
    	
</head>

<body>
<?php wp_body_open(); ?>

	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top ">
		<!--<video src="https://carontestudio.com/img/f4.mp4" autoplay="true" muted="true" loop="true" poster="https://carontestudio.com/img/contacto.jpg"></video>-->
		<div class="container d-flex align-items-center justify-content-between">
			<h1 class="logo"><a href="<?= bloginfo('url') ?>">&lt;/&gt;	JMERCADO</a></h1>
			<!-- Uncomment below if you prefer to use an image logo -->
			<!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
			<nav id="navbar" class="navbar">
				<ul>
					<li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
					<li><a class="nav-link scrollto" href="#about">Sobre mí</a></li>
					<li><a class="nav-link scrollto" href="#services">Servicios</a></li>
					<li><a class="nav-link scrollto" href="#portfolio">Portafolio</a></li>
					<li><a class="nav-link scrollto" href="#skill">Habilidades</a></li>
					<li><a class="nav-link scrollto" href="#blog">Blog</a></li>
					<li><a class="nav-link scrollto" href="#contact">Contacto</a></li>
					<!--<li><a class="getstarted scrollto" target="_blank" href="<?= bloginfo('url') ?>/wp-admin">Administrar</a></li>
					<?php echo do_shortcode( '[gtranslate]' ); ?>-->
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->
		</div>
	</header><!-- End Header -->

<div>
