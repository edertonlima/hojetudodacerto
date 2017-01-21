<article class="post">

	<header class="post-header">
		<div class="categoria-header">
			<h2><?php the_title(); ?></h2>
		</div>
	</header>		

	<?php $imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
	
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
	
		<?php $page = get_page_by_path('contato'); ?>
		<?php if(is_page($page->ID)){ ?>
			<div class="row">
				<form action="javascript:" class="contato">
					<fieldset class="col-6">
						<span><input type="text" name="nome" id="nome" placeholder="Nome"></span>
					</fieldset>

					<fieldset class="col-6">
						<span><input type="text" name="email" id="email" placeholder="E-mail"></span>
					</fieldset>

					<fieldset class="col-12">
						<textarea name="mensagem" id="mensagem" rows="10"></textarea>
					</fieldset>

					<button type="button" class="enviar">Enviar</button>
					<p class="msg-form"></p>	
				</form>
			</div>
		<?php } ?>
	</div>

</article>

<?php $page = get_page_by_path('contato'); ?>
<?php if(is_page($page->ID)){ ?>
<script type="text/javascript">
	$(document).ready(function(){
	
		$(".enviar").click(function(){
			$('.enviar').html('ENVIANDO').prop( "disabled", true );
			$('.msg-form').removeClass('erro ok').html('');
			var nome = $('#nome').val();
			var email = $('#email').val();
			var mensagem = $('#mensagem').val();
			var para = '<?php the_field('email', 'option'); ?>';
			var nome_site = '<?php bloginfo('name') ?>';

			if(email!=''){
				if(mensagem!=''){
					$.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome: nome, email: email, mensagem: mensagem, para: para, nome_site: nome_site }, function(result){		
						if(result=='ok'){
							resultado = 'Enviado com sucesso! Obrigado.';
							classe = 'ok';
						}else{
							resultado = result;
							classe = 'erro';
						}
						$('.msg-form').addClass(classe).html(resultado);
						$('.contato').trigger("reset");
						$('.enviar').html('ENVIAR').prop( "disabled", false );
					});
				}else{
					$('.msg-form').addClass('erro').html('Por favor, você precisa digitar uma mensagem.');
					$('.enviar').html('Enviar').prop( "disabled", false );
				}
			}else{
				$('.msg-form').addClass('erro').html('Por favor, digite um e-mail válido.');
				$('.enviar').html('Enviar').prop( "disabled", false );
			}
		});
	});
</script>
<?php } ?>
