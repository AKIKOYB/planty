<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/theme.css', array(), filemtime(get_stylesheet_directory() . '/theme.css'));
}
?>

<?php

add_filter( 'wp_nav_menu_items','add_admin_link', 10, 2 );

function add_admin_link($items, $args) {
    if (is_user_logged_in() && $args->theme_location == 'primary') {
        $menu_items = explode('</li>', $items);

        $admin_link = '<li id="menu-item-42" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-42"><a href="'. get_admin_url() .'" class="menu-link">Admin</a></li>';
        array_splice($menu_items, 1, 0, $admin_link);

        $items = implode('</li>', $menu_items);
        $items .= '</li>'; 
    }
    return $items;
}

?>

