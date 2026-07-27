<?php 
/**
 * function listAllBlogsApp
 * 
 * Permite listar todos los blogs
 * 
 * @autor: Jamith Mercado <mercadojamith@gmail.com>
 * 
 * @return array 
 */
function listAllBlogsApp()
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
	returnJson(true, $result, '');
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
function listAllCategoriesPortfolioApp()
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
function listAllPortfoliosApp()
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
			$result[$i]['content'] = get_the_content();
			$result[$i]['extract'] = get_the_excerpt();
			$result[$i]['type'] = get_post_type();
			$result[$i]['image'] = geTumbnail();
			$result[$i]['date'] = get_the_date();
			$result[$i]['link_page'] = get_field('enlace', get_the_ID());
			$result[$i]['galery'] = get_field('galeria', get_the_ID());
			$result[$i]['class_categories'] = get_field('clase_categoria', get_the_ID()); 
			$result[$i]['categories'] = get_the_terms(get_the_ID(), 'categoria-portafolio');
			$result[$i]['tecnologies'] = get_the_terms(get_the_ID(), 'tecnologia-portafolio');
			$i++;
        endwhile;
    }
    wp_reset_query();
	returnJson(true, $result, '');
}

/**
 * function listAllServices
 * 
 * Permite listar todos los servicios
 * 
 * @autor: Jamith Mercado <mercadojamith@gmail.com>
 * 
 * @return array 
 */
function listAllServicesApp()
{
	$result = [];
    $post = [
        'post_type' => 'page',
        'post_status' => 'publish',
		'p' => 5
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
			$result[$i]['services'] = get_field('servicios', get_the_ID()); 
			$result[$i]['date'] = get_the_date();
			$result[$i]['author'] = get_the_author();
			$result[$i]['link'] = get_the_permalink();
			$i++;
        endwhile;
    }
    wp_reset_query();
	returnJson(true, $result[0]['services'], '');
}

/**
 * function listAllProducts
 * Permite listar todos los productos
 * 
 * @autor: Jamith Mercado <mercadojamith@gmail.com>
 * 
 * @return array 
 * 
 */
function listAllProducts()
{
	$result = [];
    $post = [
        'post_type' => 'product',
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
			$result[$i]['type'] = get_post_type();
			$result[$i]['image'] = geTumbnail();
			$result[$i]['date'] = get_the_date();
			$result[$i]['link'] = get_the_permalink();
			$result[$i]['categories'] = get_the_terms(get_the_ID(), 'product_cat');
			$i++;
        endwhile;
    }
    wp_reset_query();
	returnJson(true, $result, '');
}

/**
 * function detailProduct
 * Permite listar todos los productos
 * 
 * @autor: Jamith Mercado <mercadojamith@gmail.com>
 * 
 * @return array 
 * 
 */
function detailProduct()
{
	$result = [];
	$id = $_POST['id'];
    $post = [
        'post_type' => 'product',
        'post_status' => 'publish',
        'p' => $id
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
			$result[$i]['type'] = get_post_type();
			$result[$i]['image'] = geTumbnail();
			$result[$i]['date'] = get_the_date();
			$result[$i]['link'] = get_the_permalink();
			$result[$i]['categories'] = get_the_terms(get_the_ID(), 'product_cat');
			$i++;
        endwhile;
    }
    wp_reset_query();
	returnJson(true, $result[0], '');
}