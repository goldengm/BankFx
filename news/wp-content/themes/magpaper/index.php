<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Magpaper
 * @since Magpaper 1.0.0
 */

get_header(); 

$options = magpaper_get_theme_options();
?>

<div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( get_header_image() ); ?>');">
    <div class="overlay"></div>
    <div class="wrapper">
        <header class="entry-header">
            <?php  
	        $options = magpaper_get_theme_options();
			if ( magpaper_is_latest_posts() ) : ?>
				<h2 class="page-title"><?php echo esc_html( $options['your_latest_posts_title']  ); ?></h2>
			<?php elseif ( magpaper_is_blog_page() || is_singular() ): ?>
				<h2 class="page-title"><?php single_post_title(); ?></h2>
			<?php endif;?>
        </header>
        <?php  
        /**
		 * magpaper_breadcrumb_action hook
		 *
		 * @hooked magpaper_add_breadcrumb -  10
		 *
		 */
		do_action( 'magpaper_breadcrumb_action' );
        ?>
    </div><!-- .wrapper -->
</div><!-- #page-header -->

<div id="inner-content-wrapper" class="wrapper page-section">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div id="latest-posts" class="relative">
	            <div class="section-content grid">
					<?php
					if ( have_posts() ) : ?>

						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile;

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
				</div>
			</div>
			<?php  
			/**
			* Hook - magpaper_action_pagination.
			*
			* @hooked magpaper_pagination 
			*/
			do_action( 'magpaper_action_pagination' ); 
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php  
	if ( magpaper_is_sidebar_enable() ) {
		get_sidebar();
	}
	?>
</div><!-- .page-section -->

<?php
get_footer();
