<article class="post">

	<header class="post-header">
		
		<?php anuncios(); ?>
		
		<div class="container-info">
			<span class="post-date">
				<i class="fa fa-calendar" aria-hidden="true"></i>
				<?php the_date(); ?>
			</span>
			<h2><?php the_title(); ?></h2>
			<span class="autor">por <?php the_author(); ?></span>

			<p class="descricao"><?php the_field('descrição'); ?></p>
		</div>
	</header>

	<div class="conteudo-post">

		<?php 
		$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
		if($imagem[0] != ''){ ?>
			<img src="<?php if($imagem[0]){ echo $imagem[0]; } ?>" alt="<?php the_title(); ?>" class="image-post">
		<?php } ?>

		<?php if(get_field('media')){ ?>
			<div class="media">
				<?php the_field('media'); ?>
			</div>
		<?php } ?>

		<div class="conteudo">
			<?php the_content(); ?>
		</div>
	</div>

	<div class="leia-mais">
		<a href="<?php the_permalink(); ?>" title="Continue lendo">Continue lendo <i class="fa fa-angle-right" aria-hidden="true"></i></a>
	</div>

	<footer class="post-footer">		
		<?php include 'social-share.php'; ?>

		<div class="aviso-erro">
			<a href="#">
				<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
				Comunicar erro
			</a>
		</div>
		<div class="print">
			<a href="#">
				<i class="fa fa-print" aria-hidden="true"></i>
				Imprimir
			</a>
		</div>
	</footer>

	<div class="tags">
		 <?php the_tags(); ?>
	</div>
</article>
