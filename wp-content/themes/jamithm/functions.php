<?php

include(dirname(__FILE__) . '/services-app.php');

// ========== Google reCAPTCHA v2 para el formulario de contacto ==========
define('RECAPTCHA_SITE_KEY', '6Lc3xjIrAAAAALnXSJN2-bJe3TiNo0525wk4GxHr');
define('RECAPTCHA_SECRET_KEY', '6Lc3xjIrAAAAAOhxYO-ojHrLsan_amtgAEWAP-Jw');

// Agrega el script de reCAPTCHA en el frontend (ajusta el hook según tu formulario)
add_action('wp_footer', function() {
	if (is_page() || is_single()) { // O ajusta la condición según donde esté tu formulario
		echo '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';
	}
});

/**
 * jamithm functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package jamithm
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jamithm_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on jamithm, use a find and replace
		* to change 'jamithm' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'jamithm', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'jamithm' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'jamithm_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'jamithm_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jamithm_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jamithm_content_width', 640 );
}
add_action( 'after_setup_theme', 'jamithm_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jamithm_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'jamithm' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'jamithm' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'jamithm_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jamithm_scripts() {
	wp_enqueue_style( 'jamithm-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'jamithm-style', 'rtl', 'replace' );

	wp_enqueue_script( 'jamithm-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jamithm_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/////////////////////////// DESARROLLO A LA MEDIDA //////////////////////////////////////
/////////////////////////// 17 DE JUNIO DEL 2023   //////////////////////////////////////

/**
 * function returnJson
 * 
 * Permite arman un Json para la respuesta 
 * 
 * @param $val bolean 
 * @param $datos array
 * @param $msg string
 * 
 * @autor: Jamith Mercado <mercadojamith@gmail.com>
 * 
 * @return array json 
 * 
 */
function returnJson($val = false, $datos = [], $msj = ''){
	die(json_encode(['res' => $val, 'dataObj' => $datos, 'msg' => $msj]));
}

/**
 * function ajaxUser
 * 
 * @autor: Jamith Mercado <mercadojamith@gmail.com>
 * 
 */
function ajaxUser($fn)
{
	header('Access-Control-Allow-Origin: *');
	header('Content-type: application/json');
	header('content-type: application/json; charset=utf-8');
	header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Allow: GET, POST, OPTIONS, PUT, DELETE");
	header('Access-Control-Allow-Credentials: true');
	header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"');
	call_user_func($fn);
	die();	
}

/**
 * function endWordpress
 * 
 * @autor: Jamith Mercado <mercadojamith@gmail.com>
 * 
 */
function endWordpress(){
	if (isset($_POST['objAjax']) || isset($_GET['objAjax'])) {
		$param = !empty($_GET['objAjax']) ? $_GET['objAjax'] : $_POST['objAjax'];
		ajaxUser($param);
	}
}
add_action('wp_loaded', 'endWordpress');

/**
 * function geTumbnail
 * 
 * Permite retornar la imagen
 * 
 * @param $postid 
 * 
 * @autor: Jamith Mercado <mercadojamith@gmail.com>
 * 
 * @return imagen destacada 
 */
function geTumbnail($postid = false)
{
	global $post;
	if (!$postid) {
		$postid = $post->ID;
	}
	$thumbID = get_post_thumbnail_id($postid);
	$imgDestacada = wp_get_attachment_image_src($thumbID, 'full');
	return isset($imgDestacada[0]) ? $imgDestacada[0] : '';
} 

/**
 * function home
 * 
 * Permite obtener la informacion de la pagina principal
 * 
 * @autor: Jamith Mercado <mercadojamith@gmail.com>
 * 
 * @return array 
 */
