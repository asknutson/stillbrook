<?php
/**
 * Videography: Customizer
 *
 * @subpackage Videography
 * @since 1.0
 */

use WPTRT\Customize\Section\Videography_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Videography_Button::class );

	$manager->add_section(
		new Videography_Button( $manager, 'videography_pro', [
			'title'      => __( 'Videography Pro', 'videography' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'videography' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/products/videographer-wordpress-theme/', 'videography')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'videography-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'videography-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function videography_customize_register( $wp_customize ) {

	$wp_customize->add_setting('videography_show_site_title',array(
       'default' => true,
       'sanitize_callback'	=> 'videography_sanitize_checkbox'
    ));
    $wp_customize->add_control('videography_show_site_title',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Title','videography'),
       'section' => 'title_tagline'
    ));

    $wp_customize->add_setting('videography_show_tagline',array(
       'default' => true,
       'sanitize_callback'	=> 'videography_sanitize_checkbox'
    ));
    $wp_customize->add_control('videography_show_tagline',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Tagline','videography'),
       'section' => 'title_tagline'
    ));

	$wp_customize->add_panel( 'videography_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'videography' ),
	    'description' => __( 'Description of what this panel does.', 'videography' ),
	) );

	$wp_customize->add_section( 'videography_theme_options_section', array(
    	'title'      => __( 'General Settings', 'videography' ),
		'priority'   => 30,
		'panel' => 'videography_panel_id'
	) );

	$wp_customize->add_setting('videography_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'videography_sanitize_choices'
	));
	$wp_customize->add_control('videography_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','videography'),
        'section' => 'videography_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','videography'),
            'Right Sidebar' => __('Right Sidebar','videography'),
            'One Column' => __('One Column','videography'),
            'Three Columns' => __('Three Columns','videography'),
            'Four Columns' => __('Four Columns','videography'),
            'Grid Layout' => __('Grid Layout','videography')
        ),
	));

	//Top Header
	$wp_customize->add_section( 'videography_top_header_section' , array(
    	'title'    => __( 'Top Header', 'videography' ),
		'priority' => null,
		'panel' => 'videography_panel_id'
	) );

	$wp_customize->add_setting('videography_topheader_mail',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('videography_topheader_mail',array(
	   	'type' => 'text',
	   	'label' => __('Add Email Address','videography'),
	   	'section' => 'videography_top_header_section',
	));

	$wp_customize->add_setting('videography_topheader_phone_no',array(
       	'default' => '',
       	'sanitize_callback'	=> 'videography_sanitize_phone_number'
	));
	$wp_customize->add_control('videography_topheader_phone_no',array(
	   	'type' => 'text',
	   	'label' => __('Add Phone Number','videography'),
	   	'section' => 'videography_top_header_section',
	));

	$wp_customize->add_setting('videography_topheader_text',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('videography_topheader_text',array(
	   	'type' => 'text',
	   	'label' => __('Add Text','videography'),
	   	'section' => 'videography_top_header_section',
	));

	$wp_customize->add_setting('videography_topheader_facebook_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('videography_topheader_facebook_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Facebook URL','videography'),
	   	'section' => 'videography_top_header_section',
	));

	$wp_customize->add_setting('videography_topheader_twitter_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('videography_topheader_twitter_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Twitter URL','videography'),
	   	'section' => 'videography_top_header_section',
	));

	$wp_customize->add_setting('videography_topheader_linkedin_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('videography_topheader_linkedin_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Linkedin URL','videography'),
	   	'section' => 'videography_top_header_section',
	));

	$wp_customize->add_setting('videography_topheader_instagram_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('videography_topheader_instagram_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Instagram URL','videography'),
	   	'section' => 'videography_top_header_section',
	));

	$wp_customize->add_setting('videography_topheader_pinterest_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('videography_topheader_pinterest_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Pinterest URL','videography'),
	   	'section' => 'videography_top_header_section',
	));

	//Header section
	$wp_customize->add_section( 'videography_header_section' , array(
    	'title'    => __( 'Header Section', 'videography' ),
		'priority' => null,
		'panel' => 'videography_panel_id'
	) );

	$wp_customize->add_setting('videography_studio_btn_text',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('videography_studio_btn_text',array(
	   	'type' => 'text',
	   	'label' => __('Add Join Studio Button Text','videography'),
	   	'section' => 'videography_header_section',
	));

	$wp_customize->add_setting('videography_studio_btn_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('videography_studio_btn_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Join Studio Button URL','videography'),
	   	'section' => 'videography_header_section',
	));

	$wp_customize->add_setting('videography_quote_btn_text',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('videography_quote_btn_text',array(
	   	'type' => 'text',
	   	'label' => __('Add Quote Button Text','videography'),
	   	'section' => 'videography_header_section',
	));

	$wp_customize->add_setting('videography_quote_btn_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('videography_quote_btn_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Quote Button URL','videography'),
	   	'section' => 'videography_header_section',
	));

	//home page slider
	$wp_customize->add_section( 'videography_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'videography' ),
		'priority' => null,
		'panel' => 'videography_panel_id'
	) );

	$wp_customize->add_setting('videography_slider_hide_show',array(
       	'default' => false,
       	'sanitize_callback'	=> 'videography_sanitize_checkbox'
	));
	$wp_customize->add_control('videography_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','videography'),
	   	'section' => 'videography_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'videography_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'videography_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'videography_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'videography' ),
			'section' => 'videography_slider_section',
			'type' => 'dropdown-pages'
		));
	}

	//Featured Videos Section
	$wp_customize->add_section('videography_featured_videos',array(
		'title'	=> __('Featured Videos Section','videography'),
		'description'=> __('This section will appear below the slider.','videography'),
		'panel' => 'videography_panel_id',
	));

	$wp_customize->add_setting('videography_videos_section_heading',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('videography_videos_section_heading',array(
	   	'type' => 'text',
	   	'label' => __('Add Section Heading','videography'),
	   	'section' => 'videography_featured_videos',
	));

	$wp_customize->add_setting('videography_videos_section_small_heading',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('videography_videos_section_small_heading',array(
	   	'type' => 'text',
	   	'label' => __('Add Section Text','videography'),
	   	'section' => 'videography_featured_videos',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('videography_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'videography_sanitize_choices',
	));
	$wp_customize->add_control('videography_category_setting',array(
		'type' => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category to display Post','videography'),
		'section' => 'videography_featured_videos',
	));

	//Footer
    $wp_customize->add_section( 'videography_footer', array(
    	'title'  => __( 'Footer Text', 'videography' ),
		'priority' => null,
		'panel' => 'videography_panel_id'
	) );

    $wp_customize->add_setting('videography_footer_copy',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('videography_footer_copy',array(
		'label'	=> __('Footer Text','videography'),
		'section' => 'videography_footer',
		'setting' => 'videography_footer_copy',
		'type' => 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'videography_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'videography_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'videography_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'videography_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'videography' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'videography' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'videography_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'videography_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'videography_customize_register' );

function videography_customize_partial_blogname() {
	bloginfo( 'name' );
}

function videography_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function videography_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function videography_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}