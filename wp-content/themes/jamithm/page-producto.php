<?php
get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>

    <div>

        <?php echo do_shortcode('[product id="'. get_the_ID() .'"]'); ?>

    </div>
</div>


<?php
get_footer();
?>