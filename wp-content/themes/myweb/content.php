<article class="post">

	<header class="post-header">
		
		<?php anuncios(); ?>
		
	</header>

	<div class="conteudo-post">

		<?php 
		$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
		if($imagem[0] != ''){ ?>
			<img src="<?php if($imagem[0]){ echo $imagem[0]; } ?>" alt="<?php the_title(); ?>" class="image-post">
		<?php } ?>

		<?php if(get_field('video')){ ?>
			<div class="media youtube">
				<?php the_field('video'); ?>
			</div>
		<?php } ?>

		<?php if(get_field('audio')){ ?>
			<div class="media">
				<?php the_field('audio'); ?>
			</div>
		<?php } ?>

		<?php if(get_field('texto')){ ?>
			<div class="conteudo">
				<?php the_field('texto'); ?>
			</div>
		<?php } ?>

	</div>
	
	<?php if(get_field('texto')){ ?>
		<div class="leia-mais">
			<a href="<?php the_permalink(); ?>" title="Continue lendo">Continue lendo <i class="fa fa-angle-right" aria-hidden="true"></i></a>
		</div>
	<?php } ?>

	<footer class="post-footer">		
		<?php include 'social-share.php'; ?>

		<?php /*
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
		*/ ?>
	</footer>

	<div class="tags">
		 <?php the_tags(); ?>
	</div>
</article>
