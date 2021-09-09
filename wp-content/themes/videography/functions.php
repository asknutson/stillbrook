<?php
/**
 * Videography functions and definitions
 *
 * @subpackage Videography
 * @since 1.0
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Videography_Loader.php' );

$videography_loader = new \WPTRT\Autoload\Videography_Loader();

$videography_loader->videography_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$videography_loader->videography_register();

function videography_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-background', $defaults = array(
	    'default-color'          => '',
	    'default-image'          => '',
	    'default-repeat'         => '',
	    'default-position-x'     => '',
	    'default-attachment'     => '',
	    'wp-head-callback'       => '_custom_background_cb',
	    'admin-head-callback'    => '',
	    'admin-preview-callback' => ''
	));

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'videography' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', videography_fonts_url() ) );

	// Theme Activation Notice
	global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'videography_activation_notice' );
	}

}
add_action( 'after_setup_theme', 'videography_setup' );

// Notice after Theme Activation
function videography_activation_notice() {
	echo '<div class="notice notice-success is-dismissible start-notice">';
		echo '<h3>'. esc_html__( 'Welcome to Luzuk!!', 'videography' ) .'</h3>';
		echo '<p>'. esc_html__( 'Thank you for choosing Videography theme. It will be our pleasure to have you on our Welcome page to serve you better.', 'videography' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=videography_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'videography' ) .'</a></p>';
	echo '</div>';
}

function videography_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'videography' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'videography' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 2', 'videography' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'videography' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'videography' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'videography' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'videography' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'videography' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'videography' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'videography' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'videography' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'videography' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'videography' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'videography' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'videography_widgets_init' );

function videography_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//Enqueue scripts and styles.
function videography_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'videography-fonts', videography_fonts_url(), array(), null );
	
	//Bootstarp 
	wp_enqueue_style( 'bootstrap-css', esc_url( get_template_directory_uri() ).'/assets/css/bootstrap.css' );
	
	// Theme stylesheet.
	wp_enqueue_style( 'videography-basic-style', get_stylesheet_uri() );

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'videography-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'videography-style' ), '1.0' );
		wp_style_add_data( 'videography-ie9', 'conditional', 'IE 9' );
	}
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'videography-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'videography-style' ), '1.0' );
	wp_style_add_data( 'videography-ie8', 'conditional', 'lt IE 9' );

	//font-awesome
	wp_enqueue_style( 'font-awesome-css', esc_url( get_template_directory_uri() ).'/assets/css/fontawesome-all.css' );

	wp_enqueue_script( 'videography-navigation-jquery', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bootstrap-js', esc_url( get_template_directory_uri() ). '/assets/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', esc_url( get_template_directory_uri() ). '/assets/js/jquery.superfish.js', array('jquery') ,'',true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'videography_scripts' );

function videography_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'videography_front_page_template' );

//footer Link
define('VIDEOGRAPHY_LIVE_DEMO',__('http://luzukdemo.com/demo/videographer/','videography'));
define('VIDEOGRAPHY_PRO_DOCS',__('http://luzukdemo.com/demo/videographer/documentation/','videography'));
define('VIDEOGRAPHY_BUY_NOW',__('https://www.luzuk.com/product/videographer-wordpress-theme/','videography'));
define('VIDEOGRAPHY_SUPPORT',__('https://wordpress.org/support/theme/videography/','videography'));
define('VIDEOGRAPHY_CREDIT',__('https://www.luzuk.com/themes/free-videographer-wordpress-theme/','videography'));

if ( ! function_exists( 'videography_credit' ) ) {
	function videography_credit(){
		echo "<a href=".esc_url(VIDEOGRAPHY_CREDIT)." target='_blank'>".esc_html__('Videography WordPress Theme','videography')."</a>";
	}
}

function videography_sanitize_dropdown_pages( $page_id, $setting ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $page_id );
	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function videography_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function videography_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function videography_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

/* Excerpt Limit Begin */
function videography_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'videography_loop_columns');
	if (!function_exists('videography_loop_columns')) {
		function videography_loop_columns() {
	return 3; // 3 products per row
	}
}

// Services Meta
function videography_bn_custom_meta_services() {
    add_meta_box( 'bn_meta', __( 'Video Meta', 'videography' ), 'videography_meta_callback_videos', 'post', 'normal', 'high' );
}
/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'videography_bn_custom_meta_services');
}

function videography_meta_callback_videos( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'videography_video_meta_nonce' );
  	$bn_stored_meta = get_post_meta( $post->ID );
	$video_link = get_post_meta( $post->ID, 'videography_video_url', true );
	?>
	<div id="testimonials_custom_stuff">
		<table id="list">
			<tbody id="the-list" data-wp-lists="list:meta">
		        <tr id="meta-8">
		          <td class="left">
		            <?php esc_html_e( 'Video Link', 'videography' )?>
		          </td>
		          <td class="left" >
		            <input type="url" name="videography_video_url" id="videography_video_url" value="<?php echo esc_url($video_link); ?>" />
		          </td>
		        </tr>
	      	</tbody>
		</table>
	</div>
	<?php
}

/* Saves the custom meta input */
function videography_bn_metadesig_save( $post_id ) {
	if (!isset($_POST['videography_video_meta_nonce']) || !wp_verify_nonce( esc_url_raw( wp_unslash( $_POST['videography_video_meta_nonce']) ), basename(__FILE__))) {
		return;
	}

	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

    // Save Video Link
    if( isset( $_POST[ 'videography_video_url' ] ) ) {
        update_post_meta( $post_id, 'videography_video_url', esc_url_raw( wp_unslash( $_POST[ 'videography_video_url' ]) ) );
    }

}
add_action( 'save_post', 'videography_bn_metadesig_save' );

require get_parent_theme_file_path( '/inc/custom-header.php' );

require get_parent_theme_file_path( '/inc/template-tags.php' );

require get_parent_theme_file_path( '/inc/template-functions.php' );

require get_parent_theme_file_path( '/inc/customizer.php' );

require get_parent_theme_file_path( '/inc/getting-started/getting-started.php' );