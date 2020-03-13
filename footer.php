
<?php 
// just add here the page id for product page then modify the function name simplecart_perpage under functions.php
get_template_part( 'content', 'footercartids' );
	
?>

<?php
/**
 * The template for displaying the footer
 */

	$id = is_singular() ? get_the_ID() : 0;
	if(is_404() && get_post(thegem_get_option('404_page'))) {
		$id = thegem_get_option('404_page');
	}
	if((is_post_type_archive('product') || is_tax('product_cat') || is_tax('product_tag')) && function_exists('wc_get_page_id')) {
		$id = wc_get_page_id('shop');
	}
	$effects_params = thegem_get_sanitize_page_effects_data($id);
	$header_params = thegem_get_sanitize_page_header_data($id);
	if(is_tax() || is_category() || is_tag()) {
		$thegem_term_id = get_queried_object()->term_id;
		$effects_params = thegem_theme_options_get_page_settings('blog');
		$header_params = thegem_theme_options_get_page_settings('blog');
		if(get_term_meta($thegem_term_id , 'thegem_taxonomy_custom_page_options', true)) {
			$effects_params = thegem_get_sanitize_page_effects_data($thegem_term_id, array(), 'term');
			$header_params = thegem_get_sanitize_page_header_data($thegem_term_id, array(), 'term');
		}
	}
	if($effects_params['effects_parallax_footer']) {
		wp_enqueue_script('thegem-parallax-footer');
	}
