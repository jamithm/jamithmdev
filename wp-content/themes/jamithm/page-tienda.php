<?php


get_header();

?>

<div class="container-fluid">
<div class="row">
        <div class="col-12">
            <div class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-3">
            <div class="filter-section">
                <?php echo do_shortcode('[br_filter_single filter_id=370]'); ?>
                <?php echo do_shortcode('[br_filter_single filter_id=366]'); ?>
            </div>
        </div>
        <div class="col-9">
            <?php echo do_shortcode('[products paginate="true" limit=6]'); ?>
            
        </div>
    </div>
</div>

<style>
  .page-header {
        background-image: url('https://jamithm.online/wp-content/uploads/2024/11/blog-1.webp');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #ddd;
        height: 50vh;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        text-align: center;
    }

    .page-title {
        font-size: 2.5em;
        margin: 0;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -15px;
    }

    .col-3 {
        flex: 0 0 25%;
        max-width: 25%;
        padding: 0 15px;
    }

    .col-9 {
        flex: 0 0 75%;
        max-width: 75%;
        padding: 0 15px;
    }

    .products {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .product {
        flex: 0 0 30%;
        max-width: 30%;
        margin: 30px;
        padding: 20px;  
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 10px;
        overflow: hidden;
        background: red;
        display: flex;
        flex-direction: column;
    }

    .product:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .product img {
        width: 100%;
        height: auto;
        border-bottom: 1px solid #ddd;
    }

    .product-content {
        padding: 15px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .product-title {
        font-size: 1.2em;
        margin: 10px 0;
        color: #333;
    }

    .product-price {
        color: #0073aa;
        font-size: 1.1em;
        margin: 10px 0;
    }

    .product-description {
        font-size: 0.9em;
        color: #666;
        margin: 10px 0;
        flex-grow: 1;
    }

    .product-button {
        background-color: #0073aa;
        color: #fff;
        padding: 10px;
        text-align: center;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        text-decoration: none;
    }

    .product-button:hover {
        background-color: #005177;
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination a {
        color: #0073aa;
        padding: 10px 15px;
        text-decoration: none;
        border: 1px solid #ddd;
        margin: 0 5px;
        transition: background-color 0.3s ease;
    }

    .pagination a:hover {
        background-color: #0073aa;
        color: #fff;
    }
</style>

<?php

get_footer();

?>