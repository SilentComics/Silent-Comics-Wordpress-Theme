<?php
/**
 * The template for the "Draft" story pages
 *
 * Archive comic stories without a taxonomy_term set.
 * Using custom Taxonomy "draft" http://codex.wordpress.org/Template_Tags/get_posts#Taxonomy_Parameters
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Strip
 */

	get_header(); ?>

	<div id="primary"
		<main id="content" class="wrap" role="main">

	<?php if ( have_posts() ) : ?>
	<header class="page-header">
		</br>
			<?php
						// Show an optional term description.
						$term_description = term_description();
			if ( ! empty( $term_description ) ) :
				printf( '<div class="taxonomy-description">%s</div>', $term_description, 'strip' ); // WPCS: XSS OK.
						endif; ?>
			<h4 class="comic-blurb">Here are your uncategorized comics. To order them, go to Add New Comic, then + Add New Story and write a series title of your choice, or check an existing series box, if you had one. To write your own custom taxonomies, clone taxonomy-story-draft.php and replace "draft" by your own story name.</h4>
	</header><!-- .page-header -->

<?php // Create and run first loop in reverse order.
		$comic = new WP_Query();
		$comic->query( array(
			'post_type'  => 'comic',
			'showposts'	 => -1,
			'story'      => 'draft',
			'orderby'  	 => 'title', // You can also order by date, like regular posts.
			'order'  	 => 'DESC', // It is either ASC or DESC, standing for ascendant or descendant order.
			)
		);

while ( $comic->have_posts() ) : $comic->the_post();

	get_template_part( 'content-comic' ); ?>

			<?php endwhile; ?>
<?php
	wp_reset_postdata();
?>
		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive-comic' ); ?>

		<?php endif; ?>

		</main><!-- #content -->
	</section><!-- #primary -->
<?php get_footer(); ?>
