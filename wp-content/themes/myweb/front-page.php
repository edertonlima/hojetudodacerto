<?php get_header(); ?>

<div class="container">
	<div class="row">

		<?php include 'sidebar.php'; ?>

		<div class="col-9 body-container">
			
			<session class="post-det list"> 
			    <?php
			        $getPosts = array(
			            'post_type'   => 'post',
			            'post_status' => 'any',
			            'orderby'     => date,
			            'order'       => 'DESC'
			        );
			        $posts = new WP_Query( $getPosts );
			        $linha = 0;
			        if(count($posts) > 0){ ?>

						<?php
							while($posts->have_posts()) : $posts->the_post();
								get_template_part( 'content', get_post_format() );
								$linha = $linha+1;
							endwhile;
						?>

			        <?php }
			    ?>

				<?php
					the_posts_pagination( array(
						'prev_text'          => __( 'Previous page', 'myweb' ),
						'next_text'          => __( 'Next page', 'myweb' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'myweb' ) . ' </span>',
					) );
				?>
			</session>

		</div>
	</div>
</div>


<?php /*
<session class="post-list"> 
    <?php
        $getPosts = array(
            'post_type'   => 'post',
            'post_status' => 'any',
            'orderby'     => date,
            'order'       => 'DESC'
        );
        $posts = new WP_Query( $getPosts );
        if(count($posts) > 0){ ?>

			<div class="slide-home">
				<?php 
					while($posts->have_posts()) : $posts->the_post(); 
						get_template_part( 'content-list', get_post_format() );
					endwhile;
				?>
			</div>

        <?php }
    ?>
</session>

<session class="sobre-home">
	<div class="container">


		<?php include 'social.php'; ?>
	</div>
*/ ?>


<?php get_footer(); ?>