<?php get_header(); ?>

<?php if( have_rows('anuncios','option') ):
	$anuncios = array();
	
	$i=0;
	while ( have_rows('anuncios','option') ) : the_row();

		if(get_sub_field('status','option')){
			$anuncios[$i]['imagem'] = get_sub_field('imagem','option');
			$anuncios[$i]['url'] = get_sub_field('url','option');
		}

		$i=$i+1;

	endwhile; //print_r($anuncios); /*shuffle($anuncios); echo '<br><br>'; print_r($anuncios); echo '<br><br>'*/;

	function anuncios(){
		global $anuncios;
		global $linha;
		global $numAnuncio;
		$novaLinha = $numAnuncio[$linha];
		//echo $anuncios[$novaLinha]['imagem'];
		//echo $anuncios[4]['imagem'];

		if($anuncios[$novaLinha]['url']!=''){
			echo '<a href="'.$anuncios[$novaLinha]['url'].'">';
		}

		echo '<img src="'.$anuncios[$novaLinha]['imagem'].'" class="banner">';

		if($anuncios[$novaLinha]['url']!=''){
			echo '</a>';
		}
	}

endif; 
$qtdAnuncios = count($anuncios); 

for($count = 0; $count < $qtdAnuncios; $count++){
	$numAnuncio[] = $count;
}

//print_r($numAnuncio);
shuffle($numAnuncio);
//echo '<br><br>';
//var_dump($numAnuncio);
//var_dump($anuncios);

?>

<div class="container">
	<div class="row">
		<div class="col-3">

			<?php include 'sidebar.php'; ?>

		</div>
		<div class="col-9">
			
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