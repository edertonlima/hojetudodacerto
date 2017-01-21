<?php get_header(); ?>

<session class="post-det list">
	<div class="container">

		<div class="row">
			<?php include 'sidebar.php'; ?>

			<div class="col-9 body-container">
			
				<?php if ( have_posts() ) :

					$texto = false;
					$audio = false;
					$video = false;

					if($_GET['texto'] == 'on'){
						$texto = true;
					}
					if($_GET['audio'] == 'on'){
						$audio = true;
					}
					if($_GET['video'] == 'on'){
						$video = true;
					}

					$linha = 0;
					$countShowPost = 0;

					if((!$texto) && (!$audio) && (!$video)) {

						while ( have_posts() ) : the_post();
							get_template_part( 'content', get_post_format() );
							$countShowPost = $countShowPost+1;
						endwhile;

					}else{

						while ( have_posts() ) : the_post();				

							if((get_field('audio')) and ($audio)){
								get_template_part( 'content', get_post_format() );
								$countShowPost = $countShowPost+1;
							}else{
								if((get_field('video')) and ($video)){
									get_template_part( 'content', get_post_format() );
									$countShowPost = $countShowPost+1;
								}else{
									if((get_field('texto')) and ($texto)){
										get_template_part( 'content', get_post_format() );
										$countShowPost = $countShowPost+1;
									}
								}
							}

							$linha = $linha+1;

						endwhile;

						if($countShowPost == 0){
							get_template_part( 'content', 'none' );
						}

					}					

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
			
		</div>

	</div>
</session>

<?php get_footer(); ?>