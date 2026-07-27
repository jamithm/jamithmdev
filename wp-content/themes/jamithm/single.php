<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package jamithm
 */

get_header();
?>

<style>
	

/* Main Content */
.site-main {
    margin: 0 auto;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Single Post */
.single-post {
    margin-bottom: 40px;
}

.entry-header {
    border-bottom: 1px solid #ddd;
    margin-bottom: 20px;
}

.entry-title {
    font-size: 2.5em;
    margin: 0;
}

.entry-meta {
    font-size: 0.9em;
    color: #666;
}

.single-post-thumbnail {
    width: 100%;
    height: auto;
    margin-bottom: 20px;
}

.entry-content {
    font-size: 1.1em;
    line-height: 1.8;
}

.entry-footer {
    border-top: 1px solid #ddd;
    margin-top: 20px;
    padding-top: 10px;
    font-size: 0.9em;
    color: #666;
}

.post-categories,
.post-tags {
    margin-bottom: 10px;
}

.post-categories a,
.post-tags a {
    background: #0073aa;
    color: #fff;
    padding: 5px 10px;
    text-decoration: none;
    border-radius: 3px;
    margin-right: 5px;
}

.post-categories a:hover,
.post-tags a:hover {
    background: #005177;
}

/* Post Navigation */
.nav-subtitle {
    display: block;
    font-size: 0.8em;
    color: #666;
}

.nav-title {
    font-size: 1.2em;
    color: #0073aa;
}

.nav-title:hover {
    color: #005177;
}

/* Comments */
.comments-area {
    margin-top: 40px;
}

.comment-list {
    list-style: none;
    padding: 0;
}

.comment {
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #ddd;
}

.comment-author {
    font-weight: bold;
}

.comment-meta {
    font-size: 0.9em;
    color: #666;
}

.comment-content {
    margin-top: 10px;
}
</style>

<main id="primary" class="site-main">

    <?php
    while ( have_posts() ) :
        the_post();
    ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <div class="entry-meta">
                <span class="posted-on"><?php echo get_the_date(); ?></span>
                <span class="byline"> by <?php the_author(); ?></span>
            </div>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php
            if ( has_post_thumbnail() ) {
                the_post_thumbnail('full', array('class' => 'single-post-thumbnail'));
            }
            the_content();
            ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <div class="post-categories">
                <?php _e('Categories: ', 'jamithm'); the_category(', '); ?>
            </div>
            <div class="post-tags">
                <?php the_tags(); ?>
            </div>
        </footer><!-- .entry-footer -->
    </article><!-- #post-<?php the_ID(); ?> -->

    <?php
        the_post_navigation(
            array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'jamithm' ) . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'jamithm' ) . '</span> <span class="nav-title">%title</span>',
            )
        );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
?>