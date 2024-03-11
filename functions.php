<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/theme.css', array(), filemtime(get_stylesheet_directory() . '/theme.css'));
}

/* hook filters */
function add_admin_link_to_menu( $items, $args ) 
{
    if ( is_user_logged_in() && $args->menu == 5 ) {
        $current_user = wp_get_current_user();
        if ( in_array( 'administrator', $current_user->roles ) ) {
            $items .= '<li><a href="' . admin_url() . '">Admin</a></li>';
        }
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'add_admin_link_to_menu', 10, 2 );

/* hook filters

if (is_user_logged_in() && $args->menu == 303) {
    $items .= '<li><a href="'. get_permalink( get_option('woocommerce_myaccount_page_id') ) .'">My Account</a></li>';
}
elseif (!is_user_logged_in() && $args->menu == 303) {
    $items .= '<li><a href="' . get_permalink( wc_get_page_id( 'myaccount' ) ) . '">Sign in  /  Register</a></li>';
}
return $items;
}
*/