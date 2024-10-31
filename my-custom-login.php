<?php
/*

Plugin Name: My Custom Login
Description: My Custom Login is the WordPress login plugin, allows site admin to add login/registration on their sites menu.
Version: 1.0.0
Author: Ajay Singh
*/
/* /////////////////////////////////////////////*/



add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );
function your_custom_menu_item ( $items, $args ) {
    if (is_single() && $args->theme_location == 'primary') {
        $items .= '<li>Show whatever</li>';
    }
    return $items;
}

add_filter( 'wp_nav_menu_items', 'add_loginout_link', 10, 2 );

function add_loginout_link( $items, $args ) {
    if (is_user_logged_in() && $args->theme_location == 'primary') {
        $items .= '<li><a href="'. wp_logout_url() .'">Log Out</a></li>';
    }
    elseif (!is_user_logged_in() && $args->theme_location == 'primary') {
        $items .= '<li><a href="'. site_url('wp-login.php') .'">Log In</a></li>';
        $items .= '<li><a href="'. site_url('wp-signup.php') .'">Register</a></li>';
    }
    return $items;
}


?>