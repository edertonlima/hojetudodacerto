	
	<section class="news">
		<div class="container">
			<div class="row">
				<form action="#">
					<fieldset class="col-12">
						<h2 class="center">News Whats</h2>
						<p class="center">Deseja receber via whatsapp os textos diários?</p>
					</fieldset>
					<fieldset class="col-4">
						<span><input type="text" placeholder="Nome" name="nome" id="nome"></span>
					</fieldset>
					<fieldset class="col-4">
						<span><input type="text" placeholder="E-mail" name="email" id="email"></span>
					</fieldset>
					<fieldset class="col-4">
						<span><input type="text" placeholder="Telefone" name="telefone" id="telefone"></span>
					</fieldset>
					<fieldset class="col-12 center">
						<button class="enviar">Enviar</button>
					</fieldset>
				</form>
			</div>
		</div>
	</section>

<?php 
/*
if( have_rows('new_whats') ) {
	
	while( have_rows('new_whats') ) {

		the_row();

		$nome = 'Ederton Cirino Lima';
		$email = 'edertton@gmail.com';
		$telefone = '(14) 99724-0705';



		update_sub_field('nome', $nome);
		update_sub_field('email', $email);
		update_sub_field('telefone', $telefone);

	}
}
*/
?>

<?php /*

$row = array(
	'nome'	=> '123',
	'email'	=> 'Another great sunset',
	'telefone'	=> 'http://website.com'
);

//add_row('new_whats', $row);
add_row( 'new_whats', 'asdadadad', 'field_58738fd6d98fb' ); */
	
?>
	
	<footer class="box-menu footer">
		<div class="container">
			<div class="row logo">
				<div class="col-8 center">
					<h1><a href="<?php echo get_home_url(); ?>" alt="<?php bloginfo( 'name' ); ?>">
						<img src="<?php the_field('logo_footer','option'); ?>" alt="<?php bloginfo( 'name' ); ?>">
					</a></h1>
				</div>

				<div class="col-4 dados-footer">
					<div class="contato">
						<i class="fa fa-phone" aria-hidden="true"></i>
						<span><?php the_field('telefone','option'); ?></span>
					</div>
					<div class="contato">
						<i class="fa fa-whatsapp" aria-hidden="true"></i>
						<span><?php the_field('whats','option'); ?></span>
					</div>
					<div class="contato">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<span><?php the_field('email','option'); ?></span>
					</div>
				</div>
			</div>
			
			<?php /*
			<nav class="nav">
				<?php wp_nav_menu( array(
					'menu'           => 'Menu Principal',
				    'theme_location' => 'primary',
				    'items_wrap'     => '<ul class="menu">%3$s</ul>'
				) ); ?>

				<?php include 'social.php'; ?>
			</nav>


			<div class="bg-footer"></div>
			*/ ?>
		</div>
	</footer>

</body>
</html>