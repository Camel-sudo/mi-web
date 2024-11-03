<?php get_header(); ?>
<section id="main">

    <img src="<?php echo get_template_directory_uri(); ?>/images/volkswagen_corrado_vr6_9.jpg" alt="FERNANDO ALONSO">
    <!-- <?php   echo do_shortcode('[random_cars]'); ?> -->
</section> <!-- Fin de main -->
<?php get_sidebar()?>
<?php $post = $posts[0]; ?>
<?php if (is_category()) { ?>
<h2>Categoría: <?php get_the_category(); ?></h2>
<?php } elseif( is_tag() ) { ?>
<h2>Etiqueta: <?php single_tag_title(); ?></h2>
<?php } ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
 <small>Publicado el <?php the_time('j/m/Y') ?> por <?php
the_author_posts_link() ?> </small>
 <div class="thumbnail">
 <?php
 if ( has_post_thumbnail() ) {
 the_post_thumbnail();
 }
 ?>
 </div>
 <?php the_excerpt(); ?>
 <?php endwhile; else: ?>
 <p><?php _e('No hay entradas .'); ?></p>
 <?php endif; ?>
 <?php get_footer(); ?>