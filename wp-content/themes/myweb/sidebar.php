<session class="col-3 sidebar">

	<div class="sobre">
		<?php $page = get_page_by_path('sobre-o-altivo'); ?>
		<img src="<?php the_field('imagem_perfil',$page->ID); ?>" alt="<?php the_field('nome_perfil',$page->ID); ?>">
		<h2><a href="<?php the_permalink($page->ID); ?>" title="<?php the_field('nome_perfil',$page->ID); ?>"><?php the_field('nome_perfil',$page->ID); ?></a></h2>
		<p><?php the_field('descrição',$page->ID); ?></p>
	</div>
	
	<form role="search" method="get" id="searchform" class="search" action="<?php echo home_url( '/' ); ?>">
		<fieldset class="busca">
			<input value="<?php echo $_GET['s']; ?>" name="s" id="s" type="text">
			<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
		</fieldset>
		<fieldset class="filtro">
			<label for="texto">
				<input type="checkbox" name="texto" id="texto" <?php if($_GET['texto'] == 'on'){ echo 'checked="checked"'; } ?>>
				Texto
			</label>
			<label for="audio">
				<input type="checkbox" name="audio" id="audio" <?php if($_GET['audio'] == 'on'){ echo 'checked="checked"'; } ?>>
				Áudio
			</label>
			<label for="video">
				<input type="checkbox" name="video" id="video" <?php if($_GET['video'] == 'on'){ echo 'checked="checked"'; } ?>>
				Vídeo
			</label>
		</fieldset>
	</form>

	<div class="destaque">
		<h3>DESTAQUE</h3>
		<ul>
		    <?php
		        $getPosts = array(
		            'post_type'   => 'post',
		            'post_status' => 'any',
		            'orderby'     => date,
		            'order'       => 'DESC',
		            'posts_per_page' => '5',
		        );
		        $destaque = new WP_Query( $getPosts );
		        if(count($destaque) > 0){
					while($destaque->have_posts()) : $destaque->the_post(); 
						get_template_part( 'content-widget', get_post_format() );
					endwhile;
		        }
		    ?>
		</ul>
	</div>

	<div class="arquivos">
		<h3>ARQUIVOS</h3>
		<ul>
			<?php
			    $args=array(
					'taxonomy'      => 'category',
					'parent'        => 0, // get top level categories
					'orderby'       => 'data',
					'order'         => 'DESC',
					'hierarchical'  => 1,
					'pad_counts'    => 0
			    );

				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
					$ymdate = '';
					$mes = '';
					$qtd_post = 0;
					while ($my_query->have_posts()) : $my_query->the_post();
						
						// ANO
						$ympost = mysql2date("Y", $post->post_date);
						if ( $ympost != $ymdate) {
							$ymdate = $ympost;
							$ano =  $ymdate;
						}
						
						// MÊS
						$mespost = mysql2date("F", $post->post_date);
						if ( $mes != $mespost) {
							//echo $qtd_post;
							$qtd_post = 0;
							$mes = $mespost;
							echo '<li class="item" rel="">
									<h4><a href="'.get_home_url().'/'.mysql2date("Y", $post->post_date).'/'.mysql2date("m", $post->post_date).'" title="'.get_the_title().'">
										<i class="fa fa-angle-right" aria-hidden="true"></i>
										<span>'.$mes.' '.$ano.' <strong>('.countPostDate(mysql2date("m", $post->post_date),mysql2date("Y", $post->post_date)).')</strong></span>
									</a></h4>
								</li>';
						} 
						$qtd_post = $qtd_post+1;
						?>
						
					<?php endwhile; 
				} 
				wp_reset_query();
			?>
		</ul>
	</div>

</session>