function home()
{
	$result = [];
	$id = 84;
	$result['banners'] = get_field('banners', $id);
	$result['titulo_sobre_mi'] = get_field('titulo_sobre_mi', $id);
	$result['sub_titulo_sobre_mi'] = get_field('sub_titulo_sobre_mi', $id);
	$result['contenido_sobre_mi'] = get_field('contenido_sobre_mi', $id);
	$result['enlace_sobre_mi'] = get_field('enlace_sobre_mi', $id);
	$result['imagen_sobre_mi'] = get_field('imagen_sobre_mi', $id);
	$result['titulo_servicio'] = get_field('titulo_servicio', $id);
	$result['titulo_servicio'] = get_field('titulo_servicio', $id);
	$result['sub_titulo_servicio'] = get_field('sub_titulo_servicio', $id);
	$result['servicios'] = get_field('servicios', $id);
	$result['titulo_portafolio'] = get_field('titulo_portafolio', $id);
	$result['sub_titulo_portafolio'] = get_field('sub_titulo_portafolio', $id);
	$result['titulo_habilidad'] = get_field('titulo_habilidad', $id);
	$result['sub_titulo_habilidad'] = get_field('sub_titulo_habilidad', $id);
	$result['habilidades'] = get_field('habilidades', $id);
	$result['titulo_blog'] = get_field('titulo_blog', $id);
	$result['sub_titulo_blog'] = get_field('sub_titulo_blog', $id);
	$result['titulo_contacto'] = get_field('titulo_contacto', $id);
	$result['sub_titulo_contacto'] = get_field('sub_titulo_contacto', $id);
	$result['direccion_contacto'] = get_field('direccion_contacto', $id);
	$result['email_contacto'] = get_field('email_contacto', $id);
	$result['telefono_contacto'] = get_field('telefono_contacto', $id);
	$result['mapa_contacto'] = get_field('mapa_contacto', $id);
	return $result;
	//returnJson(true, $result, '');
}

/**
 * function listAllBlogs
 * 
 * Permite listar todos los blogs
 * 
 * @autor: Jamith Mercado <mercadojamith@gmail.com>
 * 
 * @return array 
 */
function listAllBlogs()
{
	$result = [];
    $post = [
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
		'order' => 'DESC',
		'orderby' => 'id',
	];
    $my_query = NULL;
    $i = 0;
    $my_query = new WP_Query($post);
    if ($my_query->have_posts()) {
        while ($my_query->have_posts()): $my_query->the_post();
			$result[$i]['id'] = get_the_ID();
			$result[$i]['title'] = get_the_title();
			$result[$i]['content'] = get_the_content();
			$result[$i]['extract'] = get_the_excerpt();
			$result[$i]['image'] = geTumbnail(); 
			$result[$i]['type'] = get_post_type();
			$result[$i]['categories'] = get_categories();
			$result[$i]['date'] = get_the_date();
			$result[$i]['author'] = get_the_author();
			$result[$i]['link'] = get_the_permalink();
			$i++;
        endwhile;
    }
    wp_reset_query();
	return $result;
}

/**
 * function listCategoriesPortfolio
 * Permite listar todas las categorias de portafolios
 * 
 * @autor: Jamith Mercado <mercadojamith@gmail.com>
 * 
 * @return array 
 * 
 */
function listAllCategoriesPortfolio()
{
	$categories = get_categories( [
		'taxonomy'     => 'categoria-portafolio',
		'type'         => 'portafolios',
		'child_of'     => 0,
		'parent'       => '',
		'orderby'      => 'name',
		'order'        => 'ASC',
		'hide_empty'   => 0,
		'hierarchical' => 1,
		'exclude'      => '',
		'include'      => '',
		'number'       => 0,
		'pad_counts'   => false,
	] );
	$categories = json_decode( json_encode( $categories ), true );
	return $categories;
}

/**
 * function listPortfolios
 * Permite listar todos los portafolios
 * 
 * @autor: Jamith Mercado <mercadojamith@gmail.com>
 * 
 * @return array 
 * 
 */
