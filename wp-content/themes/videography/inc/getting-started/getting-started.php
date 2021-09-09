<?php
//about theme info
add_action( 'admin_menu', 'videography_gettingstarted' );
function videography_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'videography'), esc_html__('About Theme', 'videography'), 'edit_theme_options', 'videography_guide', 'videography_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function videography_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'videography_admin_theme_style');

//guidline for about theme
function videography_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'videography' );

?>

<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to Videography WordPress Theme', 'videography' ); ?> <span>Version: <?php echo esc_html($theme['Version']);?></span></h3>
		</div>
		<div class="started">
			<hr>
			<div class="free-doc">
				<div class="lz-4">
					<h4><?php esc_html_e( 'Start Customizing', 'videography' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Go to', 'videography' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'videography' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'videography' ); ?></span>
					</ul>
				</div>
				<div class="lz-4">
					<h4><?php esc_html_e( 'Support', 'videography' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Send your query to our', 'videography' ); ?> <a href="<?php echo esc_url( VIDEOGRAPHY_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support', 'videography' ); ?></a></span>
					</ul>
				</div>
			</div>
			<p><?php esc_html_e( 'Videography theme is best suitable for video blogs, business, film, filmography, marketing, modern, photographer, photography, portfolio, video, videography, wedding, WordPress theme, YouTube, wedding shoots, modelling portfolio, outdoor media, movie, TV, fashion show, online video store, cinema reviews, Video Marketers, Vlog, VideoStories, Vlogging, fashion magazine and travel blogging websites. The theme has a modern, luxurious and retina-ready design. You will love the responsive design which fits well with all devices. It is implemented on bootstrap framework therefore is very handier to work. Faster page load time and optimized codes makes it stand out. It is fully loaded with customization and personalization options. The theme is SEO-friendly which will help your website rank soon on all major search engines. You have the option to add shortcodes which will increase the functionality of your website. Also, it is translation-ready to enable your website to get translated into numerous languages. It also supports RTL layout for languages which are written from right to left. You can link all your social media pages to popularize your work. The testimonial section let’s your visitors comment on your work. Try out this feature-rich theme today!', 'videography')?></p>
			<hr>			
			<div class="col-left-inner">
				<h3><?php esc_html_e( 'Get started with Free Videography Theme', 'videography' ); ?></h3>
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/customizer-image.png" alt="" />
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'videography'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<a href="<?php echo esc_url( VIDEOGRAPHY_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'videography'); ?></a>
			<a href="<?php echo esc_url( VIDEOGRAPHY_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'videography'); ?></a>
			<a href="<?php echo esc_url( VIDEOGRAPHY_PRO_DOCS ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'videography'); ?></a>
			<hr class="secondhr">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/videography.jpg" alt="" />
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'videography'); ?></h3>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon01.png" alt="" />
			<h4><?php esc_html_e( 'Banner Slider', 'videography'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon02.png" alt="" />
			<h4><?php esc_html_e( 'Theme Options', 'videography'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon03.png" alt="" />
			<h4><?php esc_html_e( 'Custom Innerpage Banner', 'videography'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon04.png" alt="" />
			<h4><?php esc_html_e( 'Custom Colors and Images', 'videography'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon05.png" alt="" />
			<h4><?php esc_html_e( 'Fully Responsive', 'videography'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon06.png" alt="" />
			<h4><?php esc_html_e( 'Hide/Show Sections', 'videography'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon07.png" alt="" />
			<h4><?php esc_html_e( 'Woocommerce Support', 'videography'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon08.png" alt="" />
			<h4><?php esc_html_e( 'Limit to display number of Posts', 'videography'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon09.png" alt="" />
			<h4><?php esc_html_e( 'Multiple Page Templates', 'videography'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon10.png" alt="" />
			<h4><?php esc_html_e( 'Custom Read More link', 'videography'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon11.png" alt="" />
			<h4><?php esc_html_e( 'Code written with WordPress standard', 'videography'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon12.png" alt="" />
			<h4><?php esc_html_e( '100% Multi language', 'videography'); ?></h4>
		</div>
	</div>
</div>
<?php } ?>