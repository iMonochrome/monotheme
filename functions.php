<?php
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'rel_canonical');
global $global_uri;
$global_uri = get_template_directory_uri();
add_theme_support('post-thumbnails');
function load_google_cdn()
{
    if (!is_admin()) {
        //  wp_deregister_script('jquery');
        wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.3.1.min.js', array(), null, true);
        wp_enqueue_script('index', get_template_directory_uri() . '/assets/js/application.js', array('jquery'), null,
			true);
    }
}
add_action('init', 'load_google_cdn');
function create_post_type()
{ };

function my_meta_ogp()
{
    if (is_front_page() || is_home() || is_singular()) {
        $ogp_image = get_stylesheet_directory_uri() . '/assrts/images/Facebook_OGP/Facebook_OGP.jpg';
        $twitter_site = 'Twitterアカウント名';
        $twitter_card = 'summary_large_image';
        $facebook_app_id = '';
        global $post;
        $ogp_title = '';
        $ogp_description = '';
        $ogp_url = '';
        $html = '';
        if (is_singular()) {
            setup_postdata($post);
            $ogp_title = $post->post_title;
            $ogp_description = mb_substr(get_the_excerpt(), 0, 100);
            $ogp_url = get_permalink();
            wp_reset_postdata();
        } elseif (is_front_page() || is_home()) {
            $ogp_title = get_bloginfo('name');
            $ogp_description = get_bloginfo('description');
            $ogp_url = home_url();
        }
        $ogp_type = (is_front_page() || is_home()) ? 'website' : 'article';
        if (is_singular() && has_post_thumbnail()) {
            $ps_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
            $ogp_image = $ps_thumb[0];
        }
        $html = "\n";
        $html .= '<meta property="og:title" content="' . esc_attr($ogp_title) . '" />' . "\n";
        $html .= '<meta property="og:description" content="' . esc_attr($ogp_description) . '" />' . "\n";
        $html .= '<meta property="og:type" content="' . $ogp_type . '" />' . "\n";
        $html .= '<meta property="og:url" content="' . esc_url($ogp_url) . '" />' . "\n";
        $html .= '<meta property="og:image" content="' . esc_url($ogp_image) . '" />' . "\n";
        $html .= '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '" />' . "\n";
        $html .= '<meta name="twitter:card" content="' . $twitter_card . '" />' . "\n";
        $html .= '<meta name="twitter:site" content="' . $twitter_site . '" />' . "\n";
        $html .= '<meta property="og:locale" content="ja_JP" />' . "\n";
        if ($facebook_app_id != '') {
            $html .= '<meta property="fb:app_id" content="' . $facebook_app_id . '">' . "\n";
        }
        echo $html;
    }
}
add_action('wp_head', 'my_meta_ogp');

function wpb_custom_new_menu() {
    register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
  }
add_action( 'init', 'wpb_custom_new_menu' );

function register_my_menu() {
    register_nav_menus( array(
        'header' => 'Header menu',
        'footer' => 'Footer menu') );
    }
    add_action( 'init', 'register_my_menu' );