function listAllPortfolios()
{
	$result = [];
    $post = [
        'post_type' => 'portafolios',
        'post_status' => 'publish',
        'posts_per_page' => -1,
		'order' => 'DESC',
		'orderby' => 'id',
	];
    $my_query = NULL;
    $i = 0;
    $my_query = new WP_Query($post);
    if ($my_query->have_posts()) {
        while ($my_query->have_posts()): $my_query->the_post();
			$result[$i]['id'] = get_the_ID();
			$result[$i]['title'] = get_the_title();
			$result[$i]['description'] = get_the_content();
			$result[$i]['extract'] = get_the_excerpt();
			$result[$i]['type'] = get_post_type();
			$result[$i]['image'] = geTumbnail();
			$result[$i]['date'] = get_the_date();
			$result[$i]['link_page'] = get_field('enlace', get_the_ID());
			$result[$i]['galery'] = get_field('galeria', get_the_ID());
			$result[$i]['class_categories'] = get_field('clase_categoria', get_the_ID()); 
			//$result[$i]['categories'] = get_the_terms(get_the_ID(), 'portafolios', get_the_ID());
			//$result[$i]['tecnology'] = get_the_terms(get_the_ID(), 'portafolios', get_the_ID());
			$i++;
        endwhile;
    }
    wp_reset_query();
	return $result;
}

/**
 * function enviarInformacion
 * Permite enviar la información de contacto
 * 
 * @autor: Jamith Mercado <mercadojamith@gmail.com>
 * 
 * @return array 
 */

function enviarInformacion()
{
	// Limitar envíos por IP (anti-spam básico)
	$ip = $_SERVER['REMOTE_ADDR'];
	$key = 'contacto_envio_' . md5($ip);
	$max_envios = 3;
	$tiempo_bloqueo = 60 * 10; // 10 minutos
	$intentos = (int) get_transient($key);
	if ($intentos >= $max_envios) {
		returnJson(false, [], 'Has enviado demasiados mensajes. Intenta más tarde.');
	}

	// Validar reCAPTCHA
	if ($_POST) {
		$recaptcha = $_POST['g-recaptcha-response'] ?? ($_POST['recaptcha'] ?? '');
		if (!$recaptcha) {
			returnJson(false, [], 'Por favor, verifica el reCAPTCHA.');
		}
		$response = wp_remote_post('https://www.google.com/recaptcha/api/siteverify', [
			'body' => [
				'secret' => RECAPTCHA_SECRET_KEY,
				'response' => $recaptcha,
				'remoteip' => $_SERVER['REMOTE_ADDR']
			]
		]);
		$result = json_decode(wp_remote_retrieve_body($response), true);
		if (empty($result['success'])) {
			returnJson(false, [], 'Error de verificación reCAPTCHA.');
		}
		// Sanitizar y validar datos
		$fullname = trim(strip_tags($_POST['fullname'] ?? ''));
		$email = trim(filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL));
		$phone = trim(preg_replace('/[^0-9\+\-\s]/', '', $_POST['phone'] ?? ''));
		$message = trim(strip_tags($_POST['message'] ?? ''));

		// Validaciones
		if ($fullname == '' || $email == '' || $phone == '' || $message == '') {
			returnJson(false, [], 'Error! Todos los campos son obligatorios');
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			returnJson(false, [], 'Error! Email inválido');
		}
		if (strlen($message) < 10) {
			returnJson(false, [], 'El mensaje es demasiado corto');
		}
		if (strlen($fullname) > 100 || strlen($email) > 100 || strlen($phone) > 30) {
			returnJson(false, [], 'Datos demasiado largos');
		}

		// Cabeceras seguras
		$to = 'contacto@jamithm.online';
		$subject = 'Contacto desde web';
		$header[] = 'MIME-Version: 1.0';
		$header[] = 'Content-type: text/html; charset=utf-8';
		$header[] = 'From: '.mb_encode_mimeheader($fullname).' <'.$email.'>';
		$header[] = 'Reply-To: '.mb_encode_mimeheader($fullname).' <'.$email.'>';
		$header[] = 'X-Mailer: PHP/' . phpversion();
		$header[] = 'X-Content-Type-Options: nosniff';
		$header[] = 'X-XSS-Protection: 1; mode=block';

		// Cuerpo seguro
		$body = '<html><body>';
		$body .= '<h1>Contacto</h1>';
		$body .= '<p><strong>Nombre:</strong> '.htmlspecialchars($fullname).'</p>';
		$body .= '<p><strong>Email:</strong> '.htmlspecialchars($email).'</p>';
		$body .= '<p><strong>Teléfono:</strong> '.htmlspecialchars($phone).'</p>';
		$body .= '<p><strong>Mensaje:</strong> '.nl2br(htmlspecialchars($message)).'</p>';
		$body .= '</body></html>';

		// Enviar correo
		$send = wp_mail($to, $subject, $body, implode("\r\n", $header));
		if ($send) {
			set_transient($key, $intentos + 1, $tiempo_bloqueo);
			returnJson(true, [], 'Mensaje enviado correctamente');
		} else {
			returnJson(false, [], 'Error! No se pudo enviar el mensaje');
		}
	} else {
		returnJson(false, [], 'Error! No se recibieron datos');
	}
}


