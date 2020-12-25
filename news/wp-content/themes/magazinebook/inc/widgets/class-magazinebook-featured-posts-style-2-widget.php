<?php
/**
 * MagazineBook Add Simple Featured Posts Widget.
 *
 * @package MagazineBook
 */

/**
 * Magazinebook_Featured_Posts_Style_2_Widget
 */
class Magazinebook_Featured_Posts_Style_2_Widget extends WP_Widget {

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'mb-widget-featured-posts-style-2',
			'description'                 => __( 'Displays latest posts or posts of specific category. Suitable for content middle area.', 'magazinebook' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( false, $name = __( 'MB: Featured Posts Style 2', 'magazinebook' ), $widget_ops );
	}

	/**
	 * Widget Form
	 *
	 * @param  mixed $instance instance.
	 * @return void
	 */
	public function form( $instance ) {
		$tg_defaults['title']    = esc_html__( 'Featured Posts', 'magazinebook' );
		$tg_defaults['number']   = 3;
		$tg_defaults['category'] = '';
		$instance                = wp_parse_args( (array) $instance, $tg_defaults );
		$title                   = $instance['title'];
		$number                  = $instance['number'];
		$category                = $instance['category'];
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'magazinebook' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of Posts to Display:', 'magazinebook' ); ?></label>
			<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" value="<?php echo esc_html( $number ); ?>" size="3" step="1" min="1" max="9" />
		</p>

		<p><?php esc_html_e( 'If no category is selected from below dropdown, latest posts will be displayed.', 'magazinebook' ); ?></p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select Category: ', 'magazinebook' ); ?></label>
			<?php
			wp_dropdown_categories(
				array(
					'show_option_none' => esc_html__( 'Select Category', 'magazinebook' ),
					'name'             => $this->get_field_name( 'category' ),
					'selected'         => $category,
				)
			);
			?>
		</p>
		<?php
	}

	/**
	 * Update widget form.
	 *
	 * @param  mixed $new_instance New Instance.
	 * @param  mixed $old_instance Old instance.
	 * @return string
	 */
	public function update( $new_instance, $old_instance ) {
		$instance             = $old_instance;
		$instance['number']   = absint( $new_instance['number'] );
		$instance['title']    = $new_instance['title'];
		$instance['category'] = $new_instance['category'];

		return $instance;
	}

	/**
	 * Widget.
	 *
	 * @param  mixed $args arguments.
	 * @param  mixed $instance instance.
	 * @return void
	 */
	public function widget( $args, $instance ) {

		$title    = isset( $instance['title'] ) ? $instance['title'] : '';
		$number   = empty( $instance['number'] ) ? 3 : $instance['number'];
		$category = isset( $instance['category'] ) ? $instance['category'] : 0;

		if ( '-1' === $category || -1 === $category ) {
			$category = 0;
		}

		$query_args = array(
			'posts_per_page'      => $number,
			'post_type'           => 'post',
			'ignore_sticky_posts' => true,
			'post_status'         => 'publish',
			'no_found_rows'       => true,
			'cat'                 => $category,
		);

		$magazinebook_featured_posts = new WP_Query( $query_args );

		if ( $magazinebook_featured_posts->have_posts() ) :

			echo wp_kses_post( $args['before_widget'] );
			?>
				<div class="mb-featured-posts-style-2">
					<?php if ( ! empty( $title ) ) : ?>
					<div class="mb-featured-style-2-title">
						<?php
						echo wp_kses_post( $args['before_title'] );
						echo esc_html( $title );
						echo wp_kses_post( $args['after_title'] );
						?>
					</div>
					<?php endif; ?>

					<div class="mb-featured-posts-style-2-wrap row">
						<?php
						$post_counter = 1;
						while ( $magazinebook_featured_posts->have_posts() ) :
							$magazinebook_featured_posts->the_post();
							if ( 1 === $post_counter ) :
								?>
								<div class="col-md-8 px-lg-3">
									<article class="mb-featured-article mb-ft-2-big post mb-article-block">
										<?php
										if ( has_post_thumbnail() ) {
											the_post_thumbnail( 'magazinebook-featured-image' );
										} else {
											?>
											<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/default-bg-img.png" alt="<?php the_title_attribute(); ?>">
											<?php
										}
										?>
										<a class="theme-overlay-link" href="<?php the_permalink(); ?>"></a>
										<header class="entry-header mb-article-block-content">
											<?php
											magazinebook_cats_list();
											the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
											?>
											<div class="entry-meta">
												<?php
												magazinebook_posted_on();
												magazinebook_posted_by();
												?>
											</div><!-- .entry-meta -->
										</header><!-- .entry-header -->
									</article>
								</div>
								<?php
							else :
								if ( 2 === $post_counter ) :
									?>
									<div class="col-md-4 px-lg-3">
								<?php endif; ?>
								<?php
								if ( $post_counter <= 3 ) :
									?>
									<article class="mb-featured-article mb-ft-2-small post ">
										<div class="mb-article-block">
									<?php
								else :
									?>
									<article class="mb-featured-article mb-ft-2-small post col-md-4 px-lg-3">
										<div class="mb-article-block">
									<?php
								endif;
								if ( has_post_thumbnail() ) {
									the_post_thumbnail( 'magazinebook-featured-image-medium' );
								} else {
									?>
									<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/default-bg-img.png" alt="<?php the_title_attribute(); ?>">
									<?php
								}
								?>
										<a class="theme-overlay-link" href="<?php the_permalink(); ?>"></a>
										<header class="entry-header mb-article-block-content">
											<?php
											the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
											?>
											<div class="entry-meta">
												<?php
												magazinebook_posted_on();
												magazinebook_posted_by();
												?>
											</div><!-- .entry-meta -->
										</header><!-- .entry-header -->
									</div>
									</article>
								<?php
							endif;
							$post_counter++;
							if ( 4 === $post_counter ) :
								?>
								</div>
								<?php
							endif;
						endwhile;
						wp_reset_postdata();
						?>
					</div>

				</div>
			<?php
			echo wp_kses_post( $args['after_widget'] );
		endif;
	}

}
