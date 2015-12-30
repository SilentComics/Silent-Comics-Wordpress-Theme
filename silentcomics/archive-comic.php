<?php
/**
 * Template Name: Archive all comics
 * The template for displaying comics in archived pages. 
 * This template provides an overview of all comics posts in 7 post per page
 *
 * @package SilentComics
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
				
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
				<?php
					printf( __( 'STORIES %s', 'silentcomics' ), '<span>' .
					single_term_title( '', false ) . '</span>' );
					?>
					</h1>
				
				<h3 class="page-title"> 
				Your Title
					</h3>
					<h2 class="taxonomy-description">
	<a href="<?php echo esc_url( home_url( '/series/' ) ); ?>">Series</a></h2>
	
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->
			
<?php // Create and run first loop in reverse order
    $comic = new WP_Query();
    $comic = new WP_Query( array(
					'post_type' 		=> 'comic',
					'posts_per_page' 	=> 7,
					'paged'				=> $paged,
					'orderby'   		=> 'title',
					'order'   			=> 'ASC',)
					);
    while ($comic->have_posts()) : $comic->the_post();   
				
				get_template_part( 'content-comic' );
				// to style it like the blog entry page, change to 'content' ?> 

						<?php endwhile;
						wp_reset_postdata(); ?>
						
						<?php silentcomics_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive-comic' ); ?>

		<?php endif; 
			wp_reset_postdata();
		?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>