// Desactivar comentarios en todo el sitio y proteger WordPress
add_action('admin_init', function() {
	// Cierra comentarios en todos los tipos de post
	foreach (get_post_types() as $post_type) {
		if (post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
});

// Elimina la página de comentarios del admin
add_action('admin_menu', function() {
	remove_menu_page('edit-comments.php');
});

// Elimina el widget de comentarios recientes del escritorio
add_action('wp_dashboard_setup', function() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
});

// Elimina comentarios existentes del front
add_filter('comments_array', '__return_empty_array', 10, 2);

// Desactiva los feeds de comentarios
add_action('do_feed_rdf',    function() { wp_die('Comentarios desactivados'); }, 1);
add_action('do_feed_rss',    function() { wp_die('Comentarios desactivados'); }, 1);
add_action('do_feed_rss2',   function() { wp_die('Comentarios desactivados'); }, 1);
add_action('do_feed_atom',   function() { wp_die('Comentarios desactivados'); }, 1);
add_action('do_feed_rss2_comments', function() { wp_die('Comentarios desactivados'); }, 1);
add_action('do_feed_atom_comments', function() { wp_die('Comentarios desactivados'); }, 1);

// ===================== SEGURIDAD EXTRA PARA WORDPRESS =====================

// 1. Ocultar la versión de WordPress
remove_action('wp_head', 'wp_generator');

// 2. Desactivar XML-RPC si no se usa
add_filter('xmlrpc_enabled', '__return_false');

// 3. Desactivar la edición de archivos desde el panel
if (!defined('DISALLOW_FILE_EDIT')) {
	define('DISALLOW_FILE_EDIT', true);
}

// 4. Limitar intentos de login (básico, para protección adicional usar plugin)
add_filter('authenticate', function($user, $username, $password) {
	$max_attempts = 5;
	$lockout_time = 15 * 60; // 15 minutos
	$ip = $_SERVER['REMOTE_ADDR'];
	$key = 'login_attempts_' . md5($ip);
	$attempts = (int) get_transient($key);
	if ($attempts >= $max_attempts) {
		return new WP_Error('too_many_attempts', __('Demasiados intentos fallidos. Intenta de nuevo en 15 minutos.'));
	}
	if (is_wp_error($user)) {
		set_transient($key, $attempts + 1, $lockout_time);
	} else {
		delete_transient($key);
	}
	return $user;
}, 30, 3);

// 5. Deshabilitar feeds de autor (evita enumeración de usuarios)
add_action('template_redirect', function() {
	if (is_author()) {
		wp_redirect(home_url());
		exit;
	}
});

// 6. Ocultar errores de login (no revelar si usuario existe)
add_filter('login_errors', function() { return 'Datos incorrectos.'; });

// 7. Reforzar cabeceras de seguridad
add_action('send_headers', function() {
	header('X-Frame-Options: SAMEORIGIN');
	header('X-XSS-Protection: 1; mode=block');
	header('X-Content-Type-Options: nosniff');
	header('Referrer-Policy: no-referrer-when-downgrade');
	header('Permissions-Policy: camera=(), microphone=(), geolocation=()');
});

// Redirigir todo el frontend a https://jamithm.online/ (modo headless)
add_action('template_redirect', function() {
	if (!is_admin() && !wp_doing_ajax() && !preg_match('/^\/wp-json\//', $_SERVER['REQUEST_URI'])) {
		wp_redirect('https://jamithmdev.com/');
		exit;
	}
});
