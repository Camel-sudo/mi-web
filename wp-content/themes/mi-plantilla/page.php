<?php get_header(); ?>

<section id="main">

    <img src="<?php echo get_template_directory_uri(); ?>/images/volkswagen_corrado_vr6_9.jpg" alt="FERNANDO ALONSO">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1> 
        <small>Publicado el <?php the_time('j/m/Y') ?> por <?php the_author_posts_link(); ?></small>
        <div class="thumbnail">
            <?php if (has_post_thumbnail()) {
                the_post_thumbnail();
            } ?>
        </div>
        <div class="page-content">
            <?php the_content(); ?>
        </div>
    <?php endwhile; else: ?>
        <p><?php _e('No hay entradas.'); ?></p>
    <?php endif; ?>

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
