<?php
// Registro del menú de Wordpress
add_theme_support( 'nav-menus' );
if ( function_exists( 'register_nav_menus' ) ) {
register_nav_menus(
array(
'main' => 'Main'
)
);
}
// Main Sidebar
if(function_exists('register_sidebar'))
register_sidebar(array(
'name' => 'Main Sidebar',
'before_widget' => '<hr>',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>',
));
?>