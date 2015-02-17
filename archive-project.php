<?php


get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>


			<header class="page-header">
				<h1 class="page-title">
					Archive for <?php post_type_archive_title(); ?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php 
			while ( have_posts() ) : the_post(); ?>

				<?php $attr = array(
			        'class' => "archive-image",
			        'alt' => trim( strip_tags( $wp_postmeta->_wp_attachment_image_alt ) ),
			    ); ?>
    			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail', $attr ); ?></a>
    			<h2 class="archive-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

			<?php endwhile; ?>

			<?php _mbbasetheme_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
