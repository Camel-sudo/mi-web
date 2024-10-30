<?php $post = $posts[0]; ?>
<?php if (is_category()) { ?>
    <h2>Categoría: <?php single_cat_title(); ?></h2>
<?php } elseif (is_tag()) { ?>
    <h2>Etiqueta: <?php single_tag_title(); ?></h2>
<?php } ?>
