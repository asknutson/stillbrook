<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'videography_above_slider' ); ?>

	<?php if( get_theme_mod('videography_slider_hide_show') != ''){ ?>
		<section id="slider">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
			    <?php $videography_slider_pages = array();
			    for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'videography_slider'. $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $videography_slider_pages[] = $mod;
			        }
			    }
		      	if( !empty($videography_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $videography_slider_pages,
			          	'orderby' => 'post__in'
			        );
		        	$query = new WP_Query( $args );
		        if ( $query->have_posts() ) :
		          	$i = 1;
		    	?>     
			    <div class="carousel-inner" role="listbox">
			      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
			        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
		          		<img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
			          	<div class="carousel-caption">
				            <div class="inner_carousel">
				              	<h2><?php the_title(); ?></h2>
				              	<p><?php $videography_excerpt = get_the_excerpt(); echo esc_html( videography_string_limit_words( $videography_excerpt,30 ) ); ?></p>
				            </div>
		            		<a href="<?php the_permalink(); ?>" class="read-btn"><?php esc_html_e('Read More','videography'); ?><span class="screen-reader-text"><?php esc_html_e('Read More','videography'); ?></span></a>
			          	</div>
			        </div>
			      	<?php $i++; endwhile; 
			      	wp_reset_postdata();?>
			    </div>
			    <?php else : ?>
			    <div class="no-postfound"></div>
		      		<?php endif;
			    endif;?>
			    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			      	<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
			      	<span class="screen-reader-text"><?php esc_html_e( 'Prev','videography' );?></span>
			    </a>
			    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			      	<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
			      	<span class="screen-reader-text"><?php esc_html_e( 'Next','videography' );?></span>
			    </a>
			</div>
		  	<div class="clearfix"></div>
		</section>
	<?php }?>

	<?php do_action('videography_below_slider'); ?>

	<section id="featured-section">
		<div class="container">
			<?php if (get_theme_mod('videography_videos_section_small_heading','') || get_theme_mod('videography_videos_section_heading','')){ ?>
				<div class="featured-title">
					<?php if (get_theme_mod('videography_videos_section_heading','')) { ?>
						<hr>
						<h2><?php echo esc_html(get_theme_mod('videography_videos_section_heading','')); ?></h2>
					<?php } ?>
					<?php if (get_theme_mod('videography_videos_section_small_heading','')) { ?>
						<p><?php echo esc_html(get_theme_mod('videography_videos_section_small_heading','')); ?></p>
					<?php } ?>
				</div>
			<?php }?>
            <div class="row">
	      		<?php $videography_catData1 =  get_theme_mod('videography_category_setting');
  				if($videography_catData1){ 
      				$page_query = new WP_Query(array( 'category_name' => esc_html($videography_catData1 ,'videography')));
      				$i=1;?>
	        		<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>	
	          			<div class="col-lg-3 col-md-6">
	          				<div class="featured-box">
	      						<div class="featured-img">
						      		<img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" <?php if( get_post_meta($post->ID, 'videography_video_url', true) )  { ?>lz-featured-video="lz-popup-frame<?php echo esc_attr($i); ?>" <?php }?> class="poppup-img" />
					      			<div class="video-popup lz-popup-frame<?php echo esc_attr($i); ?>">
									    <div class="video-popup-content">
									        <embed src="<?php echo esc_html(get_post_meta($post->ID,'videography_video_url',true)); ?>" frameborder="0" allowfullscreen></embed>
									      	<button type="button" class="btn close-btn" lz-featured-video="lz-popup-frame<?php echo esc_attr($i); ?>">X</button>
									    </div>
								  	</div>
						  		</div>
          						<div class="featured-content">
          							<div class="row">
          								<div class="col-lg-9 col-md-9 col-9 pr-0">
						            		<h3><?php the_title(); ?></h3>
						            		<div class="video-category"><?php the_category(', '); ?></div>
						            		<div class="video-date"><?php echo esc_html( get_the_date()); ?></div>
						            	</div>
						            	<div class="col-lg-3 col-md-3 col-3 align-self-center">
						            		<div class="read-btn">
						            			<a href="<?php the_permalink(); ?>"><i class="fas fa-chevron-right"></i></a>
						            		</div>
						            	</div>
						            </div>
	            				</div>
	          				</div>
					    </div>
	          		<?php $i++; endwhile; 
	          		wp_reset_postdata();
	      		}?>
      		</div>
			<div class="clearfix"></div>
		</div>
	</section>

	<?php do_action('videography_below_service_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content">
	        	<?php the_content(); ?>
	        </div>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>