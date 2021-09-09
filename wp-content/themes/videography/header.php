<?php
/**
 * The header for our theme
 *
 * @subpackage Videography
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'videography' ); ?></a>

<div id="header">
	<div class="top-header py-2">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 text-lg-left text-center">
					<?php if(get_theme_mod('videography_topheader_mail')) {?>
						<span class="mail">
							<a href="mailto:<?php echo esc_attr(get_theme_mod('videography_topheader_mail')); ?>"><i class="far fa-envelope mr-1"></i><span><?php echo esc_html(get_theme_mod('videography_topheader_mail')); ?></span><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('videography_topheader_mail')); ?></span></a>
						</span>
					<?php }?>
					<?php if(get_theme_mod('videography_topheader_phone_no')) {?>
						<span class="call">
							<a href="tel:<?php echo esc_attr(get_theme_mod('videography_topheader_phone_no')); ?>"><i class="fas fa-phone-volume mr-1"></i><span><?php echo esc_html(get_theme_mod('videography_topheader_phone_no')); ?></span><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('videography_topheader_phone_no')); ?></span></a>
						</span>
					<?php }?>
				</div>
				<div class="col-lg-5 col-md-6">
					<?php if(get_theme_mod('videography_topheader_text')) {?>
						<p class="topbar-text mb-0 text-center mt-md-0 mt-2 pt-md-0 pt-2"><?php echo esc_html(get_theme_mod('videography_topheader_text')); ?></p>
					<?php }?>
				</div>
				<div class="col-lg-3 col-md-12">
					<div class="social-icons text-lg-right text-center mt-lg-0 mt-2 pt-lg-0 pt-2">
						<?php if(get_theme_mod('videography_topheader_facebook_url')) {?>
							<a href="<?php echo esc_url(get_theme_mod('videography_topheader_facebook_url')); ?>"><i class="fab fa-facebook"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'videography'); ?></span></a>
						<?php }?>
						<?php if(get_theme_mod('videography_topheader_twitter_url')) {?>
							<a href="<?php echo esc_url(get_theme_mod('videography_topheader_twitter_url')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'videography'); ?></span></a>
						<?php }?>
						<?php if(get_theme_mod('videography_topheader_linkedin_url')) {?>
							<a href="<?php echo esc_url(get_theme_mod('videography_topheader_linkedin_url')); ?>"><i class="fab fa-linkedin"></i><span class="screen-reader-text"><?php echo esc_html('Linkedin', 'videography'); ?></span></a>
						<?php }?>
						<?php if(get_theme_mod('videography_topheader_instagram_url')) {?>
							<a href="<?php echo esc_url(get_theme_mod('videography_topheader_instagram_url')); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php echo esc_html('Instagram', 'videography'); ?></span></a>
						<?php }?>
						<?php if(get_theme_mod('videography_topheader_pinterest_url')) {?>
							<a href="<?php echo esc_url(get_theme_mod('videography_topheader_pinterest_url')); ?>"><i class="fab fa-pinterest"></i><span class="screen-reader-text"><?php echo esc_html('Pinterest', 'videography'); ?></span></a>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bottom-header">
		<div class="container">
			<div class="row">
				<div class="logo col-lg-3 col-md-5 col-9">
					<?php if ( has_custom_logo() ) : ?>
	            		<?php the_custom_logo(); ?>
		            <?php endif; ?>
	             	<?php if (get_theme_mod('videography_show_site_title',true)) {?>
              			<?php $blog_info = get_bloginfo( 'name' ); ?>
		                <?php if ( ! empty( $blog_info ) ) : ?>
		                  	<?php if ( is_front_page() && is_home() ) : ?>
		                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		                  	<?php else : ?>
	                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	                  		<?php endif; ?>
		                <?php endif; ?>
		            <?php }?>
		            <?php if (get_theme_mod('videography_show_tagline',true)) {?>
		                <?php
	                  		$description = get_bloginfo( 'description', 'display' );
		                  	if ( $description || is_customize_preview() ) :
		                ?>
	                  	<p class="site-description">
	                    	<?php echo esc_attr($description); ?>
	                  	</p>
	              		<?php endif; ?>
              		<?php }?>
				</div>
				<div class="menu-section col-lg-5 col-md-2 col-3">
					<div class="toggle-menu responsive-menu">
						<?php if(has_nav_menu('primary')){ ?>
			            	<button onclick="videography_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','videography'); ?></span></button>
			            <?php }?>
			        </div>
					<div id="sidelong-menu" class="nav sidenav">
		                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'videography' ); ?>">
		                  	<?php if(has_nav_menu('primary')){
			                    wp_nav_menu( array( 
									'theme_location' => 'primary',
									'container_class' => 'main-menu-navigation clearfix' ,
									'menu_class' => 'clearfix',
									'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
									'fallback_cb' => 'wp_page_menu',
			                    ) ); 
		                  	} ?>
		                  	<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="videography_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','videography'); ?></span></a>
		                </nav>
		            </div>
				</div>
				<div class="col-lg-4 col-md-5 header-btn text-md-right text-center">
					<?php if(get_theme_mod('videography_studio_btn_url')) {?>
						<span class="studio-btn">
							<a href="<?php echo esc_url(get_theme_mod('videography_studio_btn_url')); ?>"><span><?php echo esc_html(get_theme_mod('videography_studio_btn_text')); ?></span><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('videography_studio_btn_text')); ?></span></a>
						</span>
					<?php }?>
					<?php if(get_theme_mod('videography_quote_btn_url')) {?>
						<span class="quote-btn">
							<a href="<?php echo esc_url(get_theme_mod('videography_quote_btn_url')); ?>"><span><?php echo esc_html(get_theme_mod('videography_quote_btn_text')); ?></span><i class="far fa-edit ml-1"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('videography_quote_btn_text')); ?></span></a>
						</span>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>