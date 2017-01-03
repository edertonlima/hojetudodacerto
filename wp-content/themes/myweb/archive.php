<?php get_header(); ?>

<session class="post-det list">
	<div class="container">

		<div class="row">
			<div class="col-9" style="float: right;">

			<header class="categoria-header">
				<h2><?php the_archive_title(); ?></h2>
			</header><!-- .page-header -->
				
				<?php if ( have_posts() ) :

					while ( have_posts() ) : the_post();
						get_template_part( 'content','');
					endwhile;

					// Previous/next page navigation.
					the_posts_pagination( array(
						'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
						'next_text'          => __( 'Next page', 'twentyfifteen' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
					) );

				else :
					get_template_part( 'content', 'none' );

				endif; ?>

			</div>
			<div class="col-3">
				<?php include 'sidebar.php'; ?>
			</div>
		</div>

	</div>
</session>

<?php get_footer(); ?>