?>

		</div><!-- #main -->
		<div id="lazy-loading-point"></div>

		<?php if(!$effects_params['effects_page_scroller'] && !$effects_params['effects_hide_footer']) : ?>
			<?php if($effects_params['effects_parallax_footer']) : ?><div class="parallax-footer"><?php endif; ?>
			<?php
				$thegem_custom_footer = get_post(thegem_get_option('custom_footer'));
				$thegem_q = new WP_Query(array('p' => thegem_get_option('custom_footer'), 'post_type' => 'thegem_footer', 'post_status' => 'private'));
				if($header_params['footer_custom']) {
					$thegem_custom_footer = get_post($header_params['footer_custom']);
					$thegem_q = new WP_Query(array('p' => $header_params['footer_custom'], 'post_type' => 'thegem_footer', 'post_status' => 'private'));
				}
				if((thegem_get_option('custom_footer') || $header_params['footer_custom']) && $thegem_custom_footer && $thegem_q->have_posts()) : $thegem_q->the_post(); ?>
				<footer class="custom-footer"><div class="container"><?php the_content(); ?></div></footer>
			<?php wp_reset_postdata(); endif; ?>
			<?php if(is_active_sidebar('footer-widget-area') && !thegem_get_option('footer_widget_area_hide') && !$header_params['footer_hide_widget_area']) : ?>
			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="container">
					<?php get_sidebar('footer'); ?>
				</div>
			</footer><!-- #colophon -->
			<?php endif; ?>
			
			<?php if(thegem_get_option('footer_active') && !$header_params['footer_hide_default']) : ?>
		<!-- search costum -->
			<footer id="footer-nav" class="mrt-searchfooter">
				
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="slick-container-footer">
									<a href="<?php echo esc_url(site_url('/mymrtgear/')); ?>">
										<div class="text-container-footer">
											See what others have done with their <strong class="footer-green-text">#MYMRTGEAR</strong>
										</div>
									</a>
								
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="full-width-slick-container">
							<?php 
								echo do_shortcode('[slick-carousel-slider design="design-6" centermode="true" slidestoshow="3" category="61" image_fit="true" sliderheight="" image_size="large"]');
							?>
						</div>
					</div>
				</div>
				
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
								<p class="search-title">Can we help find anything?</p>
							</div>
							<?php echo do_shortcode('[costum_footer_mrt_search]'); ?>
						</div>
					</div>
				</div>

			</footer>
			<!-- end -->
			<footer id="footer-nav" class="site-footer">
				<div class="container">
					<div class="row">
						<div class="col-sm-3">
						<div class="dekstopview">
							<p><?php echo do_shortcode('[ftext]'); ?></p>
						</div>
						</div>
						<div class="col-sm-3">
							<?php
											if(has_nav_menu('mrtfooterlink')){
												wp_nav_menu(array(

													'theme_location' => 'mrtfooterlink',
													'menu_class'	=>	'mrtfooterlink',
													'depth'	=>1
												));
											}
										
							?>
							
						</div>
						<div class="col-sm-3">
							<?php
											if(has_nav_menu('mrtfooterlinkright')){
												wp_nav_menu(array(

													'theme_location' => 'mrtfooterlinkright',
													'menu_class'	=>	'mrt-footer-right',
													'depth'	=>1
												));
											}
										
							?>
						</div>
						<div class="col-sm-3">
							
								<?php
									$socials_icons = array();
									$thegem_socials_icons = thegem_socials_icons_list();
									foreach(array_keys($thegem_socials_icons) as $icon) {
										$socials_icons[$icon] = thegem_get_option($icon.'_active');
										thegem_additionals_socials_enqueue_style($icon);
									}
									if(in_array(1, $socials_icons)) : ?>
									<div id="footer-socials"><div class="socials inline-inside socials-colored<?php echo (thegem_get_option('socials_colors_footer') ? '-hover' : ''); ?>">
											<?php foreach($socials_icons as $name => $active) : ?>
												<?php if($active) : ?>
													<a href="<?php echo esc_url(thegem_get_option($name . '_link')); ?>" target="_blank" title="<?php echo esc_attr($thegem_socials_icons[$name]); ?>" class="socials-item"><i class="socials-item-icon <?php echo esc_attr($name); ?>"></i></a>
												<?php endif; ?>
											<?php endforeach; ?>
											<?php do_action('thegem_footer_socials'); ?>
									</div></div><!-- #footer-socials -->
								<?php endif; ?>
								<div class="mobileview">
									<p><?php echo do_shortcode('[ftext]'); ?></p>
								</div>
							
						</div>
					</div> <!--endrow-->
				</div><!--endcontainer-->
			</footer><!-- #footer-nav -->
			<?php endif; ?>
			<?php if($effects_params['effects_parallax_footer']) : ?></div><!-- .parallax-footer --><?php endif; ?>

		<?php endif; ?>
	</div><!-- #page -->

	<?php if(thegem_get_option('header_layout') == 'perspective') : ?>
		</div><!-- #perspective -->
	<?php endif; ?>
	
	<?php get_template_part( 'content', 'footermodal' );?>
	<?php is_page(2224)? get_template_part('content','modalgallery'): ''; ?>

	<?php wp_footer();?>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/aos.js"></script>
	<script>AOS.init();</script>
	<script defer src="<?php echo get_stylesheet_directory_uri(); ?>/js/fontawesome.js" crossorigin="anonymous"></script>
	<script defer type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/mrtscript.js"></script>
	<?php
		if(is_page(array('1060','1061'))){
			echo '<script defer type="text/javascript" src="'.get_stylesheet_directory_uri().'/js/cartcheckout.js"></script>';
		}
		if(is_search()){
			echo '<script defer type="text/javascript" src="'.get_stylesheet_directory_uri().'/js/mrtsearch.js"></script>';
		}
		if(is_404() || is_page(array('2190','1062','25','2195','2204')) && is_product(array('2420','2407'))){
			echo '<script defer type="text/javascript" src="'.get_stylesheet_directory_uri().'/js/pagenotfound.js"></script>';
		}
		if(is_product_category(array('56','53', '52','58','52'))){
			echo '<script defer type="text/javascript">jQuery(document).ready(function( $ ){$(".block-content").addClass("block-content-accessory-cat")});</script>';
		}
		if(is_page(63)){
			echo '<script type="text/javascript">jQuery(document).ready(function( $ ){$(".block-content").addClass("block-content-homepage")});</script>';
		}
		if(is_product()){
			echo "<script defer type='text/javascript' src='".get_stylesheet_directory_uri()."/js/product-page.js'></script>";	
		}
		if(!is_front_page() && !is_product_category(array('56','53', '52','58','52')) && !is_page(array(2224,4798)) && !is_product(4170)){
			echo '<script type="text/javascript" src="'.get_stylesheet_directory_uri().'/js/modal.js"></script>';
		}

	?>
	<script defer src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.magnific-popup.min.js"></script>
	<script defer src="<?php echo get_stylesheet_directory_uri(); ?>/js/dimension-images-popup.js"></script>
	<!-- <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/fullpage.js"></script>
	<script type="text/javascript">
		 var myFullpage = new fullpage('#fullpage', {
            anchors: ['firstPage', 'secondPage', '3rdPage'],
            sectionsColor: ['#2af711', '#f38906', '#111111'],
            navigation: true,
            navigationPosition: 'right'
        });
	</script> -->
	

	

</body>
</html>
