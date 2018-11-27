<?php
/**
 * Dispay author bio on author index page
 *
 * Dependent on bio being available for current author.
 *
 * @package WordPress
 * @subpackage Strip
 */

?>

<div class="author-info">
	<div class="author-avatar">
		<?php
		/**
		 * Filter the strip author bio avatar size.
		 *
		 * @since strip 1.0
		 *
		 * @param int $size The avatar height and width size in pixels.
		 */
		$author_bio_avatar_size = apply_filters( 'strip_author_bio_avatar_size', 240 );

		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
	</div><!-- .author-avatar -->

	<div class="author-meta">

	<div class="author-description">
		<h2 class="author-title"><span class="author-heading"><?php esc_html_e( '&#9998;', 'strip' ); ?></span> <?php echo get_the_author(); ?></h2>


		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
				<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
					<br> <?php printf( esc_html__( 'View all articles by %s', 'strip' ), get_the_author() ); ?>
				</a>
			</p><!-- .author-bio -->
		</div><!-- .author-description -->
	</div><!-- .author-meta -->
</div><!-- .author-info -->
