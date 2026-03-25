<?php
// ==================================================
// Slovo Theme functions.php
// ==================================================

// =======================
// Array of user redirects
// =======================
function slovo_get_user_redirects() {
    return [
        // User logins
        'Kate_English' => '/kates-homepage/',
        'Angelina_Cassiopeia' => '/angelinas-homepage/',
        // Example: roles can be added
        // 'student' => '/student-homepage/',
        // 'teacher' => '/teacher-dashboard/',
    ];
}

// =======================
// Redirect after login
// =======================
add_filter('login_redirect', function($redirect_to, $request, $user) {
    if (!isset($user->user_login)) {
        return $redirect_to;
    }

    $redirects = slovo_get_user_redirects();

    if (isset($redirects[$user->user_login])) {
        return home_url($redirects[$user->user_login]);
    }

    // Admins go directly to wp-admin
    if (in_array('administrator', $user->roles)) {
        return admin_url();
    }

    // All other users go to front /welcome/
    return home_url('/welcome/');
}, 999, 3);


// =======================
// Redirect and display front page
// =======================
add_action('template_redirect', function() {

    // Check only front page
    if (!is_front_page()) return;

    $redirects = slovo_get_user_redirects();

    // If user is logged in
    if (is_user_logged_in()) {
        $current_user = wp_get_current_user();

        // If redirect exists in array
        if (isset($redirects[$current_user->user_login])) {
            wp_redirect(home_url($redirects[$current_user->user_login]));
            exit;
        }

        // If admin — go to wp-admin
        if (in_array('administrator', $current_user->roles)) {
            wp_redirect(admin_url());
            exit;
        }

        // All other logged-in users stay on the front page
        return;
    }

    // For guests, show welcome.php
    include get_stylesheet_directory() . '/welcome.php';
    exit;

});


// =======================
// Enqueue CSS and JS
// =======================
function slovo_custom_assets() {

    // Enqueue theme style.css
    wp_enqueue_style('slovo-custom-style', get_stylesheet_uri());

    // Register and enqueue JS
    wp_register_script('slovo-custom-js', '', [], false, true);
    wp_enqueue_script('slovo-custom-js');

    // Inline JS for blur toggle
    wp_add_inline_script('slovo-custom-js', '
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".blur-toggle").forEach(function (el) {
                el.addEventListener("click", function () {
                    el.classList.toggle("revealed");
                });
            });
        });
    ');
}
add_action('wp_enqueue_scripts', 'slovo_custom_assets');


// =======================
// Remove prefetch JSON from content
// =======================
add_filter('the_content', function($content){
    // remove JSON with "prefetch" if present
    $content = preg_replace('/\{\\s*"prefetch".*?\}\]/s', '', $content);
    return $content;
});